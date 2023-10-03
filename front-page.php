<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <?= wp_head() ?>
</head>
<body>
    <?= get_header() ?>

    <?= get_template_part('partials/profile') ?>

    <?= get_template_part('partials/cases') ?>

    <?= get_footer() ?>
</body>
</html>