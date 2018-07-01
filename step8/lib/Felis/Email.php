<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/28/18
 * Time: 12:02 AM
 */

namespace Felis;


/**
 * Email adapter class
 */
class Email {
    public function mail($to, $subject, $message, $headers) {
        mail($to, $subject, $message, $headers);
    }
}