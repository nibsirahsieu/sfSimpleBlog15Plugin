<?php
class sfSimpleBlog15PluginConfiguration extends sfPluginConfiguration
{
  public function initialize()
  {
    if ($this->configuration instanceof sfApplicationConfiguration)
    {
      if (sfConfig::get('app_sf_simple_blog15_plugin_routes_register', true) && in_array('sfSimpleBlog', sfConfig::get('sf_enabled_modules', array())))
      {
        $this->dispatcher->connect('routing.load_configuration', array('sfSimpleBlog15Routing', 'listenToRoutingLoadConfigurationEvent'));
      }

      foreach (array('sfSimpleBlogPostAdmin', 'sfSimpleBlogCategoryAdmin', 'sfSimpleBlogPageAdmin') as $module)
      {
        if (in_array($module, sfConfig::get('sf_enabled_modules')))
        {
          $this->dispatcher->connect('routing.load_configuration', array('sfSimpleBlog15Routing', 'addRouteFor'.str_replace('sfSimpleBlog', '', $module)));
        }
      }
    }
  }
}