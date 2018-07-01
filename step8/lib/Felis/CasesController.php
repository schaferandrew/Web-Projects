<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/20/18
 * Time: 10:03 PM
 */

namespace Felis;


class CasesController
{
    /**
     * CasesController constructor.
     * @param Site $site The Site object
     * @param array $session $_SESSION
     * @param array $post $_POST
     */
    public function __construct(Site $site, array $post) {


        $root = $site->getRoot();

        if(isset($post["add"])) {
            $this->redirect = "$root/newcase.php";
        } else if(isset($post["delete"])){
            if(isset($post["id"])) {
            $id = strip_tags($post["id"]);
            $this->redirect = "$root/deletecase.php?id=$id";
            } else {
                $this->redirect = "$root/cases.php";
            }

        }  else {
            $this->redirect = "$root/cases.php";
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