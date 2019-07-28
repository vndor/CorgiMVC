<?php
namespace aphp\Foundation;

class ANullObject {
	public function __call( $name, $arguments ) {
		// Do nothing
		return null;
	}
	public function __set ( $id , $value ) {
		// Do nothing
	}
	public function __get ( $id ) {
		// Do nothing
		return null;
	}
	public function __isset ( $id ) {
		return false;
	}
	public function __unset ( $id ) {
		// Do nothing
	}
}