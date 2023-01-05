<?php 
// if ($con) {
//   echo "is connected";
// }
$img_directory="img";
function redirect($location){
  return header("location: $location");
}
// function display_image($picture) {

// global $img_directory;

// return $img_directory  . DS . $picture;



// }
function last_id(){

global $con;

return mysqli_insert_id($con);

}
function query($sql){
  global $con;
  return mysqli_query($con, $sql);
}
function confirm($result){
  global $con;
  if (!$result) {
    die("QUERY FAILED". mysqli_error($con));
  }
}
function escape_string($string){
  global $con;
  return mysqli_real_escape_string($con,$string);
}
function fetch_array($result){
  return  mysqli_fetch_array($result);
}
function set_message($msg)
{
  if (!empty($msg)) {
    $_SESSION['message'] = $msg;
  }
  else{
    $msg= "";
  }
}
function display_message(){
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}
function display_image($picture) {

global $img_directory;

return $img_directory  . DS . $picture;
}
//custom functions end here
function login_user(){
if (isset($_POST['submit'])) {
  $admin_name = escape_string($_POST['admin_name']);
  //echo $admin_name;
  $admin_password = escape_string($_POST['admin_password']);
  $query=query("SELECT * FROM admin WHERE admin_name='{$admin_name}' AND admin_password='{$admin_password}' ");
  if (mysqli_num_rows($query)==0) {
   set_message("Your password or username wrong");
   //redirect("login.php");
  }
  else{
    $_SESSION['admin_name']= $admin_name;
    set_message("welcome to admin {$admin_name}");
    redirect("admin/index.php?id=0");
  }
}

}
function display_user()
{
 
 $admin_query= query("SELECT * FROM admin");
 confirm($admin_query);
 while ($row = fetch_array($admin_query)) {
   $admin_id = $row['admin_id'];
   $admin_name=$row['admin_name'];
   $admin_password = $row['admin_password'];
   $admin_email=$row['admin_email'];
 $admin = <<<DELIMITER


<tr>
    <td>$admin_id</td>
    <td>$admin_name</td>
    <td>$admin_password</td>
   <td>$admin_email</td>
<td><a class="btn btn-danger" href="delete_admin.php?id={$row['admin_id']}"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
</tr>
DELIMITER;
echo $admin;
 }
}
function add_user()
{
  if (isset($_POST['add_user'])) {
$admin_name   = escape_string($_POST['admin_name']);
$admin_password      = escape_string($_POST['admin_password']);
$admin_email   = escape_string($_POST['admin_email']);
// $user_photo = escape_string($_FILES['file']['name']);
// $photo_temp = escape_string($_FILES['file']['tmp_name']);

if(empty($admin_name) || $admin_name == " ") {

echo "<p class='bg-danger'>THIS CANNOT BE EMPTY</p>";


}
else{
   $admin_query= query("SELECT * FROM admin");
 confirm($admin_query);
 while ($row = fetch_array($admin_query)) {
  echo $row['admin_email'];
   $name=$row['admin_name'];
   $password = $row['admin_password'];
   $email=$row['admin_email'];
   if($name == $admin_name || $password == $admin_password)
   {
echo "<h5 class='text-danger'>User Exists Already</h5>";
    }
    else{
$query = query("INSERT INTO admin(admin_name,admin_password,admin_email) VALUES('{$admin_name}','{$admin_password}','{$admin_email}')");
confirm($query);

set_message("USER CREATED");

redirect("view_users.php?id=7");
break;
    }
   }
  
}
  }
}
function send_message()
{
  if (isset($_POST['submit'])) {
    $to        = "writing@liquidbarriersolutions.com";
    $from_name = $_POST['name'];
    $email     = $_POST['email'];
    $cell      = $_POST['cell'];
    $subject   = $_POST['subject'];
    $message   = $_POST['message'];

    $headers = "From:{$from_name} {$email} {$cell}";
    $result = mail($to, $subject, $message, $headers);
    if (!$result) {
      echo "error";
    }
    else{
      echo "sent";
    }
  }
  }
  // admin panel crud for team
  function add_team(){
    if(isset($_POST['submit'])){
$t_name   = escape_string($_POST['t_name']);
$t_designation = escape_string($_POST['t_designation']);
$t_img       =escape_string($_FILES['file']['name']);
$t_tmp_location=escape_string($_FILES['file']['tmp_name']);
$t_description = escape_string($_POST['t_description']);


if(empty($t_name) || $t_name == " ") {

echo "<p class='bg-danger'>NAME CANNOT BE EMPTY</p>";
}
else if(empty($t_designation) || $t_designation == " "){
 echo "<p class='bg-danger'>DESIGNATION CANNOT BE EMPTY</p>"; 
}
else if(empty($t_description) || $t_description == " "){
 echo "<p class='bg-danger'>DESCRIPTION CANNOT BE EMPTY</p>"; 
}

else{
  move_uploaded_file($t_tmp_location, IMG_DIRECTORY . DS . $t_img);
$query = query("INSERT INTO team(t_name,t_designation,t_img,t_description) VALUES('{$t_name}','{$t_designation}','{$t_img}','{$t_description}')");
confirm($query);

set_message("Team Member Added");

redirect("view_team.php?id=3");
}
  }
  }

  function display_team()
{
 
 $team_query= query("SELECT * FROM team");
 confirm($team_query);
 while ($row = fetch_array($team_query)) {
   $t_id = $row['t_id'];
   $t_name=$row['t_name'];
   $t_designation = $row['t_designation'];
   $t_img = display_image($row['t_img']);
   $t_description=$row['t_description'];
   if(empty($t_img) || $t_img==" "){
    $t_img = "placehold.it/62x62";
   }
 $team = <<<DELIMITER


<tr>
    <td>$t_id</td>
    <td>$t_name</td>
    <td>$t_designation</td>
    <td><img width='100' class="admin-user-thumbnail user_image" src="../../{$t_img}" alt=""></td>
   <td>$t_description</td>
<td><a class="btn btn-danger" href="delete_team.php?id={$row['t_id']}"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
<td><a class="btn btn-success" href="edit_team.php?id={$row['t_id']}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
</tr>
DELIMITER;
echo $team;
 }
}
function update_team()
{
  if (isset($_POST['update'])) {
$t_name=escape_string($_POST['t_name']);
$t_designation= escape_string($_POST['t_designation']);
$t_img=escape_string($_FILES['file']['name']);
$t_tmp_location=escape_string($_FILES['file']['tmp_name']);
$t_description=escape_string($_POST['t_description']);

if (empty($t_img)) {
  $get_pic=query("SELECT * FROM team WHERE t_id=".escape_string($_GET['id'])." ");
  confirm($get_pic);
  while ($pic = fetch_array($get_pic)) {
    $t_img = $pic['t_img'];
  }
}

move_uploaded_file($t_tmp_location, IMG_DIRECTORY . DS . $t_img);
$query ="UPDATE team SET ";
$query .= "t_name            ='{$t_name}'         , ";
$query .= "t_designation     ='{$t_designation}'   ,";
$query .= "t_img             = '{$t_img}'          , ";
$query .= "t_description     = '{$t_description}' ";

$query .= "WHERE t_id=" .escape_string($_GET['id']);

$send_update_query = query($query);
confirm($send_update_query);
set_message("team has been updated");
redirect("view_team.php?id=3");

  }
}
// select from databaes
function show_user_team(){
   $team_query= query("SELECT * FROM team");
 confirm($team_query);
 while ($row = fetch_array($team_query)) {
   $t_id = $row['t_id'];
   $t_name=$row['t_name'];
   $t_designation = $row['t_designation'];
   $t_img = display_image($row['t_img']);
   $t_description=$row['t_description'];
   if(empty($t_img) || $t_img==" "){
    $t_img = "placehold.it/62x62";
   }
 $team = <<<DELIMITER
 

                    <div class="col-lg-3 col-sm-3 col-6 flex-grow-1">
                           
                            <div class="team-member  mt-40">
                                <img src="../../{$t_img}" width="200" height='287' alt="team member">
                            <div class="">
                                <h5 class="team-member-name text-danger mt-2">$t_name</h5>
                                <h6 class="team-member-desig text-white">$t_designation</h6>
                            </div>
                           <div class="counterup-item ">
                            <p class="text-white text-left">$t_description</p>
                        </div>
                        </div>
                    </div>
 
DELIMITER;
echo $team;
 }
}

