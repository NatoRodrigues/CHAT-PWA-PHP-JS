<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";

        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="audio-box-entrada">
                                    <div class="play-pause">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <audio controls id="myAudio" src="/upload_audio/"></audio>
                                    <progress id="myProgress" value="0" max="100"></progress>
                                    <div class="duration">0:00</div>
                                  </div>';
                } else {
                    $output .= '<div class="audio-box-saida">
                                    <div class="play-pause">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <audio controls id="myAudio" src="/upload_audio/"></audio>
                                    <progress id="myProgressSaida" value="0" max="100"></progress>
                                    <div class="duration">0:00</div>
                                </div>';
                }          
                
            }
        }else{
            $output .= '<div class="text">Nenhuma mensagem enviada. Quando alguma mensagem for enviada, ela aparecerá aqui.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>