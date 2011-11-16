<?php

/**
 * Review form base class.
 *
 * @method Review getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseReviewForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'author_id'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'model_id'   => new sfWidgetFormPropelChoice(array('model' => 'Model', 'add_empty' => false)),
      'cons'       => new sfWidgetFormTextarea(),
      'pros'       => new sfWidgetFormTextarea(),
      'rtext'      => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'author_id'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'model_id'   => new sfValidatorPropelChoice(array('model' => 'Model', 'column' => 'id')),
      'cons'       => new sfValidatorString(array('required' => false)),
      'pros'       => new sfValidatorString(array('required' => false)),
      'rtext'      => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('review[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Review';
  }


}
