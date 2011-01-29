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
  * [sfGuardPlugin] (http://www.symfony-project.org/plugins/sfGuardPlugin)
  * [sfPropel15Plugin with 1.6 branch] (https://github.com/fzaninotto/sfPropel15Plugin), see (https://github.com/fzaninotto/sfPropel15Plugin/commit/3059e1b9af3cb3b39e0096d7807d1cac6e7a230e)
  * [sfNestedCommentPlugin] (https://github.com/nibsirahsieu/sfNestedCommentPlugin)
  * [sfPropelActAsTaggableBehaviorPlugin] (http://www.symfony-project.org/plugins/sfPropelActAsTaggableBehaviorPlugin)
  * [sfPropelTaggableWidgetPlugin] (http://www.symfony-project.org/plugins/sfPropelTaggableWidgetPlugin)
  * [sfSyntaxHighlighterPlugin] (http://www.symfony-project.org/plugins/sfSyntaxHighlighterPlugin)
  * [sfThemePlugin] (https://github.com/rafaelgou/sfThemePlugin)
  * [themeVeryplaintxtPlugin] (https://github.com/nibsirahsieu/themeVeryplaintxtPlugin)
  * [sfFeed2Plugin] (http://www.symfony-project.org/plugins/sfFeed2Plugin)
  * [sfAssetLibraryPlugin] (http://www.symfony-project.org/plugins/sfAssetsLibraryPlugin)
  * [sfThumbnailPlugin] (http://www.symfony-project.org/plugins/sfThumbnailPlugin)
  * [sfAdminDashPlugin] (http://www.symfony-project.org/plugins/sfAdminDashPlugin)
  * [sfFormExtraPlugin] (http://www.symfony-project.org/plugins/sfFormExtraPlugin)
  * [omCrossAppUrlPlugin] (http://www.symfony-project.org/plugins/omCrossAppUrlPlugin)
  * [sfJqueryReloadedPlugin] (http://www.symfony-project.org/plugins/sfJqueryReloadedPlugin)
  * [sfPropelLuceneableBehaviorPlugin] (https://github.com/nibsirahsieu/sfPropelLuceneableBehaviorPlugin)

## Working Demo ##
  * [http://nibsirahsieu.com](http://nibsirahsieu.com), this is my own blog and it is built on this plugin
