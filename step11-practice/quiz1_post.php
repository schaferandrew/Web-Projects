<?php
$pdo;
try {
  $pdo = new PDO('mysql:host=mysql-user.cse.msu.edu;dbname=cse477s', 
                'cse477sro',
                'Letmesql');
} catch(PDOException $e) {
  // If we can't connect we die!
  die("Unable to select database");
}


$language = strip_tags($_GET['language']);
$official = strip_tags($_GET['official']);

$sql = <<<SQL
    SELECT country.Name, language.Percentage, language.IsOfficial
    FROM Country country, CountryLanguage language
    Where country.Code = language.CountryCode and language.Language LIKE ?
    ORDER BY country.Name
SQL;

$html = <<<HTML
<table>
<tr><th>Country</th><th>Percentage</th><th>Official</th></tr>
HTML;
//add other one for IsOfficial
$statement = $pdo->prepare($sql);
$statement->execute(array($language));
$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
foreach ($rows as $row){
    $country = $row['Name'];
    $perc = $row['Percentage'];
    $isOfficial = $row['IsOfficial'];
    if (($official == "yes" && $isOfficial == "T") || $official =="neither" || ($official == "no" && $isOfficial == "F")) {
        $officialRes;
        if($isOfficial == "T") {
            $officialRes = "Yes";
        } else {
            $officialRes = "No";
        }
        if ($perc != "0.0") {
            $html .= "<tr><td>$country</td><td>$perc</td><td>$officialRes</td></tr>";
        }
    }
}
$html .= "</table>";
echo "$html";
