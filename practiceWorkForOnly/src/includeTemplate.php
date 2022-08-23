<?php

function includeTemplate($templatePath, $data = [])
{
    extract($data);
    
    include dirname(__DIR__) . '/template/' . ltrim($templatePath, '/');
}
