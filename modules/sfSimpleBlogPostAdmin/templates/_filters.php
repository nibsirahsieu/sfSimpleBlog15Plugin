<?php $form->getWidgetSchema()->setFormFormatterName('list') ?>
<div  class="sf_admin_filter">
  <form action="<?php echo url_for('sf_simple_blog_post_collection', array('action' => 'filter')) ?>" method="post">
    <ul>
      <?php echo $form ?>
      <li>
        <button type="submit" class="button blue"><?php echo __('Filter', array(), 'sf_admin') ?></button>
        <?php echo link_to(__('Reset', array(), 'sf_admin'), 'sf_simple_blog_post_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'button blue')) ?>
      </li>
    </ul>
  </form>
</div>