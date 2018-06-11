
<?php
$db = new PDO('mysql:host=localhost;dbname=move_watch;charset=utf8','admin','Ma Ch1p3tt3!');

$sql = $db->prepare('SELECT * FROM test');
$sql->execute();
$response = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($response, JSON_UNESCAPED_UNICODE);