function show_user_team_description(){
   $team_query= query("SELECT * FROM team");
 confirm($team_query);
 while ($row = fetch_array($team_query)) {
   $t_name=$row['t_name'];
   $t_description=$row['t_description'];
$team_description = <<<DELIMITER
<div class="col-md-3 col-sm-6">
                        
                        <div class="counterup-item ">
                            <p class="text-white text-justify">$t_description</p>
                        </div>
                    </div> 
DELIMITER;
echo $team_description;
}
}
//services admin crud
function add_services(){
    if(isset($_POST['submit'])){
$s_title   = escape_string($_POST['s_title']);
$s_description = escape_string($_POST['s_description']);



if(empty($s_title) || $s_title == " ") {

echo "<p class='bg-danger'>NAME CANNOT BE EMPTY</p>";
}

else if(empty($s_description) || $s_description == " "){
 echo "<p class='bg-danger'>DESCRIPTION CANNOT BE EMPTY</p>"; 
}

else{
$query = query("INSERT INTO services(s_title,s_description) VALUES('{$s_title}','{$s_description}')");
confirm($query);

set_message("services Added");

redirect("view_about.php?id=5");
}
  }
  }
  function display_services()
{
 
 $services_query= query("SELECT * FROM services");
 confirm($services_query);
 while ($row = fetch_array($services_query)) {
   $s_id = $row['s_id'];
   $s_title=$row['s_title'];
   $s_description=$row['s_description'];
  
 $services = <<<DELIMITER


<tr>
    <td>$s_id</td>
    <td>$s_title</td>
   <td>$s_description</td>
<td><a class="btn btn-danger" href="delete_services.php?id={$row['s_id']}"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
<td><a class="btn btn-success" href="edit_services.php?id={$row['s_id']}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
</tr>
DELIMITER;
echo $services;
 }
}
function update_services()
{
  if (isset($_POST['update'])) {
$s_title=escape_string($_POST['s_title']);
$s_description=escape_string($_POST['s_description']);


$query ="UPDATE services SET ";
$query .= "s_title            ='{$s_title}'         , ";
$query .= "s_description      = '{$s_description}' ";

$query .= "WHERE s_id=" .escape_string($_GET['id']);

$send_update_query = query($query);
confirm($send_update_query);
set_message("services has been updated");
redirect("view_about.php?id=5");

  }
}
function show_services(){
   $services_query= query("SELECT * FROM services");
 confirm($services_query);
 while ($row = fetch_array($services_query)) {
   $s_id = $row['s_id'];
   $s_title=$row['s_title'];
   $s_description=$row['s_description'];
 $services = <<<DELIMITER
 

                     <div class="col-md-3 col-sm-6">
                        <div class="service-item mt-40">
                            <div class="service-icon">
                                <h3 class="service-title text-danger">$s_title</h3>
                                <p class="text-white text-justify">$s_description</p>
                            </div>
                        </div>
                    </div>
 
DELIMITER;
echo $services;
 }
}
// admin crud about us
  function add_about(){
    if(isset($_POST['submit'])){
$a_title   = escape_string($_POST['a_title']);
$a_description = escape_string($_POST['a_description']);
$a_img       =escape_string($_FILES['file']['name']);
$a_tmp_location=escape_string($_FILES['file']['tmp_name']);



if(empty($a_title) || $a_title == " ") {

echo "<p class='bg-danger'>NAME CANNOT BE EMPTY</p>";
}
else if(empty($a_description) || $a_description == " "){
 echo "<p class='bg-danger'>DESCRIPTION CANNOT BE EMPTY</p>"; 
}

else{
  move_uploaded_file($a_tmp_location, IMG_DIRECTORY . DS . $a_img);
$query = query("INSERT INTO about(a_title,a_description,a_img) VALUES('{$a_title}','{$a_description}','{$a_img}')");
confirm($query);

set_message("about Added");

redirect("view_about2.php?id=9");
}
  }
  }
   function display_about()
{
 
 $about_query= query("SELECT * FROM about");
 confirm($about_query);
 while ($row = fetch_array($about_query)) {
   $a_id = $row['a_id'];
   $a_title=$row['a_title'];
   $a_description=$row['a_description'];
   $a_img = display_image($row['a_img']);
   if(empty($a_img) || $a_img==" "){
    $t_img = "placehold.it/62x62";
   }
   $about = <<<DELIMITER


<tr>
    <td>$a_id</td>
    <td>$a_title</td>
    <td>$a_description</td>
    <td><img width='100' class="admin-user-thumbnail user_image" src="../../{$a_img}" alt=""></td>
<td><a class="btn btn-danger" href="delete_about.php?id={$row['a_id']}"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
<td><a class="btn btn-success" href="edit_about.php?id={$row['a_id']}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
</tr>
DELIMITER;
echo $about;
 }
}
function update_about()
{
  if (isset($_POST['update'])) {
$a_title=escape_string($_POST['a_title']);
$a_description=escape_string($_POST['a_description']);
$a_img=escape_string($_FILES['file']['name']);
$a_tmp_location=escape_string($_FILES['file']['tmp_name']);


if (empty($a_img)) {
  $get_pic=query("SELECT * FROM about WHERE a_id=".escape_string($_GET['id'])." ");
  confirm($get_pic);
  while ($pic = fetch_array($get_pic)) {
    $a_img = $pic['a_img'];
  }
}

move_uploaded_file($a_tmp_location, IMG_DIRECTORY . DS . $a_img);
$query ="UPDATE about SET ";
$query .= "a_title           ='{$a_title}'          , ";
$query .= "a_description     = '{$a_description}'   , ";
$query .= "a_img             = '{$a_img}' "         ;

$query .= "WHERE a_id=" .escape_string($_GET['id']);
$send_update_query = query($query);
confirm($send_update_query);
set_message("about has been updated");
redirect("view_about2.php?id=9");

  }
}
function show_about(){
   $about_query= query("SELECT * FROM about");
 confirm($about_query);
 while ($row = fetch_array($about_query)) {
   $a_id = $row['a_id'];
   $a_title=$row['a_title'];
   $a_description=$row['a_description'];
   $a_img = display_image($row['a_img']);
   if(empty($a_img) || $a_img==" "){
    $a_img = "placehold.it/62x62";
   }
 $about = <<<DELIMITER
 
 <div class="row align-items-center">
                        <div class="col-lg-12 order-2 order-lg-1">
                        <div class="about-inner">
                            <h2 class="h1 title" style="color:red">$a_title </h2>
                                <p class="text-justify text-white">$a_description</p>
                        </div>
                    </div>

                    <!--<div class="col-lg-6 offset-lg-1 order-1 order-lg-2 pt-4">
                        <div class="about-thumb text-center">
                            <img src="$a_img" class="moving-vertical" alt="about thumb">
                        </div>
                    </div>-->
                    </div>
 
DELIMITER;
echo $about;
 }
}
function show_image()
{
   $about2_query= query("SELECT * FROM about");
 confirm($about2_query);
 while ($row = fetch_array($about2_query)) {
   $a_id = $row['a_id'];
   $a_img = display_image($row['a_img']);
   if(empty($a_img) || $a_img==" "){
    $a_img = "placehold.it/62x62";
   }
 $showabout = <<<DELIMITER
 
 
                      
 
DELIMITER;
echo $showabout;
 }
}

