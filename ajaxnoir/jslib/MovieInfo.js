function MovieInfo(sel, title, year) {
    console.log("MovieInfo: " + title + "/" + year);
    var that = this;


    $.ajax({
        url: "https://api.themoviedb.org/3/search/movie",
        data: {api_key: "0745db42af2e54202e8cd16ec79e25bc", query: title, year: year},
        method: "GET",
        dataType: "text",
        success: function(data) {
            var json = parse_json(data);
            if(json.total_results == 0){
                $(".paper").html("<p>No information available</p>");
            }else{
                console.log(json.results[0]);
                that.present(sel, json.results[0]);
            }
        },
        error: function(xhr, status, error) {
            // An error!
            $(".paper").html("<p>Unable to communicate<br>with themoviedb.org</p>");
        }

    });
}

MovieInfo.prototype.present = function(sel, movie){
    var html = "<ul><li id='info'><a id='infoLink' href='#'><img src='images/info.png'></a><div class='show'>" +
        "<p>Title: " + movie['title'] + "</p>" +
        "<p>Release Date: " + movie['release_date'] + "</p>" +
        "<p>Vote Average: " + movie['vote_average'] + "</p>" +
        "<p>Vote Count: " + movie['vote_count'] + "</p>" +
        "</div></li>" +
        "<li id='plot'><a id='plotLink' href='#'><img src='images/plot.png'></a><div>" +
        "<p>" + movie['overview'] + "</p>" +
        "</div></li>" +
        "<li id='poster'><a id='posterLink' href='#'><img src='images/poster.png'></a>" +
        "<div><p class='poster'><img id='poster' src=''></p>" +
        "</div></li></ul>";

    $(sel).html(html);
    $("img#poster").attr('src', 'http://image.tmdb.org/t/p/w500/' + movie['poster_path']);

    $( "#infoLink" ).click(function() {
        console.log("clicked on info link");
        $("#infoLink > img").css("opacity", 1);
        $("#plotLink > img").css("opacity", 0.3);
        $("#posterLink > img").css("opacity", 0.3);
        $("li#plot > div").fadeOut(1000);
        $("li#poster > div").fadeOut(1000);
        $("li#info > div").fadeIn(1000);
    });
    $( "#plotLink" ).click(function() {
        console.log("clicked on plot");
        $("#infoLink > img").css("opacity", 0.3);
        $("#plotLink > img").css("opacity", 1);
        $("#posterLink > img").css("opacity", 0.3);        $("li#info > div").fadeOut(1000);
        $("li#poster > div").fadeOut(1000);
        $("li#plot > div").fadeIn(1000);
    });
    $( "#posterLink" ).click(function() {
        console.log("clicked on poster");
        $("#infoLink > img").css("opacity", 0.3);
        $("#plotLink > img").css("opacity", 0.3);
        $("#posterLink > img").css("opacity", 1);
        $("li#info > div").fadeOut(1000);
        $("li#plot > div").fadeOut(1000);
        $("li#poster > div").fadeIn(1000);
    });
};
