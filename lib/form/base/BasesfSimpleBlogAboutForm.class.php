<?php

/**
 * sfSimpleBlogAbout form base class.
 *
 * @method sfSimpleBlogAbout getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSimpleBlogAboutForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'about' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorPropelChoice(array('model' => 'sfSimpleBlogAbout', 'column' => 'id', 'required' => false)),
      'about' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('sf_simple_blog_about[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSimpleBlogAbout';
  }


}
