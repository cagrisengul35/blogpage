<!DOCTYPE html>
<head>
    <?php require_once('config.php') ?>

    <?php if (!isset($_SESSION['usertype'])){
		header("Location: mainpage.php");
	}?>

	<link rel="stylesheet" href="css/generalcss.css">
    <link rel="stylesheet" href="../node_modules/tinymce/skins/ui/oxide/skin.min.css">

    
    <style>
        .content{width:70%}
        textarea{width:97%}
    </style>

    <script src="../node_modules/tinymce/tinymce.min.js"></script>
    

</head>
<body>

    
	<?php require_once('navbar.php') ?>

    <div style="float:right; width:300px; margin-top:120px;" class="instructions">
        <hr>
        <h3>Instructions</h3>
        <ul">
            <li>Only include English characters</li>
            <li>Preview Image should be the size of 300x300px</li>
            <li>You can add images inside the text</li>
        </ul>
    </div>

    <?php
    if(isset($_POST['submit'])){ 
        $post_title = $_POST['post_title'];
        $post_img = $_POST['post_img'];
        $post_desc = $_POST['post_desc'];
        $post_content = $_POST['post_content'];

        $sql = "INSERT INTO posts (post_title , post_img , post_desc , post_content , post_date) VALUES ('$post_title', '$post_img' ,'$post_desc', '$post_content', '" . date('Y-m-d H:i:s') . "')";

        // Execute the query
        $db->query($sql);

        header("Location: mainpage.php");
        exit;
     }?>

    <form class="content" method='post'>

        <p><label>Title</label><br />
        <textarea name='post_title' cols='150' rows='1'> </textarea></p>
    
        <p><label>Image Link</label><br />
        <textarea name='post_img' cols='150' rows='1'> </textarea></p>
    
        <p><label>Description</label><br />
        <textarea name='post_desc' cols='150' rows='5'> </textarea></p>
    
        <p><label>Content</label><br />
        <textarea id='post-content' name='post_content' cols='150' rows='55'> </textarea></p>
    
        <p><input class='button' type='submit' name='submit' value='Submit'></p>
    
    </form>

    <script>
    tinymce.init({
        selector: '#post-content', 
        plugins: 'link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code',
        statusbar: false,
    });
    type='text/javascript'
    </script>

</body>



