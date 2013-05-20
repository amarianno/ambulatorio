<?php /* Smarty version 2.6.18, created on 2013-02-07 06:18:06
         compiled from exibe_wishlist.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $this->_tpl_vars['titulo']; ?>
</title>
    <?php echo '
        <link href="css/geral.css" rel="stylesheet" type="text/css">
        <link href="css/set.css" rel="stylesheet" type="text/css">
    '; ?>

</head>
<body>
<div align="center">
    <table width="80%" border="0" cellspacing="0">
        <tr>
            <td width="100%" colspan="5" class="fundo_branco">
                <span class="texto_titulo"> <?php echo $this->_tpl_vars['tipo']; ?>
 -> <?php echo $this->_tpl_vars['titulo']; ?>
</span>
            </td>
        </tr>
        <tr>
            <td width="3%" align="left" colspan="1" class="fundo_azul" id="qtdw">W</td>
            <td width="3%" align="left" colspan="1" class="fundo_azul" id="qtdd">D</td>
            <td width="3%" align="left" colspan="1" class="fundo_azul" id="qtds">S</td>
            <td width="25%" align="left" colspan="1" class="fundo_azul" id="nome">Carta</td>
            <td width="25%" align="left" colspan="1" class="fundo_azul" id="preco">Edição</td>
        </tr>
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cartas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
            <tr>
                <td width="3%" colspan="1" class="fundo_branco">
                    <span class="texto_fonte"><?php echo $this->_tpl_vars['qtdw'][$this->_sections['i']['index']]; ?>
</span>
                </td>
                <td width="3%" colspan="1" class="fundo_branco">
                    <span class="texto_fonte"><?php echo $this->_tpl_vars['qtdd'][$this->_sections['i']['index']]; ?>
</span>
                </td>
                <td width="3%" colspan="1" class="fundo_branco">
                    <span class="texto_fonte"><?php echo $this->_tpl_vars['qtds'][$this->_sections['i']['index']]; ?>
</span>
                </td>
                <td width="25%" colspan="1" class="fundo_branco">
                    <span class="texto_fonte"><?php echo $this->_tpl_vars['cartas'][$this->_sections['i']['index']]->getNome(); ?>
</span>
                </td>
                <td width="25%" colspan="1" class="fundo_branco">
                    <span class="texto_fonte"><?php echo $this->_tpl_vars['cartas'][$this->_sections['i']['index']]->getEdicao(); ?>
</span>
                </td>
            </tr>
        <?php endfor; endif; ?>
    </table>
</div>
<hr>
<p align="center"><a href="index.php">Página Inicial</a></p>
</body>
</html>