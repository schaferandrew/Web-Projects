<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/20/18
 * Time: 9:38 PM
 */

namespace Felis;


class Cases extends Table
{
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "case");
    }


    /**
     * Get a user based on the id
     * @param $id ID of the user
     * @returns User object if successful, null otherwise.
     */
    public function get($id) {

        $users = new Users($this->site);
        $usersTable = $users->getTableName();

        $sql = <<<SQL
SELECT c.id, c.client, client.name as clientName,
       c.agent, agent.name as agentName,
       number, summary, status
from $this->tableName c,
     $usersTable client,
     $usersTable agent
where c.client = client.id and
      c.agent=agent.id and
      c.id=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }
        return new ClientCase($statement->fetch(\PDO::FETCH_ASSOC));

    }


    public function insert($client, $agent, $number) {
        $sql = <<<SQL
insert into $this->tableName(client, agent, number, summary, status)
values(?, ?, ?, "", ?)
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            if($statement->execute(array($client,
                        $agent,
                        $number,
                        ClientCase::STATUS_OPEN)
                ) === false) {
                return null;
            }
        } catch(\PDOException $e) {
            return null;
        }

        return $pdo->lastInsertId();
    }

    public function getCases() {
        $users = new Users($this->site);
        $usersTable = $users->getTableName();

        $sql = <<<SQL
SELECT c.id, c.number, c.summary, c.status, c.client, c.agent, client.name as clientName, agent.name as agentName
FROM $this->tableName c
JOIN $usersTable client 
ON c.client = client.id
JOIN $usersTable agent
ON c.agent = agent.id
ORDER BY c.status desc, number
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute();
        if($statement->rowCount() === 0) {
            return array();
        }

        $cases = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $casesArray = array();
        foreach($cases as $case){
            $clientcase = new ClientCase($case);
            array_push($casesArray,$clientcase);
        }
        return $casesArray;
    }

    public function update($id,$number,$summary,$agent,$status){
        $sql = <<<SQL
update $this->tableName
set number=?, summary=?,agent=?,status=?
WHERE id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($number,$summary,$agent,$status,$id));

    }

    public function delete($id) {
        $sql = <<<SQL
delete from $this->tableName
where id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));
    }
}