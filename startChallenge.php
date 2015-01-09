<?php

    include_once("nodebite-swiss-army-oop.php");
    $ds = new DBObjectSaver(array(
        "host" => "127.0.0.1",
        "dbname" => "wu14oop2",
        "username" => "root",
        "password" => "mysql",
        "prefix" => "characters_trial"
    ));

 // The challenges variable will have a array with 5 values that's strings.
    $challenges = array(
      "Trapchallenge",
      "Eatchallenge",
      "Battlechallenge",
      "Cluechallenge",
      "Hitchallenge"
    );
    //var_dump($ds);
    $ds->challenges[] = &$challenges;

    $randChallenge = array_rand($challenges);
    $challenge = $challenges[$randChallenge];

    $ds->challenge[] = &$challenge;
    $challengeVariable = array(
      'challenge' => $challenge
    );
    echo(json_encode($challengeVariable));

    // if($wantChallenge === false) {
    //     $randNewChallenge = array_rand($challenges, 2);
    //     $challenge = $challenges[$randNewChallenge[0]];
    // }

