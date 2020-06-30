<!doctype html>

<html lang="ru">

<head>

    <meta charset="UTF-8">
    <title>Загрузка нескольких файлов</title>
    <style>
        form div {
            padding: 10px 10px;
            margin-bottom: 20px;
            background-color: lightblue;
        }
    </style>
</head>
<body>
<form method="post" action="form_handler.php" enctype="multipart/form-data">
    <!-- enctype="multipart/form-data" - атрибут необходим при загрузке файлов -->
    <div>
        <!-- для загрузки нескольких файлов -->
        <input type="file" accept="image/*" multiple name="picture[]">
    </div>
    <div>
        <input type="submit" value="Загрузить">
    </div>
</form>
</body>
</html>
