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

This plugin contains nine modules that you can activate in whatever application you need them:

 * `sfSimpleBlog`: Blog front-end
 * `sfSimpleBlogFeed`: Blog feeds (automatically enabled if `use_feeds` setting is true)
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
    * [sfPropel15Plugin with 1.6 branch](https://github.com/fzaninotto/sfPropel15Plugin), [have a look at here](https://github.com/fzaninotto/sfPropel15Plugin/blob/1.6/INSTALL.md)
    * [sfNestedCommentPlugin](https://github.com/nibsirahsieu/sfNestedCommentPlugin)
    * [sfPropelActAsTaggableBehaviorPlugin](http://www.symfony-project.org/plugins/sfPropelActAsTaggableBehaviorPlugin)
    * [sfPropelTaggableWidgetPlugin (trunk version)](http://www.symfony-project.org/plugins/sfPropelTaggableWidgetPlugin)
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
        sidebar:               [tags, recent_posts, recent_comments, feeds, links, month_archives]
        comment_disable_after: 0          # number of days after which comments on a post are not possible anymore
        share_on:                         # social bookmarks (see SocialBookmarkingHelper.php)
          - twitter
          - facebook
          - delicious
          - stumbleupon
          - digg
          - reddit
        month_archives:        12
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
 - `month_archives`: list of archives per month

## Routings ##

The routes are automatically registered unless you defined `sfSimpleBlog_routes_register` to false in the `app.yml` configuration file:

    [yml]
    all:
      sfSimpleBlog:
        routes_register: false

As a consequent, you have to define the routes in your `routings.yml`. This is useful if you want to handle cross application routing using [swCrossLinkApplicationPlugin](https://github.com/rande/swCrossLinkApplicationPlugin).

Those routes are (see `sfSimpleBlog15Routing.class.php`):

### Front-end routes ###

    [yml]
    sf_simple_blog_show_page:
      url: /:page_title
      param: { module: sfSimpleBlog, action: page }

    sf_simple_blog_show:
      url: /:year/:month/:day/:stripped_title
      param: { module: sfSimpleBlog, action: show }

    sf_simple_blog_show_by_tag:
      url: /tag/:tag
      param: { module: sfSimpleBlog, action: showByTag }

    sf_simple_blog_show_by_category:
      url: /category/:category
      param: { module: sfSimpleBlog, action: showByCategory }

    sf_simple_blog_search:
      url: /search
      param: { module: sfSimpleBlog, action: search }

    sf_simple_blog_posts_feed:
      url: /posts/:format
      param: { module: sfSimpleBlogFeed, action: postsFeed, format: atom1 }

    sf_simple_blog_comments_feed:
      url: /comments/:format
      param: { module: sfSimpleBlogFeed, action: commentsFeed, format: atom1 }

    sf_simple_blog_posts_tag_feed:
      url: /tags/:tag/:format
      param: { module: sfSimpleBlogFeed, action: postsForTagFeed, format: atom1 }

    sf_simple_blog_comments_post_feed:
      url: /:year/:month/:day/:stripped_title/comments/:format
      param: { module: sfSimpleBlogFeed, action: commentsForPostFeed, format: atom1 }

    sf_simple_blog_month_archives:
      url: /:year/:month/archives
      param: { module: sfSimpleBlog, action: monthArchives }

### Back-end routes ###

    sf_simple_blog_post_view_version:
      url: /sf_simple_blog_post/:id/show.:sf_format
      param: { module: sfSimpleBlogPostAdmin, action: viewVersion, sf_format: html}

    sf_simple_blog_post_restore_version:
      url: /sf_simple_blog_post/:id/restore.:sf_format
      param: { module: sfSimpleBlogPostAdmin, action: restoreVersion, sf_format: html}

    sf_simple_blog_post_delete_version:
      url: /sf_simple_blog_post/:id/delete.:sf_format
      param: { module: sfSimpleBlogPostAdmin, action: deleteVersion, sf_format: html}

    sf_simple_blog_post_delete_versions:
      url: /sf_simple_blog_post/deleteVersions.:sf_format
      param: { module: sfSimpleBlogPostAdmin, action: deleteVersions, sf_format: html}

    sf_simple_blog_post:
      class: sfPropel15RouteCollection
      options:
        model:                sfSimpleBlogPost
        module:               sfSimpleBlogPostAdmin
        prefix_path:          /sf_simple_blog_post
        column:               id
        with_wildcard_routes: true

    sf_simple_blog_category:
      class: sfPropel15RouteCollection
      options:
        model:                sfSimpleBlogCategory
        module:               sfSimpleBlogCategoryAdmin
        prefix_path:          /sf_simple_blog_category
        column:               id
        with_wildcard_routes: true

    sf_simple_blog_page:
      class: sfPropel15RouteCollection
      options:
        model:                sfSimpleBlogPage
        module:               sfSimpleBlogPageAdmin
        prefix_path:          /sf_simple_blog_page
        column:               id
        with_wildcard_routes: true

    sf_simple_blog_tag:
      class: sfPropel15RouteCollection
      options:
        model:                Tag
        module:               sfSimpleBlogTagAdmin
        prefix_path:          /sf_simple_blog_tag
        column:               id
        with_wildcard_routes: true

    sf_simple_blog_link:
      class: sfPropel15RouteCollection
      options:
        model:                sfSimpleBlogLink
        module:               sfSimpleBlogLinkAdmin
        prefix_path:          /sf_simple_blog_link
        column:               id
        with_wildcard_routes: true

    sf_simple_blog_link_category:
      class: sfPropel15RouteCollection
      options:
        model:                sfSimpleBlogLinkCategory
        module:               sfSimpleBlogLinkCategoryAdmin
        prefix_path:          /sf_simple_blog_link_category
        column:               id
        with_wildcard_routes: true

## Front-end theme ##

This plugin use [themeVeryplaintxtPlugin](https://github.com/nibsirahsieu/themeVeryplaintxtPlugin) as a default theme.
You can create your own theme and set it as default. You can find the instruction here [themeTwentytenPlugin](https://github.com/rafaelgou/themeTwentytenPlugin)

    all:
      sfSimpleBlog:
        default_theme: your_theme

## Back-end theme ##

This plugin comes with the default backend theme. To activate it, add the code below to your backend configuration (fe: backendConfiguration.class.php)

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

## Screenshots ##

### Login Page ###
![Preview Login Page](http://dl.dropbox.com/u/16750037/sfSimpleBlog15Plugin/Screenshot-2.png)

### Dashboard ###
![Preview Dashboard](http://dl.dropbox.com/u/16750037/sfSimpleBlog15Plugin/Screenshot.png)

### Edit Post ###
![Preview Edit Post](http://dl.dropbox.com/u/16750037/sfSimpleBlog15Plugin/Screenshot-3.png)

### Posts View ###
![Preview Posts View](http://dl.dropbox.com/u/16750037/sfSimpleBlog15Plugin/Screenshot-1.png)
