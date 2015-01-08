<?php

class Team extends Character {
 public $members = array();
 public $strength;
  public $agility;
  public $intelligence;
  public $wisdom;
  public $equipment;

  public function __construct($name, $human, $computer) {
    $this->members[] = $human;
    $this->members[] = $computer;

    $this->strength = $human->strength + $computer->strength;
    $this->agility = $human->agility + $computer->agility;
    $this->intelligence = $human->intelligence + $computer->intelligence;
    $this->wisdom = $human->wisdom + $computer->wisdom;

    $this->equipment = $human->equipment;
    parent::__construct($name);
}