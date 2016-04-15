<?php namespace Acme\Validation;

use Respect\Validation\Validator as Valid;

class Validator
{
    public function isValid($validation_data)
    {
        $errors = [];

        foreach ($validation_data as $name => $value) {
            if (isset($_REQUEST[$name])) {
                $rules = explode("|", $value);

                foreach ($rules as $rule) {
                    $exploded = explode(":", $rule);

                    switch ($exploded[0]) {
                        case 'min':
                            $min = $exploded[1];
                            if (!Valid::stringType()->length($min)->Validate($_REQUEST[$name])) {
                              $errors[] = $name . " must be at least " . $min . " characters long!";
                            }
                            break;

                        case 'email':
                            if (!Valid::email()->validate($_REQUEST[$name])) {
                              $errors[] = $name . " must be a valid email address.";
                            }
                            break;

                        case 'equalTo':
                            if (!Valid::equals($_REQUEST[$name])->validate($_REQUEST[$exploded[1]])) {
                              $errors[] = $name . " must equal " . $exploded[1];
                            }
                            break;

                        case 'unique':
                            $model = "Acme\\models\\" . $exploded[1];
                            $table = new $model;
                            $results = $table->where($name, '=', $_REQUEST[$name])->get();
                            foreach($results as $item) {
                                $errors[] = $_REQUEST[$name] . "already exists in this system!";
                            }
                            break;
                        default:
                    }
                }
            } else {
                $errors[] = "No value found for " . $name;
            }
        }
        return $errors;
    }
}
