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

      foreach (array('sfSimpleBlogPostAdmin', 'sfSimpleBlogCategoryAdmin', 'sfSimpleBlogPageAdmin', 'sfSimpleBlogTagAdmin', 'sfSimpleBlogLinkAdmin', 'sfSimpleBlogLinkCategoryAdmin') as $module)
      {
        if (in_array($module, sfConfig::get('sf_enabled_modules')))
        {
          $this->dispatcher->connect('routing.load_configuration', array('sfSimpleBlog15Routing', 'addRouteFor'.str_replace('sfSimpleBlog', '', $module)));
        }
      }
    }
  }

  public static function loadBackendTheme(sfEvent $event)
  {
    $parameters = $event->getParameters();
    if ($event->getSubject()->getAction($parameters['module'], $parameters['action'])->isSecure())
    {
      sfApplicationConfiguration::getActive()->getPluginConfiguration('sfThemePlugin')->getThemeManager()->setCurrentTheme(sfConfig::get('app_sfSimpleBlog_admin_theme', 'backend_theme'));
    }
  }
}
