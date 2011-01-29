<?php use_helper('I18N', 'sfSimpleBlog') ?>
<?php slot('title') ?>
  <?php echo sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog').' | '.$post->getTitle() ?>
<?php end_slot() ?>

<?php if(sfConfig::get('app_sfSimpleBlog_use_feeds', true)): ?>
  <?php slot('auto_discovery_link_tag') ?>
    <?php echo auto_discovery_link_tag('rss', sfSimpleBlogTools::generatePostUri($post, null, 'commentsForPostFeed'), array('title' => __('Comments on post "%1%" from %2%', array('%1%' => $post->getTitle(), '%2%' => sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog'))))) ?>
  <?php end_slot() ?>
<?php endif; ?>

<span class="sfSimpleBlog">
  <?php include_partial('sfSimpleBlog/post', array('post' => $post, 'in_list' => false, 'sf_cache_key' => $post->getId())) ?>
  <?php include_component('sfNestedComment', 'showComments', array('object' => $post)) ?>
</span>

<?php if (null !== $prevPost || null !== $nextPost): ?>
<div id="nav-below" class="navigation">
  <?php if($prevPost): ?>
    <div class="nav-previous">
      <span class="meta-nav">&larr;</span><?php echo link_to_post($prevPost) ?>
    </div>
  <?php endif; ?>
  <?php if($nextPost): ?>
    <div class="nav-next">
      <?php echo link_to_post($nextPost) ?><span class="meta-nav">&rarr;</span>
    </div>
  <?php endif; ?>
</div>
<?php endif; ?>