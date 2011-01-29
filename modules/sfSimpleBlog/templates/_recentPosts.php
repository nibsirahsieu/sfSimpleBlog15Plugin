<?php use_helper('sfSimpleBlog') ?>
<?php foreach($posts as $post): ?>
  <li><?php echo link_to_post($post, '', null, array('title' => $post->getTitle())) ?></li>
<?php endforeach; ?>
