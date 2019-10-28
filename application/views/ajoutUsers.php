
    <div class="col-1 enterprise2"></div>
    <div class="col-10 enterprise3"><br>
        <?php
            echo validation_errors();
            echo form_open_multipart();
        ?>
                    <fieldset>
                        <center><h2 class="card5" style="width: 50rem">CREATION D'UN NOUVEL UTILISATEUR.</h2></center><br><br>
                        <div class="form-group row">
                            <div class="col-1"></div>							
                                <label for="pseudo" class="col-2 col-form-label">ID :</label>
                            <div class="col-2">
                                <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?= set_value("pseudo") ?>"" placeholder="Pseudo">
                            </div>
                            <div class="col-1"></div>
                                <label for="status" class="col-1 col-form-label">Status :</label>
                            <div class="col-2">
                                <input type="text" class="form-control" name="status" id="status" value="<?= set_value("status") ?>" placeholder="Status">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-1"></div>
                                <label for="email" class="col-2 col-form-label">Email :</label>
                            <div class="col-5">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value("email") ?>">
                            </div>
                            <div class="col-1">
                                <input type="reset" value="RESET" id="annuler" class="btn btn-dark">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-1"></div>
                                <label for="password" class="col-2 col-form-label">Password :</label>
                            <div class="col-5">
                                <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?= set_value("password") ?>">
                            </div>
                            <div class="col-2">
                                <input type="submit" value="SUBMIT" id="valider" class="btn btn-dark">
                            </div>
                        </div><br>
                    </fieldset> 
            </form>
        </div><br><br><br>   
        <div class="col-1 enterprise2"></div>
