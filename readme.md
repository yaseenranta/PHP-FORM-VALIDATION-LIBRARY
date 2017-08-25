### PHP FORM VALIDATON ###

First initial formValidation class

$formValidation  = formValidation();

## Add validation rule using addRule method.it's takes two paramater ##
1 - Input field name \
2 - Rules name

# currently there two rules available #
1 - required \
2 - validEmail

$formValidation->addRule('fieldname',''required'); \
$formValidation->addRule('fieldname',''required|validEmail');

## check validation successful or not ##

$formValidation->isFailed();

if validation is not successful isFailed method return true else false will return.

## Print validation Errors ##

$formValidation->errors;

## Get individual form input value ##

$formValidation->input('fieldname');

## or Get complete form data Without send any field name ##

$formValidation->input();