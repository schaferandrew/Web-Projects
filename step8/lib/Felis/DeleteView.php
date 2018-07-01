<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/28/18
 * Time: 8:20 PM
 */

namespace Felis;


class DeleteView extends View
{
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct(Site $site,array $get) {
        $this->setTitle("Felis Investigations Cases");
        $this->addLink("staff.php","Staff");
        $this->addLink("cases.php","Cases");
        $this->addLink("./","Log out");
        $this->site = $site;
        $this->get = $get;
    }
    public function present(){
        $caseNum = strip_tags($this->get['id']);
        $hidden = '<input type="hidden" name="id" value="' . $caseNum . '">';
        $html = <<<HTML
<form method="post" action="post/deletecase.php">
$hidden
	<fieldset>
		<legend>Delete?</legend>
		<p>Are you sure absolutely certain beyond a shadow of
			a doubt that you want to delete case $caseNum?</p>
		<p>Speak now or forever hold your peace.</p>
		<p><input type="submit" name="yes" id="yes" value="Yes"> <input type="submit" name="no" id="no" value="No"></p>
	</fieldset>
</form>
HTML;
        return $html;
    }
    private $get;
    private $site;
}