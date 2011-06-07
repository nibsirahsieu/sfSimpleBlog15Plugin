<?php use_helper('I18N', 'Date') ?>

<h3><?php echo __('Posts archived on "%1%"', array('%1%' => format_date($this_month, 'MMMM yyyy'))) ?></h3>
<span class="sfSimpleBlog">
<?php foreach($posts as $post): ?>
  <?php include_partial('sfSimpleBlog/post' . (sfConfig::get('app_sfSimpleBlog_use_post_extract', true) ? '_short' : ''), array('post' => $post, 'in_list' => true)) ?>
<?php endforeach; ?>
</span>