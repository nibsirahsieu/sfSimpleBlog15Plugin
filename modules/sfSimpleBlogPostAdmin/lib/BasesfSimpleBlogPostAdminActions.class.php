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
      $this->redirect('@sf_simple_blog_post');
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
      $this->redirect('@sf_simple_blog_post');
    }
  }

  public function executeViewVersion(sfWebRequest $request)
  {
    $this->post_version = sfSimpleBlogPostVersionQuery::create()->filterById($request->getParameter('id'))->filterByVersion($request->getParameter('version'))->findOne();
  }

  public function executeDeleteVersion(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    
    $this->forward404Unless($post_version = sfSimpleBlogPostVersionQuery::create()->filterById($request->getParameter('id'))->filterByVersion($request->getParameter('version'))->findOne());

    $post_version->delete();

    $this->getUser()->setFlash('notice', 'item version = '.$post_version->getVersion(). ' has been deleted');
    $this->redirect('@sf_simple_blog_post_edit?id='.$post_version->getId());
  }

  public function executeRestoreVersion(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    
    $this->forward404Unless($post = sfSimpleBlogPostQuery::create()->findPk($request->getParameter('id')));

    $new_version = $request->getParameter('version');
    $post->toVersion($new_version)->save();
    
    $this->getUser()->setFlash('notice', 'item has been restored to version = '.$new_version);
    $this->redirect('@sf_simple_blog_post_edit?id='.$post->getId());
  }

  public function executeDeleteVersions(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    
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
