<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    if(isset($_POST['submit'])) {
      // process form data
      // ...
    
      // redirect to usuarios.php after processing form data
      header("Location: usuarios.php");
      exit(); // ensure that the script stops executing after the redirect
    }
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
      <section class="registrar login">
        <header>Chat em tempo real</header>
        <form action="#" method="POST" autocomplete="off">
          <div class="error-txt"></div>
            <div class="campo input">
              <label>E-mail</label>
              <input type="text" name="email" placeholder="Digite seu email">
            </div>
            <div class="campo input">
              <label>Senha</label>
              <input type="password" name="password" placeholder="Digite sua Senha">
              <i class="fa-solid fa-eye"></i>
            </div>
            <!-- Submit para envio de dados -->
            <div class="campo submit">
              <input type="submit" name="submit" value="Ir para o chat!">
            </div>
        </form>
        <div class="link">Não possui registro?<a href="/index.php">  Registre-se</a></div>
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



<script src="/javascript/pass-show-hide.js"></script>
<script src="/javascript/mensagemRequiredField.js"></script>
<script src="/javascript/login.js"></script>

</body>
</html>