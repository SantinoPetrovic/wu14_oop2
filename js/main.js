$(function(){
    $(".startGame").click(function() {

        //Value from which image's checked.
        var character = $("input[name='character']:checked").val();

        //Name value from the inputfield when you press start.
        var charName = $(".nameField").val();
        //Putting character and charName in an object.
        var characterData = {
            "character": character,
            "charName": charName,
        };

        //Checking if you've filled your name and choosed your character.
        if(charName !== "" && character !== undefined){
            console.log("Pressed start button.");
            console.log(characterData);
            $.ajax({
                url:"startGame.php",
                type: "POST",
                data: {characterData : characterData},
                dataType: "json",

                success: function (data, textStatus, jqXHR ) {
                    //This is for showing all the values on screen so you know what is happening.
                    $(".character").html(character);
                    $(".charName").html(charName);
                    $(".computerName1").html(data.computerName1);
                    $(".computerName2").html(data.computerName2);
                    $(".computerCharacter1").html(data.computerCharacter1);
                    $(".computerCharacter2").html(data.computerCharacter2);
                    $(".player .character").html(character);
                    $(".player .charName").html(charName);
                    $(".cpu1 .computerName1").html(data.computerName1);
                    $(".cpu2 .computerName2").html(data.computerName2);
                    $(".cpu1 .computerCharacter1").html(data.computerCharacter1);
                    $(".cpu2 .computerCharacter2").html(data.computerCharacter2);
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
        $(".changeChallenge").click(function() {
            console.log("pressed change challenge");
            $.ajax({
                url: "resetChallenge.php",
                type: "POST",
                dataType: "json",
                success: function (data, textStatus, jqXHR ) {
                    $(".challenge").hide();
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
                dataType: "json",
                success: function (data, textStatus, jqXHR ) {
                    console.log("success data: ", data);
                    console.log(data.playerEquipment);
                    $(".challengeInfo").hide();
                    $(".gettingEquipment").show();
                    $(".gettingEquipment #" + data.playerEquipment).show();
                    $(".gettingEquipment .status").html(data.equipmentStatus);
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
        $(".soloChallenge").click(function(){
            $(".carryOutChallengeInfo").hide();
            $(".theGame").show();
            // $.ajax({
            //     url: "startingChallenge.php",
            //     type: "POST",
            //     // data: {},
            //     dataType: "json",
            //     success: function (data, textStatus, jqXHR ) {
            //         console.log("success data: ", data);
            //     },

            //     error: function(jqXHR, textStatus, errorThrown, data) {
            //         console.log("error data: ", data);
            //         console.log(jqXHR);
            //         console.log("Request failed: " + textStatus);
            //         console.log("Request failed: " + errorThrown);
            //     }
            // });

        });

        $(".teamChallenge").click(function(){
            $(".carryOutChallengeInfo").hide();
            $(".carryChallengeWithCpu").show();
        });

        $(".teamCpu1").click(function(){
            var teamData = "cpu1";
            var teamJson = {
                "teamData" : teamData
            }
            console.log(teamJson);
            $.ajax({
                url: "team.php",
                type: "POST",
                data: {teamJson : teamJson},
                dataType: "json",
                success: function (data, textStatus, jqXHR ) {
                    console.log("success data: ", data);
                    $(".carryChallengeWithCpu").hide();
                    $(".theGame").show();
                    $(".theGame .player").hide();
                    $(".theGame .cpu1").hide();
                    $(".theGame .team").show();

                },

                error: function(jqXHR, textStatus, errorThrown, data) {
                    console.log("error data: ", data);
                    console.log(jqXHR);
                    console.log("Request failed: " + textStatus);
                    console.log("Request failed: " + errorThrown);
                }
            });
        });

        $(".teamCpu2").click(function(){
            var teamData = "cpu2";
            var teamJson = {
                "teamData" : teamData
            }
            console.log(teamJson);
            $.ajax({
                url: "team.php",
                type: "POST",
                data: {teamJson : teamJson},
                dataType: "json",
                success: function (data, textStatus, jqXHR ) {
                    console.log("success data: ", data);
                    $(".carryChallengeWithCpu").hide();
                    $(".theGame").show();
                    $(".theGame .player").hide();
                    $(".theGame .cpu2").hide();
                    $(".theGame .team").show();
                },

                error: function(jqXHR, textStatus, errorThrown, data) {
                    console.log("error data: ", data);
                    console.log(jqXHR);
                    console.log("Request failed: " + textStatus);
                    console.log("Request failed: " + errorThrown);
                }
            });
        });
    $(".acceptEquipment").click(function(){
        $(".gettingEquipment").hide();
        // $(".theGame").show();
        $(".carryOutChallengeInfo").show();
    });
    // function startOver() {
        $(".resetButton").click(function(){
            $.ajax({
                url: "reset.php",
                type: "POST",
                // data: {startOver: 1},
                success: function (data, textStatus, jqXHR ) {
                    console.log("success data: ", data);
                    $(".carryChallengeWithCpu").hide();
                    $(".carryOutChallengeInfo").hide();
                    $(".gettingEquipment").hide();
                    $(".equipment").hide();
                    $(".challengeInfo").hide();
                    $(".challenge").hide();
                    $(".characterSelection").show();
                    $(".theGame").hide();
                    $(".player").show();
                    $(".cpu1").show();
                    $(".cpu2").show();
                    },

                error: function(jqXHR, textStatus, errorThrown, data) {
                    console.log("error data: ", data);
                    console.log(jqXHR);
                    console.log("Request failed: " + textStatus);
                    console.log("Request failed: " + errorThrown);
                }
            });
        });
    // }
});