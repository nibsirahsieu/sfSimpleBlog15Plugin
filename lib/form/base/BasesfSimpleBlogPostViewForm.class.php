<?php

/**
 * sfSimpleBlogPostView form base class.
 *
 * @method sfSimpleBlogPostView getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSimpleBlogPostViewForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'title'                 => new sfWidgetFormInputText(),
      'stripped_title'        => new sfWidgetFormInputText(),
      'is_published'          => new sfWidgetFormInputCheckbox(),
      'published_at'          => new sfWidgetFormDate(),
      'internal_published_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'sfSimpleBlogPostView', 'column' => 'id', 'required' => false)),
      'title'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'stripped_title'        => new sfValidatorString(array('max_length' => 245, 'required' => false)),
      'is_published'          => new sfValidatorBoolean(array('required' => false)),
      'published_at'          => new sfValidatorDate(array('required' => false)),
      'internal_published_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_simple_blog_post_view[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSimpleBlogPostView';
  }


}
