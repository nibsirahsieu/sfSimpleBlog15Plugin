<?php $sf_context->getResponse()->setTitle(sfConfig::get('app_sfSimpleBlog_title', 'How is life on earth?').' > '. __('About')) ?>

<div class="post hentry" id="post-<?php echo $about->getId() ?>">
  <h1 class="entry-title"><?php echo __('About') ?></h1>

  <div class="entry-content">
    <?php echo $about->getAbout(ESC_RAW) ?>
  </div>
</div>