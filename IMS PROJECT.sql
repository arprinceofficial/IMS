--------------------------------------------------: Table user_registration definition :------------------------------------------------

---------------------- 1ST CREATE TABLE START-----------------------

CREATE TABLE user_registration
(
    id           NUMBER (10) NOT NULL,
    firstname    VARCHAR2 (50),
    lastname     VARCHAR2 (50),
    username     VARCHAR2 (50),
    password     VARCHAR2 (50),
    role         VARCHAR2 (50),
    status       VARCHAR2 (50) 
);

----------------------- 1ST CREATE TABLE END ------------------------

------------------ 2ND CREATE TABLE SEQUENCE START ------------------

CREATE SEQUENCE USER_REGISTRATION_SEQ
START WITH 1 
INCREMENT BY 1
NOCACHE 
NOCYCLE;

------------------ 2ND CREATE TABLE SEQUENCE END -------------------

------------------ 3RD CREATE TABLE TRIGGER START ------------------

CREATE OR REPLACE TRIGGER USER_REGISTRATION_TRI
    BEFORE INSERT OR UPDATE
    ON USER_REGISTRATION
    FOR EACH ROW
BEGIN
    IF INSERTING
    THEN
        IF (:NEW.ID) IS NULL
        THEN
            :NEW.ID := USER_REGISTRATION_SEQ.NEXTVAL;
        END IF;
    
    END IF;
END USER_REGISTRATION_TRI;

------------------- 3RD CREATE TABLE TRIGGER END -------------------

select * from user_registration;

insert into user_registration values ('','AR','Prince','prince','1234','user', 'active');

insert into user_registration values ('', 'admin','admin','admin','admin','admin', 'active');

--------------------------------------------------: Table user_registration definition :------------------------------------------------


--------------------------------------------------------: Table UNITS definition :------------------------------------------------------

CREATE TABLE UNITS
(
    ID           NUMBER (10) NOT NULL,
    UNIT         VARCHAR2 (100)
);

-------------------------------------------------------------------SEQ--------------------------------------------------------------


CREATE SEQUENCE UNITS_SEQ
START WITH 1 
INCREMENT BY 1
NOCACHE 
NOCYCLE;

-------------------------------------------------------------------TRI--------------------------------------------------------------

CREATE OR REPLACE TRIGGER UNITS_TRI
    BEFORE INSERT OR UPDATE
    ON UNITS
    FOR EACH ROW
BEGIN
    IF INSERTING
    THEN
        IF (:NEW.ID) IS NULL
        THEN
            :NEW.ID := UNITS_SEQ.NEXTVAL;
        END IF;
    
    END IF;
END UNITS_TRI;

--------------------------------------------------------: Table UNITS definition :------------------------------------------------------


--------------------------------------------------------: Table PARTY_INFO definition :------------------------------------------------------

CREATE TABLE PARTY_INFO
(
    ID               NUMBER (10) NOT NULL PRIMARY KEY,
    firstname        VARCHAR2 (50),
    lastname         VARCHAR2 (50),
    bussiness_name   VARCHAR2 (100),
    contact          VARCHAR2 (50),
    address          VARCHAR2 (100),
    city             VARCHAR2 (50)
);

-------------------------------------------------------------------SEQ--------------------------------------------------------------


CREATE SEQUENCE PARTY_INFO_SEQ
START WITH 1 
INCREMENT BY 1
NOCACHE 
NOCYCLE;

-------------------------------------------------------------------TRI--------------------------------------------------------------

CREATE OR REPLACE TRIGGER PARTY_INFO_TRI
    BEFORE INSERT OR UPDATE
    ON PARTY_INFO
    FOR EACH ROW
BEGIN
    IF INSERTING
    THEN
        IF (:NEW.ID) IS NULL
        THEN
            :NEW.ID := PARTY_INFO_SEQ.NEXTVAL;
        END IF;
    
    END IF;
END PARTY_INFO_TRI;

--------------------------------------------------------: Table PARTY_INFO definition :------------------------------------------------------


--------------------------------------------------------: Table COMPANY_NAME definition :------------------------------------------------------

CREATE TABLE COMPANY_NAME
(
    ID               NUMBER (10) NOT NULL PRIMARY KEY,
    COMPANY_NAME     VARCHAR2 (100)
);

-------------------------------------------------------------------SEQ--------------------------------------------------------------


CREATE SEQUENCE COMPANY_NAME_SEQ
START WITH 1 
INCREMENT BY 1
NOCACHE 
NOCYCLE;

-------------------------------------------------------------------TRI--------------------------------------------------------------

CREATE OR REPLACE TRIGGER COMPANY_NAME_TRI
    BEFORE INSERT OR UPDATE
    ON COMPANY_NAME
    FOR EACH ROW
BEGIN
    IF INSERTING
    THEN
        IF (:NEW.ID) IS NULL
        THEN
            :NEW.ID := COMPANY_NAME_SEQ.NEXTVAL;
        END IF;
    
    END IF;
END COMPANY_NAME_TRI;

--------------------------------------------------------: Table COMPANY_NAME definition :------------------------------------------------------



--------------------------------------------------------: Table PRODUCTS definition :------------------------------------------------------

CREATE TABLE PRODUCTS
(
    ID               NUMBER (10) NOT NULL PRIMARY KEY,
    COMPANY_NAME     VARCHAR2 (100),
    PRODUCT_NAME     VARCHAR2 (100),
    UNIT             VARCHAR2 (10),
    PACKING_SIZE     NUMBER (10)
);

-------------------------------------------------------------------SEQ--------------------------------------------------------------


CREATE SEQUENCE PRODUCTS_SEQ
START WITH 1 
INCREMENT BY 1
NOCACHE 
NOCYCLE;

-------------------------------------------------------------------TRI--------------------------------------------------------------

CREATE OR REPLACE TRIGGER PRODUCTS_TRI
    BEFORE INSERT OR UPDATE
    ON PRODUCTS
    FOR EACH ROW
BEGIN
    IF INSERTING
    THEN
        IF (:NEW.ID) IS NULL
        THEN
            :NEW.ID := PRODUCTS_SEQ.NEXTVAL;
        END IF;
    
    END IF;
END PRODUCTS_TRI;

--------------------------------------------------------: Table PRODUCTS definition :------------------------------------------------------



SELECT * FROM PRODUCTS;

SELECT * FROM COMPANY_NAME;


TRUNCATE TABLE PRODUCTS;

ROLLBACK;


ALTER TABLE PRODUCTS
ADD CONSTRAINT PRODUCT_NAME_CONST UNIQUE (PRODUCT_NAME);



DECLARE 
vPROD_NAME VARCHAR2(200);
BEGIN
SELECT  COUNT(*)  ---INTO vPROD_NAME
FROM PRODUCTS
WHERE PRODUCT_NAME = upper('manGo');
    IF 
    vPROD_NAME > 0 THEN 
    DBMS_OUTPUT.PUT_LINE('THIS IS ALREADY BAJE');
    ELSE 
    DBMS_OUTPUT.PUT_LINE('THIS IS NOT ALREADY BAJE');
    END IF;
END;