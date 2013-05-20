<?php /* Smarty version 2.6.18, created on 2013-03-06 17:35:56
         compiled from exibe_wishlist.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Wishlist')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "addcartawishlist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">
    <table width="80%" border="0" cellspacing="0" align="center">
        <tr>
            <td width="100%" colspan="5" align="left">
                <span class="texto_titulo"> Wishlist -> <?php echo $this->_tpl_vars['titulo']; ?>
</span>
            </td>
        </tr>
        <tr>
            <td width="3%" align="left" colspan="1"  id="qtdw">Qtde</td>
            <td width="25%" align="left" colspan="1"  id="nome">Carta</td>
            <td width="25%" align="left" colspan="1"  id="preco">Edição</td>
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
                <td width="3%" colspan="1" align="left">
                    <span class="texto_fonte"><?php echo $this->_tpl_vars['qtdw'][$this->_sections['i']['index']]; ?>
</span>
                </td>
                <td width="25%" colspan="1" align="left">
                    <span class="texto_fonte"><?php echo $this->_tpl_vars['cartas'][$this->_sections['i']['index']]->getNome(); ?>
</span>
                </td>
                <td width="25%" colspan="1" align="left">
                    <span class="texto_fonte"><?php echo $this->_tpl_vars['cartas'][$this->_sections['i']['index']]->getEdicao(); ?>
</span>
                </td>
            </tr>
        <?php endfor; endif; ?>
    </table>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>