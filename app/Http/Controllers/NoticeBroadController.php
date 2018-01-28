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

use App\Http\Services\NoticeShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

define('Table', '');

class NoticeBroadController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showNoticeBroad() {
		$notice = new NoticeShow();
		$results = $notice->noticeSearchQuery();
		return view('frontend/notice')->with('results', $results)->with('studentResult', null)->with('subject', null);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getDataFromNotice() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showResult(Request $request) {
		//return $this->resultTableFinder($request->examNameId, $request->session, $request->categoryId, $request->subjectId);

		return $this->findResult($request);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function findResult($request) {
		$tableName = $this->resultTableFinder($request->examNameId, $request->session, $request->categoryId, $request->subjectId);

		if ($tableName == null) {
			return "<h1>Not Result Found</h1>";
		} else {
			$tableName = $tableName[0]->{'resultTableName'};

			$query = "SELECT * FROM " . $tableName . " WHERE Roll= '" . $request->roll . "'";
			$studentResult = DB::select($query);

			$subject = $this->subject($request->subjectId)[0]->{'subjectName'};

			return view('frontend/notice')->with('results', null)->with('studentResult', $studentResult)->with('subject', $subject);
		}

	}

	public function resultTableFinder($examNameId, $session, $categoryId, $subjectId) {
		$query = "select resultTableName from result_showcase where
result_showcase.examNameId='" . $examNameId . "' and result_showcase.session='" . $session . "' and
result_showcase.categoryId='" . $categoryId . "' and result_showcase.subjectId='" . $subjectId . "'";
		return DB::select($query);
	}

	public function subject($subjectId) {
		$query = "SELECT subjectName FROM subject WHERE subjectId = '" . $subjectId . "'";
		return DB::select($query);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showStudentResult($id) {
		return $id;
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
