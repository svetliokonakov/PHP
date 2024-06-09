<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Insert Your Data Here:</h1>

    <form action="form-handling.php" method="POST">
        <label for="firstname">First Name</label>
        <input type="text" required id="firstname" name="firstname">

        <label for="lastname">Last Name</label>
        <input type="text" required id="lastname" name="lastname">

        <label for="email">Email</label>
        <input type="text" required id="email" name="email">

        <input type="submit">
    </form>
</body>
</html>