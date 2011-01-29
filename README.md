# sfSimpleBlog15Plugin #

The `sfSimpleBlog15Plugin` is a symfony plugin to create a simple blog. This plugin use sfPropel15Plugin (1.6 branch) as an ORM, and it is based on sfSimpleBlogPlugin.

## Installation ##
  * Install the plugin

        git clone git://github.com/nibsirahsieu/sfSimpleBlog15Plugin.git

  * Activate the plugin in the `config/ProjectConfiguration.class.php`

        [php]
        class ProjectConfiguration extends sfProjectConfiguration
        {
          public function setup()
          {
            ...
            $this->enablePlugins('sfSimpleBlog15Plugin');
            ...
          }
        }

## Dependencies ##
  * sfGuardPlugin
  * sfPropel15Plugin with 1.6 branch
  * sfNestedCommentPlugin
  * sfPropelActAsTaggableBehaviorPlugin
  * sfPropelTaggableWidgetPlugin
  * sfSyntaxHighlighterPlugin
  * sfThemePlugin
  * themeVeryplaintxtPlugin
  * sfFeed2Plugin
  * sfAssetLibraryPlugin
  * sfThumbnailPlugin
  * sfAdminDashPlugin
  * sfFormExtraPlugin
  * omCrossAppUrlPlugin
  * sfJqueryReloadedPlugin
  * sfPropelLuceneableBehaviorPlugin

## Working Demo ##
  * http://nibsirahsieu.com, this is my own blog and it is built on this plugin
