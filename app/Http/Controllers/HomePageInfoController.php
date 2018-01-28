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
use App\Http\Services\StringProcessor;
//use App\Http\Services\StringProcessor;
//use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

define('SLIDER', 'slider');
define('STORE', 'public/storeHouse');
class HomePageInfoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function upload(Request $request) {
		$firstImg = $this->store($request, 'firstImg');
		$secondImg = $this->store($request, 'secondImg');
		$thirdImg = $this->store($request, 'thirdImg');
		$fourthImg = $this->store($request, 'fourthImg');
		$sideImg = $this->store($request, 'sideImg');
		$description = $request->description;
		$description = StringProcessor::descriptionProcess($description);
		$description = StringProcessor::passageReform($description);

		if ($firstImg == -1 || $secondImg == -1 || $thirdImg == -1 || $fourthImg == -1 || $sideImg == -1) {
			return view('admin/home-page-info');
		}

		$tableName = $this->createSliderTable();
		$this->insertSliderData($tableName, $firstImg, $secondImg, $thirdImg, $fourthImg);
		$this->insertHome($description, $sideImg, $tableName);
		return view('admin/home-page-info');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createSliderTable() {
		try {
			$query = "SELECT MAX(homeId) FROM home";
			$maxId = DB::select($query)[0]->{'MAX(homeId)'};
			$tableName = SLIDER . '_' . $maxId;
			$query = "CREATE TABLE IF NOT EXISTS " . $tableName . "(
sliderId int(4) not null auto_increment primary key,
firstImg text,
secondImg text,
thirdImg text,
fourthImg text
)";
			DB::connection()->statement($query);
			return $tableName;
		} catch (\Exception $ex) {
			return redirect('/error')->with('error', $ex->getMessage());
		}
	}
	public function insertSliderData($tableName, $firstImg, $secondImg, $thirdImg, $fourthImg) {
		try {
			$query = "INSERT INTO " . $tableName . "(firstImg,secondImg,thirdImg,fourthImg) VALUES('" . $firstImg . "','" . $secondImg . "', '" . $thirdImg . "','" . $fourthImg . "')";
			DB::insert($query);
		} catch (\Exception $ex) {
			return redirect('/error')->with('error', $ex->getMessage());
		}
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store($request, $name) {
		try {
			if ($request->$name != null) {
				return $request->file($name)->store(STORE);
			} else {
				return -1;
			}
		} catch (Exception $ex) {

			return redirect('/error')->with('error', $ex->getMessage());
		}
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show() {
		return view('admin/home-page-info');
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function insertHome($description, $sideImg, $tableName) {
		try {
			$query = "INSERT INTO home(description,imageLink,sliderTable) VALUES(\"" . $description . "\",'" . $sideImg . "','" . $tableName . "')";
			DB::insert($query);
		} catch (\Exception $ex) {
			return redirect('/error')->with('error', $ex->getMessage());
		}
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