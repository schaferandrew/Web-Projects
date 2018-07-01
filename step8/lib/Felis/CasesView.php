<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/26/18
 * Time: 8:08 PM
 */

namespace Felis;


class CasesView extends View
{
    public function __construct(Site $site)
    {
        $this->setTitle("Felis Investigations Cases");
        $this->addLink("staff.php", "Staff");
        $this->site = $site;
    }
    public function present() {
        $html = <<<HTML
<form class="table" method="post" action="post/cases.php">
	<p>
	<input type="submit" name="add" id="add" value="Add">
	<input type="submit" name="delete" id="delete" value="Delete">
	</p>

	<table>
		<tr>
			<th></th>
			<th>Case Number</th>
			<th>Client</th>
			<th>Agent In Charge</th>
			<th class="desc">Description</th>
			<th>Most Recent Report</th>
			<th>Status</th>
			<th>Id</th>
		</tr>
HTML;
        $cases = new Cases($this->site);
        $all = $cases->getCases();
        foreach($all as $case) {
            $id = $case->getId();
            $num = $case->getNumber();
            $client = $case->getClientName();
            $agent = $case->getAgentName();
            $summary = $case->getSummary();
            $open = $case->getStatus() === ClientCase::STATUS_OPEN ?
                "Open" : "Closed";

            $html .= <<<HTML
		<tr>
			<td><input type="radio" name="user" value="$id"></td>
			<input type="hidden" name="id" value="$id">
			<td><a href="case.php?id=$id" name="id">$num</a></td>
			<td>$client</td>
			<td>$agent</td>
			<td class="desc"><div>$summary</div></td>
			<td></td>
			<td>$open</td>
			<td>$id</td>
		</tr>
     
HTML;
        }
        $html.= <<<HTML

	</table>
</form>

HTML;
        return $html;
    }
    protected $site;
}