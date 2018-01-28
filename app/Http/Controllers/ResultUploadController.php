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

/* all contants are declared here */
define('STORAGE_FOLDER_EXCEL', 'ExcelFileStoreHouse');
define('FILE_NAME', 'SI');
define('RESULT_SHOWCASE', 'result_showcase');

/* all necessary classes are imported here  */

use App\Http\Services\ResultUpload;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/* class is prepared here */
class ResultUploadController extends Controller {

	/**
	 * upload result from excel file.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function uploadExcelFile(Request $request) {
		try {

			$resultUpload = new ResultUpload();
			if ($request->categoryId != null && $request->subjectId != null && $request->examNameId != null && $request->session != null && $request->excelFileName != null) {
				if ($request->file('excelFileName')->getClientOriginalExtension() === "xlsx") {

					/* get category name from categories */
					$categoryName = $resultUpload->getCategoryName($request->categoryId);
					$categoryName = strtolower($categoryName);
					$categoryName = str_replace(' ', '', $categoryName);

					/* get subject name from subject */
					$subjectName = DB::select('SELECT subjectName from subject WHERE subjectId=' . $request->subjectId);
					$subjectName = $subjectName[0]->subjectName;
					$subjectName = strtolower($subjectName);
					$subjectName = str_replace(' ', '', $subjectName);

					/* get exam name from exam_name table */

					$examName = DB::select('SELECT examName from exam_name WHERE examNameId=' . $request->examNameId);
					$examName = $examName[0]->examName;
					$examName = strtolower($examName);
					$examName = str_replace(' ', '', $examName);

					//return $examName;

					/*file procedure */
					$encriptedName = $request->file('excelFileName');

					$originalName = $encriptedName->getClientOriginalName();

					$createTableName = $categoryName . '_' . $subjectName . '_' . $examName . '_' . $request->session . FILE_NAME;

					/* create table into database */
					$createTableQuery = 'CREATE TABLE IF NOT EXISTS ' . $createTableName . ' ( Roll int(11) not null  primary key ,Name varchar(100) ,Marks float )';

					DB::connection()->statement($createTableQuery);

					/* insert data into result_showcase */

					$maxResultShowcaseId = DB::select('SELECT MAX(resultShowcaseId) FROM result_showcase');

					$maxResultShowcaseId = $maxResultShowcaseId[0]->{'MAX(resultShowcaseId)'}+1;
					//return $maxResultShowcaseId;
					$resultShowcaseInsertQuery = 'INSERT INTO ' . RESULT_SHOWCASE . '(resultShowcaseId,session,examNameId,resultTableName,uploadDate,categoryId,subjectId) value(?,?,?,?,?,?,?)';
					DB::insert($resultShowcaseInsertQuery, [$maxResultShowcaseId, $request->session, $request->examNameId, $createTableName, now(), $request->categoryId, $request->subjectId]);

					/* store execl file into public STORAGE_FOLDER_EXCEL */
					$createFileName = $createTableName;
					$createFileName .= $originalName;

					$originalName = $createFileName;
					$encriptedName->move(STORAGE_FOLDER_EXCEL, $originalName);

					$path = STORAGE_FOLDER_EXCEL . '/' . $originalName;

					/* get excel file information */
					$result = null;

					$result = Excel::load($path, function ($excel) {

						$excel->all()->toArray();
					})->get();

					//return $result;
					File::delete($path);

					$value = null;
					$arrayLength = sizeof($result[0]);
					for ($index = 0; $index < $arrayLength; $index++) {

						$value = "( " . $result[0][$index]['roll'] . ",' " . $result[0][$index]['name'] . "', " . $result[0][$index]['marks'] . " )";

						$query = 'INSERT INTO ' . $createTableName . '( Roll,Name,Marks) VALUE ' . $value . 'ON DUPLICATE KEY UPDATE Roll = ' . $result[0][$index]['roll'];
						DB::insert($query);
					}

					return view('admin/result-upload');

				} else {
					return "404 ERROR";
				}

				/*
					foreach ($array as $value) {
						return $value[2]->name;
				*/
			} else {
				return "404 ERROR";
			}

		} catch (\Exception $ex) {
			return $ex->getMessage();
		} catch (Exception $ex) {
			return $ex->getMessage();
		}

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
	public function show() {
		return view('admin/result-upload');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
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
