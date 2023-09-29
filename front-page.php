<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= wp_head() ?>
</head>
<body>
    <?= get_header() ?>

    <?= get_template_part('partials/profile') ?>

    <?= get_template_part('partials/cases') ?>

    <?= get_footer() ?>
</body>
</html>