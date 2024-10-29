<?php 
require_once'lib/nusoap.php';
require_once 'data.php';

$server=new nusoap_server();
$server->configureWSDL("Soap LOA MUSIC","urn:soaploamusic"); //create a instance for nusoap server
$server->register(
        "get_musicprice",
        array("name"=>"xsd:string"),
        array("return"=>"xsd:integer")
);
$server->service(file_get_contents("php://input"));