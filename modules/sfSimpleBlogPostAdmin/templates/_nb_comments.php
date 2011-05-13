<?php $commentCounter = $sf_simple_blog_post->getCommentCounter() ?>
<?php if (0 < $nb_comments = $commentCounter->getNbComments()): ?>
  <a href="<?php echo url_for('@sf_nested_comment?commentable_model=sfSimpleBlogPost&commentable_id='.$sf_simple_blog_post->getId()) ?>" title="<?php echo $commentCounter->getNbApprovedComments(). __(' Approved'). ', '.$commentCounter->getNbModeratedComments(). __(' Pending') ?>"><span class="comments-count"><?php echo $nb_comments ?></span></a>
<?php else: ?>
  <span class="comments-count"><?php echo '0' ?></span>
<?php endif; ?>