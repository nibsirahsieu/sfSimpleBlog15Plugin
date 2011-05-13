<?php use_helper('I18N', 'crossAppLink') ?>
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
		<link rel="stylesheet" type="text/css" media="screen" href="/sfSimpleBlog15Plugin/css/login.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/sfSimpleBlog15Plugin/css/button.css" />
  </head>
	<body>
    <div id="logincontainer">
      <p id="backtoblog"><a href="<?php echo cross_app_url_for('frontend', '@homepage', true) ?>">← Back to <?php echo sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog') ?></a></p>
      <h1><?php echo sfConfig::get('app_sfSimpleBlog_title', 'sfSimpleBlog') ?></h1>
      <div id="loginbox">
        <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
          <?php echo $form->renderGlobalErrors(); ?>
          <?php if(isset($form['_csrf_token'])): ?>
            <?php echo $form['_csrf_token']->render(); ?>
          <?php endif; ?>
          <div class="inputlabel"><?php echo $form['username']->renderLabel(__('Username', array(), 'sf_admin_blog')); ?>&nbsp;</div>
          <div class="inputcontainer">
            <?php echo $form['username']->render(array('class' => 'username')); ?>
          </div>
          <div class="inputlabel"><?php echo $form['password']->renderLabel(__('Password', array(), 'sf_admin_blog')); ?>&nbsp;</div>
          <div class="inputcontainer">
            <?php echo $form['password']->render(array('class' => 'password')); ?>
          </div>
          <div class="inputrememberme">
            <?php echo $form['remember']->renderLabel(__('Remember?', array(), 'sf_admin_blog')); ?>
            <?php echo $form['remember']->render(array('class' => 'inputcheck')); ?>
          </div>
          <input type="submit" value="Login" class="loginsubmit button blue" />
        </form>
      </div>
    </div>
  </body>
</html>