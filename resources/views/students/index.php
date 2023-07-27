<h1>List Student</h1>

<table border="1" width="500" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student) { ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
    
</table>