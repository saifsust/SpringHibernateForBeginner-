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
$resultShow = new ResultShow();
?>
@include('admin.includes.header')
<div id="wrapper">
    <!-- Navigation-->
    @include ('admin.includes.navbar-items')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    Notice and Post Upload
                    <small>Admin</small>
                    </h1>
                    <!---  Post Notice -->
                    <!--- enctype must needed for file upload  -->
                    <form method="post" action="{{action('NoticeController@uploadNotice')}}"  enctype="multipart/form-data" files="true" >
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="forName" >Title</label>
                            <input type="text" name="title"  class="form-control title" />
                        </div>
                        <!--- author -->
                        <div class="form-group">
                            <!---  admin selection work is not completed-->
                            <input type="hidden" name="adminId" value="<?php echo 1; ?>">
                        </div>
                        <!-- select category -->
                        <div class="form-group">
                            <select name="categoryId" class="form-control">
                                <option>Category</option>
                                <?php $resultShow->getCategories();?>
                            </select>
                        </div>
                        <!-- this Selection only for sports -->
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="forName">Upload file</label>
                            <input type="file" name="fileLink"  class="form-control btn-primary" />
                        </div>
                        <div class="form-group">
                            <label for="forName" >Write Post</label>
                            <h6>Bold ==|| and link ==< ></h6>
                            <textarea type="text" name="passage"  class="form-control" rows="13px"></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" />
                    </form>
                    <br/>
                    <br/>
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