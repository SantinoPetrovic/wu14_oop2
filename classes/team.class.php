// <?php

class Team extends Character {
   // public $team['strength'] = $cpuChallengeTeammate->strength + $player->strength + $cpuChallengeTeammate->cpuEquipment->weaponStrength + $player->$playerEquipment->weaponStrength;
   // public $team['agility'] = $cpuChallengeTeammate->agility + $player->agility + $cpuChallengeTeammate->cpuEquipment->weaponAgility + $player->$playerEquipment->weaponAgility;
   // public $team['intelligence'] = $cpuChallengeTeammate->intelligence + $player->intelligence + $cpuChallengeTeammate->cpuEquipment->weaponIntelligence + $player->$playerEquipment->weaponIntelligence;
   // public $team['wisdom'] = $cpuChallengeTeammate->wisdom + $player->wisdom + $cpuChallengeTeammate->cpuEquipment->weaponWisdom + $player->$playerEquipment->weaponWisdom;
public $teamStrength = $cpuChallengeTeammate->strength + $player->strength + $cpuChallengeTeammate->cpuEquipment->weaponStrength + $player->$playerEquipment->weaponStrength;
public $teamAgility = $cpuChallengeTeammate->agility + $player->agility + $cpuChallengeTeammate->cpuEquipment->weaponAgility + $player->$playerEquipment->weaponAgility;
public $teamIntelligence = $cpuChallengeTeammate->intelligence + $player->intelligence + $cpuChallengeTeammate->cpuEquipment->weaponIntelligence + $player->$playerEquipment->weaponIntelligence;
public $teamWisdom = $cpuChallengeTeammate->wisdom + $player->wisdom + $cpuChallengeTeammate->cpuEquipment->weaponWisdom + $player->$playerEquipment->weaponWisdom;
public $successPoints = $successPoints;
}