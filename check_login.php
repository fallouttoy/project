<?php
//เป็นการเก็บค่าตัวแปร
$user = $_POST['user'];
$password = $_POST['password'];

$con=mysqli_connect("localhost","root","","projecttest_db");

// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
else {
   // echo "connect sussced";
   //ค้นหาข้อมูลใน DB ว่าตรงกันหรือไม่
    $sql = "SELECT * FROM users WHERE username = '{$user}' AND password= '{$password}'" ;
    $result = mysqli_query($con,$sql);

// จัดรูปแบบการแสดงผล แบบ array
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//print_r($row);

    //ถ้ามีข้อมูลให้ ลิ้ค์ไปหน้าหลังบ้าน
        if (count($row)>0){
            echo "login sussced";
            header( "location: project_backend.php" );
        }
        //ถ้าไม่มีข้อมูล ให้แจ้งผู้ใช้ว่า login ไม่ผ่าน
        else {
            echo "<script> alert('login false');window.location.href = 'http://localhost/project/index.php' </script>";
            //header( "location: index.php" );
        }

}

?>