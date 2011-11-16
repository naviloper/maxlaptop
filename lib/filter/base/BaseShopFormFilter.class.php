<?php

/**
 * Shop filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseShopFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'owner_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'info'     => new sfWidgetFormFilterInput(),
      'photo'    => new sfWidgetFormFilterInput(),
      'website'  => new sfWidgetFormFilterInput(),
      'email'    => new sfWidgetFormFilterInput(),
      'address'  => new sfWidgetFormFilterInput(),
      'phone'    => new sfWidgetFormFilterInput(),
      'fax'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'owner_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'info'     => new sfValidatorPass(array('required' => false)),
      'photo'    => new sfValidatorPass(array('required' => false)),
      'website'  => new sfValidatorPass(array('required' => false)),
      'email'    => new sfValidatorPass(array('required' => false)),
      'address'  => new sfValidatorPass(array('required' => false)),
      'phone'    => new sfValidatorPass(array('required' => false)),
      'fax'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Shop';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'owner_id' => 'ForeignKey',
      'info'     => 'Text',
      'photo'    => 'Text',
      'website'  => 'Text',
      'email'    => 'Text',
      'address'  => 'Text',
      'phone'    => 'Text',
      'fax'      => 'Text',
    );
  }
}
