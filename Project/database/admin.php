<?php

function getNewRegistrations() {
    global $dbh;
    $stmt = $dbh->prepare('SELECT name, email, phone_number, person.id_
    FROM Person
    LEFT JOIN Member ON member.id_ = person.id_
    WHERE member.login_id IS NULL
    ORDER BY name DESC;');
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getAllMembers() {
    global $dbh;
    $stmt = $dbh->prepare('SELECT name, email, phone_number
    FROM Person
    JOIN Member ON member.id_ = person.id_
    ORDER BY name DESC;');
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getAllPayments() {
    global $dbh;
    $stmt = $dbh->prepare('SELECT name, type_payment, date_payment, amount_paid
    FROM Person
    JOIN Member ON member.id_ = person.id_
    JOIN MemberPayment ON member.login_id=memberpayment.login_id
    JOIN Payment ON memberpayment.id_pay=payment.id_pay
    ORDER BY date_payment DESC;');
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getAllEvents() {
    global $dbh;
    $stmt = $dbh->prepare('SELECT memberevent.event_id, event_name, event_type, event_date, COUNT(DISTINCT event_role) AS role_count
    FROM EventHistory
    JOIN MemberEvent ON MemberEvent.event_id = EventHistory.event_id
    GROUP BY memberevent.event_id, event_name, event_type, event_date
    ORDER BY event_date DESC, event_name ASC;');
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getAllInventory() {
    global $dbh;
    $stmt = $dbh->prepare('SELECT name, product_type, quantity, storage.sid
    FROM Person
    JOIN Member ON member.id_ = person.id_
    JOIN MemberStorage ON member.login_id=memberstorage.login_id
    JOIN Storage ON storage.sid=memberstorage.sid
    ORDER BY product_type DESC;');
    $stmt->execute();
    
    return $stmt->fetchAll();
}

?>