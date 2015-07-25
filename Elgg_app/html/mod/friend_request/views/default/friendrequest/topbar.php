<?php

gatekeeper();

//get unread messages
$num_fr = vazco_friend_request::count_friend_requests();

if($num_fr > 0){ ?>
	<a href="<?php echo $vars['url']; ?>pg/friendrequests" class="new_friendrequests" title="<?php echo elgg_echo('newfriendrequests'); ?>">[<?php echo $num_fr; ?>]</a>
<?php } ?>