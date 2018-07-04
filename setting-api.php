<?php 


function social_share_menu_item()
{
  add_submenu_page("options-general.php", "Social Share", "Social Share", "manage_options", "social-share", "social_share_page"); 
}

add_action("admin_menu", "social_share_menu_item");


function social_share_page()
{
   ?>
      <div class="wrap">
         <h1><?php esc_html_e('Social Media Sharing Plugin', 'mypluginslug1'); ?></h1>
 
         <form method="post" action="options.php">
            <?php
               settings_fields("social_share_config_section");
 
               do_settings_sections("social-share");
               
               submit_button(); 
            ?>
         </form>
      </div>
   <?php
}

add_action("admin_init", "social_share_buttons_settings");

function social_share_buttons_settings()
{
    add_settings_section("social_share_buttons_section", esc_html__('Social meida share buttons Options', 'mypluginslug1'), null, "social-share");

    add_settings_field("social-share-facebook", esc_html__('Show Facebook share button?', 'mypluginslug1'), "social_share_facebook_checkbox", "social-share", "social_share_buttons_section");

    add_settings_field("social-share-twitter", esc_html__('Show Twitter share button?' , 'mypluginslug1'), "social_share_twitter_checkbox", "social-share", "social_share_buttons_section");

    add_settings_field("social-share-linkedin", esc_html__('Show LinkedIn share button?','mypluginslug1'), "social_share_linkedin_checkbox", "social-share", "social_share_buttons_section");

    add_settings_field("social-share-google-plus", esc_html__('Show Google+ share button?','mypluginslug1'), "social_share_google_checkbox", "social-share", "social_share_buttons_section");

    add_settings_field("social-share-reddit", esc_html__('Show Reddit share button?','mypluginslug1'), "social_share_reddit_checkbox", "social-share", "social_share_buttons_section");

    add_settings_field("social-share-pinterest", esc_html__('Show Pinterest share button?','mypluginslug1'), "social_share_pinterest_checkbox", "social-share", "social_share_buttons_section");

    add_settings_field("social-share-tumblr", esc_html__('Show Tumblr share button?','mypluginslug1'), "social_share_tumblr_checkbox", "social-share", "social_share_buttons_section");
 
    register_setting("social_share_config_section", "social-share-facebook", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "social-share-twitter", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "social-share-linkedin", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "social-share-google-plus", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "social-share-reddit", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "social-share-pinterest", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "social-share-tumblr", array('sanitize_callback' => 'absint'));
}

function social_share_facebook_checkbox()
{  
   ?>
    <label class="switch">
      <input type="checkbox" name="social-share-facebook" value="1" <?php checked(1, get_option('social-share-facebook'), true); ?> />
      <span class="slider round"></span>
    </label> 
   <?php
}

function social_share_twitter_checkbox()
{  
   ?>
    <label class="switch">
      <input type="checkbox" name="social-share-twitter" value="1" <?php checked(1, get_option('social-share-twitter'), true); ?> />
      <span class="slider round"></span>
    </label>
   <?php
}

function social_share_linkedin_checkbox()
{  
    ?>
    <label class="switch">
      <input type="checkbox" name="social-share-google-plus" value="1" <?php checked(1, get_option('social-share-google-plus'), true); ?> /> 
      <span class="slider round"></span>
    </label>
    <?php
}

function social_share_google_checkbox()
{  
    ?>
    <label class="switch">
      <input type="checkbox" name="social-share-linkedin" value="1" <?php checked(1, get_option('social-share-linkedin'), true); ?> /> 
      <span class="slider round"></span>
    </label>
    <?php
}

function social_share_pinterest_checkbox()
{  
    ?>
    <label class="switch">
      <input type="checkbox" name="social-share-pinterest" value="1" <?php checked(1, get_option('social-share-pinterest'), true); ?> /> 
      <span class="slider round"></span>
    </label>
    <?php
}

function social_share_reddit_checkbox()
{  
    ?>
    <label class="switch">
      <input type="checkbox" name="social-share-reddit" value="1" <?php checked(1, get_option('social-share-reddit'), true); ?> /> 
      <span class="slider round"></span>
    </label>
    <?php
}

function social_share_tumblr_checkbox()
{  
    ?>
    <label class="switch">
      <input type="checkbox" name="social-share-tumblr" value="1" <?php checked(1, get_option('social-share-tumblr'), true); ?> /> 
      <span class="slider round"></span>
    </label>
    <?php
}

add_action("admin_init", "social_share_plugin_options");

