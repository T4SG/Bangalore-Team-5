<?php
	
$friend_guid = (int) get_input("guid");

$friend = get_user($friend_guid);
if (!empty($friend)) {
	$user = elgg_get_logged_in_user_entity();
	
	if (remove_entity_relationship($friend->getGUID(), "friendrequest", $user->getGUID())) {
		
		$user->addFriend($friend->getGUID());
		$friend->addFriend($user->getGUID());			//Friends mean reciprical...
		
		// notify the user about the acceptance
		$subject = elgg_echo("friend_request:approve:subject", array($user->name));
		$message = elgg_echo("friend_request:approve:message", array($friend->name, $user->name));
		
		notify_user($friend->getGUID(), $user->getGUID(), $subject, $message);
		
		system_message(elgg_echo("friend_request:approve:successful", array($friend->name)));
		
		// add to river
		add_to_river("river/relationship/friend/create", "friend", $user->getGUID(), $friend->getGUID());
		add_to_river("river/relationship/friend/create", "friend", $friend->getGUID(), $user->getGUID());
	} else {
		register_error(elgg_echo("friend_request:approve:fail", array($friend->name)));
	}
}

forward(REFERER);
	