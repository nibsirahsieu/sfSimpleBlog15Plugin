<?php

/**
 * sfSimpleBlogPost form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfSimpleBlogPostForm extends BasesfSimpleBlogPostForm
{
  public function configure()
  {
    $this->widgetSchema['author_id'] = new sfWidgetFormInputHidden();
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
    if ($this->isNew())
    {
      if (self::getUser()->getGuardUser()) $this->setDefault('author_id', self::getUser()->getGuardUser()->getId());
    }
  }
}
