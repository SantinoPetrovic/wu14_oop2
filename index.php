<html>
<head>
    <link rel='stylesheet' type='text/css' href='css/meyer-reset.css'/>
    <link rel='stylesheet' type='text/css' href='css/main.css'/>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <title>Santino_rpg</title>
</head>
<body>
    <header>
        <div class="personDataInfo">
            <h1> Your character is : <span class="character"></span></h1>
            <h1> You name is : <span class="charName"></span></h1>
        </div>

        <div class="computerDataInfo">
            <h1> Computer player 1: <span class="computerName1"></span> (<span class="computerCharacter1"></span>)</h1>
            <h1> Computer player 2: <span class="computerName2"></span> (<span class="computerCharacter2"></span>)</h1><br>
        </div>

        <div class="characterSelection">
            <h1>Choooooose your CHARACTER!</h1>
            <label>
                <input type="radio" name="character" value="Warrior">
                <img src="imgs/warrior.png">
            </label>
            <label>
                <input type="radio" name="character" value="Mage">
                <img src="imgs/mage.png">
            </label>
            <label>
                <input type="radio" name="character" value="Rogue">
                <img src="imgs/rogue.png">
            </label>
            <label>
                <input type="radio" name="character" value="Hunter">
                <img src="imgs/hunter.png">
            </label>
            <div>
                <label class="title">Enter your character's name:</label>
                <input class="nameField" type="text" name="nameField">
            </div>

            <button class="startGame">Start</button>
            <br>
        </div>
        <div class="challengeInfo">
            <img src="imgs/trap-challenge.png" id="Trapchallenge" class="challenge">
            <img src="imgs/eat-challenge.png" id="Eatchallenge" class="challenge">
            <img src="imgs/battle-challenge.png" id="Battlechallenge" class="challenge">
            <img src="imgs/clue-challenge.png" id="Cluechallenge" class="challenge">
            <img src="imgs/hit-challenge.png" id="Hitchallenge" class="challenge"> <br>
            <button class="acceptChallenge">Accept challenge</button>
            <button class="changeChallenge">Change challenge</button>
        </div>

        <div class="carryOutChallengeInfo">
            <button class="soloChallenge">
                    <img src="imgs/carryOutChallenge.png">
            </button>

        <button class="teamChallenge">
                <img src="imgs/carryOutChallengeWithPartner.png">
        </button> <br>
        </div>

        <div class="carryChallengeWithCpu">
            <button class="teamCpu1">
                <label>
                    <img src="imgs/computerPlayer1.png">
                </label>
            </button>
            <button class="teamCpu2">
                <label>
                    <img src="imgs/computerPlayer2.png">
                </label>
            </button>
        </div>

        <div class="gettingEquipment">
            <h1 class="status"></h1>
            <img src="imgs/axe.png" id="Axe" class="equipment">
            <img src="imgs/mysticGlove.png" id="MysticGlove" class="equipment">
            <img src="imgs/staff.png" id="Staff" class="equipment">
            <img src="imgs/totem.png" id="Totem" class="equipment">
            <img src="imgs/bow.png" id="Bow" class="equipment"> <br>
            <button class="acceptEquipment">Okey!</button>
        </div>

        <div class="theGame">
            <h1 class="player">
                <span class="charName"></span>
                (<span class="character"></span>)
                Challenge-points left:
                <span id ="playerPoints"> </span>
            </h1><br>

            <h1 class="cpu1">
                <span class="computerName1"></span>
                (<span class="computerCharacter1"></span>) Challenge-points left:
                <span id ="cpu1Points"> </span>
            </h1><br>

            <h1 class="cpu2">
                <span class="computerName2"></span>
                (<span class="computerCharacter2"></span>) Challenge-points left:
                <span id ="cpu2Points"></span>
            </h1><br>

<!--             <h1 class="team">Your team's score: </h1> -->
            <button class="showStats">SHOW!</button>
            <button class="endChallenge">End challenge</button>
        </div>
        <div class="showSuccessPoints">
            <h1 class="player">
                <span class="charName"></span>
                (<span class="character"></span>)
                success-points:
                <span id ="playerSuccessPoints"> </span>
            </h1><br>

            <h1 class="cpu1">
                <span class="computerName1"></span>
                (<span class="computerCharacter1"></span>)
                success-points:
                <span id ="cpu1SuccessPoints"> </span>
            </h1><br>

            <h1 class="cpu2">
                <span class="computerName2"></span>
                (<span class="computerCharacter2"></span>)
                success-points:
                <span id ="cpu2SuccessPoints"></span>
            </h1><br>
            <h1 class="doIWin"></h1>
            <button class="resetAfterSuccess">Okey</button>
            <button class="confirmSuccess">Okey</button>
        </div>

<!--         <p class="lose"> Sorry man, It's the game, you lose. :(</p> -->
    </header>
    <button class='resetButton'>Reset</button>
    <footer>
    </footer>
</body>
</html>