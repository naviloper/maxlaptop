<?php

/**
 * Brand form base class.
 *
 * @method Brand getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseBrandForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'brand_name'    => new sfWidgetFormInputText(),
      'brand_info'    => new sfWidgetFormTextarea(),
      'brand_country' => new sfWidgetFormInputText(),
      'weigth'        => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'brand_name'    => new sfValidatorString(array('max_length' => 255)),
      'brand_info'    => new sfValidatorString(array('required' => false)),
      'brand_country' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'weigth'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Brand', 'column' => array('brand_name')))
    );

    $this->widgetSchema->setNameFormat('brand[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Brand';
  }


}
