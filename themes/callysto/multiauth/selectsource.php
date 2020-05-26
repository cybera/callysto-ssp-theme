<?php
$this->data['header'] = $this->t('{callysto:callysto:welcome}');

$this->includeAtTemplateBase('includes/header.php');
?>

<h2><?php echo $this->t('{callysto:callysto:select_source_header}'); ?></h2>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="get">
<input type="hidden" name="AuthState" value="<?php echo htmlspecialchars($this->data['authstate']); ?>" />
<ul>
<?php
foreach($this->data['sources'] as $source) {
	echo '<li class="' . htmlspecialchars($source['css_class']) . ' authsource">';
	if ($source['source'] === $this->data['preferred']) {
		$autofocus = ' autofocus="autofocus"';
	} else {
		$autofocus = '';
	}
	$img = htmlspecialchars($source['source']);
	$img_url = SimpleSAML\Module::getModuleURL("callysto/${img}.png");
	$name = 'src-' . base64_encode($source['source']);
	echo '<button type="submit" class="authsource" name="' . htmlspecialchars($name) . 
	     '"' . $autofocus . ' value="' . htmlspecialchars($source['text']) . '" >
                <img src="' . $img_url . '" height="200" alt="submit" /><br>' .
		htmlspecialchars($source['text']) . '
	     </button>';
	echo '</li>';
}
?>
</ul>
</form>

<p class="register"><?php echo $this->t('{callysto:callysto:register_here_text}'); ?></p>
<p class="trouble"><?php echo $this->t('{callysto:callysto:having_trouble_text}'); ?></p>

<?php $this->includeAtTemplateBase('includes/footer.php');
