<?php
/**
 * @author :  SAIFUL ISLAM
 * @Coauthor : ASHIK SHAFAYTE
 * @Coauthor : NURUL HASAN
 * @batch  :SUST CSE 2013-14
 * @contact : saiful.sust.cse@gmail.com
 * @facebook : https://www.facebook.com/SaifulIslamLitonSust
 * @facebook : https://www.facebook.com/ashik.shafayet.5
 * @facebook : https://www.facebook.com/hasan.sust.cse
 * @package SUST SCHOOL WEB SITE
 * @version CVS: $Id: reader.php 19 2007-03-13 12:42:41Z shangxiao $
 * please ,contact with me .i will be pleasure if you contact with me for your important suggestions and opions for improving my coding or my coding skill
 **/
/**
 * @package using packege
 **/

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\Storage;
/*define('CLASS_START_ID', 3);
define('CLASS_END_ID', 12);*/
class TutorialsModel {
	public function getTutorials($categoryId, $subjectId) {
		return DB::select($this->query($categoryId, $subjectId));
	}
	private function query($categoryId, $subjectId) {
		$query = "select tutorialId,chapterNo,chapterName ,tutorialLink ,subjectName,categoryName
from tutorials,subject,categories
where  tutorials.subjectId=subject.subjectId and tutorials.categoryId=categories.categoryId and tutorials.categoryId=" . $categoryId . " and tutorials.subjectId=" . $subjectId;
		return $query;
	}
	public function getClasses() {
		$query = "SELECT * FROM categories WHERE categoryId>= '" . CLASS_START_ID . "' and categoryId <= '" . CLASS_END_ID . "'";
		return DB::select($query);
	}
}