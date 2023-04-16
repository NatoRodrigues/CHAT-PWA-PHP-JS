
<?PHP include_once "header.php";?>
<body>
<script>
// This is the service worker with the Cache-first network
// Add this below content to your HTML page, or add the js file to your page at the very top to
//register service worker
// Check compatibility for the browser we're running this in
if ("serviceWorker" in navigator) {
if (navigator.serviceWorker.controller) {
console.log("[PWA Builder] active service worker found, no need to register");
} else {
// Register the service worker
navigator.serviceWorker
.register("pwabuilder-sw.js", {
scope: "./"
})
.then(function (reg) {
console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
});
}
}
</script>
    <div class="wrapper">
      <section class="usuarios">
      <a href="./login.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
           <header> 
                <h1>X Chat</h1>
            <div class="conteudo">
    
              <div class="detalhes">
              <span> </span>
            <p></p>
              </div>
            </div>
        </header>
        <div class="search">
            <span class="text" id="spantext"></span>
        </div>
        <div class="lista-usuarios">

        <style>
            p{
                text-align: center;
            }
        </style>
<strong><p>Política de Privacidade do Aplicativo de Chat</p></strong> <BR>

<P>Este aplicativo de chat é um software de mensagens projetado para fornecer aos usuários um meio de se comunicar uns com os outros em tempo real. A privacidade e a segurança dos nossos usuários são de extrema importância para nós, e estamos comprometidos em proteger suas informações pessoais.</P><br>

<strong><P>Coleta de Informações<P></strong><br>

<P>Ao criar uma conta no nosso aplicativo de chat, coletamos informações básicas, como seu nome de usuário, endereço de e-mail e senha. Além disso, podemos coletar informações sobre suas interações com outros usuários, incluindo mensagens, fotos e vídeos compartilhados.<P><br>

<strong><P>Uso de Informações<P></strong><br>

<P>As informações coletadas pelo nosso aplicativo de chat são usadas para fornecer e melhorar nossos serviços. Além disso, usamos essas informações para personalizar sua experiência de usuário, exibir anúncios relevantes e proteger a segurança do nosso aplicativo.<P><br>

<strong><P>Compartilhamento de Informações<P></strong><br>

<P>Não compartilhamos informações pessoais com terceiros, exceto quando exigido por lei ou quando necessário para proteger a segurança dos nossos usuários. No entanto, podemos compartilhar informações não identificáveis ​​com terceiros para fins de pesquisa de mercado e análise de dados.<P><br>

<strong><P>Segurança de Informações<P></strong><br>

<P>Tomamos medidas razoáveis ​​para proteger suas informações pessoais contra acesso não autorizado, alteração, divulgação ou destruição. No entanto, nenhum método de transmissão pela Internet ou armazenamento eletrônico é 100% seguro, e não podemos garantir a segurança das informações que você nos fornece.<P><br>

<strong><P>Alterações na Política de Privacidade</strong><P>

<P>Podemos atualizar esta política de privacidade periodicamente para refletir as mudanças em nossas práticas de coleta e uso de informações. É importante que você revise esta política periodicamente para se manter informado sobre nossas práticas de privacidade.<P><br>

<strong><P>Contato<P></strong><br>

Se você tiver alguma dúvida ou preocupação sobre nossa política de privacidade, entre em contato conosco através do nosso endereço de e-mail de suporte. <br>
<br>
<a href="mailto:email@exemplo.com?subject=Assunto da mensagem&body=Corpo da mensagem">suporteXchat@gmail.com</a>

        </div>
      </section>
    </div>
        
    <footer>
  <nav>
  <ul>
    <li><a href="#">Termos de uso&nbsp;-</a></li>
    <li><a href="/privacidade.php"> Política de privacidade -</a></li> 
    <li><a href="#"> Contato &nbsp;  </a></li> 
    </ul>
  </nav>
</footer>
<style>

    h1{
        text-align: center;
        margin-left: 40%;
    }
  
  footer{
    height: 80px;
  }

  footer nav ul {
    list-style: none;
    text-align: center;
  }

  footer nav ul li {
    display: inline-block;
  }

  footer nav ul li a {
    font-size:14px;
    margin-top: 17px;
    display: inline-block;
    color: #fff;
    text-decoration: none;
  }
  
</style>
</body>
</html>