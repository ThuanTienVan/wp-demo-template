<?php
class mwValidationRule {
    public function __construct() {
      add_filter( 'mwform_validation_mw-wp-form-280' , array( &$this, '_validation_rule_280' ) , 10 , 3);
    }

    // Product contact EN
    function _validation_rule_280($Validation, $data, $Data) {
      $error_message = __('* Please enter.', 'mizuki');
      $validation_message = '* One of the items is not entered.';

      $Validation->set_rule( 'name-product', 'noEmpty' , array(
        'message' => $error_message
      ));
			$Validation->set_rule( 'fullname', 'noEmpty' , array(
        'message' => $error_message
      ));
			$Validation->set_rule( 'phone-numer', 'noEmpty' , array(
        'message' => $error_message
      ));
			$Validation->set_rule( 'phone-numer', 'numeric' , array(
        'message' =>  __('* Not in phone number format.', 'mizuki')
      ));
      $Validation->set_rule( 'email', 'noEmpty' , array(
        'message' => $error_message
      ));
      $Validation->set_rule( 'email', 'mail' , array(
        'message' => __('* Not in email address format.', 'mizuki')
      ));

      return $Validation;
    }
}
$mwValidationRule_func = new mwValidationRule();
