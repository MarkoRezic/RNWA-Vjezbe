
<?php
/** @var $data */
//print_r($data);
?>

<div id="dataModal">
    <h4>Uredi regiju</h4>
    <div class="divider surface-0 mv10"></div>
    <form id="form" method="post" action="regions_update">
        <input type="hidden" name="_method" value="PUT">
        <div class="input-row">
            <label for="region_id">ID</label>
            <input id="region_id" name="region_id" type="text" value="<?= $data['region']->region_id ?>" />
        </div>
        <div class="input-row">
            <label for="region_name">Naziv</label>
            <input id="region_name" name="region_name" type="text" value="<?= $data['region']->region_name ?>" />
        </div>
        <div class="divider surface-0 mv5"></div>
        <div class="button-row">
            <button type="submit" name="Submit">Uredi</button>
        </div>
    </form>
</div>