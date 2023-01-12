<?php require('config.php');

$stmt = $db->query("SELECT post_id, post_title, post_content, post_date FROM posts WHERE post_id = '$_GET[id]'");
$row = $stmt->fetch_assoc();

//if post does not exists redirect user.
if($row['post_id'] == ''){
    header('Location: ./');
    exit;
}

?>
<!DOCTYPE html>
<head>

    <link rel="stylesheet" href="css/generalcss.css">
    <link rel="stylesheet" href="css/viewpost.css">
    
    <?php require_once('navbar.php') ?>
    
</head>
<body>
    <?php require_once('timeline.php'); ?>
    <div class="content">

        <hr id="post-hr">
        <?php
            echo '<div class:"post-body">';
                echo '<h1>'.$row['post_title'].'</h1>';
                echo '<p>Posted on '.date('jS M Y', strtotime($row['post_date'])).'</p>';
                echo '<p>'.$row['post_content'].'</p>';
            echo '</div>';
        ?>

    </div>

    <div class="footer">
			<p>Event Reviews &copy; <?php echo date('Y'); ?></p>
	</div>

</body>
</html>