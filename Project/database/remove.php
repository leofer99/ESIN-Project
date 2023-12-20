<?php
function removeInventory($sid) {
    try {
        global $dbh;

        $stmt = $dbh->prepare('DELETE FROM MemberStorage WHERE sid = ?;');
        $stmt->execute(array($sid));

        $stmt = $dbh->prepare('DELETE FROM Storage WHERE sid = ?;');
        $stmt->execute(array($sid));

        return true;
    } catch (PDOException $e) {
        $error_msg = $e->getMessage();
        $_SESSION['msg'] = 'Error removing inventory: ' . $error_msg;
        return false; 
    }
}

function removeRegistration($id_) {
    try {
        global $dbh;
        $stmt = $dbh->prepare('DELETE FROM Person WHERE id_ = ?;');
        $stmt->execute(array($id_));
        
        return true;
    } catch (PDOException $e) {
        $error_msg = $e->getMessage();
        $_SESSION['msg'] = 'Error removing person: ' . $error_msg;
        return false; 
    }
}



?>