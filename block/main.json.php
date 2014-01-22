{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "outputs": {
        "done": 1,
        "title": "Administration"
    },
    "blocks": {
        "skeleton": {
            "block": "core/out/page",
            "x": 34,
            "y": 171
        },
        "slot_header": {
            "block": "core/out/slot",
            "x": 221,
            "y": 294,
            "in_con": {
                "slot": [
                    "slot_holder",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 10,
                "name": "header"
            }
        },
        "slot_default": {
            "block": "core/out/slot",
            "x": 468,
            "y": 750,
            "in_con": {
                "slot": [
                    "slot_main",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 40,
                "name": "default"
            }
        },
        "slot_footer": {
            "block": "core/out/slot",
            "x": 218,
            "y": 807,
            "in_con": {
                "slot": [
                    "slot_holder",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 90,
                "name": "footer"
            }
        },
        "message_queue": {
            "block": "core/out/message_queue",
            "x": 660,
            "y": 768,
            "in_con": {
                "slot": [
                    "slot_default",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 1
            }
        },
        "html_head": {
            "block": "core/out/raw",
            "x": 226,
            "y": 156,
            "in_con": {
                "enable": [
                    "skeleton",
                    "done"
                ]
            },
            "in_val": {
                "slot": "html_head",
                "slot_weight": 20,
                "data": "<!-- html head -->\n<link rel='stylesheet' href='/core/style/basic.css' type='text/css'>\n<link rel='stylesheet' href='/plugin/admin/style/main.css' type='text/css'>\n"
            }
        },
        "slot_holder": {
            "block": "core/out/slot",
            "x": 0,
            "y": 434,
            "in_val": {
                "slot": "html_body",
                "slot_weight": 20,
                "name": "page_holder"
            }
        },
        "footer_version": {
            "block": "git/version",
            "x": 469,
            "y": 387,
            "in_val": {
                "link": "/admin/devel/version",
                "slot_weight": 80
            },
            "in_con": {
                "slot": [
                    "slot_main_menu_underlay",
                    "name"
                ]
            }
        },
        "slot_menu": {
            "block": "core/out/slot",
            "x": 471,
            "y": 611,
            "in_con": {
                "slot": [
                    "slot_main",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 10,
                "name": "main_menu"
            }
        },
        "slot_main": {
            "block": "core/out/slot",
            "x": 218,
            "y": 642,
            "in_con": {
                "slot": [
                    "slot_holder",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 40,
                "name": "main"
            }
        },
        "main_header": {
            "block": "core/out/header",
            "x": 466,
            "y": 183,
            "in_val": {
                "level": 1,
                "text": "Administration",
                "link": "/",
                "slot_weight": 10
            },
            "in_con": {
                "slot": [
                    "slot_header",
                    "name"
                ]
            }
        },
        "slot_main_menu_underlay": {
            "block": "core/out/slot",
            "x": 219,
            "y": 451,
            "in_con": {
                "slot": [
                    "slot_holder",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 1,
                "name": "main_menu_underlay"
            }
        },
        "main_menu": {
            "block": "core/out/menu",
            "x": 755,
            "y": 485,
            "in_con": {
                "items": [
                    "admin",
                    "main_menu"
                ],
                "active_uri": [
                    "router",
                    "path"
                ],
                "slot": [
                    "slot_menu",
                    "name"
                ]
            },
            "in_val": {
                "layout": "tree",
                "slot_weight": 20
            }
        },
        "error_message": {
            "block": "core/out/message",
            "x": 745,
            "y": 0,
            "in_con": {
                "enable": [
                    ":not",
                    "admin",
                    "done"
                ]
            },
            "in_val": {
                "is_error": 1,
                "error_title": "Sorry",
                "error_text": "Page not found.",
                "http_status_code": 404
            }
        },
        "admin": {
            "block": "admin/proxy",
            "x": 444,
            "y": 8
        }
    }
}