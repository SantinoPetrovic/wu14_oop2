<?php
class Character extends Base {
	public $name;
	public $strength = 50;
	public $agility = 50;
	public $intelligence = 50;
	public $wisdom = 50;
  public $successPoints = 50;
  public $success = 50;
	public $equipment = array();

	public function __construct($name){
   		$this->name = $name;
 	}

}
