<?php 
  session_start();
  if(!isset($_SESSION['User_name']) and !isset($_SESSION['id'])) {
    header("Location: login.html");
  }
?>

<?php
      $host = "yepps.mysql.database.azure.com";
    $username = "baoanhhihi";
    $password = "Vuchien@123";
    $database = "utt";


    //tao ket noi
    $conn = new mysqli($host, $username, $password, $database);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối tới cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Trang chủ</title>
</head>


<?php
$stmt = $conn->prepare("Select * From student Where id = ?");
$stmt->bind_param("s", $id);

$id = $_SESSION['id'];

$stmt->execute(); // Thêm dòng này

$result = $stmt->get_result();
$row = mysqli_fetch_assoc($result); //hien thi len form
ini_set('display_errors', '0');

?>

<body>
    <div class="wraper">
        <div class="header">
            <div class="header__title">
                <div class="header__title__description" style="color: #fff;">
                    TRƯƠNG ĐẠI HỌC CÔNG NGHỆ GTVT
                </div>

                <div class="header__title__user">
                    <h3>Sinh Viên: <?php echo $row['Name'] ?></h3>
                </div>

            </div>
            <div class="header__system">
                <a href="" class="header__system__link">Trang chủ</a>
                <a href="logout.php" class="header__system__link">Đăng xuất</a>
                <a href="" class="header__system__link">hỏi đáp</a>
                <a href="" class="header__system__link">Trợ giúp</a>
                <select class="header__system__link-op" name="Product_Type" >
                    <option value="">VN</option>
                    <option value="">EN</option>
                  </select>
            </div>
        </div>

        <div class="container">

            <div class="container__information">
                <div class="container__information--col">
                    <div class="container__information--row"> 
                        <div class="container__information--title">Mã Sinh Viên:</div>
                        <div class="container__information--id"><?php echo $row['Student_id'] ?></div>
                    </div>
                    <div class="container__information--row"> 
                        <div class="container__information--title">Khoa: </div>
                        <div class="container__information--department"><?php echo $row['Department'] ?></div>
                    </div>
                    <div class="container__information--row"> 
                        <div class="container__information--title">Học kì:</div>
                       <select class="container__information--semester" name="Product_Type" >
                            <option value="">2021_2022_1</option>
                            <option value="">2021_2022_2</option>
                            <option value="">2022_2023_1</option>
                            <option value="">2022_2023_2</option>
                          </select>
                    </div>
                </div>
            

            
                <div class="container__information--col">
                    <div class="container__information--row"> 
                        <div class="container__information--title">Họ tên:</div>
                        <div class="container__information--name"><?php echo $row['Name'] ?></div>
                    </div>
                    <div class="container__information--row"> 
                        <div class="container__information--title">Ngành: </div>
                        <div class="container__information--specialized"><?php echo $row['Specialized'] ?></div>
                    </div>
                    <div class="container__information--row"> 
                        <div class="container__information--title">Lọc:</div>
                        <select class="container__information--semester" name="Product_Type" >
                            <option value="">Xem những học phần có diểm </option>
                            <option value="">EN</option>
                          </select>
                    </div>
                </div>

                <div class="container__information--col">
                    <div class="container__information--row"> 
                        <div class="container__information--title">Trạng thái:</div>
                        <div class="container__information--status">Đang học</div>
                    </div>
                    <div class="container__information--row"> 
                        <div class="container__information--title">Lớp: </div>
                        <div class="container__information--class"><?php echo $row['Class'] ?></div>
                    </div>
                </div>

            </div>

            <div class="container__scores">
                <table width="100%" align="center" border="1" style="border-collapse: collapse;">
                    <tbody>
                      <tr>
                        <td class="container__scores__header">Năm học</td>
                        <td class="container__scores__header">Học kỳ</td>
                        <td class="container__scores__header">TBTL Hệ 10 N1</td>
                        <td class="container__scores__header">TBTL Hệ 10 N2</td>
                        <td class="container__scores__header">TBTL Hệ 4 N1</td>
                        <td class="container__scores__header">TBTL Hệ 4 N2</td>
                        <td class="container__scores__header">Số TCTL N1</td>
                        <td class="container__scores__header">Số TCTL N2</td>
                        <td class="container__scores__header">TBC Hệ 10 N1</td>
                        <td class="container__scores__header">TBC Hệ 10 N2</td>
                        <td class="container__scores__header">TBC Hệ4 N1</td>
                        <td class="container__scores__header">TBC Hệ4 N2</td>
                        <td class="container__scores__header">Số TC N1</td>
                        <td class="container__scores__header">Số TC N2</td>
                      </tr>
                      <tr>
                        <td class="container__scores__row">2021_2022</td>
                        <td class="container__scores__row">1</td>
                        <td class="container__scores__row">8.53</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">3.66</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">16</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">8.53</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">3.66</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">16</td>
                        <td class="container__scores__row"></td>
                      </tr>
                      <tr>
                        <td class="container__scores__row">2021_2022</td>
                        <td class="container__scores__row">2</td>
                        <td class="container__scores__row">8.53</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">3.66</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">16</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">8.53</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">3.66</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">16</td>
                        <td class="container__scores__row"></td>
                      </tr>
                      <tr>
                        <td class="container__scores__row">2021_2022</td>
                        <td class="container__scores__row">Cả năm</td>
                        <td class="container__scores__row">8.53</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">3.66</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">16</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">8.53</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">3.66</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">16</td>
                        <td class="container__scores__row"></td>
                      </tr>
                      <tr>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">Toàn Khóa</td>
                        <td class="container__scores__row">8.53</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">3.66</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">16</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">8.53</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">3.66</td>
                        <td class="container__scores__row"></td>
                        <td class="container__scores__row">16</td>
                        <td class="container__scores__row"></td>
                      </tr>
                      <tr>
                    </tbody>
                  </table>

                  <br>

                  <?php
                  // Chuẩn bị câu lệnh SQL
                  $stmt = $conn->prepare("SELECT * FROM `2022-2023_2` WHERE id = ?");

                  // Gán giá trị cho tham số
                  $id = $_SESSION['id'];

                  // Ràng buộc tham số
                  $stmt->bind_param("s", $id);

                  // Thực thi câu lệnh
                  $stmt->execute();

                  // Lấy kết quả
                  $result = $stmt->get_result();

                  // Đếm số bản ghi
                  $tong_bg = $result->num_rows;

                  $stt = 0;
                  while ($row = $result->fetch_object()) {
                      $stt++;
                      $Subject_id[$stt] = $row->Subject_id;
                      $Subject_name[$stt] = $row->Subject_name;
                      $Subject_credits[$stt] = $row->Subject_credits;
                      $Subject_times[$stt] = $row->Subject_times;
                      $Student_id[$stt] = $row->Student_id;
                      $Subject_attendance[$stt] = $row->Subject_attendance;
                      $Midterm_exam[$stt] = $row->Midterm_exam;
                      $Final_exam[$stt] = $row->Final_exam;
                      $Discuss[$stt] = $row->Discuss;
                  }
                  ?>

                  <h3>BẢNG ĐIỂM CHI TIẾT</h3>
                  <table width="100%" align="center" border="1" style="border-collapse: collapse;">
                    <tbody>
                      <tr>
                        <td class="container__scores__header">STT</td>
                        <td class="container__scores__header">Mã Học phần</td>
                        <td class="container__scores__header">Số Tc</td>
                        <td class="container__scores__header">Lần học</td>
                        <td class="container__scores__header">Lần thi</td>
                        <td class="container__scores__header">Điểm thứ</td>
                        <td class="container__scores__header">Là điểm tổng kết môn</td>
                        <td class="container__scores__header">Đánh giá</td>
                        <td class="container__scores__header">Mã sinh viên</td>
                        <td class="container__scores__header">Chuyên cần</td>
                        <td class="container__scores__header">Kiểm tra GK</td>
                        <td class="container__scores__header">Thực hành</td>
                        <td class="container__scores__header">Thi Kết thúc</td>
                        <td class="container__scores__header">Thảo luận</td>
                        <td class="container__scores__header">Tổng kết HP</td>
                      </tr>

                      <?php
                        for($i=1;$i<=$tong_bg;$i++)
                        {
                      ?>
                      <tr>
                        <td class="container__scores__row"><?php echo $i ?></td>
                        <td class="container__scores__row"><?php echo $Subject_id[$i] ?></td>
                        <td class="container__scores__row"><?php echo $Subject_credits[$i] ?></td>
                        <td class="container__scores__row"><?php echo $Subject_times[$i] ?></td>
                        <td class="container__scores__row"><?php echo $Subject_times[$i] ?></td>
                        <td class="container__scores__row"><?php echo $Subject_times[$i] ?></td>
                        <td class="container__scores__row"><?php echo $Subject_name[$i]?></td>
                        <td class="container__scores__row"><?php ?></td>
                        <td class="container__scores__row"><?php echo $Student_id[$i] ?></td>
                        <td class="container__scores__row"><?php echo $Subject_attendance[$i] ?></td>
                        <td class="container__scores__row"><?php echo $Midterm_exam[$i]?></td>
                        <td class="container__scores__row"><?php ?></td>
                        <td class="container__scores__row"><?php echo $Final_exam[$i]?></td>
                        <td class="container__scores__row"><?php echo  $Discuss[$i]?></td>
                        <td class="container__scores__row"><?php echo ($Final_exam[$i] + $Discuss[$i] + $Midterm_exam[$i] + $Subject_attendance[$i]) / 4?></td>
                      </tr>

                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                  
            </div>
        </div>

        <div class="footer">
            <div class="footer__description">
                Đường dây nóng: 02435528978
            </div>
        </div>


    </div>
</body>

</html>
