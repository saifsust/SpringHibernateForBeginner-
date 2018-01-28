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
use App\Http\Controllers\Controller;
use App\Http\Services\StringProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//use Illuminate\Support\Facades\Storage;
define('STORE', 'public/storeHouse');
define('INSERT', 'INSERT INTO ');
class NoticeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function uploadNotice(Request $request) {
		try {
			if ($request->categoryId != 'Category') {
				$passage = $request->passage;
				$passage = StringProcessor::descriptionProcess($passage);
				$passage = StringProcessor::passageReform($passage);
				$fileLink = -1;
				if ($request->fileLink != null) {
					$fileLink = $request->file('fileLink')->store(STORE);
				}

				$comment = $request->title;
				$comment = strtolower($comment);
				// some bug here must be solved
				$comment = str_replace(' ', '', $comment);
				$values = "'" . $request->title . "',\"" . $passage . "\",'" . $fileLink . "', now() ," . $request->categoryId . ',' . $request->adminId . ",'" . $comment . "'";
				//	return $values;
				$query = INSERT . "announcement(title,passage,imageLink,uploadDate,categoryId,adminId,commentTableName) VALUES( " . $values . ")";
				DB::insert($query);
				return redirect('admin');
			} else {
				return "ERROR 404";
			}
		} catch (Exception $ex) {
			return $ex->getMessage();
		} catch (\Exception $ex) {
			return $ex->getMessage();
		}
		return $request->categoryId;
		//
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	/*
		public function passageReform($passage) {
			$temp = "";

			$startB = "&nbsp<b>";
			$endB = "</b>&nbsp";
			$startLink = "&nbsp  <a href='";
			$endLink = "'> Link Here </a>&nbsp";
			$test = False;
			for ($in = 0; $in < strlen($passage); $in++) {
				if ($passage[$in] == '|' && $test == False) {
					$temp .= $startB;
					$test = True;
				} else {
					if ($passage[$in] == '|' && $test == True) {
						$temp .= $endB;
						$test = False;
					} else {
						if ($passage[$in] == '<' && $test == False) {
							$temp .= $startLink;
							$test = True;
						} elseif ($passage[$in] == '>' && $test == True) {

							$temp .= $endLink;
							$test = False;
						} else {
							$temp .= $passage[$in];
						}

					}
				}
			}
			return $temp;
		}
	*/
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
	public function show($id) {
		//
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