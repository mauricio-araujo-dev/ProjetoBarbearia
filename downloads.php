<html>
<head>
<title>Site</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
<?php
$dir = "./downloads";
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
    echo "<li><a href='" . $dir . "/" . $filename . "'>" . $filename . "</a></li>";
}
?>
</body>
</html>


