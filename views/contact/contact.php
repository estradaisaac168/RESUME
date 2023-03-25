<main class="container-fluid bg-light main">
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3">
            <section class="section-about">
                <h1 class="title text-center">Contactame</h1>

                <?php
                include_once __DIR__ . '/../components/alerts.php';
                ?>

                <form action="/contact" method="POST">
                    <?php
                    include_once __DIR__ . '/form.php';
                    ?>

                    <input type="submit" value='Enviar' class="btn btn-primary">
                </form>
            </section>
        </div>
    </div>
</main>