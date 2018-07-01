function clicker() {
    console.log("clicker executed") 
    var btnFlip = document.getElementById('btnFlip');
    var text = document.getElementById('message');
    
    btnFlip.onclick = function() {
        if (text.innerHTML === "Right Side Up") {
            console.log("Flip Button Clicked");
            text.innerHTML = "Upside Down";
            text.style.transform = "rotate(180deg)";
            text.style.textAlign = "right"
        } else {
            text.innerHTML = "Right Side Up";
            text.style.transform = "rotate(0deg)";
            text.style.textAlign = "left"
        }

    }
}