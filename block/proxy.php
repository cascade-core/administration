<?php
/*
 * Copyright (c) 2012, Josef Kufner  <jk@frozen-doe.net>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

class B_admin__proxy extends \Cascade\Core\Block
{

	protected $inputs = array(
		'config' => null,
		'path' => null,
	);

	protected $connections = array(
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
			$ok = $this->cascadeAdd('main', $route['block'], true, (array) @ $route['in_con'], (array) @ $route['in_val']);
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

