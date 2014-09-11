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

clean('./cache', array('.php', '.html', '.gz'));
clean('./cache/t_compile', array('.php'));

