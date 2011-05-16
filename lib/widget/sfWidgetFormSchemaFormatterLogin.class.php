<?php
class sfWidgetFormSchemaFormatterLogin extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat       = "<div class='input_label'>%label%</div>
                       <div class='form_row%row_class%'>
                       %field% %help% %hidden_fields%\n</div>\n",
    $errorRowFormat  = "<div>%errors%</div>",
    $helpFormat      = '<div class="form_help">%help%</div>',
    $decoratorFormat = "<div>\n  %content%</div>";

  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  {
    $row = parent::formatRow(
      $label,
      $field,
      $errors,
      $help,
      $hiddenFields
    );

    return strtr($row, array(
      '%row_class%' => (count($errors) > 0) ? ' form_row_error' : '',
    ));
  }
}