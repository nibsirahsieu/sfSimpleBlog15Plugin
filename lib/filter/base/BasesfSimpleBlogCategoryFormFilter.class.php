<?php

/**
 * sfSimpleBlogCategory filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSimpleBlogCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'                       => new sfWidgetFormFilterInput(),
      'sf_simple_blog_post_category_list' => new sfWidgetFormPropelChoice(array('model' => 'sfSimpleBlogPost', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                              => new sfValidatorPass(array('required' => false)),
      'description'                       => new sfValidatorPass(array('required' => false)),
      'sf_simple_blog_post_category_list' => new sfValidatorPropelChoice(array('model' => 'sfSimpleBlogPost', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_simple_blog_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addsfSimpleBlogPostCategoryListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(sfSimpleBlogPostCategoryPeer::CATEGORY_ID, sfSimpleBlogCategoryPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(sfSimpleBlogPostCategoryPeer::SF_BLOG_POST_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(sfSimpleBlogPostCategoryPeer::SF_BLOG_POST_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'sfSimpleBlogCategory';
  }

  public function getFields()
  {
    return array(
      'id'                                => 'Number',
      'name'                              => 'Text',
      'description'                       => 'Text',
      'sf_simple_blog_post_category_list' => 'ManyKey',
    );
  }
}
