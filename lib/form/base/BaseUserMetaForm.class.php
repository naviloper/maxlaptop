<?php

/**
 * UserMeta form base class.
 *
 * @method UserMeta getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseUserMetaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'user_id'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'model_id' => new sfWidgetFormPropelChoice(array('model' => 'Model', 'add_empty' => true)),
      'info'     => new sfWidgetFormTextarea(),
      'city'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'model_id' => new sfValidatorPropelChoice(array('model' => 'Model', 'column' => 'id', 'required' => false)),
      'info'     => new sfValidatorString(array('required' => false)),
      'city'     => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_meta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserMeta';
  }


}
