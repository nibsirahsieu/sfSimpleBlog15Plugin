<?php
class sfSimpleBlogPostFullForm extends sfSimpleBlogPostForm
{
  public function  configure()
  {
    parent::configure();
    $this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCEPost(array(
  		'width'  => 750,
  		'height' => 350
		));
    $this->widgetSchema['title']->setAttribute('size', 60);
    $this->widgetSchema['tags'] = new sfWidgetFormInputTags(array(
      'taggable_object'          => $this->getObject(),
      'enable_autocomplete'      => true
    ));
    $this->validatorSchema['tags'] = new sfValidatorTags(array(
      'taggable_object'          => $this->getObject()
    ));
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
    if ($this->isNew())
    {
      $this->setDefault('internal_published_at', time());
    }
  }
}