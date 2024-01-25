<?php
require_once("libraires/database.php");
$con = getPdo();
if(isset($_POST["create"])){

    $title =htmlspecialchars($_POST["title"]);
    $author =htmlspecialchars($_POST["author"]);
    $type =htmlspecialchars($_POST["type"]);
    $description =htmlspecialchars($_POST["description"]);
    $image =htmlspecialchars($_FILES["image"]['name']);
    var_dump($image);
    
    $sql = "INSERT INTO books (`title`, `author`, `type`, `description`, `image`) 
            VALUES(:title , :author, :type, :description, :image)";
    $query =$con->prepare($sql);
    $array=[
        'title'=>$title,
        'author'=>$author,
        'type'=>$type,
        'description'=>$description,
        'image'=>$image
    ];
    $result=$query->execute($array);

    if($result){
        move_uploaded_file($_FILES["image"]['tmp_name'], "uploads/".$_FILES["image"]['name']);
        session_start();
        $_SESSION["create"]= "Book Added Successfully";
        header("location: index.php");
    }else{
        $_SESSION["create"]= "Book Not Added Successfully";
        header("location: index.php");
    }
    
};

if(isset($_POST["edit"])){
    $con = getPdo();
    $id =htmlspecialchars($_POST["id"]);
    $title =htmlspecialchars($_POST["title"]);
    $author =htmlspecialchars($_POST["author"]);
    $type =htmlspecialchars($_POST["type"]);
    $description =htmlspecialchars($_POST["description"]);
    //$new_image =$_FILES["image"]['name'];
    //$image_old =$_POST["image"];
    //var_dump($image);
    //vreification des images
    /*if($new_image !=''){
        $update_filename =$new_image;
    }else{
        $update_filename =$old_image;
    }*/

    $result =udpdateBook($id);
 
    if($result){
       // move_uploaded_file($_FILES["image"]['tmp_name'], "uploads/".$_FILES["image"]['name']);
        session_start();
        $_SESSION["update"]= "Book Update Successfully";
        header("location: index.php");
    }else{echo 'pas bon';}
}


?>