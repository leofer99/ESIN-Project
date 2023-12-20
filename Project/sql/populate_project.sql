PRAGMA foreign_keys= ON;
.headers on
.mode columns


DELETE FROM MemberStorage;
DELETE FROM Storage;
DELETE FROM MemberPayment;
DELETE FROM MemberFees;
DELETE FROM Fees;
DELETE FROM Payment;
DELETE FROM MemberEvent;
DELETE FROM EventHistory;
DELETE FROM MemberHistory;
DELETE FROM AssociationHistory;
DELETE FROM Member;
DELETE FROM Admin;
--DELETE FROM NonMember;
DELETE FROM Person;

--INSERTs
INSERT INTO Person (id_, name, email, phone_number) VALUES  (1, 'Constança', 'constanca@gmail.com', '911111111');
INSERT INTO Person (id_, name, email, phone_number) VALUES  (2, 'Francisco','setubal@gmail.com', '921111111');
INSERT INTO Person (id_, name, email, phone_number) VALUES  (3, 'Isabel', 'isi@gmail.com', '931111111');
INSERT INTO Person (id_, name, email, phone_number) VALUES  (4, 'Ana', 'ana@gmail.com', '941111111');
INSERT INTO Person (id_, name, email, phone_number) VALUES  (5, 'Paulo', 'matos@gmail.com', '951111111');
INSERT INTO Person (id_, name, email, phone_number) VALUES  (6, 'Maria', 'moura@gmail.com', '961111111');
INSERT INTO Person (id_, name, email, phone_number) VALUES  (7, 'Inês', 'rodrigues@gmail.com', '971111111');
INSERT INTO Person (id_, name, email, phone_number) VALUES  (8, 'admin', 'eyp.geral@gmail.com', '-');

--INSERT INTO NonMember(id_, interest_in_joining) VALUES (1, 'yes');
--INSERT INTO Admin(id_, id_admin) VALUES (8, 1); --?

INSERT INTO Member (id_, gender, city, joined_date, login_id, login_password) VALUES  (2,'male','Setúbal', '2022-01-01' , 2, 'chiquinho');
INSERT INTO Member (id_, gender, city, joined_date, login_id, login_password)VALUES  (3,'female','São Mamede', '2019-01-01' , 3, 'isi');
INSERT INTO Member (id_, gender, city, joined_date, login_id, login_password) VALUES  (4,'female','Matosinhos', '2022-06-01' , 4, 'passwordana');
INSERT INTO Member (id_, gender, city, joined_date, login_id, login_password) VALUES  (5, 'male','Santo Tirso', '2023-01-01', 5, 'passwordpaulo');
INSERT INTO Member (id_, gender, city, joined_date, login_id, login_password) VALUES  (6,'female','Matosinhos', '2022-01-07' , 6, 'passwordmoura');
INSERT INTO Member (id_, gender, city, joined_date, login_id, login_password) VALUES  (7, 'female','Porto', '2022-01-05' , 7, 'presi');
INSERT INTO Member (id_, gender, city, joined_date, login_id, login_password) VALUES  (8, 'female','-', '-' , 8, 'admin');

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
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('mbway','2023-05-06','5');
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('mbway','2023-07-06','5');
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('bank transfer', '2023-09-06', '5');
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('bank transfer', '2023-11-06', '5');
--member 3:
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('mbway','2019-01-01','24'); --2019: paid for 1year, fee was 2euros. 
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('mbway','2020-01-01','10'); --2020: paid for 5months
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('mbway','2020-05-28','14'); --2020: paid for 7months
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('bank transfer', '2023-05-06', '17.5'); --2021: paid for 16months
 --2022 and  2023: was a social body, still has 4 months ahead paid

--member 4:
INSERT INTO Payment (type_payment, date_payment, amount_paid)VALUES  ('bank transfer', '2023-05-07', '5');
INSERT INTO Payment (type_payment, date_payment, amount_paid)VALUES  ('bank transfer', '2023-07-07', '2.5');
--member 5:
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('bank transfer', '2023-11-05', '5');
--member 6:
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('bank transfer', '2023-11-05', '10');
--member 7:
INSERT INTO Payment (type_payment, date_payment, amount_paid) VALUES  ('bank transfer', '2023-11-05', '15');


--fee_amount has default value of 2.5euros
INSERT INTO Fees (id_fee, fee_amount, fee_year) VALUES  (1, 2, 2019);
INSERT INTO Fees (id_fee, fee_amount, fee_year) VALUES  (2, 2, 2020);
INSERT INTO Fees (id_fee, fee_amount, fee_year) VALUES  (3, 2.5, 2021);
INSERT INTO Fees (id_fee, fee_amount, fee_year) VALUES  (4, 2.5, 2022);
INSERT INTO Fees (id_fee, fee_amount, fee_year) VALUES  (5, 2.5, 2023);
INSERT INTO Fees (id_fee, fee_amount, fee_year) VALUES  (6, 2.5, 2024);

