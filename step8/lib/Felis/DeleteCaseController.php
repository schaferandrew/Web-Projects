<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/28/18
 * Time: 8:29 PM
 */

namespace Felis;


class DeleteCaseController
{
    public function __construct(Site $site,array $get, $post)
    {
        $root = $site->getRoot();
        $id = $get['id'];
        if(isset($post["yes"])){
            $cases = new Cases($site);
            $cases->delete($id);
        }
        $this->redirect = "$root/cases.php";
    }
    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }
    private $redirect;
}