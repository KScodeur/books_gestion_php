<?php
function getPdo(){
    $dbHost = "localhost";
    $dbUser = "kscodeur";
    $dbPass = "Pacome_9852";
    $dbName = "crudphp";
    $dbPort = "3306";

    try{
        $con= new PDO ('mysql:host='.$dbHost.':'.$dbPort.';dbname='.$dbName.';charset=utf8',$dbUser,$dbPass);
    }catch(Exception $e){
        die('Erreur : ' .$e -> getMessage());
    };
    return $con;
    
}

function allBooks(){
    $con = getPdo();
    $query= $con->prepare("SELECT * FROM books");
    $query->execute([]);
    $books=$query->fetchAll();
    return $books;
}

function finBook($id){
    $con = getPdo();
    $id= $_GET["id"];
    $query = $con->prepare("SELECT * FROM books WHERE id =$id");
    $query->execute();
    $book = $query->fetch();
    return $book;
}

function udpdateBook($id){
    $con = getPdo();
    $stmt = $con->prepare("UPDATE books SET  title=:title, author=:author, type=:type, description=:description WHERE id=:id");
    $array=[
        'id'=>$id,
        'title'=>$_POST['title'],
        'author'=>$_POST['author'],
        'type'=>$_POST['type'],
        'description'=>$_POST['description'],
        //'image'=>$image
    ];   
    $result = $stmt->execute($array);
    return $result;
}

function deleteBook($id){
    $con =getPdo();
    $sql=$con->prepare("DELETE FROM books WHERE id=:?");
    $result=$sql->execute($id);
    return $result;
}
?>

