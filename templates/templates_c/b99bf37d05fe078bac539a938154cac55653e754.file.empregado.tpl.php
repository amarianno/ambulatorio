<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 14:34:36
         compiled from "templates/empregado.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9700737195183a1a9427cd6-25686659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b99bf37d05fe078bac539a938154cac55653e754' => 
    array (
      0 => 'templates/empregado.tpl',
      1 => 1370539808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9700737195183a1a9427cd6-25686659',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5183a1a94b3192_48358088',
  'variables' => 
  array (
    'tela' => 0,
    'txtNome' => 0,
    'txtLotacao' => 0,
    'txtNumCarteira' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5183a1a94b3192_48358088')) {function content_5183a1a94b3192_48358088($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados -SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['tela']->value=='cad'){?>
<form id="cadEmpregadoForm" autocomplete="off" method="POST" action="../empregadoCAD.php" onsubmit="addEmpregado();return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                <label for="txtMatricula">
                    Matrícula <span class="req">*</span><span id="msg"></span>
                </label>
                <input id="txtMatricula" name="txtMatricula"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"
                       onblur="existeFuncionario()"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtNome">
                    Nome<span class="req">*</span>
                </label>
                <input id="txtNome" name="txtNome"
                       type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtNome']->value;?>
" maxlength="250"
                       tabindex="2" required style="width: 320px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtLotacao">
                    Lotação
                </label>
                <input id="txtLotacao" name="txtLotacao"
                       type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtLotacao']->value;?>
" maxlength="60"
                       tabindex="3" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtNumCarteira">
                    Número da Carteira
                </label>
                <input id="txtNumCarteira" name="txtNumCarteira"
                       type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtNumCarteira']->value;?>
" maxlength="20"
                       tabindex="4" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td>
                Empresa <br>
                <select id="selLocalidade" name="selLocalidade" tabindex="5" style="width: 320px;" >
                    <option value="1" selected="selected">
                        SOCORRO
                    </option>
                    <option value="2">
                        LUZ
                    </option>
                    <option value="3">
                        NOVA REDENTORA
                    </option>
                </select>
            </td>
        </tr>

        <tr>
            <td style="text-align: left" colspan="2">
                <input type="submit" tabindex="6" class="button black" value="Gravar Registro"/>
                <input type="button" tabindex="7" class="button black" value="Limpar Campos" onclick="limparCamposEmpregado()"/>
                <a href="empregadoCAD.php?op=listar">
                    <input type="button" tabindex="8" class="button black" value="Procurar Empregado" />
                </a>
                <input type="button" tabindex="9" class="button black" value="Deletar" onclick="querMesmoApagarEmpregado()"/>
            </td>
        </tr>

        <tr>
            <td>
                <input type="hidden" name="cadastraOuAlterar" id="cadastraOuAlterar" value="" />
            </td>
            <td></td>
            <td></td>
        </tr>

    </table>
    <div id="dialog-confirm"></div>
</form>
<?php }else{ ?>
    <form id="buscarForm" onsubmit="buscarEmpregado();return false;">
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <td>
                    <label for="txtNomePes">
                        Nome<span class="req">*</span>
                    </label>
                    <input id="txtNomePes" name="txtNomePes"
                           type="text" value="" maxlength="250"
                           tabindex="2" required style="width: 320px;"/>
                    <input type="button" tabindex="5" class="button black" value="Buscar" onclick="buscarEmpregado()"/>
            </tr>
        </table>
        <br><br><br>
        <div id="gridEmpregado"></div>
    </form>
<?php }?><?php }} ?>