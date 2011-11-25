<?php

/**
 * Media form base class.
 *
 * @method Media getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseMediaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'parent_id'  => new sfWidgetFormInputText(),
      'title'      => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'class_name' => new sfWidgetFormInputText(),
      'ext'        => new sfWidgetFormInputText(),
      'is_main'    => new sfWidgetFormInputCheckbox(),
      'path'       => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'parent_id'  => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18)),
      'title'      => new sfValidatorString(array('max_length' => 255)),
      'type'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'class_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ext'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_main'    => new sfValidatorBoolean(),
      'path'       => new sfValidatorString(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('media[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Media';
  }


}
