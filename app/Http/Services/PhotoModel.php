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

class PhotoModel {

	public function getPhotos() {
		$query = "SELECT * FROM photogallery";
		return DB::select($query);
	}

	public function getHomeList() {
		$query = "SELECT * FROM home";
		return DB::select($query);
	}
	public function getSliderImg($table) {
		$query = "SELECT * FROM " . $table;
		return DB::select($query);
	}

	public function deleteHomeItem($id) {
		$table = DB::select("SELECT sliderTable FROM home WHERE homeId =" . $id)[0]->{'sliderTable'};
		DB::connection()->statement("DROP TABLE " . $table);
		DB::delete("DELETE FROM home WHERE homeId=" . $id);
	}

}