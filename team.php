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
} elseif($computer == "cpu2") {
    $cpuChallengeTeammate = $ds->cpu2[0];
}


$teamStrength = $cpuChallengeTeammate->strength + $player->strength;
$teamAgility = $cpuChallengeTeammate->agility + $player->agility;
$teamIntelligence = $cpuChallengeTeammate->intelligence + $player->intelligence;
$teamWisdom = $cpuChallengeTeammate->wisdom + $player->wisdom;

$ds->teamStrength[] = &$teamStrength;
$ds->teamAgility[] = &$teamAgility;
$ds->teamIntelligence[] = &$teamIntelligence;
$ds->teamWisdom[] = &$teamWisdom;
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