<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Language Search</title>
    <link rel="stylesheet" href="countries/countries.css">
    <script src="jquery.min.js"></script>
     <script>
    $(document).ready(function() {
        new Languages("#language_search");
    });
    </script> 
</head>
<body>

<form id="language_search">
    <fieldset>
        <p><label for="language">Language</label><br>
            <input type="text" name="language" id="language"></p>
        <p><label for="official">Official</label><br>
            <input type="radio" name="official" value="yes">Yes</input><br>
            <input type="radio" name="official" value="no">No</input><br>
            <input type="radio" name="official" value="neither" checked>Don't Care</input></p>
        <p><input type="submit" value="Search"></p>
    </fieldset>
    <div class="result"></div>
</form>

</body>
</html>