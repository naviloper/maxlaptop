<?php

/**
 * ConfigField form base class.
 *
 * @method ConfigField getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseConfigFieldForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'category_id'  => new sfWidgetFormPropelChoice(array('model' => 'ConfigFieldCategory', 'add_empty' => false)),
      'name'         => new sfWidgetFormInputText(),
      'html_comment' => new sfWidgetFormInputText(),
      'info'         => new sfWidgetFormTextarea(),
      'weight'       => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'category_id'  => new sfValidatorPropelChoice(array('model' => 'ConfigFieldCategory', 'column' => 'id')),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'html_comment' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'info'         => new sfValidatorString(array('required' => false)),
      'weight'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('config_field[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigField';
  }


}
