<?php

/**
 * sfSimpleBlogCategory form base class.
 *
 * @method sfSimpleBlogCategory getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSimpleBlogCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                => new sfWidgetFormInputHidden(),
      'name'                              => new sfWidgetFormInputText(),
      'description'                       => new sfWidgetFormInputText(),
      'sf_simple_blog_post_category_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfSimpleBlogPost')),
    ));

    $this->setValidators(array(
      'id'                                => new sfValidatorPropelChoice(array('model' => 'sfSimpleBlogCategory', 'column' => 'id', 'required' => false)),
      'name'                              => new sfValidatorString(array('max_length' => 20)),
      'description'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sf_simple_blog_post_category_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfSimpleBlogPost', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'sfSimpleBlogCategory', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('sf_simple_blog_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSimpleBlogCategory';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sf_simple_blog_post_category_list']))
    {
      $values = array();
      foreach ($this->object->getsfSimpleBlogPostCategorys() as $obj)
      {
        $values[] = $obj->getSfBlogPostId();
      }

      $this->setDefault('sf_simple_blog_post_category_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savesfSimpleBlogPostCategoryList($con);
  }

  public function savesfSimpleBlogPostCategoryList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sf_simple_blog_post_category_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(sfSimpleBlogPostCategoryPeer::CATEGORY_ID, $this->object->getPrimaryKey());
    sfSimpleBlogPostCategoryPeer::doDelete($c, $con);

    $values = $this->getValue('sf_simple_blog_post_category_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new sfSimpleBlogPostCategory();
        $obj->setCategoryId($this->object->getPrimaryKey());
        $obj->setSfBlogPostId($value);
        $obj->save();
      }
    }
  }

}
