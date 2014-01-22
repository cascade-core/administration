{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "outputs": {
        "done": true,
        "title": "Documentation"
    },
    "blocks": {
        "version_hd": {
            "block": "core/out/header",
            "x": 228,
            "y": 0,
            "in_con": {
                "enable": [
                    "version",
                    "done"
                ]
            },
            "in_val": {
                "text": "Version",
                "slot_weight": 30
            }
        },
        "version": {
            "block": "core/devel/version",
            "x": 0,
            "y": 15,
            "in_val": {
                "format": "details",
                "slot_weight": 40
            }
        },
        "phpinfo_hd": {
            "block": "core/out/header",
            "x": 210,
            "y": 190,
            "in_con": {
                "enable": [
                    "phpinfo",
                    "done"
                ]
            },
            "in_val": {
                "text": "PHP Info",
                "slot_weight": 60
            }
        },
        "phpinfo": {
            "block": "core/devel/phpinfo",
            "x": 10,
            "y": 242,
            "in_val": {
                "slot_weight": 70
            }
        }
    }
}