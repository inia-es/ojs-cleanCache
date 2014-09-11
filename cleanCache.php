<?php
function clean($list, $types)
{
    foreach ($list as $element) {
        if (is_file($element)) && in_array($types, strrchr($element, '.')) {
            unlink($element);
        }
    }
}

clean(scandir('./cache'), array('.php', '.html', '.gz'));
clean(scandir('./cache/t_compile'), array('.php'));
