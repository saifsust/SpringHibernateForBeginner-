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

use Illuminate\Support\Facades\DB;

define('CATEGORIES', 22);

/* class functionality started here **/

class ResultShow {

//private static DB db;

	/** showing data in selection as  option into result show page from category table
	 *
	 * @param nothing to pass
	 * @return DB select array from categories
	 */

	public function showCategories() {

		try {
			static $categories = "SELECT * FROM categories";
			return DB::select($categories);
		} catch (Exception $ex) {
			return $ex->getMessage();

		}

	}

	/** showing data in selection as  option into result show page from category table
	 *
	 * @param nothing to pass
	 * @return DB select array from categories
	 */
	public function getCategories() {
		try {
			$categories = "SELECT * FROM categories";
			$categories = DB::select($categories);
			printf("<option value='-1'>Category</option>");
			foreach ($categories as $category) {
				printf("<option value=" . $category->{'categoryId'} . ">" . $category->{'categoryName'} . "</option>");
			}

		} catch (Exception $ex) {
			return $ex->getMessage();

		}

	}

	/**
	 * functionality for marging and collectiing data from result_showcase ,exam_name ,categories and subject
	 *
	 * @param  int $resultShowcaseId
	 * @return DB:: select array
	 */
	public function getResultShowcase($resultShowcaseId) {
		$queryForSelectedRaw =
			"select resultShowcaseId,session,examName,resultTableName,uploadDate,categoryName,subjectName
from sustschool.result_showcase,sustschool.exam_name,sustschool.categories,subject
where
result_showcase.examNameId=exam_name.examNameId and
result_showcase.subjectId=subject.subjectId and
result_showcase.categoryId=categories.categoryId and resultShowcaseId=" . $resultShowcaseId;
		return DB::select($queryForSelectedRaw);

	}

	/**
	 * functionality for geting result sheet table name from result_showcase
	 *
	 * @param  int  $resultShowcaseId
	 * @return string $resultSheetTableName
	 */
	public function getResultSheetTableName($resultShowcaseId) {
		$resultSheetTableName = null;

		$resultSheetNameFindingQuery = "SELECT * FROM result_showcase WHERE resultShowcaseId=" . $resultShowcaseId;

		$resultShowcase = DB::select($resultSheetNameFindingQuery);

		foreach ($resultShowcase as $showcase) {
			$resultSheetTableName = $showcase->{'resultTableName'};
		}
		return $resultSheetTableName;
	}
	/**
	 *
	 *functionality for selecting all information from ResultSheet Table
	 * @param  string $resultSheetTableNam
	 * @return DB::select array
	 */
	public function getResultSheet($resultSheetTableName) {

		$resultSheetShowQuery = "select * from " . $resultSheetTableName;
		return DB::select($resultSheetShowQuery);

	}

	/**
	 * some errors are found and it has to rebuild
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function makeResultSheetTableName($resultShowcaseId) {
		$selectedRaw = getResultSheetTableName($resultShowcaseId);

		$counterId = 0;
		$resultSheetTableName = null;
		foreach ($selectedRaw as $value) {

			$temp_str = $value->{'categoryName'};
			$temp_str = strtolower($temp_str);
			$resultSheetTableName .= str_replace(' ', '', $temp_str) . '_';
			$temp_str = $value->{'subjectName'};
			$temp_str = strtolower($temp_str);
			$resultSheetTableName .= str_replace(' ', '', $temp_str) . '_';
			$temp_str = $value->{'examName'};
			$temp_str = strtolower($temp_str);
			$resultSheetTableName .= str_replace(' ', '', $temp_str) . '_';
			$resultSheetTableName .= 'resultsheet_';
			$temp_str = $value->{'session'};
			$resultSheetTableName .= str_replace(' ', '', $temp_str);
		}
		return $resultSheetTableName;

	}

	/**
	 *
	 *functionality for getting result table name from result showcase,categories,subject,exam_name
	 * @param  string $resultSheetTableNam
	 * @return array where first index is exam name ,second index is class name and third index is subject name
	 */
	public function getTableName($resultShowcaseId) {

	}

}
