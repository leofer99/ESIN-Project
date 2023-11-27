
--UPDATES: 
------------------------------------------
--table with months_member of each user
SELECT login_id, joined_date, 
CAST ((julianday('now') - julianday(joined_date)) / 30 AS INTEGER) 
AS months_member FROM Member;

--table with total amount paid by each member
SELECT login_id, SUM(amount_paid) AS total_amount_paid
FROM (
    SELECT member.login_id, payment.id_pay, payment.amount_paid
    FROM Member 
    JOIN MemberPayment ON member.login_id = memberpayment.login_id
    JOIN Payment ON memberpayment.id_pay = payment.id_pay
    GROUP BY member.login_id, payment.id_pay
)
GROUP BY login_id;

--table with total months paid by each member
SELECT login_id, SUM(amount_paid/fee_amount) AS months_paid_total
FROM ( SELECT member.login_id, fees.id_fee, fee_amount, payment.id_pay, payment.amount_paid
    FROM Fees 
    JOIN Payment ON payment.id_pay = fees.id_pay
    JOIN MemberPayment ON memberpayment.id_pay = payment.id_pay
    JOIN Member ON memberpayment.login_id = member.login_id
    GROUP BY member.login_id, payment.id_pay

) GROUP BY login_id;

--table with total months paid by each member, total months as member and difference between the 2
SELECT login_id, 
SUM(amount_paid/fee_amount) AS months_paid_total, 
CAST ((julianday('now') - julianday(joined_date)) / 30 AS INTEGER) AS months_member,
( SUM(amount_paid/fee_amount) -  CAST ((julianday('now') - julianday(joined_date)) / 30 AS INTEGER)) AS months_paid_in_advance
FROM ( SELECT member.login_id, member.joined_date, fees.id_fee, fee_amount, payment.id_pay, payment.amount_paid
    FROM Fees 
    JOIN Payment ON payment.id_pay = fees.id_pay
    JOIN MemberPayment ON memberpayment.id_pay = payment.id_pay
    JOIN Member ON memberpayment.login_id = member.login_id
    GROUP BY member.login_id, payment.id_pay

) GROUP BY login_id;
---------------------------------------------------------------------------------

--updates the value of fee_months_ahead in FeesInfo 
UPDATE FeesInfo
SET fee_months_ahead = 

(
    SELECT (SUM(amount_paid / fee_amount) - CAST((julianday('now') - julianday(joined_date)) / 30 AS INTEGER))
    FROM (
        SELECT member.login_id, member.id_feeinfo, member.joined_date, fees.id_fee, fee_amount, payment.id_pay, payment.amount_paid
        FROM Fees 
        JOIN Payment ON payment.id_pay = fees.id_pay
        JOIN MemberPayment ON memberpayment.id_pay = payment.id_pay
        JOIN Member ON memberpayment.login_id = member.login_id
        GROUP BY member.login_id, payment.id_pay
    ) AS subquery
    WHERE FeesInfo.id_feeinfo = subquery.id_feeinfo
    GROUP BY subquery.login_id
);

--updates the value of fee_status in FeesInfo based on fee_months_ahead
UPDATE FeesInfo
SET fee_status = CASE 
    WHEN fee_months_ahead >= 0 THEN 'paid'
    WHEN fee_months_ahead < 0 AND fee_months_ahead > -3 THEN 'behind'
    WHEN fee_months_ahead <= -3 THEN 'danger of expulsion'
    ELSE 'unknown' 
END;

--updates fee_status of member to 'social bodies' for specific login_id:
UPDATE FeesInfo SET fee_type='social bodies' 
WHERE id_feeinfo IN (
    SELECT id_feeinfo
    FROM Member
    WHERE login_id =5  --specific_login_id
);

--updates fee_status of member to 'regular' for specific login_id:
UPDATE FeesInfo SET fee_type='regular' 
WHERE id_feeinfo IN (
    SELECT id_feeinfo
    FROM Member
    WHERE login_id =5  --specific_login_id
);

--updates payment for the case of social bodies: 
--(adds 12months to fee_months_ahead)
UPDATE FeesInfo
SET fee_months_ahead = CASE 
    WHEN fee_type= 'social bodies' THEN fee_months_ahead+12 --12months for free
    ELSE fee_months_ahead --still pays
END;

--user views their payments:
SELECT member.login_id, payment.id_pay, type_payment, date_payment, amount_paid
    FROM Payment
    JOIN MemberPayment ON memberpayment.id_pay = payment.id_pay
    JOIN Member ON memberpayment.login_id = member.login_id

 WHERE member.login_id=2  --specific_login_id
 GROUP BY member.login_id, payment.date_payment; 

--user inserts a new payment:
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid) VALUES  (1, 'mbway','2023-05-06','5');
INSERT INTO MemberPayment (id_pay, login_id) VALUES (1, 2); --login_id is of the specific user


--user views their fees information (status, type and months_ahead_paid):
SELECT member.login_id, feesinfo.id_feeinfo, fee_type, fee_status, fee_months_ahead
    FROM FeesInfo
    JOIN Member ON feesinfo.id_feeinfo= member.id_feeinfo

 WHERE member.login_id=2  --specific_login_id
 GROUP BY member.login_id; 

--user views their storage:
SELECT member.login_id, storage.sid, product_type, quantity
    FROM Member
    JOIN MemberStorage ON member.login_id = memberstorage.login_id
    JOIN Storage ON memberstorage.sid = storage.sid

 WHERE member.login_id=5  --specific_login_id
 GROUP BY member.login_id, storage.sid; 

 --user inserts new storage:
 INSERT INTO Storage(sid, product_type) VALUES (1, 'kitchenware');
 INSERT INTO MemberStorage (login_id, sid, quantity) VALUES (5,  1, 1); --specific_login_id

--user views their event history, including the role:
SELECT member.login_id, memberevent.event_id, event_name, event_date, event_type, event_role
    FROM Member
    JOIN MemberEvent ON member.login_id = memberevent.login_id
    JOIN EventHistory ON memberevent.event_id = eventhistory.event_id

 WHERE member.login_id=3  --specific_login_id
 GROUP BY event_date, memberevent.event_id;

  --user inserts new event history:
INSERT INTO EventHistory(event_id, event_name, event_date, event_type) VALUES (1, 'Iberian IF', '2022', 'IF');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(2, 1, 'Organiser'); --specific_login_id


--user views their history in the association:
SELECT member.login_id, memberhistory.id_asso, role, year
    FROM Member
    JOIN MemberHistory ON member.login_id = memberhistory.login_id
    JOIN AssociationHistory ON associationhistory.id_asso = memberhistory.id_asso

 WHERE member.login_id=3  --specific_login_id
 GROUP BY year, memberhistory.id_asso;

  --user inserts new association history:
  INSERT INTO AssociationHistory (id_asso, role, year) VALUES (1, 'Member', '2021');
  INSERT INTO MemberHistory (login_id, id_asso) VALUES (2, 1); --specific_login_id
