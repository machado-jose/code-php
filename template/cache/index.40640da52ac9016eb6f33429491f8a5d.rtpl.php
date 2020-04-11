<?php if(!class_exists('Rain\Tpl')){exit;}?><h1>Hello <?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
<p>Testando o RainTpl3</p>
<p>Versão do PHP: <?php echo htmlspecialchars( $versao, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>