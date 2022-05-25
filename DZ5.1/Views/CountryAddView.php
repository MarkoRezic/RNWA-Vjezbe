
<?php
/** @var $data */
//print_r($data);
?>

<div id="dataModal">
    <h4>Nova država</h4>
    <div class="divider surface-0 mv10"></div>
    <form id="form" method="post" action="countries">
        <div class="input-row">
            <label for="country_id">ID</label>
            <input id="country_id" name="country_id" type="text" />
        </div>
        <div class="input-row">
            <label for="country_name">Naziv</label>
            <input id="country_name" name="country_name" type="text" />
        </div>
        <div class="input-row">
            <label for="region_id">Regija</label>
                <select id="region_id" name="region_id">
                    <option value="-1" selected disabled>Odaberite Regiju</option>
                    <?php foreach ($data['regions'] as $region): ?>
                    <option value="<?=$region->region_id?>"><?=$region->region_name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <div class="divider surface-0 mv5"></div>
        <div class="button-row">
            <button type="submit" name="Submit">Dodaj</button>
        </div>
    </form>
</div>