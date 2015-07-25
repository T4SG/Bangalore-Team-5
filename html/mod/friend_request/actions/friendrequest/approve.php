<?php

global $CONFIG;
gatekeeper();
action_gatekeeper();

$user = elgg_get_logged_in_user_entity();
if(!$friend = get_entity(get_input("guid",0))) {
	exit;
}

if(remove_entity_relationship($friend->guid, 'friendrequest', $user->guid)) {
	if(isset($CONFIG->events['create']['friend'])) {
		$oldEventHander = $CONFIG->events['create']['friend'];
		$CONFIG->events['create']['friend'] = array();			//Removes any event handlers
	}
	
	$_SESSION['user']->addFriend($friend->guid);
	$friend->addFriend($_SESSION['user']->guid);			//Friends mean reciprical...
	
	if(isset($CONFIG->events['create']['friend'])) {
		$CONFIG->events['create']['friend'] = $oldEventHander;
	}
	
	system_message(sprintf(elgg_echo('friendrequest:successful'), $friend->name));
} else {
	register_error(sprintf(elgg_echo('friendrequest:approvefail'), $friend->name));
}

forward($_SERVER['HTTP_REFERER']);
?>