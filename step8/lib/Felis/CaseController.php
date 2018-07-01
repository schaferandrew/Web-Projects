<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/27/18
 * Time: 8:00 PM
 */

namespace Felis;


class CaseController
{
    public function __construct(Site $site, array $post)
    {
        $root = $site->getRoot();
        if(isset($post['id']) && isset($post['update'])) {
            $id = strip_tags($post['id']);
            $caseNum = strip_tags($post['number']);
            $cases = new Cases($site);
            $case = $cases->get($id);
            // don't allow duplicate ids
            if($case === null || $this->isCaseNum($cases, $caseNum, $id)){
                $this->redirect = "$root/case.php";
            }
            else{
                $number = strip_tags($post['number']);
                $summary = strip_tags($post['summary']);
                $agent =strip_tags($post['agent']);
                $status = strip_tags($post['status']);
                $cases->update($id,$number,$summary,$agent,$status);
                $this->redirect = "$root/cases.php";
            }
        } else {
            $this->redirect = "$root/newcase.php";
        }
    }
    public function getRedirect() {
        return $this->redirect;
    }
    public function isCaseNum(Cases $cases, $number, $id) {
        foreach($cases as $case) {
            if ($case->getNumber() === $number and $case->getId() !== $id) {
                return true;
            }
        }
        return false;
    }
}