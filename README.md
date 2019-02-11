Forum Website Version 1.0 Read-Me

Contributors: Suzi, Humza, and Tom

Date Created: 11/02/19 

1) Create github repository 
2) Create a HTML website with Styling 
3) Create HTML form and embed into website 
 ```
 
<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    <label>UserName  :</label><input type = "text" name = "UserName" class = "box"/><br /><br />
    <label>Password  :</label><input type = "password" name = "Password" class = "box" /><br/><br />
    <input type = "submit" value = " Submit "/><br />
    </form>
    
 ```

4)	Create database called forum, add two tables; users and topic1. Refer to “Database User fourms.PNG” and “Database structure Form.PNG”
5)	In users table, create attributes: UserID, username, password
6)	In topic table, create attribute: Topic ID and comment
7)	Create PHP config file include the following code 
```

<?php
	   define('DB_SERVER', 'localhost');
	   define('DB_USERNAME', 'root');
	   define('DB_PASSWORD', '');
	   define('DB_DATABASE', 'fourm');
	   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	   if($db === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	?>
  
  ```
  
8)	Create PHP login file include the following code:

```
<?php
	   include("config.php");
	   session_start();
	
	   
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
	      // username and password sent from form 
	       
	      $myuname = mysqli_real_escape_string($db,$_POST['UserName']);
	      $mypword = mysqli_real_escape_string($db,$_POST['Password']);
		  
	      $sql = "SELECT UserID FROM users WHERE Uname = '$myuname' and Pword = '$mypword'";
	      $result = mysqli_query($db,$sql);
	      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	      $active = $row['active'];
	      
	      $count = mysqli_num_rows($result);
	      
	      // If result matched $myusername and $mypassword, table row must be 1 row
			
	      if($count == 1) {
	         //$session_register("myuname");
			 $_SESSION['UserName']= $myuname;
	         $_SESSION['login_user'] = $myuname;
	         header("location: Homepage.html");
	      }else {
	         $error = "Your Login Name or Password is invalid";
	      }
	   }
	?>

```
