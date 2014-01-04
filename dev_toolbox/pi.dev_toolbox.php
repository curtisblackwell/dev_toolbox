<?php

require_once('config.php');

class Plugin_dev_toolbox extends Plugin {

  var $meta = array(
    'name'        => ADD_ON_NAME,
    'version'     => ADD_ON_V,
    'author'      => 'See list of contributors at https://github.com/curtisblackwell/dev_toolbox',
    'author_url'  => 'https://github.com/curtisblackwell/dev_toolbox'
  );

  public function get_post_dump() {
    $method      = $this->fetch('method',      'post'                      );
    $table_class = $this->fetch('table_class', NULL,    FALSE, FALSE, FALSE);
    $table_class = ' class="' . $table_class . '"';

    $method == 'post'
      ? $method = $_POST
      : $method = $_GET;

    $return = '<table' . $table_class . '>';
      foreach ($method as $key => $value) {
        $return .= ''                 .
          '<tr>'                      .
            '<td>' . $key   . '</td>' .
            '<td>' . $value . '</td>' .
          '</tr>'
        ;
      }
    $return .= '</table>';

    return $return;
  }
}
