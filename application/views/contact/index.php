//application/views/contact/index.php
<?php   form_open('contact'); ?>
            <div class="form-group row">
                <label for="ID_email" class="col-3 text-left">E-mail :</label>
                <input name="email" required type="email" class="col-9 form-control" id="ID_email" placeholder="Entrer votre email ici" value="<?= set_value('email'); ?>">
            </div>
            <div class="form-group row">
               <label for="ID_email" class="col-3 text-left">Titre :</label>
               <input name="title" required type="text" class="col-9 form-control" id="ID_email" placeholder="Titre" value="<?= set_value('title'); ?>">
            </div>
            <div class="form-group row">
                <label class="col-3 mb-0">Message :</label>
                <textarea name="message" required class="col-9 form-control" id="ID_message" rows="10" placeholder="Entrez votre message ici"><?= set_value('message'); ?></textarea>
            </div>
            <div class="text-right">
                <button class="btn bg-dark link">Envoyer</button>
            </div>
        </form>
        <div class="modal-footer">
            <p><h5>Nous nous efforcerons de répondre au mieux et dans les meilleurs délais.</h5></p>
        </div>