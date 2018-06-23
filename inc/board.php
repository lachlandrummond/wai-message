<?php
    if(!$logged_in){
        header('Location: ?page=home');
    }
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    }
?>
<div id="board" class="board">
    <div class="board-header">
        <h1 class="board-header-head">Your Board</h1>
        <div class="board-header-user">
            <?php
                print('<span class="board-header-user-name">'.$_SESSION["name"].'</span>');
            ?>
            <a href="?page=logout" class="board-header-user-logout"><i class="material-icons board-header-user-logout-icon">input</i><span class="board-header-user-logout-text">Logout</span></a>
        </div>
    </div>
    <section class="board-recent">
        <h2 class="board-recent-head">Recent Chats</h2>
        <div class="board-recent-item-container">
            <a href="?page=add" class="board-recent-item-link"><article class="board-recent-item"><img src="./imgs/new.svg" class="board-recent-avatar"><p class="board-recent-item-text">New</p></article></a>
            <?php
                require_once('db-connect.php');
                $username = $_SESSION['username'];
                $query = "SELECT * FROM messages WHERE sender = '$username' OR receiver = '$username' ORDER BY timestamp DESC";
                $result = mysqli_query($link, $query);
                while($recent = mysqli_fetch_assoc($result)){
                    if($recent['sender'] == $username){
                        print '<a href="?page=msg&msg='.$recent['receiver'].'" class="board-recent-item-link"><article class="board-recent-item"><img src="./imgs/avatar.svg" class="board-recent-avatar"><p class="board-recent-item-text">'.$recent['receiver'].'</p></article></a>';
                    } else {
                        print '<a href="?page=msg&msg='.$recent['sender'].'" class="board-recent-item-link"><article class="board-recent-item"><img src="./imgs/avatar.svg" class="board-recent-avatar"><p class="board-recent-item-text">'.$recent['sender'].'</p></article></a>';
                    }
                }
                mysqli_close($link);
            ?>
        </div>
    </section>
</div>
<p class="copyright c-dark">&copy; Lachlan Drummond 2018</p>
