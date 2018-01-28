<?php
/*
import class for database
 */
use Illuminate\Support\Facades\DB;

/**
@Auther: SAIFUL ISLAM
@Batch : SUST CSE 2013-14
@Contact : saiful.sust.cse@gmail.com
@Hotmail : saiful.sust.cse@hotmail.com
@YahooMail: saiful_sust_cse@yahoo.com
@Gmail: saiful.cse@student.sust.edu
@Facebook : https://www.facebook.com/SaifulIslamLitonSust
please ,contact with me .i will be pleasure if you contact with me for your important suggestions and opions for improving  my coding skill and database designing skill
 **/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
 */
/* home page */

Route::get('/', 'HomeController@showHome');
Route::post('/', 'LoginController@login');
Route::post('/frontend', 'HomeController@sendMail');
Route::get('/frontend', 'HomeController@showHome');
/* Notices */
Route::get('/notice', 'NoticeBroadController@showNoticeBroad');
Route::get('/notice/{id}', 'NoticeBroadController@showStudentResult');
Route::post('/notice', 'NoticeBroadController@showResult');
/*Tutorial */
Route::get('/tutorial', 'TutorialController@showTutorial');
Route::get('/tutorial/{categoryId}/{subjectId}', 'TutorialController@show');
Route::get('/tutorial/{id}/{page}/{categoryId}/{subjectId}', 'TutorialController@reShow');
/* photo */
Route::get('/photo', 'PhotoController@showPhotoGallery');
/* contact */
//Route::get('/contact', 'ContactController@showContactForm');
//Route::post('/contact', 'ContactController@sendMail');
/* adminAccess */
/*Route::get('/access', function () {
return view('frontend/adm');
});*/

/* admin panel */

Route::get('/access', function () {
	return view('admin/index');
});

Route::post('/admin', 'NoticeController@uploadNotice');

/* admin panel all routes */
/* amdin home page and post notice route */
Route::get('/admin', function () {
	return view('admin/index');
});
/* admin all-notice list route */
Route::get('/all-notice', 'NoticeViewController@defaultView');
Route::post('/all-notice', 'NoticeViewController@view');
Route::get('/all-notice/{action}/{id}', 'NoticeViewController@getSelectedId');
/* admin  teacher list route */
Route::get('/teachersList', function () {
	return view('admin/teachersList');
});
/* admin resource route*/
Route::get('/resources', function () {
	return view('admin/resources');
});
/* admin resource upload route*/
Route::get('/upload-resources', function () {
	return view('admin/upload-resources');
});
Route::post('/upload-resources', 'ResourceController@upload');
/* admin syllabus */
Route::get('/syllabus', function () {
	return view('admin/syllabus');
});
/* admin syllabus  view*/
Route::get('/syllabus-view', function () {
	return view('admin/syllabus-view');
});
/* admin make syllabus  */
Route::get('/make-syllabus', function () {
	return view('admin/make-syllabus');
});

/*student information */
Route::get('/studentInfo', function () {
	return view('admin/studentInfo');
});
/* profile view */
Route::get('/profile-view', function () {
	return view('admin/profile-view');
});
/* upload profile infomation*/
Route::get('/uploadInfo', function () {
	return view('admin/uploadInfo');
});
/*  post notice  */
Route::get('/post-notice', function () {
	return view('admin/post-notice');
});
/**
 *
 *@param category page routing is starting here
 *
 *
 ***/

/* category */
Route::get('/category', 'CategoryController@index');
/*Router functionality for edit and delete categories*/
Route::get('/category', function () {
	try {

		/*
			         delete functionality for categories

		*/
		if (isset($_GET['delete'])) {
			$deleteId = $_GET['delete'];
			$delete = "DELETE  FROM categories WHERE categoryId =" . $deleteId;

			$sequencing = DB::select("SELECT * FROM categories WHERE categoryId>'$deleteId'");
			DB::DELETE($delete);

			foreach ($sequencing as $value) {
				$updateCategoryId = $value->categoryId;
				$updateCategoryId--;
				DB::update("UPDATE categories SET categoryId=$updateCategoryId WHERE categoryId ='$value->categoryId' ");
			}
			unset($sequencing);

			unset($categoryCookie);

			/*

				               update functionality for categories
			*/

		} elseif (isset($_GET['edit'])) {
			$categoryId = $_GET['edit'];
			$editQuery = "SELECT * FROM categories WHERE categoryId=" . $categoryId;
			$editData = DB::SELECT($editQuery);
			$arr = [];
			$count = 0;
			foreach ($editData as $key) {
				$arr[0] = $key->categoryId;
				$arr[1] = $key->categoryName;
			}
			return View::make('admin/category')->with('returnCategoryId', $arr[0])->with('returnCategoryName', $arr[1]);

		}
		return view('admin/category');
	} catch (Exception $ex) {
		return $ex->getMessage();
	}
});
/*controller functionality for storing category into categories table */
Route::post('/category', 'CategoryController@store');
/* controller functionality for updating category into categories table*/
Route::post('/category/{edit}', 'CategoryController@update');

/**
 *
 *@param result page routing is starting here
 *
 *
 ***/
/* admin result show  */
Route::get('/result-show', 'ResultController@showResultShowcase');
/* result showcase row delete action routing */
Route::get('/result-show/{delete}', 'ResultController@deleteResultShowcaseRow');
/*show selected result from result_showcase and exam_name*/
Route::post('/result-show', 'ResultController@showSelectedResult');
/* result view*/
Route::get('/result-view', 'ResultSheet@index');

/*show student result sheet from result sheet table*/
Route::get('/result-view/{resultShowcaseId}', 'ResultSheet@showSelectedResultSheet');
Route::get('/result-view/{action}/{resultShowcaseId}/{Roll}', 'ResultSheet@editingAndDeletineResultSheet');
/* result upload */
Route::get('/result-upload', 'ResultUploadController@show');

Route::post('/result-upload', 'ResultUploadController@uploadExcelFile');

Route::get('/home-page-info', 'homePageInfoController@show');
Route::post('/home-page-info', 'homePageInfoController@upload');

Route::get('/error', function () {
	return view('error')->with('error', 'intial');
});

Route::get('/tutorial-upload', 'TutorialUploadController@show');
Route::post('/tutorial-upload', 'TutorialUploadController@upload');
Route::get('/photo-upload', 'PhotoUploadController@show');
Route::post('/photo-upload', 'PhotoUploadController@upload');

Route::get('/home-list', 'HomeListController@listShow');
Route::get('/home-list/{id}', 'HomeListController@delete');