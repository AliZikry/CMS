
	<?php

	if (isset($_GET['p_id'])) {

			$the_post_id = escape($_GET['p_id']);



			$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
			$select_posts_by_id = mysqli_query($connection , $query);

			while($row = mysqli_fetch_assoc($select_posts_by_id)) {
			$post_id            = $row['post_id'];
			$post_author        = $row['post_author'];
			$post_title         = $row['post_title'];
			$post_category_id   = $row['post_category_id'];
			$post_status        = $row['post_status'];
			$post_image         = $row['post_image'];
			$post_tags          = $row['post_tags'];
			$post_comment_count = $row['post_comment_count'];
			$post_date          = $row['post_date'];
			$post_content       = $row['post_content'];


  }

}

	if (isset($_POST['update_post'])) {
		$post_author      = escape($_POST['post_author']);
		$post_title       = escape($_POST['post_title']);
		$post_category_id = escape($_POST['post_category']);
		$post_status      = escape($_POST['post_status']);
		$post_image       = escape($_FILES['image']['name']);
		$post_image_temp  = escape($_FILES['image']['tmp_name']);
		$post_content     = escape($_POST['post_content']);
		$post_tags        = escape($_POST['post_tags']);

		move_uploaded_file($post_image_temp, "../admin/images/$post_image");

		if (empty($post_image)) {
			$query = "SELECT * FROM posts WHERE post_id = $the_post_id";

			$select_image = mysqli_query($connection , $query);

			while ($row = mysqli_fetch_array($select_image)) {
				$post_image = $row['post_image'];
			}
		}

		$query = "UPDATE posts SET ";
		$query .= "post_title = '{$post_title}' , ";
		$query .= "post_category_id = '{$post_category_id}' , ";
		$query .= "post_date = now() , ";
		$query .= "post_author = '{$post_author}' , ";
		$query .= "post_status = '{$post_status}' , ";
		$query .= "post_tags = '{$post_tags}' , ";
		$query .= "post_content = '{$post_content}' , ";
		$query .= "post_image = '{$post_image}' ";
		$query .= "WHERE post_id = {$the_post_id}";

		$update_post = mysqli_query($connection , $query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		}

		echo "<p class='bg-success'>Post Updted. <a href='../post.php?p_id={$the_post_id}'>View Post</a></p>";


	}




	 ?>






<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="formGroupExampleInput">Post Title</label>
    <input name="post_title" type="text" class="form-control" id="formGroupExampleInput"
		value="<?php echo "$post_title"; ?>">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Post Category Id</label>

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
    <input name="post_author" type="text" class="form-control" id="formGroupExampleInput2"
		value="<?php //echo $post_author; ?>">
  </div> -->

	<label for="">Post Status</label>

	<select class="" name="post_status">
		<option value=""><?php echo $post_status; ?></option>
		<?php if ($post_status == 'published') {
			echo "<option value='draft'>Draft</option>";
		}else {
			echo "<option value='published'>Published</option>";

		} ?>

	</select>

	<br>
	<br>








	<!-- <div class="form-group">
    <label for="formGroupExampleInput2">Post Status</label>
    <input name="post_status" type="text" class="form-control" id="formGroupExampleInput2"
		value="<?php ; ?>">
  </div> -->

	<div class="form-group">

		<img width="100" src="../Admin/images/<?php echo $post_image; ?>" alt="">
    <input name="image" type="file">
  </div>


	<div class="form-group">
    <label for="formGroupExampleInput2">Post Tags</label>
    <input name="post_tags" type="text" class="form-control" id="formGroupExampleInput2"
		value="<?php echo $post_tags; ?>">
  </div>

	<div class="form-group">
    <label for="formGroupExampleInput2">Post Content</label>
    <input name="post_content" type="text" class="form-control" id="formGroupExampleInput2"
		value="<?php echo $post_content; ?>">
  </div>

	<div class="form-group">
	          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
	      </div>

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
