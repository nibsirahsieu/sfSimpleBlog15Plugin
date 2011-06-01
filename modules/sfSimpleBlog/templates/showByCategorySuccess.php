<?php use_helper('I18N', 'Date') ?>

<?php $title = __('Posts categorized "%1%"', array('%1%' => $sf_params->get('category'))) ?>
<?php slot('title') ?>
  <?php echo sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog').' | '.$title ?>
<?php end_slot() ?>

<h3><?php echo $title ?></h3>
<span class="sfSimpleBlog">
<?php foreach($post_pager->getResults() as $post): ?>
  <?php include_partial('sfSimpleBlog/post' . (sfConfig::get('app_sfSimpleBlog_use_post_extract', true) ? '_short' : ''), array('post' => $post, 'in_list' => true)) ?>
<?php endforeach; ?>
</span>

<?php if($post_pager->haveToPaginate()): ?>
<div id="nav-below" class="navigation">
  <?php if($post_pager->getPage() != 1): ?>
    <div class="nav-next">
      <?php echo link_to(__('earlier posts'), '@sf_simple_blog_show_by_category?category='.$sf_params->get('category').'&page='.$post_pager->getPreviousPage()) ?><span class="meta-nav">&rarr;</span>
    </div>
  <?php elseif($post_pager->getPage() != $post_pager->getLastPage()): ?>
    <div class="nav-previous">
      <span class="meta-nav">&larr;</span><?php echo link_to(__('older posts'), '@sf_simple_blog_show_by_category?category='.$sf_params->get('category').'&page='.$post_pager->getNextPage()) ?>
    </div>
  <?php endif; ?>
</div>
<?php endif; ?>