<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen</title>

    <link rel="icon" type="image/x-icon" href="../build/img/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../build/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../build/css/app.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6GP4DZKG6V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-6GP4DZKG6V');
    </script>
</head>

<body class="bg-light">

    <nav class="nav bg-danger">
        <ul class="ul">
            <li class="li"><a href="/">Sobre mi</a></li>
            <li class="li"><a href="/certificates">Diplomas</a></li>
            <li class="li"><a href="/contact">Contactame</a></li>
        </ul>

        <ul class="socials bg-secondary">
            <li class="li li-social"><a href="/"><i class="bi bi-github"></i></a></li>
            <li class="li li-social"><a href="https://api.whatsapp.com/send?phone=78191241&text=Hola%20, me%20gustaria%20contactarte."><i class="bi bi-whatsapp"></i></a></li>
            <li class="li li-social"><a href="https://www.linkedin.com/in/isaac-estrada-04ab48175/"><i class="bi bi-linkedin"></i></a></li>
            <li class="li li-social"><a href="https://www.facebook.com/isaac.estrada.71404976"><i class="bi bi-facebook"></i></a></li>
        </ul>
    </nav>

    <?php echo $content; ?>

    <a href="#" class="to-top">
        <i class="bi bi-arrow-up-circle"></i>
    </a>

    <script src="/js/app.js"></script>
</body>

</html>