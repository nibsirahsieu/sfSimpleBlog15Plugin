# sfSimpleBlog15Plugin #

The `sfSimpleBlog15Plugin` is a symfony plugin to create a simple blog. This plugin use sfPropel15Plugin (1.6 branch) as an ORM, and it is based on [sfSimpleBlogPlugin](http://www.symfony-project.org/plugins/sfSimpleBlogPlugin).

The `sfSimpleBlog15Plugin` adds standard weblog features to an existing website:

   * List of posts
   * Details of a post
   * Ability to add a page (for example: about page)
   * Email alert on comments and ability to add a comment (using [sfNestedCommentPlugin](https://github.com/nibsirahsieu/sfNestedCommentPlugin))
   * Tagsonomy (using [sfPropelActAsTaggableBehaviorPlugin](http://www.symfony-project.org/plugins/sfPropelActAsTaggableBehaviorPlugin))
   * RSS feeds (if [sfFeed2Plugin](http://www.symfony-project.org/plugins/sfFeed2Plugin) is installed)
   * Administration for posts, comments, pages, links and tags

It is not aimed at replacing full-featured blog packages, but offers a lightweight alternative for when you build a website that has to contain a blog section.

## Contents ##

This plugin contains eight modules that you can activate in whatever application you need them:

 * `sfSimpleBlog`: Blog front-end
 * `sfSimpleBlogAdmin`: Backend dashboard
 * `sfSimpleBlogPostAdmin`: Backend for managing posts
 * `sfSimpleBlogCategoryAdmin`: Backend for managing categories
 * `sfSimpleBlogLinkAdmin`: Backend for managing links
 * `sfSimpleBlogLinkCategoryAdmin`: Backend for managing link categories
 * `sfSimpleBlogPageAdmin`: Backend for managing pages
 * `sfSimpleBlogTagAdmin`: Backend for managing tags

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
  * Symfony Plugins :
    * [sfGuardPlugin](http://www.symfony-project.org/plugins/sfGuardPlugin)
    * [sfPropel15Plugin with 1.6 branch](https://github.com/fzaninotto/sfPropel15Plugin), [see this link](https://github.com/fzaninotto/sfPropel15Plugin/commit/3059e1b9af3cb3b39e0096d7807d1cac6e7a230e)
    * [sfNestedCommentPlugin](https://github.com/nibsirahsieu/sfNestedCommentPlugin)
    * [sfPropelActAsTaggableBehaviorPlugin](http://www.symfony-project.org/plugins/sfPropelActAsTaggableBehaviorPlugin)
    * [sfPropelTaggableWidgetPlugin](http://www.symfony-project.org/plugins/sfPropelTaggableWidgetPlugin)
    * [sfSyntaxHighlighterPlugin](http://www.symfony-project.org/plugins/sfSyntaxHighlighterPlugin)
    * [sfThemePlugin](https://github.com/rafaelgou/sfThemePlugin)
    * [themeVeryplaintxtPlugin](https://github.com/nibsirahsieu/themeVeryplaintxtPlugin)
    * [sfFeed2Plugin](http://www.symfony-project.org/plugins/sfFeed2Plugin)
    * [sfAssetLibraryPlugin](http://www.symfony-project.org/plugins/sfAssetsLibraryPlugin)
    * [sfThumbnailPlugin](http://www.symfony-project.org/plugins/sfThumbnailPlugin)
    * [sfFormExtraPlugin](http://www.symfony-project.org/plugins/sfFormExtraPlugin)
    * [omCrossAppUrlPlugin](http://www.symfony-project.org/plugins/omCrossAppUrlPlugin)
    * [sfJqueryReloadedPlugin](http://www.symfony-project.org/plugins/sfJqueryReloadedPlugin)
    * [sfPropelLuceneableBehaviorPlugin](https://github.com/nibsirahsieu/sfPropelLuceneableBehaviorPlugin)

  * tinymce plugins:
    * [preelementfix](http://sourceforge.net/tracker/index.php?func=detail&aid=2671750&group_id=103281&atid=738747)
    * [syntaxhl](https://github.com/RichGuk/syntaxhl)

Configuration
-------------

### The `app.yml` file

The plugin is highly configurable and should be easy to integrate to an existing project. Here is the default plugin configuration, taken from `myproject/plugins/sfSimpleBlog15Plugin/config/app.yml`:

    all:
      sfSimpleBlog:
        default_theme:         veryplaintxt #refer to themeVeryPlaintxtPlugin
        admin_theme:           backend_theme
        title:                 sfSimpleBlog
        use_feeds:             true       # enable feeds (require sfFeed2Plugin)
        use_post_extract:      true       # display extract in post list instead of full post body
        post_max_per_page:     5          # number of posts displayed in a list of posts
        post_recent:           5          # number of posts to display in the recent sidebar widget

        feed_count:            5          # number of posts appearing in the RSS feed
        sidebar:               [tags, recent_posts, recent_comments, feeds, links]
        comment_disable_after: 0          # number of days after which comments on a post are not possible anymore
        share_on:                         # social bookmarks
          - twitter
          - facebook
          - delicious
          - stumbleupon
          - digg
          - reddit

      theme:
        themes:
          backend_theme:
            description:   Backend Theme
            layout:        backend_layout
            templates_dir: sfSimpleBlog15Plugin/templates/
            stylesheets:
              - ../sfSimpleBlog15Plugin/css/main.css
              - ../sfSimpleBlog15Plugin/css/style.css
              - ../sfSimpleBlog15Plugin/css/button.css

            javascripts:  []

You can customize these settings in `myproject/apps/myapp/config/app.yml`

The `sidebar` array controls which widgets, and in which order, appear in the sidebar of the blog frontend. The existing widgets are:

 - `recent_posts`: list of recent posts
 - `tags`: list of popular tags
 - `feeds`: links to the RSS and Atom feeds
 - `recent_comments`: list of recent comments
 - `links`: list of links

## Front-end theme ##

This plugin use [themeVeryplaintxtPlugin](https://github.com/nibsirahsieu/themeVeryplaintxtPlugin) as a default theme.
You can create your own theme and set it as default. You can find the instuction here [themeTwentytenPlugin](https://github.com/rafaelgou/themeTwentytenPlugin)

## Back-end theme ##

This plugin comes with the default backend theme. To active it, add the code below to your backend configuration (fe: backendConfiguration.class.php)

    [php]
    public function configure()
    {
      $this->dispatcher->connect('controller.change_action', array('sfSimpleBlog15PluginConfiguration', 'loadBackendTheme'));
    }

## Back-end login form ##

This plugin also packaged a login form. Currently, it works with sfGuardPlugin. Include it like this:

    // in application/modules/sfGuardAuth/templates/signinSuccess.php
    <?php include_partial('sfSimpleBlogAdmin/login', array('form' => $form)); ?>

Then in your `myproject/apps/myapp/config/app.yml`, add a configuration below:

    all:
      sf_guard_plugin:
        signin_form: sfSimpleBlogFormSignin

## Working Demo ##
  * [http://nibsirahsieu.com](http://nibsirahsieu.com), this is my own blog and it is built on this plugin
