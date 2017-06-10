<div class="container">

    <h1>Mijn examens</h1>

    <table class="table">
        <tr>
            <th >Examen</th>
            <th >Datum/tijd</th>
            <th >Status</th>

            <th colspan="2">Actie</th>
            <th >Resultaat</th>
        </tr>

        <?php
        if ($planning == false) {
            echo '<tr><td colspan="6">Geen data aanwezig.</td></tr>';

        } else {

            foreach ($planning as $plan) { ?>
                <tr>
                    <td><?= $plan['exam_name']; ?></td>
                    <td><?= $plan['date']; ?> <?= $plan['time']; ?></td>
                    <td><span class="label <?= $plan['status.class']; ?>"><?= $plan['status.name']; ?></span></td>
                    <?php if($plan['status_id']<3) { ?>
                        <td><a href="<?= URL ?>planning/confirm/<?= $plan['id'] ?>">Bevestig</a></td>
                        <td><a href="<?= URL ?>planning/reject/<?= $plan['id'] ?>">Weiger</a></td>
                    <?php } else { ?>
                        <td></td>
                        <td></td>
                    <?php } ?>

                    <td><span class="label <?= $plan['result.class']; ?>"><?= $plan['result.name']; ?></span></td>

                </tr>
            <?php }
        } ?>

</table>
<a href="<?= URL ?>planning/create">Toevoegen</a>
</div>