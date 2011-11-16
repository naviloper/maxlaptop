<?php

/**
 * MenuItem filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseMenuItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'menu_id'    => new sfWidgetFormPropelChoice(array('model' => 'Menu', 'add_empty' => true)),
      'type'       => new sfWidgetFormFilterInput(),
      'ref_id'     => new sfWidgetFormFilterInput(),
      'list_order' => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'menu_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Menu', 'column' => 'id')),
      'type'       => new sfValidatorPass(array('required' => false)),
      'ref_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'list_order' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('menu_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenuItem';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'menu_id'    => 'ForeignKey',
      'type'       => 'Text',
      'ref_id'     => 'Number',
      'list_order' => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
