PRAGMA foreign_keys= ON;
.headers on
.mode columns

-- DROPs
--confirmar se a hierarquia está certa!
DROP TABLE IF EXISTS MemberStorage;
DROP TABLE IF EXISTS Storage;

DROP TABLE IF EXISTS MemberFees;
DROP TABLE IF EXISTS MemberPayment;

DROP TABLE IF EXISTS Fees;
DROP TABLE IF EXISTS Payment;

DROP TABLE IF EXISTS MemberEvent;
DROP TABLE IF EXISTS EventHistory;

DROP TABLE IF EXISTS MemberHistory;
DROP TABLE IF EXISTS AssociationHistory;

DROP TABLE IF EXISTS Member;
DROP TABLE IF EXISTS FeesInfo;
DROP TABLE IF EXISTS Admin;
DROP TABLE IF EXISTS NonMember;
DROP TABLE IF EXISTS Person;

--CREATE TABLEs
CREATE TABLE Person( 
    id_ INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL
   
);

CREATE TABLE FeesInfo(
    id_feeinfo INTEGER PRIMARY KEY AUTOINCREMENT,
    fee_type TEXT NOT NULL CHECK (fee_type='regular' OR fee_type='social bodies'),
    fee_status TEXT NOT NULL CHECK (fee_status='paid' OR fee_status='behind' OR fee_status='danger of expulsion'),
    fee_months_ahead INTEGER
);

CREATE TABLE Member (
    id_ INTEGER PRIMARY KEY REFERENCES Person,
    gender TEXT NOT NULL,
    city TEXT NOT NULL,
    joined_date TEXT NOT NULL,
    login_id INTEGER NOT NULL UNIQUE,
    login_password TEXT NOT NULL,
    id_feeinfo INTEGER REFERENCES FeesInfo --ON DELETE SET NULL ON UPDATE CASCADE

);

CREATE TABLE NonMember (
    id_ INTEGER PRIMARY KEY REFERENCES Person,
    interest_in_joining TEXT NOT NULL CHECK(interest_in_joining='yes')

);

CREATE TABLE Admin (
    id_ INTEGER PRIMARY KEY REFERENCES Person,
    id_admin NOT NULL UNIQUE
   
);

CREATE TABLE EventHistory(
    event_id INTEGER PRIMARY KEY AUTOINCREMENT,
    event_name TEXT NOT NULL,
    event_date TEXT NOT NULL,
    event_type TEXT NOT NULL
);

CREATE TABLE MemberEvent(
    --id_memberevent AUTO_INCREMENT, PRIMARY KEY (id_memberevent),
    login_id INTEGER REFERENCES Member, 
    event_id INTEGER REFERENCES EventHistory, 
    event_role TEXT NOT NULL
    
);

CREATE TABLE Payment(
   id_pay INTEGER PRIMARY KEY, 
   type_payment TEXT NOT NULL 
   CHECK(type_payment='mbway' OR type_payment='bank transfer'), 
   date_payment TEXT NOT NULL, 
   amount_paid DOUBLE NOT NULL -- CHECK(amount_paid%fee_amount = 0 )
	
);

CREATE TABLE Fees(
    id_fee INTEGER PRIMARY KEY,
    fee_amount INTEGER NOT NULL DEFAULT 2.5,
    --fee_month INTEGER,  --months ahead they have paid for
    id_pay INTEGER REFERENCES Payment
);

CREATE TABLE MemberFees(
    id_fee INTEGER REFERENCES Fees,
    login_id INTEGER REFERENCES Member
   
);

CREATE TABLE MemberPayment(
    id_pay INTEGER REFERENCES Payment,
    login_id INTEGER REFERENCES Member
   
);

CREATE TABLE AssociationHistory(
    id_asso INTEGER PRIMARY KEY,
    role_asso TEXT NOT NULL,
    year_asso TEXT NOT NULL --ou text?
   
);

CREATE TABLE MemberHistory(
    login_id INTEGER REFERENCES Member,
    id_asso INTEGER REFERENCES AssociationHistory
   
);

CREATE TABLE Storage(
    sid INTEGER PRIMARY KEY,
    product_type TEXT NOT NULL

);

CREATE TABLE MemberStorage(
    login_id INTEGER REFERENCES Member,
    sid INTEGER REFERENCES Storage,
    quantity INTEGER NOT NULL

);

