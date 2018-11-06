<?php
  if (isset($_POST['create_user'])) {

		// $user_id = $_POST['user_id'];
		$user_firstname = escape($_POST['user_firstname']);
		$user_lastname  = escape($_POST['user_lastname']);
		$user_role      = escape($_POST['user_role']);
		// $post_image  = $_FILES['image']['name'];
		// $post_image_temp = $_FILES['image']['tmp_name'];
		$username       = escape($_POST['username']);
		$user_email     = escape($_POST['user_email']);
		$user_password  = escape($_POST['user_password']);
		// $post_date   = date('d-m-y');
		// $post_comment_count = 4;

    $user_password = password_hash($user_password , PASSWORD_BCRYPT , array('cost' => 12) );



		// move_uploaded_file($post_image_temp , "../admin/images/$post_image");

		$query = "INSERT INTO users(user_firstname , user_lastname , user_role , username , user_email , user_password)";

		$query .= "VALUES('{$user_firstname}' , '{$user_lastname}' , '{$user_role}' , '{$username}' , '{$user_email}' , '{$user_password}')";

		$create_user_query = mysqli_query($connection , $query);

		if (!$create_user_query) {
			die("QUERY FAILED" . mysqli_error($connection));
		}

    echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";


  }





 ?>



<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="formGroupExampleInput">First Name</label>
    <input name="user_firstname" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input your first name">
  </div>

	<div class="form-group">
    <label for="formGroupExampleInput">Last Name</label>
    <input name="user_lastname" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input your last name">
  </div>


<label for="">User Role</label>
<br>
	<select class="" name="user_role">
		<option value="admin">Admin</option>
		<option value="subscriber">Subscriber</option>

	</select>
	<br>










	<!-- <div class="form-group">
    <label for="formGroupExampleInput2">Post Author</label>
    <input name="post_author" type="text" class="form-control" id="formGroupExampleInput2" placeholder="input post author">
  </div>

	<div class="form-group">
    <label for="formGroupExampleInput2">Post Status</label>
    <input name="post_status" type="text" class="form-control" id="formGroupExampleInput2" placeholder="published OR draft">
  </div>

	<div class="form-group">
    <label for="exampleInputFile">Post Image</label>
    <input name="image" type="file" class="form-control-file" >
    <small id="fileHelp" class="form-text text-muted">Nice Choice</small>
  </div> -->


	<div class="form-group">
		<br>
    <label for="formGroupExampleInput2">Username</label>
    <input name="username" type="text" class="form-control" id="formGroupExampleInput2" placeholder="input post tags">
  </div>

	<div class="form-group">
    <label for="formGroupExampleInput2">Email</label>
    <input name="user_email" type="email" class="form-control" id="formGroupExampleInput2" placeholder="input post content">
  </div>

	<div class="form-group">
    <label for="formGroupExampleInput2">Password</label>
    <input name="user_password" type="password" class="form-control" id="formGroupExampleInput2" placeholder="input post content">
  </div>

	<button name="create_user" type="submit" class="btn btn-secondary">Add User</button>
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
