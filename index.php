<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
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
      <section class="registrar">
        <header>PWA web chat<span style="font-size: 24px; color: red;">&#x2764;</span></header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="error-txt"></div>
          <div class="nome-detalhes">

            <!-- Campos do formulario de registro -->
            <div class="campo input">
              <label>Nome</label>
              <input type="text" placeholder="Digite seu nome" name="fname" required>
            </div>
            <div class="campo input">
              <label>Sobrenome</label>
              <input type="text" placeholder="Digite seu sobrenome" name="lname" required>
            </div>
            </div>
            <div class="campo input">
              <label>E-mail</label>
              <input type="text" placeholder="Digite seu email" name="email" required>
            </div>
            <div class="campo input">
              <label>Senha</label>
              <input type="password" placeholder="Digite uma Senha" name="password" required>
              <i class="fa-solid fa-eye"></i>
            </div>
            <div class="campo imagem">
              <label>Selecionar foto do perfil</label>
              <input type="file" name="image" required>
            </div>

            <!-- Submit para envio de dados -->  
            <div class="campo submit">
              <input type="submit" name="submit" value="Ir para o chat!">
            </div>
        </form>
        <div class="link">Já possui registro?<a href="./login.php">Logar</a></div>
      </section>
    </div>
    <footer>
  <nav>
    <ul>
    <li><a href="#">Termos de uso&nbsp;-</a></li>
    <li><a href="/privacidade.php"> Política de privacidade -</a></li> 
    <li><a href="#"> Contato &nbsp; &nbsp; </a></li> 
    </ul>
  </nav>
</footer>


<style>
  
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
    font-size:12px;
    margin-top: 17px;
    display: inline-block;
    color: #fff;
    text-decoration: none;
  }
  
</style>
  <script src="/javascript/pass-show-hide.js"></script>
  <script src="/javascript/signup.js"></script>
  <script src="/javascript/mensagemRequiredField.js"></script>
</body>
</html>
