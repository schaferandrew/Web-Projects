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

$lang = $_GET['language'];
$official = $_GET['official'];

$sql = <<<SQL
    SELECT country.Name, language.Percentage, language.IsOfficial
    FROM Country country, CountryLanguage language
    WHERE country.Code = language.CountryCode and language.Language LIKE ?
SQL;

$statement = $pdo->prepare($sql);
$statement->execute(array($lang));
$entries = $statement->fetchAll(\PDO::FETCH_ASSOC);

$html = "";
$html .= <<<HTML
    <table>
        <tr><th>Country</th><th>Percentage</th><th>Official</th></tr>
HTML;

for($i = 0; $i < count($entries); $i++) {
    $check = $_GET['official'];
    $name = $entries[$i]['Name'];
    $percentage = $entries[$i]['Percentage'];
    $official = $entries[$i]['IsOfficial'];

    if($official == "T") {
        $official = "Yes";
    }
    if($official == "F") {
        $official = "No";
    }
    if($check == "yes") {
        if($official == "Yes" and $percentage != "0.0") {
            $html .= "<tr><td>$name</td><td>$percentage</td><td>$official</td></tr>";
        }
        } else if ($check == "no") {
        if($official == "No" and $percentage != "0.0") {
            $html .= "<tr><td>$name</td><td>$percentage</td><td>$official</td></tr>";
        }
    } else {
        if($percentage != "0.0") {
            $html .= "<tr><td>$name</td><td>$percentage</td><td>$official</td></tr>";
        }
    }
}
$html .= <<<HTML
</table>
HTML;

echo "$html";