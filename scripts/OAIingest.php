#!/usr/bin/php
<?php

require __DIR__ . '/../vendor/autoload.php';
$config = include __DIR__ . '/../config.php';

if(count($argv)<2) {
	die("USAGE: OAIingest.php {OAIurl} {metadataPrefix} {target endpoint subPath}\n\n");
}

$oaiURL = $argv[1];
$mdP = $argv[2];
$target = "http://localhost".$config['BASE_PATH'].$argv[3];

if(!file_exists('_TOKEN')) die("No _TOKEN file found.  Please run getToken.php. \n");
$jwt = file_get_contents('_TOKEN');

$url = "http://localhost".$config['BASE_PATH']."serviceCall";

$client = new \mdml\ServiceClient($jwt);

$request = '{
                "type": "jsonwsp/request",
                "version": "1.0",
                "methodname": "mdml/OAIingestor",
                "args": {
                        "OAIserviceURL":"https://fraser.stlouisfed.org/oai",
                        "metadataPrefix": "mods",
                        "mdml:targetEndpoint": "http://localhost/MOHUBEndpoints/ingests/Fraser"
                },
                "mirror": {
                        "id": 1
                }
        }';


$result = $client->post($request,$url);
echo print_r($result);

?>
