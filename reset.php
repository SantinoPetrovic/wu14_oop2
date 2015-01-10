<?php

	include_once("nodebite-swiss-army-oop.php");
    $ds = new DBObjectSaver(array(
        "host" => "127.0.0.1",
        "dbname" => "wu14oop2",
        "username" => "root",
        "password" => "188830",
        "prefix" => "characters_trial"
    ));

    unset($ds->player);
    unset($ds->cpu1);
    unset($ds->cpu2);
    unset($ds->challenge);
    unset($ds->challenges);
    // var_dump($ds);