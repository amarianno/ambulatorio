<?php /* Smarty version Smarty-3.1.13, created on 2013-03-18 14:19:08
         compiled from "templates/search_teste.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100137467751476f19c5a1f3-35753400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3221d6cb457c43d46038459f3f52f064cd7d2716' => 
    array (
      0 => 'templates/search_teste.tpl',
      1 => 1363637937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100137467751476f19c5a1f3-35753400',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51476f19c6fe24_42559830',
  'variables' => 
  array (
    'parsers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51476f19c6fe24_42559830')) {function content_51476f19c6fe24_42559830($_smarty_tpl) {?><!-- MAIN -->
<div id="main">
    <!-- wrapper-main -->
    <div class="wrapper">

        <br>
        <!-- content -->
        <div id="content">
            <div class="searchform">

                <form id="formBusca" action="cardSearchTeste.php" method="post"
                      onsubmit="setarCamposTeste(); return false;">

                    <div class="center">

                        <img id="logo_buscartas" src="../../include/ver_o_que_usa/img/logo_novo.png"/>
                        <br>
                        <input type="text" name="nomeCartaEN" id="nomeCartaEN"
                               placeholder="Digite o nome da carta..."
                               size="60">
                        <span id="g-search-button"></span>
                        <br id="br_pesquisa">
                        <a href="#" onclick="$(this).parents('form').submit();" class="button black size"
                           id="btnBuscarCarta">Buscar</a>
                        <a href="#" class="button black size" id="sitesParserLink">Configurar</a>

                        <input type="hidden" name="nomeCartaPT" id="nomeCartaPT">
                        <input type="hidden" name="idCarta" id="idCarta">
                        <input type="hidden" name="edition_code" id="edition_code">
                        <input type="hidden" name="cartaNum" id="cartaNum">

                        <div id="sitesParserBox">
                            <?php echo $_smarty_tpl->tpl_vars['parsers']->value;?>

                        </div>
                    </div>


                </form>
            </div>

            <div id="divResultado">
                <?php echo $_smarty_tpl->getSubTemplate ("search_teste.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
        </div>
    </div>
</div>


<!--
<script type="text/javascript"><!--
    google_ad_client = "ca-pub-4352233980183823";
    /* buscasrtas */
    google_ad_slot = "1555924570";
    google_ad_width = 728;
    google_ad_height = 90;
    //-->
<!--
</script>
<script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>   -->
<?php }} ?>