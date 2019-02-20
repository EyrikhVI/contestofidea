<!--Файл генерации меню из БД для отображения вложенности в accordion-->
<li>
    <a href="">
        <?= $category['name']?>
        <?php if (isset($category['childs'])):?>
        <span class="badge pull-right"><i class="fas fa-plus"></i></span>
        <?php endif;?>
    </a>
    <?php if (isset($category['childs'])):?>
    <ul>
        <?=$this->getMenuHtml($category['childs'])?>
    </ul>
    <?php endif;?>
</li>

