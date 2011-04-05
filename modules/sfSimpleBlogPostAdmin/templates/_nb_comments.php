<?php $commentCounter = $sf_simple_blog_post->getCommentCounter() ?>
<?php if (0 < $nb_comments = $commentCounter->getNbComments()): ?>
  <?php echo link_to($nb_comments. __(' Comments'), '@sf_nested_comment?commentable_model=sfSimpleBlogPost&commentable_id='.$sf_simple_blog_post->getId(), array('title' => $commentCounter->getNbApprovedComments(). __(' Approved'). ', '.$commentCounter->getNbModeratedComments(). __(' Pending'))) ?><br/>
<?php else: ?>
  <?php echo 'No Comments' ?>
<?php endif; ?>