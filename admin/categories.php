<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">


        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>to the other world</small>
                        </h1>

												<div class="col-xs-5">


											<?php insert_categories(); ?>







												<form class="" action="" method="post">
													<div class="form-group">
														<label for="cat_title">Add Category</label>
														<input class="form-control" type="text" name="cat_title" value="">
													</div>

													<div class="form-group">

														<button name="submit" type="submit" class="btn btn-info">Add Category</button>
													</div>


												</form>

												<!-- FORM UPDATE CATEGORY-->

												<?php

												if (isset($_GET['edit'])) {
													$cat_id = escape($_GET['edit']);
													include "includes/update_categories.php";
												}


												 ?>


          					</div>

                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>

								<div class="col-xs-7">
				<table class="table table-bordered table-hover">


						<thead>
								<tr>
										<th>Id</th>
										<th>Category Title</th>
								</tr>
						</thead>
						<tbody>

						<?php //FIND ALL CATEGORIES QUERY

             FindAllCategories();




		?>

		<?php //DELETE QUERY

      DeleteCategories();

		 	?>




						</tbody>
				</table>




										</div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
