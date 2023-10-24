<?php
    session_start();


    $host = "dbutt.mysql.database.azure.com";
    $username = "baoanhhihi";
    $password = "Vuchien@123";
    $database = "utt";


    //tao ket noi
    $conn = new mysqli($host, $username, $password, $database);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối tới cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    // else{
    //    echo ("ket noi thanh cong");
    // }

    $User = $_POST["User"];
    $Password = $_POST["Password"];

    //trich xuat du lieu nhap bang ham 
    $Input_user = mysqli_real_escape_string($conn, $User);
    $Input_pass = mysqli_real_escape_string($conn, $Password);

   $sql = "SELECT * FROM `account` WHERE User = '$Input_user' and Password = '$Input_pass'";
   

    $result = mysqli_query($conn, $sql);

    // tắt hiển thị lỗi
    ini_set('display_errors', '0');

    $count = mysqli_num_rows($result);

    if($count == 1){
        
        $_SESSION['User_name'] = $User;
        $_SESSION['id'] = 1; 
        header('Location: index.php');
    } else{
        header('Location: login.html');
    }
?>

 <?php
    // // lay dulieu tu form dangnhap
    // $User = $_POST["User"];
    // $Password = $_POST["Password"];

    // //tao ket noi
    // $conn = mysqli_connect("localhost","root","") or die ;
    // //tim csdl de lam viec
    // mysqli_select_db($conn,"utt") or die;
    // // cau lenh query
    // echo $sql_insert_account ="SELECT * FROM `account` WHERE User = '$User' and Password = '$Password'";

    // ini_set('display_errors', '0');
    // //thuc hien truy van
    // $result = mysqli_query($conn, $sql_insert_account);
    // $count = mysqli_num_rows($result);

    // if($count == 1){
    //     $_SESSION['User_name'] = $User; 
    //     header('Location: index.php');
    // } else{
    //     header('Location: login.html');
    // }
?>



<?php 
//     //lọc tên người dùng và mật khẩu để loại bỏ các ký tự đặc biệt.
//     $User = filter_input(INPUT_POST, 'User', FILTER_SANITIZE_STRING);
//     $Password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);

//     //tao ket noi
//     $conn = mysqli_connect("localhost","root","") or die ;
//     //tim csdl de lam viec
//     mysqli_select_db($conn,"utt") or die;

//     //làm sạch tên người dùng và mật khẩu trước khi chúng được sử dụng trong truy vấn SQL
//    $User = mysqli_real_escape_string($conn, $User);
//    echo  $User;
//    $Password = mysqli_real_escape_string($conn, $Password);
//    $Password;

//     echo$sql_insert_account ="SELECT * FROM `account` WHERE User = '$User' and Password = '$Password'";

//     ini_set('display_errors', '0');


//     //thuc hien truy van
//     $result = mysqli_query($conn, $sql_insert_account);
//     $count = mysqli_num_rows($result);

//     if($count == 1){
//         $_SESSION['User_name'] = $User; 
//         // header('Location: index.php');
//     } else{
//         // header('Location: login.html');
//     }
?>  
