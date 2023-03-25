<main class="container-fluid bg-light main">
    <div class="row">
        <div class="left col-sm-12 col-md-4">
            <section class="section-about">
                <h1 class="title"><i class="bi bi-file-person-fill"></i> Sobre mi</h1>
                <div class="card">
                    <img class="card-img-top img-fluid" src="././build/img/<?php echo $profile->image ?? null ?>" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $profile->name ?? null; ?> <span> <?php echo $profile->lastname ?? null; ?></span></h4>

                        <p>Profesion: <span><?php echo $profile->profession ?? null; ?></span></p>

                        <p><?php echo $profile->description ?? null; ?></p>

                        <p>Edad: <span><?php echo $profile->age ?? null; ?></span></p>

                        <p>Telefono: <span><?php echo $profile->phone ?? null; ?></span></p>

                        <p>Email: <span><?php echo $profile->email ?? null; ?></span></p>

                        <!-- <p class="card-text">Soy estudiante de Ingenieria en Sistemas, programador Jr.
                                Me gusta la programacion y lo mejor de aprender nuevos conocimientos es poder ayudar a
                                los demas.
                            </p> -->
                    </div>
                </div>
            </section>
        </div>

        <div class="right col-sm-12 col-md-8">
            <div class=" row">
                <div class="col-md-12">
                    <section class="section-habilities">
                        <div class="card p-3 p-md-4">
                            <h3 class="title"><i class="bi bi-person-add"></i> Competencias personales</h3>
                            <div class="items-habilities">
                                <ul class="ul">
                                    <?php foreach ($personalSkills as $personalSkill) : ?>
                                        <li class="li"><?php echo $personalSkill->skill; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-12">
                    <section class="section-skills">
                        <div class="card p-3 p-md-4">
                            <h3 class="title"><i class="bi bi-file-earmark-code-fill"></i> Habilidades profesionales
                            </h3>
                            <div class="items-skills">
                                <div class="progress-container">

                                    <?php foreach ($levForLans as $levForLan) : ?>
                                        <p class="mt-3"><?php echo $levForLan->languaje; ?></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" style="width: <?php echo $levForLan->level . "%" ?>"><?php echo $levForLan->level ?? 0 ?> %</div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>

                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-12">
                    <section class="section-knowledges">
                        <div class="card p-3 p-md-4">
                            <h3 class="title"><i class="bi bi-bookmark-plus"></i> Conocimientos adicionales</h3>
                            <div class="items-knowledges">
                                <ul class="ul">
                                    <?php foreach ($knowless as $know) : ?>
                                        <li class="li"><?php echo $know->knowless; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</main>