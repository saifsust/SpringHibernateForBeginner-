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
use App\Http\Services\PhotoModel;
use App\Http\Services\ResultUpload;
use App\Http\Services\TutorialsModel;
use Illuminate\Support\Facades\Storage;

class ViewerProcessor {
	public static function tutorialsView($results) {
		if ($results != null) {
			foreach ($results as $result) {
				echo '<div class="card" style="width:20rem;margin-top: 20px;margin-left: 30px;border: 2px solid gray;
		border-radius: 5px;box-shadow: 3px 3px 2px gray;">';
				echo '<div class="embed-responsive embed-responsive-16by9">';
				echo '<iframe class="embed-responsive-item" src="' . $result->{'tutorialLink'} . '" allowfullscreen></iframe>';
				echo '</div>';
				echo '<div class="card-body">';
				echo ' <h4 class="card-title">' . $result->{'chapterName'} . '  &nbsp;  &nbsp;<small>' . $result->{'categoryName'} . '</small></h4>';
				echo '<a href="' . $result->{'tutorialLink'} . '" class="btn btn-primary">View</a>';
				echo ' <a href="#" class="btn btn-primary">Download</a>';
				echo '</div>';
				echo "</div>";
			}
		}
	}
	public static function tutroialMenu() {
		$resutUpload = new ResultUpload();
		$subjects = $resutUpload->getSubjectNames();
		$model = new TutorialsModel();
		$classes = $model->getClasses();
		foreach ($classes as $class) {
			echo '<li class="nav-item dropdown">';
			echo ' <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">' . $class->{'categoryName'} . '</a>';
			echo '<div class="dropdown-menu">';
			foreach ($subjects as $subject) {
				echo '<a class="dropdown-item" href="tutorial/' . $class->{'categoryId'} . '/' . $subject->{'subjectId'} . '">' . $subject->{'subjectName'} . '</a>';
			}
			echo '</div>';
			echo ' </li>';
		}
	}
	public static function viewPhotoGallery() {
		$photos = new PhotoModel();
		$imgs = $photos->getPhotos();
		$count = 1;
		foreach ($imgs as $img) {
			echo '  <div class="column">';
			echo '<img style="width:250px;height: 200px;border: 3px solid white;" onclick="openModal();currentSlide(' . $count . ')" class="hover-shadow cursor"  src="' . $img->{'imageLink'} . '" alt="Card image cap">';
			echo '</div>';
			$count++;
		}
	}
	public static function viewFullImage() {
		$photos = new PhotoModel();
		$imgs = $photos->getPhotos();
		$count = 1;
		foreach ($imgs as $img) {
			echo '<div class="mySlides">';
			echo '<div class="numbertext">' . $count . '</div>';
			echo ' <img src="' . $img->{'imageLink'} . '" style="width:1200px;height: 500px;">';
			echo '</div>';
			$count++;
		}
	}
	public static function studentImage() {
		$photos = new PhotoModel();
		$imgs = $photos->getPhotos();
		$count = 1;
		foreach ($imgs as $img) {
			if ($count == 5) {
				break;
			}
			$count++;
			echo '	<div class="col-sm-3">';
			echo '<a href=""><img src="' . $img->{'imageLink'} . '" class="img-thumbnail" alt="Cinque Terre" width="310" height="236">';
			echo '<figcaption class="figure-caption text-center">' . $img->{'title'} . '</figcaption>
			</div>';
		}
	}
	public static function eventImage() {
		$notice = new NoticeShow();
		$results = $notice->noticeSearchQuery();
		$count = 1;
		foreach ($results as $result) {
			if ($count == 5) {
				break;
			}
			$count++;
			echo '<div class="col-sm-3">';
			echo '<a href="#"><img src="' . Storage::url($result->{'imageLink'}) . '" class="img-thumbnail" alt="Cinque Terre" width="310" height="236">';
			echo '<figcaption class="figure-caption text-center">' . $result->{'title'} . '</figcaption>';
			echo '</a>';
			echo '</div>';
		}
	}
	public static function homeListTable($lists) {
		foreach ($lists as $list) {
			echo '<tr>';
			echo '<td>' . $list->{'homeId'} . '</td>';
			echo '<td>' . StringProcessor::stringCutting($list->{'description'}) . '</td>';
			echo "<td><img src='" . Storage::url($list->{'imageLink'}) . "' border=1 height=30 width=80 alt='pic'/></td>";
			$table = $list->{'sliderTable'};
			$model = new PhotoModel();
			$slider = $model->getSliderImg($table)[0];
			echo "<td><img src='" . Storage::url($slider->{'firstImg'}) . "' border=1 height=30 width=80 alt='pic'/></td>";
			echo "<td><img src='" . Storage::url($slider->{'secondImg'}) . "' border=1 height=30 width=80 alt='pic'/></td>";
			echo "<td><img src='" . Storage::url($slider->{'thirdImg'}) . "' border=1 height=30 width=80 alt='pic'/></td>";
			echo "<td><img src='" . Storage::url($slider->{'fourthImg'}) . "' border=1 height=30 width=80 alt='pic'/></td>";
			echo '<td><a href="home-list/' . $list->{'homeId'} . '">Delete</a></td>';
			echo "</tr>";
		}
	}

	public static function studentResultTable($studentResult) {

		foreach ($studentResult as $result) {
			echo '<li><h3>Roll &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; ' . $result->{'Roll'} . '</h3></li>';
			echo '<li><h3>Name &nbsp;&nbsp;: &nbsp;&nbsp;' . $result->{'Name'} . '</h3></li>';
			echo '<li><h3>Marks &nbsp; : &nbsp;&nbsp;' . $result->{'Marks'} . '</h3></li>';
		}

	}

}