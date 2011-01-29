<?php

/**
 * sfSimpleBlogPostVersion form base class.
 *
 * @method sfSimpleBlogPostVersion getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSimpleBlogPostVersionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'author_id'             => new sfWidgetFormInputText(),
      'title'                 => new sfWidgetFormInputText(),
      'stripped_title'        => new sfWidgetFormInputText(),
      'content'               => new sfWidgetFormTextarea(),
      'is_published'          => new sfWidgetFormInputCheckbox(),
      'allow_comments'        => new sfWidgetFormInputCheckbox(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'published_at'          => new sfWidgetFormDate(),
      'internal_published_at' => new sfWidgetFormDateTime(),
      'version'               => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'sfSimpleBlogPost', 'column' => 'id', 'required' => false)),
      'author_id'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'title'                 => new sfValidatorString(array('max_length' => 255)),
      'stripped_title'        => new sfValidatorString(array('max_length' => 245)),
      'content'               => new sfValidatorString(),
      'is_published'          => new sfValidatorBoolean(array('required' => false)),
      'allow_comments'        => new sfValidatorBoolean(array('required' => false)),
      'updated_at'            => new sfValidatorDateTime(array('required' => false)),
      'published_at'          => new sfValidatorDate(array('required' => false)),
      'internal_published_at' => new sfValidatorDateTime(array('required' => false)),
      'version'               => new sfValidatorPropelChoice(array('model' => 'sfSimpleBlogPostVersion', 'column' => 'version', 'required' => false)),
    ));


Warning: call_user_func() expects parameter 1 to be a valid callback, class 'sfSimpleBlogPostVersionPeer' does not have a method 'getUniqueColumnNames' in /home/webdev/sfPropel15-with-16Plugin/sfPropel15Plugin/lib/generator/sfPropelFormGenerator.class.php on line 485

Warning: Invalid argument supplied for foreach() in /home/webdev/sfPropel15-with-16Plugin/sfPropel15Plugin/lib/generator/sfPropelFormGenerator.class.php on line 485
    $this->widgetSchema->setNameFormat('sf_simple_blog_post_version[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSimpleBlogPostVersion';
  }


}
