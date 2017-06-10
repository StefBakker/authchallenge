<div class="container">

    <h1>Lijst van alle studenten</h1>

    <table class="table">
        <tr>
            <th class="col-xs-1">#</th>
            <th class="col-xs-8">Naam</th>
            <th class="col-xs-1">Docent</th>
            <th class="col-xs-2" colspan="2">Actie</th>
        </tr>

        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['docent']; ?></td>
                <td><a href="<?= URL ?>user/edit/<?= $user['id'] ?>">Bewerk</a></td>
                <td><a href="<?= URL ?>user/delete/<?= $user['id'] ?>">Verwijder</a></td>
            </tr>
        <?php } ?>

    </table>
    <a href="<?= URL ?>user/create">Toevoegen</a>
</div>