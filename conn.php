<?php

//db connection
$dbservername="localhost";
$dbusername="root";
$dbpassword=""

$conn=mysqli_connect($dbservername,$dbusername,$dbpassword)
if(!$conn){
    die("can not connect ".mysqli_error());
};



//insert values in kycinfo db


$firstname=mysqli_real_escape_string($conn,$_POST['fname']);
$middlename=mysqli_real_escape_string($conn,$_POST['mname']);
$lastname=mysqli_real_escape_string($conn,$_POST['lname']);
$companyname=mysqli_real_escape_string($conn,$_POST['cname']);
$mobileno=mysqli_real_escape_string($conn,$_POST['mno']);
$email=mysqli_real_escape_string($conn,$_POST['eid']);
$dateofbirth=mysqli_real_escape_string($conn,$_POST['dob']);
$pancardno=mysqli_real_escape_string($conn,$_POST['pan']);
$Pincode=mysqli_real_escape_string($conn,$_POST['pin']);
$district=mysqli_real_escape_string($conn,$_POST['dis']);
$state1=mysqli_real_escape_string($conn,$_POST['state']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$addrs=mysqli_real_escape_string($conn,$_POST['add']);
$adhaar=mysqli_real_escape_string($conn,$_POST['adhaar']);

$ins="INSERT INTO KYCFORM (firstname,middlename,lastname,companyname,mobileno,email,dateofbirth,pancardno,Pincode,district,state1,city,addrs)
VALUES('$firstname','$middlename','$lastname','$companyname','$mobileno','$email','$dateofbirth','$pancardno','$Pincode','$district','$state1','$city','$addrs')
";
mysqli_query($conn,$ins)
if(isset($_POST['but_upload'])){
 
    $adhaar = $_FILES['adhaar']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["adhaar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    $pancard= $_FILES['pancrd']['name'];
    $target_dir1= "upload/";
    $target_file1= $target_dir . basename($_FILES["pancrd"]["name"]);
    $imageFileType1= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    $extensions_arr = array("jpg","jpeg","pdf");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
       $query = "insert into KYCFORM (adhaarimg) values('".$adhaar."')";
       mysqli_query($conn,$query);
       move_uploaded_file($_FILES['adhaar']['tmp_name'],$target_dir.$adhaar);
  
    }
    if( in_array($imageFileType1,$extensions_arr) ){
        $query = "insert into KYCFORM (npanimg) values('".$pancard."')";
        mysqli_query($conn,$query);
        move_uploaded_file($_FILES['adhaar']['tmp_name'],$target_dir1.$pancard);
   
     }
    
  }


mysqli_close($conn)

?>