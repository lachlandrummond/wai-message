<div class="board">
    <div class="board-header">
        <h1 class="board-header-head">Your Board</h1>
        <div class="board-header-user">
            <?php
                print('<span class="board-header-user-name">'.$_SESSION["name"].'</span>');
            ?>
            <a href="?page=logout" class="board-header-user-logout"><i class="material-icons board-header-user-logout-icon">input</i><span class="board-header-user-logout-text">Logout</span></a>
        </div>
    </div>
</div>