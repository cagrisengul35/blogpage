<!DOCTYPE html>
<html>
<head>

    <style>

    .admin-board {
        display: flex;
        align-items: center;
        background-color: lightblue;
        padding: 2rem;
    }

    .admin-board a {
        display: inline-block;
        margin-left: 5rem;
        margin-right: 5rem;
    }

    .admin-board form {
        display: inline-block;
    }

    .admin-board label {
        margin-right: 0.5rem;
        margin-left: 5rem;
    }

    </style>

</head>

<body>


    <?php 
    if(isset($_POST['submit'])){ 
        if (isset($_POST['new_admin'])) {
            $username = $_POST['new_admin'];
            // Check if the username is empty
            if (empty($username)) {
                echo "Please enter a username.";
                exit;
            }

            $sql = "UPDATE `users` SET `type`='admin' WHERE uname = '$username'";
    
            // Execute the query
            $result = $db->query($sql);
    

            } elseif (isset($_POST['banned_user'])) {
                $username = $_POST['banned_user'];
                // Check if the username is empty
                if (empty($username)) {
                    echo "Please enter a username.";
                    exit;
                }
        
                $sql = "UPDATE `users` SET `type`='banned' WHERE uname = '$username'";

                $result = $db->query($sql);
    
            }
        }
     ?>

    <div class="admin-board">
        <h3>Admin Panel:</h3>
        <p> <a href="newpost.php" >Add new Post</a> </p>

        <p>
            <label>Promote to Admin:</label>
            <form id="form" method="post">
            <input type="text" name="new_admin" id="new_admin">
            <input type="submit" name="submit">
            </form>
        </p>

        <p>
        <label>Ban User:</label>
        <form id="form" method="post">
        <input type="text" name="banned_user" id="banned_user">
        <input type="submit" name="submit">
        </form>
        </p>
    </div>

</body>
</html>