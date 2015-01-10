<?php

if (isset($_REQUEST["characterData"])) {
    $charData = $_REQUEST["characterData"];
    $character = $charData['character'];
    $playerName = $charData['charName'];
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


switch($character){
     case "Warrior":
    $player = New Warrior($playerName);
    break;

    case "Rogue":
    $player = New Rogue($playerName);
    break;

    case "Mage":
    $player = New Mage($playerName);
    break;

    case "Hunter":
    $player = New Hunter($playerName);
     break;
}

//All computer names.
$computerNames = array(
    "Babajaga",
    "BigBazooka",
    "TensaiNiNaru",
    "Ogge",
    "Nevalopo",
    "MyNameIsJeff",
    "SuperBlackKnight1337",
    "LolGetRektPlz"
);

$randComputerName = array_rand($computerNames, 2);

$computerName1 = $computerNames[$randComputerName[0]];
$computerName2 = $computerNames[$randComputerName[1]];

//All character's classes.
$computerCharacters = array(
    "Warrior",
    "Mage",
    "Hunter",
    "Rogue"
);

// Create array where we remove the selected char. This array is then used to
// randomly select two computers.
$restCharacters = array_diff($computerCharacters, array($character));

//var_dump($computerCharacters);

$randComputerCharacter = array_rand($restCharacters, 2);
// var_dump($randComputerCharacter);


$computerCharacter1 = $computerCharacters[$randComputerCharacter[0]];

$computerCharacter2 = $computerCharacters[$randComputerCharacter[1]];

switch($computerCharacter1){
    case "Warrior":
    $cpu1 = New Warrior($computerName1);
    break;

    case "Rogue":
    $cpu1 = New Rogue($computerName1);
    break;

    case "Mage":
    $cpu1 = New Mage($computerName1);
    break;

    case "Hunter":
    $cpu1 = New Hunter($computerName1);
     break;
}

switch($computerCharacter2){
    case "Warrior":
    $cpu2 = New Warrior($computerName2);
    break;

    case "Rogue":
    $cpu2 = New Rogue($computerName2);
    break;

    case "Mage":
    $cpu2 = New Mage($computerName2);
    break;

    case "Hunter":
    $cpu2 = New Hunter($computerName2);
     break;
}

//This is all the names from all the equipment-classes inside an array.
$equipments = array(
    "Axe",
    "MysticGlove",
    "Staff",
    "Totem",
    "Bow"
);

$gameEquipments = array();
$countGameEquipments = array(
    "Axe" => 0,
    "MysticGlove" => 0,
    "Staff" => 0,
    "Totem" => 0,
    "Bow" => 0
);

//This is so that the players and computers don't get more than 3 equipments.
//Randomizing an equipment for each computer and player in game.
for($i=0; $i<9; $i++){
    $randomizedEquipment = array_random($equipments);
    // Randomed equipment is increased in our counter
    $countGameEquipments[$randomizedEquipment]++;
    //var_dump($randomizedEquipment);
    //var_dump($countGameEquipments[$randomizedEquipment]);
    // If randomed equipment has been created two times we remove it from our
    // equipments array in order to not get more than two of the same equipment.
    if ($countGameEquipments[$randomizedEquipment] == 2) {
        $equipments = array_diff($equipments, array($randomizedEquipment));
    }
    array_push($gameEquipments, $randomizedEquipment);
}

// Get random value from arrays
function array_random($arr, $num = 1) {
    shuffle($arr);

    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

// Challenge counter, if challenge counter reaches 10 the game will ended.
$challengeCount = 0;

$ds ->challengeCount[] = &$challengeCount;
$ds->player[] = &$player;
$ds->gameEquipments[] = &$gameEquipments;
$ds->cpu1[] = &$cpu1;
$ds->cpu2[] = &$cpu2;

$variables = array(
  'computerName1' => $computerName1,
  'computerName2' => $computerName2,
  'computerCharacter1' => $computerCharacter1,
  'computerCharacter2' => $computerCharacter2
);

echo(json_encode($variables));