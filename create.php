<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Add New book</h1>   
            <div>
                <h3>
                <a href="index.php" class="btn btn-primary">Back</a>
                </h3>
                
            </div>
        </header>
        <form action="process.php" method="post" enctype="multipart/form-data">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="title" placeholder="Book title">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="author" placeholder="Book author">
            </div>
            <div class="form-element my-4">
               <select name="type" class="form-control" id="">
                <option value="">Select book type</option>
                <option value="Adventure">Adventure</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Horor">Horor</option>
               </select>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="description" placeholder="Book description">
            </div>
            <div class="form-element my-4">
                <input type="file" class="form-control" name="image" placeholder="Book image">
            </div>
            <div class="form-element">
                <input type="submit" class="btn btn-success" class="btn btn-success" name="create" value="Add Book">
            </div>
        </form>
    </div>
</body>
</html>