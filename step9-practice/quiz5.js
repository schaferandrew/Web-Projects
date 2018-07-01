function clicker() {

    console.log("clicker executed");
    var answer = Math.floor(Math.random() * 100);
    console.log("Random is " + answer);
    document.getElementById("form").onsubmit=function(event){
        console.log("submit was clicked")
        var guess = document.getElementById("guess").value;
        console.log("guess: " + guess)
        var result
        event.preventDefault();    
        if(guess===null || guess ==="") {
            result = "Silly you, enter a number!";
        } else if (guess==answer) {
            result = "You're a winner!";
            answer = Math.floor(Math.random() * 100);
        } else if (isNaN(guess))   {
            result = "Invalid Input";
        } else if (guess > answer) {
            result = "Too High!";
        } else {
            result = "Too Low!";
        }
        document.getElementById("result").innerHTML=result;

    }   
    var giveUp = document.getElementById("giveup");
    giveUp.onclick = function(event) {
        console.log("Give up was clicked");
        event.preventDefault();
        var result = "The number was "+answer+", dood. It's not that hard.";
        
        document.getElementById("result").innerHTML=result;
    
    } 
}