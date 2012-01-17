	<div id="body">
<?php foreach ($news as $news_item): ?>
    <h2><?php echo $news_item['title']; ?></h2>
   <div id="main">
   <code>
		<?php echo $news_item['text'] = word_limiter($news_item['text'], 35); ?>
    </code>
	</div><?php /* Las URLs como estas deberían ser dadas completas ya que pueden estar en subcarpetas y no en la raíz */ ?>
    <p><a href="/index.php/news/<?php echo $news_item['id']; ?>">Leer m&aacute;s</a></p>
<?php endforeach ?>
	</div>