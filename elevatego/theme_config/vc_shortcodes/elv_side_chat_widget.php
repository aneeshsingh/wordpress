<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$output = elv_live_chat_area();

print balanceTags($output);
