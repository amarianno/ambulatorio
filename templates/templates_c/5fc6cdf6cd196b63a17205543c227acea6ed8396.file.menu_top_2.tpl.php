<?php /* Smarty version Smarty-3.1.13, created on 2013-04-26 10:43:52
         compiled from "templates/menu_top_2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1628436732513f28ccb54037-06518118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fc6cdf6cd196b63a17205543c227acea6ed8396' => 
    array (
      0 => 'templates/menu_top_2.tpl',
      1 => 1366994480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1628436732513f28ccb54037-06518118',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_513f28ccba25c0_92190013',
  'variables' => 
  array (
    'login' => 0,
    'nome' => 0,
    'sobrenome' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513f28ccba25c0_92190013')) {function content_513f28ccba25c0_92190013($_smarty_tpl) {?><!-- MENU -->
<div id="menu">
    <!-- menu-holder -->
    <div id="menu-holder">
        <!-- wrapper-menu -->
        <div class="wrapper">
            <!-- Navigation -->
            <ul id="nav" class="sf-menu">
                <li id="logo_buscartas_peq">
                    <a href="index.php" style='margin-top: 0px;'><img src="include/img/logo/logo_thumb.png" /></a>
                </li>
                <li>
                    <a href="index.php">Buscar carta<span class="subheader">Compare preços</span></a>
                </li>
                <li>
                    <a href="javascript:void(0);">Decks
                        <span class="subheader">
                            <img src="include/img/icon/arrowdown-icon.png"/>
                            Opções
                        </span>
                    </a>
                    <ul>
                        <?php if (isset($_smarty_tpl->tpl_vars['login']->value)){?>
                            <li><a href="deck.php?op=d"><span>Meus Decks</span></a></li>
                        <?php }?>
                        <li><a href="deck_pronto.php"><span>Procurar Decks</span></a></li>
                    </ul>
                </li>
                <?php if (!isset($_smarty_tpl->tpl_vars['login']->value)){?>
                <li><a href="login.php">Login<span class="subheader">Site | Facebook | Google</span></a></li>
                <li><a href="cadusuarios.php">Cadastrar<span class="subheader">Explore mais!</span></a></li>
                <?php }else{ ?>
                <li><a href="deck.php?op=w">Wishlist<span class="subheader">Visualizar</span></a></li>
                <li style="float:right">
                    <a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['sobrenome']->value;?>
<span class="subheader">
                        <img src="include/img/icon/arrowdown-icon.png"/> Opções</span>
                    </a>
                    <ul>
                        <li><a href="minhaconta.php"><span>Minha Conta</span></a></li>
                        <li><a href="minhaconfig.php"><span>Configurar busca</span></a></li>
                        <li><a href="altpass.php"><span>Alterar senha</span></a></li>
                        <li><a href="logout.php"><span>Sair</span></a></li>
                    </ul>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>

<!-- MAIN -->
<div id="main">
    <!-- wrapper-main -->
    <div class="wrapper">

        <br>
        <!-- content -->
        <div id="content"><?php }} ?>