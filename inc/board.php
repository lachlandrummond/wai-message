<!-- ---------------------------------------
    File: board.php is used to view all your chats you have been in
    Project: Wai-Message
	Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- -->  

<?php
    //checks to see if the user is logged in,
	//they shouldn't be able to access the board
	//page if they are not logged in
    if(!$logged_in){
        header('Location: ?page=home');
    }
    //and also unsets the message recipient if it was previously set
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    }
?>
<div id="board" class="board">
    <div class="board-header">
        <h1 class="board-header-head">Your Board</h1>
        <div class="board-header-user">
            <?php
                //this is the name and logout button
                print('<span class="board-header-user-name">'.$_SESSION["name"].'</span>');
            ?>
            <a href="?page=logout" class="board-header-user-logout"><i class="material-icons board-header-user-logout-icon">input</i><span class="board-header-user-logout-text">Logout</span></a>
        </div>
    </div>
    <section class="board-recent">
        <h2 class="board-recent-head">Recent Chats</h2>
        <div class="board-recent-item-container">
            <a href="?page=add" class="board-recent-item-link"><article class="board-recent-item"><img alt="Add User" src="./imgs/new.svg" class="board-recent-avatar"><p class="board-recent-item-text">New</p></article></a>
            <?php
                //this PHP prints out all the chats the user has been in,
                //whether sending or receiving messages
                require_once('db-connect.php');
                $username = $_SESSION['username'];
                $query = "SELECT receiver FROM messages WHERE sender = '$username' UNION (SELECT sender FROM messages WHERE receiver = '$username')";
                $result = mysqli_query($link, $query);
                while($recent = mysqli_fetch_assoc($result)){
                    print '<a href="?page=msg&msg='.$recent['receiver'].'" class="board-recent-item-link"><article class="board-recent-item"><img alt="User Avatar" src="./imgs/avatar.svg" class="board-recent-avatar"><p class="board-recent-item-text">'.$recent['receiver'].'</p></article></a>';
                }
                mysqli_close($link);
            ?>
        </div>
    </section>
</div>
<p class="copyright c-dark">&copy; Lachlan Drummond 2018</p>
