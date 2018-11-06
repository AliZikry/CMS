<?php
  if (isset($_POST['create_post'])) {

		$post_title       = escape($_POST['post_title']);
		$post_author      = escape($_POST['post_author']);
    // $post_user     = $_POST['post_user'];
		$post_category_id = escape($_POST['post_category']);
		$post_status      = escape($_POST['post_status']);
		$post_image       = escape($_FILES['image']['name']);
		$post_image_temp  = escape($_FILES['image']['tmp_name']);
		$post_tags        = escape($_POST['post_tags']);
		$post_content     = escape($_POST['post_content']);
		$post_date        = escape(date('d-m-y'));
		// $post_comment_count = 4;


		move_uploaded_file($post_image_temp , "../admin/images/$post_image");

		$query = "INSERT INTO posts(post_category_id , post_title , post_author , post_date , post_image , post_content , post_tags , post_status)";

		$query .= "VALUES({$post_category_id} , '{$post_title}' , '{$post_author}' , now() , '{$post_image}' , '{$post_content}' , '{$post_tags}' , '{$post_status}')";

		$create_post_query = mysqli_query($connection , $query);

		if (!$create_post_query) {
			die("QUERY FAILED" . mysqli_error($connection));
		}


  }





 ?>



<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="formGroupExampleInput">Post Title</label>
    <input name="post_title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Title">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Post Category</label>

    <select class="" name="post_category" id="">

      <?php
      $query = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection , $query);

      if (!$select_categories) {
        die("QUERY FAILED" . mysqli_error($connection));
      }

      while($row = mysqli_fetch_assoc($select_categories )) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];

      echo "<option value='{$cat_id}'>{$cat_title}</option>";
    }
       ?>
    </select>
  </div>



  <div class="form-group">
    <label for="">Author</label>

    <select class="" name="post_author" id="">

      <?php
      $query = "SELECT * FROM users";
      $select_author = mysqli_query($connection , $query);

      if (!$select_author) {
        die("QUERY FAILED" . mysqli_error($connection));
      }

      while($row = mysqli_fetch_assoc($select_author)) {
      $user_id = $row['user_id'];
      $username = $row['username'];

      echo "<option value='{$username}'>{$username}</option>";
    }
       ?>
    </select>
  </div>

	<!-- <div class="form-group">
    <label for="formGroupExampleInput2">Post Author</label>
    <input name="post_author" type="text" class="form-control" id="formGroupExampleInput2" placeholder="input post author">
  </div> -->

	<div class="form-group">
    <label for="formGroupExampleInput2">Post Status</label>
    <input name="post_status" type="text" class="form-control" id="formGroupExampleInput2" placeholder="published OR draft">
  </div>

	<div class="form-group">
    <label for="exampleInputFile">Post Image</label>
    <input name="image" type="file" class="form-control-file" >
    <small id="fileHelp" class="form-text text-muted">Nice Choice</small>
  </div>


	<div class="form-group">
    <label for="formGroupExampleInput2">Post Tags</label>
    <input name="post_tags" type="text" class="form-control" id="formGroupExampleInput2" placeholder="input post tags">
  </div>

	<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" id="body" name="post_content" rows="10" cols="30"></textarea>
  </div>

	<button name="create_post" type="submit" class="btn btn-secondary">Publish Post</button>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<br>
	<br>
	<br>
	<br>
	<br>





</form>
