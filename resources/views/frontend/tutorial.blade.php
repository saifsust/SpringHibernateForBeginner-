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

use App\Http\Services\ViewerProcessor;
?>
@include('frontend.layout.header')
<!--
head or title navbar
-->
@include('frontend.layout.nav-bar')
<div style="background-color: white;margin-top: 50px;border: 6px gray;">
  <ul class="nav  navbar navbar-expand-lg navbar-light bg-ligh">
    <?php ViewerProcessor::tutroialMenu();?>
  </ul>
</div>
<div class="row">
  <?php ViewerProcessor::tutorialsView($results);?>
</div>
@include('frontend.layout.footer')