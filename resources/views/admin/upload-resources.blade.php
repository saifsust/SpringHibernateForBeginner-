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
use App\Http\Services\ResultShow;
use App\Http\Services\ResultUpload;
$resultShow = new ResultShow();
$resultUpload = new ResultUpload();

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
                    Upload Resources
                    <small>Admin</small>
                    </h1>
                    <!---upload result  -->
                    <form class="form-group" method="post" enctype="multipart/form-data" files="true"  >
                        <!--- hidden field for transfering data into controller-->
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <!-- hidden part end-->
                        <div class="form-group">
                            <label for="forName">Category</label>
                            <select class="form-control btn-primary" name="category">
                                <?php $resultShow->getCategories();?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="forName">Subject </label>
                            <select class="form-control btn-primary" name="subject">
                                <?php $resultUpload->selectionOption($resultUpload->getSubjectNames(), 'subjectId', 'subjectName');?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="forName">Book Name</label>
                            <input type="text" name="bookName" class="form-control btn-primary poll-right" />
                        </div>
                        <div class="form-group">
                            <label for="forName">Edition</label>
                            <input type="text" name="edition" class="form-control btn-primary poll-right" />
                        </div>
                        <div class="form-group">
                            <label for="forName">Writer Name</label>
                            <input type="text" name="writerName" class="form-control btn-primary poll-right" />
                        </div>
                        <div class="form-group">
                            <label for="forName">Resource</label>
                            <input type="file" name="fileLink" class="form-control btn-primary poll-right" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" />
                        </div>
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
@include ('admin.includes.footer')