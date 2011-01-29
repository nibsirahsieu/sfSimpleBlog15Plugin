<?php
class PluginsfSimpleBlogAuthor extends BasesfSimpleBlogAuthor
{
  public function  __toString()
  {
    return $this->getFullName();
  }

  public function getFullName()
  {
    return $this->getFirstName().' '.$this->getLastName();
  }
}