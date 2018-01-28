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

use App\Http\Controllers\CategoryController;
/*
here the  constan variablea

 */
define('CATEGORY_FIXED', 6);
setCookie("categoryCookie", time() - 1);?>

@include('admin.includes.header')
<div id="wrapper">
    <!-- Navigation -->
    @include ('admin.includes.navbar-items')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-header">
                    Category
                    <small>Admin</small>
                    </h1>
                    <!--- add category -->
                    <form name="formBox" id="formBox" method="POST" action="<?php

/*
functionality for controller action for inserting and updating data into categories table
 */
try {
	if (isset($_GET['edit'])) {
		$edit = $_GET['edit'];
		?>
	 {{action('CategoryController@update', $edit)}}
     <?php
} else {
		?>
{{action('CategoryController@store')}}

        <?php

	}} catch (Exception $ex) {
	echo $ex->getMessage();
}
?>">
                        {{csrf_field()}}
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="forName">Category</label>
                            <input type="text" name="categoryName" id="categoryName" class="
                            form-control"  value='<?php

/*

here running the functionality for showing category name in input  field
 */
try {
	if (isset($_GET['edit'])) {
		echo $returnCategoryName;

	}
} catch (Exception $ex) {
	echo $ex->getMessage();
}
?>' />
                        </div>
                        <input type="submit" name="submitCategory" value="addCategory"/>
                    </form>
                    <!--- category  table  show here  -->
                    <br/>
                    <br/>
                    <h1>Result Table</h1>
                    <table class="table table-hover table-responsive  table-bordered ">
                        <thead class="thead-light">
                            <tr>
                                <th>Category Id</th>
                                <th>Category Name</th>
                            </tr>
                        </thead>
                        <tbody >

                            <?php

/*
functionality for showing date into table from categories table

 */

$controller = new CategoryController();
$array = $controller->show();
foreach ($array as $value) {
	printf("<tr>");
	printf("<td>" . $value->categoryId . "</td>");
	printf(" <td>" . $value->categoryName . "</td>");

	$edit = "/category?edit=" . $value->categoryId;
	?>
     <td><a href="{{url($edit)}}">Edit</a></td>
    <?php
if ($value->categoryId > CATEGORY_FIXED) {
		$delete = "/category?delete=" . $value->categoryId

		?>

                                <td><a href="{{url($delete)}}">Delete</a></td>
                                <?php
}
	echo " </tr>";
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