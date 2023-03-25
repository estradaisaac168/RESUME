<div class="mb-3">
    <label for="company" class="form-label">Empresa</label>
    <input type="text" class="form-control" id="company" name="company" value="<?php  echo s($contact->company) ?>" placeholder="Nombre de la empresa">
</div>
<div class="mb-3">
    <label for="name" class="form-label">Reclutador</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php  echo s($contact->name) ?>" placeholder="Nombre del reclutador">
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php  echo s($contact->email) ?>" placeholder="name@example.com">
</div>
<div class="mb-3">
    <label for="message" class="form-label">Mensaje</label>
    <textarea class="form-control" id="message" name="message" rows="4">
    <?php  echo s($contact->message) ?>
    </textarea>
</div>