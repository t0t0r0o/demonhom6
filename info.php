<?php
include "model.php";
include 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);

session_start();
if (isset($_SESSION['user'])) {
    $model = new model();
    $users = $model->get_users($_GET['name']);
    $uidarray = [];
    foreach ($users as $u) {
        $uidarray[] = $u['hoten'];
    }
    try {
        $getUID = strip_tags($_GET['name']);
        if (in_array($_GET['name'], $uidarray)) {
            $text = "<span style='color: white'>Xin chào  " . $getUID . " đây là trang thông tin về một số bài viết nho nhỏ về ẩm thực </span>" . "<br>";
            $message = "<h3 style='color: white;'>Hôm nay có gì  :</h3>";

            // Mảng các mục và đường dẫn hình ảnh tương ứng
            $items = [
                "Phở gà" => [
                    "text" => "Phở gà đã trở thành món ăn tiêu biểu, không thể thiếu trong ẩm thực của người Việt Nam. Có nguồn gốc từ mảnh đất Hà Nội nhưng hiện nay phở đã trở nên phổ biến ở mọi miền đất nước và được nhiều người yêu thích.",
                    "imagePath" => "/img/pho_ga.jpeg",
                    "width" => 350,
                    "height" => 250
                ],
                "Phở bò" => [
                    "text" => "Các loại phở bò thơm ngon khiến biết bao thực khách phải xuyến xao. Mỗi loại lại sở hữu công thức và cách chế biến riêng tạo nên hương vị vô cùng thu hút, ăn là nhớ, ngửi là mê. Dưới đây là list danh sách những món nổi tiếng nhất dành cho những ai đã trót trao con tim mình cho phở Việt.",
                    "imagePath" => "/img/Phobo.jpeg",
                    "width" => 350,
                    "height" => 250
                ],
                "Nem nướng" => [
                    "text" => "Nem nướng được làm từ thịt đùi heo và bì lợn, sau khi được đem đi sơ chế, bạn xay nhuyễn cho gia vị rồi quấn với que tre và bỏ lên bếp nướng. Nem nướng sẽ được ăn kèm với nước chấm. Nước chấm là bí quyết pha chế vô cùng đặc biêt, nó cũng quyết định hương vị thơm ngon của món ăn. Theo bí quyết chế biến của người Khánh Hòa, nước chấm được pha từ 20 loại nguyên liệu khác nhau bao gồm nếp dẻo, đỗ tương, thịt nạc, gan lợn, cà chua, tôm, tỏi hành và các loại gia vị khác.",
                    "imagePath" => "/img/nemnuong.jpeg",
                    "width" => 350,
                    "height" => 250
                ]
            ];

            foreach ($items as $item => $data) {
                $message .= "<div class='item'>";
                $message .= "<h4>$item</h4>";
                $message .= "<p>{$data["text"]}</p>";
                $message .= "<img src='{$data["imagePath"]}' alt='{$item}' width='{$data["width"]}' height='{$data["height"]}'>";
                $message .= "</div>";
            }
        } else {
            $text = "<span style='color: white'>Xin chào  " . $getUID . " Hình như bạn không có trong cơ sở dữ liệu của chúng tôi </span>" . "<br>";
            $backgroundImage = "url('/img/maxresdefault.jpg')";
            echo "<style>
                body {
                    background-size: cover; /* Đảm bảo hình ảnh nền đủ lớn để phủ toàn bộ trang */
                    background-repeat: no-repeat; /* Không lặp lại hình ảnh nền */
                    background-color: #fff;
                }
            </style>";
        }
        $result = $twig->render($text);
        var_dump($result);
    } catch (\Twig\Error\Error $e) {
        die('ERROR: ' . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thông tin người dùng</title>
    <link rel="stylesheet" type="text/css" href="info.css">
    <style>
        body {
            background-color: #474c4d;
        }

        .item {
            border: 2px solid white;
            padding: 10px;
            margin-bottom: 5px;
            text-align: center;
            /* Căn giữa nội dung */
            font-family: 'Roboto', sans-serif;
            /* Sử dụng font Roboto */
            line-height: 1.5;
        }

        .item h4 {
            font-size: 22px;
            color: white;
        }

        .item p {
            font-size: 16px;
            color: white;
        }

        strong {
            font-size: 24px;
            color: white;
            text-align: center;
        }

        /* Nút hint */
        button {
            font-size: 24px;
            color: black;
            text-align: center;
            background-color: white;
            border: none;
            cursor: pointer;
        }


        button:hover {
            background-color: #0077FF;
            color: white;
        }
    </style>
</head>

</html>