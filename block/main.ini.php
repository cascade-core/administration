;<?php exit(); __HALT_COMPILER; ?>


[outputs]
done = "1"
title = "Administration"

[block:skeleton]
.block = "core/out/page"
.x = 34
.y = 171

[block:slot_header]
.block = "core/out/slot"
.x = 221
.y = 294
slot[] = "slot_holder:name"
slot_weight = "10"
name = "header"

[block:slot_default]
.block = "core/out/slot"
.x = 468
.y = 750
slot[] = "slot_main:name"
slot_weight = "40"
name = "default"

[block:slot_footer]
.block = "core/out/slot"
.x = 218
.y = 807
slot[] = "slot_holder:name"
slot_weight = "90"
name = "footer"

[block:message_queue]
.block = "core/out/message_queue"
.x = 660
.y = 768
slot[] = "slot_default:name"
slot_weight = "1"

[block:html_head]
.block = "core/out/raw"
.x = 226
.y = 156
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
.y = 434
slot = "html_body"
slot_weight = "20"
name = "page_holder"

[block:footer_version]
.block = "git/version"
.x = 469
.y = 387
link = "/admin/version"
slot[] = "slot_main_menu_underlay:name"
slot_weight = "80"

[block:slot_menu]
.block = "core/out/slot"
.x = 471
.y = 611
slot[] = "slot_main:name"
slot_weight = "10"
name = "main_menu"

[block:slot_main]
.block = "core/out/slot"
.x = 218
.y = 642
slot[] = "slot_holder:name"
slot_weight = "40"
name = "main"

[block:main_header]
.block = "core/out/header"
.x = 466
.y = 183
level = "1"
text = "Administration"
link = "/admin"
slot[] = "slot_header:name"
slot_weight = "10"

[block:slot_main_menu_underlay]
.block = "core/out/slot"
.x = 219
.y = 451
slot[] = "slot_holder:name"
slot_weight = "1"
name = "main_menu_underlay"

[block:main_menu]
.block = "core/out/menu"
.x = 755
.y = 485
items[] = "admin:main_menu"
layout = "tree"
active_uri[] = "router:path"
slot[] = "slot_menu:name"
slot_weight = "20"

[block:error_message]
.block = "core/out/message"
.x = 745
.y = 0
enable[] = ":not"
enable[] = "admin:done"
is_error = "1"
error_title = "Sorry"
error_text = "Page not found."
http_status_code = "404"

[block:admin]
.block = "admin/proxy"
.x = 444
.y = 8


; vim:filetype=dosini:
