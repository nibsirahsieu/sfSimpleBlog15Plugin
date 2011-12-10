<?php use_helper('I18N', 'crossAppLink'); ?>


<div id='sf_admin_theme_header'>
  <p class="f-right">
    User:
    <strong><a href="#"><?php echo $sf_user->getGuardUser()->getUsername() ?></a></strong>&nbsp;&nbsp;&nbsp;&nbsp;
    <strong><?php echo link_to(__('Logout', null, 'sf_admin_blog'), '@sf_guard_signout', array('id' => 'logout')); ?></strong>
  </p>
</div>
<div id='sf_admin_top_menu'>
  <ul class="f-right">
    <li><a href="<?php echo cross_app_url_for('frontend', '@homepage', true) ?>"><span class="button black large"><?php echo __('Visit Site', null, 'sf_admin_blog') ?> &raquo;</span></a></li>
  </ul>
  <ul>
    <li><a href="<?php echo url_for('@homepage') ?>"><span class="button black large">&laquo; <?php echo __('Dashboard', null, 'sf_admin_blog') ?></span></a></li>
  </ul>
</div>