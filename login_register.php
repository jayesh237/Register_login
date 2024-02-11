<?php
require('connection.php');


# for login
if (isset($_POST['login'])) {
    $query = "SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result = mysqli_query($con, $query);  
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            //print_r($result_fetch);die;
           //echo  $_POST['password']."md5->".md5($_POST['password']) ."==". $result_fetch['password'];die;
            if (md5($_POST['password']) == $result_fetch['password']){
                session_start();
                $_SESSION['user_id'] = $result_fetch['id'];
                 $_SESSION['username'] = $result_fetch['username'];
                echo "<script>
                window.location.href='dashboard.php';
                </script>";
            } else {
                // Incorrect password
                echo "<center>Password is incorrect!</center>";
                
            }
        } else {
            echo "
            <script>
            alert('Email or username not registered');
            window.location.href='index.php';
            </script>";
        }
    } else {
        echo "
        <script>
        alert('Cannot run query');
        window.location.href='index.php';
        </script>";
    }
}

# for registration
if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM `registered_users` WHERE `username` = '$_POST[username]' OR `email` = '$_POST[email]'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            # if any user already using email or username
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['username'] == $_POST['username']) {
                # error for username already registered
                echo "
                <script>alert('$result_fetch[username] - Username already registered');
                window.location.href='index.php';
                </script>";
            } else {
                # error for email already in use
                echo "
                <script>alert('$result_fetch[email] - E-mail already registered');
                window.location.href='index.php';
                </script>";
            }
        } else {
            //print_r($_POST);die;
            # it will be executed if no one has taken uname or email
            $password = md5($_POST['password']);
            $query = "INSERT INTO `registered_users` (`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
            
            //echo $query;die;
            if (mysqli_query($con, $query)) {
                # if data inserted successfully
                echo "
                <script>alert('Registration successful');
                window.location.href='index.php';
                </script>";
            } else {
                # if data cannot be inserted
                echo "
                <script>alert('Cannot run query');
                window.location.href='index.php';
                </script>";
            }
        }
    } else {
        echo "
        <script>alert('Cannot run query');
        window.location.href='index.php';
        </script>";
    }
}
?>
