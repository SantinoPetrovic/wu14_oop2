<?php
class Equipment extends Base {
	public $weaponStrength = 0;
	public $weaponAgility = 0;
	public $weaponIntelligence = 0;
	public $weaponWisdom = 0;
    protected $owner = FALSE;

    public function __construct(&$owner) {
        $this->owner = $owner;
        $this->owner->equipment = $this;
    }
}