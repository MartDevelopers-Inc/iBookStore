<?php
include('config/pdoconfig.php');

if(!empty($_POST["bookISBN"])) 
{
    $id=$_POST['bookISBN'];
    $stmt = $DB_con->prepare("SELECT * FROM  iBookStore_books WHERE b_isbn = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['b_id']); ?>
<?php
}
}


if(!empty($_POST["book_ID"])) 
{
    $id=$_POST['book_ID'];
    $stmt = $DB_con->prepare("SELECT * FROM  iBookStore_books WHERE b_isbn = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['b_price']); ?>
<?php
}
}

if(!empty($_POST["bookPrice"])) 
{
    $id=$_POST['bookPrice'];
    $stmt = $DB_con->prepare("SELECT * FROM  iBookStore_books WHERE b_isbn = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['b_title']); ?>
<?php
}
}

