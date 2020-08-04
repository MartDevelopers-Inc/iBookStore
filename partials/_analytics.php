<?php
/*
    Perform all analytics here
*/

//1. Staffs
$query ="SELECT COUNT(*) FROM `iBookStore_HRM` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($staff);
$stmt->fetch();
$stmt->close();

//2. Book Categories
$query ="SELECT COUNT(*) FROM `iBookStore_book_categories` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($BookCategories);
$stmt->fetch();
$stmt->close();

//3. Total Books
$query ="SELECT SUM(b_count) FROM `iBookStore_books` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($Books);
$stmt->fetch();
$stmt->close();

//4. Allowed Login Staffs
$query ="SELECT COUNT(*) FROM `iBookStore_HRM` WHERE allow_login = '1' ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($staffwithlogin);
$stmt->fetch();
$stmt->close();


//5. Pending Password Resets
$query ="SELECT COUNT(*) FROM `iBookStore_Password_Resets` WHERE reset_status = 'Pending' ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($pendingResets);
$stmt->fetch();
$stmt->close();


//6. Total Sales This one has a bug
$query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();

