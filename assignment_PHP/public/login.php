<?php
include "config.php";
session_start();
if(isset($_POST['but_submit'])){

    $username = mysqli_real_escape_string($db,$_POST['uname']);
    $password = mysqli_real_escape_string($db,$_POST['psw']);

    if ($username != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from admins where username='".$username."' and hashed_password='".$password."'";
        $result = mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $username;
            header('Location: /assignment_PHP/public/admin.php');
            exit;
        }else{
            echo "Invalid username and password";
        }

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
    
    </style>
</head>
<body>  

<div class="header">
  <h1>Widget Corp Admin</h1>
</div>

<div class="row">
  <div class="column1">
  </div>

    <div class="column2" style="background-color:#fbefcc;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="uname"><b>Username: </b></label>
            <input type="text" name="uname" id="uname" required><br><br>

            <label for="psw"><b>Password: </b></label>
            <input type="password" name="psw" id="psw"><br><br>
                
            <button type="submit" name="but_submit" id="but_submit">Submit</button>
        </form>

    </div>
</div>


</body>
</html>