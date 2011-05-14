<?php foreach(sfConfig::get('app_sfSimpleBlog_sidebar', array('custom', 'tags', 'recent_posts', 'recent_comments', 'feeds')) as $widget): ?>
  <?php if($widget == 'recent_posts'): ?>
    <li class="widget-container widget_latest_post">
      <h3 class="widget-title"><?php echo __('Recent Posts', null, 'sf_simple_blog') ?></h3>
      <ul>
        <?php include_component('sfSimpleBlog', 'recentPosts') ?>
      </ul>
    </li>
  <?php elseif($widget == 'recent_comments'): ?>
    <li class="widget-container widget_recent_comment">
      <h3 class="widget-title"><?php echo __('Recent Comments', null, 'sf_simple_blog') ?></h3>
      <ul>
        <?php include_component('sfNestedComment', 'recentComments') ?>
      </ul>
    </li>
  <?php elseif($widget == 'tags'): ?>
    <li id="wp_tag_cloud" class="widget-container widget_tags">
      <h3 class="widget-title"><?php echo __('Tags', null, 'sf_simple_blog') ?></h3>
      <div style="overflow: hidden">
        <?php include_component('sfSimpleBlog', 'tagList') ?>
      </div>
    </li>
  <?php elseif($widget == 'feeds' && sfConfig::get('app_sfSimpleBlog_use_feeds', true)): ?>
    <li class="widget-container feeds">
      <h3 class="widget-title"><?php echo __('RSS Feeds', null, 'sf_simple_blog') ?></h3>
      <ul>
        <?php include_partial('sfSimpleBlog/feed') ?>
      </ul>
    </li>
  <?php elseif ($widget == 'links'): ?>
    <?php include_partial('sfSimpleBlog/links') ?>
  <?php else: ?>
    <?php echo sfConfig::get('app_sfSimpleBlog_'.$widget) ?>
  <?php endif; ?>
<?php endforeach; ?>