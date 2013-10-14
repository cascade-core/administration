<?php
/*
 * Copyright (c) 2012, Josef Kufner  <jk@frozen-doe.net>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 3. Neither the name of the author nor the names of its contributors
 *    may be used to endorse or promote products derived from this software
 *    without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE REGENTS AND CONTRIBUTORS ``AS IS'' AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED.  IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS
 * OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF
 * SUCH DAMAGE.
 */

class B_admin__proxy extends Block
{

	protected $inputs = array(
		'config' => array('config', 'admin'),
		'path' => array('router', 'path_tail'),
	);

	protected $outputs = array(
		'main_menu' => true,
		'*' => true,
		'done' => true,
	);


	public function main()
	{
		$config = $this->in('config');
		$path = $this->in('path');

		// Prepare reverse router
		$this->context->getTemplateEngine()->addReverseRouter(array($this, 'getUrl'));

		// Route current request
		if (!is_array($path)) {
			$path = explode('/', rtrim($path, '/'));
		}
		$route = $this->route($config['routes'], $path);
		if ($route !== false) {
			$ok = $this->cascadeAdd('main', $route['block'], true, (array) @ $route['connections']);
			if (!empty($route['outputs'])) {
				$this->outAll($route['outputs']);
			}
			$this->out('done', $ok);
		}

		// Prepare main menu
		$this->sortMenu($config['main_menu']);
		$this->out('main_menu', $config['main_menu']);
	}


	/**
	 * Reverse router
	 */
	public function getUrl($route, $values)
	{
		// Todo
	}


	protected function sortMenu(& $menu)
	{
		uasort($menu, function($a, $b) {
				$wa = empty($a['weight']) ? 50 : $a['weight'];
				$wb = empty($b['weight']) ? 50 : $b['weight'];

				if ($wa == $wb) {
					return strcoll(@$a['title'], @$b['title']);
				} else {
					return $wa - $wb;
				}
			});

		foreach ($menu as & $item) {
			if (!empty($item['children'])) {
				$this->sortMenu($item['children']);
			}
		}
	}


	protected function route($routes, $path)
	{
		// match rules one by one
		foreach($routes as $mask => $args) {
			$m = explode('/', trim($mask, '/'));
			$last = end($m);

			// check length (quickly drop wrong path)
			if ($last != '**' ? count($m) != count($path) : count($m) - 1 > count($path)) {
				continue;
			}

			// compare fragments
			for ($i = 0; $i < count($m); $i++) {
				if (@$m[$i][0] == '$') {
					// variable - match anything
					$a = substr($m[$i], 1);
					$args['outputs'][$a] = $path[$i];
				} else if ($i == count($m) - 1 && $m[$i] == '**') {
					// last part is '**' -- copy tail and finish
					$args['outputs']['path_tail'] = array_slice($path, $i);
					$i = count($m);
					break;
				} else if ($m[$i] != $path[$i]) {
					// fail
					break;
				}
			}
			if ($i < count($m)) {
				// match failed
				continue;
			}

			// match found
			debug_msg("Matched rule [%s]", $mask);
			return $args;
		}

		// no match
		return false;
	}

}

