<?php

  if (isset($_GET['edit_user'])) {
  	$the_user_id = escape($_GET['edit_user']);

		$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
		$select_users_query = mysqli_query($connection , $query);

		while($row = mysqli_fetch_assoc($select_users_query)) {
		$user_id        = $row['user_id'];
		$username       = $row['username'];
		$user_password  = $row['user_password'];
		$user_firstname = $row['user_firstname'];
		$user_lastname  = $row['user_lastname'];
		$user_email     = $row['user_email'];
		$user_image     = $row['user_image'];
		$user_role      = $row['user_role'];


  }

}

?>

<?php

  if (isset($_POST['edit_user'])) {

		// $user_id = $_POST['user_id'];
		$user_firstname  = escape($_POST['user_firstname']);
		$user_lastname   = escape($_POST['user_lastname']);
		$user_role       = escape($_POST['user_role']);
		// $post_image   = $_FILES['image']['name'];
		// $post_image_temp = $_FILES['image']['tmp_name'];
		$username        = escape($_POST['username']);
		$user_email      = escape($_POST['user_email']);
		$user_password   = escape($_POST['user_password']);
		// $post_date    = date('d-m-y');
		// $post_comment_count = 4;


		// move_uploaded_file($post_image_temp , "../admin/images/$post_image");




    // $query = "SELECT randSalt FROM users";
    // $select_randsalt_query = mysqli_query($connection , $query);
    //
    //   if (!$select_randsalt_query) {
    //     die('QUERY FAILED' . mysqli_error($connection));
    //   }
    //
    //   $row = mysqli_fetch_array($select_randsalt_query);
    //
    //   $salt = $row['randSalt'];
    //
    //   $hashed_password = crypt($user_password , $salt);





    if (!empty($user_password)) {
      $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
      $get_user_query = mysqli_query($connection , $query_password);
      if (!$get_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
      }
      $row = mysqli_fetch_array($get_user_query);
      $db_user_password = $row['user_password'];

      if ($db_user_password != $user_password) {
        $user_password = password_hash($user_password , PASSWORD_BCRYPT , array('cost' => 12) );
      }

      $query = "UPDATE users SET ";

  		$query .= "user_firstname = '{$user_firstname}' , ";
  			$query .= "user_lastname = '{$user_lastname}' , ";
  				$query .= "user_role = '{$user_role}' , ";
  					$query .= "username = '{$username}' , ";
  						$query .= "user_email = '{$user_email}' , ";
  							$query .= "user_password = '{$user_password}' ";
  								$query .= "WHERE user_id = '{$the_user_id}' ";

  								$edit_user_query = mysqli_query($connection , $query);

  								if (!$edit_user_query) {
  									die('QUERY FAILED' . mysqli_error($connection));
  								}
                  echo "User Updated" . "<a href='users.php'>View Users</a>";

    }



    // $hash = "$2y$10$";
    // $salt = "thisissomecrazycodez22";
    // $cryp = $hash . $salt;
    // $hash_password = crypt($user_password , $cryp);



  }





 ?>



<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		 <label for="title">Firstname</label>
			<input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
	</div>


	<div class="form-group">
    <label for="formGroupExampleInput">Last Name</label>
    <input name="user_lastname" value="<?php echo $user_lastname; ?>" type="text" class="form-control" >
  </div>


<label for="">User Role</label>
<br>
	<select class="" name="user_role">
		<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
		<?php
		if ($user_role == 'admin') {

		echo "<option value='subscriber'>subscriber</option>";

	}else {

		echo "<option value='admin'>admin</option>";

	}



		 ?>

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
    <input name="username" value="<?php echo $username; ?>" type="text" class="form-control" id="formGroupExampleInput2" >
  </div>

	<div class="form-group">
    <label for="formGroupExampleInput2">Email</label>
    <input name="user_email" value="<?php echo $user_email; ?>" type="email" class="form-control" id="formGroupExampleInput2" >
  </div>

	<div class="form-group">
    <label for="formGroupExampleInput2">Password</label>
    <input autocomplete="off" name="user_password" value="<?php //echo $user_password; ?>" type="password" class="form-control" id="formGroupExampleInput2" >
  </div>

	<button name="edit_user" type="submit" class="btn btn-secondary">Update</button>
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
