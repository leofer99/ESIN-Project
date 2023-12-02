PRAGMA foreign_keys= ON;
.headers on
.mode columns

DELETE FROM MemberStorage;
DELETE FROM Storage;
DELETE FROM MemberFees;
DELETE FROM MemberPayment;
DELETE FROM Fees;
DELETE FROM Payment;
DELETE FROM MemberEvent;
DELETE FROM EventHistory;
DELETE FROM MemberHistory;
DELETE FROM AssociationHistory;
DELETE FROM Member;
DELETE FROM FeesInfo;
DELETE FROM Admin;
DELETE FROM NonMember;
DELETE FROM Person;

--INSERTs
INSERT INTO Person (id, name, email) VALUES  (1, 'Constança', 'constanca@gmail.com');
INSERT INTO Person (id, name, email) VALUES  (2, 'Francisco','setubal@gmail.com');
INSERT INTO Person (id, name, email) VALUES  (3, 'Isabel', 'isi@gmail.com');
INSERT INTO Person (id, name, email) VALUES  (4, 'Ana', 'ana@gmail.com');
INSERT INTO Person (id, name, email) VALUES  (5, 'Paulo', 'matos@gmail.com');
INSERT INTO Person (id, name, email) VALUES  (6, 'Maria', 'moura@gmail.com');
INSERT INTO Person (id, name, email) VALUES  (7, 'Inês', 'rodrigues@gmail.com');
INSERT INTO Person (id, name, email) VALUES  (8, 'admin', 'eyp.geral@gmail.com' );

INSERT INTO NonMember(id, interest_in_joining) VALUES (1, 'yes');
INSERT INTO Admin(id, id_admin) VALUES (1, 1);

INSERT INTO FeesInfo (id_feeinfo, fee_type, fee_status) VALUES  (2, 'social bodies','paid');
INSERT INTO FeesInfo (id_feeinfo, fee_type, fee_status)  VALUES  (3, 'social bodies','paid');
INSERT INTO FeesInfo (id_feeinfo, fee_type, fee_status)  VALUES  (4, 'social bodies','paid');
INSERT INTO FeesInfo (id_feeinfo, fee_type, fee_status)  VALUES  (5, 'regular','paid');
INSERT INTO FeesInfo (id_feeinfo, fee_type, fee_status)  VALUES  (6, 'regular','behind');
INSERT INTO FeesInfo (id_feeinfo, fee_type, fee_status)  VALUES  (7, 'regular','paid');

INSERT INTO Member (id, gender, city, joined_date, login_id, login_password, id_feeinfo)
 VALUES  (2,'male','Setúbal', '2022-01-01' , 2, 'chiquinho', 2);
INSERT INTO Member  (id, gender, city, joined_date, login_id, login_password, id_feeinfo)VALUES  (3,'female','Senhora da Hora', '2021-01-01' , 3, 'isi', 3);
INSERT INTO Member  (id, gender, city, joined_date, login_id, login_password, id_feeinfo)VALUES  (4,'female','Matosinhos', '2022-06-01' , 4, 'password', 4);
INSERT INTO Member (id, gender, city, joined_date, login_id, login_password, id_feeinfo) VALUES  (5, 'male','Santo Tirso', '2023-01-01', 5, 'password', 5);
INSERT INTO Member (id, gender, city, joined_date, login_id, login_password, id_feeinfo) VALUES  (6,'female','Matosinhos', '2022-01-07' , 6, 'password', 6);
INSERT INTO Member (id, gender, city, joined_date, login_id, login_password, id_feeinfo) VALUES  (7, 'female','Porto', '2022-01-05' , 7, 'presi', 7);

INSERT INTO EventHistory(event_id, event_name, event_date, event_type) VALUES (1, 'Iberian IF', '2022', 'IF');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type)  VALUES (2, 'Lisboa', '2022', 'NSC');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type) VALUES (3, 'Aveiro', '2022', 'RSC');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type) VALUES (4, 'Guimarães', '2022', 'RSC');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type) VALUES (5, 'Oeiras', '2023', 'RSC');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type) VALUES (6, 'Bragança', '2023', 'NSC');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type) VALUES (7, 'Coimbra', '2023', 'RSC');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type) VALUES (8, 'Setúbal', '2023', 'RSC');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type) VALUES (9, 'Braga', '2024', 'RSC');
INSERT INTO EventHistory (event_id, event_name, event_date, event_type) VALUES (10, 'Porto', '2024', 'NSC');

INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(2, 1, 'Participant');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(2, 8, 'Head-Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(3, 1, 'Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(3, 4, 'Head-Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(3, 10, 'Core-Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(4, 4, 'Head-Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(4, 10, 'Core-Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(5, 4, 'NC');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(5, 10, 'Core-Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(6, 5, 'Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(6, 6, 'Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(7, 2, 'Core-Organiser');
INSERT INTO MemberEvent(login_id, event_id, event_role) VALUES(7, 10, 'NC');

--member 2:
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid) VALUES  (1, 'mbway','2023-05-06','5');
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid) VALUES  (2, 'mbway','2023-07-06','5');
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid) VALUES  (3, 'bank transfer', '2023-09-06', '5');
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid) VALUES  (4, 'bank transfer', '2023-11-06', '5');
--member 3:
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid) VALUES  (5, 'mbway','2020-01-01','24'); --paid for 1year, fee was 2euros. 
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid)VALUES  (6, 'mbway','2021-01-01','60'); --paid for 2years
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid) VALUES  (7, 'bank transfer', '2023-05-06', '17.5'); --paid for 7months
--member 4:
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid)VALUES  (8, 'bank transfer', '2023-05-07', '5');
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid)VALUES  (9, 'bank transfer', '2023-07-07', '2.5');
--member 5, 6, 7:
INSERT INTO Payment (id_pay, type_payment, date_payment, amount_paid) VALUES  (10, 'bank transfer', '2023-11-05', '5');
--member 6:
--INSERT INTO Payment VALUES  (11, 'bank transfer', '2023-11-05', '5');
--member 7:
--INSERT INTO Payment VALUES  (12, 'bank transfer', '2023-11-05', '5');


