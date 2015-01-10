$(function(){
    $(".startGame").click(function() {
        $(".startGame").hide();

        //Value from which image's checked.
        var character = $("input[name='character']:checked").val();

        //Name value from the inputfield when you press start.
        var charName = $(".nameField").val();
        //Putting character and charName in an object.
        var characterData = {
            "character": character,
            "charName": charName,
        };

        //Random names for computer.
        // var computerNames = Array(
        //     "Babajaga",
        //     "BigBazooka",
        //     "TensaiNiNaru",
        //     "Ogge",
        //     "Nevalopo",
        //     "MyNameIsJeff",
        //     "SuperBlackKnight1337",
        //     "LolGetRektPlz"
        // );

        // //All character's classes.
        // var computerCharacters = Array(
        //     "Warrior",
        //     "Mage",
        //     "Hunter",
        //     "Rogue"
        // );

        // //Randomizing names and characters for computer 1 and computer 2.
        // var computerName1 = computerNames[Math.floor(Math.random()*computerNames.length)];
        // var computerName2 = computerNames[Math.floor(Math.random()*computerNames.length)];
        // var computerCharacter1 = computerCharacters[Math.floor(Math.random()*computerCharacters.length)];
        // var computerCharacter2 = computerCharacters[Math.floor(Math.random()*computerCharacters.length)];

        // //Checking if the two computer players dosen't have the same name. otherwise computer 2 will randomize it's name again.
        // if(computerName1 != computerName2) {
        //     var computerData = {
        //         "computerName1" : computerName1,
        //         "computerName2" : computerName2,
        //         "computerCharacter1" : computerCharacter1,
        //         "computerCharacter2" : computerCharacter2
        //     };

        // }

        // else {
        //     var computerName2 = computerNames[Math.floor(Math.random()*computerNames.length)];
        // }
        //Putting Data-values in Json-variables.
        var characterJson = characterData;
        // var computerJson = computerData;

        //Putting Json-variables in an object.
        var startGameData = {characterJson:characterJson};
        console.log(startGameData);

        //Checking if you've filled your name and choosed your character.
        if(charName !== "" && character !== undefined){
            console.log("Pressed start button.");
            console.log(characterData);
            $.ajax({
                url:"startGame.php",
                type: "POST",
                data: startGameData,
                dataType: "json",
                //processData: true,

                success: function (data, textStatus, jqXHR ) {
                    //This is for showing all the values on screen so you know what is happening.
                    $(".personDataInfo .character").html(character);
                    $(".personDataInfo .charName").html(charName);
                    $(".computerDataInfo .computerName1").html(data.computerName1);
                    $(".computerDataInfo .computerName2").html(data.computerName2);
                    $(".computerDataInfo .computerCharacter1").html(data.computerCharacter1);
                    $(".computerDataInfo .computerCharacter2").html(data.computerCharacter2);

                    console.log("data ", data);
                    console.log("Request: " + textStatus);
                    console.log(jqXHR);
                    $(".characterSelection").hide();
                    callingChallenge();

                 },

                error: function(jqXHR, textStatus, errorThrown, data) {
                    console.log("error data: ", data);
                    console.log(jqXHR);
                    console.log("Request failed: " + textStatus);
                    console.log("Request failed: " + errorThrown);
                    // console.log(character);
                    // console.log(charName);
                }
            });
            function callingChallenge(){
                $.ajax({
                    url:"startChallenge.php",
                    type: "POST",
                    dataType: "json",
                    success: function (data, textStatus, jqXHR ) {
                        console.log("data ", data);
                        $(".challengeInfo").show();
                        $("#" + data.challenge).show();

                    },

                    error: function(jqXHR, textStatus, errorThrown, data) {
                        console.log("error data: ", data);
                        console.log(jqXHR);
                        console.log("Request failed: " + textStatus);
                        console.log("Request failed: " + errorThrown);
                        // console.log(character);
                        // console.log(charName);
                    }

                });
            }
        } else {
            alert("Please, choose your character and enter you character name...");
            $(".startGame").show();
        }
    });

        // // The challenges variable will have a array with 5 values that's strings.
        // var challenges = Array(
        //     "Trapchallenge",
        //     "Eatchallenge",
        //     "Battlechallenge",
        //     "Cluechallenge",
        //     "Hitchallenge"
        // );

        // // The challenge variable takes a random string from challenge.
        // var challenge = challenges[Math.floor(Math.random()*challenges.length)];
        // // And the random string will make one of the images show from html
        // $("#" + challenge).show();
        $(".changeChallenge").click(function() {
            console.log("pressed change challenge");
            $.ajax({
                url: "resetChallenge.php",
                type: "POST",
                dataType: "json",
                success: function (data, textStatus, jqXHR ) {
                    $(".challengeInfo").hide();
                    console.log("success data: ", data);
                    $("#" + data.challenge).show();
                },

                error: function(jqXHR, textStatus, errorThrown, data) {
                    console.log("error data: ", data);
                    console.log(jqXHR);
                    console.log("Request failed: " + textStatus);
                    console.log("Request failed: " + errorThrown);
                }
            });
        });

        //When accepting challenge, the partner cards will show up.
        $(".acceptChallenge").click(function(){
            $.ajax({
                url: "startingChallenge.php",
                type: "POST",
                data: {
                    challenge: challenge
                },
                dataType: "json",
                success: function (data, textStatus, jqXHR ) {
                    console.log("success data: ", data);
                    $(".challengeInfo").hide();
                    $(".carryOutChallengeInfo").show();
                    $(".carryOutChallengeInfo").html("<h1> How will you carry out the " + challenge + "?</h1>");
                },

                error: function(jqXHR, textStatus, errorThrown, data) {
                    console.log("error data: ", data);
                    console.log(jqXHR);
                    console.log("Request failed: " + textStatus);
                    console.log("Request failed: " + errorThrown);
                }
            });

        });

        //Gain a value when choosing if you want a partner or not.
        $(".startChallenge").click(function(){
            var carryChallenge = $("input[name='carryChallenge']:checked").val();
            $.ajax({
                url: "startingChallenge.php",
                type: "POST",
                data: {},
                dataType: "json",
                success: function (data, textStatus, jqXHR ) {
                    console.log("success data: ", data);
                    $(".carryOutChallengeInfo").hide();
                    $(".gettingEquipment").show();
                },

                error: function(jqXHR, textStatus, errorThrown, data) {
                    console.log("error data: ", data);
                    console.log(jqXHR);
                    console.log("Request failed: " + textStatus);
                    console.log("Request failed: " + errorThrown);
                }
            });
            //Checking if you've choosen a card.
            // if(carryChallenge !== undefined) {


                //This is all the names from all the equipment-classes inside an array.
                // var equipments = Array(
                //     "axe",
                //     "mysticGlove",
                //     "staff",
                //     "totem",
                //     "bow"
                // );
                //This is so that the players and computers don't get more than 3 equipments.
                // var playerEquipmentCount = 0;
                // var computerEquipmentCount1 = 0;
                // var computerEquipmentCount2 = 0;

                //Randomizing an equipment for each computer and player in game.
                // if(playerEquipmentCount <= 3){
                //     var playerEquipment = equipments[Math.floor(Math.random()*equipments.length)];
                //     playerEquipmentCount++;
                //     console.log(playerEquipmentCount);
                // }

                // if(computerEquipment1 <= 3){
                //     var computerEquipment1 = equipments[Math.floor(Math.random()*equipments.length)];
                //     computerEquipmentCount1++;
                //     console.log(computerEquipmentCount1);
                // }

                // if(computerEquipmentCount2 <= 3){
                //     var computerEquipment2 = equipments[Math.floor(Math.random()*equipments.length)];
                //     computerEquipmentCount2++;
                //     console.log(computerEquipmentCount2);
                // }

                // console.log(playerEquipment);

                // $.ajax({
                //     url: "startingChallenge.php",
                //     type: "POST",
                //     data: {},
                //     dataType: "json",
                //     success: function (data, textStatus, jqXHR ) {
                //         console.log("success data: ", data);
                //          //Showing the new equipment for the player who will get it.
                //         $("#" + playerEquipment).show();
                //         $(".gettingEquipment").prepend
                //         ("<h1>You recived an equipment, the " + playerEquipment +" is yours now!</h1> ");

                //     },

                //     error: function(jqXHR, textStatus, errorThrown, data) {
                //         console.log("error data: ", data);
                //         console.log(jqXHR);
                //         console.log("Request failed: " + textStatus);
                //         console.log("Request failed: " + errorThrown);
                //     }
                // });
            // }
            // else{
            //     alert("Please, select how you will do the challenge...");
            // }
        });
    $(".acceptEquipment").click(function(){
        $(".gettingEquipment").hide();
        $(".theGame").show();
    });
    $(".resetButton").click(function(){
        $.ajax({
            url: "reset.php",
            type: "POST",
            data: {},
            dataType: "json",
            success: function (data, textStatus, jqXHR ) {
                console.log("success data: ", data);
                },

            error: function(jqXHR, textStatus, errorThrown, data) {
                console.log("error data: ", data);
                console.log(jqXHR);
                console.log("Request failed: " + textStatus);
                console.log("Request failed: " + errorThrown);
            }
        });
    });
});