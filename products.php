<?php if (isset($products)): ?>
<ul class='products'>
<?php foreach ($products as $product): ?>
    <li>
        <span class='sku'><?= $product->getSKU() ?></span>
        <span class='name'><?= $product->getName() ?></span>
        <span class='price'><?= $product->getPrice() ?></span>
    </li>
<?php endforeach; ?>
</ul>
<?php else: ?>
    <h1>Please add products via clicking ADD button</h1>
<?php endif; ?>