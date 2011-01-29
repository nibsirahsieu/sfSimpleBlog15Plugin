<?php

require_once dirname(__FILE__).'/sfSimpleBlogPostAdminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/sfSimpleBlogPostAdminGeneratorHelper.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardUser
 * @author     Fabien Potencier
 * @version    SVN: $Id: BasesfGuardUserActions.class.php 12965 2008-11-13 06:02:38Z fabien $
 */
class BasesfSimpleBlogPostAdminActions extends autoSfSimpleBlogPostAdminActions
{
  public function executeTogglePublish(sfWebRequest $request)
  {
    $post = $this->getRoute()->getObject();
    $post->setIsPublished(!$post->getIsPublished());
    $post->save();
    if($referer = $request->getReferer())
    {
      $this->redirect($referer);
    }
    else
    {
      $this->redirect('sfSimpleBlogPostAdmin/list');
    }
  }

  public function executeToggleComment(sfWebRequest $request)
  {
    $post = $this->getRoute()->getObject();
    $post->setAllowComments(!$post->getAllowComments());
    $post->save();

    if($referer = $request->getReferer())
    {
      $this->redirect($referer);
    }
    else
    {
      $this->redirect('sfSimpleBlogPostAdmin/list');
    }
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $affectedRows = 0;

      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $prms = $request->getParameter($form->getName());
      $tags = isset($prms['tags']) ? $prms['tags'] : array();
      $con = $form->getConnection();
      try
      {
        $con->beginTransaction();
        if (count($tags) > 0) $form->getObject()->addTag($tags);
        $sf_simple_blog_post = $form->save($con);
        $con->commit();
      }
      catch (Exception $e)
      {
        $con->rollback();
        throw $e;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $sf_simple_blog_post)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@sf_simple_blog_post_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'sf_simple_blog_post_edit', 'sf_subject' => $sf_simple_blog_post));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
