<?php

class World {
   public function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host=mysql-user.cse.msu.edu;dbname=cse477s', 
                'cse477sro',
                'Letmesql');
        } catch(PDOException $e) {
           // If we can't connect we die!
           die("Unable to select database");
        }
    }
    public function setRegion($region) {
        $this->region = $region;
    }
    
    public function present() {
        $sql = <<<SQL
select C.name, L.LANGUAGE 
from Country as C, CountryLanguage as L
where C.code=L.CountryCode and region=?
order by C.name
SQL;
        $stmt = $this->pdo->prepare($sql);
        if(!$stmt->execute(array($this->region))) {
            return "<p>SQL execution failed.</p>";
        }
        
        $html = <<<HTML
<ul>
HTML;
        $prevName="";
        foreach($stmt as $row) {
            $language = $row['LANGUAGE'];
            if($prevName=="") {
                $name= $row['name'];
                $prevName=$name;
                $html .= "<li>$name<ul><li>$language</li>";
            } else if($prevName!=$row['name']) {
                $name = $row['name'];
                $prevName = $name;
                $html .= "</ul></li><li>$name<ul><li>$language</li>";
            } else {
                $html .= "<li>$language</li>";
            }
        }
    
        $html .= "</ul></li></ul>";

        return $html;
    }
    
    private $pdo;   // PDO object
    private $region;
    
}