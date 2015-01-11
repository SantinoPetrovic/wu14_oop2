<?php

	include_once("nodebite-swiss-army-oop.php");
    $ds = new DBObjectSaver(array(
        "host" => "127.0.0.1",
        "dbname" => "wu14oop2",
        "username" => "root",
        "password" => "188830",
        "prefix" => "characters_trial"
    ));
    // if (isset($_REQUEST["startOver"])) {
        unset($ds->player);
        unset($ds->cpu1);
        unset($ds->cpu2);
        unset($ds->challenge);
        unset($ds->challenges);
        unset($ds->gameEquipments);
        unset($ds->teamStrength);
        unset($ds->teamAgility);
        unset($ds->teamIntelligence);
        unset($ds->teamWisdom);
        unset($ds->gameEquipments);
        unset($ds->playerEquipment);
        unset($ds->cpu1Equipment);
        unset($ds->cpu2Equipment);
        unset($ds->challengeCount);
        unset($ds->noMoreEquipments);
        unset($ds->current_challenge);
        unset($ds->equipmentStatus);
        unset($ds->cpuChallengeTeammate);
//     }

// echo(json_encode(true));