<?php

/**
 * UserMeta filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseUserMetaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'model_id' => new sfWidgetFormPropelChoice(array('model' => 'Model', 'add_empty' => true)),
      'info'     => new sfWidgetFormFilterInput(),
      'city'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'model_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Model', 'column' => 'id')),
      'info'     => new sfValidatorPass(array('required' => false)),
      'city'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('user_meta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserMeta';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'user_id'  => 'ForeignKey',
      'model_id' => 'ForeignKey',
      'info'     => 'Text',
      'city'     => 'Number',
    );
  }
}
