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
                "block_ref": {
                    "title": "Block reference",
                    "link": "/admin/doc/block"
                },
                "doxygen": {
                    "title": "Doxygen docs",
                    "link": "/admin/doc/doxygen"
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
            "in_val": {
                "label": "Here should be a dashboard, but it is not installed."
            }
        },
        "/devel/version": {
            "title": "Application and plugin versions",
            "block": "admin/page/version"
        },
        "/devel/profiler": {
            "title": "Profiler statistics",
            "block": "core/devel/profiler_stats"
        },
        "/doc/block": {
            "title": "Documentation index",
            "block": "core/devel/doc/index",
            "in_val": {
                "link": "/admin/doc/block/{block}"
            }
        },
        "/doc/block/**": {
            "title": "Documentation",
            "block": "core/devel/doc/show",
            "in_con": {
                "block": [
                    "parent",
                    "path_tail"
                ]
            }
        },
        "/doc/everything": {
            "title": "Documentation",
            "block": "core/devel/doc/everything"
        },
        "/doc/doxygen": {
            "title": "Doxygen Documentation",
            "block": "admin/page/doxygen"
        }
    }
}
