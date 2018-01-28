<?php
use App\Http\Services\ResultUpload;
$result = new ResultUpload();
define('CHAPTER', 30);
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
                    Tutorial upload
                    <small>Profile Name</small>
                    </h1>
                    <form  method="post" enctype="mutlipart/form-data" files="true" action="{{action('TutorialUploadController@upload')}}">
                        <!--- hidden field for transfering data into controller-->
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <!-- hidden part end-->
                        <div class="form-group">
                            <label>Select Class</label>
                            <select class="form-control" name="class" >
                                <?php $result->showClassNames();?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Subject</label>
                            <select class="form-control" name="subject">
                                <?php $subject = $result->getSubjectNames();
$result->selectionOption($subject, 'subjectId', 'subjectName');
?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>chapter No.</label>
                            <select class="form-control" name="chapterNo">
                                <?php
for ($i = 1; $i < CHAPTER; $i++) {
	echo ' <option value="' . $i . '">' . $i . '</option>';
}
?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chapter Name</label>
                            <input type="text" name="chapterName" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-static" >tutorial Link</label>
                            <input type="text" name="link" class="form-control" />
                        </div>
                        <input type="submit" name="submit" class="btn btn-success"/>
                    </form>
                    <br>
                    <br>
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