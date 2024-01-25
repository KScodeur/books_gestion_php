<?php
    include("libraires/database.php");
    $id = $_GET['id'];

    if(isset($id)){
        $result=deleteBook($id);
        if($result){
            session_start();
            $_SESSION["delete"]= "Book Deleted Successfully";
            header("location: index.php");
        }else{
            echo 'pas bon';
        }

    }


?>