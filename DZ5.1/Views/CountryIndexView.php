<h1>Države</h1>
<a href="countries_create" class="button-link">Nova Država</a>

<?php
/** @var $data */
//print_r($data);
?>

<div style="overflow-x:auto;">
    <table class="data-table">
        <tr>
            <th>#</th>
            <th>Naziv</th>
            <th>Regija #</th>
            <th>Regija Naziv</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['countries'] as $row): ?>
            <tr>
                <td><?php echo $row->country_id ?></td>
                <td><?php echo $row->country_name ?></td>
                <td><?php echo $row->region_id ?></td>
                <td><?php echo $row->region_name ?></td>
                <td><a href="countries_edit?country_id=<?php echo $row->country_id ?>" class="edit-btn"> Edit</a>
                </td>
                <td>
                    <form action="countries_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="country_id" value="<?= $row->country_id ?>">
                        <input type="submit" value="Delete" class="delete-btn">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>



