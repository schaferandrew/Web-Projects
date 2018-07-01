<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/27/18
 * Time: 9:58 AM
 */

namespace Felis;


class NewCaseController
{
    /**
     * CasesController constructor.
     * @param Site $site The Site object
     * @param array $session $_SESSION
     * @param array $post $_POST
     */
    public function __construct(Site $site, $user, array $post) {


        $root = $site->getRoot();
        if(isset($post["ok"])) {
            $cases = new Cases($site);
            $id = $cases->insert(strip_tags($post['client']),
                $user->getId(),
                strip_tags($post['number']));

            if($id === null) {
                $this->redirect = "$root/newcase.php?e";
            } else {
                $this->redirect = "$root/case.php?id=$id";
            }
        }

    }

    /**
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    private $redirect;	///< Page we will redirect the user to.
}