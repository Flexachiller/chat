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
    <?php
        foreach($messages as $msg){
            echo "<div class='message'>";
            echo "<div class='time'>" . date('d.m.Y H:i', $msg['time']) . "</div>";
            echo "<div class='login'>" . htmlspecialchars($msg['login']) . "</div>";
            echo "<div class='message-text'>" . htmlspecialchars($msg['message']) . "</div>";
            echo "</div>";
        }
    ?>
            <form action="" method="post">
                <input type="text" name="user_message">
                <input type="submit" value="Send">
            </form>

</body>
</html>