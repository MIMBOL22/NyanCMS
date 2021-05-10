<?php
function head(Object $obj, array $params = [])
{
    $obj->reparr($params);
    return $obj->template;
}