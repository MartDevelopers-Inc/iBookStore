<?php
include('config/pdoconfig.php');

if(!empty($_POST["bookISBN"])) 
{
    //Get Book Title using Book ISBN NUMBER
    $id=$_POST['bookISBN'];
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
