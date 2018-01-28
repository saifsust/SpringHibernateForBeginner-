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
use App\Http\Services\ResultShow;
$resultShow = new ResultShow();
$noticeShow = new NoticeShow();
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
                    Noyices and Post
                    <small>Admin</small>
                    </h1>
                    <form method="post" action="{{action('NoticeViewController@view')}}" files="true" enctype="multipart/form-data">
                        <!--- data transfer hidden part -->
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <!-- end -->
                        <!--- result show table  -->
                        <div class="form-group">
                            <section class="col-ms-6">
                                <select class="form-control">

                                    <?php $resultShow->getCategories();?>
                                </select>
                            </section>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary"/>
                        </div>
                    </form>
                    <br/>
                    <br/>
                    <h1>Class 01</h1>
                    <br/>
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <td>Serial No.</td>
                                <td>Title</td>
                                <td>Passage</td>
                                <td>Category</td>
                                <td>File</td>
                                <td>Upload Date</td>
                                <td>view</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <colgroup>
                            <col class="col-sm-1">
                            <col class="col-sm-1">
                            <col class="col-sm-2">
                            <col class="col-sm-1">
                            <col class="col-sm-1">
                            <col class="col-sm-1">
                            <col class="col-sm-1">
                            <col class="col-sm-1">
                            <col class="col-sm-1">
                            </colgroup>
                        </thead>
                        <tbody>
                            <?php $noticeShow->defaultNoticeView($resultList);?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@include ('admin.includes.footer')