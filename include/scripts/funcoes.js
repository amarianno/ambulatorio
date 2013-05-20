function validaSet() {
	if (document.frmnoticia.txttitulo.value == "") {
		alert("Informe o título");
		document.frmnoticia.txttitulo.focus();
		return false;
	} else if (document.frmnoticia.txtconteudo.value == "") {
		alert("Informe o conteúdo");
		document.document.frmnoticia.txtconteudo.focus();
		return false;
	} else if (document.frmnoticia.txtfonte.value == "") {
		alert("Informe a fonte");
		document.frmnoticia.txtfonte.focus();
		return false;
	} else {
		return true;
	}
}

function limpaCamposSet() {
	document.frmnoticia.lstusuarios.focus();
	document.frmnoticia.lstusuarios.selectedIndex = 0;
	document.frmnoticia.txttitulo.value = "";
	document.frmnoticia.txtconteudo.value = "";
	document.frmnoticia.txtfonte.value = "";
	document.frmnoticia.lsthabilitar.selectedIndex = 0;
}

function validaUsuario() {
	if (document.frmusuario.edtnome.value == "") {
		alert("Informe o primeiro nome");
		document.frmusuario.edtnome.focus();
		return false;
	} else if (document.frmusuario.edtemail.value == "") {
		alert("Informe o e-mail");
		document.document.frmusuario.edtemail.focus();
		return false;
	} else if (document.frmusuario.edtlogin.value == "") {
		alert("Informe o login");
		document.frmusuario.edtlogin.focus();
		return false;
	} else if (document.frmusuario.edtsenha.value == "") {
		alert("Informe a senha");
		document.frmusuario.edtsenha.focus();
		return false;
	} else {
		return true;
	}
}

function limpaCamposUsuario() {
	document.frmusuario.edtnome.focus();
	document.frmusuario.edtnome.value = "";
	document.frmusuario.edtemail.value = "";
	document.frmusuario.edtlogin.value = "";
	document.frmusuario.edtsenha.value = "";
}

function limpaCampoPesquisarCarta() {
    document.frmpesquisar.nomeCartaEN.focus();
    document.frmpesquisar.nomeCartaEN.value = "";
}

function limpaCamposLogin() {
	document.frmlogin.edtlogin.focus();
	document.frmlogin.edtlogin.value = "";
	document.frmlogin.edtsenha.value = "";
}

//confirma excluir um registro
function confirmaExcluir(mensagem, codigo) {
	if (confirm(mensagem+codigo+"?")) {
		return true;
	} else {
		return false;
	}
}

//abre uma janela centralizada
function abreJanelaCentralizada(url) {
	var janela;
	var largura = 550;
	var altura = 250;
	var esquerda = parseInt((screen.availWidth/2) - (largura/2));
	var topo = parseInt((screen.availHeight/2) - (altura/2));
	var configuracoes = "width=" + largura + ",height=" + altura + ",status,resizable,left=" + esquerda + ",top=" + topo + ",screenX=" + esquerda + ",screenY=" + topo;
	janela = window.open(url, "", configuracoes);
}

//fechar janela
function fecharJanela() {
	window.close();
}