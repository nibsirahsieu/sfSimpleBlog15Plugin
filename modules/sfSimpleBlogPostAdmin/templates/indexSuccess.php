<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfSimpleBlogPostAdmin/assets') ?>

<?php slot('title') ?>
  <?php echo __('Posts', array(), 'messages') ?> | <?php echo sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog') ?>
<?php end_slot() ?>

<?php slot('searchForm') ?>
<form action="<?php echo url_for('sf_simple_blog_post_collection', array('action' => 'filter')) ?>" method="post">
  <ul>
    <?php echo $filters ?>
    <li><button type="submit"><?php echo __('Filter', array(), 'sf_admin') ?></button></li>
    <li><?php echo link_to(__('Reset', array(), 'sf_admin'), 'sf_simple_blog_post_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?></li>
  </ul>
</form>
<?php end_slot() ?>

<div id="sf_admin_container">
  <h1><?php echo __('Posts', array(), 'messages') ?></h1>

  <?php include_partial('sfSimpleBlogPostAdmin/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sfSimpleBlogPostAdmin/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php //include_partial('sfSimpleBlogPostAdmin/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('sf_simple_blog_post_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sfSimpleBlogPostAdmin/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('sfSimpleBlogPostAdmin/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('sfSimpleBlogPostAdmin/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sfSimpleBlogPostAdmin/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
