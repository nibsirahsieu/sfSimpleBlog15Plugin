<?php slot('title') ?>
  <?php echo sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog').' | '.$page->getName() ?>
<?php end_slot() ?>

<div class="post hentry" id="post-<?php echo $page->getId() ?>">
  <h1 class="entry-title"><?php echo $page->getName() ?></h1>

  <div class="entry-content">
    <?php echo $page->getContent(ESC_RAW) ?>
  </div>
</div>