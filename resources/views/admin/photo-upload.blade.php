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
                    Photo Upload
                    <small>Admin</small>
                    </h1>
                    <br/>
                    <br/>
                    <form  method="post" action="{{action('PhotoUploadController@upload')}}"  enctype="multipart/form-data" files="true" >
                        <!--- hidden field for transfering data into controller-->
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <!-- hidden part end-->
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control btn-success"/>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="fileLink" class="btn btn-success"/>
                        </div>
                        <input type="submit" name="submit" class="btn btn-success" >
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