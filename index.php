<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>BD</title>
</head>

<body>
<form action="index.php" method="post">
    <p><input type="text" name="ISBN" value="<?= $_REQUEST['ISBN'] ?>" placeholder="Введите ISBN"><br>
        <input type="text" name="name" value="<?= $_REQUEST['name'] ?>" placeholder="Введите name"><br>
        <input type="text" name="author" value="<?= $_REQUEST['author'] ?>" placeholder="Введите author"><br>
        <input type="submit" value="Найти" name="btn"></p>
</form>
<table border="1" width="100%">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>author</th>
        <th>year</th>
        <th>isbn</th>
        <th>genre</th>
    </tr>
    </thead>
    <pre>
<?php
$mysqli = mysqli_connect("localhost", "severyuhina", "neto1715", "global");
if (!$mysqli) die ('нет подключения к mysqli');

$res = mysqli_query($mysqli, "SET NAMES 'utf-8'");
$res = mysqli_query($mysqli, "SET NAMES utf8 COLLATE utf8_general_ci");
$WHERE = '';
print_r($_REQUEST);
if ($_REQUEST ['ISBN'] != '') {
    $WHERE .= "AND isbn LIKE '%" . $_REQUEST ['ISBN'] . "%'";
}
if ($_REQUEST ['name'] != '') {
    $WHERE .= "AND name LIKE '%" . $_REQUEST ['name'] . "%'";
}
if ($_REQUEST ['author'] != '') {
    $WHERE .= "AND author LIKE '%" . $_REQUEST ['author'] . "%'";
}
$res = mysqli_query($mysqli, "SELECT *from books WHERE 1  $WHERE");
echo "SELECT *from books WHERE 1  $WHERE";
echo mysqli_error($mysqli);
while ($row = mysqli_fetch_assoc($res)) {
    //print_r($row);	
    ?>

    <tbody><tr>
    	<td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['author'] ?></td>
        <td><?= $row['year'] ?></td>
        <td><?= $row['isbn'] ?></td>
        <td><?= $row['genre'] ?></td>
    </tr></tbody>

    <?php
};
?>
</table>


</body>
</html>
