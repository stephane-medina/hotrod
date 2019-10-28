<?php
    foreach ($liste as $dataDet) {
?>
        <div class="row justify-content-around marge-nulle">
            <img class="photo card7" src="assets/img/<?= $dataDet->pro_photo ?>" alt="Card image cap">
        	<div class="col-12"><br>
                    <h6><?= $dataDet->pro_libelle ?></h6>
		</div>
        	<div class="col-12">
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
                                                    <li class="list-inline-item mr-0 row justify-content-around">
                                                        <i class="fas fa-star star fa-spin amber-text"></i>
                                                    </li>
                                                    <h7 class="blink row justify-content-around">Promotion en cours : -<?php echo $reduce?></h7>
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
                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                        <?php
                                                    $reduce='5%';
                                                break;
                                            }
                                        ?>
				    </ul>
                                    <div class="row justify-content-around"><h7><?= $row4->pro_prix?>€ - <text style='color:red'><?= $reduce ?></text></h7>
                                        <h3 style='color:green'>= <?= round($row4->pro_prix*0.75, 2) ;?>€</h3>
                                    </div>
                                        <?php 
                                            $promo = 1;
                                 }
                            }
                                            if ($promo == 0){
                                                $compt = 0;
                                                    foreach ($Liste_pro_asc as $row4) {
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
                                                            <h1><?= $dataDet->pro_prix ?>€</h1>
                                                                <?php
                                                        }
                                                    }
                                            }
                        }
                        else{
                                                                ?>
                                                                <h1><?= $dataDet->pro_prix ?>€</h1>
                                                                <?php
                            }
                                                                ?>
         	</div>
   	</div>
        <div class="modal-footer row justify-content-left marge-nulle">
            <div class="col-12"><br>
        	<h7><?= $dataDet->pro_description ?></h7>
            </div> 
	</div>
        <?php
    }
        ?>

   
    
    						
        									