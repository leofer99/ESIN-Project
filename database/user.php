<?php

//selects user's info
function getUserInfoById($login_id) {
global $dbh;
$stmt = $dbh->prepare('SELECT name, email, gender, city, joined_date
    FROM Person
    JOIN Member ON member.id_=person.id_
WHERE member.login_id=?;');
$stmt->execute(array($login_id));
return $stmt->fetchAll();
}

function getUserFeesInfoById($login_id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT fee_type, fee_status, fee_months_ahead
    FROM FeesInfo
    JOIN Member ON feesinfo.id_feeinfo= member.id_feeinfo
    WHERE member.login_id=?;');
    $stmt->execute(array($login_id));

    return $stmt->fetchAll();
}

function  getUserPaymentHistoryById($login_id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT date_payment, amount_paid, type_payment
    FROM Payment
    JOIN MemberPayment ON memberpayment.id_pay = payment.id_pay
    JOIN Member ON memberpayment.login_id = member.login_id
    WHERE member.login_id=? 
    ORDER BY date_payment DESC;');
    $stmt->execute(array($login_id));

    return $stmt->fetchAll();
}


function getUserAssociationHistoryById($login_id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT member.login_id, memberhistory.id_asso, role_asso, year_asso
        FROM Member
        JOIN MemberHistory ON member.login_id = memberhistory.login_id
        JOIN AssociationHistory ON associationhistory.id_asso = memberhistory.id_asso
    WHERE member.login_id=?  --specific_login_id
    ORDER BY year_asso DESC;');
    $stmt->execute(array($login_id));
    
    return $stmt->fetchAll();
}
    
function getUserEventHistoryById($login_id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT member.login_id, memberevent.event_id, event_name, event_date, event_type, event_role
        FROM Member
        JOIN MemberEvent ON member.login_id = memberevent.login_id
        JOIN EventHistory ON memberevent.event_id = eventhistory.event_id
    WHERE member.login_id=?  --specific_login_id
    ORDER BY event_date DESC, memberevent.event_id DESC;');
    $stmt->execute(array($login_id));

    return $stmt->fetchAll();
}

function getUserInventoryById($login_id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT product_type, quantity
    FROM Member
    JOIN MemberStorage ON member.login_id = memberstorage.login_id
    JOIN Storage ON memberstorage.sid = storage.sid
    WHERE member.login_id=?  --specific_login_id
    ORDER BY storage.sid DESC;');
    $stmt->execute(array($login_id));
    
    return $stmt->fetchAll();
}

/*function $members= getAllMembers() {
    global $dbh;
    $stmt = $dbh->prepare('SELECT product_type, quantity
    FROM Member
    JOIN MemberStorage ON member.login_id = memberstorage.login_id
    JOIN Storage ON memberstorage.sid = storage.sid
    WHERE member.login_id=?  --specific_login_id
    ORDER BY storage.sid DESC;');
    $stmt->execute(array($login_id));
    
    return $stmt->fetchAll();

}*/


    