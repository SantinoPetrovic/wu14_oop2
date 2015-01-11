<?php
include_once("nodebite-swiss-army-oop.php");
$ds = new DBObjectSaver(array(
    "host" => "127.0.0.1",
    "dbname" => "wu14oop2",
    "username" => "root",
    "password" => "188830",
    "prefix" => "characters_trial"
));

if($ds->teamFight[0]){
    $team = $ds->team[0];
    $challenge = $ds->current_challenge[0];
    if($ds->teamFight[0] == "cpu1") {
        $cpu2 = $ds->cpu2[0];
    }
    elseif ($ds->teamFight[0] == "cpu2"){
        $cpu1 = $ds->cpu1[0];
    }
}
else {

}
