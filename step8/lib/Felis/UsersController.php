<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/27/18
 * Time: 10:30 PM
 */

namespace Felis;

/**
 * Controller for the users page users.php
 * Utilized by post/users.php
 */
class UsersController {
    /**
     * UsersController constructor.
     * @param Site $site Site object
     * @param User $user Current user
     * @param array $post $_POST
     */
    public function __construct(Site $site, User $user, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/user.php";
    }

    /**
     * Get any redirect link
     * @return mixed Redirect link
     */
    public function getRedirect() {
        return $this->redirect;
    }


    private $redirect;	///< Page we will redirect the user to.
}