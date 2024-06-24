<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Permission Homepage</title>
</head>
<body>
    <h1>CRUD Permission Homepage</h1>
    <?php
    if(is_null($allPermission)):
    ?>
    <h2>No permission found</h2>
        <?php
        else:
            foreach($allPermission as $item):
        ?>
        <h3>ID: <?= $item->getPermissionName() ?>Intitulé: <?= $item->getPermissionName() ?></h3>
        <?php
            endforeach;
        endif;
    ?>
</body>
</html>