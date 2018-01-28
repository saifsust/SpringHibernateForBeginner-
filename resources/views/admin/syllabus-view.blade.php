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
                    <h1>Result Table</h1>
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th >Chapter</th>
                                <th >Name</th>
                                <th >Start Pages</th>
                                <th >End Pages</th>
                                <th >Edit</th>
                                <th >Delete</th>
                            </tr>
                        </thead>

                        <tbody>


                            <tr>
                                <td>1</td>
                                <td>Saiful Islam</td>
                                <td>12</td>
                                <td>70</td>
                                <td><a href="#">Edit</a></td>
                                <td><a href="#">Delete</a></td>

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
