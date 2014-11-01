<?php
include 'app/Model/ProductSessionHandler.php';
$productHandler = new ProductSessionHandler();

var_dump($_SESSION);
if( isset($_SESSION['counter']) )
{
    $_SESSION['counter']++;
}
else
{
    $_SESSION['counter'] = 1;
}
echo " Вы обновили эту страницу ".$_SESSION['counter']." раз. ";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $data['title']; ?> | Creepy_Coders</title>
    <link href="/web/css/common.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/web/js/common.js"></script>
</head>
<body>
    <h1><?php echo $data['title']; ?></h1>

    <?php if ($data['sidebar'] == true) : ?>
        <aside>sidebar html</aside>
    <?php endif; ?>

    <?php (!is_null($CONTENT_TEMPLATE)) ? include 'app/views/content-templates/' . $CONTENT_TEMPLATE : false ?>
</body>
</html>