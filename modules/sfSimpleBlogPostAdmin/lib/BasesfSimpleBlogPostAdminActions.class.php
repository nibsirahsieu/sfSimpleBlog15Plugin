<?php

require_once dirname(__FILE__).'/sfSimpleBlogPostAdminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/sfSimpleBlogPostAdminGeneratorHelper.class.php';

/**
 * sfSimpleBlogPostAdmin actions.
 *
 * @package    sfSimpleBlog15Plugin
 * @subpackage sfSimpleBlogPostAdmin
 * @author     Nibsirahsieu NT
 * @version    SVN: $Id: 
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

  public function executeViewVersion(sfWebRequest $request)
  {
    $this->post_version = sfSimpleBlogPostVersionQuery::create()->filterById($request->getParameter('id'))->filterByVersion($request->getParameter('version'))->findOne();
  }

  public function executeDeleteVersion(sfWebRequest $request)
  {
    $this->forward404Unless($post_version = sfSimpleBlogPostVersionQuery::create()->filterById($request->getParameter('id'))->filterByVersion($request->getParameter('version'))->findOne());

    $post_version->delete();

    $this->getUser()->setFlash('notice', 'item version = '.$post_version->getVersion(). ' has been deleted');
    $this->redirect('@sf_simple_blog_post_edit?id='.$post_version->getId());
  }

  public function executeRestoreVersion(sfWebRequest $request)
  {
    $this->forward404Unless($post = sfSimpleBlogPostQuery::create()->findPk($request->getParameter('id')));

    $new_version = $request->getParameter('version');
    $post->toVersion($new_version)->save();
    
    $this->getUser()->setFlash('notice', 'item has been restored to version = '.$new_version);
    $this->redirect('@sf_simple_blog_post_edit?id='.$post->getId());
  }

  public function executeDeleteVersions(sfWebRequest $request)
  {
    if (!$versions = $request->getParameter('versions'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@sf_simple_blog_post_edit?id='.$request->getParameter('id'));
    }
    $post_versions = sfSimpleBlogPostVersionQuery::create()->filterById($request->getParameter('id'))->filterByVersion($versions)->find();

    $con = Propel::getConnection();
    try
    {
      $con->beginTransaction();
      foreach ($post_versions as $post_version)
      {
        $post_version->delete($con);
      }
      $con->commit();
    }
    catch (Exception $e)
    {
      $con->rollBack();
      throw $e;
    }

    $this->getUser()->setFlash('notice', 'Selected items has been deleted');
    
    $this->redirect('@sf_simple_blog_post_edit?id='.$request->getParameter('id'));
  }
}
