<?php

$this->data['header'] = $this->t('{callysto:callysto:logout_title}');

$this->includeAtTemplateBase('includes/header.php');



echo('<h2>' . $this->t('{callysto:callysto:logout_text}') . '</h2>');

if($this->getTranslator()->getTag($this->data['text']) !== NULL) {
	$this->data['text'] = $this->t($this->data['text']);
}

$this->includeAtTemplateBase('includes/footer.php');
