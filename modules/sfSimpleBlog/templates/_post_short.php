<?php use_helper('Date', 'sfSimpleBlog', 'crossAppLink') ?>
<div class="hentry" id="post-<?php echo $post->getId() ?>">
  <h2 class="entry-title"><?php echo link_to_post($post)?></h2>

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
    <?php echo $post->getExtract(ESC_RAW) ?>
  </div>
  <div class="entry-meta">
    <span class="entry-category">
      <?php echo __('Posted in ') ?>&rsaquo;
      <?php echo __('%1%', array('%1%' => get_category_links($post->getsfSimpleBlogCategorys()))) ?>
    </span>
    <span class="meta-sep">|</span>
    <span class="tag-links">
      <?php echo __('Tagged ') ?>&rsaquo;
      <?php if($tags = $post->getTags()): ?>
        <?php echo __('%1%', array('%1%' => get_tag_links($tags))) ?>
      <?php endif; ?>
    </span>
    <span class="meta-sep">|</span>
    <span class="comments-link">
      <?php echo link_to_post($post, format_number_choice('[0]no comment|[1]one comment|(1,+Inf]%1% comments', array('%1%' => $post->getNbApprovedComments()), $post->getNbApprovedComments()), '#comments') ?>
    </span>
  </div>
</div>
