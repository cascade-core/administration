{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "outputs": {
        "done": true,
        "title": "Documentation"
    },
    "blocks": {
        "version_hd": {
            "block": "core/out/header",
            "x": 0,
            "y": 0,
            "in_val": {
                "text": "Doxygen Documentation",
                "slot_weight": 30
            }
        },
        "scan_doxygen_doc": {
            "block": "admin/scan_doxygen_doc",
            "x": 168,
            "y": 56
        },
        "doxygen_menu": {
            "block": "core/out/menu",
            "x": 454,
            "y": 22,
            "in_con": {
                "enable": [
                    "scan_doxygen_doc",
                    "done"
                ],
                "items": [
                    "scan_doxygen_doc",
                    "menu"
                ]
            }
        },
        "no_doc_message": {
            "block": "core/out/message",
            "x": 456,
            "y": 206,
            "in_con": {
                "enable": [
                    ":not",
                    "scan_doxygen_doc",
                    "done"
                ]
            },
            "in_val": {
                "is_error": true,
                "title": "No documentation found",
                "text": "Please build Doxygen documentation using 'make doc'.",
                "slot_weight": 50
            }
        }
    }
}