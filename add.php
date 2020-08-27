<?php

$title = $email = $ingredients = ''; //Empty string to prevent error in text boxes 1st time page loading

$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    // echo $_GET['email'];
    // echo $_GET['title'];
    // echo $_GET['ingredients'];

    if (empty($_POST['email'])) {
        $errors['email'] = 'An E-mail is required  <br/>';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be valid';
        }
    }

    if (empty($_POST['title'])) {
        $errors['title'] = 'A Title is required  <br/>';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
            //Learn about "regex" for more validation types
        }
    }
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'At least one ingredient is required  <br/>';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'ingredients must be letters and spaces only';
            //Learn about "regex" for more validation types
        }
    }
    if (array_filter($errors)) {
        //echo 'Errors in the form';
    } else {
        //echo 'Form is valid';
        header('Location: index.php');
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ninja Pizza</title>

</head>


<?php include('templates/header.php'); ?>

<section class="container grey-text">

    <h4 class="center">Add a Pizza</h4>
    <form class="white" action="add.php" method="POST">

        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <div class="red-text"> <?php echo $errors['email'] ?></div>

        <!-- <value="<?php echo $email ?>"  -: prevents clearing all typed texts after an error(remains the correct text fields)-->
        <!-- <?php echo $errors['email'] ?> -: Show erros in the $email array object-->

        <label>Your Pizza Title:</label>
        <input type="text" name="title" value="<?php echo $title ?>">
        <div class="red-text"> <?php echo $errors['title'] ?></div>
        <label>Your Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo $ingredients  ?>">
        <div class="red-text">
            <div class="red-text"> <?php echo $errors['ingredients'] ?></div>
        </div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">

        </div>

    </form>

</section>




<?php include('templates/footer.php'); ?>



</html>