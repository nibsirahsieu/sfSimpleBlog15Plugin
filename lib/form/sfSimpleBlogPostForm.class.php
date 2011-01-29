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
    $this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCEPost(array(
  		'width'  => 750,
  		'height' => 350
		));
    $this->widgetSchema['title']->setAttribute('size', 60);
    $this->widgetSchema['tags'] = new sfWidgetFormInputTags(array(
          'taggable_object'          => $this->getObject(),
          'enable_autocomplete'      => true
        ));
    $this->setValidator('tags', new sfValidatorTags());
  }

  public function  updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
    if ($this->isNew())
    {
      if (self::getUser()->getGuardUser()) $this->setDefault('author_id', self::getUser()->getGuardUser()->getId());
    }
  }
}
