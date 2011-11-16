<?php

/**
 * Series form base class.
 *
 * @method Series getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseSeriesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'series_name' => new sfWidgetFormInputText(),
      'series_info' => new sfWidgetFormInputText(),
      'brand_id'    => new sfWidgetFormPropelChoice(array('model' => 'Brand', 'add_empty' => false)),
      'weigth'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'series_name' => new sfValidatorString(array('max_length' => 255)),
      'series_info' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'brand_id'    => new sfValidatorPropelChoice(array('model' => 'Brand', 'column' => 'id')),
      'weigth'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('series[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Series';
  }


}
