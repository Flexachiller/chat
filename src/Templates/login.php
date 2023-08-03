<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $style = ($theme == 'night') ? 'style-night.css' : 'style.css'?>
    <link rel="stylesheet" href="<?php echo $style;?>">
</head>
<body>
    <form action="" method="post">
        <input type="text" name="user_login">
        <img src="<?php echo $captcha?>" alt="">
        <input type="text" name="captcha">
        <input type="submit" value="Login">
    </form>
</body>
</html>