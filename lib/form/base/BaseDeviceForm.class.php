<?php

/**
 * Device form base class.
 *
 * @method Device getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseDeviceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'type_id'    => new sfWidgetFormPropelChoice(array('model' => 'DeviceType', 'add_empty' => false)),
      'name'       => new sfWidgetFormInputText(),
      'info'       => new sfWidgetFormTextarea(),
      'rating'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'type_id'    => new sfValidatorPropelChoice(array('model' => 'DeviceType', 'column' => 'id')),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'info'       => new sfValidatorString(),
      'rating'     => new sfValidatorInteger(array('min' => -9.22337203685E+18, 'max' => 9.22337203685E+18)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('device[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Device';
  }


}
