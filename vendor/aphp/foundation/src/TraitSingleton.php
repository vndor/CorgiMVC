<?php 

namespace aphp\Foundation;

/* 
class::initInstance()
class::getInstance();
class::$instance;
*/

trait TraitSingleton  {
	static $instance = null;
	
	static function initInstance() {
		if (self::$instance === null) {
			$class = get_called_class();
			self::$instance = new $class();
		}
	}
	
	static function getInstance() {
		self::initInstance();
		return self::$instance;
	}
}
