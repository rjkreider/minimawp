<?php

function mwp_custom_menu() {
	register_nav_menu('mwp-custom-menu',__('Top Menu'));
}
add_action('init', 'mwp_custom_menu');


