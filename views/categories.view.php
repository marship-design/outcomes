<?php

require 'partials/header.php';

require 'partials/nav.php';
?>



<div class="section">
    <div class="container">
        <div class="fixed-action-btn">
            <a href="<?= PROJECT_FOLDER; ?>categories/create" class="btn-floating btn-large teal accent-3" <strong>+</strong></a>
        </div>
        <div class="row">
            <div class="col s12 l6 offset-l3">
                <div class="z-depth-3">
                    <div class="collection with-headers teal">
                        <a class="collection-header white-text">
                            <h4>Lista kategorii</h4>
                        </a>
                        <div id="category-list">
                            <!-- rows += "<a href=\"#!\" class=\"collection-item category-row\" data-category=\""+item.kategoria + "\" "+"data-idcategory=\"" + item.id_kategorii + "\">" + item.kategoria + "</a>"; -->
                            <?php foreach ($categories as $category) : ?>
                              
                                <a href="<?= PROJECT_FOLDER; ?>categories/<?= $category->id_kategorii; ?>/edit" class="collection-item category-row"> <?= $category->kategoria; ?> </a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
require 'partials/footer.php';
