<?php require('connection.php'); session_start(); ?>
<!DOCTYPE html>
<head>
  <title>User - Login and Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Welcome</h1>
    <nav>
      <a href="#">HOME</a>
      <a href="#">CONTACT</a>
      <a href="#">ABOUT US</a>
    </nav>
    <div class='sign-in-up'>
        <?php 
            if(isset($_SESSION['user_id'])){ 
                echo "<a href='logout.php'>Logout</a>"; 
            } 
        ?>
    </div>
  </header>
  
  <?php 
    if(isset($_SESSION['username'])){ 
        echo "<center><h1><br>Welcome to our UserDashboard,<br>" . $_SESSION['username'] . "</h1></center>"; // Print the username
        
    }
    else
    {
        echo "Please login to access the Dashboard";    
    }
  ?>

  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>

</body>
</html>