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
use App\Http\Services\NoticeShow;
use App\Http\Services\ResultUpload;
use App\Http\Services\ViewerProcessor;
$resultUpload = new ResultUpload();
$notice = new NoticeShow();
?>
@include('frontend.layout.header')
<!--
head or title navbar
-->
@include('frontend.layout.nav-bar')
<!--
slide show
-->
<div class="sers">
</div>
<div class="row">
  <div class="col-sm-2 " style="margin-top: 50px; margin-left: 40px; border: 10px solid white; background-color: white ; ">
    <div class="btn-group-vertical">
      <h1 class="btn btn-primary btn-raised btn-lg">Category</h1>
      <br>
      <a onclick="document.getElementById('id05').style.display='block'" class="btn btn-primary btn-raised btn-lg" >Search Result</a>
      <!-- Result Search -->
      <div id="id05" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
          <div class="w3-center"><br>
            <span onclick="document.getElementById('id05').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">X</span>
            <!-- <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top"> -->
            <h5 style="text-align: center;">Result Search</h5>
          </div>
          <form class="w3-container" action="{{action('NoticeBroadController@showResult')}}"  method="post" files="true" enctype="multipart/form-data" >
            <!-- csrf protect-->
            {{ csrf_field() }}
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
            <!-- csrf protection end-->
            <div class="w3-section">
              <br>
              <select class="btn btn-primary btn-raised btn-lg" name="categoryId" >
                <option value="">CLASS NAME</option>
                <?php $resultUpload->showClassNames();?>
              </select>
              <br>
              <br>
              <select class="btn btn-primary btn-raised btn-lg" name="subjectId" >
                <option value="">SUBJECT</option>
                <?php
$resultUpload->selectionOption($resultUpload->getSubjectNames(), 'subjectId', 'subjectName');
?>
              </select>
              <br>
              <br>
              <select class="btn btn-primary btn-raised btn-lg" name="examNameId" >
                <option value="">EXAM NAME</option>
                <?php
$resultUpload->selectionOption($resultUpload->getExamNames(), 'examNameId', 'examName');
?>
              </select>
              <br>
              <br>
              <select class="btn btn-primary btn-raised btn-lg" name="session" >
                <option value="">SESSION</option>
                <?php
$resultUpload->echoSessionSelectionOptin($resultUpload->getSession());
?>
              </select>
              <br>
              <br>
              <input type="text" name="roll" class="btn btn-primary btn-raised btn-lg" placeholder="Roll"  >
              <br>
              <br>
              <input class="btn btn-primary btn-raised btn-lg" type="submit" name="submit" value="Search" />
              <br>
              <br>
            </div>
          </form>
        </div>
      </div>
      <!-- end Log in -->
      <!--   <form>
        <div class="form-group">
          <br>
          <select class="btn btn-primary btn-raised btn-lg">
          </select>
        </div>
        <div class="form-group">
          <br>
          <select class="btn btn-primary btn-raised btn-lg">
          </select>
        </div>
        <div class="form-group">
          <br>
          <input type="text" name="roll" class="btn btn-primary btn-raised btn-lg" placeholder="Type Roll" />
        </div>
        <br>
        <input type="submit" name="submit" class="btn btn-primary btn-raised btn-lg" value="search" />
      </form> -->
    </div>
  </div>
  <div class="col-sm-9" style="margin-top: 50px;">
    <div class="card">
      <h4 class="card-header"><?php if ($studentResult == null && $results != null) {
	echo "Notice :";
} else {
	echo "Result :";
}?></h4>
      <div class="card-body">
        <ul>
          <?php
if ($studentResult == null && $results != null) {
	NoticeShow::viewNotice($results);
} elseif ($studentResult != null && $results == null) {

	echo '<h1 class="btn btn-primary btn-raised btn-lg" > ' . $subject . "</h1>";
	ViewerProcessor::studentResultTable($studentResult);
}
?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @include('frontend.layout.footer')