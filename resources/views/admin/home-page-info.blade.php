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

@include('admin.includes.header')

<div id="wrapper">
    <!-- Navigation -->
     @include ('admin.includes.navbar-items')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Home Page Detail upload
                        <small>Profile Name</small>
                    </h1>

                    <form method="post" action="{{action('homePageInfoController@upload')}}"  enctype="multipart/form-data" files="true">
                    	 <!--send controller hiden data -->
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <!--end of send controller hiden data -->
                        <div class="form-group">
                        <label>First Slider Image</label>
                        <input type="file" name="firstImg" class="btn btn-default" />
                        </div>
                         <div class="form-group">
                        <label>Second Slider Image</label>
                        <input type="file" name="secondImg" class="btn btn-default" />
                        </div>
                         <div class="form-group">
                        <label>Third Slider Image</label>
                        <input type="file" name="thirdImg" class="btn btn-default" />
                        </div>
                         <div class="form-group">
                        <label>Fourth Slider Image</label>
                        <input type="file" name="fourthImg" class="btn btn-default" />
                        </div>
                         <div class="form-group">
                        <label>Home Side Image</label>
                        <input type="file" name="sideImg" class="btn btn-default" />
                        </div>
                             <div class="form-group">
                        <label>First Slider Image</label>
                        <textarea class="form-control" rows="14" name="description" ></textarea>
                        </div>
                       <input type="submit" class="btn btn-primary" />
                    </form>



                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@include('admin.includes.footer')