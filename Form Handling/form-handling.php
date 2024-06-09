<?php
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);

    if ( !empty( $firstname ) && !empty( $lastname ) && !empty( $email ) ) {
        echo "Hello {$firstname} {$lastname}. Your email is: {$email}.";
    } else {
        throw new Exception('Please fill all fields!');
        header('Location: index.php');
    }

} else {
    header('Location: index.php');
}