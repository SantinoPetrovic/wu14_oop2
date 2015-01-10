<?php
  include_once("nodebite-swiss-army-oop.php");
  $ds = new DBObjectSaver(array(
    "host" => "127.0.0.1",
    "dbname" => "wu14oop2",
    "username" => "root",
    "password" => "188830",
    "prefix" => "characters_trial"
  ));

$challenge = $ds->challenge[0];
  // if(isset($_REQUEST["challenge"])){
  //   $challenge = $_REQUEST["challenge"];
  // }
  // else {
  //   echo(json_encode(false));
  //   exit();
  // }

  /*
      $skills = array(
        "requiredStrength" => 10,
        "requiredAgility" => 10,
        "requiredIntelligence" => 10,
        "requiredWisom" => 10,
      );
  */

  switch($challenge){
    case "Battlechallenge":
    $skills = array(
      "requiredStrength" => 60,
      "requiredAgility" => 60,
      "requiredIntelligence" => 60,
      "requiredWisom" => 0
    );
    $new_challenge = New $challenge($skills);
    break;

    case "Eatchallenge":
    $skills = array(
      "requiredStrength" => 90,
      "requiredAgility" => 90,
      "requiredIntelligence" => 0,
      "requiredWisom" => 0
    );
    $new_challenge = New $challenge($skills);
    break;

    case "Cluechallenge":
    $skills = array(
      "requiredStrength" => 0,
      "requiredAgility" => 0,
      "requiredIntelligence" => 90,
      "requiredWisom" => 90
    );
    $new_challenge = New $challenge($skills);
    break;

    case "Trapchallenge":
    $skills = array(
      "requiredStrength" => 20,
      "requiredAgility" => 90,
      "requiredIntelligence" => 30,
      "requiredWisom" => 50
    );
    $new_challenge = New $challenge($skills);
    break;

    case "Hitchallenge":
    $skills = array(
      "requiredStrength" => 80,
      "requiredAgility" => 70,
      "requiredIntelligence" => 10,
      "requiredWisom" => 30
    );
    $new_challenge = New $challenge($skills);
    break;
}

  // for($j=0; $j<3; $j++){
  //   $randEquipmentComputer1 = array_rand($equipments);
  //   $computerEquipment1 = $equipments[$randEquipmentComputer1];
  // }

  // for($k=0; $k<3; $k++){
  //   $randEquipmentComputer2 = array_rand($equipments);
  //   $computerEquipment2 = $equipments[$randEquipmentComputer2];
  // }

  unset($ds->current_challenge);
  $ds->current_challenge[] = $new_challenge;

  echo(json_encode($new_challenge));