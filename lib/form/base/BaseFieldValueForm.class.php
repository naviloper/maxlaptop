<?php

/**
 * FieldValue form base class.
 *
 * @method FieldValue getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseFieldValueForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'field_id'   => new sfWidgetFormPropelChoice(array('model' => 'ConfigField', 'add_empty' => true)),
      'config_id'  => new sfWidgetFormPropelChoice(array('model' => 'Config', 'add_empty' => true)),
      'value'      => new sfWidgetFormTextarea(),
      'rating'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'field_id'   => new sfValidatorPropelChoice(array('model' => 'ConfigField', 'column' => 'id', 'required' => false)),
      'config_id'  => new sfValidatorPropelChoice(array('model' => 'Config', 'column' => 'id', 'required' => false)),
      'value'      => new sfValidatorString(array('required' => false)),
      'rating'     => new sfValidatorInteger(array('min' => -9.22337203685E+18, 'max' => 9.22337203685E+18, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('field_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FieldValue';
  }


}
