<!DOCTYPE HTML>  
<html>
<head>
    <style>
    .col {
        margin: 0px;
    }
    .col a {
      color:#c1502e;
    }
    .col div {
      text-align: center;
      display:inline; 
      border:1px black solid; 
      padding: 10px;
    }
    </style>
</head>
<body>  

<?php include 'template_admin.php';?>
<div class="row">
<div class="column2" style="background-color:#fbefcc;">
  <div class="col"><h1>Manage Page</h1>
    <?php
      require_once('config.php');
      $id=$_REQUEST['id'];
      $sql = "select * from pages where id='$id'";
      $result = $db->query($sql);
      $row = $result->fetch_assoc();
      if ($result->num_rows > 0) {
          echo "<h3>Menu name: ".$row["menu_name"]."</h3>";
          echo "<h3>Position : ".$row["position"]."</h3>";
          echo "<h3>Visible : ".$row["visible"]."</h3>";
          echo "<h3>Content : </h3>";
          echo "<div>".$row["content"]."</div><br><br>";
      } else {
          echo "0 results";
      }
    ?>
    <br>
    <a href="edit_page.php?id=<?php echo $row["id"]; ?>">Edit Page</a>
  </div>
</div>
</body>
</html>