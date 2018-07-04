<!-- ---------------------------------------
    File: msg.php shows all the messages that the user has sent or
            received from the recipient
    Project: Wai-Message
	Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- -->

<?php
    //checks to see if the user is logged in,
	//they shouldn't be able to access the message
	//page if they are not logged in
    if(!$logged_in){
        header('Location: ?page=home');
    }
    //retrieves the recipient
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
                //retrieves all the messages between user and recipient and
                //sorts them depending on who sent them
                //aslo formats the date
                require_once('db-connect.php');
                $user = $_SESSION['username'];
                $msg = $_SESSION['msg'];
                $query = "SELECT * FROM messages WHERE (sender = '$msg' AND receiver = '$user') OR (sender = '$user' AND receiver = '$msg')
                            ORDER BY timestamp ASC";
                $result = mysqli_query($link, $query);
                while($msg = mysqli_fetch_assoc($result)){
                    if($msg['sender'] == $user){
                        date_default_timezone_set("Pacific/Auckland");
                        $timesent = date("h:i A D", strtotime( $msg['timestamp']));
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
                        $timesent = date("h:i A D", strtotime( $msg['timestamp']));
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
        <!-- this is the message box form to submit messages to send.php for insertion -->
        <form class="msg-msgs-input" action="?page=send" method="post">
            <input class="msg-msgs-send-input" type="text" name="msg_send" maxlength="500" autocomplete="off" required autofocus>
            <input class="msg-msgs-send-btn material-icons" type="submit" value="send">
        </form>
    </main>
    <script src="./scripts/msg.js"></script>
</div>
<p class="copyright c-light">&copy; Lachlan Drummond 2018</p>