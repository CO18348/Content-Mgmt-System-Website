<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once('config.php');
$id=$_REQUEST['id'];
$sql = "select * from admins where id='$id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$username = $_REQUEST["username"];
$hashed_password = $_REQUEST["hashed_password"];
$nameErr  = $passErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
  }
  if (empty($_POST["hashed_password"])) {
    $passErr = "Password is required";
  }

}

?>


<!DOCTYPE HTML>  
<html>
<head>
    <style>
    
    * {
      box-sizing: border-box;
    }

    .header {
      padding: 10px 30px;
      background: #034f84;
      color: white;
    }
    /* Create two equal columns that floats next to each other */
    .column1 {
      float: left;
      width: 20%;
      padding: 30px;
      background-color:#c1502e;
      height: 100vh;
      color: white;
    }

    .column1 a{
      color: white;
      text-decoration: none;
    }

    .column1 a:hover {
      font-weight: bold;
    }
    .collapsible {
      background-color: #c1502e;
      color: white;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
    }
    .column2 {
      float: left;
      width: 80%;
      padding: 30px;
      height: 100vh;
    }

    .column2 h1 {
      color:#c1502e;
    }
    
    td, th {
        width: 300px;
        text-align: left;
    }
    .error {
        color: #FF0000;
    }
    .col a {
      color:#c1502e;
    }
    </style>
</head>
<body>  

<div class="header">
  <h1>Widget Corp Admin</h1>
</div>
<div class="row">
<div class="column1">
    <button type="button" class="collapsible"><a href="admin.php">&#x2b; Main Menu</a></button><br><br>
</div>
    <div class="column2" style="background-color:#fbefcc;">
        <div class="col"><h1>Add Subject</h1>
        <p><span class="error">* required field</span></p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <input type="hidden" name="id" value="<?php echo $id;?>"> 
            Username: <input type="text" name="username" value="<?php echo $username;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <br><br>
            Password:
            <input type="text" id="hashed_password" name="hashed_password" value="<?php echo $hashed_password;?>">
            <span class="error">* <?php echo $passErr;?></span>
            <br><br>
           
            <br><br>
            
            <br>
            <input type="submit" name="AddAdmin" value="Add Admin"/>  
            
            <br><br>
            <a href="landing_page.php" style="color:#c1502e;">Cancel</a>
            </form>
            <?php 
          if(isset($_POST['AddAdmin']))
          {
            $sub=$row1["id"];
            $ins_query="insert into admins(username,hashed_password) 
            values ('".$_POST["username"]."','".$_POST["hashed_password"]."')";
            $result = mysqli_query($db, $ins_query);
            if(!$result) 
                  { echo mysqli_error($db); }
          }
        ?>

        </div>
    </div>
</div>

</script>
</body>
</html>