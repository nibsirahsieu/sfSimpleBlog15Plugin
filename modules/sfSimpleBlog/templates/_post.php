<?php use_helper('Date', 'sfSimpleBlog', 'crossAppLink') ?>
<div class="post hentry" id="post-<?php echo $post->getId() ?>">
  <h2 class="entry-title">
    <?php if ($in_list): ?>
      <?php echo link_to_post($post) ?>
    <?php else: ?>
      <?php echo $post->getTitle() ?>
    <?php endif; ?>
  </h2>
  
  <div class="entry-date">
    <abbr class="published">
      <?php echo format_date(strtotime($post->getPublishedAt()), 'P') ?>
      <?php if ($sf_user->isAuthenticated()): ?>
        <?php $user_id = $sf_user->getAttribute('user_id', null, 'sfGuardSecurityUser') ?>
        <?php if ($post->getAuthorId() == $user_id): ?>
          <a href="<?php echo cross_app_url_for('backend', '@sf_simple_blog_post_edit?id='.$post->getId()) ?>">(<?php echo __('Edit') ?>)</a>
        <?php endif; ?>
      <?php endif; ?>
    </abbr>
  </div>
  <div class="entry-content">
    <?php echo $post->getContent(ESC_RAW)?>
  </div>
  <div class="entry-meta">
    <span class="entry-category">
      <?php echo __('Posted in ') ?>&rsaquo;
      <?php echo __('%1%', array('%1%' => get_category_links($post->getCategoriesAsArray()))) ?>
    </span>
    <span class="meta-sep">|</span>
    <span class="tag-links">
      <?php echo __('Tagged ') ?>&rsaquo;
      <?php if($tags = $post->getTags()): ?>
        <?php echo __('%1%', array('%1%' => get_tag_links($tags))) ?>
      <?php endif; ?>
    </span>
  </div>
</div>