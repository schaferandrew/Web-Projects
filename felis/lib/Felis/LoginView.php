<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/20/18
 * Time: 10:22 PM
 */

namespace Felis;


class LoginView extends View
{
    public function __construct(array $session, array $get)
    {
        $this->setTitle("Felis Investigations Login");
        if(isset($get['e'])){
            $this->error = "Incorrect";
        }
    }
    public function presentForm() {
        $html = "";
        if ($this->error != ""){
            $html = '<p class="msg">Invalid login credentials</p>';
        }
        $html .= <<<HTML
<form method="post" action="post/login.php">
    <fieldset>
        <legend>Login</legend>
        <p>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email">
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Password">
        </p>
        <p>
            <input type="submit" value="Log in"> <a href="">Lost Password</a>
        </p>
        <p><a href="./">Felis Agency Home</a></p>

    </fieldset>
</form>
HTML;

        return $html;
    }

    private $error= "";
}