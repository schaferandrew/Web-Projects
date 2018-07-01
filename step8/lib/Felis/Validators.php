<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/20/18
 * Time: 9:38 PM
 */

namespace Felis;


class Validators extends Table
{
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "validator");
    }
    /**
     * Create a new validator and add it to the table.
     * @param $userid User this validator is for.
     * @return The new validator.
     */
    public function newValidator($userid) {
        $validator = $this->createValidator();
        // Write to the table
        $sql = <<<SQL
INSERT INTO $this->tableName(userid, validator, date)
VALUES (?, ?, now())
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid, $validator));

        return $validator;
    }

    /**
     * Generate a random validator string of characters
     * @param $len Length to generate, default is 32
     * @returns Validator string
     */
    public function createValidator($len = 32) {
        $bytes = openssl_random_pseudo_bytes($len / 2);
        return bin2hex($bytes);
    }
    /**
     * Determine if a validator is valid. If it is,
     * return the user ID for that validator.
     * @param $validator Validator to look up
     * @return User ID or null if not found.
     */
    public function get($validator) {
$sql=<<<SQL
SELECT userid from $this->tableName
where validator=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($validator));
        if($statement->rowCount() === 0) {
            return null;
        }
        $data = $statement->fetch(\PDO::FETCH_ASSOC);
        $userid = $data['userid'];
        return $userid;

    }

    /**
     * Remove any validators for this user ID.
     * @param $userid The USER ID we are clearing validators for.
     */
    public function remove($userid) {
        $sql = <<<SQL
delete from $this->tableName
where userid=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));

    }

}