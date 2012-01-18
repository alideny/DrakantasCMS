<div id="body">
<?php
echo '<h2>'.$news_item['title'].'</h2>';
?>
<code>
<?php
echo $news_item['text'];
?>
</code>
<code>
Comentarios (<?php echo $total_comments; ?>)
</code>
<?php foreach ($comments as $comments_item): ?>
<?php echo $comments_item['user']; ?>
<code>
<?php echo $comments_item['comment']; ?>
</code>
<?php endforeach ?>
	</div>