<?php
include_once('public/config.php');
$sql = "select distinct * from subjects where visible='yes' order by id asc";
$result = mysqli_query($db,$sql);
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

    .column1 ul {
      list-style-type:square;
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
  <h1>Widget Corp</h1>
</div>

<div class="row">

  <div class="column1">
    <?php
      while($row = mysqli_fetch_assoc($result)) { 
      ?>
      <button type="button" class="collapsible"><span><?php echo $row["menu_name"]; ?></span></button>
      <?php
      $sub_id=$row["id"];
      $page = "select distinct pages.* from pages,subjects where pages.subject_id='".$sub_id."' and pages.visible='yes' order by pages.subject_id,pages.position asc";
      $result_page = mysqli_query($db,$page); ?>
      <ul style="list-style-type:square; display:none;">
      <?php
      while($row_page = mysqli_fetch_assoc($result_page)) { ?>
        <li><a href="pages.php?id=<?php echo $row_page["id"]; ?>"><?php echo $row_page["menu_name"]; ?></a></li>
      <?php }?>
      </ul>
      <?php }?>
  </div>
</div>

<script src="button.js"></script>
</body>
</html>