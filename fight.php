<?php
include_once("nodebite-swiss-army-oop.php");
$ds = new DBObjectSaver(array(
    "host" => "127.0.0.1",
    "dbname" => "wu14oop2",
    "username" => "root",
    "password" => "mysql",
    "prefix" => "characters_trial"
));

// if($ds->teamFight[0]){
//     $team = $ds->team[0];
//     $challenge = $ds->current_challenge[0];
//     if($ds->teamFight[0] == "cpu1") {
//         $cpu2 = $ds->cpu2[0];
//     }
//     elseif ($ds->teamFight[0] == "cpu2"){
//         $cpu1 = $ds->cpu1[0];
//     }
// }
// else {
//     $player = $ds->$player[0];
//     $cpu1 = $ds->cpu1[0];
//     $cpu2 = $ds->cpu2[0];
// }

// function challangeFight($challenger, $challenge) {
//     $finnishedFight = false;
//     // for ($x=0; $x<4 $x++){
//     //     if($challenger[$x] < ){
//     //         $finishedFight = false;
//     //         break;
//     //     }
//     }
// }
    $player = $ds->player[0];
    $cpu1 = $ds->cpu1[0];
    $cpu2 = $ds->cpu2[0];
    $challenge = $ds->current_challenge[0];
    // $challengeStrength = $ds->

    $totalStrengthPlayer = $ds->player[0]->strength;
    $totalAgilityPlayer = $ds->player[0]->agility;
    $totalIntelligencePlayer = $ds->player[0]->intelligence;
    $totalWisdomPlayer = $ds->player[0]->wisdom;

    $totalStrengthCpu1 = $ds->cpu1[0]->strength;
    $totalAgilityCpu1 = $ds->cpu1[0]->agility;
    $totalIntelligenceCpu1 = $ds->cpu1[0]->intelligence;
    $totalWisdomCpu1 = $ds->cpu1[0]->wisdom;

    $totalStrengthCpu2 = $ds->cpu2[0]->strength;
    $totalAgilityCpu2 = $ds->cpu2[0]->agility;
    $totalIntelligenceCpu2 = $ds->cpu2[0]->intelligence;
    $totalWisdomCpu2 = $ds->cpu2[0]->wisdom;

    //The stats of the player minus what the challenge requires
    $resultStrengthPlayer = $totalStrengthPlayer - $challenge->requiredStrength;
    $resultAgilityPlayer = $totalAgilityPlayer - $challenge->requiredAgility;
    $resultIntelligencePlayer = $totalIntelligencePlayer - $challenge->requiredIntelligence;
    $resultWisdomPlayer = $totalWisdomPlayer - $challenge->requiredWisdom;

    $resultStrengthCpu1 = $totalStrengthCpu1 - $challenge->requiredStrength;
    $resultAgilityCpu1 = $totalAgilityCpu1 - $challenge->requiredAgility;
    $resultIntelligenceCpu1 = $totalIntelligenceCpu1 - $challenge->requiredIntelligence;
    $resultWisdomCpu1 = $totalWisdomCpu1 - $challenge->requiredWisdom;

    $resultStrengthCpu2 = $totalStrengthCpu2 - $challenge->requiredStrength;
    $resultAgilityCpu2 = $totalAgilityCpu2 - $challenge->requiredAgility;
    $resultIntelligenceCpu2 = $totalIntelligenceCpu2 - $challenge->requiredIntelligence;
    $resultWisdomCpu2 = $totalWisdomCpu2 - $challenge->requiredWisdom;

    //If a challenger would overkill the challenge.
    if($resultStrengthPlayer<0){
        $resultStrengthPlayer=0;
    }
    if($resultAgilityPlayer<0){
        $resultAgilityPlayer=0;
    }
    if($resultIntelligencePlayer<0){
        $resultIntelligencePlayer=0;
    }
    if($resultWisdomPlayer<0){
        $resultWisdomPlayer=0;
    }

    if($resultStrengthCpu1<0){
        $resultStrengthCpu1=0;
    }
    if($resultAgilityCpu1<0){
        $resultAgilityCpu1=0;
    }
    if($resultIntelligenceCpu1<0){
        $resultIntelligenceCpu1=0;
    }
    if($resultWisdomCpu1<0){
        $resultWisdomCpu1=0;
    }

    if($resultStrengthCpu2<0){
        $resultStrengthCpu2=0;
    }
    if($resultAgilityCpu2<0){
        $resultAgilityCpu2=0;
    }
    if($resultIntelligenceCpu2<0){
        $resultIntelligenceCpu2=0;
    }
    if($resultWisdomCpu2<0){
        $resultWisdomCpu2=0;
    }
    //Sum it all up, notice that score is the bad points, the points a challenger couldn't finish.
    $scorePlayer = $resultStrengthPlayer +  $resultAgilityPlayer +  $resultIntelligencePlayer +  $resultWisdomPlayer;

    $scoreCpu1 = $resultStrengthCpu1 + $resultAgilityCpu1 + $resultIntelligenceCpu1 + $resultWisdomCpu1;

    $scoreCpu2 = $resultStrengthCpu2 + $resultAgilityCpu2 + $resultIntelligenceCpu2 + $resultWisdomCpu2;

    if($scorePlayer<$scoreCpu1 && $scorePlayer<$scoreCpu1){
        $player->successPoints = $player->successPoints +=15;
        if($scoreCpu1>$scoreCpu2){
            $cpu2->successPoints = $cpu2->successPoints -=5;
        }
        else{
            $cpu1->successPoints = $cpu1->successPoints -=5;
        }
    }

    if($scoreCpu1<$scoreCpu2 && $scorePlayer>$scoreCpu1){
        $cpu1->successPoints = $cpu1->successPoints +=15;
        if($scorePlayer<$scoreCpu2){
            $cpu2->successPoints = $cpu2->successPoints -=5;
        }
        else{
            $player->successPoints = $player->successPoints -=5;
        }
    }

    if($scorePlayer>$scoreCpu2 && $scoreCpu2<$scoreCpu1){
        $cpu2->successPoints = $cpu2->successPoints +=15;
        if($scoreCpu1<$scorePlayer){
            $player->successPoints = $player->successPoints -=5;
        }
        else{
            $cpu1->successPoints = $cpu1->successPoints -=5;
        }
    }

    $challengePointVariables = array(
        'scorePlayer' => $scorePlayer,
        'scoreCpu1' => $scoreCpu1,
        'scoreCpu2' => $scoreCpu2
    );

    echo(json_encode($challengePointVariables));
    // if($finishedFight) {
    //     return true;
    // } else {
    //     return false;
    // }
