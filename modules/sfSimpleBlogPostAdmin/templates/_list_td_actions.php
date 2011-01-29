<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($sf_simple_blog_post, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <li class="sf_admin_action_togglepublish">
      <?php $publishedText = $sf_simple_blog_post->getIsPublished() ? 'Unpublish' : 'Publish' ?>
      <?php echo link_to(__($publishedText, array(), 'messages'), 'sfSimpleBlogPostAdmin/togglePublish?id='.$sf_simple_blog_post->getId(), array()) ?>
    </li>
    <li class="sf_admin_action_togglecomment">
      <?php $commentText = $sf_simple_blog_post->getAllowComments() ? 'Disable Comments' : 'Enable Comments' ?>
      <?php echo link_to(__($commentText, array(), 'messages'), 'sfSimpleBlogPostAdmin/toggleComment?id='.$sf_simple_blog_post->getId(), array()) ?>
    </li>
    <?php echo $helper->linkToDelete($sf_simple_blog_post, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
