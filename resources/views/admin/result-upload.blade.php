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
use App\Http\Services\ResultUpload;
/* call all classes here**/
$ru = new ResultUpload();
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
                    Result Upload
                    <small>Admin</small>
                    </h1>
                    <!---upload result  -->
                    <form class="form-group" method="POST"  action="{{action('ResultUploadController@uploadExcelFile')}}"  enctype="multipart/form-data" files="true">
                        <!--send controller hiden data -->
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <!--end of send controller hiden data -->
                        <div class="form-group">
                            <select class="form-control " name="categoryId" >
                                <option value="">CLASS NAME</option>
                                <?php
$ru->showClassNames();
?>
                            </select>
                        </div>
                        <div class="form-group" >
                            <select class="form-control" name="subjectId" >
                                <option value="">SUBJECT</option>
                                 <?php
$ru->selectionOption($ru->getSubjectNames(), 'subjectId', 'subjectName');
?>
                            </select>
                        </div>
                        <div class="form-group" >
                            <select class="form-control" name="examNameId">
                                <option value="">EXAM NAME</option>
                                <?php
$ru->selectionOption($ru->getExamNames(), 'examNameId', 'examName');
?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="session">
                                <option value="">SESSION</option>
                               <?php
$ru->echoSessionSelectionOptin($ru->getSession());
?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="excelFileName" class="form-control btn-primary poll-right" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" class="btn btn-primary" value="upload" multiple/>
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