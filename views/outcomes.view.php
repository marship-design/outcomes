<?php

require 'partials/header.php';

require 'partials/nav.php';
?>

<div class="section">
        <div class="container">
            <div class="fixed-action-btn" id="addNewOutcome-button">
                    <a href="<?= PROJECT_FOLDER; ?>outcomes/create" class="btn-floating btn-large teal accent-3"><strong>+</strong></a>
            </div>
            <div class="row">
                <div class="col s12 l6 offset-l3">
                    <div class="z-depth-3">
                        <div class="collection with-headers teal">
                            <a class="collection-header white-text"><h4>Lista wydatków</h4></a>

                            <form action="<?= PROJECT_FOLDER; ?>outcomes/indexRange" method="post">
                            <a class="collection-item black-text">
                                <div class="row">
                                    <div class="input-field col l4">
                                        <select id="selectYear" name="selectYear">
                                            <option value="" disabled selected>Rok</option>

                                            <?php foreach ($years as $year): ?>
                                                <option value="<?= $year->year; ?>"><?= $year->year; ?></option>                                            
                                            <?php endforeach; ?>                                            
                                        </select>                                        
                                    </div>

                                    <div class="input-field col l4">
                                        <select id="selectMonth" name="selectMonth">
                                            <option value="" disabled selected>Miesiąc</option>
                                            <option value="1">Styczeń</option>
                                            <option value="2">Luty</option>
                                            <option value="3">Marzec</option>
                                            <option value="4">Kwiecień</option>
                                            <option value="5">Maj</option>
                                            <option value="6">Czerwiec</option>
                                            <option value="7">Lipiec</option>
                                            <option value="8">Sierpień</option>
                                            <option value="9">Wrzesień</option>
                                            <option value="10">Październik</option>
                                            <option value="11">Listopad</option>
                                            <option value="12">Grudzień</option>                        
                                        </select>
                                    </div>
										<input type="hidden" name="<?php echo TOKEN_NAME; ?>" value="<?php echo Token::generate(); ?>">

                                    <div class= "col l4">
                                        <button class="btn" type="submit" id="btn-limitOutcomes" style="margin-top:24px">Pokaż</button>
                                    </div>
                                </div>
                            </a>
                            </form>
                            <div id="outcomeLista">

                            <?php foreach ($outcomes as $outcome): ?>
                                
                                <a href="<?= PROJECT_FOLDER; ?>outcomes/<?= $outcome->id_wydatku; ?>/edit" class="collection-item black-text">
                                    <div class="row">
                                        <p>
                                            <?= $outcome->data_wydatku .' '. $outcome->nazwa_wydatku; ?> <br>
                                            <?= $outcome->category_name .', ' . $outcome->kwota .' '. $outcome->waluta; ?>
                                            
                                            </p></div></a>
                            <?php endforeach; ?>

                                
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="<?= HTTP.HOST.PROJECT_FOLDER; ?>js/outcome.js"></script>

<?php
require 'partials/footer.php';
