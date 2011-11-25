<?php

/**
 * Brand filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseBrandFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'brand_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'brand_info'    => new sfWidgetFormFilterInput(),
      'brand_country' => new sfWidgetFormFilterInput(),
      'weight'        => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'brand_name'    => new sfValidatorPass(array('required' => false)),
      'brand_info'    => new sfValidatorPass(array('required' => false)),
      'brand_country' => new sfValidatorPass(array('required' => false)),
      'weight'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('brand_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Brand';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'brand_name'    => 'Text',
      'brand_info'    => 'Text',
      'brand_country' => 'Text',
      'weight'        => 'Number',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
