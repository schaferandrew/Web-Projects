<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/20/18
 * Time: 6:47 PM
 */

namespace Felis;


class StaffView extends View
{
    public function __construct()
    {
        $this->setTitle("Felis Investigations Staff");
        $this->addLink("./post/logout.php", "Log out");
    }
}