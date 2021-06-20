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
        <div class="col"><h1>Manage Admins</h1>
        <?php
            include_once('config.php');

            $sql = "select * from admins";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Username</th><th>Actions</th></tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["username"]. " " . "</td> <td><a href='edit_admins.php?id=" . $row["id"]. "'>Edit</a>&nbsp;&nbsp;<a href='delete_admins.php?id=" . $row["id"]. "'>Delete</a></td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $db->close();
        ?>
    <br>
     &#x2b;&nbsp;&nbsp;<a href="add_admin.php?id=<?php echo $row["id"]; ?>">Add a new admin</a><br><br>

        
    </div>
</div>

</script>
</body>
</html>