INSERT INTO MemberFees(login_id, id_fee) VALUES (2, 1);
INSERT INTO MemberFees(login_id, id_fee) VALUES (2, 2);
INSERT INTO MemberFees(login_id, id_fee) VALUES (2, 3);
INSERT INTO MemberFees(login_id, id_fee) VALUES (2, 4);
INSERT INTO MemberFees(login_id, id_fee) VALUES (2, 5);
INSERT INTO MemberFees(login_id, id_fee) VALUES (3, 1);
INSERT INTO MemberFees(login_id, id_fee) VALUES (3, 2);
INSERT INTO MemberFees(login_id, id_fee) VALUES (3, 3);
INSERT INTO MemberFees(login_id, id_fee) VALUES (3, 4);
INSERT INTO MemberFees(login_id, id_fee) VALUES (3, 5);
INSERT INTO MemberFees(login_id, id_fee) VALUES (4, 1);
INSERT INTO MemberFees(login_id, id_fee) VALUES (4, 2);
INSERT INTO MemberFees(login_id, id_fee) VALUES (4, 3);
INSERT INTO MemberFees(login_id, id_fee) VALUES (4, 4);
INSERT INTO MemberFees(login_id, id_fee) VALUES (4, 5);
INSERT INTO MemberFees(login_id, id_fee) VALUES (5, 1);
INSERT INTO MemberFees(login_id, id_fee) VALUES (5, 2);
INSERT INTO MemberFees(login_id, id_fee) VALUES (5, 3);
INSERT INTO MemberFees(login_id, id_fee) VALUES (5, 4);
INSERT INTO MemberFees(login_id, id_fee) VALUES (5, 5);
INSERT INTO MemberFees(login_id, id_fee) VALUES (6, 1);
INSERT INTO MemberFees(login_id, id_fee) VALUES (6, 2);
INSERT INTO MemberFees(login_id, id_fee) VALUES (6, 3);
INSERT INTO MemberFees(login_id, id_fee) VALUES (6, 4);
INSERT INTO MemberFees(login_id, id_fee) VALUES (6, 5);
INSERT INTO MemberFees(login_id, id_fee) VALUES (7, 1);
INSERT INTO MemberFees(login_id, id_fee) VALUES (7, 2);
INSERT INTO MemberFees(login_id, id_fee) VALUES (7, 3);
INSERT INTO MemberFees(login_id, id_fee) VALUES (7, 4);
INSERT INTO MemberFees(login_id, id_fee) VALUES (7, 5);


--MemberPayment
--member 2:
INSERT INTO MemberPayment (id_pay, login_id) VALUES (1, 2);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (2, 2);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (3, 2);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (4, 2);
--member 3:
INSERT INTO MemberPayment(id_pay, login_id) VALUES (5, 3);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (6, 3);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (7, 3);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (8, 3);
--member 4:
INSERT INTO MemberPayment(id_pay, login_id) VALUES (9, 4);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (10, 4);
--members 5,6,7:
INSERT INTO MemberPayment(id_pay, login_id) VALUES (11, 5);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (12, 6);
INSERT INTO MemberPayment(id_pay, login_id) VALUES (13, 7);



--History of each member in the Association:
--Member 2:
INSERT INTO AssociationHistory (role_asso, role_date_begin, role_date_end) VALUES ('Member', '2021-09-10', '2022-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Member', '2022-09-10', '2023-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2023-09-10', '2024-09-10');
--Member 3:
INSERT INTO AssociationHistory (role_asso, role_date_begin, role_date_end) VALUES ('Member', '2020-09-10', '2021-09-10');
INSERT INTO AssociationHistory (role_asso, role_date_begin, role_date_end) VALUES ('Member', '2021-09-10', '2022-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2022-09-10', '2023-07-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2023-09-10', '2024-09-10');
--Member 4:
INSERT INTO AssociationHistory (role_asso, role_date_begin, role_date_end) VALUES ('Member', '2021-09-10', '2022-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2022-09-10', '2023-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2023-09-10', '2024-09-10');
--Member 5:
INSERT INTO AssociationHistory (role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2021-09-10', '2022-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2022-09-10', '2023-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2023-09-10', '2024-09-10');
--Member 6:
INSERT INTO AssociationHistory (role_asso, role_date_begin, role_date_end) VALUES ('MAG', '2021-09-10', '2022-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('MAG', '2022-09-10', '2023-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('CF', '2023-09-10', '2024-09-10');
--Member 7:
INSERT INTO AssociationHistory (role_asso, role_date_begin, role_date_end) VALUES ('Member', '2021-09-10', '2022-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ('Board Member', '2022-09-10', '2023-09-10');
INSERT INTO AssociationHistory(role_asso, role_date_begin, role_date_end) VALUES ( 'Board Member', '2023-09-10', '2024-09-10');


INSERT INTO MemberHistory (login_id, id_asso) VALUES (2, 1);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (2, 2);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (2, 3);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (3, 4);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (3, 5);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (3, 6);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (4, 7);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (4, 8);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (4, 9);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (5, 10);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (5, 11);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (5, 12);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (6, 13);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (6, 14);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (6, 15);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (7, 16);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (7, 17);
INSERT INTO MemberHistory (login_id, id_asso)  VALUES (7, 18);

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

