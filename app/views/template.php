<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Diary, the best website of travels">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/icons/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php $thereIsNavbarCart ? require_once '../app/views/components/navbarCart.php' : ''; ?>
    <?php $thereIsHeader ? require_once '../app/views/components/header.php' : ''; ?>    
    <main id="<?= isset($mainId) ? $mainId : "" ?>" >
        <?php require_once '../app/views/'.$controllerInstance->view; ?>
    </main>
    <?php $thereIsFooter ? require_once '../app/views/components/footer.php' : ''; ?>  
    <script type="module" src="/assets/js/app.js"></script>
    <script src="https://kit.fontawesome.com/a274ff346d.js" crossorigin="anonymous"></script>
</body>
</html>