const form = document.querySelector(".campo-msg"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }



// selecionar botão e ícone
const btnRecord = document.getElementById('btnEnviarAudio');
const iconRecord = btnRecord.querySelector('i');

// criar contexto de áudio
let audioContext = new AudioContext();

// iniciar gravação
let mediaRecorder;
let chunks = [];

btnRecord.addEventListener('click', function() {
  if (mediaRecorder && mediaRecorder.state === 'recording') {
    mediaRecorder.stop();
    iconRecord.classList.remove('fa-stop');
    iconRecord.classList.add('fa-microphone');
  } else {
    navigator.mediaDevices.getUserMedia({audio: true})
      .then(function(stream) {
        mediaRecorder = new MediaRecorder(stream);
        chunks = [];

        mediaRecorder.start();

        iconRecord.classList.remove('fa-microphone');
        iconRecord.classList.add('fa-stop');

        mediaRecorder.ondataavailable = function(event) {
          chunks.push(event.data);
        };

        mediaRecorder.onstop = function() {
          let blob = new Blob(chunks, { 'type' : 'audio/ogg; codecs=opus' });
          chunks = [];

          let formData = new FormData();
          formData.append('audio', blob, 'audio.ogg');

          let xhr = new XMLHttpRequest();
          xhr.open('POST', 'http://localhost:3000/upload_audio');
          xhr.send(formData);
        };
      })
      .catch(function(err) {
        console.log('Erro ao acessar o microfone', err);
      });
  }
});
