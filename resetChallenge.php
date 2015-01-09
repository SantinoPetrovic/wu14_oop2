<?php
	include_once("nodebite-swiss-army-oop.php");
    $ds = new DBObjectSaver(array(
        "host" => "127.0.0.1",
        "dbname" => "wu14oop2",
        "username" => "root",
        "password" => "mysql",
        "prefix" => "characters_trial"
    ));
    unset($ds->challenge);
    $ds->player[0]->successPoints -= 5;
    $randChallenge = array_rand($ds->challenges[0]);
    $challenge = $ds->challenges[0][$randChallenge];
    $ds->challenge[] = &$challenge;
    $changeChallengeVariable = array(
      'challenge' => $challenge
    );
    // var_dump($ds->challenges[0]);
    // var_dump($randChallenge);
    echo(json_encode($changeChallengeVariable));