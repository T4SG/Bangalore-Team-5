<?php
$post_data = array(
    // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
	    // For promotional, this will be ignored by the SMS gateway
		    'From'   => '8142910082',
			    'To'    => '7204805813',
				    'Body'  => 'Reply 1/2.. to choose an appointment with Dr. Foo',
					);
 
 $exotel_sid = "cfg55 "; // Your Exotel SID
 $exotel_token = "3dd36be8ccf1537a6ece2cd50b8231eefc019af7 "; // Your exotel token
  
  $url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/Sms/send";
   
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_FAILONERROR, 0);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
    
	$http_result = curl_exec($ch);
	$error = curl_error($ch);
	$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
	 
	 curl_close($ch);
	  
	  print "Response = ".print_r($http_result);
?>
