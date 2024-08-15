<?php
$ftpHost = '';
$ftpUser = '';
$ftpPass = '';
$ftpDir = '';

$ftp = ftp_connect($ftpHost);
ftp_login($ftp, $ftpUser, $ftpPass);
ftp_chdir($ftp, $ftpDir);

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

for ($i = 1; $i <= 150; $i++) {
    $title = "Лендинг $i";
    $description = "Описание лендинга $i";

    $content = str_replace(['{title}', '{description}'], [$title, $description], $template);

    $fileName = "landing-$i.html";
    $file = fopen($fileName, 'w');
    fwrite($file, $content);
    fclose($file);

    ftp_put($ftp, $fileName, $fileName, FTP_BINARY);
    echo "Лендинг $i загружен на FTP сервер.\n";
}

ftp_close($ftp);
