<?php
$my_link = $_POST['link'];
//echo "$my_link<br>";

$my_file = 'links.txt';
fopen($my_file,'a');
if(inFile($my_link, $my_file));
else create($my_link, $my_file);


function create($url,$my_file){
    $res = null;
    $my_fileNew = file($my_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $arrUrl = parse_url($url);
    $res = $arrUrl["scheme"] . '://' . $arrUrl["host"];
    $flag = false;
    while(1) {
        
        foreach ($my_fileNew as $l){
            $arr = explode('#', $l);
            if ($arr[1] === $res) {
                $res = $arrUrl["scheme"] . '://' .rand(1,1000). $arrUrl["host"];
                $flag=true;
                break;
            }
        }
        if(!$flag) break;
        else $flag = false;
    }

    echo "new link $res";
    file_put_contents($my_file, "$url".'#'."$res".PHP_EOL, FILE_APPEND | LOCK_EX);

}

function inFile($url, $my_file){

    var_dump($url);
    $my_fileNew = file($my_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    var_dump($url);
    foreach ($my_fileNew as $l){
       $arr = explode('#', $l);
       if ($arr[0] === $url) {
           echo "Короткая ссылка $arr[1]";
           return $arr[1];
       }
    }
    return false;
}
