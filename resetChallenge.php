<?php
    include_once("nodebite-swiss-army-oop.php");
    $ds = new DBObjectSaver(array(
        "host" => "127.0.0.1",
        "dbname" => "wu14oop2",
        "username" => "root",
        "password" => "mysql",
        "prefix" => "characters_trial"
    ));

    // $challenges = array(
    //   "Trapchallenge",
    //   "Eatchallenge",
    //   "Battlechallenge",
    //   "Cluechallenge",
    //   "Hitchallenge"
    // );
    $ds->player->successPoints = $ds->player->successPoints - 5;
    $randChallenge = array_rand($challenges, 2);
    $challenge = $challenges[$randChallenge[0]];
    echo(json_encode($challenge));

    // $player = &$ds->player[0];