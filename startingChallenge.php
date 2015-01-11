<?php
  include_once("nodebite-swiss-army-oop.php");
  $ds = new DBObjectSaver(array(
    "host" => "127.0.0.1",
    "dbname" => "wu14oop2",
    "username" => "root",
    "password" => "mysql",
    "prefix" => "characters_trial"
  ));

// Get random value from arrays
function array_random($arr, $num = 1) {
    shuffle($arr);

    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

$noMoreEquipments = false;

// Gives challenger random equipment from equipment array
function giveRandomEquipment(&$equipments, &$challengerEquipment) {
    if(!empty($equipments)) {
        if(count($challengerEquipment) < 3) {
            $randomEquipment = array_random($equipments);
            $challengerEquipment[] = $randomEquipment;
            $key = array_search($randomEquipment, $equipments);
            unset($equipments[$key]);
        }
    } else {
        global $noMoreEquipments;
        $noMoreEquipments = true;
    }
}

// Define challenger and their equipment values.
$challenge = $ds->challenge[0];
$gameEquipments = $ds->gameEquipments[0];
$playerEquipment = array();
$cpu1Equipment = array();
$cpu2Equipment = array();

// Add randomized weapon too player, computerplayer1 and computerplayer2.
// Randomized weapons are removed from aviable weapons-array.
giveRandomEquipment($gameEquipments, $playerEquipment);
giveRandomEquipment($gameEquipments, $cpu1Equipment);
giveRandomEquipment($gameEquipments, $cpu2Equipment);

$ds->gameEquipments[0] = &$gameEquipment;
$ds->playerEquipment[0] = &$playerEquipment;
$ds->cpu1Equipment[0] = &$cpu1Equipment;
$ds->cpu2Equipment[0] = &$cpu2Equipment;
// var_dump($playerEquipment[0]);
  switch($challenge){
    case "Battlechallenge":
    $skills = array(
      "requiredStrength" => 60,
      "requiredAgility" => 60,
      "requiredIntelligence" => 60,
      "requiredWisdom" => 0
    );
    $new_challenge = New $challenge($skills);
    break;

    case "Eatchallenge":
    $skills = array(
      "requiredStrength" => 90,
      "requiredAgility" => 90,
      "requiredIntelligence" => 0,
      "requiredWisdom" => 0
    );
    $new_challenge = New $challenge($skills);
    break;

    case "Cluechallenge":
    $skills = array(
      "requiredStrength" => 0,
      "requiredAgility" => 0,
      "requiredIntelligence" => 90,
      "requiredWisdom" => 90
    );
    $new_challenge = New $challenge($skills);
    break;

    case "Trapchallenge":
    $skills = array(
      "requiredStrength" => 20,
      "requiredAgility" => 90,
      "requiredIntelligence" => 30,
      "requiredWisdom" => 50
    );
    $new_challenge = New $challenge($skills);
    break;

    case "Hitchallenge":
    $skills = array(
      "requiredStrength" => 80,
      "requiredAgility" => 70,
      "requiredIntelligence" => 10,
      "requiredWisdom" => 30
    );
    $new_challenge = New $challenge($skills);
    break;
}

if($noMoreEquipments) {
    $equipmentStatus = "No more equipments...";
}
else{
    $equipmentStatus = "EQUIPMENT!";
}

unset($ds->current_challenge);
$teamFight = false;

$ds->current_challenge[] = $new_challenge;
$ds->noMoreEquipments[] = &$noMoreEquipments;
$ds->equipmentStatus[] = &$equipmentStatus;
$ds->teamFight[] = &$teamFight;
    $arrayVariable = array(
      'new_challenge' => $new_challenge,
      'equipmentStatus' => $equipmentStatus,
      'playerEquipment' => $playerEquipment
    );
echo(json_encode($arrayVariable));