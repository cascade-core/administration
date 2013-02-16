{
	"_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
	"main_menu": {
		"dashboard": {
			"title": "Dashboard",
			"link": "/admin"
		},
		"devel": {
			"title": "Development",
			"children": {
				"doc": {
					"title": "Documentation",
					"link": "/admin/devel/doc"
				},
				"profiler": {
					"title": "Profiler statistics",
					"link": "/admin/devel/profiler"
				},
				"version": {
					"title": "Version",
					"link": "/admin/devel/version"
				}
			}
		}
	},
	"routes": {
		"/devel/version": {
			"title": "Application and plugin versions",
			"block": "git/example/version",
			"connections": {
			}
		},
		"/devel/profiler": {
			"title": "Profiler statistics",
			"block": "core/page/profiler",
			"connections": {
			}
		},
		"/devel/doc": {
			"title": "Documentation index",
			"block": "core/page/doc",
			"connections": {
			}
		},
		"/devel/doc/block/**": {
			"title": "Documentation",
			"block": "core/page/doc_show",
			"connections": {
			}
		}
	}
}

