<?php
    if(isset($_GET["id"])){
        include("libraires/database.php");
        $id= $_GET["id"];
        $book = finBook($id);  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Edit Book</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit book </h1>   
            <div>
                <h3>
                <a href="index.php" class="btn btn-primary">Back</a>
                </h3>
                
            </div>
        </header>
        
        <form action="process.php" method="post">
            <div class="form-element my-4"> 
                <input type="text" class="form-control" name="title" class="f" value="<?=$book['title']?>" placeholder="Book title">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="author" value="<?=$book['author']?>" placeholder="Book author">
            </div>
            <div class="form-element my-4">
               <select name="type" id="" class="form-control">
                <option value="">Select book type</option>
                <option value="Adventure" name="type" <?=$book['type']=="Adventure" ? 'selected':''?>>Adventure</option>
                <option value="Fantasy" name="type" <?=$book['type']=="Fantasy" ? 'selected':''?>>Fantasy</option>
                <option value="Horor" name="type" <?=$book['type']=="Horor" ? 'selected':''?>>Horor</option>
               </select>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="description" value="<?=$book['description']?>" placeholder="Book description">
            </div>
            <div class="form-element my-4">
                <input type="file" class="form-control" name="image"?>
                <input type="hidden" name="image_old" value="<?=$book['image']?>" placeholder="Book image">
                <img src="<?="uploads/".$book['image']?>" width="50" alt="">
            </div>
            <input type="hidden" name="id" value="<?=$book['id']?>">
            <div>
                <input type="submit" class="btn btn-success" name="edit" value="Edit Book">
            </div>
        </form>
    </div>
</body>
</html>