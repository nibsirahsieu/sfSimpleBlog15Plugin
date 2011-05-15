<?php use_helper('I18N') ?>
<div id="sf_admin_container" class="clearfix">
  <div class="dashboard_box">
    <div class="box">
      <h2><?php echo __('At a Glance', null, 'sf_simple_blog') ?></h2>
      <table>
        <tbody>
          <tr>
            <td><h3><?php echo __('Contents', null, 'sf_simple_blog') ?></h3></td>
            <td><h3><?php echo __('Comments', null, 'sf_simple_blog') ?></h3></td>
          </tr>
          <tr>
            <td><?php echo sfSimpleBlogPostQuery::create()->count() ?> Posts</td>
            <td><?php echo $nbComments = sfNestedCommentQuery::create()->count() ?> Comments</td>
          </tr>
          <tr>
            <td><?php echo sfSimpleBlogPageQuery::create()->count() ?> Pages</td>
            <td><?php echo $nbApprovedComments = sfNestedCommentQuery::create()->approved()->count() ?> Approved</td>
          </tr>
          <tr>
            <td><?php echo sfSimpleBlogCategoryQuery::create()->count() ?> Categories</td>
            <td><?php echo $nbComments - $nbApprovedComments ?> Pending</td>
          </tr>
          <tr>
            <td><?php echo TagQuery::create()->count() ?> Tags</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="box">
      <h2><?php echo __('Recent Comments', null, 'sf_simple_blog') ?></h2>
      <table>
        <tbody>
          <?php foreach ($recentComments as $i => $recentComment): ?>
            <tr>
              <td><?php echo $i+1 ?></td>
              <td>
                <h4><?php echo __('From ') ?><?php echo $recentComment->getAuthorName() ?><?php echo __(' on ') ?>"<?php echo $recentComment->getCommentableTitle() ?>"</h4>
                <?php $strippedComment = strip_tags($recentComment->getContent(ESC_RAW)) ?>
                <?php if (strlen($strippedComment) > 100): ?>
                  <?php echo substr(strip_tags($recentComment->getContent(ESC_RAW)), 0, 100).' ...' ?>
                <?php else: ?>
                  <?php echo $strippedComment ?>
                <?php endif; ?>
                <div>
                  <?php echo link_to(__('Reply'), 'sfNestedCommentAdmin/new?id='.$recentComment->getId()) ?>
                  &nbsp;|&nbsp;
                  <?php echo link_to(__('Edit'), 'sfNestedCommentAdmin/edit?id='.$recentComment->getId()) ?>
                  &nbsp;|&nbsp;
                  <?php echo link_to(__('Delete'), 'sfNestedCommentAdmin/delete?id='.$recentComment->getId(), array('confirm' => __('Are you sure?'), 'method' => "delete")) ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="dashboard_box">
    <div class="box">
      <h2><?php echo __('Quick Post', null, 'sf_simple_blog') ?></h2>
      <form action="<?php echo url_for('sfSimpleBlogAdmin/saveDraft') ?>" method="post">
        <?php echo $quickForm->renderHiddenFields() ?>
        <p>
          <?php echo $quickForm['title']->renderRow() ?>
        </p>
        <p>
          <?php echo $quickForm['content']->renderRow() ?>
        </p>
        <p>
          <input type="submit" value="Save Draft">
        </p>
      </form>
    </div>
    <div class="box">
      <h2><?php echo __('Recent Drafts', null, 'sf_simple_blog') ?></h2>
      <table>
        <tbody>
          <?php foreach ($drafts as $i => $draft): ?>
            <tr>
              <td><?php echo $i+1 ?></td>
              <td>
                <h4><?php echo $draft->getTitle() ?></h4>
                <?php $strippedContent = strip_tags($draft->getContent()) ?>
                <?php if (strlen($strippedContent) > 100): ?>
                  <?php echo substr(strip_tags($strippedContent->getContent(ESC_RAW)), 0, 100).' ...' ?>
                <?php else: ?>
                  <?php echo $strippedContent ?>
                <?php endif; ?>
                <div>
                  <?php echo link_to(__('Edit'), 'sfSimpleBlogPostAdmin/edit?id='.$draft->getId()) ?>
                  &nbsp;|&nbsp;
                  <?php echo link_to(__('Delete'), 'sfSimpleBlogPostAdmin/delete?id='.$draft->getId(), array('confirm' => __('Are you sure?'), 'method' => 'delete')) ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
