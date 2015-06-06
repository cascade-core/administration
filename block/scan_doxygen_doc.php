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

class B_admin__scan_doxygen_doc extends \Cascade\Core\Block
{

	protected $inputs = array(
	);

	protected $outputs = array(
		'menu' => true,
		'done' => true,
	);


	public function main()
	{
		$relative_index_file = 'doc/doxygen/html/index.html';
		$menu = array();

		// Application
		if (file_exists(DIR_APP.$relative_index_file)) {
			$menu[] = array(
				'title' => _('Application'),
				'link' => str_replace(DIR_ROOT, '/', DIR_APP).$relative_index_file,
			);
		}

		// Core
		if (file_exists(DIR_CORE.$relative_index_file)) {
			$menu[] = array(
				'title' => _('Cascade Core'),
				'link' => str_replace(DIR_ROOT, '/', DIR_CORE).$relative_index_file,
			);
		}

		// Plugins
                foreach (get_plugin_list() as $plugin) {
                        if (file_exists(DIR_PLUGIN.$plugin.'/'.$relative_index_file)) {
				$menu[] = array(
					'title' => sprintf(_('Plugin: %s'), $plugin),
					'link' => '/plugin/'.$plugin.'/'.$relative_index_file,
				);
			}
		}

		// Libraries
		foreach (glob(DIR_ROOT."/lib/cascade/*/") as $lib) {
                        if (file_exists($lib.'/'.$relative_index_file)) {
				$menu[] = array(
					'title' => sprintf(_('Library: %s'), basename($lib)),
					'link' => preg_replace("\xfe^".DIR_ROOT."\xfe", "", $lib).'/'.$relative_index_file,
				);
			}
		}

		$this->out('menu', $menu);
		$this->out('done', !empty($menu));
	}

}

