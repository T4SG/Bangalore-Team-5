<?php 

class vazco_friend_request{
	public function count_friend_requests() {
		global $CONFIG;
		$count = elgg_get_entities_from_relationship(array(
			'relationship' => 'friendrequest', 
			'relationship_guid' => elgg_get_logged_in_user_guid(),
			'inverse_relationship' => true,
			'count' => true,
		));
		return $count;
	}
	
	public function count_sent_friend_requests() {
		global $CONFIG;
		$count = elgg_get_entities_from_relationship(array(
			'relationship' => 'friendrequest', 
			'relationship_guid' => elgg_get_logged_in_user_guid(),
			'inverse_relationship' => false,
			'count' => true,
		));
		return $count;
	}
	/**
	 * list_entities_from_relationship modified a little bit...
	 */
	public function list_fr_for_user($relationship_guid,$inverse_relationship = true, $element_view = 'friendrequest/listing') {

		$limit = (int) $limit;
		$offset = (int) get_input('offset');
		$count = elgg_get_entities_from_relationship(array(
			'relationship' => 'friendrequest', 
			'relationship_guid' => $relationship_guid,
			'inverse_relationship' => $inverse_relationship,
			'count' => true,
			'type' => 'user',
		));
		$entities = elgg_get_entities_from_relationship(array(
			'relationship' => 'friendrequest', 
			'relationship_guid' => $relationship_guid,
			'inverse_relationship' => $inverse_relationship,
			'type' => 'user',
			'limit' => 10,
			'offset' => $offset,
		));

		$count_group = elgg_get_entities_from_relationship(array(
			'relationship' => 'invited', 
			'relationship_guid' => $relationship_guid,
			'inverse_relationship' => $inverse_relationship,
			'count' => true,
			'type' => 'group',
		));
		
		$count = $count + $count_group;//get_entities_from_relationship($relationship2, $relationship_guid, $inverse_relationship, $type2, $subtype, $owner_guid, "", $limit, $offset, true);
		$entities_group = elgg_get_entities_from_relationship(array(
			'relationship' => 'invited', 
			'relationship_guid' => $relationship_guid,
			'inverse_relationship' => $inverse_relationship,
			'type' => 'group',
			'limit' => 10,
			'offset' => $offset,
		));

		$entity_array = $entities2;
		if (is_array($entities) && is_array($entities_group)){
			$entity_array = array_merge($entities_group, $entities);
		}else if (is_array($entities)){
			$entity_array = $entities;
		}else{
			$entity_array = $entities_group;
		}
		return vazco_friend_request::view_entity_list($entity_array, $count, $offset, $limit, $fullview, $viewtypetoggle, true, $element_view);
	}	
	
	//list invitations sent by this user to other users
	function list_sent_fr_for_user($relationship_guid,$inverse_relationship = false) {
		$element_view = 'friendrequest/sent_listing';
		return vazco_friend_request::list_fr_for_user($relationship_guid,false, $element_view);
	}

	//elgg_view_entity_list just with the view modififed
	function view_entity_list($entities, $count, $offset, $limit, $fullview = true, $viewtypetoggle = true, $pagination = true, $element_view='friendrequest/listing') {
		$count = (int) $count;
		$offset = (int) $offset;
		$limit = (int) $limit;
		
		$context = elgg_get_context();
		
		$html = elgg_view('friendrequest/entity_list',array(
												'entities' => $entities,
												'count' => $count,
												'offset' => $offset,
												'limit' => $limit,
												'baseurl' => $_SERVER['REQUEST_URI'],
												'fullview' => $fullview,
												'context' => $context, 
												'viewtypetoggle' => $viewtypetoggle,
												'viewtype' => get_input('search_viewtype','list'), 
												'pagination' => $pagination,
												'element_view' => $element_view,
											  ));
		return $html;
	}
}
?>