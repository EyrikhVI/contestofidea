<li>
    <a href="<?= \yii\helpers\Url::to(['category/view','id'=>$category['id']])?>">
        <?= $category['name']?>
        <?php if (isset($category['childs'])):?>
        <span class="badge_plus pull-right"><i class="fas fa-plus"></i></span>
            <?php else:?>
            <span class="badge"><?=count($this->data[$category['id']]['competition'])?></span>
        <?php endif;?>
    </a>
    <?php if (isset($category['childs'])):?>
    <ul>
        <?=$this->getMenuHtml($category['childs'])?>
    </ul>
    <?php endif;?>
</li>

