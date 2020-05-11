<?php

require 'partials/header.php';

require 'partials/nav.php';
?>


<div class="section">
    <div class="container">        
        <div class="row">
            <div class="col s12 l6 offset-l3">
                <div class="z-depth-3">
                    <div class="collection with-headers teal">
                        <a class="collection-header white-text">
                            <h4>Statystyki</h4>
                        </a>
                        <div id="category-list">
                            <a href="<?= PROJECT_FOLDER; ?>stats/category" class="collection-item category-row">Statystyki kategorii</a>                           
                            <a href="<?= PROJECT_FOLDER; ?>stats/month" class="collection-item category-row">Statystyki miesięczne</a>                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



  <?php
require 'partials/footer.php';


