<?php 
/*

Polylang is a great Free WP plugin to manage multilanguage sites
https://wordpress.org/plugins/polylang/

here we register the static strings that appear on the page soo they can be managed from the Admin panel,
you can also use the Pololang themes strings https://wordpress.org/plugins/polylang-theme-strings/ instead.


// Register strings
pll_register_string($name, $string, $multiline);
‘$name’ => (required) name provided for sorting convenience (ex: ‘myplugin’)
‘$string’ => (required) the string to translate
‘$multiline’ => (optional) if set to true, the translation text field will be multiline, defaults to false


Print the strings on the templates using

pll_e("$string");

*/