<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfSimpleBlogPageAdmin/assets') ?>

<?php slot('title') ?>
  <?php echo __('Posts', array(), 'messages') ?> | <?php echo sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog') ?>
<?php end_slot() ?>
  
<div id="sf_admin_container">
  <h1><?php echo __('Pages', array(), 'messages') ?></h1>

  <?php include_partial('sfSimpleBlogPageAdmin/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sfSimpleBlogPageAdmin/list_header', array('pager' => $pager)) ?>
  </div>

  <?php slot('searchForm') ?>
  <div id="sf_admin_bar">
    <?php include_partial('sfSimpleBlogPageAdmin/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>
  <?php end_slot() ?>
  
  <div id="sf_admin_content">
    <form action="<?php echo url_for('sf_simple_blog_page_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sfSimpleBlogPageAdmin/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('sfSimpleBlogPageAdmin/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('sfSimpleBlogPageAdmin/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sfSimpleBlogPageAdmin/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
