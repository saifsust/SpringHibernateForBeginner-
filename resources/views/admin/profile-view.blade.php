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
                            <input type="text" name="roll" class="form-control" />
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
                    <div class="container-fluid">
                        <!-- top position -->
                        <div>
                            <!-- right float -->
                            <div>
                                <label>Picture</label>
                                <img class="" src="" />
                            </div>
                            <!-- left float-->
                            <div>
                                <label>Name :</label>
                                <h4>Saiful Islam</h4>
                                <label>Father's Name :</label>
                                <h4>Saiful Islam</h4>
                                <label>Mother's Name :</label>
                                <h4>Saiful Islam</h4>
                            </div>
                        </div>
                        <!--bottom position -->
                        <div>

                            <!-- somtthing contain -->
                        </div>

                    </div>


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
