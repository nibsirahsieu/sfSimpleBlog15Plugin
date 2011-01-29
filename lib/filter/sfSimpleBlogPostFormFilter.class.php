<?php

/**
 * sfSimpleBlogPost filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
class sfSimpleBlogPostFormFilter extends BasesfSimpleBlogPostFormFilter
{
  public function configure()
  {
    $this->useFields(array('title', 'author_id', 'sf_simple_blog_post_category_list'));
    $this->widgetSchema['sf_simple_blog_post_category_list']->setLabel('Category');
    $this->getWidgetSchema()->setFormFormatterName('list');
  }
}
