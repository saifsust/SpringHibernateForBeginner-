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
namespace App\Http\Controllers;

/*
all necessary classes are imported here
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * display selected results into result show table
	 * here using relational table relation between result_showcase and categories
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function showSelectedResult(Request $request) {

		try {

			if ($request != null) {
				$categoryId = $request->categoryId;

				/* query for fatching data from result_showcase and exam_name table using selection option*/
				$showSelectedResult =
					"select resultShowcaseId,session,uploadDate,examName,categoryName,subjectName
from result_showcase,exam_name,categories,subject
where
result_showcase.examNameId=exam_name.examNameId and
result_showcase.categoryId=categories.categoryId and
result_showcase.subjectId=subject.subjectId and
result_showcase.categoryId='$categoryId' order by resultShowcaseId";
				$showResult = DB::select($showSelectedResult);
				//return $showResult;
				return view('admin/result-show')->with('resultShowCaseDataSet', $showResult);
			}

		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}

	/**
	 * Display result showcase where all result table will be stored
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showResultShowcase() {

		try {
			/* query for fetching data from result_showcase and exam_name table*/
			$resultShowcaseQuery =
				"select resultShowcaseId,session,examName,uploadDate,categoryName,subjectName
from result_showcase,exam_name,categories,subject
where
result_showcase.examNameId=exam_name.examNameId and
result_showcase.subjectId=subject.subjectId and
result_showcase.categoryId=categories.categoryId order by resultShowcaseId";
			$foundData = DB::select($resultShowcaseQuery);

			#return $foundData->session;
			return view('admin/result-show')->with('resultShowCaseDataSet', $foundData);
		} catch (Exception $ex) {
			return $ex->getMessage();
		}

	}

	/**
	 * Show the result showcase table for deleting  the specified resource.
	 *
	 * @param  int  $delete
	 * @return \Illuminate\Http\Response
	 */
	public function deleteResultShowcaseRow($delete) {

		try {

			$drop = 'SELECT resultTableName FROM result_showcase WHERE resultShowcaseId = ' . $delete;

			$dropTable = DB::select($drop);
			$dropTable = $dropTable[0]->{'resultTableName'};
			DB::statement('DROP TABLE IF EXISTS ' . $dropTable);
			$deleteQuery = 'DELETE FROM result_showcase WHERE resultShowcaseId=' . $delete;

			DB::delete($deleteQuery);

/**
updating the serial number after deleting the row from result showcase table
 **/
			$resultShowcaseQuery = 'SELECT * FROM result_showcase WHERE resultShowcaseId >' . $delete;
			$updatingArray = DB::select($resultShowcaseQuery);

			foreach ($updatingArray as $value) {
				$serialNumber = $value->resultShowcaseId;
				$serialNumber--;
				$updateQuery = "UPDATE result_showcase SET resultShowcaseId= '$serialNumber' WHERE resultShowcaseId = " . $value->resultShowcaseId;
				DB::update($updateQuery);
			}
/* result showcase table show data from database table */
			$resultShowcaseQuery = "SELECT * FROM result_showcase";
			$foundData = DB::select($resultShowcaseQuery);
			return redirect('/result-show')->with('resultShowCaseDataSet', $foundData);
		} catch (Exception $ex) {
			return $ex->getMessage();
		}

	}

	/**
	 * Update the specified resource in result_showcase table.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function updatingResultShowcaseTable(Request $request, $id) {

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
