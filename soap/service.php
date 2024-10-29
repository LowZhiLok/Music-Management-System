<?php
	require 'lib/nusoap.php'; 
	require 'data.php';
	
	$server = new nusoap_server();
	
	$server->configureWSDL("Soap LOA MUSIC","urn:soaploamusic");

	$server->register(
		"get_userEmail",
		array("userID"=>"xsd:string"),
		array("return"=>"xsd:string")
	);
	$server->register(
		"get_SongName",
		array("songs_id"=>"xsd:string"),
		array("return"=>"xsd:string")
	);	
	$server->service(file_get_contents("php://input"));

?>