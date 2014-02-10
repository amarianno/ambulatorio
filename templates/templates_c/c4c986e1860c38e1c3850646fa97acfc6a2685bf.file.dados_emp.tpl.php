<?php /* Smarty version Smarty-3.1.13, created on 2014-02-09 22:26:23
         compiled from "templates/dados_emp.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62275785252f81c732bec68-83788195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4c986e1860c38e1c3850646fa97acfc6a2685bf' => 
    array (
      0 => 'templates/dados_emp.tpl',
      1 => 1391991979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62275785252f81c732bec68-83788195',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52f81c737150d6_50735848',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f81c737150d6_50735848')) {function content_52f81c737150d6_50735848($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="consultaConsolidacaoEMP(); return false;">
    <fieldset>
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <legend>
                    <b>
                        Consolidação das EMP por ano
                    </b>
                </legend>
                <td>
                    <label for="ano">
                        Ano
                    </label>
                    <input id="ano" name="ano"
                           type="text" value="" maxlength="4"
                           tabindex="1" width="4" required />
                    <input type="button" tabindex="4" class="button black" value="Consultar" onclick="consultaConsolidacaoEMP()"/>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
<span id="conteudoGrid"></span><?php }} ?>