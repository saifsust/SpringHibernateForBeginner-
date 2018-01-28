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
/** all constant variable are declared here **/
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
                    Result Show
                    </h1>
                    <!---select category  -->
                    <?php
/**
here is implemented code for show selecting category option
 */
$resultShow = new ResultShow();
$categories = $resultShow->showCategories();
?>
                    <form method="POST" action="{{action('ResultController@showSelectedResult')}}">
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <h6>Select Category </h6>
                        </div>
                        <div class="form-group">
                            <select name="categoryId" class="form-control" id="selected">
                                <option>CLASS NAME</option>
                                <?php
$resultUpload->showClassNames();
?>
                            </select>
                        </div>
                        <div class="form-group">
                            <!-- <h6>Click The show To show Specific Result</h6>-->
                        </div>
                        <input type="submit" name="selected" class="btn btn-primary" value="show">
                    </form>
                    <br/>
                    <br/>
                    <div class="input-group">
                        <input type="text" name="roll" class="form-control" />
                        <span class="input-group-btn">
                            <button type="button" name="searchRoll" class="btn btn-defualt"/>
                            <span class="glyphicon glyphicon-search"></span>
                        </span>
                    </div>
                     <br/>
                    <br/>
                    <h3>All result are showed</h3>
                    <br/>
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Class</th>
                                <th>Exam Name</th>
                                <th>Session</th>
                                <th>Subject</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
/* tabled  information is showed here*/
/**
@Auther: SAIFUL ISLAM
@Batch : SUST CSE 2013-14
@Contact : saiful.sust.cse@gmail.com
@Hotmail : saiful.sust.cse@hotmail.com
@YahooMail: saiful_sust_cse@yahoo.com
@Gmail: saiful.cse@student.sust.edu
@Facebook : https://www.facebook.com/SaifulIslamLitonSust
please ,contact with me .i will be pleasure if you contact with me for your important suggestions and opions for improving my coding or my coding skill
 **/
foreach ($resultShowCaseDataSet as $data) {
	$resultShowcaseId = $data->{'resultShowcaseId'};
	$deletedResultShow = '/result-show/';
	$resultView = '/result-view/';
	?>
                            <tr>
                                <td><?php print_r($data->{'resultShowcaseId'})?></td>
                                <td><?php print_r($data->{'categoryName'})?></td>
                                <td><?php print_r($data->{'examName'})?></td>
                                <td><?php print_r($data->{'session'})?></td>
                                <td><?php print_r($data->{'subjectName'})?></td>
                                <td><?php print_r($data->{'uploadDate'})?></td>
                                <td><a href="{{url($resultView.$resultShowcaseId)}}">View</a></td>
                                <td><a href="#">Update</a></td>
                                <td><a href="{{url($deletedResultShow.$resultShowcaseId)}}">Delete</a></td>
                            </tr>
                            <?php
}
?>
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