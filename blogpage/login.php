<!DOCTYPE html>
<html>

<head>

    <?php require_once('config.php') ?>

    <link rel="stylesheet" href="css/generalcss.css">
    <link rel="stylesheet" href="css/login.css">
    

</head>

<body>

    <?php
    $message = "Enter credentials!";

    if (isset($_POST["submit"])) {

        $uname = $_POST["uname"];
        $upass = $_POST["upass"];
    

        $stmt = $db->prepare("SELECT * FROM users WHERE uname=? AND upass=?");

        $stmt->bind_param("ss", $uname, $upass);

        $stmt->execute();

        $result = $stmt->get_result();
    
        if ($result !== false && $result->num_rows > 0) {

            $message = "Username and password is true!";
    
            $_SESSION['username'] = $uname;
            $_SESSION['usertype'] = mysqli_fetch_assoc($result)['type'];
            $_SESSION['loggedin'] = true;
    
            $result->close();

            header("Location: index.php");
        } else {
            $message = "Username or password is wrong!";
        }
    }
    
    ?>

    <div class="login-form" style="margin-left:38vw; margin-top:150px;">

        <p> <a href="index.php" >Return to Main Page</a> </p>

        <form  method="post">
            <p>Username:</p>
            <input type="text" id="uname" name="uname" placeholder="Enter username" required>
            <br>
            <p>Password:</p>
            <input type="password" id="upass" name="upass" placeholder="Password" required>
            <br>
            <p></p>
            <button type="submit" name="submit" value="LOGIN">SUBMIT</button>
            <p><?php echo $message; ?></p>
            
        </form>
    </div>

</body>
</html>