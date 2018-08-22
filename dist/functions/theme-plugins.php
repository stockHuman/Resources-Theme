<?php

add_filter('site_transient_update_plugins', 'cslpres_remove_update_nag');
function cslpres_remove_update_nag($value) {
	unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
	return $value;
}

add_action('sublanguage_custom_switch', 'cslpres_lang_switch', 10, 2);

/**
 * @param array of WP_Post language custom post
 * @param Sublanguage_site $this Sublanguage instance.
 */
function cslpres_lang_switch($languages, $sublanguage) {

?>
<ul>
<?php foreach ($languages as $language) {

	if (!($sublanguage->current_language->ID == $language->ID)) : ?>
	<li class="<?php echo $language->post_name; ?> <?php  echo 'current'; ?>">
		<a href="<?php echo $sublanguage->get_translation_link($language); ?>"><?php echo $language->post_title; ?></a>
	</li>
	<?php endif;
 } ?>
</ul>
<?php

}
