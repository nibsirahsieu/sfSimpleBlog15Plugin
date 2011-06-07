<?php
class sfSimpleBlog15PluginConfiguration extends sfPluginConfiguration
{
  public function initialize()
  {
    if ($this->configuration instanceof sfApplicationConfiguration)
    {
      if (sfConfig::get('app_sfSimpleBlog_use_feeds', false))
      {
        sfConfig::set('sf_enabled_modules', array_merge(sfConfig::get('sf_enabled_modules'), array('sfSimpleBlogFeed')));
        if (sfConfig::get('app_sfSimpleBlog_routes_register', true))
        {
          $this->dispatcher->connect('routing.load_configuration', array('sfSimpleBlog15Routing', 'listenToFeedRoutingLoadConfigurationEvent'));
        }
      }
      
      if (sfConfig::get('app_sfSimpleBlog_routes_register', true) && in_array('sfSimpleBlog', sfConfig::get('sf_enabled_modules', array())))
      {
        $this->dispatcher->connect('routing.load_configuration', array('sfSimpleBlog15Routing', 'listenToRoutingLoadConfigurationEvent'));
      }

      if (sfConfig::get('app_sfSimpleBlog_routes_register', true))
      {
        foreach (array('sfSimpleBlogPostAdmin', 'sfSimpleBlogCategoryAdmin', 'sfSimpleBlogPageAdmin', 'sfSimpleBlogTagAdmin', 'sfSimpleBlogLinkAdmin', 'sfSimpleBlogLinkCategoryAdmin') as $module)
        {
          if (in_array($module, sfConfig::get('sf_enabled_modules')))
          {
            $this->dispatcher->connect('routing.load_configuration', array('sfSimpleBlog15Routing', 'addRouteFor'.str_replace('sfSimpleBlog', '', $module)));
          }
        }
      }
    }
  }

  public static function loadBackendTheme(sfEvent $event)
  {
    $parameters = $event->getParameters();
    $action = $event->getSubject()->getAction($parameters['module'], $parameters['action']);
    if ($action->isSecure())
    {
      $action->loadTheme(sfConfig::get('app_sfSimpleBlog_admin_theme', 'backend_theme'));
    }
  }
}
