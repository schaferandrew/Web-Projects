/**
 * Create a multiplication table and
 * put into an HTML element.
 * id - Id for a div to put table into
 * rows - Number of rows
 * cols - Number of cols
 */
function clicker() {
    console.log("clicker executed");
    var b1 = document.getElementById("b1");
	var b2 = document.getElementById("b2");
	var b3 = document.getElementById("b3");

	b1.onclick = function() {
		console.log("Button 1 pressed");
	   if(b1.innerHTML === "Press Me") {
			b1.innerHTML = "&nbsp;";
			b2.innerHTML = "No, Me";
		}
	}
    b2.onclick = function() {
        if(b2.innerHTML === "No, Me") {
            b2.innerHTML = "&nbsp;";
            b3.innerHTML = "Nope";
        }
    }
    b3.onclick = function() {
        if(b3.innerHTML === "Nope") {
            b3.innerHTML = "&nbsp;";
            b1.innerHTML = "Press Me";
        }
    }
}