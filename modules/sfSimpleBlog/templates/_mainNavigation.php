
<ul>
  <li>
    <a href="<?php echo url_for('@homepage') ?>" title="<?php echo __('Home', '', 'twentyten') ?>"><?php echo __('Home', '', 'twentyten') ?></a>
  </li>
  <?php foreach ($pages as $page): ?>
  <li>
    <a href="<?php echo url_for('@sf_simple_blog_show_page?page_title='.$page->getStrippedTitle()) ?>" title="<?php echo $page->getName() ?>"><?php echo $page->getName() ?></a>
  </li>
  <?php endforeach; ?>
</ul>