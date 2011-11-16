<?php

/**
 * ShopVitrin form base class.
 *
 * @method ShopVitrin getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseShopVitrinForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'shop_id'   => new sfWidgetFormPropelChoice(array('model' => 'Shop', 'add_empty' => true)),
      'config_id' => new sfWidgetFormPropelChoice(array('model' => 'Config', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'shop_id'   => new sfValidatorPropelChoice(array('model' => 'Shop', 'column' => 'id', 'required' => false)),
      'config_id' => new sfValidatorPropelChoice(array('model' => 'Config', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_vitrin[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopVitrin';
  }


}
