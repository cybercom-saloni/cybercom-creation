<?php

$children = $this->getChildren();
foreach ($children as $key => $value) {
    echo $this->getChild($key)->toHtml();   
}

?>