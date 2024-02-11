<?php require('connection.php');?>
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
      <button type='button' onclick="popup('login-popup')">LOGIN</button>
      <button type='button' onclick="popup('register-popup')">REGISTER</button>
    </div>
  </header>
  

  <div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER LOGIN</span>      
          <button type="reset" onclick="">X</button>
        </h2>
        <input type="text" placeholder="E-mail or Username" name="email_username" required>
        <input type="password" placeholder="Password" name="password" required maxlength = "20" required minlength="6">
        <button type="submit" class="login-btn" name="login">LOGIN</button>
        
        </h2>
      </form>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="">X</button>
        </h2>
<input type="text" name="fullname" onkeydown="return /[a-z]/i.test(event.key)"
    onblur="if (this.value == ' ') {this.value = '';}"
    onfocus="if (this.value == ' ') {this.value = '';}"placeholder="FirstName"/>
        <input type="text" placeholder="Username*" name="username" maxlength = "10">
        <input type="email" placeholder="E-mail*" name="email" required>
        <input type="password" placeholder="Password*" name="password" required maxlength = "10" minlength="1">
        <input type="password" placeholder="CPassword*" name="password" required>
        <button type="submit" class="register-btn" name="register" onclick="redirectToRegister()">REGISTER</button>
       
      </form>
    </div>
  </div>

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