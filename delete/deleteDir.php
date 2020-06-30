<?php
mkdir('myDir');
function create($dir){  //функция добавления файлов и директорий
    $nameDir = null;
    $cntFile = rand(1,3);
    echo "cntFile = $cntFile<br>";
    $cntDir = rand(1,2);
    echo "cntDir = $cntDir<br>";

    for($i=0; $i < $cntFile; $i++){
        $nameFile = md5(microtime() . rand(1,10)) . '.txt';
        $fr = fopen("$dir/" . $nameFile, 'w');
    }

    for($i=0; $i < $cntDir; $i++){
        $nameDir= md5(microtime() . rand(1,5));
        mkdir("$dir/".$nameDir);
    }
    return "$dir/".$nameDir; // в одну директорию будем добавлять еще доп.файлы и директории
}



//удаление директории
//(чтобы проверить работоспособность функции - надо закомментировать вызов функции delDir на 53 строчке)
function delDir($nameDir){
    if(is_dir($nameDir)) {
        $dh = opendir($nameDir);
        while (($data = readdir($dh)) !== false) {
            if ($data != '.' && $data != '..') {
                //var_dump($data);
                if (is_file("$nameDir/" . $data))
                    unlink("$nameDir/" . $data);
                else
                    delDir("$nameDir/" . "$data");

            }
        }
        closedir($dh); // закрытие директории
        // удаляем текущую папку
        if(file_exists($nameDir)){
            rmdir($nameDir);
        }
    }
    else
        echo 'Введенные данные - не директория';

    return 0;
}
$new = create('myDir');
$new1 = create("$new");
$new2 = create("$new1");
delDir('myDir');