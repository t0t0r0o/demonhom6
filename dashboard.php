<?php
session_start();
$foundUser = null;

foreach ($_SESSION['user'] as $user) {
    if (md5($user['id']) == $_GET['uID']) {
        $foundUser = $user;
        break;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thông Tin Người Dùng</title>
    <style>
        body {
            background-image: url('/img/cat-meo.jpg')
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        th,
        td {
            border: 2px solid white;
            padding: 8px;
            text-align: left;
            color: white;
        }

        h2 {
            color: white;
        }

        a {
            color: white;
            /* Màu chữ mặc định cho liên kết */
            text-decoration: none;
            /* Loại bỏ gạch chân mặc định cho liên kết */
            transition: color 0.3s;
            /* Thêm hiệu ứng chuyển đổi màu trong 0.3 giây */
        }

        a:hover {
            color: yellow;
            /* Màu chữ khi di chuột vào là màu vàng */
        }
    </style>
</head>

<body>
    <?php if ($foundUser) : ?>
        <h2>Thông Tin Người Dùng</h2>
        <table>
            <tr>
                <th>Tên</th>
                <th>Ngày Sinh</th>
                <th>Địa Chỉ Email</th>
                <th>Xem Thêm</th>
            </tr>
            <tr>
                <td><?php echo $foundUser['hoten']; ?></td>
                <td><?php echo $foundUser['ngaysinh']; ?></td>
                <td><?php echo $foundUser['email']; ?></td>
                <td><a href="/info.php?name=<?php echo $foundUser['hoten']; ?>">Xem thêm thông tin</a></td>
            </tr>
        </table>
    <?php else : ?>
        <p>Không tìm thấy thông tin người dùng</p>
    <?php endif; ?>
</body>

</html>