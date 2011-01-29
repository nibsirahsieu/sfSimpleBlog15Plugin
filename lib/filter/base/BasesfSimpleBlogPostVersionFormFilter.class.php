<?php

/**
 * sfSimpleBlogPostVersion filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSimpleBlogPostVersionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stripped_title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_published'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'allow_comments'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'published_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'internal_published_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'author_id'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'                 => new sfValidatorPass(array('required' => false)),
      'stripped_title'        => new sfValidatorPass(array('required' => false)),
      'content'               => new sfValidatorPass(array('required' => false)),
      'is_published'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'allow_comments'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'published_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'internal_published_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sf_simple_blog_post_version_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSimpleBlogPostVersion';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'ForeignKey',
      'author_id'             => 'Number',
      'title'                 => 'Text',
      'stripped_title'        => 'Text',
      'content'               => 'Text',
      'is_published'          => 'Boolean',
      'allow_comments'        => 'Boolean',
      'updated_at'            => 'Date',
      'published_at'          => 'Date',
      'internal_published_at' => 'Date',
      'version'               => 'Number',
    );
  }
}
