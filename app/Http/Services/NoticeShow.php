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
use App\Http\Services\StringProcessor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NoticeShow {
	public static function viewNotice($results) {
		$id = 0;
		foreach ($results as $result) {
			echo "<li>";
			echo '<h4 class="card-title">' . $result->{'title'} . "</h4>";
			echo '<i class="fa fa-clock-o" aria-hidden="true"></i> ';
			echo $result->{'uploadDate'};
			echo '<h6 class="card-text">' . StringProcessor::stringCutting($result->{'passage'}) . '</h6>';
			echo ' <a data-toggle="collapse" href="#collapse' . $id . '" aria-expanded="false" aria-controls="collapse' . $id . '">
				Read More
		</a>';
			echo '<div id="collapse' . $id . '"class="collapse " role="tabpanel" aria-labelledby="heading' . $id . '" data-parent="#accordion">';
			echo '<div class="card-body">';
			echo ' <p style="display: inline-block;text-align: justify;">';
			echo '  <img src="' . Storage::url($result->{'imageLink'}) . '" alt="Pineapple" style="width:300px;height:250px;margin-right:15px;float: right;margin-left: 5px;">';
			echo $result->{'passage'};
			echo '</p>';
			echo '</div>';
			echo '</div>';
			echo "</li>";
			echo "<br>";
			$id++;
		}
	}
	public function noticeSearchQuery() {
		try {
			$query = "select announceId,title,passage,imageLink,uploadDate,categoryName from announcement,categories where announcement.categoryId=categories.categoryId;";
			///$query = "SELECT * FROM announcement";
			return DB::select($query);
		} catch (Exception $ex) {
			return $ex->getMessage();
		}
	}
	public function defaultNoticeView($resultList) {
		foreach ($resultList as $result) {
			printf("<tr>");
			printf("<td>" . $result->{'announceId'} . "</td>");
			printf("<td>" . $result->{'title'} . "</td>");
			$passage = $result->{'passage'};
			$passage = StringProcessor::stringCutting($passage);
			// here for avoiding tag make a function to avoid it
			//printf("<td>" . substr($result->{'passage'}, 0, 500) . "</td>");
			printf("<td>" . $passage . "</td>");
			printf("<td>" . $result->{'categoryName'} . "</td>");
			$link = $result->{'imageLink'};
			$len = strlen($link) - 1;
			$path = Storage::url($result->{'imageLink'});
			$extension = substr($link, $len - 2, $len);
			if ($extension === 'pdf') {
				$pdf = Storage::url('public/storeHouse/pdf.png');
				printf("<td><a href='" . $path . "'><img src='$pdf' border=1 height=30 width=80 alt='PDF'/></a></td>");
			} else {
				printf("<td><img src='" . $path . "' border=1 height=30 width=80 alt='pic'/></td>");
			}
			printf("<td>" . $result->{'uploadDate'} . "</td>");
			printf("<td><a href='all-notice/view/" . $result->{'announceId'} . "'>view</a></td>");
			printf("<td><a href='all-notice/edit/" . $result->{'announceId'} . "'>Edit</a></td>");
			printf("<td><a href='all-notice/delete/" . $result->{'announceId'} . "'>Delete</a></td>");
			printf("</tr>");
		}
	}
}