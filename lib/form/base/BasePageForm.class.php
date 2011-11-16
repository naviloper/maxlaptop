<?php

/**
 * Page form base class.
 *
 * @method Page getObject() Returns the current form's model object
 *
 * @package    Maxlaptop
 * @subpackage form
 * @author     navid045@gmail.com
 */
abstract class BasePageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'parent_id'    => new sfWidgetFormPropelChoice(array('model' => 'Page', 'add_empty' => true)),
      'title'        => new sfWidgetFormInputText(),
      'keywords'     => new sfWidgetFormInputText(),
      'metadata'     => new sfWidgetFormTextarea(),
      'content'      => new sfWidgetFormTextarea(),
      'is_published' => new sfWidgetFormInputText(),
      'p_order'      => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'parent_id'    => new sfValidatorPropelChoice(array('model' => 'Page', 'column' => 'id', 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'keywords'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'metadata'     => new sfValidatorString(array('required' => false)),
      'content'      => new sfValidatorString(array('required' => false)),
      'is_published' => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'p_order'      => new sfValidatorInteger(array('min' => -9.22337203685E+18, 'max' => 9.22337203685E+18, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }


}
