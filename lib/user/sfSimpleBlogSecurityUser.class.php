<?php

class sfSimpleBlogSecurityUser extends sfGuardSecurityUser
{
  public function getAuthorId()
  {
    return $this->getGuardUser()->getId();
  }
  
  public function getAuthorName()
  {
    return $this->getGuardUser()->getProfile()->getFullName();
  }
  
  public function getAuthorWebsite()
  {
    return $this->getGuardUser()->getProfile()->getWebsite();
  }
  
  public function getAuthorEmail()
  {
    return $this->getGuardUser()->getProfile()->getEmail();
  }
}