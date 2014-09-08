<?php

$this->title = $email->subject;

echo html_entity_decode ($email->content);

?>

