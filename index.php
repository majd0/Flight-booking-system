<?php
require 'core.inc.php';
if(isset($_POST['mName'])){
$name = "|$".$_POST['fName']."$|$$".$_POST['mName']."$$|$$$".$_POST['lName']."$$$|";
$passport= "#".$_POST['pNum']."#|##".$_POST['pExp']."##|";
$personal = "&".$_POST['nationality']."&|&&".$_POST['gender']."&&|&&&".$_POST['DOB']."&&&|";
$fDaTa = "%%".$_POST['fDate']."%%|%%%".$_POST['fTime']."%%%|";
$DD = "<-".$_POST['dep']."<-|->".$_POST['dest']."->|";
$regex = $name.$passport.$personal.$fDaTa.$DD;
$fileName = $_POST['fName'];
$file = "$fileName.txt";
$txt = fopen($file, "w") or die("Unable to open file!");
fwrite($txt, $regex);
fclose($txt);
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename='.basename($file));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
header("Content-Type: text/plain");
readfile($file);
$userT = $name.$passport.$personal;
$username = "GUEST";
$email = $_POST['email'];
$con->query("INSERT INTO user VALUES('$username','$userT','$email')");
$fNum = "%".chr(rand(65,90))."".chr(rand(65,90))."".rand(0,999)."%|";
$GS = "*".rand(100,999)."*|**".rand(100,999)."**|";
$flightT = "|".$DD.$fNum.$fDaTa.$GS;

$con->query("INSERT INTO flight (passInfo,flightInfo,username) VALUES ('$userT','$flightT','$username')");
}
 ?>
 <a href="index.php">Export File</a><a href="import.php" style="margin-left:20px;">Import File</a><br><br>

 <h1>Export File</h1>
