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
    $randChallenge = array_rand($challenges);
    $challenge = $challenges[$randChallenge];
