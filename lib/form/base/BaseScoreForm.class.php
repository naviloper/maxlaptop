<?php

/**
 * Score form base class.
 *
 * @method Score getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseScoreForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'model_id'    => new sfWidgetFormPropelChoice(array('model' => 'Model', 'add_empty' => false)),
      'overall'     => new sfWidgetFormInputText(),
      'design'      => new sfWidgetFormInputText(),
      'features'    => new sfWidgetFormInputText(),
      'performance' => new sfWidgetFormInputText(),
      'battery'     => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'model_id'    => new sfValidatorPropelChoice(array('model' => 'Model', 'column' => 'id')),
      'overall'     => new sfValidatorNumber(array('required' => false)),
      'design'      => new sfValidatorNumber(array('required' => false)),
      'features'    => new sfValidatorNumber(array('required' => false)),
      'performance' => new sfValidatorNumber(array('required' => false)),
      'battery'     => new sfValidatorNumber(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('score[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Score';
  }


}
