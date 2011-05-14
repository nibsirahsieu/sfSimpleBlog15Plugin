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

It is not aimed at replacing full-featured blog packages, but offers a lightweight alternative for when you build a website that has to contain a blog section. It is voluntarily simple and limited (that's why it doesn't come with a BBCode parser, a search engine, a media asset library, or a user management module). However, it is very easy to configure and adapt, so it should fulfill most basic blog requirements.

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
        default_theme: veryplaintxt
        title:         My Symfony Blog
        sidebar:       [tags, recent_posts, recent_comments, feeds, links]

        use_post_extract: true         # display extract in post list instead of full post body
        post_max_per_page:  5          # number of posts displayed in a list of posts
        post_recent:        5          # number of posts to display in the recent sidebar widget

        comment_disable_after:  0      # number of days after which comments on a post are not possible anymore
        feed_count:         5          # number of posts appearing in the RSS feed
        comment_disable_after: 0
        share_on:
          - twitter
          - facebook
          - delicious
          - stumbleupon
          - digg
          - reddit

You can customize these settings in `myproject/apps/myapp/config/app.yml`

The `sidebar` array controls which widgets, and in which order, appear in the sidebar of the blog frontend. The existing widgets are:

 - `recent_posts`: list of recent posts
 - `tags`: list of popular tags
 - `feeds`: links to the RSS and Atom feeds
 - `recent_comments`: list of recent comments
 - `links`: list of links

## Working Demo ##
  * [http://nibsirahsieu.com](http://nibsirahsieu.com), this is my own blog and it is built on this plugin
