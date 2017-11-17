<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$aviableMusic = ['Pop', 'Electrohouse', 'Rnb'];
$peopleNamesAviable = ['Kate', 'Peter', 'Michel', 'Mary'];
$peopleNames = [];
$peopleCount = mt_rand(1,5);
$people = [];


include_once 'Music.php';
include_once 'People.php';
foreach ($aviableMusic as $style){
    include_once "Styles/$style.php";
}

//создаем гостей
for ($i = 0; $i < $peopleCount; $i++){
    $j = 0;
    $name = $peopleNamesAviable[mt_rand(0, count($peopleNamesAviable) - 1)];
    while (in_array($name . $j, $peopleNames)){
        $j++;
    }
    $peopleNames[$i] = $name . $j;
    $people[] = new People($peopleNames[$i], $aviableMusic[mt_rand(0, count($aviableMusic) - 1)]);
}

echo 'We have ' . $peopleCount . ' guest(s)';echo "\r\n";

while (true){
    $music = new $aviableMusic[mt_rand(0, count($aviableMusic) - 1)];
    echo '--- Now playing --- '; $music->play();
    echo "\r\n";

    $peopleDancingCount = 0;
    $peopleDrinkingCount = 0;

    foreach ($people as $i => $guest){
        $people[$i]->state = ($guest->preference == $music->getStyle())?'dansing':'drinking';

        if ($people[$i]->state == 'dansing'){
            echo $guest->name , ' is dansing';
            $peopleDancingCount++;
        } else {
            echo $guest->name , ' gonna drink';
            $peopleDrinkingCount++;
        }
        echo "\r\n";
    }
    echo 'Resume: ';
    echo $peopleDancingCount, ' guests are dancing, ', $peopleDrinkingCount, ' will be soon drunk!', "\r\n";
    sleep(5);
}
?>