<?php

function get_tag_links($tags)
{
  $links = array();
  foreach($tags as $tag)
  {
    $links[] = link_to($tag, '@sf_simple_blog_show_by_tag?tag='.$tag);
  } 
  
  return implode($links, ', ');
}

function link_to_post($post, $text = '', $postfix = null, $options = array())
{
  $post = $post instanceof sfOutputEscaper ? $post->getRawValue() : $post;
  if(!$text)
  {
    $text = ($post instanceof BaseObject) ? $post->getTitle() : $post['Title'];
  }
  return link_to($text, sfSimpleBlogTools::generatePostUri($post, $postfix), $options);
}

function link_to_previous_post($post, $options = array())
{
  $previous_post = $post->getPreviousPost();
  if ($previous_post)
  {
    return link_to_post($previous_post);
  }
  return '';
}

function link_to_next_post($post, $options = array())
{
  $next_post = $post->getNextPost();
  if ($next_post)
  {
    return link_to_post($next_post);
  }
  return '';
}

function get_category_links($categories)
{
  $links = array();
  foreach($categories as $category)
  {
    $links[] = link_to($category, '@sf_simple_blog_show_by_category?category='.$category);
  }

  return implode($links, ', ');
}

function my_tag_cloud($tags, $route, $options = array())
{
  $definedClass = array(-2 => 'not-very-popular',
                        -1 => 'not-popular',
                         0 => 'somewhat-popular',
                         1 => 'popular',
                         2 => 'very-popular');
  $result = '';

  if (count($tags) > 0)
  {
    $class = isset($options['class']) ? $options['class'] : 'tags-cloud';

    if (isset($options['ordered']))
    {
      $result = '<ol class="'.$class.'">';
    }
    else
    {
      $result = '<ul class="'.$class.'">';
    }

    $i = 1;

    foreach ($tags as $tag => $count)
    {
      $liClass = $definedClass[$count];
      $link = link_to($tag,
                      $route.$tag,
                      array('rel' => 'tag'));

      $result .= '
                  <li class="'.$liClass.'">'.$link;
      if (isset($options['separator']) && ($i != count($tags)))
      {
        $result .= $options['separator'];
      }

      $result .= '</li>';
      $i++;
    }

    if (isset($options['ordered']))
    {
      $result .= '</ol>';
    }
    else
    {
      $result .= '</ul>';
    }
  }

  return $result;
}