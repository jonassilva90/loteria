
<h3>Bilhete Premiado</h3>

<?php foreach ($bilhetePremiado as $dezena) : ?>
    <span><strong><?= $dezena ?></strong></span>
<?php endforeach; ?>

<h3>Bilhetes Gerados</h3>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Bilhete</th>
            <th>Situção</th>
        </tr>
    </thead>
    <tbody>
        <?php $key = 1; ?>
        <?php foreach ($bilhetes as $bilhete) : ?>
            <tr>
                <td><?= $key++ ?></td>
                <td><?php  foreach ($bilhete->dezenas as $dezena):?>
                    <?php if($dezena['sorteada']): ?>
                    <span><strong><?= str_pad($dezena['dezena'], 2, '0', \STR_PAD_LEFT) ?></strong></span>
                    <?php else: ?>
                    <span><?= str_pad($dezena['dezena'], 2, '0', \STR_PAD_LEFT) ?></span>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </td>
                <td><?= $bilhete->premiado?'Premiado':'Não premiado' ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>