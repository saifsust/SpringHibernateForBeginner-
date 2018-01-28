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
?>

@include('frontend.layout.header')
<!--
head or title navbar
-->
@include('frontend.layout.nav-bar')
<div class="container">
    <form  action="{{action('ContactController@sendMail')}}" method="post" files="true" enctype="multipart/form-data" >
      <!-- csrf protect-->
      {{ csrf_field() }}
      <input type="hidden"  name="_token" value="{{ csrf_token() }}">
      <!-- csrf protection end-->
      <h2 class="">Contact Us</h2>
      <div class="form-group has-danger">
        <input class="form-control" name="Name" type="text" placeholder="Name">
      </div>
      <div class="form-group">
        <input class="form-control" name="subject" type="text" placeholder="Subject">
      </div>
      <div class="form-group">
        <textarea  rows="12" class="form-control" name="description" ></textarea>
      </div>
      <input type="submit" name="submit" class="btn ">
    </form>
  </div>
</div>
@include('frontend.layout.footer')