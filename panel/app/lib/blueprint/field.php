<?php

namespace Blueprint;

use A;
use Obj;

class Field extends Obj {

  public $name      = null;
  public $label     = null;
  public $default   = null;
  public $type      = null;
  public $value     = null;
  public $required  = false;
  public $translate = true;

  public function __construct($params = array()) {

    if(a::get($params, 'name') == 'title') {
      $params['type'] = 'title';

      if(!isset($params['required'])) {
        $params['required'] = true;
      }
    }

    if(empty($params['type'])) {
      $params['type'] = 'text';
    }

    // create the default value
    $params['default'] = $this->_default(a::get($params, 'default'));

    parent::__construct($params);

  }

<<<<<<< HEAD:panel/app/src/panel/models/page/blueprint/field.php

  public function _extend($params) {

    $extends = $params['extends'];
    $snippet = f::resolve(kirby()->roots()->blueprints() . DS . 'fields' . DS . $extends, array('yml', 'php', 'yaml'));

    if(empty($snippet)) {
      throw new Exception(l('fields.error.extended'));
    }

    $yaml   = data::read($snippet, 'yaml');
    $params = a::merge($yaml, $params);

    return $params;

  }

=======
>>>>>>> parent of 8fd0d20... Merge pull request #1 from robinandersen/Development:panel/app/lib/blueprint/field.php
  public function _default($default) {

    if($default === true) {
      return 'true';
    } else if($default === false) {
      return 'false';
    } else if(empty($default)) {
      return '';
    } else if(is_string($default)) {
      return $default;
    } else {
      $type = a::get($default, 'type');

      switch($type) {
        case 'date':
          $format = a::get($default, 'format', 'Y-m-d');
          return date($format);
          break;
        case 'datetime':
          $format = a::get($default, 'format', 'Y-m-d H:i:s');
          return date($format);
          break;
        case 'user':
          $user = isset($default['user']) ? site()->users()->find($default['user']) : site()->user();
          if(!$user) return '';
          return (isset($default['field']) and $default['field'] != 'password') ? $user->{$default['field']}() : $user->username();
          break;
        case 'structure':
          return "\n" . \data::encode(array($default), 'yaml') . "\n";
          break;
        default:
          return $default;
          break;
      }

    }

  }

}