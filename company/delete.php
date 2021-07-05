<?php
session_start();
require_once '../pdo.php';

$rem = $pdo->prepare(
    "DELETE FROM employee WHERE eid=:eid"
);

$rem->execute(array(
    ':eid'=>$_GET['eid'],
));
header('Location: tables');
return;
?>