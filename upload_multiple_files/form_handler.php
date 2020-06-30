<?php

function start()
{
    $files = $_FILES['picture'];
    var_dump($files);
    $my_count = count($files['name']); // количество файлов, которое хотим загрузить
    echo"Количество загружаемых файлов = $my_count";

    for ($i = 0; $i < $my_count; $i++) {


        //определяем расширение очередного файла
        $eth = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
        var_dump($eth);

        //Если произошла ошибка(не тот тип или размер - выходим)
        if (chkType() || chkSize()){

        }


        //хэшируем строки и приклеиваем расширение
        $name = $files['name'][$i];
        $new_name = md5($files['name'][$i].microtime().rand(0,99)) . ".$eth";
        var_dump($new_name);

        //перемещаем из временной папки
        if(move_uploaded_file($files['tmp_name'][$i], "img/$new_name")){
           echo "Файл  $name успешно загружен";
        }
        else{
            echo "Файл  $name загрузить не удалось(отстутвует папка)";
        }
    }
}

function chkType(){
   // $err_type = 0;
    //return $err_type; // вернет код ошибки и 0 - если все ок
    return 0;
}

function chkSize(){
    //$err_type = 0;
   // return $err_type; // вернет код ошибки и 0 - если все ок
    return 0;
}

function printErrors($nameFile, $err) {
    switch ($err){
        case 1:
        case 2:
            echo "Недопустимый размер файла $nameFile";
            break;
        case 3:
        case 4:
        case 8:
            echo "Файл $nameFile не был загружен" ;
            break;
        case 6:
            echo "Файл $nameFile не был загружен, т.к. отсутсвует временная папка";
            break;
        case 7:
            echo "Не удалось записать файл $nameFile на диск";
            break;
    }
}


start();