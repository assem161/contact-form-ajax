<?php
//check_ajax_referer( 'ajax-nonce', 'nonce', false );
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    /* First, check nonce */
	$name 		= strip_tags(trim($_POST['name']));
	$email 		= filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
	$phone 		= filter_var(trim($_POST['phone']),FILTER_VALIDATE_INT);
	$subject 	= strip_tags(trim($_POST['subject']));
	$message 	= strip_tags(trim($_POST['message']));
	$recipient 	= filter_var(trim($_POST['recipient']),FILTER_SANITIZE_EMAIL);;

	if(empty($name) || empty($email) || empty($subject) || empty($message)){
		http_response_code(400);
		echo "fill all fields";
		exit;
	}
	
	if(!is_numeric($phone)){
		http_response_code(400);
		echo "fill all fields";
		exit;
	}

	if(!is_string($name) || !is_string($email)|| !is_string($subject)|| !is_string($message) )
	{
		http_response_code(400);
		echo "fill all fields";
		exit;
	} 

	$messager = "Name: $name\n";
	$messager .= "Email: $email\n\n";
	$messager .= "phone: $phone\n\n";
	$messager .= "subject: $subject\n\n";
	$messager .= "message: $message\n\n";

	$headers= "From: $name <$email> $subject $message";
	echo $headers;
	//echo $name,$email,$subject,$recipient;
		echo $recipient;
	if(mail($recipient,$subject,$messager)){
		http_response_code(200);
		echo "You send your message success";
	}else{
		http_response_code(400);
		echo "there is a problem in send your message try again";	
	}

	 die();

}else{
	http_response_code(403);	
	echo "there is in request a problem try again";	
}
