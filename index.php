<?php
include("libraires/database.php");
$books = allBooks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <title>Book List</title>
   
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Book List</h1>   
            <div>
                <h3>
                    <a href="create.php" class="btn btn-primary">Add New Book</a>
                </h3>
                
            </div>
        </header>

        <?php
            session_start();
            if(isset($_SESSION["create"])){
        ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION["create"];
                    unset ($_SESSION["create"]);
                    ?>
                </div>
        <?php } ?>
        
        <?php if(isset($_SESSION["update"])){?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["update"];
                unset ($_SESSION["update"]);
                ?>
            </div>
        <?php } ?>

        <?php
            session_start();
            if(isset($_SESSION["delete"])){
        ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["delete"];
                unset ($_SESSION["delete"]);
                ?>
            </div>
        <?php } ?>
        <table class="table table-bordered">
            <thead >
                <tr class="text-center">
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book):?>
                    <tr class="text-center">
                        <td><?=$index++?></td>
                        <td><?=$book['title']?></td>
                        <td><?=$book['author']?></td>
                        <td><?=$book['type']?></td>
                        <td><?=$book['description']?></td>
                        <td>
                            <img src="<?="uploads/".$book['image']?>" width="50" alt="">
                        </td>
                        <td class="d-flex justify-content-around">
                            <a href="view.php?id=<?=$book["id"]?>" class="btn btn-info">Read more</a>
                            <a href="edit.php?id=<?=$book["id"]?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?=$book["id"]?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</html>
