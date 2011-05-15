<?php use_helper('jQuery') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>
      <?php if (!include_slot('title')): ?>
        <?php echo sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog') ?>
      <?php endif; ?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <?php include_theme_partial('header') ?>
    <?php include_theme_partial('left_menu') ?>
    <div id="sf_admin_right">
      <?php include_slot('searchForm') ?>
      <?php echo $sf_content ?>
    </div>
    <?php include_theme_partial('footer') ?>
  </body>
</html>
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery("#admin_nav > li > a.collapsed + ul").slideToggle("medium");
  jQuery("#admin_nav > li > a").click(function() {
    jQuery(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
  });
});
</script>
