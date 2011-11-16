<?php

/**
 * ShopVitrin filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseShopVitrinFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'shop_id'   => new sfWidgetFormPropelChoice(array('model' => 'Shop', 'add_empty' => true)),
      'config_id' => new sfWidgetFormPropelChoice(array('model' => 'Config', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'shop_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Shop', 'column' => 'id')),
      'config_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Config', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('shop_vitrin_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopVitrin';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'shop_id'   => 'ForeignKey',
      'config_id' => 'ForeignKey',
    );
  }
}
