<?php

/**
 * Setting filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseSettingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'value' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'value' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('setting_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Setting';
  }

  public function getFields()
  {
    return array(
      'key'   => 'Text',
      'value' => 'Text',
    );
  }
}
