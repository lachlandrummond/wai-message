<?php
    $_SESSION['msg'] = $_GET['msg'];
?>
<div class="msg">
    <header class="msg-header">
		<a href="?page=board" class="msg-header-back"><i class="material-icons msg-header-back-icon">arrow_back_ios</i><span class="msg-header-back-text">Back</span></a>
		<h2 class="msg-header-head">
            <?php
                print $_SESSION['msg'];
            ?>
        </h2>
		<span class="msg-header-accent"></span>
	</header>
    <main class="msg-msgs">
        <div id="msg-msgs-feed">
            <?php
                error_reporting(0);
                require_once('db-connect.php');
                $user = $_SESSION['username'];
                $msg = $_SESSION['msg'];
                $query = "SELECT * FROM messages WHERE (sender = '$msg' AND receiver = '$user') OR (sender = '$user' AND receiver = '$msg')
                            ORDER BY timestamp ASC";
                $result = mysqli_query($link, $query);
                while($msg = mysqli_fetch_assoc($result)){
                    if($msg['sender'] == $user){
                        date_default_timezone_set("Pacific/Auckland");
                        $timesent = date("h:i A", strtotime( $msg['timestamp']));
                        print '<div class="msg-msgs-feed-msg--sent">
                                    <div class="msg-msgs-feed-msg">
                                        <div class="msg-msgs-feed-msg-bubble sent">
                                            <p class="msg-msgs-feed-msg-bubble-content">'.$msg['message'].'</p>
                                        </div>
                                        <p class="msg-msgs-feed-msg-timestamp">'.$timesent.'</p>
                                    </div>
                                </div>';
                    } else {
                        date_default_timezone_set("Pacific/Auckland");
                        $timesent = date("h:i A", strtotime( $msg['timestamp']));
                        print '<div class="msg-msgs-feed-msg--received">
                                    <div class="msg-msgs-feed-msg">
                                        <div class="msg-msgs-feed-msg-bubble received">
                                            <p class="msg-msgs-feed-content">'.$msg['message'].'</p>
                                        </div>
                                        <p class="msg-msgs-feed-msg-timestamp">'.$timesent.'</p>
                                    </div>
                                </div>';
                    }
                }
                mysqli_close($link);
            ?>
        </div>
        <form class="msg-msgs-input" action="?page=send" method="post">
            <input type="text" name="msg_send" maxlength="500" autocomplete="off" required autofocus>
            <input class="msg-send-btn" type="submit" value="Send"></input>
        </form>
    </main>
    <script src="./scripts/msg.js"></script>
</div>
<p class="copyright c-light">&copy; Lachlan Drummond 2018</p>