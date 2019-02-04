<!DOCTYPE html>
<html>
<!-------------------------------------------------- Head of HTML File --------------------------------------------------------------------->
<head>
  <title>Forum - Login Page</title>
  <meta charset="UFT-8">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="fonts.css/"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"!important></script>
</head>

<!-------------------------------------------------- Body of HTML File -------------------------------------------------------------------->
<div class="container">
<body>
<!-------------------------------------------------- Body of HTML File -------------------------------------------------------------------->
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['Username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['Password']); 
      
      $sql = "SELECT id FROM users WHERE Username = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: Homepage.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!-------------------------------------------------- Header - Company Branding & Accounts Navigation -------------------------------------->
     <header class="container">
        <div class="row">
            <img src="https://seeklogo.com/images/F/Forum-logo-6948026C4B-seeklogo.com.png" height="100"/>         
        </div>
    </header>
<!-------------------------------------------------- Navigation Bar - Home, Store, Contact, Search, & Basket ------------------------------>  
<div class="topnav">
  <a href="Homepage.html">Home</a>
  <a href="Topic1Page.html">Topic 1</a>
  <a href="Topic2Page.html">Topic 2</a>
  <a href="Topic3Page.html">Topic 3</a>
<div class="search-container">
  <form action="/action_page.php">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
</div>
    <p><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></p>
</div>
<!-------------------------------------------------- Jumbotron -  ------------------------------------------------------------------------>

    <section class="jumbotron">
    <div class="container">
    <div class="row text-center">
    	<h2>Sign in or Register to view the Forum!</h2>
    </div>
    </div>  
</section>
    
 <!-------------------------------------------------- Sections --------------------------------------------------------------------------->   
    <div class="container">
        
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
    <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
    <input type = "submit" value = " Submit "/><br />
    </form>
        
    </div>
<!-------------------------------------------------- Footer - Copyright ------------------------------------------------------------------->
<footer class="container">
  <div class="row">
    <p class="col-sm-6">&copy; 2019 Forum</p>
  </div>
</footer>

</body>
</div>
</html>