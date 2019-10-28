<?php 
    if (validation_errors()) { 
?>
        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= validation_errors() ?>
        </div>
<?php
    }
    // ---------------------------------- SUCCESS ----------------------------------
    if ($this->session->flashdata('msg-success')) {
?>
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check-circle  text-success mr2 fa-lg"></i>
            <?= $this->session->flashdata('msg-success') ?>
        </div>
<?php
    }
    // ---------------------------------- DANGER -----------------------------------
    if ($this->session->flashdata('msg-danger')) {
?>
        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times-circle text-danger mr2 fa-lg" aria-hidden="true"></i>
            <?= $this->session->flashdata('msg-danger') ?>
        </div>
<?php 
    } 
?>