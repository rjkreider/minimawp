<?php

function mwp_custom_menu() {
	register_nav_menu('mwp-custom-menu',__('Top Menu'));
}
add_action('init', 'mwp_custom_menu');



function add_theme_menu_item()
{
	add_menu_page("Minimawp Settings", "Minimawp", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Minimawp Theme Settings</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function display_disqus_element()
{
	?>
		<input type="checkbox" name="theme_disqus" value="1" <?php checked(1, get_option('theme_disqus'), true); ?> /> 
	<?php
}
function display_disqus_shortname()
{
?>
        <input type="text" name="disqus_shortname" id="disqus_shortname"
 value="<?php echo get_option('disqus_shortname'); ?>" />.disqus.com
<?php
}


function display_theme_panel_fields()
{

add_settings_section("section", "All Settings", null, "theme-options");
add_settings_field("theme_disqus", "Enable Disqus comment system?", "display_disqus_element", "theme-options", "section");
add_settings_field("disqus_shortname", "Disqus Shortname", "display_disqus_shortname","theme-options", "section");

register_setting("section", "theme_disqus");
register_setting("section", "disqus_shortname");
}

add_action("admin_init", "display_theme_panel_fields");
