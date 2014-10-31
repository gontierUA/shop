<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $data['title']; ?> | Creepy_Coders</title>
    <link href="/web/css/common.css" rel="stylesheet">
</head>
<body>
    <h1><?php echo $data['title']; ?></h1>

    <?php if ($data['sidebar'] == true) : ?>
        <aside>sidebar html</aside>
    <?php endif; ?>

    <?php (!is_null($CONTENT_TEMPLATE)) ? include 'app/views/content-templates/' . $CONTENT_TEMPLATE : false ?>
</body>
</html>