<!doctype html>

<title>My Bolg</title>
<link rel="stylesheet" href="/app.css">

<body>
    <?php foreach ($posts as $post) : ?>
        <article>
            <?= $post ?>
        </article>
    <?php endforeach; ?>
</body>
