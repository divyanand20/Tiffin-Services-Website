<?php

include("database.php");
$db= $conn;
$tableName="users";
$columns= ["user_id", "firstname","lastname","email","phone"];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"."";
$result = $db->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Welcome!</title>
  <meta name="keywords" content="free css template, XHTML, CSS, food blog template" />
  <meta name="description" content="Food Blog Template - free CSS website layout, XHTML CSS template" />
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
  <link href="css/action.css" rel="stylesheet"/>
  <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black; background-color: #cccccc; border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:bold;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
</head>
<body>
  <div>
<div class=navbar>
  <div class="desc">
  <h1>Users Data for the Tiffin Services</h1>
  </div>
  <div class="log">
    <a href="../index.php"><h2>Logout</h2></a>
  </div>
</div>

          <div class="table-section">
            <table class="tg">
            <thead>
              <tr>
               <th>User ID</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Phone Number</th>
               <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
          ?>
              <tr>
                <td class="tg-0lax"><?php echo $data["user_id"]??''; ?></td>
                <td class="tg-0lax"><?php echo $data["firstname"]??''; ?></td>
                <td class="tg-0lax"><?php echo $data["lastname"]??''; ?></td>
                <td class="tg-0lax"><?php echo $data["phone"]??''; ?></td>
                <td class="tg-0lax"><?php echo $data["email"]??''; ?></td>
              </tr>
              <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
            </tbody>
            </table>
          </div>
  </div>
</body>
</html>