--fee_amount has default value of 2.5euros, fee_month is not mandatory
--INSERT INTO Fees (id_fee, fee_amount, fee_month, id_pay) VALUES ...
--member 2:
INSERT INTO Fees (id_fee, id_pay) VALUES  (1, 1);
INSERT INTO Fees (id_fee, id_pay) VALUES  (2, 2);
INSERT INTO Fees (id_fee, id_pay) VALUES  (3, 3);
INSERT INTO Fees (id_fee, id_pay) VALUES  (4, 4);

--member 3:
INSERT INTO Fees (id_fee, fee_amount, id_pay) VALUES  (5, 2, 5);
INSERT INTO Fees (id_fee, id_pay) VALUES  (6, 6);
INSERT INTO Fees (id_fee, id_pay) VALUES  (7, 7);
--member 4:
INSERT INTO Fees (id_fee, id_pay) VALUES  (8, 8);
INSERT INTO Fees (id_fee, id_pay) VALUES  (9, 9);
--members 5,6,7:
INSERT INTO Fees (id_fee, id_pay) VALUES  (10, 10);
INSERT INTO Fees (id_fee, id_pay) VALUES  (11, 10);
INSERT INTO Fees (id_fee, id_pay) VALUES  (12, 10);

--member 2:
INSERT INTO MemberPayment (id_pay, login_id) VALUES (1, 2);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (2, 2);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (3, 2);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (4, 2);
--member 3:
INSERT INTO MemberPayment(id_pay, login_id) VALUES (5, 3);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (6, 3);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (7, 3);
--member 4:
INSERT INTO MemberPayment(id_pay, login_id) VALUES (8, 4);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (9, 4);
--members 5,6,7:
INSERT INTO MemberPayment(id_pay, login_id) VALUES (10, 5);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (10, 6);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (10, 7);


--Fee information of each user. There may be several per user, if there was a change in the fee_amount
INSERT INTO MemberFees(id_fee, login_id) VALUES (2, 2);
INSERT INTO MemberFees(id_fee, login_id) VALUES (3, 3); --member 3 with 2.5euros fee (current)
INSERT INTO MemberFees(id_fee, login_id) VALUES (8, 3); --member 3 when fee was 2euros
INSERT INTO MemberFees(id_fee, login_id) VALUES (4, 4);
INSERT INTO MemberFees(id_fee, login_id) VALUES (5, 5);
INSERT INTO MemberFees(id_fee, login_id) VALUES (6, 6);
INSERT INTO MemberFees(id_fee, login_id) VALUES (7, 7);

--History of each member in the Association:
INSERT INTO AssociationHistory (id_asso, role, year) VALUES (1, 'Member', '2021');
INSERT INTO AssociationHistory(id_asso, role, year) VALUES (2, 'Member', '2022');
INSERT INTO AssociationHistory(id_asso, role, year) VALUES (3, 'MAG', '2022');
INSERT INTO AssociationHistory(id_asso, role, year) VALUES (4, 'Board Member', '2022');
INSERT INTO AssociationHistory(id_asso, role, year) VALUES (5, 'CF', '2022');
INSERT INTO AssociationHistory(id_asso, role, year) VALUES (6, 'Member', '2023');
INSERT INTO AssociationHistory(id_asso, role, year) VALUES (7, 'MAG', '2023');
INSERT INTO AssociationHistory(id_asso, role, year) VALUES (8, 'Board Member', '2023');
INSERT INTO AssociationHistory(id_asso, role, year) VALUES (9, 'CF', '2023');

INSERT INTO MemberHistory (login_id, id_asso) VALUES (2, 1);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (2, 3);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (2, 4);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (3, 1);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (3, 4);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (3, 8);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (4, 1);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (4, 4);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (4, 8);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (5, 1);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (5, 4);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (5, 8);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (6, 1);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (6, 6);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (7, 1);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (7, 4);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (7, 8);

--Storage:
INSERT INTO Storage(sid, product_type) VALUES (1, 'Books about Mental Health');
INSERT INTO Storage(sid, product_type) VALUES (2, 'Flyers');
INSERT INTO Storage(sid, product_type) VALUES (3, 'Stapler');
INSERT INTO Storage(sid, product_type) VALUES (4, 'stickers');

INSERT INTO MemberStorage (login_id, sid, quantity) VALUES (5,  1, 1);
INSERT INTO MemberStorage(login_id, sid, quantity) VALUES (5, 2, 500);
INSERT INTO MemberStorage(login_id, sid, quantity) VALUES (5, 3, 2);
INSERT INTO MemberStorage(login_id, sid, quantity) VALUES (5, 4, 1000);
INSERT INTO MemberStorage(login_id, sid, quantity) VALUES (7, 2, 600);






