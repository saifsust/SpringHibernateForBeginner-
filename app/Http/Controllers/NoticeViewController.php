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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NoticeViewController extends Controller {
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
	public function view(Request $request) {
		return "yes";
	}
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
	public function defaultView() {
		//return storage_path('app/a.jpg');
		$resultList = $this->noticeSearchQuery();
		return view('admin/all-notice')->with('resultList', $resultList);
	}
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
	public function noticeSearchQuery() {
		try {
			$query = "select announceId,title,passage,imageLink,uploadDate,categoryName from announcement,categories where announcement.categoryId=categories.categoryId;";
			///$query = "SELECT * FROM announcement";
			return DB::select($query);
		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function getSelectedId($action, $id) {
		switch ($action) {
		case 'delete':
			return $this->delete($id);
			break;
		case 'edit':
			return $this->edit($id);
			break;
		case 'view':
			return $this->viewNotice($id);
			break;
		}

//
	}

	public function delete($id) {
		try {
			$this->deleteProcess($id);
			$resultList = $this->noticeSearchQuery();
			return redirect('/all-notice')->with('resultList', $resultList);
		} catch (Exception $ex) {
			return $ex->getMessage();
		} catch (\Exception $ex) {
			return $ex->getMessage();
		}
	}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function deleteProcess($id) {
		try {
			$query = "SELECT imageLink FROM announcement WHERE announceId=" . $id;
			$path = DB::select($query);
			$path = $path[0]->{'imageLink'};
			Storage::delete($path);
			$query = "DELETE FROM announcement WHERE announceId =" . $id;
			DB::delete($query);
			$maxId = DB::select("SELECT MAX(announceId) FROM announcement");
			$maxId = $maxId[0]->{'MAX(announceId)'};
			// announce id update
			for ($announceId = $id + 1; $announceId <= $maxId; $announceId++) {
				$query = "UPDATE announcement SET announceId =" . ($announceId - 1) . " WHERE announceId = " . $announceId;
				DB::update($query);
			}
		} catch (\Exception $ex) {
			return $ex->getMessage();
		}
//
	}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function edit($id) {
		return $id;
//
	}

	public function viewNotice($id) {
		return 'view';
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