<div class="articles-list">
  <!-- <p>
    lorem 2000
  </p> -->

<?php
  $articles = get_articles_all();
  foreach ($articles as $article): ?>

    <?php 
    $author = get_author_by_id($article["author_id"]); 
    $photo = get_photo_by_id($article["photo_id"]);
    ?>

    <div class="article">
      <div class="img">
        <img src="<?php echo $photo?>" alt="">
      </div>
      
      <h2><?php echo $article["title"]?></h2>

      <p class="info"><?php echo $author?>
        <span> / <?php echo(date('d ') . $monthes[(date('n'))] . date(' Y')); 
        $article["created_at"]?>
        </span>
      </p>

      <p class="annotation"><?php echo $article["annotation"]?></p>

    </div>

  <?php endforeach;
?>


  

  <?php include __DIR__ . "/pagination.view.php" ?>
</div>
