<?php  ?>
<h2>Liste des tags</h2>
<ul>
    <?php foreach ($tags as $tag) : ?>
        <li>
            <a href="?tagID=<?php echo $tag['id']; ?>">
                <?php echo $tag['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
