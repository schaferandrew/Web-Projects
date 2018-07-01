function displayQuadratic(id, a, b, c) {
a = formatCoef(a)
b = formatCoef(b)
var html = "<p>" + a + "x<sup>2</sup> + " +
        b + "x + " + c + "</p>";
        
    document.getElementById(id).innerHTML = html;
}
function formatCoef(x) {
    if (x == "1") {
        x = ""
    } else if (x=="-1") {
        x = "-"
    }
    return x
}