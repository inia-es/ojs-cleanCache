<?php
function clean($dir_name, array $types_to_clean)
{
    $dir_list = scandir($dir_name);
    foreach ($dir_list as $element) {
        $filename = $dir_name . '/' . $element;
        if (is_file($filename)) {
	    $filetype = strrchr($element, '.');
	    if (in_array($filetype, $types_to_clean)) {
                unlink($filename);
	    }
        }
    }
}

function find_base_url()
{
    $lines = file('./config.inc.php');
    $base_url = get_valid_param_from_config('base_url', $lines);
    $base_url = trim($base_url, '"');

    return $base_url;
}

function get_valid_param_from_config($param, $lines)
{
    $statement = array_pop(find_param_from_config($param, $lines));
    $ojs_url = extract_value($statement);
    return $ojs_url;
}

function find_param_from_config($needle, $haystack)
{
    $regex = "/$needle/";
    $matches = preg_grep($regex, $haystack);
    $uncommented_matches = preg_grep('/^\;/', $matches, PREG_GREP_INVERT);
    return $uncommented_matches;
}

function extract_value($assignment_statement)
{
    $tokens = split('=', $assignment_statement);
    $right_side = (string) array_pop($tokens);
    return trim($right_side);
}

clean('./cache', array('.php', '.html', '.gz'));
clean('./cache/t_compile', array('.php'));

header('Location: ' . find_base_url());

