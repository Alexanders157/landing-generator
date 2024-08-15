<?php

$template = '
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>
    <h1>{title}</h1>
    <p>{description}</p>
</body>
</html>
';

$landingsDir = 'landings';

if (!is_dir($landingsDir)) {
    mkdir($landingsDir, 0777, true);
}

for ($i = 1; $i <= 150; $i++) {
    $title = "Лендинг $i";
    $description = "Описание лендинга $i";

    $content = str_replace(['{title}', '{description}'], [$title, $description], $template);

    $fileName = "landing-$i.html";
    $filePath = $landingsDir . '/' . $fileName;

    file_put_contents($filePath, $content);
    echo "Лендинг $i сохранен в $filePath.\n";
}