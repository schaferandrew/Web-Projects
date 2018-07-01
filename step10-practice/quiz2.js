/**
 * Display a record album
 * @param id The ID of a div to put the HTML into
 * @param album The album object
 */
function displayAlbum(id, album) {
    var str = "<h1>" + album.title+ "</h1>";
    str += "<h2>" + album.artist + "</h2>";

    for(var side=1; side <= album.sides.length; side++) {
        var cuts = album.sides[side-1];
        str += "<h3>Side: " + side + "</h3>";
        for(var i=1; i <= cuts.length; i++) {
            var cut = cuts[i-1];
            str += "<p>" + cut.title + " <span>" + cut.dur + "</span></p>";
        }
    }

    document.getElementById(id).innerHTML = str;
}