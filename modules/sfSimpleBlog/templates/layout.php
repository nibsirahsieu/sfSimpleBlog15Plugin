<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_slot('auto_discovery_link_tag') ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('/sfSimpleBlog15Plugin/css/layout.css', 'first') ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="sfSimpleBlog_container">
      <div id="header">
        <h1><?php echo link_to(sfConfig::get('app_sfSimpleBlog_title', 'How is life on earth?'), 'sfSimpleBlog/index') ?></h1>
        <div id="tagline"><?php echo sfConfig::get('app_sfSimpleBlog_tagline', 'You\'d better start to live before it\'s too late') ?></div>
      </div>
      <div id="sidebar-a">
        <?php include_slot('sfSimpleBlog_sidebar') ?>
      </div>
      <div id="content" >
        <?php echo $sf_content ?>
      </div>
      <div id="footer"></div>
    </div>
  </body>
</html>