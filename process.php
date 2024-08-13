<?php
include("connect.php");
if(isset($_POST["create"])){ 
 $title = mysqli_real_escape_string($conn, $_POST["title"]);
 $author = mysqli_real_escape_string($conn, $_POST["author"]);
 $type = mysqli_real_escape_string($conn, $_POST["type"]);
 $description = mysqli_real_escape_string($conn, $_POST["description"]);
 $sqlInsert = "INSERT INTO books(title , author , type , description) VALUES ('$title','$author','$type', '$description')";
 if (mysqli_query($conn, $sqlInsert)) {
   /// echo "Record Inserted";
   session_start();
        $_SESSION["create"] = "Book Added Successfully!";
        header("Location:index.php");
 } else {

    die("Something went wrong");
 }
}
 ////post for edit - edit is the only sectionally where you get get both get and post

 if(isset($_POST["edit"])){
   $title = mysqli_real_escape_string($conn, $_POST["title"]);
   $author = mysqli_real_escape_string($conn, $_POST["author"]);
   $type = mysqli_real_escape_string($conn, $_POST["type"]);
   $description = mysqli_real_escape_string($conn, $_POST["description"]);
   $id = mysqli_real_escape_string($conn, $_POST["id"]);
   $sqlUpdate = "UPDATE books SET title = '$title', type = '$type', author = '$author', description = '$description' WHERE id='$id'";
   if (mysqli_query($conn, $sqlUpdate)) {
      ///echo "Record Updated";
      session_start();
        $_SESSION["update"] = "Book Updated Successfully!";
        header("Location:index.php");
   } else {
  
      die("Something went wrong");
   }



 }

?>