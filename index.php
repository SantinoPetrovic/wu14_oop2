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
            <label>
                <input type="radio" id="carryOutChallenge" name="carryChallenge">
                <img src="imgs/carryOutChallenge.png">
            </label>

            <label>
                <input type="radio" id="carryOutChallengeWithPartner" name="carryChallenge">
                <img src="imgs/carryOutChallengeWithPartner.png">
            </label> <br>
            <button class="startChallenge">Let's go!</button>
        </div>

        <div class="gettingEquipment">
            <img src="imgs/axe.png" id="Axe" class="equipment">
            <img src="imgs/mysticGlove.png" id="MysticGlove" class="equipment">
            <img src="imgs/staff.png" id="Staff" class="equipment">
            <img src="imgs/totem.png" id="Totem" class="equipment">
            <img src="imgs/bow.png" id="Bow" class="equipment"> <br>
            <button class="acceptEquipment">Okey!</button>
        </div>

        <div class="theGame">
            
        </div>
        <p class="noProgress"> Sorry man, It's the game :(</p>
    </header>
    <button class='resetButton'>Reset</button>
    <footer>
    </footer>
</body>
</html>