<?php
/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Felis\Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');
    $site->setEmail('schaf170@cse.msu.edu');
    $site->setRoot('/~schaf170/step7');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=schaf170',
        'schaf170',       // Database user
        '229037',     // Database password
        '');            // Table prefix
};
