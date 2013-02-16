{
	"_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
	"main_menu": {
		"dashboard": {
			"title": "Dashboard",
			"link": "/admin",
			"weight": 10
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
					"link": "/admin/devel/profiler",
					"weight": 80
				},
				"version": {
					"title": "Version",
					"link": "/admin/devel/version",
					"weight": 80
				}
			}
		}
	},
	"routes": {
		"/devel/version": {
			"title": "Application and plugin versions",
			"block": "admin/page/version",
			"connections": {
			}
		},
		"/devel/profiler": {
			"title": "Profiler statistics",
			"block": "core/devel/profiler_stats",
			"connections": {
			}
		},
		"/devel/doc": {
			"title": "Documentation index",
			"block": "core/devel/doc/index",
			"connections": {
				"link": "/admin/devel/doc/block/{block}"
			}
		},
		"/devel/doc/block/**": {
			"title": "Documentation",
			"block": "core/devel/doc/show",
			"connections": {
				"block": ["parent", "path_tail"]
			}
		}
	}
}

