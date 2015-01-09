<?php
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
    $rand_keys = array_rand($computerNames, 2);
    $computerName1 = $computerNames[$rand_keys[0]];
    $computerName2 = $computerNames[$rand_keys[1]];
    echo $computerName1;
    echo $computerName2;

    $computerCharacters = array(
       "Warrior",
       "Mage",
       "Hunter",
       "Rogue"
    );

    $randComputerCharacter = array_rand($computerCharacters, 2);

    $computerCharacter1 = $computerCharacters[$randComputerCharacter[0]];

    $computerCharacter2 = $computerCharacters[$randComputerCharacter[1]];
    echo $computerCharacter1;
    echo $computerCharacter2;

    $challenges = array(
    "Trapchallenge",
    "Eatchallenge",
    "Battlechallenge",
    "Cluechallenge",
    "Hitchallenge"
    );

  $randChallenge = array_rand($challenges, 2);
  $challenge = $challenges[$randChallenge[0]];
  $new_challenge = New $challenge();


 //This is all the names from all the equipment-classes inside an array.
  $equipments = array(
      "axe",
      "mysticGlove",
      "staff",
      "totem",
      "bow"
  );


   //This is so that the players and computers don't get more than 3 equipments.
   //Randomizing an equipment for each computer and player in game.
  for($i=0; $i<3; $i++){
    $randEquipmentPlayer = array_rand($equipments, 2); 
    $playerEquipment = $equipments[$randEquipmentPlayer[0]];
  }

  for($j=0; $j<3; $j++){
    $randEquipmentComputer1 = array_rand($equipments, 2);
    $computerEquipment1 = $equipments[$randEquipmentComputer1[0]];   
  }

  for($k=0; $k<3; $k++){
    $randEquipmentComputer2 = array_rand($equipments, 2);
    $computerEquipment2 = $equipments[$randEquipmentComputer2[0]];
  }
?>