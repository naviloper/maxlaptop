<?php

/**
 * MenuItem form base class.
 *
 * @method MenuItem getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BaseMenuItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'menu_id'    => new sfWidgetFormPropelChoice(array('model' => 'Menu', 'add_empty' => true)),
      'type'       => new sfWidgetFormInputText(),
      'ref_id'     => new sfWidgetFormInputText(),
      'list_order' => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'menu_id'    => new sfValidatorPropelChoice(array('model' => 'Menu', 'column' => 'id', 'required' => false)),
      'type'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ref_id'     => new sfValidatorInteger(array('min' => -9.22337203685E+18, 'max' => 9.22337203685E+18, 'required' => false)),
      'list_order' => new sfValidatorInteger(array('min' => -9.22337203685E+18, 'max' => 9.22337203685E+18, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('menu_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenuItem';
  }


}
