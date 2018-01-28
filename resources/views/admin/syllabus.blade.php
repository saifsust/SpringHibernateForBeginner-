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
                        Post Notice
                        <small>Profile Name</small>
                    </h1>



                    <!--- result show table  -->
                    <section class="col-ms-6">
                        <select class="form-control">
                            <option>class 1</option>
                            <option>class 1</option>
                            <option>class 1</option>
                         </select>
                    </section>
                    <br/>
                    <br/>
                    <br/>
                    <!-- subject selection -->
                      <section class="col-ms-6">
                        <select class="form-control">
                            <option>Bangla</option>
                            <option>English</option>
                            <option>Mathematics</option>
                         </select>
                    </section>
                    <!-- table view -->

                    <br/>
                     <br/>
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <td>Term Exam</td>
                                <td>Chapters</td>
                            </tr>
                        </thead>

                        <tbody>


                            <tr>
                                <td>First Term</td>
                                <td>1 ,2,,3,4,5,6,7</td>
                                <td><a href="syllabus-view">View</a></td>
                                <td><a>Edit</a></td>
                                <td><a>Delete</a></td>
                            </tr>



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
