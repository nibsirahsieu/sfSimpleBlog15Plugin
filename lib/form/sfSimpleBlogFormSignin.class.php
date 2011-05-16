<?php

class sfSimpleBlogFormSignin extends BasesfGuardFormSignin
{
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInputText(array(), array('class' => 'username')),
      'password' => new sfWidgetFormInputText(array('type' => 'password'), array('class' => 'password')),
      'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(),
      'password' => new sfValidatorString(),
      'remember' => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser(array('throw_global_error' => true)));

    $this->getWidgetSchema()->setFormFormatterName('login');

    $this->widgetSchema->setNameFormat('signin[%s]');
  }
}
