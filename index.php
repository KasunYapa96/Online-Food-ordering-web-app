<?php
//connect to DB
$conn = mysqli_connect('localhost', 'kasun', 'Kasun1996', 'kassa_pizza');
//check the connection

if (!$conn) {
    echo 'connection error' . mysqli_connect_error();
}

//write query for all pizzas
$sql = 'SELECT title,ingredients,id FROM pizzas ORDER BY created_at';

//Make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <title>Ninja Pizza</title>

</head>


<?php include('templates/header.php'); ?>

<h4 class="center grey-text">pizzas</h4>
<div class="row">

    <?php foreach ($pizzas as $pizza) { ?>
        <div class="col s6 md3">
            <div class="card z-depth-0">
                <div class="card content center">
                    <h6><?php echo $pizza['title']; ?></h6>
                    <div><?php echo $pizza['ingredients']; ?></div>
                </div>
                <div class="card-action right-align">
                    <a href="#" class="brand-text" style="font-size: 20px;">More info</a>
                </div>
            </div>
        </div>
    <?php } ?>

</div>

<?php include('templates/footer.php'); ?>


</html>