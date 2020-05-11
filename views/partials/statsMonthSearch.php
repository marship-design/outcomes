<form action="<?= PROJECT_FOLDER; ?>stats/month" method="POST" id="test">
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
    </div>
    <input type="hidden" name="<?php echo TOKEN_NAME; ?>" value="<?php echo Token::generate(); ?>">

    <button class="btn waves-efffect waves-light" type="submit" id="btn-showStats" name="month">Pokaż</button>
</form>