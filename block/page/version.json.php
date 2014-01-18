{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "outputs": {
        "done": [
            "doc_index:done"
        ],
        "title": "Documentation"
    },
    "block:version_hd": {
        ".block": "core/out/header",
        ".x": 228,
        ".y": 0,
        "enable": [
            "version:done"
        ],
        "text": "Version",
        "slot_weight": 30
    },
    "block:version": {
        ".block": "core/devel/version",
        ".x": 0,
        ".y": 15,
        "format": "details",
        "slot_weight": 40
    },
    "block:phpinfo_hd": {
        ".block": "core/out/header",
        ".x": 210,
        ".y": 190,
        "enable": [
            "phpinfo:done"
        ],
        "text": "PHP Info",
        "slot_weight": 60
    },
    "block:phpinfo": {
        ".block": "core/devel/phpinfo",
        ".x": 10,
        ".y": 242,
        "slot_weight": 70
    }
}