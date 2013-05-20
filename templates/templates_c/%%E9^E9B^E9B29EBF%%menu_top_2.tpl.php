<?php /* Smarty version 2.6.18, created on 2013-04-13 05:59:53
         compiled from menu_top_2.tpl */ ?>
<!-- MENU -->
<div id="menu">
    <!-- menu-holder -->
    <div id="menu-holder">
        <!-- wrapper-menu -->
        <div class="wrapper">
            <!-- Navigation -->
            <ul id="nav" class="sf-menu">
                <li id="logo_buscartas_peq">
                    <img src="include/img/logo/logo_thumb.png" />
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
                        <?php if (isset ( $this->_tpl_vars['login'] )): ?>
                            <li><a href="deck.php?op=d"><span>Meus Decks</span></a></li>
                        <?php endif; ?>
                        <li><a href="deck_pronto.php"><span>Procurar Decks</span></a></li>
                    </ul>
                </li>
                <?php if (! isset ( $this->_tpl_vars['login'] )): ?>
                <li><a href="login.php">Login<span class="subheader">Site | Facebook | Google</span></a></li>
                <li><a href="cadusuarios.php">Cadastrar<span class="subheader">Explore mais!</span></a></li>
                <?php else: ?>
                <li><a href="deck.php?op=w">Wishlist<span class="subheader">Visualizar</span></a></li>
                <li style="float:right">
                    <a href="javascript:void(0);"><?php echo $this->_tpl_vars['nome']; ?>
 <?php echo $this->_tpl_vars['sobrenome']; ?>
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
                <?php endif; ?>
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
        <div id="content">