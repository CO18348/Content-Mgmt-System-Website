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
<div class="row">
  

  <div class="column2" style="background-color:#fbefcc;">
    <h1><strong>Our Mission</strong></h1>
    <?php
      $sql = "select content from pages where menu_name='Our Mission'";
      $result = $db->query($sql);
      $row = $result->fetch_assoc();
      echo $row["content"];
      
    ?>
</div>

</body>
</html>