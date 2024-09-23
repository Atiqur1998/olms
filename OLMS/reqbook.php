<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
    else{
if(isset($_POST['submit']))
{
   
$at1=$_POST['FullName'];
$Stid=$_POST['class'];
$Aid=$_POST['MobileNumber'];
$EmailId=$_POST['EmailId'];
$comment=$_POST['comment'];



$sql="INSERT INTO reqbd(bookid,Stdname,Mobileno,EmailId,comment) VALUES(:Stid,:at1,:Aid,:EmailId,:comment)";

$query = $dbh->prepare($sql);
$query->bindParam(':Stid',$Stid,PDO::PARAM_STR);
$query->bindParam(':Aid',$Aid,PDO::PARAM_STR);
$query->bindParam(':at1',$at1,PDO::PARAM_STR);
$query->bindParam(':EmailId',$EmailId,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Book Requested successfully..!');</script>";
 //header("location:reqbookinfo.php");

}
echo "<script type='text/javascript'> invalid data</script>";
?>
  
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System |  Issued Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style type="text/css">
    @font-face {
  font-family: "Montserrat-Regular";
  src: url("../fonts/montserrat/Montserrat-Regular.ttf"); }
@font-face {
  font-family: "Montserrat-Medium";
  src: url("../fonts/montserrat/Montserrat-Medium.ttf"); }
@font-face {
  font-family: "ElMessiri-SemiBold.ttf";
  src: url("../fonts/el_messiri/ElMessiri-SemiBold.ttf"); }
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }

body {
  font-family: "Montserrat-Regular";
  font-size: 15px;
  color: #666;
  margin: 0; }

p, h1, h2, h3, h4, h5, h6, ul {
  margin: 0; }

img {
  max-width: 100%; }

ul {
  padding-left: 0;
  margin-bottom: 0; }

a {
  text-decoration: none; }
  a:hover {
    text-decoration: none; }

input, textarea, select, button {
  font-family: "Montserrat-Regular";
  font-size: 15px;
  color: #666; }

textarea {
  resize: none; }

:focus {
  outline: none; }

.wrapper {
  min-height: 100vh;
  display: flex;
  align-items: center;
  background: url("") no-repeat center center;
  background-size: cover; }

.inner {
  min-width: 861px;
  transform: translateX(47px);
  margin: auto;
  display: flex;
  background: #fff;
  border-radius: 20px;
  padding-top: 35px;
  padding-bottom: 35px;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
  -ms-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
  -o-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2); }



form {
  padding-top: 42px;
  min-width: 63.88%;
  transform: translateX(-34px); }

h3 {
  font-size: 25px;
  text-align: center;
  margin-bottom: 21px;
  color: #333;
  text-transform: uppercase;
  font-family: "ElMessiri-SemiBold.ttf"; }

.form-control {
  height: 47px;
  display: block;
  border: 1px solid #e6e6e6;
  background: none;
  border-radius: 5px;
  padding: 0 19px; }
  .form-control:focus {
    border: 1px solid #f4d5cc; }
  .form-control::-webkit-input-placeholder {
    color: #999; }
  .form-control::-moz-placeholder {
    color: #999; }
  .form-control:-ms-input-placeholder {
    color: #999; }
  .form-control:-moz-placeholder {
    color: #999; }

select.form-control {
  -moz-appearance: none;
  -webkit-appearance: none;
  cursor: pointer;
  color: #999; }
  select.form-control option[value=""][disabled] {
    display: none; }

textarea.form-control {
  width: 100%;
  padding-top: 13px;
  padding-bottom: 13px; }

.form-row {
  display: flex;
  margin-bottom: 20px; }
  .form-row .form-control {
    width: 50%; }
    .form-row .form-control:first-child {
      margin-right: 20px; }
  .form-row .form-holder {
    width: 50%; }
    .form-row .form-holder .form-control {
      width: 100%; }

.form-holder {
  position: relative; }
  .form-holder i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 20px; }

button {
  height: 47px;
  width: 174px;
  display: flex;
  border: none;
  color: #fff;
  align-items: center;
  justify-content: center;
  margin: auto;
  margin-top: 30px;
  cursor: pointer;
  font-family: "Montserrat-Medium";
  text-transform: uppercase;
  background: #84cde1;
  border-radius: 5px;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  overflow: hidden;
  -webkit-transition-duration: 0.5s;
  transition-duration: 0.5s;
  -webkit-transition-property: color, background-color;
  transition-property: color, background-color; }
  button i {
    margin-left: 8px;
    -webkit-transform: translateZ(0);
    transform: translateZ(0); }
  button:hover {
    -webkit-animation-name: hvr-back-pulse;
    animation-name: hvr-back-pulse;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-delay: 0.5s;
    animation-delay: 0.5s;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    background-color: #17c8f8;
    color: white; }
    button:hover i {
      -webkit-animation-name: hvr-icon-buzz-out;
      animation-name: hvr-icon-buzz-out;
      -webkit-animation-duration: 0.75s;
      animation-duration: 0.75s;
      -webkit-animation-timing-function: linear;
      animation-timing-function: linear;
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite; }

@-webkit-keyframes hvr-back-pulse {
  50% {
    background-color: rgba(32, 152, 209, 0.75); } }
@keyframes hvr-back-pulse {
  50% {
    background-color: rgba(32, 152, 209, 0.75); } }
@-webkit-keyframes hvr-icon-buzz-out {
  10% {
    -webkit-transform: translateX(3px) rotate(2deg);
    transform: translateX(3px) rotate(2deg); }
  20% {
    -webkit-transform: translateX(-3px) rotate(-2deg);
    transform: translateX(-3px) rotate(-2deg); }
  30% {
    -webkit-transform: translateX(3px) rotate(2deg);
    transform: translateX(3px) rotate(2deg); }
  40% {
    -webkit-transform: translateX(-3px) rotate(-2deg);
    transform: translateX(-3px) rotate(-2deg); }
  50% {
    -webkit-transform: translateX(2px) rotate(1deg);
    transform: translateX(2px) rotate(1deg); }
  60% {
    -webkit-transform: translateX(-2px) rotate(-1deg);
    transform: translateX(-2px) rotate(-1deg); }
  70% {
    -webkit-transform: translateX(2px) rotate(1deg);
    transform: translateX(2px) rotate(1deg); }
  80% {
    -webkit-transform: translateX(-2px) rotate(-1deg);
    transform: translateX(-2px) rotate(-1deg); }
  90% {
    -webkit-transform: translateX(1px) rotate(0);
    transform: translateX(1px) rotate(0); }
  100% {
    -webkit-transform: translateX(-1px) rotate(0);
    transform: translateX(-1px) rotate(0); } }
@keyframes hvr-icon-buzz-out {
  10% {
    -webkit-transform: translateX(3px) rotate(2deg);
    transform: translateX(3px) rotate(2deg); }
  20% {
    -webkit-transform: translateX(-3px) rotate(-2deg);
    transform: translateX(-3px) rotate(-2deg); }
  30% {
    -webkit-transform: translateX(3px) rotate(2deg);
    transform: translateX(3px) rotate(2deg); }
  40% {
    -webkit-transform: translateX(-3px) rotate(-2deg);
    transform: translateX(-3px) rotate(-2deg); }
  50% {
    -webkit-transform: translateX(2px) rotate(1deg);
    transform: translateX(2px) rotate(1deg); }
  60% {
    -webkit-transform: translateX(-2px) rotate(-1deg);
    transform: translateX(-2px) rotate(-1deg); }
  70% {
    -webkit-transform: translateX(2px) rotate(1deg);
    transform: translateX(2px) rotate(1deg); }
  80% {
    -webkit-transform: translateX(-2px) rotate(-1deg);
    transform: translateX(-2px) rotate(-1deg); }
  90% {
    -webkit-transform: translateX(1px) rotate(0);
    transform: translateX(1px) rotate(0); }
  100% {
    -webkit-transform: translateX(-1px) rotate(0);
    transform: translateX(-1px) rotate(0); } }
@media (max-width: 991px) {
  .inner {
    min-width: auto;
    max-width: 660px; }

  form {
    padding-top: 0; } }
@media (max-width: 767px) {
  .inner {
    display: block;
    transform: translateX(0);
    border-radius: 0;
    box-shadow: none; }

  .image-holder img {
    transform: translateX(0);
    border-radius: 0; }

  form {
    transform: translateX(0);
    padding-top: 40px; }

  .form-row {
    display: block; }
    .form-row .form-control, .form-row .form-holder {
      width: 100%; }

  .form-control {
    margin-bottom: 20px; }

  .wrapper {
    background: none; } }

/*# sourceMappingURL=style.css.map */
</style>

</head>
<style>
    .custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

    </style>
<body style="background-color: white">
    
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Issued Books</h4>
    
    

 <form action="" method="post">
<h3>Request New Book</h3>
<div class="form-row">
    <?php
$email=$_SESSION['login'];
 $sql = "SELECT * from tblstudents where EmailId='$email'";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>


 </select>
<input type="text" disabled name="FullName" value="<?php echo strtoupper($result->FullName); ?>"class="form-control" placeholder="<?php echo strtoupper($result->FullName); ?>">

<input type="text" disabled name="EmailId" value="<?php echo htmlentities($result->EmailId)?>" class="form-control" placeholder="<?php echo htmlentities($result->EmailId)?>">
</div>
<div class="form-row">
<input type="text" disabled class="form-control" name="MobileNumber" value="<?php echo htmlentities($result->MobileNumber); ?>" placeholder="<?php echo htmlentities($result->MobileNumber); ?>">
<div class="form-holder">
    <?php }} ?>
<select name="class" id="" class="form-control" required="">
<option value="" disabled selected>Select Book</option>
<option value="">Select Book</option>
<?php $sql = "SELECT * from tblbooks";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->ISBNNumber); ?>"><?php echo htmlentities($result->BookName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }} ?>

 </select>

<i class="zmdi zmdi-chevron-down"></i>
</div>
</div>
<textarea name="comment" id="" placeholder="Message" class="form-control" style="height: 130px;" required="" maxlength="45"></textarea>
<button name="submit" class="submit">Request
<i class="zmdi zmdi-long-arrow-right"></i>
</button>
</form>
    </div>
    </div>
    </div>

     <!-- CONTENT-WRAPPER SECTION END-->
  
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    <?php include('includes/footer.php');?>

</body>
</html>
<?php } ?>
