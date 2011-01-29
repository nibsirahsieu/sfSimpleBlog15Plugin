<?php

/**
 * sfSimpleBlogAbout form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfSimpleBlogAboutForm extends BasesfSimpleBlogAboutForm
{
  public function configure()
  {
    $this->widgetSchema['about'] = new sfWidgetFormTextareaTinyMCE(array(  'theme' => 'simple',), array(  'rows' => 25,  'cols' => 80,));
  }
}
