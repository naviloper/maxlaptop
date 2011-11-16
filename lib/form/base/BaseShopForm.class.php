<?php

/**
 * Shop form base class.
 *
 * @method Shop getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseShopForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'owner_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'info'     => new sfWidgetFormTextarea(),
      'photo'    => new sfWidgetFormInputText(),
      'website'  => new sfWidgetFormInputText(),
      'email'    => new sfWidgetFormInputText(),
      'address'  => new sfWidgetFormInputText(),
      'phone'    => new sfWidgetFormInputText(),
      'fax'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'owner_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'info'     => new sfValidatorString(array('required' => false)),
      'photo'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'website'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Shop';
  }


}
