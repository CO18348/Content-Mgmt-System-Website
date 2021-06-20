<?php
require_once('config.php');
$nameErr  =$idErr  = $visibleErr = $positionErr = $subjectErr = "";
$menu_name = $position = $visible = $content = "";
$id=$_REQUEST['id'];
$sql1 = "select * from subjects where id='$id'";
$result1 = $db->query($sql1);
$row1 = $result1->fetch_assoc();
$menu = $row1["menu_name"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["subject_id"])) {
    $subjectErr = "Subject-id is required";
  } 
  
  if (empty($_POST["menu_name"])) {
    $nameErr = "Name is required";
  } 

  if (empty($_POST["position"])) {
    $positionErr = "Position is required";
  } 
  

  if (empty($_POST["content"])) {
    $content = "";
  }
  
  if (empty($_POST["visible"])) {
    $visibleErr = "Visibility is required";
  }
}

?>
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
    .error {
        color: #FF0000;
    }
    </style>
</head>
<body>  

<?php include 'template_admin.php';?>
<div class="row">
  <div class="column2" style="background-color:#fbefcc;">
    <div class="col"><h1>Add Page in <?php echo $row1["id"] ?>: <?php echo $row1["menu_name"] ?></h1>
      <p><span class="error">* required field</span></p>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <input type="hidden" name="id"> 
        Subject id: <input type="text" name="subject_id" id="subject_id">
        <span class="error">* <?php echo $subjectErr;?></span>
        <br><br>
        Menu Name: <input type="text" name="menu_name" id="menu_name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        Position:
        <input type="number" id="position" name="position" min="1"><span class="error">* <?php echo $positionErr;?></span>
        <br><br>
        Visible:
        <input type="radio" name="visible" id="visible" value="no">No
        <input type="radio" name="visible" id="visible" value="yes">Yes
        <span class="error">* <?php echo $visibleErr;?></span>
        <br><br>
        Content:<br>
        <textarea name="content" id="content" rows="10" cols="130"></textarea>
        <br><br>
        
        <br>
        <input type="submit" name="Addpage" value="Add page">  
        <br><br>
        <a href="landing_page.php" style="color:#c1502e;">Cancel</a>
        <?php 
          if(isset($_POST['Addpage']))
          {
            $ins_query="insert into pages(subject_id,menu_name,position,visible,content) 
            values ('".$_POST["subject_id"]."','".$_POST["menu_name"]."','".$_POST["position"]."','".$_POST["visible"]."','".$_POST["content"]."')";
            $result = mysqli_query($db, $ins_query);
            if(!$result) 
                  { echo mysqli_error(); }
          }
        ?>
      </form>
      </div>
  </div>
</div>
</body>
</html>