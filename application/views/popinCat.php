<?php
    foreach ($liste as $dataDet) {
?>
        <a id="<?= $dataDet->pro_id ?>" href="#" class="card-link click1" data-toggle="modal" data-target="#popin1" type="button">
            <div class="card1 cardx">
     		<h6 class="card-title"><?= $dataDet->pro_libelle ?></h6>
                <div>
                    <img class="card-img-top imgCat" src="assets/img/<?= $dataDet->pro_photo ?>" alt="Card image cap">
                </div>
                <div class="card-body">
                    <?php 
                        if (!empty($dataDet->pro_rank)){
                            $compt = 0;
                            $promo = 0;
                            foreach ($Liste_pro_asc as $row4){
                                $compt++;
                                if ($compt <= 3 && $dataDet->pro_id == $row4->pro_id){
                    ?>
                                    <ul class="list-unstyled list-inline rating mb-0">
                                        <?php
                                            $totalRows= count($Liste_pro_asc);
                                            $level= count($Liste_pro_asc)/5;
                                            switch ($compt) {
                                                case $compt<= $level:
                                                    $reduce='25%';
                                        ?>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star fa-spin amber-text"> </i></li>
                                        <?php
                                                break;
                                                case $compt>$level && $compt<= $level*2:
                                        ?>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                        <?php
                                                    $reduce='20%';
                                                break;
                                                case $compt>$level*2 && $compt<= $level*3:
                                        ?>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                        <?php
                                                    $reduce='15%';
                                                break;
                                                case $compt>$level*3 && $compt<= $level*4:
                                        ?>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                        <?php
                                                    $reduce='10%';
                                                break;
                                                case $compt>$level*4 && $compt<= $level*5:
                                        ?>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                    li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                        <?php
                                                    $reduce='5%';
                                                break;
                                            }
                                        ?>
                                    </ul>
                                    <div class="row justify-content-around"><h7><?= $row4->pro_prix?>€ - <text style='color:red'><?= $reduce ?></text></h7>
                                        <h5 style='color:green'>= <?= round($row4->pro_prix*0.75, 2) ;?>€</h5>
                                    </div>
                                        <?php 
                                            $promo = 1;
                                }
                            }
                                            if ($promo == 0){
                                                $compt = 0;
                                                foreach ($Liste_pro_asc as $row4){
                                                    $compt++;
                                                    if ($dataDet->pro_id == $row4->pro_id){
                                        ?>
                                                        <ul class="list-unstyled list-inline rating mb-0">
                                                            <?php
                                                                $totalRows= count($Liste_pro_asc);
                                                                $level= count($Liste_pro_asc)/5;
                                                                switch ($compt) {
                                                                    case $compt<= $level:
                                                            ?>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                            <?php
                                                                        break;
                                                                    case $compt>$level && $compt<= $level*2:
                                                            ?>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                            <?php
                                                                        break;
                                                                    case $compt>$level*2 && $compt<= $level*3:
                                                            ?>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                            <?php
                                                                        break;
                                                                    case $compt>$level*3 && $compt<= $level*4:
                                                            ?>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                            <?php
                                                                        break;
                                                                    case $compt>$level*4 && $compt<= $level*5:
                                                            ?>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                        <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                            <?php
                                                                        break;
                                                                }
                                                            ?>
                                                        </ul>
                                                        <h5><?= $dataDet->pro_prix ?>€</h5>
                                                        <?php
                                                    }
                                                }
                                            }
                        }
                        else{
                                                        ?>
                                                        <br><br><h5><?= $dataDet->pro_prix ?>€</h5>
                                                        <?php
                        }
                                                        ?>
                </div>
            </div>
        </a>
        <?php
    }
        ?>
<script src="assets/js/details.js"></script>
<!-- <script src="assets/js/search.js"></script> -->
        								  			
        								  			
                									