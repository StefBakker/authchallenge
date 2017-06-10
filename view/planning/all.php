<div class="container">

    <h1>Planning</h1>

    <table class="table">
        <tr>
            <th class="col-xs-1">#</th>
            <th class="col-xs-3">Student</th>
            <th class="col-xs-2">Bedrijf</th>
            <th class="col-xs-2">Plaats</th>
            <th class="col-xs-2">Examen</th>
            <th class="col-xs-2">Datum/tijd</th>
            <th class="col-xs-1" colspan="2">Actie</th>
        </tr>

        <?php
        if ($planning == false) {
            echo '<tr><td colspan="6">Geen data aanwezig.</td></tr>';

        } else {

        foreach ($planning as $plan) { ?>
            <tr>
                <td><?= $plan['id']; ?></td>
                <td><?= $plan['student.name']; ?> (<?= $plan['student_id']; ?>)</td>
                <td><?= $plan['company.name']; ?> (<?= $plan['company_id']; ?>)</td>
                <td><?= $plan['company.city']; ?></td>
                <td><?= $plan['exam_name']; ?></td>
                <td><?= $plan['date']; ?> <?= $plan['time']; ?></td>

                <td><a href="<?= URL ?>planning/confirm/<?= $plan['id'] ?>">Bevestig</a></td>
                <td><a href="<?= URL ?>planning/reject/<?= $plan['id'] ?>">Weiger</a></td>

            </tr>
        <?php
            }
        } ?>

    </table>
    <a href="<?= URL ?>planning/create">Toevoegen</a>
</div>