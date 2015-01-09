<?php
    
    if (isset($_REQUEST["characterJson"])) {
        $charData = $_REQUEST["characterJson"];
        // $compData = $_REQUEST["computerJson"];
        $character = $charData['character'];
        $playerName = $charData['charName'];
        // $computerName1 = $compData['computerName1'];
        // $computerName2 = $compData['computerName2'];
        // $computerCharacter1 = $compData['computerCharacter1'];
        // $computerCharacter2 = $compData['computerCharacter2'];
    } else {
        echo(json_encode(false));
        exit();
    }

    include_once("nodebite-swiss-army-oop.php");
    $ds = new DBObjectSaver(array(
        "host" => "127.0.0.1",
        "dbname" => "wu14oop2",
        "username" => "root",
        "password" => "mysql",
        "prefix" => "characters_trial"
    ));
    /*$charDataJSON = file_get_contents('php://input');

    $charData = json_decode($charDataJSON, true);*/


    
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

    $randComputerCharacter = array_rand($computerCharacters, 2);

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

  // The challenges variable will have a array with 5 values that's strings.
    $challenges = array(
      "Trapchallenge",
      "Eatchallenge",
      "Battlechallenge",
      "Cluechallenge",
      "Hitchallenge"
    );

    $randChallenge = array_rand($challenges, 2);
    $challenge = $challenges[$randChallenge[0]];

    $ds->player[] = &$player;
    $ds->cpu1[] = &$cpu1;
    $ds->cpu2[] = &$cpu2;

    $variables = array( 
      'computerName1' => $computerName1,
      'computerName2' => $computerName2,
      'computerCharacter1' => $computerCharacter1,
      'computerCharacter2' => $computerCharacter2,
      'challenge' => $challenge 
    );

    echo(json_encode($variables));
