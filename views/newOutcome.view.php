<?php

require 'partials/header.php';

require 'partials/nav.php';
?>

<div id="outcome">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 l6">
                    <div class="card">
                        <div class="card-content teal darken-1 white-text">
                            <span class="card-title">Outcome</span>
                            <p id="outcome-title" data-idWydatku="">Write-in a new outcome</p>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <form action="<?= PROJECT_FOLDER; ?>outcomes/store" method="POST" class="col s12 l12" id="outcomeForm">
                                    <div class="row">
                                        <div class="input-field col s12 l8">
                                            <input type="text" name="nazwa_wydatku" id="outcomeName" class="toCheck">
                                            <label for="outcomeName">Nazwa wydatku</label>
                                            <span class="error">Wypełnij to pole</span>
                                        </div>
                                        <div class="input-field col s12 l4">
                                            <input type="text" class="datepicker" id="data" name="data_wydatku">
                                            <label for="data">Wybierz datę</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 l12">
                                            <select id="categorySelect" class="toCheck" name="id_kategorii">
                                                <option value="" disabled selected>Wybierz kategorie</option>

                                                <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category->id_kategorii ?>"><?= $category->kategoria ?></option>
                                                
                                                <?php endforeach; ?>
                                                
                                            </select>
                                            <label>Kategoria</label>
                                            <span class="error">Wybierz kategorię</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s7 l8">
                                            <input type="text" name="kwota" id="kwota" class="toCheck">
                                            <label for="kwota">Kwota</label>
                                            <span class="error">Wpisz kwotę</span>
                                        </div>
                                        <div class="input-field col s5 l4">
                                            <select id="currencySelect" name="waluta">
                                                <option value="" disabled>PLN/EUR</option>
                                                <option value="PLN">PLN</option>
                                                <option value="EUR" selected>EUR</option>
                                            </select>
                                            <label>Waluta</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 l12">
                                            <input type="text" class="input toCheck" name="tagi" id="tag">
                                            <label for="tag">Tagi</label>
                                            <span class="error">Pole nie może być puste. Tagi oddziel przecinkiem.</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 l12 center">
                                            <button class="btn waves-effect waves-light" type="submit" id="add-outcome" data-action="addNew">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= HTTP.HOST.PROJECT_FOLDER; ?>js/validation.js"></script>
<script type="text/javascript" src="<?= HTTP.HOST.PROJECT_FOLDER; ?>js/newOutcome.js"></script>


<?php

require 'partials/footer.php';

?>