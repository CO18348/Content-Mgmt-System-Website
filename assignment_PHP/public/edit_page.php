<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once('config.php');
$id=$_REQUEST["id"];
$sql = "select * from pages where id='$id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$menu_name = $_REQUEST["menu_name"];
$visible = $_REQUEST["visible"];
$position = $_REQUEST["position"];
$content = $_REQUEST["content"];
// define variables and set to empty values
$nameErr  = $visibleErr = $positionErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
if(isset($_POST['Edit Page']))
{
$update="update pages set menu_name='".$menu_name."',position='".$position."', visible='".$visible."',
content='".$content."' where id='$id'";
mysqli_query($db, $update) or die(mysqli_error());
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
    </style>
</head>
<body>  

<?php include("template_admin.php")?>
<div class="row">
    <div class="column2" style="background-color:#fbefcc;">
        <div class="col"><h1>Edit Page: <?php echo $menu_name ?></h1>
        <p><span class="error">* required field</span></p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <input type="hidden" name="id" value="<?php echo $id;?>"> 
            Menu Name: <input type="text" name="menu_name" value="<?php echo $menu_name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <br><br>
            Position:
            <input type="number" id="position" name="position" min="1" value="<?php echo $position;?>"><span class="error">* <?php echo $positionErr;?></span>
            <br><br>
            Visible:
            <input type="radio" name="visible" <?php if (isset($visible) && $visible=="no") echo "checked";?> value="no">No
            <input type="radio" name="visible" <?php if (isset($visible) && $visible=="yes") echo "checked";?> value="yes">Yes
            <span class="error">* <?php echo $visibleErr;?></span>
            <br><br>
            Content:<br>
            <textarea name="content" rows="10" cols="130"><?php echo $content;?></textarea>
            <br><br>
            
            <br>
            <input type="submit" name="Edit Page" value="Edit page">  
            <br><br>
            <a href="landing_page.php" style="color:#c1502e;">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="delete.php?id=<?php echo $id; ?>" style='color:#c1502e;'>Delete page</a>
            </form>
        

        </div>
    </div>
</div>

</script>
</body>
</html>