<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/19/18
 * Time: 10:33 PM
 */

namespace Felis;


class HomeView extends View
{
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct() {
        $this->setTitle("Felis Investigations");

        $this->addLink("login.php", "Log in");
    }

    /**
     * Add content to the header
     * @return string Any additional comment to put in the header
     */
    protected function headerAdditional() {
        return <<<HTML
<p>Welcome to Felis Investigations!</p>
<p>Domestic, divorce, and carousing investigations conducted without publicity. People and cats shadowed
    and investigated by expert inspectors. Katnapped kittons located. Missing cats and witnesses located.
    Accidents, furniture damage, losses by theft, blackmail, and murder investigations.</p>
<p><a href="">Learn more</a></p>
HTML;
    }
    public function addTestimonial($text,$author) {
        $html = <<<HTML
<blockquote>
    <p>$text</p>
    <cite>$author</cite>
</blockquote>
HTML;

        if ($this->sideToggle) {
            $this->testimonialsLeft .= $html;
        } else {
            $this->testimonialsRight .= $html;
        }
        $this->sideToggle = !$this->sideToggle;

    }
    public function testimonials() {
        $html = <<<HTML
<section class="testimonials">
    <h2>TESTIMONIALS</h2>
        $this->testimonialsLeft</div>
        $this->testimonialsRight</div>
</section>
HTML;
        return $html;
    }

    private $testimonialsRight = '<div class="right">';
    private $testimonialsLeft = '<div class="left">';

    private $sideToggle = true;
}