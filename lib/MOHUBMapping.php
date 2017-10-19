<?php

class MOHUBMapping extends \mdml\jsonMapping {

  function __construct($serviceArgs,$request,$response,$allowablePaths) {
      parent::__construct($serviceArgs,$request,$response,$allowablePaths);
  }

  public function run() {
	return parent::run();
  }
  
  public function hasView($params) {
	foreach($params->urls as $url) {
		if(is_string($url)) {
			if(strstr($url,$params->filter)) {
				return $url;
			}
		}
	} 
	return False;
  }

  
}

?>
