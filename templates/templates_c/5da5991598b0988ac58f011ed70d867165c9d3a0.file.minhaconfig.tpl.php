<?php /* Smarty version Smarty-3.1.13, created on 2013-04-23 07:21:16
         compiled from "templates/minhaconfig.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1038301407513f21f1531509-23481103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5da5991598b0988ac58f011ed70d867165c9d3a0' => 
    array (
      0 => 'templates/minhaconfig.tpl',
      1 => 1366722985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1038301407513f21f1531509-23481103',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_513f21f1698c11_05630489',
  'variables' => 
  array (
    'parsers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513f21f1698c11_05630489')) {function content_513f21f1698c11_05630489($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Buscartas - Configurações"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="centerDiv">
    <form id="contactForm" autocomplete="off" method="post" novalidate action="../cadconfig.php">
        <div class="center">

            <h2>Configurações</h2>

            <?php echo $_smarty_tpl->getSubTemplate ("mensagem_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <?php echo $_smarty_tpl->tpl_vars['parsers']->value;?>


            <br>

            <span id="btnSalvar" onclick="$(this).parents('form').submit();" class="button black">
                Alterar Configurações
            </span>

        </div>
    </form>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>