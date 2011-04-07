<?php $sf_context->getResponse()->setTitle(sfConfig::get('app_sfSimpleBlog_title', 'How is life on earth?').' > '. __('About')) ?>

<div class="post hentry" id="post-<?php echo $page->getId() ?>">
  <h1 class="entry-title"><?php echo $page->getName() ?></h1>

  <div class="entry-content">
    <?php echo $page->getContent(ESC_RAW) ?>
  </div>
</div>