<?php

/**
 * Friend Request Mod for Elgg - By Zac
 * 
 * Updates: http://www.addicted2kicks.com/devblog/
 *
 * This plugin requires a friend request to be made before someone can become friends.
 * Once the request is approved then both users will be friends.
 * (By default Elgg will let you friend someone and they don't friend you back unless
 * they want. I'd call this more of a "fan" than a "friend" so this mod will make all
 * new relationships work both ways.
 */

require_once(dirname(__FILE__)."/models/model.php");

function iagree_init() {
	global $CONFIG;
	
	//Load translations file (TODO: I don't think this is required anymore?)
	register_translations($CONFIG->pluginspath . "friend_request/languages/");
	
	//Register our CSS for the topbar notification
	elgg_extend_view('css','friendrequest/css');
	
	//Extend topbar to add our link if needed
	elgg_extend_view('elgg_topbar/extend','friendrequest/topbar');
	
	//This overwrites the original friend requesting stuff.
	elgg_register_action("friends/add", $CONFIG->pluginspath . "friend_request/actions/friendrequest/add.php", false);
	
	//Our friendrequest handlers...
	elgg_register_action("friendrequest/approve", $CONFIG->pluginspath . "friend_request/actions/friendrequest/approve.php");
   	elgg_register_action("friendrequest/decline", $CONFIG->pluginspath . "friend_request/actions/friendrequest/decline.php");
   	elgg_register_action("friendrequest/cancel", $CONFIG->pluginspath . "friend_request/actions/friendrequest/cancel.php");
   	
   	//We need to override the friend remove action to remove the relationship we created
   	elgg_register_action("friends/remove", $CONFIG->pluginspath . "friend_request/actions/friendrequest/removefriend.php");
	
	//Regular Elgg engine sends out an email via an event. The 400 priority will let us run first.
	//Then we return false to stop the event chain. The normal event handler will never get to run.
	elgg_register_event_handler('create','friend','iagree_event_create_friend',400);
	
	//Handle our add action event:
	elgg_register_event_handler('create','friendrequest','iagree_event_create_friendrequest');
	
	//This will let uesrs view their friend requests
	elgg_register_page_handler('friendrequests','friendrequests_page_handler');
	elgg_register_event_handler('pagesetup', 'system', 'friendrequest_pagesetup');
}

function iagree_event_create_friend($event, $object_type, $object) {
	global $CONFIG;
		
	if (($object instanceof ElggRelationship) && ($event == 'create') && ($object_type == 'friend') ) {
		//We don't want anything happening here... (no email/etc)
		
		//Returning false will interrupt the rest of the chain.
		//The normal handler for the create friend event has a priority of 500 so it will never be called.	
		return false;
	}
	return true; //Shouldn't get here...
}

//Allow us to send an notification email:
function iagree_event_create_friendrequest($event, $object_type, $object) {
	global $CONFIG;
	if (($object instanceof ElggRelationship) && ($event == 'create') && ($object_type == 'friendrequest')) {
		$user_one = get_entity($object->guid_one);
		$user_two = get_entity($object->guid_two);
		
		$view_friends_url = $CONFIG->url . "pg/friendrequests";
		
		// Notify target user
		return notify_user($object->guid_two, $object->guid_one, sprintf(elgg_echo('friendrequest:newfriend:subject'), $user_one->name), 
			sprintf(elgg_echo("friendrequest:newfriend:body"), $user_one->name, $view_friends_url)); 
	}
}
function friendrequest_pagesetup(){
	//turn off friends of friends link
	elgg_unregister_menu_item('page', 'friends:of');
	if (elgg_get_context() == 'friends'){
		$requests = vazco_friend_request::count_friend_requests();
		$text = elgg_echo ( 'friend_requests:list' );
		if ($requests){
			$text .= " [{$requests}]";
		}
		elgg_register_menu_item('page', array(
			'name' => 'friendrequests/list', 
			'text' => $text,
			'href' => $CONFIG->wwwroot . 'pg/friendrequests',
		));
		$requests = vazco_friend_request::count_sent_friend_requests();
		$text = elgg_echo ( 'friend_requests:sent' );
		if ($requests){
			$text .= " [{$requests}]";
		}
		elgg_register_menu_item('page', array(
			'name' => 'friendrequests/sent', 
			'text' => $text,
			'href' => $CONFIG->wwwroot . 'pg/friendrequests/sent',
		));
	}
}
function friendrequests_page_handler($page_elements) {
	global $CONFIG;
	
	//Keep the URLs uniform:
	if (isset($page_elements[1])) {
		forward("pg/friendrequests");
	}
	
	switch($page_elements[0]) {
	case "sent":		
						include($CONFIG->pluginspath . "friend_request/pages/sent.php");
						break;
	default:
						include($CONFIG->pluginspath . "friend_request/pages/list.php");
						break;
	}		
}

elgg_register_event_handler('init','system','iagree_init',100);
?>