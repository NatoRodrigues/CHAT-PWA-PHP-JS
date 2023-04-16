<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
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
  <section class="usuarios">
           <header> 
            <div class="conteudo">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="detalhes">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Procurar usuário para conversar</span>
        <input type="text" placeholder="Digite o nome do usuario para pesquisar">
        <button class="botao-lupa"><i class="fas fa-search"></i></button>
      </div>
      <div class="lista-usuarios">
          
          </div>
    </section>
  </div>
  <footer>
      <nav>
        <ul>
        <li>  <a href="#">Termos de uso&nbsp;-</a></li>
        <li>  <a href="/privacidade.php"> Política de privacidade -</a></li> 
        <li>  <a href="#"> Contato &nbsp; &nbsp; </a></li> 
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
  <script src="javascript/users.js"></script>
  
</body>
</html>
