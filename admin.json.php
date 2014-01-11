{
	"_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
	"main_menu": {
                "dashboard": {
                        "title": "Dashboard",
                        "link": "/admin",
                        "weight": 10
                },
		"documentation": {
			"title": "Documentation",
			"weight": 70,
			"children": {
				"profiler": {
					"title": "Block reference",
					"link": "/admin/doc/block"
				}
			}
		},
		"devel": {
			"title": "Development",
			"weight": 80,
			"children": {
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
		"/": {
			"title": "Administration",
			"block": "core/out/placeholder",
			"connections": {
				"label": "Here should be a dashboard, but it is not installed."
			}
		},
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
		"/doc/block": {
			"title": "Documentation index",
			"block": "core/devel/doc/index",
			"connections": {
				"link": "/admin/doc/block/{block}"
			}
		},
		"/doc/block/**": {
			"title": "Documentation",
			"block": "core/devel/doc/show",
			"connections": {
				"block": ["parent", "path_tail"]
			}
		},
		"/doc/everything": {
			"title": "Documentation",
			"block": "core/devel/doc/everything",
			"connections": {
			}
		}
	}
}

