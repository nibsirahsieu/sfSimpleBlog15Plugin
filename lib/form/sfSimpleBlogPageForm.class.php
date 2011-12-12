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
    $this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCE(array(  'theme' => 'simple',), array(  'rows' => 25,  'cols' => 80,));
  }
  
  public function  getJavaScripts()
  {
    return array('/js/tiny_mce/tiny_mce.js');
  }
}
