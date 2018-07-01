/*! DO NOT EDIT ajaxnoir 2018-04-24 */
function Login(sel) {
    console.log("Login constructed");
    var form = $(sel);
    form.submit(function(event) {
        event.preventDefault();

        console.log("Submitted");
        $.ajax({
            url: "post/login.php",
            data: form.serialize(),
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                console.log(json);
                if(json.ok) {
                    // Login was successful
                    window.location.assign("./");
                } else {
                    // Login failed, a message is in json.message
                    $(sel + " .message").html("<p>" + json.message + "</p>");

                }
            },
            error: function(xhr, status, error) {
                //an error
                // console.log(error);
                $(sel + " .message").html("<p>Error: " + error + "</p>");

            }
        });
    });
}
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

function parse_json(json) {
    try {
        var data = $.parseJSON(json);
    } catch(err) {
        throw "JSON parse error: " + json;
    }

    return data;
}
function Stars(sel) {

    console.log("Stars constructor");
    var table = $(sel + " table");  // The table tag
    // Loop over the table rows
    var rows = table.find("tr");    // All of the table rows
    for(var r=1; r<rows.length; r++) {
        // Get a row
        var row = $(rows.get(r));

        // Determine the row ID
        var id = row.find('input[name="id"]').val();

        // Find and loop over the stars, installing a listener for each
        var stars = row.find("img");
        for(var s=0; s<stars.length; s++) {
            var star = $(stars.get(s));

            // We are at a star
            this.installListener(row, star, id, s+1);

        }
    }
}
Stars.prototype.installListener = function(row, star, id, rating) {
    var that = this;

    star.click(function() {

        console.log("Click on " + id + " rating: " + rating);
        $.ajax({
            url: "post/stars.php",
            data: {id: id, rating: rating},
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    // Successfully updated
                    that.update(row, rating);
                    that.updateTable(json.html);
                    //console.log("new table is: " + json.html);
                    that.message("<p>Successfully updated</p>");

                } else {
                    // Update failed
                    that.message("<p>Update failed</p>");


                }
            },
            error: function(xhr, status, error) {
                // Error
                that.message("<p>Error: " + error + "</p>");

            }
        });

    });
}
Stars.prototype.update = function(row, rating) {
    // Loop over the stars, setting the correct image
    var stars = row.find("img");
    for(var s=0; s<stars.length; s++) {
        var star = $(stars.get(s));

        if(s < rating) {
            star.attr("src", "images/star-green.png")
        } else {
            star.attr("src", "images/star-gray.png");
        }
    }

    var num = row.find("span.num");
    num.text("" + rating + "/10");
}
Stars.prototype.message = function(message) {
    // do something...
    $(".message").html(message).show().delay(2000).fadeIn(1000).fadeOut(1000);

}

Stars.prototype.updateTable = function(html) {
    $('.table').html(html);
    console.log("update table was called");
}