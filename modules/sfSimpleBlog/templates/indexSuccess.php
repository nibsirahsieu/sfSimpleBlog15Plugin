<?php use_helper('I18N', 'Date', 'sfSimpleBlogPagination') ?>

<?php if(sfConfig::get('app_sfSimpleBlog_use_feeds', true)): ?>
<?php slot('auto_discovery_link_tag') ?>
  <?php echo auto_discovery_link_tag('rss', '@sf_simple_blog_posts_feed?format=rss', array('title' => __('Posts from %1%', array('%1%' => sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog'))))) ?>
<?php end_slot() ?>
<?php endif; ?>

<?php foreach($post_pager->getResults() as $post): ?>
  <?php if (sfConfig::get('app_sfSimpleBlog_use_post_extract', true)): ?>
    <?php include_partial('sfSimpleBlog/post_short', array('post' => $post, 'in_list' => true, 'postCategories' => $postCategories)) ?>
  <?php else: ?>
    <?php include_partial('sfSimpleBlog/post', array('post' => $post, 'in_list' => true, 'postCategories' => $postCategories)) ?>
  <?php endif; ?>
  <div class="article-separator"></div>
<?php endforeach; ?>

<?php echo page_pagination($post_pager, '@homepage', $sf_request->getParameterHolder(), 'Older Posts', 'Earlier Posts') ?>