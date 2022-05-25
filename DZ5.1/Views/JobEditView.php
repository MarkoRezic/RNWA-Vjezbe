
<?php
/** @var $data */
//print_r($data);
?>

<div id="dataModal">
    <h4>Uredi posao</h4>
    <div class="divider surface-0 mv10"></div>
    <form id="form" method="post" action="jobs_update">
        <input type="hidden" name="_method" value="PUT">
        <div class="input-row">
            <label for="job_id">ID</label>
            <input id="job_id" name="job_id" type="text" value="<?= $data['job']->job_id ?>" />
        </div>
        <div class="input-row">
            <label for="job_title">Titula</label>
            <input id="job_title" name="job_title" type="text" value="<?= $data['job']->job_title ?>" />
        </div>
        <div class="input-row">
            <label for="min_salary">Minimalna plaća</label>
            <input id="min_salary" name="min_salary" type="text" value="<?= $data['job']->min_salary ?>" />
        </div>
        <div class="input-row">
            <label for="max_salary">Maksimalna plaća</label>
            <input id="max_salary" name="max_salary" type="text" value="<?= $data['job']->max_salary ?>" />
        </div>
        <div class="divider surface-0 mv5"></div>
        <div class="button-row">
            <button type="submit" name="Submit">Uredi</button>
        </div>
    </form>
</div>