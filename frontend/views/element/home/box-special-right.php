<div class="right chuyenmuc">
    <h2 class="title_box">
        <a href="<?php echo $category->getUrl() ?>"><?php echo $category->name ?></a>
    </h2>
    <span class="borderbox"></span>
    <ul>
        <?php
        $item = array_shift($news);

        if (!empty($item)) {
            ?>
            <li class="big tnb1">
                <a href="<?php echo $item->getUrl() ?>">
                    <img class="w100" src="<?php echo $item->image ?>" alt="<?php echo $item->name ?>"></a>
                <h3>
                    <a href="<?php echo $item->getUrl() ?>"><?php echo $item->name ?></a>
                </h3>
            </li>
            <?php
        }
        foreach ($news as $item) {
            ?>
            <li class="small ">
                <a href="<?php  echo $item->getUrl() ?>"><?php  echo $item->name ?></a></li>
        <?php } ?>
    </ul>
</div>