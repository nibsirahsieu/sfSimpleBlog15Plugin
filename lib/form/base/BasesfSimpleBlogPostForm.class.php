<?php

/**
 * sfSimpleBlogPost form base class.
 *
 * @method sfSimpleBlogPost getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSimpleBlogPostForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                => new sfWidgetFormInputHidden(),
      'author_id'                         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'title'                             => new sfWidgetFormInputText(),
      'stripped_title'                    => new sfWidgetFormInputText(),
      'content'                           => new sfWidgetFormTextarea(),
      'is_published'                      => new sfWidgetFormInputCheckbox(),
      'allow_comments'                    => new sfWidgetFormInputCheckbox(),
      'updated_at'                        => new sfWidgetFormDateTime(),
      'published_at'                      => new sfWidgetFormDate(),
      'internal_published_at'             => new sfWidgetFormDateTime(),
      'version'                           => new sfWidgetFormInputText(),
      'sf_simple_blog_post_category_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfSimpleBlogCategory')),
    ));

    $this->setValidators(array(
      'id'                                => new sfValidatorPropelChoice(array('model' => 'sfSimpleBlogPost', 'column' => 'id', 'required' => false)),
      'author_id'                         => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'title'                             => new sfValidatorString(array('max_length' => 255)),
      'stripped_title'                    => new sfValidatorString(array('max_length' => 245)),
      'content'                           => new sfValidatorString(),
      'is_published'                      => new sfValidatorBoolean(array('required' => false)),
      'allow_comments'                    => new sfValidatorBoolean(array('required' => false)),
      'updated_at'                        => new sfValidatorDateTime(array('required' => false)),
      'published_at'                      => new sfValidatorDate(array('required' => false)),
      'internal_published_at'             => new sfValidatorDateTime(array('required' => false)),
      'version'                           => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
      'sf_simple_blog_post_category_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfSimpleBlogCategory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'sfSimpleBlogPost', 'column' => array('is_published', 'internal_published_at'))),
        new sfValidatorPropelUnique(array('model' => 'sfSimpleBlogPost', 'column' => array('stripped_title', 'published_at'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sf_simple_blog_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSimpleBlogPost';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sf_simple_blog_post_category_list']))
    {
      $values = array();
      foreach ($this->object->getsfSimpleBlogPostCategorys() as $obj)
      {
        $values[] = $obj->getCategoryId();
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
    $c->add(sfSimpleBlogPostCategoryPeer::SF_BLOG_POST_ID, $this->object->getPrimaryKey());
    sfSimpleBlogPostCategoryPeer::doDelete($c, $con);

    $values = $this->getValue('sf_simple_blog_post_category_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new sfSimpleBlogPostCategory();
        $obj->setSfBlogPostId($this->object->getPrimaryKey());
        $obj->setCategoryId($value);
        $obj->save();
      }
    }
  }

}
