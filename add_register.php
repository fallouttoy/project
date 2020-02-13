<?php
$fullname = $_POST['fullname'];
$user = $_POST['user'];
$password = $_POST['password'];

$con=mysqli_connect("localhost","root","","projecttest_db");

if (mysqli_connect_errno()) {
    //echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  else {
     // echo "connect sussced";
     //ค้นหาข้อมูลใน DB ว่าตรงกันหรือไม่
      $sql = "INSERT INTO users (fullname,username,password) VALUE ('{$fullname}','{$user}','{$password}')";
  if (mysqli_query($con, $sql)) {
        echo "<script> alert('สร้างผู้ใช้เรียบร้อย'); window.location.href = 'http://localhost/project/index.php' </script> ";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
  }


?>