<?php
echo '1. !!!Комитајте сите за дизајнот на едно место, за да можеме целосно да го анализираме.<br/>';
echo '2. Подолу е како се конектираме на база преку PHP и како се прави query кога:<br/>';
echo '- немаме ниеден параметар кој се праќа (само со query)<br/>';
echo '- имаме параметар кој се праќа (со prepare, bind и execute)<br/>';
echo 'Направете си дома по една табела своја и напишете од двата случаи по еден пример!<br/>';
echo '3. Подолу имате и пример како да правите поврзување на 2 табели по одреден клуч.<br/>';
echo 'Направете уште една табела каде ќе го имате како колона и некое ID од првата табела која ја креиравте и напишете еден SQL за да ги поврзете.';

$config = 'mysql:host=127.0.0.1;dbname=sa_site';
$username = 'root';
$password = 'root';
$db = new PDO($config, $username, $password);


$sql = "select * from professors";
$query = $db->query($sql);
$classes = $query->fetchAll(PDO::FETCH_ASSOC);


$sql = "select * from professors where id = :id";
$query = $db->prepare($sql);
$query->bindValue(':id', 1, PDO::PARAM_INT);
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);



$sql_so_where = 'select classes.name, classes.description, classes.number_of_classes, professors.first_name, professors.last_name 
from classes, professors
where classes.professor_id = professors.id and classes.id = 1';

$sql_so_join = 'select classes.name, classes.description, classes.number_of_classes, professors.first_name, professors.last_name 
from classes join professors on classes.professor_id = professors.id
where classes.id = 1';
?>

