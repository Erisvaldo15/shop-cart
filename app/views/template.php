<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Diary, the best website of travels">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="shortcut icon" href="/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body>
    <?php $thereIsNavbarCart ? require_once "../app/views/components/navbarCart.php" : ""; ?>
    <?php $thereIsHeader ? require_once "../app/views/components/header.php" : ""; ?>
    <main <?= isset($attribute) ? $attribute : '' ?>>
        <?php require_once "../app/views/" . $controllerInstance->view; ?>
    </main>
    <?php $thereIsFooter ? require_once "../app/views/components/footer.php" : ""; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="module" src="./assets/js/app.js"></script>
    <script src="https://kit.fontawesome.com/a274ff346d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>