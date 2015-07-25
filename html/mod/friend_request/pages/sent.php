<?php
	// Load form model
	require_once(dirname(dirname(__FILE__))."/models/model.php");
	
	elgg_set_context('friends');
	
	if (!$owner = elgg_get_page_owner_entity()) {
		gatekeeper();
		elgg_set_page_owner_guid( elgg_get_logged_in_user_guid() );
		$owner = elgg_get_logged_in_user_entity();
	}
	
	$title = sprintf(elgg_echo('friendrequests:title'), $owner->name);
	$body = vazco_friend_request::list_sent_fr_for_user(elgg_get_logged_in_user_guid());
	
	$body = elgg_view_layout('content', array(
		'filter' => '',
		'content' => $body,
		'title' => $title,
		'buttons' => '',
	));
	echo elgg_view_page($title, $body);	
?>