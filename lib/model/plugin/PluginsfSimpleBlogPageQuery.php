<?php
class PluginsfSimpleBlogPageQuery extends BasesfSimpleBlogPageQuery
{
  public function published()
  {
    return $this
      ->filterByIsPublished(true);
  }
}