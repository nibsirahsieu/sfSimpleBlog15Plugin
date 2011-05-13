<?php
class BasesfSimpleBlogAdminActions extends sfActions
{
  public function executeDashboard(sfWebRequest $request)
  {
    $this->quickForm = new sfSimpleBlogPostSimpleForm();
    $this->recentComments = sfNestedCommentQuery::create()->recent()->limit(5)->find();
    $this->drafts = sfSimpleBlogPostQuery::create()->draft()->find();
  }

  public function executeSaveDraft(sfWebRequest $request)
  {
    $this->quickForm = new sfSimpleBlogPostSimpleForm();
    if ($this->quickForm->bindAndSave($request->getParameter($this->quickForm->getName()))) {
      return $this->redirect('sfSimpleBlogAdmin/dashboard');
    }
    $this->recentComments = sfNestedCommentQuery::create()->recent()->limit(5)->find();
    $this->drafts = sfSimpleBlogPostQuery::create()->draft()->find();
    $this->setTemplate('dashboard');
  }
}