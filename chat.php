<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body class="bordauser">
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
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="detalhes">
          <span class="header-chat"><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p class="chat saida"><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="campo-msg" autocomplete="off">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Digite a mensagem..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
        <button id="btnEnviarAudio" type="button"><i class="fa fa-microphone"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
