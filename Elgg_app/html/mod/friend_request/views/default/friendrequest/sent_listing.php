<?php

	/**
	 * Modified listing view for friend request mod
	 * 
	 * @uses $vars['entity'] The user entity
	 * @uses $vars['token'] The elgg action token
	 * @uses $vars['ts'] The elgg action ts
	 * @uses $vars['url'] The site's base url
	 */
		$info = "";	

		$icon = elgg_view(
				"profile/icon", array(
										'entity' => $vars['entity'],
										'size' => 'small',
									  )
			);
	
		// Simple XFN
		$rel = "";
		if (elgg_get_page_owner_guid() == $vars['entity']->guid)
			$rel = 'me';
		else if (check_entity_relationship(elgg_get_page_owner_guid(), 'friend', $vars['entity']->guid))
			$rel = 'friend';
		
		$guid = $vars['entity']->guid;
		$ts = time();
		$token = generate_action_token($ts);
		if ($vars['entity']->type == group){
			$info .= "<p><b><a href=\"" . $vars['entity']->getUrl() . "\" rel=\"$rel\">" . $vars['entity']->name . "</a></b></p>";
			$info .= '<p><a href="'. $vars['url'] . 'action/groups/join?group_guid=' . $guid . '">'.elgg_echo('grouprequest:approve').'</a> | ';
			$info .= '<a href="'. $vars['url'] . 'action/groups/killinvite?group_guid=' . $guid . '">'.elgg_echo('grouprequest:kill').'</a>';;		
		}else{			
			$info .= "<p><b><a href=\"" . $vars['entity']->getUrl() . "\" rel=\"$rel\">" . $vars['entity']->name . "</a></b></p>";
			$info .= '<a href="'. $vars['url'] . 'action/friendrequest/cancel?guid=' . $guid . '&__elgg_token=' . $token . '&__elgg_ts=' . $ts . '">'.elgg_echo('friendrequest:cancel').'</a></p>';
		}
		$location = $vars['entity']->location;
		if (!empty($location)) {
			$info .= "<p class=\"owner_timestamp\">" . elgg_echo("profile:location") . ": " . elgg_view("output/tags",array('value' => $vars['entity']->location)) . "</p>";
		}
		
		echo elgg_view_listing($icon, $info);
			
?>