<?php

/**
 * Model form base class.
 *
 * @method Model getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseModelForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'model_name' => new sfWidgetFormInputText(),
      'model_info' => new sfWidgetFormTextarea(),
      'series_id'  => new sfWidgetFormPropelChoice(array('model' => 'Series', 'add_empty' => false)),
      'review_id'  => new sfWidgetFormPropelChoice(array('model' => 'Review', 'add_empty' => true)),
      'score_id'   => new sfWidgetFormPropelChoice(array('model' => 'Score', 'add_empty' => true)),
      'weigth'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'model_name' => new sfValidatorString(array('max_length' => 255)),
      'model_info' => new sfValidatorString(array('required' => false)),
      'series_id'  => new sfValidatorPropelChoice(array('model' => 'Series', 'column' => 'id')),
      'review_id'  => new sfValidatorPropelChoice(array('model' => 'Review', 'column' => 'id', 'required' => false)),
      'score_id'   => new sfValidatorPropelChoice(array('model' => 'Score', 'column' => 'id', 'required' => false)),
      'weigth'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('model[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Model';
  }


}
