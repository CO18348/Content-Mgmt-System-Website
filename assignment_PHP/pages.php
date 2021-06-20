<!DOCTYPE HTML>  
<html>
<head>
    <style>
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

<?php include 'template.php';?>
<?php
  $id=$_REQUEST["id"];
  $sql = "select * from pages where id='$id'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
?> 
<div class="row">
  

  <div class="column2" style="background-color:#fbefcc;">
    <h1><strong><?php echo $row["menu_name"] ?></strong></h1>
    <?php
      echo $row["content"];
      
    ?>
</div>

</body>
</html>