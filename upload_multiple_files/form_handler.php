<?php

function start()
{
    $addGood = 0;
    $addBad = 0;
    $files = $_FILES['picture'];
   var_dump($files);
    $my_count = count($files['name']); // количество файлов, которое хотим загрузить
    echo"Количество загружаемых файлов = $my_count<br>";

    for ($i = 0; $i < $my_count; $i++) {
        $name = $files['name'][$i];


        //определяем расширение очередного файла
        $eth = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
//        var_dump($eth);

        //Если произошла ошибка(не тот тип или размер - выходим)
        if ($err = chkType($eth)){
            printErrors($name, $err);
            $addBad++;
            continue;
        }
        else if($err = chkSize(3000,$files['size'][$i])){
            printErrors($name, $err);
            $addBad++;
            continue;
        }


        //хэшируем строки и приклеиваем расширение
        $new_name = md5($files['name'][$i].microtime().rand(0,99)) . ".$eth";
//        var_dump($new_name);

        //перемещаем из временной папки
        if(move_uploaded_file($files['tmp_name'][$i], "img/$new_name")){
           echo "Файл  $name успешно загружен<br>";
           $addGood++;
        }
        else{
            echo "Файл  $name загрузить не удалось(отстутвует папка)<br>";
        }
    }

    echo "Успешно загружено $addGood из $my_count<br>";
    echo "Ошибка при загрузке в $addBad из $my_count";
}

function chkType($eth){
    $goodType = ['png', 'jpg'];
    if(!in_array($eth, $goodType)){
        return 9;
    }
    return 0;
}

function chkSize($sizeGood, $size){
    if($size > $sizeGood){
        return 2;
    }
    return 0;
}

function printErrors($nameFile, $err) {
    switch ($err){
        case 1:
        case 2:
            echo "Недопустимый размер файла $nameFile<br>";
            break;
        case 3:
        case 4:
        case 8:
            echo "Файл $nameFile не был загружен<br>" ;
            break;
        case 6:
            echo "Файл $nameFile не был загружен, т.к. отсутсвует временная папка<br>";
            break;
        case 7:
            echo "Не удалось записать файл $nameFile на диск<br>";
            break;
        //не нашла код ошибки, который отвечает за тип
        case 9:
            echo "Недопустимый формат $nameFile<br>";
            break;
    }
}


start();