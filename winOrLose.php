<?php
include_once("nodebite-swiss-army-oop.php");
$ds = new DBObjectSaver(array(
    "host" => "127.0.0.1",
    "dbname" => "wu14oop2",
    "username" => "root",
    "password" => "mysql",
    "prefix" => "characters_trial"
));

$statusSuccessPoints = "No one has lost yet...";

$playerSuccessPoints = $ds->player[0]->successPoints;
$cpu1SuccessPoints = $ds->cpu1[0]->successPoints;
$cpu2SuccessPoints = $ds->cpu2[0]->successPoints;
if($playerSuccessPoints >= 100) {
    // var_dump("win1");
    $statusSuccessPoints = "you win";
}
else if($cpu1SuccessPoints >= 100){
    // var_dump("lose1");
    $statusSuccessPoints = "you lose";
}
else if($cpu2SuccessPoints >= 100){
    // var_dump("lose2");
    $statusSuccessPoints = "you lose";
}
else if($playerSuccessPoints <= 0) {
    // var_dump("lose3");
    $statusSuccessPoints = "you lose";
}
// var_dump($ds->player[0]->successPoints);

$statusVariables = array(
    'statusSuccessPoints' => $statusSuccessPoints,
    'playerSuccessPoints' => $playerSuccessPoints,
    '$cpu1SuccessPoints' => $cpu1SuccessPoints,
    '$cpu2SuccessPoints' => $cpu2SuccessPoints
);
// var_dump($statusVariables);
echo(json_encode($statusVariables));