<form class="" action="" method="post">
  <label>First Name: </label><input type="text" name="fName" placeholder="First Name" value="" ><br>
  <label>Middle Name: </label><input type="text" name="mName" placeholder="Middle Name" value="" ><br>
  <label>Last Name: </label><input type="text" name="lName" placeholder="Last Name" value=""><br>
  <label>Passport Number: </label><input type="text" name="pNum" placeholder="Passport Number" value=""><br>
  <label>Passport Expiration: </label><input type="date" name="pExp" placeholder="Passport Expiration" value=""><br>
  <label>Nationality: </label><select name="nationality">
    <option value="afghan">Afghanistan</option>
    <option value="albanian">Albanian</option>
    <option value="algerian">Algerian</option>
    <option value="american">American</option>
    <option value="andorran">Andorran</option>
    <option value="angolan">Angolan</option>
    <option value="antiguans">Antiguans</option>
    <option value="argentinean">Argentinean</option>
    <option value="armenian">Armenian</option>
    <option value="australian">Australian</option>
    <option value="austrian">Austrian</option>
    <option value="azerbaijani">Azerbaijani</option>
    <option value="bahamian">Bahamian</option>
    <option value="bahraini">Bahraini</option>
    <option value="bangladeshi">Bangladeshi</option>
    <option value="barbadian">Barbadian</option>
    <option value="barbudans">Barbudans</option>
    <option value="batswana">Batswana</option>
    <option value="belarusian">Belarusian</option>
    <option value="belgian">Belgian</option>
    <option value="belizean">Belizean</option>
    <option value="beninese">Beninese</option>
    <option value="bhutanese">Bhutanese</option>
    <option value="bolivian">Bolivian</option>
    <option value="bosnian">Bosnian</option>
    <option value="brazilian">Brazilian</option>
    <option value="british">British</option>
    <option value="bruneian">Bruneian</option>
    <option value="bulgarian">Bulgarian</option>
    <option value="burkinabe">Burkinabe</option>
    <option value="burmese">Burmese</option>
    <option value="burundian">Burundian</option>
    <option value="cambodian">Cambodian</option>
    <option value="cameroonian">Cameroonian</option>
    <option value="canadian">Canadian</option>
    <option value="cape verdean">Cape Verdean</option>
    <option value="central african">Central African</option>
    <option value="chadian">Chadian</option>
    <option value="chilean">Chilean</option>
    <option value="chinese">Chinese</option>
    <option value="colombian">Colombian</option>
    <option value="comoran">Comoran</option>
    <option value="congolese">Congolese</option>
    <option value="costa rican">Costa Rican</option>
    <option value="croatian">Croatian</option>
    <option value="cuban">Cuban</option>
    <option value="cypriot">Cypriot</option>
    <option value="czech">Czech</option>
    <option value="danish">Danish</option>
    <option value="djibouti">Djibouti</option>
    <option value="dominican">Dominican</option>
    <option value="dutch">Dutch</option>
    <option value="east timorese">East Timorese</option>
    <option value="ecuadorean">Ecuadorean</option>
    <option value="egyptian">Egyptian</option>
    <option value="emirian">Emirian</option>
    <option value="equatorial guinean">Equatorial Guinean</option>
    <option value="eritrean">Eritrean</option>
    <option value="estonian">Estonian</option>
    <option value="ethiopian">Ethiopian</option>
    <option value="fijian">Fijian</option>
    <option value="filipino">Filipino</option>
    <option value="finnish">Finnish</option>
    <option value="french">French</option>
    <option value="gabonese">Gabonese</option>
    <option value="gambian">Gambian</option>
    <option value="georgian">Georgian</option>
    <option value="german">German</option>
    <option value="ghanaian">Ghanaian</option>
    <option value="greek">Greek</option>
    <option value="grenadian">Grenadian</option>
    <option value="guatemalan">Guatemalan</option>
    <option value="guinea-bissauan">Guinea-Bissauan</option>
    <option value="guinean">Guinean</option>
    <option value="guyanese">Guyanese</option>
    <option value="haitian">Haitian</option>
    <option value="herzegovinian">Herzegovinian</option>
    <option value="honduran">Honduran</option>
    <option value="hungarian">Hungarian</option>
    <option value="icelander">Icelander</option>
    <option value="indian">Indian</option>
    <option value="indonesian">Indonesian</option>
    <option value="iranian">Iranian</option>
    <option value="iraqi">Iraqi</option>
    <option value="irish">Irish</option>
    <option value="italian">Italian</option>
    <option value="ivorian">Ivorian</option>
    <option value="jamaican">Jamaican</option>
    <option value="japanese">Japanese</option>
    <option value="jordanian">Jordanian</option>
    <option value="kazakhstani">Kazakhstani</option>
    <option value="kenyan">Kenyan</option>
    <option value="kittian and nevisian">Kittian and Nevisian</option>
    <option value="kuwaiti">Kuwaiti</option>
    <option value="kyrgyz">Kyrgyz</option>
    <option value="laotian">Laotian</option>
    <option value="latvian">Latvian</option>
    <option value="lebanese">Lebanese</option>
    <option value="liberian">Liberian</option>
    <option value="libyan">Libyan</option>
    <option value="liechtensteiner">Liechtensteiner</option>
    <option value="lithuanian">Lithuanian</option>
    <option value="luxembourger">Luxembourger</option>
    <option value="macedonian">Macedonian</option>
    <option value="malagasy">Malagasy</option>
    <option value="malawian">Malawian</option>
    <option value="malaysian">Malaysian</option>
    <option value="maldivan">Maldivan</option>
    <option value="malian">Malian</option>
    <option value="maltese">Maltese</option>
    <option value="marshallese">Marshallese</option>
    <option value="mauritanian">Mauritanian</option>
    <option value="mauritian">Mauritian</option>
    <option value="mexican">Mexican</option>
    <option value="micronesian">Micronesian</option>
    <option value="moldovan">Moldovan</option>
    <option value="monacan">Monacan</option>
    <option value="mongolian">Mongolian</option>
    <option value="moroccan">Moroccan</option>
    <option value="mosotho">Mosotho</option>
    <option value="motswana">Motswana</option>
    <option value="mozambican">Mozambican</option>
    <option value="namibian">Namibian</option>
    <option value="nauruan">Nauruan</option>
    <option value="nepalese">Nepalese</option>
    <option value="new zealander">New Zealander</option>
    <option value="ni-vanuatu">Ni-Vanuatu</option>
    <option value="nicaraguan">Nicaraguan</option>
    <option value="nigerien">Nigerien</option>
    <option value="north korean">North Korean</option>
    <option value="northern irish">Northern Irish</option>
    <option value="norwegian">Norwegian</option>
    <option value="omani">Omani</option>
    <option value="pakistani">Pakistani</option>
    <option value="palauan">Palauan</option>
    <option value="palestine">Palestine</option>
    <option value="panamanian">Panamanian</option>
    <option value="papua new guinean">Papua New Guinean</option>
    <option value="paraguayan">Paraguayan</option>
    <option value="peruvian">Peruvian</option>
    <option value="polish">Polish</option>
    <option value="portuguese">Portuguese</option>
    <option value="qatari">Qatari</option>
    <option value="romanian">Romanian</option>
    <option value="russian">Russian</option>
    <option value="rwandan">Rwandan</option>
    <option value="saint lucian">Saint Lucian</option>
    <option value="salvadoran">Salvadoran</option>
    <option value="samoan">Samoan</option>
    <option value="san marinese">San Marinese</option>
    <option value="sao tomean">Sao Tomean</option>
    <option value="saudi">Saudi</option>
    <option value="scottish">Scottish</option>
    <option value="senegalese">Senegalese</option>
    <option value="serbian">Serbian</option>
    <option value="seychellois">Seychellois</option>
    <option value="sierra leonean">Sierra Leonean</option>
    <option value="singaporean">Singaporean</option>
    <option value="slovakian">Slovakian</option>
    <option value="slovenian">Slovenian</option>
    <option value="solomon islander">Solomon Islander</option>
    <option value="somali">Somali</option>
    <option value="south african">South African</option>
    <option value="south korean">South Korean</option>
    <option value="spanish">Spanish</option>
    <option value="sri lankan">Sri Lankan</option>
    <option value="sudanese">Sudanese</option>
    <option value="surinamer">Surinamer</option>
    <option value="swazi">Swazi</option>
    <option value="swedish">Swedish</option>
    <option value="swiss">Swiss</option>
    <option value="syrian">Syrian</option>
    <option value="taiwanese">Taiwanese</option>
    <option value="tajik">Tajik</option>
    <option value="tanzanian">Tanzanian</option>
    <option value="thai">Thai</option>
    <option value="togolese">Togolese</option>
    <option value="tongan">Tongan</option>
    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
    <option value="tunisian">Tunisian</option>
    <option value="turkish">Turkish</option>
    <option value="tuvaluan">Tuvaluan</option>
    <option value="ugandan">Ugandan</option>
    <option value="ukrainian">Ukrainian</option>
    <option value="uruguayan">Uruguayan</option>
    <option value="uzbekistani">Uzbekistani</option>
    <option value="venezuelan">Venezuelan</option>
    <option value="vietnamese">Vietnamese</option>
    <option value="welsh">Welsh</option>
    <option value="yemenite">Yemenite</option>
    <option value="zambian">Zambian</option>
    <option value="zimbabwean">Zimbabwean</option>
  </select>
  <br><label>Gender: </label><input type="radio" name="gender" value="M" checked>Male <input type="radio" name="gender" value="F">Female <br>
  <label>Date of Birth: </label><input type="date" name="DOB" placeholder="" value="" ><br>
  <label>Flight Date: </label><input type="date" name="fDate" placeholder="" value="" ><br>
  <label>Flight Time: </label><input type="time" name="fTime" placeholder="" value="" ><br>
  <label>From: </label><input type="text" name="dep" placeholder="" value="" ><br>
  <label>To: </label><input type="text" name="dest" placeholder="" value="" ><br>
  <label>email: </label><input type="email" name="email" placeholder="" value="" ><br><br>
<input type="submit" name="" value="Submit">



  <!-- <label>Gate: </label><input type="text" name="gate" placeholder="" value=""><br>
  <input type="text" name="" placeholder="" value=""><br>
  <input type="text" name="" placeholder="" value=""><br> -->


</form>
