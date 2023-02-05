<?php $title = "apprendre mvc php"; ?>
<?php    
     $post = [
            'french_creation_date' => '01/02/2023',
            'content' => 'fier d php',
            'identifier' => 1,
        ];?>
<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>

<?php
?>
	<div class="news">
    	<h3>
        	<?= htmlspecialchars($title); ?>
        	<em>le <?= $post['french_creation_date']; ?></em>
    	</h3>
    	<p>
        	<?= nl2br(htmlspecialchars($post['content'])); ?>
        	<br />
        	<em><a href="post.php?id=<?= urlencode($post['identifier']) ?>">Commentaires</a></em>
    	</p>
	</div>
<?php
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>