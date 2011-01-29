<?php use_helper('I18N') ?>
<?php use_javascript('/js/tiny_mce/tiny_mce.js') ?>
<div id="sf_admin_container">
  <h1>About</h1>

  <div id="sf_admin_header"></div>
  <div id="sf_admin_content">

  <div class="sf_admin_form">
    <form method="post" action="<?php echo url_for('@sf_simple_blog_about_update?id='.$about->getId()) ?>">
      <fieldset id="sf_fieldset_none">
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">
          <?php echo $form ?>
        </div>
      </fieldset>

    <ul class="sf_admin_actions">
      <li class="sf_admin_action_save"><input type="submit" value="Save" /></li>
    </ul>
    </form>
  </div>
  </div>
  <div id="sf_admin_footer"></div>
</div>