<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/28/18
 * Time: 12:28 AM
 */

namespace Felis;


class PasswordValidateView extends View
{
    const INVALID_VALIDATOR = 0;
    const INVALID_USER = 1;
    const INVALID_EMAIL = 2;
    const PASSW0RD_DOES_NOT_MATCH = 3;
    CONST PASSWORD_TOO_SHORT = 4;
    public function __construct(Site $site, array $get)
    {
        $this->setTitle("Felis Password Entry");
        $this->validator = strip_tags($get['v']);
        if (isset($get['e'])) {
            $this->e = strip_tags($get['e']);

        }

    }
    public function present() {
        $html = '';
        if($this->e == self::INVALID_VALIDATOR) {
            $html.= "<p>Validator is Invalid</p>";
        } else if ($this->e == self::INVALID_USER) {
            $html.= "<p>Invalid User</p>";
        } else if ($this->e == self::INVALID_EMAIL) {
            $html.="<p>Invalid Email</p>";
        }
        else if ($this->e == self::PASSW0RD_DOES_NOT_MATCH) {
            $html.="<p>Passwords did not match</p>";
        }
        else if ($this->e == self::PASSWORD_TOO_SHORT) {
            $html.="<p>Password must be at least 8 characters</p>";
        }

        $html.= <<<HTML
 <form action="post/password-validate.php" method="post">
            <input type="hidden" name="validator" value="$this->validator">
            <fieldset>
                <legend>Change Password</legend>
                <p>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Email">
                </p>
                <p>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Password">
                </p>
                <p>
                    <label for="passwordCheck">Confirm password</label><br>
                    <input type="password" id="passwordCheck" name="passwordCheck" placeholder="Password">
                </p>
                <p>
                    <input type="submit" name="ok" id="ok" value="OK">
                    <input type="submit" name="cancel" id="cancel" value="Cancel">
                </p>
            </fieldset>
        </form>
    </div>
HTML;
return $html;
    }
    private $validator;
    private $e = -1;

}