
												<table class="table table-bordered table-hover">
													<thead>
														<tr>
															<th>Id</th>
															<th>Author</th>
															<th>Title</th>
															<th>Category</th>
															<th>Status</th>
															<th>Image</th>
															<th>Tags</th>
															<th>Comments</th>
															<th>Post Views</th>
															<th>Date</th>
															<th>View Post</th>
															<th>Edit</th>
															<th>Delete</th>

														</tr>
													</thead>

											<tbody>

                         <?php

												 $query = "SELECT * FROM posts";
												 $select_posts = mysqli_query($connection , $query);

												 while($row = mysqli_fetch_assoc($select_posts)) {
												 $post_id = $row['post_id'];
												 $post_author = $row['post_author'];
												 // $post_user = $row['post_user'];
												 $post_title = $row['post_title'];
												 $post_category_id = $row['post_category_id'];
												 $post_status = $row['post_status'];
												 $post_image = $row['post_image'];
												 $post_tags = $row['post_tags'];
												 $post_comment_count = $row['post_comment_count'];
												 $post_date = $row['post_date'];
												 $post_view_count = $row['post_view_count'];


											echo "<tr>";
												 echo "<td>{$post_id}</td>";



												 if (!empty($post_author)) {
													 echo "<td>{$post_author}</td>";
												 }
												 // elseif (!empty($post_user)) {
													//  echo "<td>{$post_user}</td>";
												 // }




												 echo "<td>{$post_title}</td>";

												 $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
												 $select_categories_id = mysqli_query($connection , $query);

												 while($row = mysqli_fetch_assoc($select_categories_id)) {
												 $cat_id = $row['cat_id'];
												 $cat_title = $row['cat_title'];



												 echo "<td>{$cat_title}</td>";

											 }



												 echo "<td>{$post_status}</td>";
												 echo "<td><img width='100' src='../admin/images/$post_image' ></td>";
												 echo "<td>{$post_tags}</td>";

												 $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
	                       $update_comment_count = mysqli_query($connection , $query);
												 $row = mysqli_fetch_array($update_comment_count);
												 $comment_id = $row['comment_id'];
												 $count_comments = mysqli_num_rows($update_comment_count);
												 echo "<td><a href='../post.php?p_id={$post_id}'>{$count_comments}</a></td>";

												 echo "<td><small><i>click to reset!! </i></small><br><a href='posts.php?reset={$post_id}'>{$post_view_count}</a></td>";
												 echo "<td>{$post_date}</td>";
												 echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";


												 echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";

												 echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?!'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";


											echo "</tr>";


											 }



												    ?>








											</tbody>

										</table>


					<?php


		if (isset($_GET['delete'])) {
			$the_post_id = escape($_GET['delete']);

		$query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
		$delete_query = mysqli_query($connection , $query);

		header("Location: posts.php");
		}


		if (isset($_GET['reset'])) {
			$the_post_id = escape($_GET['reset']);

		$query = "UPDATE posts SET post_view_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection , $_GET['reset']) . "" ;
		$reset_query = mysqli_query($connection , $query);

		header("Location: posts.php");
			 }











					 ?>
