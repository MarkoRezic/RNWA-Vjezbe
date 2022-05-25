<h1>Poslovi</h1>
<a href="jobs_create" class="button-link">Novi Posao</a>

<?php
/** @var $data */
//print_r($data);
?>

<div style="overflow-x:auto;">
    <table class="data-table">
        <tr>
            <th>#</th>
            <th>Titula</th>
            <th>Minimalna plaća</th>
            <th>Maksimalna plaća</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['jobs'] as $row): ?>
            <tr>
                <td><?php echo $row->job_id ?></td>
                <td><?php echo $row->job_title ?></td>
                <td><?php echo $row->min_salary ?></td>
                <td><?php echo $row->max_salary ?></td>
                <td><a href="jobs_edit?job_id=<?php echo $row->job_id ?>" class="edit-btn"> Edit</a>
                </td>
                <td>
                    <form action="jobs_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="job_id" value="<?= $row->job_id ?>">
                        <input type="submit" value="Delete" class="delete-btn">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>



