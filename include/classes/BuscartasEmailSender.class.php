<?php

require_once('Loader.class.php');

/**
 * Classe para centralizar o envio de emails.
 */
class BuscartasEmailSender {

    /**
     * Envia email com a nova senha do usuário
     * @param Usuario $usuario
     * @param $novaSenha
     */
    function enviarEmailResetarSenha(Usuario $usuario, $novaSenha) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: BUSCARTAS <noreply@buscartas.com.br>' . "\r\n";
        $subject = "Buscartas - envio de nova senha";

        $mensagem = "<html>
                          <head>
                              <title>Buscartas - envio de nova senha</title>
                          </head>
                          <body>
                              <p style='color: #51565b; padding-top: 20px; font-size: 20px; font-weight: bold;'>
                                  <img src='http://www.buscartas.com.br/include/img/logo/logo_thumb.png'>
							      <br/>
							      Ativação de conta
                              </p>
                              <p style='border-top: 1px solid #d7d7d7; font-size: 14px; color: #51565b; padding-top:20px;'>
                                  Prezado(a) <b>" . $usuario->nome . " " . $usuario->sobrenome . "</b>,<br/>
                                  Conforme solicitação sua nova senha é " . $novaSenha . "<br/>
                                  <em>Esta é uma mensagem automática. Por favor, não a responda.</em>
                              </p>
                          </body>
                         </html>";

        mail($usuario->email, $subject, $mensagem, $headers);
    }

    /**
     * Envia o email com o link para ativação da conta
     * @param Usuario $usuario
     */
    function enviarEmailAtivacaoConta(Usuario $usuario) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: BUSCARTAS <noreply@buscartas.com.br>' . "\r\n";
        $subject = "Buscartas - ativação de conta";

        $mensagem = "<html>
                      <head>
                          <title>Buscartas - ativação de conta</title>
                      </head>
                      <body>
                          <p style='color: #51565b; padding-top: 20px; font-size: 20px; font-weight: bold;'>
                              <img src='http://www.buscartas.com.br/include/img/logo/logo_thumb.png'>
                              <br/>
                              Ativação de conta
                          </p>
                          <p style='border-top: 1px solid #d7d7d7; font-size: 14px; color: #51565b; padding-top:20px;'>
                              Prezado(a) <b>" . $usuario->nome . " " . $usuario->sobrenome . "</b>,<br/>
                              Você acabou de efetuar o cadastro em <a href='http://www.buscartas.com.br'>buscartas.com.br</a> e por razões de segurança é necessário ativar seu cadastro.<br/>
                              Com um cadastro ativo será possível criar/importar/exportar decks, criar wishlists e muitas outras vantagens integradas com a busca de preços.<br/><br/>
                              Siga o link abaixo:<br/>
                              <a href='http://www.buscartas.com.br/ativarconta.php?mail=" . $usuario->email . "'>http://www.buscartas.com.br/ativarconta.php?mail=" . $usuario->email . "</a><br/><br/>
                              Se o link não funcionar, copie e cole o endereço em seu navegador.<br/>
                              <em>Esta é uma mensagem automática. Por favor, não a responda.</em>
                          </p>
                      </body>
                     </html>";

        mail($usuario->email, $subject, $mensagem, $headers);
    }

    /**
     * Envia email com as exceções para {Alberto, Porcho, Baccelli, Macapuna e Johny}
     * @param Exception $e
     * @param $tela
     */
    static function enviarEmailException(Exception $e, $tela) {
        $alberto = "amarianno@gmail.com";
        $bacceccellieieee = "batchaki@gmail.com";
        $macapuna = "carlosmacapuna@gmail.com";
        $porcho = "maporcho@gmail.com";
        $johny = "johcker.spam@gmail.com";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: BUSCARTAS <noreply@buscartas.com.br>' . "\r\n";
        $subject = "Buscartas - ERRO em " . $tela;

        $to = $alberto . ", " . $bacceccellieieee . ", " . $macapuna . ", " . $porcho . ", " . $johny;

        $mensagem = "<html>
                      <head>
                          <title>Buscartas - ERRO</title>
                      </head>
                      <body>
                          <p style='color: #51565b; padding-top: 20px; font-size: 20px; font-weight: bold;'>
                              <img src='http://www.buscartas.com.br/include/img/logo/logo_thumb.png'>
                              <br/>
                              ERRO em " . $tela . "
                          </p>
                          <p style='border-top: 1px solid #d7d7d7; font-size: 14px; color: #51565b; padding-top:20px;'>
                              <pre>" . $e->getMessage() . "
                                  <br/><br/>
                                  <hr>
                                  <br/><br/>" . $e->getTraceAsString() . "
                              </pre>
                          </p>
                      </body>
                     </html>";

        mail($to, $subject, $mensagem, $headers);
    }

}