<?php
    include("./libraires/database.php");

    if(isset($_GET["id"])){
        $con = getPdo();
        $id= $_GET["id"];
        $query = $con->prepare("SELECT * FROM books WHERE id =$id");
        $query->execute();
        $book = $query->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Book details</title>
    <style>
        .book-details{
            background: #f5f5f5;
            padding: 50px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Book Details</h1>   
            <div>
                <h3>
                <a href="index.php" class="btn btn-primary">Back</a>
                </h3>
                
            </div>
        </header>
        <div class="book-details my-4">
            <h3>Title</h3>
            <p><?=$book["title"]?></p>
            <h3>Author</h3>
            <p><?=$book["author"]?></p>
            <h3>Type</h3>
            <p><?=$book["type"]?></p>
            <h3>Description</h3>
            <p><?=$book["description"] ?></p>
        </div>
    </div>
    
</body>
</html>