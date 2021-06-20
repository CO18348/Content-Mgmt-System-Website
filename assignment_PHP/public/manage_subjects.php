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
  <div class="col"><h1>Manage Subject</h1>
    <?php
      require_once('config.php');
      $id=$_REQUEST['id'];
      $sql = "select * from subjects where id='$id'";
      $result = $db->query($sql);
      $row = $result->fetch_assoc();
      if ($result->num_rows > 0) {
          echo "<h3>Menu name: ".$row["menu_name"]."</h3>";
          echo "<h3>Position : ".$row["position"]."</h3>";
          echo "<h3>Visible : ".$row["visible"]."</h3>";
      } else {
          echo "0 results";
      }
    ?>
    <a href="edit_subjects.php?id=<?php echo $row["id"]; ?>">Edit Subject</a>
    <br><br>
    <hr style=" border: 1px solid black; border-radius: 5px; width: 50%; margin-left: 0%">
    <h1>Pages in this subject:</h1>
    <?php 
    $query= "select distinct pages.* from subjects,pages where pages.subject_id='$id'";
    $result = $db->query($query);
    while($row2 = mysqli_fetch_assoc($result)) { ?>
    <ul>
    <li><a href="edit_page.php?id=<?php echo $row2["id"]; ?>"><?php echo $row2["menu_name"]; ?></a></li>
    </ul>
    <?php } ?>
    <br>
    &#x2b;&nbsp;&nbsp;<a href="add_page.php?id=<?php echo $row["id"]; ?>">Add a new page to this subject</a>
  </div>
</div>
</body>
</html>