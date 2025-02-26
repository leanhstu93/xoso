<section class="wrapper-breadcrumb w100">
    <div class="title-breadcrumb">
        <?= $this->title ?>
    </div>
    <ul>
        <?php
        $dataLast = array_pop($data);

        foreach ($data as $value) {
        ?>
            <li>
                <a href="<?= $value['link'] ?>"><?= $value['name'] ?></a> /
            </li>
        <?php } ?>
        <li><?= $dataLast['name'] ?></li>
    </ul>
</section>
