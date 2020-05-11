
<?php

require 'partials/header.php';

require 'partials/nav.php';
?>

<div class="section">
    <div class="container">
        
    <?php
        require 'views/partials/statsCategorySearch.php';
    ?>
    
                <div class="row">
                    <div class="col l6 s12">
                        <div class="section">
                            <div id="summary">                
                            <!-- tu wstawiamy dynamicznie podsumowanie wydatkow dla danego miesiaca i roku -->
                            <?php //categoryStatsResult($result); ?>    
                        </div>
                        </div>
                    </div> 
                    <div class="col l6 s12">
                        <div class="section">
                            <div id="detailedSummary">
                                <!-- tu wstawiamy dynamicznie detaliczne zestawienie dla danej kategorii w danym miesiacu i roku -->
                                
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script type="text/javascript" src="<?= HTTP.HOST.PROJECT_FOLDER; ?>js/stats.js"></script>
    <script type="text/javascript" src="<?= HTTP.HOST.PROJECT_FOLDER; ?>js/ajax.js"></script>

<?php
require 'partials/footer.php';

