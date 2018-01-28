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
use App\Http\Services\HomeViewer;
use App\Http\Services\ViewerProcessor;
$home = new HomeViewer();
?>
@include('frontend.layout.header')
<!--
head or title navbar
-->
@include('frontend.layout.nav-bar')
<!-- Log In Menu-->
<!---Log In Menu End -->
<!--
slide show
-->
<div>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <?php
$home->slider();
?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!--
overview about school
-->
<div class="overview">
  <div class="row">
    <div class="col-sm-2 " style="margin-right: 30px; margin-left: 40px; border: 10px solid white; background-color: white ; box-shadow: 10px 10px 5px grey;">
      <div class="btn-group-vertical">
        <button type="button" class="btn btn-primary btn-raised btn-lg"> Menu </button><br><br>
        <a href="frontend" class="btn btn-primary btn-raised btn-lg" >Home</a>
        <br>
        <a href="notice" class="btn btn-primary btn-raised btn-lg" >NOTICE</a>
        <br>
        <a href="tutorial" class="btn btn-primary btn-raised btn-lg"  >TOUTORIAL</a>
        <br>
        <a href="photo" class="btn btn-primary btn-raised btn-lg" >PHOTO</a>
        <br>
      </div>
    </div>
    <div class="col-sm-5 " >
      <h3>OVERVIEW</h3>
      <?php $home->description();?>
    </div>
    <div class="col-sm-4 " >
      <?php $home->imageView();?>
      <!--<img src="photos/ccc.jpg" style="height: 310px; width: 480px;">-->
    </div>
  </div>
</div>
<div class="student" style="background-color: white;">
  <h3> Photo</h3>
  <div class="row">
    <?php ViewerProcessor::studentImage();?>
    <!-- <div class="col-sm-3">
      <a href=""><img src="titleIcon/ccc.jpg" class="img-thumbnail" alt="Cinque Terre" width="310" height="236">
        <figcaption class="figure-caption text-center">Name</figcaption>
      </div> -->
    </div>
  </div>
  <div class="student">
    <h3>Event</h3>
    <div class="row">
      <!--  <div class="col-sm-3">
        <a href=""><img src="titleIcon/ccc.jpg" class="img-thumbnail" alt="Cinque Terre" width="310" height="236">
          <figcaption class="figure-caption text-center">Name</figcaption>
        </a>
      </div> -->
      <?php ViewerProcessor::eventImage();?>
    </div>
  </div>
  <!--
  Event ditels
  <div class="modal fade" id="exampleModalLong" tabindex="10" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Evient title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          The university was founded by the Government of Bangladesh according to a university act in 1986 to give special importance in science and technology education. SUST was established as the first specialized science  technology university of the country. After SUST, seven more science and technology universities have been established in Bangladesh.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  -->
  <!--
  Student ditels
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <img src="photos/ccc.jpg" width="450" height="236">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <h5>Name:</h5>
          <h5>Class:</h5>
          <h5>Address:</h5>
          <h5>Phone:</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  -->
  @include('frontend.layout.footer')