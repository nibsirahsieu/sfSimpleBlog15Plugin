<?php

/**
 * sfSimpleBlogPage form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfSimpleBlogPageForm extends BasesfSimpleBlogPageForm
{
  public function configure()
  {
    $this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCE(array(  'theme' => 'advanced',), array(  'rows' => 25,  'cols' => 80,));
  }
}
