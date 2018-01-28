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
/** all constant variable are declared here **/
$CATEGORY_FIXED = 20;
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
                    Student Result View
                    <small>Admin</small>
                    </h1>
                    <br/>
                    <br/>
                    <form>
                        <div class="input-group">
                            <input type="text" name="roll" class="form-control"/>
                            <span class="input-group-btn">
                                <button type="button" name="searchRoll" class="btn btn-defualt"/>
                                <span class="glyphicon glyphicon-search"></span>
                            </span>
                        </div>
                    </form>
                    <!--- result show table  -->
                    <br/>
                    <br/>
                    <?php
$resultShow = new ResultShow();
$resultShowcase = $resultShow->getResultShowcase($resultShowcaseId);
foreach ($resultShowcase as $value) {
	echo "<h2>";
	print_r($value->{'examName'});
	printf("<small>" . $value->{'subjectName'} . "  ");
	printf("<small><strong>" . $value->{'categoryName'} . "</strong></small></small>");
	echo "</h2>";
}

?>
                    <br/>
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>Exam Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
if ($resultSheet != null) {
	foreach ($resultSheet as $value) {
		$resultSheetAction = "/result-view/";
		?>
                            <tr>
                                <td><?php printf($value->{'Roll'});?></td>
                                <td><?php printf($value->{'Name'});?></td>
                                <td><?php printf($value->{'Marks'});?></td>
                                <?php $resultSheetAction .= 'Edit' . '/' . $resultShowcaseId . "/" . $value->{'Roll'};?>
                                <td><a href="{{url($resultSheetAction)}}">Edit</a></td>
                                <?php
$resultSheetAction = "/result-view/";
		$resultSheetAction .= 'Delete' . '/' . $resultShowcaseId . "/" . $value->{'Roll'};?>
                                <td><a href="{{url($resultSheetAction)}}">Delete</a></td>
                            </tr>
                            <?php }
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