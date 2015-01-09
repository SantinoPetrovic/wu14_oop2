<?php

//a person class
class Person {
  public $name;
  public $success = 50;
  //array to hold tools
  public $tools = array();
  public function __construct($name){
    $this->name = $name;
  }
}

// Three different person profiles 
// (in all three cases the sum of the strenghts are 200)

class MeatMaster extends Person {
  public $grillSkill = 90;
  public $sauceSkill = 60;
  public $boilSkill = 30;
  public $desertSkill = 20;

}

class OrientalGuru extends Person {
  public $grillSkill = 60;
  public $sauceSkill = 60;
  public $boilSkill = 50;
  public $desertSkill = 20;
  public $tools = array();
}

class FrenchChef extends Person{
  public $grillSkill = 30;
  public $sauceSkill = 50;
  public $boilSkill = 60;
  public $desertSkill = 60;
}

//a team class that behaves the same as a player in code (has same skills)
class Team extends Person {
  //a members array in case we need to track who is in the team
  public $members = array();

  //give team the same skills/strengths as player classes so we don't
  //have to change any existing code (winChances, playChallenge etc)
  public $grillSkill;
  public $sauceSkill;
  public $boilSkill;
  public $desertSkill;
  public $tools;

  //not using references as no player property values will be affected
  public function __construct($name, $humanPlayer, $computerPlayer) {
    $this->members[] = $humanPlayer;
    $this->members[] = $computerPlayer;

    // sum skill points of team members
    $this->grillSkill = $humanPlayer->grillSkill + $computerPlayer->grillSkill;
    $this->sauceSkill = $humanPlayer->sauceSkill + $computerPlayer->sauceSkill;
    $this->boilSkill = $humanPlayer->boilSkill + $computerPlayer->boilSkill;
    $this->desertSkill = $humanPlayer->desertSkill + $computerPlayer->desertSkill;

    //how to add tools to a team
    $this->tools = $humanPlayer->tools;

    //call the parent class __construct to set name of team
    parent::__construct($name);
  }
}

//a tool class
class Tool {
  public $description;
  public $skills;

  public function __construct($description,$skills){
    $this->description = $description;
    $this->skills = $skills;
  }
}

// A challenge class
class Challenge {
  protected $description;
  protected $skills;
  
  public function __construct($description,$skills){
    $this->description = $description;
    $this->skills = $skills;
  }

  // In howGoodAMatch() we want to return how well
  // a person matches this challenge as a float number 
  // between 0 - 1
  public function howGoodAMatch($person){
    //total points a person has
    $sum= 0;
    //total points possible for this challenge
    $max = 0;

    //calculate how good of a match a person is to this challenge
    foreach($this->skills as $skill => $points){
      //by checking how many skillpoints the challenge requires
      $needed = $points;
      //and by checking how many skillpoints a person has
      $has = $person->{$skill.'Skill'}; //grillSkill

      //check if a person has any tools
      if (count($person->tools) > 0) {
        //if they do, go through them
        for ($i = 0; $i < count($person->tools); $i++) {
          //and for each skill the tool has
          foreach ($person->tools[$i]->skills as $toolSkill => $value) {
            //if a toolSkill matches the skill we are currently calculating
            if ($toolSkill == $skill) {
              //add the toolSkill points 
              $has += $value;
            }
          }
        } 
      }

      //if a person has more points than needed, only count the points needed (to preserve our percentage)
      //else count the skillpoints a person has
      $sum += $has > $needed ? $needed : $has;
      $max += $needed;
    }

    //return the percentage of skill points they have
    return $sum/$max;
  }

  // This calculates the chances to win the challenge
  // as a percentage for each person
  public function winChances($persons){
    $matches = array();
    //count is used to create a range of win intervals for all persons
    $count = 0;
    //calculate chance to win using howGoodAMatch()
    foreach($persons as $person){
      $howGoodAMatch = $this->howGoodAMatch($person);
      //and store result in matches
      $matches[] = array(
        "person" => $person,
        "howGoodAMatch" => $howGoodAMatch,
      );
      //increase count to create an interval
      $count += $howGoodAMatch;
    }
    //also create a percentage to be nice (better to count with)
    foreach($matches as &$match){
      $match["winChancePercent"] = round(100*($match["howGoodAMatch"]/$count));
    }
    //return win chances
    return $matches;
  }

  // Randomize a winner according to win chances for each person
  public function playChallenge($persons){
    //get chances to win for each person
    $matches = $this->winChances($persons);
    //once again we are using intervals to check for a winner
    $count = 0;
    //pick a random number (between 0 and 100 since we are using percent)
    $rand = rand(0,100);

    //then check which person interval contains the random number
    foreach($matches as $match){
      if(
        $rand >= $count && 
        $rand <= $match["winChancePercent"] + $count
      ){
        //if a persons interval contains the random number
        // we have a winner, end function using return
        return $match["person"];
      }
      //if this person was not a winner, increase interval and try again...
      $count += $match["winChancePercent"];
    }
  }
}

class Item {
  public $description;
  public $skills;

  public function __construct($description, $skills) {
    $this->description = $description;
    $this->skills = $skills;
  }
}


$challenges = array();
$persons = array();
$tools = array();

$challenges[] = new Challenge(
  "Grill a chicken, with some roasted root crops. ".
  "Make  a suberp sauce to go with it. ".
  "Whip up an apple tart for desert.",
  array(
    "grill" => 80,
    "sauce" => 70,
    "boil" => 0,
    "desert" => 50
  )
);

// Try out our brilliant code below


// Create som persons with different profiles
$persons[] = new MeatMaster("Thomas");
$persons[] = new OrientalGuru("Ashim");
$persons[] = new FrenchChef("Hervé");

//create three different tools with different skills
$tools[] = New Tool(
  "Spatula",
  array(
    "grill" => 20,
  )
);


$tools[] = New Tool(
  "Ladle",
  array(
    "sauce" => 15,
  )
);


$tools[] = New Tool(
  "Spoon",
  array(
    "desert" => 30,
  )
);

//give Thomas the Spoon tool and see how it affects his chances to win
$persons[0]->tools[] = $tools[2];

/* Remove comments for random tools
  //give Thomas a random tool everytime the script runs
  //pick a random tool
  $random_index = rand(0, count($tools)-1);
  $random_tool = $tools[$random_index];
  //and give it to Thomas
  $persons[0]->tools[] = $random_tool;
*/

echo("<br>Round ".$i." ".$persons[0]->name." got the ".$persons[0]->tools[0]->description." tool!");



//creating a team consisting of two players (Teams behave as regular players)
$persons[] = new Team("Team1", $persons[0], $persons[1]);


// Check the chance for each person to win the challenge (without any tools)
$winChances = $challenges[0] -> winChances($persons);
$testPersons = array();
foreach($winChances as $chance){
  $testPersons[$chance["person"]->name] = $chance;
  $testPersons[$chance["person"]->name]["actualWins"]=0;
}

// Play the challenge 10 000 times just to 
// check that the playChallenge randomizes a winner
// according to our probablilites...
for($i = 0; $i < 10000; $i++){
  $winner = $challenges[0]->playChallenge($persons);
  $testPersons[$winner->name]["actualWins"]++;
}

// If we have programmed everything correctly the
// actualWinPercent should be very close to the
// theoretical winPercent after playing 10 000 times
// Check it out!
foreach($testPersons as &$person){
  $person["actualWinPercent"] = $person["actualWins"]/100;
}

echo('<pre>');
var_export($testPersons);
echo('</pre>');