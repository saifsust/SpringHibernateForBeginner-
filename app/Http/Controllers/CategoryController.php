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
use Illuminate\Support\Facades\View;

class CategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//echo "ok";
		try {
			//if(isset($_GET['id']))
			//store($request);
			//echo $ex->getMessage();
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}
		return view('admin/category');
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
	 * Storing category into categories table
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function store(Request $request) {

		try {
			if ($request->categoryName != null) {
				$isEmpty = DB::select('SELECT categoryId FROM categories');
				if (!empty($isEmpty)) {
					$maxCategoryId = DB::table('categories')->max('categoryId');
					$maxCategoryId = $maxCategoryId + 1;
					DB::insert("INSERT INTO categories(categoryId,categoryName) value('$maxCategoryId'  ,'$request->categoryName')");
				} else {
					DB::insert("INSERT INTO categories(categoryId,categoryName) value('1','$request->categoryName') ");
				}

			}

			return view('admin/category');
		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
	/**
	 * Display categories into viewer categories table
	 *
	 * @param  nothing to pass
	 * @return \Illuminate\Http\Response
	 */
	public function show() {
		try {
			$result = DB::select('SELECT * FROM categories');
			return $result;
		} catch (Exception $ex) {
			echo $ex->getMessage();
			return null;
		}

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($edit) {

	}
/**
 * Show the form for deleting the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function delete($id) {
		try {
		} catch (Exception $ex) {
			echo $ex;
		}
	}
	/**
	 * Updating category into categories table
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $request as form submition action and $edit as categoryId
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $edit) {

		try {
			$query = "UPDATE categories SET categoryName='$request->categoryName' WHERE categoryId=" . $edit;
			DB::update($query);

			return redirect('category')->with('returnCategoryName', null);
		} catch (Exception $ex) {
			return $ex->getMessage();
			//
		}
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