function social_share_plugin_options()
{
    add_settings_section("social_share_plugin_options", esc_html__('Plugin Options', 'mypluginslug1'), null, "social-share");
    
    add_settings_field("show-on-page", esc_html__('Hide share buttons on Pages?', 'mypluginslug1'), "show_button_on_pages", "social-share", "social_share_plugin_options");

    add_settings_field("show-on-posts", esc_html__('Hide share buttons on Posts?', 'mypluginslug1'), "show_button_on_posts", "social-share", "social_share_plugin_options");

    add_settings_field("load-font-awesome", esc_html__('Load Font-awesome icons?', 'mypluginslug1'), "load_font_awesome", "social-share", "social_share_plugin_options");

    add_settings_field("show-icons-as", "<div class='sahre-button-type'>".esc_html__('Sahre button type?', 'mypluginslug1')."</div>", "show_icons_as", "social-share", "social_share_plugin_options");

    add_settings_field("show-menu-fixed", esc_html__('Social media menu location?', 'mypluginslug1'), "show_menu_as_fixed", "social-share", "social_share_plugin_options");

    add_settings_field("social-share-del-data", esc_html__('Delete all plugin data on unistall?','mypluginslug1'), "social_share_del_data_fun", "social-share", "social_share_plugin_options");
 
    register_setting("social_share_config_section", "show-on-page", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "show-on-posts", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "load-font-awesome", array('sanitize_callback' => 'absint'));
    register_setting("social_share_config_section", "show-icons-as", array('sanitize_callback' => 'sanitize_text_field') );
    register_setting("social_share_config_section", "show-menu-fixed", array('sanitize_callback' => 'sanitize_text_field') );
    register_setting("social_share_config_section", "social-share-del-data", array('sanitize_callback' => 'absint'));
}

function show_button_on_pages() {
    ?>
    <label class="switch">
      <input type="checkbox" name="show-on-page" value="1" <?php checked(1, get_option('show-on-page'), true); ?> />
      <span class="slider round"></span>
    </label> 
    <?php
}

function show_button_on_posts() {
    ?>
    <label class="switch">
      <input type="checkbox" name="show-on-posts" value="1" <?php checked(1, get_option('show-on-posts'), true); ?> /> 
      <span class="slider round"></span>
    </label>

    <?php
}

function load_font_awesome() {
    ?>
    <label class="switch">
      <input id="id-font-awesome" type="checkbox" name="load-font-awesome" value="1" <?php checked(1, get_option('load-font-awesome'), true); ?> />
      <span class="slider round"></span>
    </label>

    <?php
}

function show_icons_as() {
    ?>
    <label class="radio-button radio-button-with-img">
      <input type="radio" name="show-icons-as" value="icon" <?php checked('icon', get_option('show-icons-as'), true); ?>>
      <img class="icon" src="<?php echo esc_url(My_Plugin_Path.'/img/icon.png'); ?>">
    </label>
    <label class="radio-button radio-button-with-img">
      <input type="radio" name="show-icons-as" value="text" <?php checked('text', get_option('show-icons-as'), true); ?>>
      <img class="text" src="<?php echo esc_url(My_Plugin_Path.'/img/text.png'); ?>">
    </label>
    <?php
}

function show_menu_as_fixed() {
    ?>

    <label class="radio-button radio-button-with-img">
      <input type="radio" name="show-menu-fixed" value="right" <?php checked(get_option('show-menu-fixed'), "right" , true); ?>>
      <img class="icon" src="<?php echo esc_url(My_Plugin_Path.'/img/btn-right.png'); ?>">
    </label>
    <label class="radio-button radio-button-with-img">
      <input type="radio" name="show-menu-fixed" value="no" <?php checked(get_option('show-menu-fixed'), "no" , true); ?>>
      <img class="text" src="<?php echo esc_url(My_Plugin_Path.'/img/default.png'); ?>">
    </label>
    <label class="radio-button radio-button-with-img">
      <input type="radio" name="show-menu-fixed" value="left" <?php checked(get_option('show-menu-fixed'), "left" , true); ?>>
      <img class="text" src="<?php echo esc_url(My_Plugin_Path.'/img/btn-left.png'); ?>">
    </label>

    <?php
}


function social_share_del_data_fun() {
    ?>
    <label class="switch">
      <input type="checkbox" name="social-share-del-data" value="1" <?php checked(1, get_option('social-share-del-data'), true); ?> />
      <span class="slider round"></span>
    </label>

    <?php
}

?>