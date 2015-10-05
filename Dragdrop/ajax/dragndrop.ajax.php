<?php
session_start();


require_once '../php-includes/connect.inc.php';

$id = $_GET['id'];
$box = $_GET['box'];

 /*$stmt = $this->db->prepare("SELECT * FROM layer WHERE id = :id");
 $stmt->bindParam(':id', $id);
 $stmt->execute();*/

 if($box=='green')
 {
$layer = $_SESSION['cakeid'];
$stmt = $db->prepare("UPDATE cake SET layer1 = :id WHERE id = :box");
$stmt-> bindParam(':box', $layer);
$stmt-> bindParam(':id', $id);
$stmt->execute();
}
elseif($box=='red'){
	$layer = $_SESSION['cakeid'];
$stmt = $db->prepare("UPDATE cake SET layer2 = :id WHERE id = :box");
$stmt-> bindParam(':box', $layer);
$stmt-> bindParam(':id', $id);
$stmt->execute();

}
elseif($box=='blue'){
	$layer = $_SESSION['cakeid'];
$stmt = $db->prepare("UPDATE cake SET layer3 = :id WHERE id = :box");
$stmt-> bindParam(':box', $layer);
$stmt-> bindParam(':id', $id);
$stmt->execute();
	
}

?>