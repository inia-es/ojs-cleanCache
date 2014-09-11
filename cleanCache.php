<?php
function clean(array $dir_list, array $types_to_clean)
{
    foreach ($dir_list as $element) {
        if (is_file($element)) {
	    if (in_array($types_to_clean, $filetype($element))) {
                unlink($element);
	    }
        }
    }
}

clean(scandir('./cache'), array('.php', '.html', '.gz'));
clean(scandir('./cache/t_compile'), array('.php'));
