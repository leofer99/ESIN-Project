<?php

//successful login
function loginSuccess($login_id, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT login_id, login_password FROM Member WHERE login_id = ? AND login_password = ?;');
    $stmt->execute(array($login_id, $password));
    return $stmt->fetch();
  }

//finds username using the login_id
function findUsernameByLoginId($login_id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT name FROM Member 
    JOIN Person ON member.id_=person.id_
    WHERE login_id = ?;');
    $stmt->execute(array($login_id));
    return $stmt->fetch();
}

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

function getAnnualFees() {
    global $dbh;
    $stmt = $dbh->prepare('SELECT fee_year, fee_amount
        FROM Fees;');
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function getUserDebt($login_id) {
    global $dbh;

    try {
        $stmt = $dbh->prepare('
            SELECT role_asso, role_date_begin, role_date_end, fee_year, fee_amount, SUM(yearly_actually_paid) AS payment_owed
            FROM (
                SELECT role_asso, role_date_begin, role_date_end, fee_year, fee_amount,
                    12 - strftime("%m", role_date_begin) AS months_as_gb_till_end_of_year,
                    strftime("%m", role_date_end) AS months_as_gb_till_mandate_end,
                    fee_amount * (12 - strftime("%m", role_date_begin) + strftime("%m", role_date_end)) AS fee_while_gb_member,
                    12 * fee_amount AS yearly_fee_price,
                    CASE 
                        WHEN role_asso IN ("Board Member", "CF", "MAG") THEN
                            12 * fee_amount - (fee_amount * (12 - strftime("%m", role_date_begin) + strftime("%m", role_date_end))) 
                        ELSE 
                            (fee_amount * (12 - strftime("%m", role_date_begin) + strftime("%m", role_date_end))) 
                    END AS yearly_actually_paid
                FROM Fees 
                JOIN MemberFees ON fees.id_fee = memberfees.id_fee
                JOIN Member ON memberfees.login_id = member.login_id
                JOIN MemberHistory ON memberhistory.login_id = member.login_id
                JOIN AssociationHistory ON associationhistory.id_asso = memberhistory.id_asso
                WHERE member.login_id = ? AND (strftime("%Y", role_date_begin) = fee_year )
            ) AS fees_owed
        ');

        $stmt->bindParam(1, $login_id, PDO::PARAM_INT);
        $stmt->execute();

        $user_debt = $stmt->fetchAll();

        return $user_debt;
    } catch (PDOException $e) {
        // Handle the exception, log or display an error message
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}


function getUserAmountPaid($login_id) {
    global $dbh;
    $stmt = $dbh->prepare('
    SELECT login_id, SUM(amount_paid) AS total_paid
    FROM (
        SELECT member.login_id, payment.id_pay, payment.amount_paid
        FROM Member 
        JOIN MemberPayment ON member.login_id = memberpayment.login_id
        JOIN Payment ON memberpayment.id_pay = payment.id_pay
        WHERE member.login_id=?
        GROUP BY member.login_id, payment.id_pay
    ) AS fees_paid
    GROUP BY login_id;
    ');
    $stmt->execute(array($login_id));
    $user_paid=$stmt->fetchAll();

    return $user_paid;
}


function getUserFeesInfoById($login_id) {
    
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
    $stmt = $dbh->prepare('SELECT member.login_id, memberhistory.id_asso, role_asso, role_date_begin,  role_date_end
        FROM Member
        JOIN MemberHistory ON member.login_id = memberhistory.login_id
        JOIN AssociationHistory ON associationhistory.id_asso = memberhistory.id_asso
    WHERE member.login_id=?  --specific_login_id
    ORDER BY role_date_begin DESC;');
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
    $stmt = $dbh->prepare('SELECT product_type, quantity, storage.sid
    FROM Member
    JOIN MemberStorage ON member.login_id = memberstorage.login_id
    JOIN Storage ON memberstorage.sid = storage.sid
    WHERE member.login_id=?  --specific_login_id
    ORDER BY storage.sid DESC;');
    $stmt->execute(array($login_id));
    
    return $stmt->fetchAll();
}

?>