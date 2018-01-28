@include('admin.includes.header')


<div id="wrapper">
    <!-- Navigation -->
      @include ('admin.includes.navbar-items')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->


                    <h1 class="page-header">
                        Student Information
                        <small>Admin</small>
                    </h1>

                    <br/>

                    <br/>
                    <!-- studnet info -->
                    <form >

                         <!--class selection -->
                    <section class="col-ms-6">
                        <select class="form-control">
                            <option>class 1</option>
                            <option>class 1</option>
                            <option>class 1</option>
                         </select>
                    </section>
                      <br/>
                        <br/>

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
                    <table class="table table-hover table-responsive  table-bordered ">
                        <thead class="thead-light">
                            <tr>
                                <th>Teacher Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Category</th>
                            </tr>
                        </thead>

                        <tbody >



                            <tr>
                                <td>1</td>
                                <td>Saiful</td>
                                <td>Islam</td>
                                <td>English</td>
                                <td><a href="profile-view">view</a></td>
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
    <!-- /#page-wrapper -->
<!-- /#wrapper -->
@include ('admin.includes.footer')
