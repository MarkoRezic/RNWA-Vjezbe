<h1>Regije</h1>
<a href="regions_create" class="button-link">Nova Regija</a>

<?php
/** @var $data */
//print_r($data);
?>

<div style="overflow-x:auto;">
    <table class="data-table">
        <tr>
            <th>#</th>
            <th>Naziv</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['regions'] as $row): ?>
            <tr>
                <td><?php echo $row->region_id ?></td>
                <td><?php echo $row->region_name ?></td>
                <td><a href="regions_edit?region_id=<?php echo $row->region_id ?>" class="edit-btn"> Edit</a>
                </td>
                <td>
                    <form action="regions_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="region_id" value="<?= $row->region_id ?>">
                        <input type="submit" value="Delete" class="delete-btn">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>



