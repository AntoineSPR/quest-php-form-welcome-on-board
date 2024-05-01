<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $results= array_map('htmlentities', array_map('trim', $_POST));

    $name = $results["clientName"];
    $email = $results["clientEmail"];
    $subject = $results["subject"];
    $message = $results["message"];

    if (empty($name)){
        $errors[] = "Please stop messing around with the inspector and enter your name.";
    }

    if (empty($email)){
        $errors[] = "Please stop messing around with the inspector and enter your email.";
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = "Listen here you little fuck, this is NOT a valid email adress.";
    }

    if (strlen($message) < 30) {
        $errors[] = "Come on, you can explain with a little bit more words, eh?";
    }

    if (empty($errors)){
        header("Location: result.php");
        exit();
    }
}