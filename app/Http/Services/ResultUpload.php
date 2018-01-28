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
/**
all necessary classes are imported here
 **/
use App\Http\Services\ResultShow;
use Illuminate\Support\Facades\DB;

/*
all necessary constants are declared here
 */
define('CLASS_START_ID', 3);
define('CLASS_END_ID', 12);
/* class functionality started here **/

class ResultUpload {

	public function __construct() {

	}

	/**
	 * functionality for selecting all sessions from session table
	 *
	 * @param  nothing to pass
	 * @return DB:: select array which contain sessions
	 */

	public function getSession() {
		try {

			$sessionQuery = "SELECT * FROM session";
			return DB::select($sessionQuery);

		} catch (\Exception $ex) {
			print_r($ex->getMessage());

		}
	}

	/**
	 * functionality for selecting all exam names from exam_name table
	 *
	 * @param  nothing to pass
	 * @return DB:: select array which contain alll exam's names
	 */

	public function getExamNames() {
		try {

			$examNamesQuery = "SELECT * FROM exam_name";
			return DB::select($examNamesQuery);

		} catch (\Exception $ex) {
			print_r($ex->getMessage());

		}
	}

	/**
	 * functionality for selecting all subject names from subject table
	 *
	 * @param  nothing to pass
	 * @return DB:: select array which contain all subject's name
	 */

	public function getSubjectNames() {
		try {

			$subjectNamesQuery = "SELECT * FROM subject";
			return DB::select($subjectNamesQuery);

		} catch (\Exception $ex) {
			print_r($ex->getMessage());

		}
	}
	/**
	 * functionality for reading a file whole and inserting data into a specifie table
	 *
	 * @param  string file name
	 * @return DB:: select array which contain all subject's name
	 */

	public function readUploadedFile($fileName) {
		try {

		} catch (\Exception $ex) {
			print_r($ex->getMessage());

		}
	}

	/**
	 * functionality for reading a file whole and inserting data into a specifie table
	 *
	 * @param  string file name
	 * @return DB:: select array which contain all subject's name
	 */

	public function echoSessionSelectionOptin($sessions) {
		try {
			foreach ($sessions as $session) {
				printf(" <option value =" . $session->{'session'} . ">" . $session->{'session'} . "</option>");
			}

		} catch (\Exception $ex) {
			print_r($ex->getMessage());

		}
	}
	/**
	 * functionality for reading a file whole and inserting data into a specifie table
	 *
	 * @param  string file name
	 * @return DB:: select array which contain all subject's name
	 */

	public function selectionOption($DbArray, $value, $option) {
		try {
			foreach ($DbArray as $object) {
				printf(" <option value =" . $object->{$value} . ">" . $object->{$option} . "</option>");
			}

		} catch (\Exception $ex) {
			print_r($ex->getMessage());

		}
	}

	/**
	 * functionality for reading a file whole and inserting data into a specifie table
	 *
	 * @param  string file name
	 * @return DB:: select array which contain all subject's name
	 */

	public function showClassNames() {
		try {
			$resultShow = new ResultShow();
			/*all constant are declared here **/

			$categories = $resultShow->showCategories();
			foreach ($categories as $category) {
				if ($category->{'categoryId'} < CLASS_START_ID) {
					continue;
				}
				if ($category->{'categoryId'} > CLASS_END_ID) {
					break;
				}
				printf(" <option value =" . $category->{'categoryId'} . ">" . $category->{'categoryName'} . "</option>");
			}

		} catch (\Exception $ex) {
			print_r($ex->getMessage());

		}
	}

	/**
	 * functionality for reading a file whole and inserting data into a specifie table
	 *
	 * @param  string file name
	 * @return DB:: select array which contain all subject's name
	 */

	public function getCategoryName($categoryId) {
		try {
			$categoryName = DB::select('SELECT categoryName from categories WHERE categoryId=' . $categoryId);
			return $categoryName[0]->categoryName;

		} catch (\Exception $ex) {
			print_r($ex->getMessage());

		} catch (Exception $ex) {
			print_r($ex->getMessage());

		}
	}

}