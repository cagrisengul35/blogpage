<!DOCTYPE html>
<html>
<head>

	<?php require_once('config.php') ?>

	<link rel="stylesheet" href="css/generalcss.css">
	<link rel="stylesheet" href="css/mainpage.css">
	<script src="https://kit.fontawesome.com/c90ca88446.js" crossorigin="anonymous"></script>

	<meta charset="UTF-8">
	<title>Event Reviews By People | Home </title>

</head>

<body>
	
	<!-- Full width image at the top-->
	<img src="https://i.picsum.photos/id/988/1720/400.jpg?hmac=3gNmSb_6GWPZeI48YBz2olX4cXQGTH0-fYPueEFYpoI"  width="100%" style="position:relative">

	<?php require_once('navbar.php') ?>

	<?php if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
		require_once('adminboard.php');
	}?>


	<!-- archive side bar, doesnt have any functionality right now-->
	<?php require_once('timeline.php'); ?>


	<div class="flex-wrapper">

		<div class="content">

			<div>
				<h1>Recent Articles</h1>
				<hr>
				
				<div class="post-flexbox">
				<!-- loads post prewievs from mysql-->
				<?php
					
					$page = 1; 
					if (isset($_GET['page'])) {
					$page = $_GET['page'];
					}
					$offset = ($page - 1) * 6;
					//offset is used to skip already loaded pages, first page's offset value is 0
					$stmt = $db->query("
					SELECT post_title, post_img, post_desc, post_id, post_date
					FROM posts
					ORDER BY post_date DESC
					LIMIT 6
					OFFSET $offset
					");

					
					while($row = $stmt->fetch_assoc())
					{
						echo '<div class="post">';
						echo '<div class="post-img">';
						echo '<img src="' . $row['post_img'] . '">';
						echo '</div>';
						echo '<div class:"post-text">';
						echo '<h1><a href="viewpost.php?id='.$row['post_id'].'">'.$row['post_title'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y', strtotime($row['post_date'])).'</p>';
						echo '<p>'.$row['post_desc'].'</p>';
						echo '<p><a href="viewpost.php?id='.$row['post_id'].'">Read More</a></p>';
						echo '</div>';
						echo '</div>';
					}
					
					
					//calculates the amount of pages
					$result = $db->query("SELECT COUNT(*) FROM posts");
					$row = $result->fetch_row();
					$total_rows = $row[0];
					$rows_per_page = 6;
					$total_pages = ceil($total_rows / $rows_per_page);
					
					
					?>
					</div>
					<!-- page buttons are generated here-->
					<?php
					echo '<div class="pages">';

					if ($page > 1) {
					  echo '<a href="?page=' . ($page - 1) . '"><i class="fa-solid fa-arrow-left"></i></a>';
					}
					
					echo '<span>' . $page . '</span>';
					
					if ($page < $total_pages) {
					  echo '<a href="?page=' . ($page + 1) . '"><i class="fa-solid fa-arrow-right"></i></a>';
					}
					
					echo '</div>';
					?>
					
			</div>

		</div>
		
		

	</div>

	<div class="footer">
			<p>Event Reviews &copy; <?php echo date('Y'); ?></p>
	</div>


</body>

</html>