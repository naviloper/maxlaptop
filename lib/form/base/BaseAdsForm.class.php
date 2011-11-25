<?php

/**
 * Ads form base class.
 *
 * @method Ads getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseAdsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'user_id'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'config_id' => new sfWidgetFormPropelChoice(array('model' => 'Config', 'add_empty' => true)),
      'info'      => new sfWidgetFormTextarea(),
      'price'     => new sfWidgetFormInputText(),
      'rating'    => new sfWidgetFormInputText(),
      'weight'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'config_id' => new sfValidatorPropelChoice(array('model' => 'Config', 'column' => 'id', 'required' => false)),
      'info'      => new sfValidatorString(array('required' => false)),
      'price'     => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18, 'required' => false)),
      'rating'    => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18, 'required' => false)),
      'weight'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ads[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ads';
  }


}
