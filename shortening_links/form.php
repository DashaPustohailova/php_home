<!doctype html>

<html lang="ru">

<head>

    <meta charset="UTF-8">
    <title>Сокращатель ссылок</title>
    <style>
        form div {
            padding: 10px 10px;
            margin-bottom: 20px;
            background-color: lightblue;
        }
    </style>
</head>
<body>
<form method="post" action="links.php">
    <!-- enctype="multipart/form-data" - атрибут необходим при загрузке файлов -->
    <div>
        <!-- для загрузки нескольких файлов -->
        <input type="text" name="link">
    </div>
    <div>
        <input type="submit" value="Загрузить">
    </div>
</form>
</body>
</html>
