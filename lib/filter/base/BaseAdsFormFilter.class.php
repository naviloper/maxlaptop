<?php

/**
 * Ads filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseAdsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'config_id' => new sfWidgetFormPropelChoice(array('model' => 'Config', 'add_empty' => true)),
      'info'      => new sfWidgetFormFilterInput(),
      'price'     => new sfWidgetFormFilterInput(),
      'rating'    => new sfWidgetFormFilterInput(),
      'weigth'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'config_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Config', 'column' => 'id')),
      'info'      => new sfValidatorPass(array('required' => false)),
      'price'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rating'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'weigth'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('ads_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ads';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'user_id'   => 'ForeignKey',
      'config_id' => 'ForeignKey',
      'info'      => 'Text',
      'price'     => 'Number',
      'rating'    => 'Number',
      'weigth'    => 'Number',
    );
  }
}
