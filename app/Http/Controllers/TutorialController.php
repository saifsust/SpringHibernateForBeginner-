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

use App\Http\Services\TutorialsModel;
use Illuminate\Http\Request;

define('DEFUALT_CLASS', 12);
define('DEFUALT_SUBJECT', 3);
class TutorialController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showTutorial() {
		$model = new TutorialsModel();
		$results = $model->getTutorials(DEFUALT_CLASS, DEFUALT_SUBJECT);
		return view('frontend/tutorial')->with('results', $results);
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
	public function show($categoryId, $subjectId) {

		if (is_numeric($subjectId)) {
			$model = new TutorialsModel();
			$results = $model->getTutorials($categoryId, $subjectId);
			return view('frontend/tutorial')->with('results', $results);
		} else {
			return redirect('/' . $subjectId);
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function reShow($id, $page, $categoryId, $subjectId) {
		$model = new TutorialsModel();
		$results = $model->getTutorials($categoryId, $subjectId);
		return redirect('/tutorial/' . $categoryId . '/' . $subjectId)->with('results', $results);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
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
