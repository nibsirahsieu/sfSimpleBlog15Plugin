<?php
class sfSimpleBlogPostSimpleForm extends sfSimpleBlogPostForm
{
  public function  configure()
  {
    $this->useFields(array('id', 'title', 'content', 'author_id'));
    parent::configure();
    $this->widgetSchema->setNameFormat('sf_simple_quick_post[%s]');
  }
}