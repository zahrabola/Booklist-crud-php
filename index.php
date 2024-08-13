<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The booklist - Main page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Book List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Book</a>
            </div>
        </header>
        <?php
        ///session - last part 
        session_start();
        if (isset($_SESSION["create"])) {
            ///create
            ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["create"];
                ?>
            </div>
            <?php
            unset($_SESSION["create"]);
        }
        ?>


        <?php
        if (isset($_SESSION["update"])) {
            ///update
            ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["update"];
                ?>
            </div>
            <?php
            unset($_SESSION["update"]);
        }
        ?>


        <?php
        if (isset($_SESSION["delete"])) {
            ///delete
            ?>
            <div class="alert alert-success">
                <?php echo $_SESSION["delete"];
                ?>
            </div>

            <?php
            unset($_SESSION["delete"]);
        }

        ?>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include ("connect.php");
                    $sqlSelect = "SELECT * FROM books";
                    $result = mysqli_query($conn, $sqlSelect);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ///print_r($row);
                        ?>

                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Read More</a>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>


                        </tr>

                        <?php

                    }
                    ?>


                </tbody>
            </table>
        </div>

    </div>
</body>

</html>