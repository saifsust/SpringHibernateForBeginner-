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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

define('TABLE', 'home');
define('SIZE', 4);
class HomeViewer {

	private function getMaxId() {
		$query = "SELECT MAX(homeId) FROM " . TABLE;
		return DB::select($query)[0]->{'MAX(homeId)'};
	}

	public function slider() {
		try {
			$maxId = $this->getMaxId();

			if ($maxId != null) {
				//echo $maxId;
				$query = "SELECT sliderTable FROM " . TABLE . " WHERE homeId= " . $maxId;
				$sliderTable = DB::select($query)[0]->{'sliderTable'};
				$query = "SELECT * FROM " . $sliderTable;
				$img = DB::select($query)[0];

				$imgLink = $img->{'firstImg'};
				$imgLink = Storage::url($imgLink);

				echo "<div class='carousel-item active'>
			<img class='d-block w-100' src='$imgLink' alt='First slide' style='height: 400px;width: 700px;'> </div>";
				$imgLink = $img->{'secondImg'};
				$imgLink = Storage::url($imgLink);
				echo "<div class='carousel-item '>
			<img class='d-block w-100' src='$imgLink' alt='First slide' style='height: 400px;width: 700px;'> </div>";
				$imgLink = $img->{'thirdImg'};
				$imgLink = Storage::url($imgLink);
				echo "<div class='carousel-item '>
			<img class='d-block w-100' src='$imgLink' alt='First slide' style='height: 400px;width: 700px;'> </div>";
				$imgLink = $img->{'fourthImg'};
				$imgLink = Storage::url($imgLink);
				echo "<div class='carousel-item '>
			<img class='d-block w-100' src='$imgLink' alt='First slide' style='height: 400px;width: 700px;'> </div>";
			} else {
				echo "<h1> No File </h1>";
			}

		} catch (\Exception $ex) {
			print_r($ex->getMessage());
		}
	}

	public function description() {
		try {

			$maxId = $this->getMaxId();
			if ($maxId != null) {
				$query = "SELECT description FROM " . TABLE . " WHERE homeId=" . $maxId;
				$description = DB::select($query)[0]->{'description'};
				echo "<p>" . $description . "</p>";
			} else {
				echo "<h1>No File</h1>";
			}

		} catch (Exception $ex) {
			print_r($ex->getMessage());
		}
	}

	public function imageView() {
		try {
			$maxId = $this->getMaxId();

			if ($maxId != null) {
				$query = "SELECT imageLink FROM " . TABLE . " WHERE homeId=" . $maxId;
				$link = DB::select($query)[0]->{'imageLink'};
				$path = Storage::url($link);
				echo "<img src='$path' style='height: 310px; width: 480px;'>";
			} else {
				echo "<h1>No File</h1>";
			}

		} catch (Exception $ex) {

			print_r($ex);
		}

	}

}