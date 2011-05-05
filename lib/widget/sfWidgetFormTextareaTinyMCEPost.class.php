<?php
class sfWidgetFormTextareaTinyMCEPost extends sfWidgetFormTextareaTinyMCE
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);
    $this->addOption('config',
            'plugins : "emotions, preview, advimage, advlink, pagebreak, syntaxhl, preelementfix",
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,emotions",
            theme_advanced_buttons2 : "undo,redo,link,unlink,image,code,syntaxhl,pagebreak,preview",
            theme_advanced_buttons3 : "",
            theme_advanced_disable  : "anchor,cleanup,help",
            extended_valid_elements : "textarea[cols|rows|disabled|name|readonly|class]",
            remove_linebreaks       : false,
            remove_script_host      : false,
            relative_urls           : false,
            file_browser_callback   : "sfAssetsLibrary.fileBrowserCallBack"'
          );
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    return parent::render($name, $value ? htmlentities($value) : $value, $attributes, $errors);
  }
  
  public function  getJavaScripts()
  {
    return array('/js/tiny_mce/tiny_mce.js');
  }
}