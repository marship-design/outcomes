<form action="<?= PROJECT_FOLDER; ?>stats/category" method="POST" id="test">
    <div class="row">
        <div class="input-field col l3">
            <select id="selectYearCategory" name="selectYearCategory">
                <option value="" disabled selected>Rok</option>
                <?php foreach ($years as $year): ?>
                    <option value="<?= $year->year; ?>"><?= $year->year; ?></option>                                            
                <?php endforeach; ?> 
            </select>
        </div>
        <div class="input-field col l3">
            <select id="selectCategory" name="selectCategory">
                <option value="" disabled selected>Kategoria</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id_kategorii ?>"><?= $category->kategoria ?></option>                                                
                <?php endforeach; ?>                                                
            </select>

        </div>    
    </div>
    <input type="hidden" name="<?php echo TOKEN_NAME; ?>" value="<?php echo Token::generate(); ?>">

    <button class="btn waves-efffect waves-light" type="submit" id="btn-showStats" name="category">Pokaż</button>
</form>