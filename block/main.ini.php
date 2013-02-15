;<?php exit(); __HALT_COMPILER; ?>


[outputs]
done = "1"
title = "Administration"

[block:skeleton]
.block = "core/out/page"
.x = 34
.y = 15

[block:slot_header]
.block = "core/out/slot"
.x = 221
.y = 138
slot[] = "slot_holder:name"
slot_weight = "10"
name = "header"

[block:slot_default]
.block = "core/out/slot"
.x = 468
.y = 594
slot[] = "slot_main:name"
slot_weight = "40"
name = "default"

[block:slot_footer]
.block = "core/out/slot"
.x = 218
.y = 651
slot[] = "slot_holder:name"
slot_weight = "90"
name = "footer"

[block:message_queue]
.block = "core/out/message_queue"
.x = 660
.y = 612
slot[] = "slot_default:name"
slot_weight = "1"

[block:html_head]
.block = "core/out/raw"
.x = 226
.y = 0
enable[] = "skeleton:done"
data = "<!-- html head -->
<link rel='stylesheet' href='/core/style/basic.css' type='text/css'>
<link rel='stylesheet' href='/plugin/admin/style/main.css' type='text/css'>
"
slot = "html_head"
slot_weight = "20"

[block:slot_holder]
.block = "core/out/slot"
.x = 0
.y = 278
slot = "html_body"
slot_weight = "20"
name = "page_holder"

[block:footer_version]
.block = "git/version"
.x = 469
.y = 231
link = "/git"
slot[] = "slot_main_menu_underlay:name"
slot_weight = "80"

[block:slot_menu]
.block = "core/out/slot"
.x = 471
.y = 455
slot[] = "slot_main:name"
slot_weight = "10"
name = "main_menu"

[block:slot_main]
.block = "core/out/slot"
.x = 218
.y = 486
slot[] = "slot_holder:name"
slot_weight = "40"
name = "main"

[block:main_header]
.block = "core/out/header"
.x = 466
.y = 27
level = "1"
text = "Administration"
link = "/admin"
slot[] = "slot_header:name"
slot_weight = "10"

[block:slot_main_menu_underlay]
.block = "core/out/slot"
.x = 219
.y = 295
slot[] = "slot_holder:name"
slot_weight = "1"
name = "main_menu_underlay"


; vim:filetype=dosini:
