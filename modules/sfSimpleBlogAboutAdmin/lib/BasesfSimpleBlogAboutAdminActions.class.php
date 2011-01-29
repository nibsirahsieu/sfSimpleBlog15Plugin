<?php

class BasesfSimpleBlogAboutAdminActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->about = sfSimpleBlogAboutQuery::create()->findOneOrCreate();
    $this->form = new sfSimpleBlogAboutForm($this->about);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->about = sfSimpleBlogAboutQuery::create()->findPk($request->getParameter('id'));
    if (null === $this->about) $this->about = new sfSimpleBlogAbout ();
    $this->form = new sfSimpleBlogAboutForm($this->about);
    if ($this->form->bindAndSave($request->getParameter($this->form->getName())))
    {
      return $this->redirect('@sf_simple_blog_about');
    }
    $this->setTemplate('index');
  }
}