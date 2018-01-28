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
                        Resources
                        <small>Admin</small>
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
                                <td>Book Name</td>
                                <td>Edition</td>
                                <td>Writter</td>
                                <td>Publication</td>
                                <td>PDF</td>
                            </tr>
                        </thead>

                        <tbody>


                            <tr>
                                <td>Amar Boi</td>
                                <td>6th</td>
                                <td>Zafar Iqbal</td>
                                <td>National Publication</td>
                                <td>PDF link</td>
                                <td><a>Update</a></td>
                                <td><a>Delete</a></td>
                            </tr>

                            <tr>
                                <td>Amar Boi</td>
                                <td>6th</td>
                                <td>Zafar Iqbal</td>
                                <td>National Publication</td>
                                <td>PDF link</td>
                                <td><a>Update</a></td>
                                <td><a>Delete</a></td>
                            </tr>

                            <tr>
                                <td>Amar Boi</td>
                                <td>6th</td>
                                <td>Zafar Iqbal</td>
                                <td>National Publication</td>
                                <td>PDF link</td>
                                <td><a>Update</a></td>
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
