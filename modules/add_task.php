<?php
require_once '../configs/pdo_ini.php';

$uploaddir = '../';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";

if($_COOKIE["position"] == 1) {

    $file = new SplFileObject('../text.txt');
    while (!$file->eof()) {
        $line = $file->fgets();
        list($cat_name, $time_created, $title, $description) = explode(';', $line);

        $sth = $pdo->prepare("SELECT cat_name, title FROM lists WHERE `cat_name`='$cat_name' and `title`='$title'");
var_dump($sth);
        $sth->setFetchMode(\PDO::FETCH_ASSOC);
        $sth->execute();
        var_dump($sth);
        $lists = $sth->fetchAll();
        var_dump($lists);
        if ($lists == null) {
            $sth = $pdo->prepare("INSERT INTO lists (`cat_name`, `time_created`, `title`, `description`) VALUES (?,?,?,?)");
            $sth->bindValue(1, $cat_name, PDO::PARAM_STR);
            $sth->bindValue(2, $time_created, PDO::PARAM_STR);
            $sth->bindValue(3, $title, PDO::PARAM_STR);
            $sth->bindValue(4, $description, PDO::PARAM_STR);
            $sth->execute();
        }
    }
}
header ("location: /");
