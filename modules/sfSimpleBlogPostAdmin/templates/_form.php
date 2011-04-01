<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('sfAsset') ?>
<?php echo init_asset_library() ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@sf_simple_blog_post') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('sfSimpleBlogPostAdmin/form_fieldset', array('sf_simple_blog_post' => $sf_simple_blog_post, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>

    <?php include_partial('sfSimpleBlogPostAdmin/form_actions', array('sf_simple_blog_post' => $sf_simple_blog_post, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
<?php if (!$form->isNew()): ?>
  <?php include_partial('versions', array('versions' => $form->getObject()->getAllVersions(), 'sf_simple_blog_post' => $sf_simple_blog_post)) ?>
<?php endif; ?>
