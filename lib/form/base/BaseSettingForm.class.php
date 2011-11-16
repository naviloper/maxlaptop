<?php

/**
 * Setting form base class.
 *
 * @method Setting getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseSettingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'key'   => new sfWidgetFormInputHidden(),
      'value' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'key'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getKey()), 'empty_value' => $this->getObject()->getKey(), 'required' => false)),
      'value' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('setting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Setting';
  }


}
