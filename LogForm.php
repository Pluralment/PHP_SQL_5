<!DOCTYPE html>
<html lang="ru">
<head>
    <link href="FormStyles.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Форма регистрации/авторизации</title>
</head>
<body>
<div class="formContainer">
    <form action="EmailCheck.php" method="post">
        <h2>Регистрация</h2>
        <div class="formField multiInput">
            <label for="name">Name</label>
            <input type="text" name="first-name" id="name" placeholder="Имя" value="">
        </div>
        <div class="formField inputRight">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Youremail@gmail.com" value="">
        </div>
        <div class="formField inputRight submitField">
            <input type="submit" value="Отправить">
        </div>
    </form>
</div>
</body>
</html>