<?php

$conn = mysqli_connect("localhost", "root", "whtkdgh1", "crud");

if (!$conn) {
  echo ("연결 에러");
} else {
  echo "디비 연결됨";
}

echo "<br>";

// serialize란 직렬화라는 의미를 가지고 있다.
// serialize()함수는 객체나 데이터의 상태나 타입을
// 특정한 형태의 포맷을 가진 데이터로 변환하는 것을 의미한다.
// 인자로 전달된 값을 직렬화 시켜 문자열로 변환한다.
$friends = array("조상호", "김민재", "감성현");
$friendsSerialize = base64_encode(serialize($friends));


$sql = "UPDATE friend SET name = '$friendsSerialize' WHERE id = 1";
$query = mysqli_query($conn, $sql);

if ($query) {
  echo "데이터베이스 업데이트됨";
} else {
  echo "업데이트 중 에러 발생";
}

echo "<br>";

$sql = "SELECT name FROM friend where id = 1";
$query = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($query);

$name = unserialize(base64_decode($row['name']));

var_dump($name);


?>
