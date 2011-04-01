<?php $nb_comments = $sf_simple_blog_post->getNbComments() ?>
<?php if ($nb_comments > 0): ?>
  <?php echo link_to($nb_comments, '@sf_nested_comment?commentable_model=sfSimpleBlogPost&commentable_id='.$sf_simple_blog_post->getId(), array('title' => 'View Comments')) ?>
<?php else: ?>
  <?php echo $nb_comments ?>
<?php endif; ?>