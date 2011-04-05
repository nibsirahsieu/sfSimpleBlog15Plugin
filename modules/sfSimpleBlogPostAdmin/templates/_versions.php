<div class="sf_admin_list">
  <form action="<?php echo url_for('sfSimpleBlogPostAdmin/deleteVersions?id='.$sf_simple_blog_post->getId()) ?>" method="post">
  <h2>Histories</h2>
  <table width="100%">
    <thead>
      <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
      <th class="sf_admin_text">Version</th>
      <th class="sf_admin_text">Title</th>
      <th class="sf_admin_text">Created At</th>
      <th class="sf_admin_text">Actions</th>
    </thead>
  <?php foreach ($versions as $version): ?>
    <tbody>
      <tr>
        <td><input type="checkbox" name="versions[]" value="<?php echo $version->getVersion() ?>" class="sf_admin_batch_checkbox" /></td>
        <td class="sf_admin_text"><?php echo $version->getVersion() ?></td>
        <td class="sf_admin_text"><?php echo $version->getTitle() ?></td>
        <td class="sf_admin_text"><?php echo $version->getUpdatedAt() ?></td>
        <td class="sf_admin_text">
          <ul class="sf_admin_td_actions">
            <li><?php echo link_to(__('View'), 'sfSimpleBlogPostAdmin/viewVersion?id='.$version->getId().'&version='.$version->getVersion(), array('popup'=>array('theWindow', 'left=100,top=10,width=600,height=600,location=no,scrollbars =yes,resizable=yes,directories=no,status=no,toolbar=no,menubar=no'))) ?></li>
            <li><?php echo link_to(__('Restore'), 'sfSimpleBlogPostAdmin/restoreVersion?id='.$version->getId().'&version='.$version->getVersion(), array('confirm' => __('Are your sure?'), 'method' => 'put')) ?></li>
            <li><?php echo link_to(__('Delete'), 'sfSimpleBlogPostAdmin/deleteVersion?id='.$version->getId().'&version='.$version->getVersion(), array('confirm' => __('Are your sure?'), 'method' => 'delete')) ?></li>
          </ul>
        </td>
      </tr>
    </tbody>
  <?php endforeach; ?>
    <tfoot>
      <tr>
        <th colspan="5">&nbsp</th>
      </tr>
    </tfoot>
  </table>
  <?php if (count($versions) > 0): ?>
    <?php $form = new BaseForm(); if ($form->isCSRFProtected()): ?>
      <input type="hidden" name="<?php echo $form->getCSRFFieldName() ?>" value="<?php echo $form->getCSRFToken() ?>" />
    <?php endif; ?>
    <input type="submit" value="Delete Versions" />
  <?php endif; ?>
  </form>
</div>
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
