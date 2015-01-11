<?php

if (isset($_REQUEST["teamJson"])) {
    $requestData = $_REQUEST["teamJson"];
} else {
    echo(json_encode(false));
    exit();
}
include_once("nodebite-swiss-army-oop.php");
$ds = new DBObjectSaver(array(
    "host" => "127.0.0.1",
    "dbname" => "wu14oop2",
    "username" => "root",
    "password" => "188830",
    "prefix" => "characters_trial"
));

//var_dump($ds);

$computer = $requestData['teamData'];

// Get player values
$player = $ds->player[0];
// Get computer teammate values
if($computer == "cpu1"){
    $cpuChallengeTeammate = $ds->cpu1[0];
    $ds->teamFight[0] = "cpu1";
    $cpuEquipment = $ds->cpu1Equipment[0];
} elseif($computer == "cpu2") {
    $cpuChallengeTeammate = $ds->cpu2[0];
    $ds->teamFight[0] = "cpu2";
    $cpuEquipment = $ds->cpu2Equipment[0];
}

$playerEquipment = $ds->playerEquipment[0]










$team = array(
"strength" => 0,
"agility" => 0,
"intelligence" => 0,
"wisdom" => 0
);

$team['strength'] = $cpuChallengeTeammate->strength;
$team['agility'] = $cpuChallengeTeammate->agility + $player->agility + $cpuChallengeTeammate->cpuEquipment->weaponAgility + $player->$playerEquipment->weaponAgility;
$team['intelligence'] = $cpuChallengeTeammate->intelligence + $player->intelligence + $cpuChallengeTeammate->cpuEquipment->weaponIntelligence + $player->$playerEquipment->weaponIntelligence;
$team['wisdom'] = $cpuChallengeTeammate->wisdom + $player->wisdom + $cpuChallengeTeammate->cpuEquipment->weaponWisdom + $player->$playerEquipment->weaponWisdom;
var_dump($team);

// var_dump($ds->teamFight[0]);


$ds->team[] = &$team;
echo(json_encode(true));
/*
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
*/