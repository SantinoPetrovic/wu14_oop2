<?php
class Challenge extends Base {
	public $requiredStrength;
	public $requiredAgility;
	public $requiredIntelligence;
	public $requiredWisom;
	/*
		could be replaced with
		public $skills = array(
				"requiredStrength" => 10,
				"requiredAgility" => 10,
				"requiredIntelligence" => 10,
				"requiredWisom" => 10,
			);
	*/

	public function __construct($skills) {
		/*
			$skills = array(
				"requiredStrength" => 10,
				"requiredAgility" => 10,
				"requiredIntelligence" => 10,
				"requiredWisom" => 10,
			);
		*/
		foreach ($skills as $skillName => $skillValue) {
			$this->{$skillName} = $skillValue;
		}
	}
}