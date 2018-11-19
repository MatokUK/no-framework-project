<h1>Drink List</h1>
<dl>
    <?php foreach($list as $item): ?>
        <dt><?php echo $item->getDrink(); ?></dt>
        <dd><?php echo $item->getDescription(); ?></dd>
    <?php endforeach; ?>
</dl>
