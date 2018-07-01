function hangman() {
    var word = randomWord();
    console.log(word);

    var playArea = document.getElementById("play-area");
    playArea.innerHTML = generateHTML(word);

    var numGuesses = 0;

    var harold = document.getElementById("harold");
    var guessBtn = document.getElementById("guessBtn");
    var newgameBtn = document.getElementById("newgame");
    var message = document.getElementById("message");
    var guess = document.getElementById("guess");


    newgameBtn.onclick = function(event){
        event.preventDefault();

        var hiddenWord = document.getElementById("word");

        numGuesses = 0;
        word = randomWord();
        guess.innerHTML = generateProgress(word);
        hiddenWord.value = word;
    }

    guessBtn.onclick = function (event) {
        event.preventDefault();
        console.log("Pressed Guess")

        var letter = document.getElementById("letter");

        if(!letter.value.length == 1) {
            message.innerHTML = "You must enter a letter!";
            letter.value = "";
        } else {
            if (word.indexOf(letter.value) == -1) {
                numGuesses++;
                if(numGuesses >= 6) {
                    message.innerHTML = "You guessed poorly!";
                    harold.src = "hangman/hm6.png";
                    var wordWithSpaces = "";
                    for(var i=0;i<word.length;i++){
                        wordWithSpaces += word[i] + " ";
                    }
                    guess.innerHTML = wordWithSpaces;
                } else if(numGuesses == 5) {
                    letter.value = "";
                    harold.src = "hangman/hm5.png";
                } else if(numGuesses == 4) {
                    letter.value = "";
                    harold.src = "hangman/hm4.png";
                } else if(numGuesses == 3) {
                    letter.value = "";
                    harold.src = "hangman/hm3.png";
                } else if(numGuesses == 2) {
                    letter.value = "";
                    harold.src = "hangman/hm2.png";
                } else if(numGuesses == 1) {
                    letter.value = "";
                    harold.src = "hangman/hm1.png";
                }
            } else {
                var partialWord = "";
                for (var i = 0; i < word.length; i++) {
                    if (word[i] == letter.value) {
                        partialWord += letter.value + " ";
                    }
                    else if(guess.innerHTML.indexOf(word[i]) != -1){
                        partialWord += word[i] + " ";
                    }
                    else {
                        partialWord += "_ ";
                    }
                }
                guess.innerHTML = partialWord;
                letter.value="";
                partialWord = partialWord.replace(/ /g, "");
                if(partialWord == word){
                    message.innerHTML = "You Win!"

                }
            }
        }
    }


}

function generateProgress(word) {
    var blankWord = "";
    for(var i=0;i<word.length;i++){
        blankWord += "_ ";
    }
    return blankWord
}

function generateHTML(word) {
    var html = "<img id='harold' src='hangman/hm0.png' height='300' width='125' alt='harold being hanged'>" +
        "<p id='guess'>";


    html += generateProgress(word);
    html += "</p><form>" + "<input type='hidden' id='word' value='" + word + "'>";
    html += "</p>" + "<label for='letter'>Letter:</label>"
        + "<input id='letter' type='text' name='letter'>";
    html += "<p><input id='guessBtn' type='submit' value='Guess!'>"
        + "<input type='submit' id='newgame' value='New Game'></p>"
        + "<p id='message'>&nbsp;</p></form>";
    return html;
}

function randomWord() {
    var words = ["moon","home","mega","blue","send","frog","book","hair","late",
        "club","bold","lion","sand","pong","army","baby","baby","bank","bird","bomb","book",
        "boss","bowl","cave","desk","drum","dung","ears","eyes","film","fire","foot","fork",
        "game","gate","girl","hose","junk","maze","meat","milk","mist","nail","navy","ring",
        "rock","roof","room","rope","salt","ship","shop","star","worm","zone","cloud",
        "water","chair","cords","final","uncle","tight","hydro","evily","gamer","juice",
        "table","media","world","magic","crust","toast","adult","album","apple",
        "bible","bible","brain","chair","chief","child","clock","clown","comet","cycle",
        "dress","drill","drink","earth","fruit","horse","knife","mouth","onion","pants",
        "plane","radar","rifle","robot","shoes","slave","snail","solid","spice","spoon",
        "sword","table","teeth","tiger","torch","train","water","woman","money","zebra",
        "pencil","school","hammer","window","banana","softly","bottle","tomato","prison",
        "loudly","guitar","soccer","racket","flying","smooth","purple","hunter","forest",
        "banana","bottle","bridge","button","carpet","carrot","chisel","church","church",
        "circle","circus","circus","coffee","eraser","family","finger","flower","fungus",
        "garden","gloves","grapes","guitar","hammer","insect","liquid","magnet","meteor",
        "needle","pebble","pepper","pillow","planet","pocket","potato","prison","record",
        "rocket","saddle","school","shower","sphere","spiral","square","toilet","tongue",
        "tunnel","vacuum","weapon","window","sausage","blubber","network","walking","musical",
        "penguin","teacher","website","awesome","attatch","zooming","falling","moniter",
        "captain","bonding","shaving","desktop","flipper","monster","comment","element",
        "airport","balloon","bathtub","compass","crystal","diamond","feather","freeway",
        "highway","kitchen","library","monster","perfume","printer","pyramid","rainbow",
        "stomach","torpedo","vampire","vulture"];
    return words[Math.floor(Math.random() * words.length)];
}