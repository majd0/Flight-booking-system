<?php
require 'core.inc.php';
if(isset($_POST['submit'])){
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["file"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($FileType != "txt") {
      echo "Sorry, only TXT files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }

    $myFile = $target_file;
    $lines = file($myFile);
    foreach($lines as $line){
      $text = basename($line);
    }
    $first = strtok($text, '%%');

     $sql = "SELECT * FROM flight WHERE passInfo = '$first'";
     $result = $con->query($sql);
     $row = mysqli_fetch_array($result,MYSQLI_BOTH);
     $text .= $row[2];


    //fName lName mName
    for($i = 1;$i<=3;$i++){
      if(preg_match("/[[|][$]{".$i."}[a-zA-Z]+[$]{".$i."}[|]/", $text, $match)){
        preg_match("/[a-zA-Z]+/", $match[0], $regexx);
        $res[$i-1]= $regexx[0];
    } else $res[$i-1] = "NaN";
    }
    $fName = $res[0];
    $mName = $res[1];
    $lName = $res[2];

    //Nationality
    if(preg_match("/[[|][&]{1}[a-zA-Z]+[\s]*[a-zA-Z]*[&]{1}[|]/", $text, $match)){
      preg_match("/[a-zA-Z]+[\s]*[a-zA-Z]*/", $match[0], $regexx);
      $res[0]= $regexx[0];
    } else $res[0] = "NaN";
    $nationality = $res[0];

    //destination
    if(preg_match("/[[|][-][>][a-zA-Z]+[\s]*[a-zA-Z]*[-][>][|]/", $text, $match)){
      preg_match("/[a-zA-Z]+[\s]*[a-zA-Z]*/", $match[0], $regexx);
      $res[0]= $regexx[0];
    } else $res[0] = "NaN";
    $dest = $res[0];

    //ddept
    if(preg_match("/[[|][<][-][a-zA-Z]+[\s]*[a-zA-Z]*[<][-][|]/", $text, $match)){
      preg_match("/[a-zA-Z]+[\s]*[a-zA-Z]*/", $match[0], $regexx);
      $res[0]= $regexx[0];
    } else $res[0] = "NaN";
    $dep = $res[0];

    //Gender
    if(preg_match("/[[|][&]{2}[MF]+[&]{2}[|]/", $text, $match)){
      preg_match("/[a-zA-Z]+/", $match[0], $regexx);
      $res[0]= $regexx[0];
    } else $res[0] = "NaN";
    $gender = $res[0];

    //DOB
    if(preg_match("/[[|][&]{3}[0-9]{4}[-][0-9]{2}[-][0-9]{2}[&]{3}[|]/", $text, $match)){
      preg_match("/[0-9]{4}[-][0-9]{2}[-][0-9]{2}/", $match[0], $regexx);
        $DOB = $regexx[0];
      } else $DOB = "NaN";

    //passport Expiration
    if(preg_match("/[[|][#]{2}[0-9]{4}[-][0-9]{2}[-][0-9]{2}[#]{2}[|]/", $text, $match)){
      preg_match("/[0-9]{4}[-][0-9]{2}[-][0-9]{2}/", $match[0], $regexx);
        $pExp = $regexx[0];
      } else $pExp = "NaN";

    //Flight Date
    if(preg_match("/[[|][%]{2}[0-9]{4}[-][0-9]{2}[-][0-9]{2}[%]{2}[|]/", $text, $match)){
      preg_match("/[0-9]{4}[-][0-9]{2}[-][0-9]{2}/", $match[0], $regexx);
        $fDate = $regexx[0];
      } else $fDate = "NaN";
    //time
    if(preg_match("/[[|][%]{3}[0-9]{2}[:][0-9]{2}[%]{3}[|]/", $text, $match)){
      preg_match("/[0-9]{2}[:][0-9]{2}/", $match[0], $regexx);
        $time = $regexx[0];
      } else $time = "NaN";

    //Flight Number
    if(preg_match("/[[|][%]{1}[A-Z]{2}[0-9]{3}[%]{1}[|]/", $text, $match)){
      preg_match("/[A-Z]{2}[0-9]{3}/", $match[0], $regexx);
          $fNum = $regexx[0];
        } else $fNum = "NaN";

    //Passport Number
    if(preg_match("/[[|][#]{1}[0-9]{9}[#]{1}[|]/", $text, $match)){
      preg_match("/[0-9]{9}/", $match[0], $regexx);
          $pNum = $regexx[0];
        } else $pNum = "NaN";

    //gate
    if(preg_match("/[[|][*]{1}[0-9]{3}[*]{1}[|]/", $text, $match)){
      preg_match("/[0-9]{3}/", $match[0], $regexx);
          $gate = $regexx[0];
        } else $gate = "NaN";

    //seat
    if(preg_match("/[[|][*]{2}[0-9]{3}[*]{2}[|]/", $text, $match)){
      preg_match("/[0-9]{3}/", $match[0], $regexx);
          $seat = $regexx[0];
        } else $seat = "NaN";
      }
?>
<head>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
</head>
<a href="index.php">Export File</a><a href="import.php" style="margin-left:20px;">Import File</a><br><br>

<h1>Import File</h1>
<form action="" method="post" enctype="multipart/form-data">
  <label for="file">Filename:</label>
  <input type="file" name="file" id="file"><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
 if(isset($_POST['submit'])){
       echo "Inserted Language:<br> $text <br><br><br>";
?>
<h4>Data breakdown after being run through the syntax analyzer.</h4>
<table class="tg">
  <tr>
    <td class="tg-0lax">Name</td>
    <td class="tg-0lax"><?php echo "$fName $mName $lName"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Nationality</td>
    <td class="tg-0lax"><?php echo "$nationality"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Gender</td>
    <td class="tg-0lax"><?php echo "$gender"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Date of Birth</td>
    <td class="tg-0lax"><?php echo "$DOB"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Passport Number</td>
    <td class="tg-0lax"><?php echo "$pNum"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Passport Expiration</td>
    <td class="tg-0lax"><?php echo "$pExp"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Flight Number</td>
    <td class="tg-0lax"><?php echo "$fNum"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Destination</td>
    <td class="tg-0lax"><?php echo "$dest"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Departure</td>
    <td class="tg-0lax"><?php echo "$dep"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Flight Date</td>
    <td class="tg-0lax"><?php echo "$fDate"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Flight Time</td>
    <td class="tg-0lax"><?php echo "$time"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Gate</td>
    <td class="tg-0lax"><?php echo "$gate"; ?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Seat</td>
    <td class="tg-0lax"><?php echo "$seat"; ?></td>
  </tr>
</table>

<?php
}
?>
