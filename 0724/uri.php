<?php

$uri = $_SERVER['REQUEST_URI'] . (strpos($_SERVER['REQUEST_URI'], '?') ? '' : '?');

echo "<pre>";
print_r($uri);

$parse = parse_url($uri);
echo "<pre>";
print_r($parse);

if (isset($parse['query'])) {
    parse_str($parse['query'], $params);
    echo "<pre>";
    print_r($params);

    echo http_build_query($params);
}
