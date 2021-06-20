<?php
   include('session.php');
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

    .column2 {
      float: left;
      width: 80%;
      padding: 30px;
      height: 100vh;
    }

    .column2 h1 {
      color:#c1502e;
    }
    
    .column2 a {
      color: red;
    }

    .column2 a:hover {
      color: blue;
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
        <h1>Admin Menu</h1>
        <h3>Welcome to the admin area, '<?php echo $uname; ?>'</h3> 
        <ul>
          <li><h4><a href="landing_page.php">Manage website contents</a></h4></li>
          <li><h4><a href="manage_admin_users.php">Manage Admin Users</a></h4></li>
          <li><h4><a href="logout.php">Logout</a></h4></li>
        </ul>
    </div>
</div>

</body>
</html>