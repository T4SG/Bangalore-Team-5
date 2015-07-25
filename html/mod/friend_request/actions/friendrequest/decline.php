<?php

global $CONFIG;
gatekeeper();
action_gatekeeper();

$user = elgg_get_logged_in_user_entity();
if(!$friend = get_entity(get_input("guid",0))) {
	exit;
}

if(remove_entity_relationship($friend->guid, 'friendrequest', $user->guid)) {
	system_message(elgg_echo("friendrequest:remove:success"));
} else {
	register_error(elgg_echo("friendrequest:remove:fail"));
}

forward($_SERVER['HTTP_REFERER']);
?>