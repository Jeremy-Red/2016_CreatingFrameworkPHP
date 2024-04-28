<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet"
          href="css/main.css">
    <title>Default | <?= $title ?></title>
</head>

<body>
    <div class="container">
        <ul class="nav nav-underline">
            <?php foreach ($menu as $item): ?>
                <li class="nav-item">
                    <a class="nav-link"
                       href="category/<?= $item['id'] ?>">
                        <?= $item['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?= $content ?>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap/js/bootstrap.js"></script>
</body>

</html>