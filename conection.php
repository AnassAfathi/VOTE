<?php
try
{
    $pdo=new pdo("mysql:host=localhost;dbname=vote","root","");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>