//solution crud admin
function add_solution(){
if(isset($_POST['submit'])){
$s_title   = escape_string($_POST['s_title']);
$s_sub = escape_string($_POST['s_sub']);
$s_description = escape_string($_POST['s_description']);
$s_img       =escape_string($_FILES['file']['name']);
$s_tmp_location=escape_string($_FILES['file']['tmp_name']);



if(empty($s_title) || $s_title == " ") {

echo "<p class='bg-danger'>NAME CANNOT BE EMPTY</p>";
}
else if(empty($s_sub) || $s_sub == " "){
 echo "<p class='bg-danger'>sub-title CANNOT BE EMPTY</p>"; 
}
else if(empty($s_description) || $s_description == " "){
 echo "<p class='bg-danger'>DESCRIPTION CANNOT BE EMPTY</p>"; 
}

else{
  move_uploaded_file($s_tmp_location, IMG_DIRECTORY . DS . $s_img);
$query = query("INSERT INTO solution(s_title,s_sub,s_description,s_img) VALUES('{$s_title}','{$s_sub}','{$s_description}','{$s_img}')");
confirm($query);

set_message("solution Added");

redirect("view_solution.php?id=11");
}
  }
  }
   function display_solution()
{
 
 $solution_query= query("SELECT * FROM solution");
 confirm($solution_query);
 while ($row = fetch_array($solution_query)) {
   $s_id = $row['s_id'];
   $s_title=$row['s_title'];
   $s_sub=$row['s_sub'];
   $s_description=$row['s_description'];
   $s_img = display_image($row['s_img']);

   if(empty($s_img) || $s_img==" "){
    $s_img = "placehold.it/62x62";
   }
   $solution = <<<DELIMITER


<tr>
    <td>$s_id</td>
    <td>$s_title</td>
    <td>$s_sub</td>
    <td>$s_description</td>
    <td><img width='100' class="admin-user-thumbnail user_image" src="../../{$s_img}" alt=""></td>
<td><a class="btn btn-danger" href="delete_solution.php?id={$row['s_id']}"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
<td><a class="btn btn-success" href="edit_solution.php?id={$row['s_id']}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
</tr>
DELIMITER;
echo $solution;
 }
}
function update_solution()
{
  if (isset($_POST['update'])) {
$s_title=escape_string($_POST['s_title']);
$s_sub=escape_string($_POST['s_sub']);
$s_description=escape_string($_POST['s_description']);
$s_img=escape_string($_FILES['file']['name']);
$s_tmp_location=escape_string($_FILES['file']['tmp_name']);


if (empty($s_img)) {
  $get_pic=query("SELECT * FROM solution WHERE s_id=".escape_string($_GET['id'])." ");
  confirm($get_pic);
  while ($pic = fetch_array($get_pic)) {
    $s_img = $pic['s_img'];
  }
}

move_uploaded_file($s_tmp_location, IMG_DIRECTORY . DS . $s_img);
$query ="UPDATE solution SET ";
$query .= "s_title           ='{$s_title}'          , ";
$query .= "s_sub             = '{$s_sub}'    ,         ";
$query .= "s_description     = '{$s_description}'   , ";
$query .= "s_img             = '{$s_img}' "         ;

$query .= "WHERE s_id=" .escape_string($_GET['id']);
$send_update_query = query($query);
confirm($send_update_query);
set_message("solution has been updated");
redirect("view_solution.php?id=11");

  }
}
//solution select form database
function show_solution(){
   $solution_query= query("SELECT * FROM solution");
 confirm($solution_query);
 while ($row = fetch_array($solution_query)) {
   $s_id = $row['s_id'];
   $s_title=$row['s_title'];
   $s_sub=$row['s_sub'];
   $s_description=$row['s_description'];
   $s_img = display_image($row['s_img']);
   if(empty($s_img) || $s_img==" "){
    $s_img = "placehold.it/62x62";
   }
 $showsolution2 = <<<DELIMITER
 
 <div class="row align-items-center">

  <div class="col-lg-6 wow fadeInLeft text-center" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="about-thumb moving-vertical">
                            <img src="$s_img" alt="about thumb">
                        </div>
                    </div>

  <div class="col-lg-5 offset-lg-1 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="">
                            <h2 class="h1 title text-white">$s_title</h2>
                                <h3 class="subtitle text-white">$s_sub</h3>
                                <h5 class="text-danger mb-0">$s_description</h5>
                               
                        </div>
                    </div>
</div>
 
DELIMITER;
echo $showsolution2;
 }
}
function show_sol()
{
   $solution_query= query("SELECT * FROM solution");
 confirm($solution_query);
 while ($row = fetch_array($solution_query)) {
   $s_id = $row['s_id'];
   
 $showsolution = <<<DELIMITER
 
                      
 
DELIMITER;
echo $showsolution;
 }
}
//insights & ideas
function add_insights(){
if(isset($_POST['submit'])){
$i_title   = escape_string($_POST['i_title']);
$i_description = escape_string($_POST['i_description']);
$i_img       =escape_string($_FILES['file']['name']);
$i_tmp_location=escape_string($_FILES['file']['tmp_name']);




if(empty($i_title) || $i_title == " ") {

echo "<p class='bg-danger'>NAME CANNOT BE EMPTY</p>";
}
else if(empty($i_description) || $i_description == " "){
 echo "<p class='bg-danger'>sub-title CANNOT BE EMPTY</p>"; 
}

else{
  move_uploaded_file($i_tmp_location, IMG_DIRECTORY . DS . $i_img);
$query = query("INSERT INTO insight(i_title,i_description,i_img) VALUES('{$i_title}','{$i_description}','{$i_img}')");
confirm($query);

set_message("insights Added");

redirect("view_insights.php?id=13");
}
  }
  }
   function display_insights()
{
 
 $insights_query= query("SELECT * FROM insight");
 confirm($insights_query);
 while ($row = fetch_array($insights_query)) {
   $i_id = $row['i_id'];
   $i_title=$row['i_title'];
   $i_description=$row['i_description'];
   $i_img = display_image($row['i_img']);

   if(empty($i_img) || $i_img==" "){
    $i_img = "placehold.it/62x62";
   }
   $insights = <<<DELIMITER


<tr>
    <td>$i_id</td>
    <td>$i_title</td>
    <td>$i_description</td>
    <td><img width='100' class="admin-user-thumbnail user_image" src="../../{$i_img}" alt=""></td>
<td><a class="btn btn-danger" href="delete_insights.php?id={$row['i_id']}"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
<td><a class="btn btn-success" href="edit_insights.php?id={$row['i_id']}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
</tr>
DELIMITER;
echo $insights;
 }
}
function update_insights()
{
  if (isset($_POST['update'])) {
$i_title=escape_string($_POST['i_title']);
$i_description=escape_string($_POST['i_description']);
$i_img=escape_string($_FILES['file']['name']);
$i_tmp_location=escape_string($_FILES['file']['tmp_name']);


if (empty($i_img)) {
  $get_pic=query("SELECT * FROM insight WHERE i_id=".escape_string($_GET['id'])." ");
  confirm($get_pic);
  while ($pic = fetch_array($get_pic)) {
    $i_img = $pic['i_img'];
  }
}

move_uploaded_file($i_tmp_location, IMG_DIRECTORY . DS . $i_img);
$query ="UPDATE insight SET ";
$query .= "i_title           ='{$i_title}'          , ";
$query .= "i_description     = '{$i_description}'   , ";
$query .= "i_img             = '{$i_img}' "         ;

$query .= "WHERE i_id=" .escape_string($_GET['id']);
$send_update_query = query($query);
confirm($send_update_query);
set_message("insights has been updated");
redirect("view_insights.php?id=13");

  }
}
function show_insights(){
   $insights_query= query("SELECT * FROM insight");
 confirm($insights_query);
 while ($row = fetch_array($insights_query)) {
   $i_id = $row['i_id'];
   $i_title=$row['i_title'];
   $i_description=$row['i_description'];
   $i_img = display_image($row['i_img']);
   if(empty($i_img) || $i_img==" "){
    $i_img = "placehold.it/62x62";
   }
 $about = <<<DELIMITER
 
<div class="row align-items-center">
                
                      <div class="col-lg-5 order-2 order-lg-1">
                        <div class="about-inner">
                            <h2 class="h1 title text-white ">$i_title </h2>
                                <h5 class="text-justify text-danger">$i_description</h5>
                               
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 order-1 order-lg-2 pt-4">
                        <div class="about-thumb text-center">
                            <img src="$i_img" class="moving-vertical" alt="about thumb">
                        </div>
                    </div>

 </div>
DELIMITER;
echo $about;
 }
}
function show_img(){
   $insights_query= query("SELECT * FROM insight");
 confirm($insights_query);
 while ($row = fetch_array($insights_query)) {
   $i_img = display_image($row['i_img']);
   if(empty($i_img) || $i_img==" "){
    $i_img = "placehold.it/62x62";
   }
 $about = <<<DELIMITER
 
 
DELIMITER;
echo $about;
 }
}
?>