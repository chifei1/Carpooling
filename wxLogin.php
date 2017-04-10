<?php
header("Content-type: text/html; charset=utf8");
/*
返回  code state
*/

//$appid = 'wx74e9fd19a03128a9';

//$url = "https://open.weixin.qq.com/connect/qrconnect?appid=$appid&redirect_uri=http://trust.ecosysnet.com/wxCallback.php&response_type=code&scope=snsapi_login&state=11#wechat_redirect";

//header('location:'.$url);
setcookie('weixin_name','chjifei');


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="app";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//update
//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
//
//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

// Create database
$sql = "select * from members";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) { 
        echo "<br> qq: ". $row["qq"]. " - 名字: ". $row["nickname"]. " - 手机号： " . $row["phone"];
    }
} else {
    echo "0 results";
}



$conn->close();

 die;

//$user = DB::table('members')->select('phone_number')->where('phone_number',$phone_number)->first();
print_r($user);
echo '<br />';
print_r($_COOKIE['weixin_name']);





?>