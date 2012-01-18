	<div id="body">
<?php foreach ($news as $news_item): ?>
    <h2><?php echo $news_item['title']; ?></h2>
   <div id="main">
   <code>
		<?php echo $news_item['text']; ?>
    </code>
	</div>
    <p><a href="/index.php/news/<?php echo $news_item['id']; ?>">Leer m&aacute;s</a></p>
<?php endforeach ?>
	</div>