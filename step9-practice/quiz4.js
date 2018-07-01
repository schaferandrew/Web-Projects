function clicker() {
    console.log("clicker executed") 
    var expand = document.getElementById('expand');
    var region = document.getElementById('region');
    var img = document.getElementById("image");
    expand.onclick = function() {
        console.log("expand clicked")
        if (region.style.display == "none") {
            img.src = "minus.png";
            region.style.display = "initial";
            console.log("src was plus")
        }else {
            img.src = "plus.png";
            region.style.display = "none";
            console.log("src was minus");         
        }

    }
}