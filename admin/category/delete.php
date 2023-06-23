<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../database/dbhelper.php');
?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];


$sql = 'delete from category where id=' . $id;
execute($sql);
header('Location: index.php');
die();
}

?>