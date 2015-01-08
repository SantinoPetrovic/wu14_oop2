<?php
class Mage extends Character {
  	public $strength = 20;
	public $agility = 20;
	public $intelligence = 90;
	public $wisdom = 70;
	/*
		could be replaced with
		public $skills = array(
				"requiredStrength" => 10,
				"requiredAgility" => 10,
				"requiredIntelligence" => 10,
				"requiredWisom" => 10,
			);
	*/
}