<?php
require("app/app.php");

$sql = "SELECT * FROM countries ORDER BY country ASC";
GLOBAL $dba;
$smt = $dba->prepare($sql);
$smt->execute();
$countries = $smt->fetchAll();



view("index");