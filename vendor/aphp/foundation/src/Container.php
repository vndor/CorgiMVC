<?php 
namespace aphp\Foundation;

/*
class App extends \aphp\Foundation\Container 
{	
	use \aphp\Foundation\TraitSingleton;

	public function __construct() 
	{
		$this->init();
	}
	
	// PROTECTED
	protected function init()
	{
		$this->textValue = 'hello world';
		
		$this->service01 = function ($c) {
			$service = new Service();
			return $service;
		};
		$this->service02 = function ($c) {
			$service = new Service2($c->service01);
			$service->value = $c->textValue;
			return $service;
		};
	}
}

//----

$app = App::getInstance();
$app->service02->blabla();

*/

class Container {
	protected $__values = [];
	protected $__raw = [];
	protected $__keys = [];
	
	public function __set ( $id , $value ) {
		if (isset($this->__keys[$id])) {
            return;
		}
		$this->__keys[$id] = true;
		$this->__raw[$id] = $value;
	}
	
	public function __get ( $id ) {
		if (!isset($this->__keys[$id])) {
            return null;
		}
		if (isset($this->__values[$id])) {
			return $this->__values[$id];
		}
		if ($this->__raw[$id] instanceof \Closure) {
			$this->__values[$id] = $this->__raw[$id]($this);
		} else {
			$this->__values[$id] = $this->__raw[$id];
		}
		unset($this->__raw[$id]);
		return $this->__values[$id];
	}
	
	public function __isset ( $id ) {
		return isset($this->__keys[$id]);
	}
	
	public function __unset ( $id ) {
		if (isset($this->__keys[$id])) {
			unset($this->__keys[$id]);
			unset($this->__values[$id]);
		}
	}
}