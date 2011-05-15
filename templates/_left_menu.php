<div id="sf_admin_left">
  <ul id="admin_nav">
    <li>
      <a href="#" class="collapsed heading"><?php echo __('Posts', null, 'sf_admin_blog') ?></a>
      <ul class="navigation">
        <li><a href="<?php echo url_for('@sf_simple_blog_post') ?>"><?php echo __('Posts', null, 'sf_admin_blog') ?></a></li>
        <li><a href="<?php echo url_for('@sf_simple_blog_post_new') ?>"><?php echo __('Add New', null, 'sf_admin_blog') ?></a></li>
        <li><a href="<?php echo url_for('@sf_simple_blog_category') ?>"><?php echo __('Post Categories', null, 'sf_admin_blog') ?></a></li>
        <li><a href="<?php echo url_for('@sf_simple_blog_tag') ?>"><?php echo __('Post Tags', null, 'sf_admin_blog') ?></a></li>
      </ul>
    </li>
    <li><a href="#" class="collapsed heading"><?php echo __('Comments', null, 'sf_admin_blog') ?></a>
      <ul class="navigation">
        <li><a href="<?php echo url_for('@sf_nested_comment') ?>"><?php echo __('Comments', null, 'sf_admin_blog') ?></a></li>
      </ul>
    </li>
    <li><a href="#" class="collapsed heading"><?php echo __('Assets', null, 'sf_admin_blog') ?></a>
      <ul class="navigation">
        <li><a href="<?php echo url_for('@sf_asset_library_root') ?>"><?php echo __('Assets', null, 'sf_admin_blog') ?></a></li>
        <li><a href="<?php echo url_for('@sf_asset_library_mass_upload') ?>"><?php echo __('Upload Assets', null, 'sf_admin_blog') ?></a></li>
      </ul>
    </li>
    <li><a href="#" class="collapsed heading"><?php echo __('Pages', null, 'sf_admin_blog') ?></a>
      <ul class="navigation">
        <li><a href="<?php echo url_for('@sf_simple_blog_page') ?>"><?php echo __('Pages', null, 'sf_admin_blog') ?></a></li>
        <li><a href="<?php echo url_for('@sf_simple_blog_page_new') ?>"><?php echo __('Add New', null, 'sf_admin_blog') ?></a></li>
      </ul>
    </li>
    <li>
      <a href="#" class="collapsed heading"><?php echo __('Links', null, 'sf_admin_blog') ?></a>
      <ul class="navigation">
        <li><a href="<?php echo url_for('@sf_simple_blog_link') ?>"><?php echo __('Links', null, 'sf_admin_blog') ?></a></li>
        <li><a href="<?php echo url_for('@sf_simple_blog_link_new') ?>"><?php echo __('Add New', null, 'sf_admin_blog') ?></a></li>
        <li><a href="<?php echo url_for('@sf_simple_blog_link_category') ?>"><?php echo __('Link Categories', null, 'sf_admin_blog') ?></a></li>
      </ul>
    </li>
  </ul>
</div>