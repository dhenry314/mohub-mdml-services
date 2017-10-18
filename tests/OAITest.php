<?php
namespace tests;


class OAITest extends \PHPUnit_Framework_TestCase
{
    public function testCall()
    {
	$config = include __DIR__ . '/../config.php';
	$url = "http://localhost".$config['BASE_PATH']."serviceCall";

        $client = new \mdml\ServiceClient(NULL,$config['auth']);
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
        $this->assertTrue(property_exists($result,'methodname'));
    }    
}

?>
