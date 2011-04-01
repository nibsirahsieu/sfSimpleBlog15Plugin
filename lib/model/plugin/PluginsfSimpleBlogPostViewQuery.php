<?php
class PluginsfSimpleBlogPostViewQuery extends BasesfSimpleBlogPostViewQuery
{
  public function recent()
  {
    return $this->orderByInternalPublishedAt(Criteria::DESC);
  }

  public function published()
  {
    return $this->filterByIsPublished(true);
  }

  public function previousPublished($publishedAt)
  {
    return $this->filterByInternalPublishedAt($publishedAt, Criteria::LESS_THAN)->
           recent()->
           published();
  }

  public function nextPublished($publishedAt)
  {
    return $this->filterByInternalPublishedAt($publishedAt, Criteria::GREATER_THAN)->
           orderByInternalPublishedAt('asc')->
           published();
  }
}