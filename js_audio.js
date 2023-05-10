const startBtn = document.querySelector('#startBtn');
const stopBtn = document.querySelector('#stopBtn');
const audio = document.querySelector('audio');

let stream;
let mediaRecorder;
let chunks = [];

startBtn.addEventListener('click', () => {
    navigator.mediaDevices.getUserMedia({audio: true})
      .then(_stream => {
        stream = _stream;
        mediaRecorder = new MediaRecorder(stream);
        mediaRecorder.start();
        chunks = [];
  
        startBtn.classList.add('is-danger');
        startBtn.innerText = 'Recording...';
  
        stopBtn.disabled = false;

        const now = new Date(); // Define now
  
        mediaRecorder.addEventListener('dataavailable', e => {
          chunks.push(e.data);
        });
  
        mediaRecorder.addEventListener('stop', () => {
            const filename = `recording_${now.getFullYear()}-${now.getMonth()+1}-${now.getDate()}_${now.getHours()}-${now.getMinutes()}-${now.getSeconds()}.mp3`;
          const audioBlob = new Blob(chunks, {type: 'audio/mpeg'});
          const formData = new FormData();
          formData.append('audio', audioBlob, 'recording.mp3');
  
          const xhr = new XMLHttpRequest();
          xhr.open('POST', 'upload_audio.php');
          xhr.send(formData);
  
          audio.src = URL.createObjectURL(audioBlob);
        });
      });
  });
  

stopBtn.addEventListener('click', () => {
  mediaRecorder.stop();

  startBtn.classList.remove('is-danger');
  startBtn.innerText = 'Start';

  stopBtn.disabled = true;
});
