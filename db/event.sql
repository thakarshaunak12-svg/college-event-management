CREATE DATABASE event;
USE event;

USE event;

-- =========================
-- STUDENT TABLE
-- =========================
CREATE TABLE student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    enroll_no VARCHAR(50) UNIQUE,
    dept VARCHAR(50),
    year INT,
    sem INT,
    contact VARCHAR(15),
    gender VARCHAR(10),
    email VARCHAR(100),
    password VARCHAR(255),
    is_coordinator BOOLEAN DEFAULT FALSE
);

-- =========================
-- FACULTY TABLE
-- =========================
CREATE TABLE faculty (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    dept VARCHAR(50),
    contact VARCHAR(15),
    email VARCHAR(100),
    password VARCHAR(255)
);

-- =========================
-- EVENTS TABLE
-- =========================
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50),
    event_name VARCHAR(100),
    description TEXT,
    location VARCHAR(150),
    prize VARCHAR(50),
    faculty_coordinator VARCHAR(100),
    student_coordinator VARCHAR(100),
    student_contact VARCHAR(20),
    date DATE
);

-- =========================
-- REGISTRATIONS TABLE (UPDATED)
-- =========================
CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    student_name VARCHAR(100),
    enroll_no VARCHAR(50),
    contact VARCHAR(15),
    event_id INT,
    event_name VARCHAR(100),
    FOREIGN KEY (student_id) REFERENCES student(id),
    FOREIGN KEY (event_id) REFERENCES events(id),
    UNIQUE(student_id, event_id)
);

-- =========================
-- FACULTY INSERT (UNCHANGED)
-- =========================

INSERT INTO faculty VALUES
-- COMPUTER (07)
(NULL,'Prof. PSN','Computer','9999911100','psncoed@gdec.in','PSN07'),
(NULL,'Prof. HMP','Computer','9999911101','hmpcoed@gdec.in','HMP07'),
(NULL,'Prof. AMN','Computer','9999911102','amncoed@gdec.in','AMN07'),
(NULL,'Prof. MAM','Computer','9999911103','mamcoed@gdec.in','MAM07'),
(NULL,'Prof. VIP','Computer','9999911104','vipcoed@gdec.in','VIP07'),
(NULL,'Prof. BUP','Computer','9999911105','bupcoed@gdec.in','BUP07'),
(NULL,'Prof. KSP','Computer','9999911106','kspcoed@gdec.in','KSP07'),
(NULL,'Prof. BHP','Computer','9999911107','bhpcoed@gdec.in','BHP07'),
(NULL,'Prof. AHP','Computer','9999911108','ahpcoed@gdec.in','AHP07'),
(NULL,'Prof. BAP','Computer','9999911109','bapcoed@gdec.in','BAP07'),

-- ASH (10)
(NULL,'Prof. IVP','ASH','9999922100','ivpaed@gdec.in','IVP10'),
(NULL,'Prof. SSP','ASH','9999922101','sspash@gdec.in','SSP10'),
(NULL,'Prof. MKT','ASH','9999922102','mktash@gdec.in','MKT10'),
(NULL,'Prof. TPN','ASH','9999922103','tpnash@gdec.in','TPN10'),
(NULL,'Prof. DCP','ASH','9999922104','dcash@gdec.in','DCP10'),

-- ELECTRICAL (21)
(NULL,'Prof. DHP','Electrical','9999933100','dhpeled@gdec.in','DHP21'),
(NULL,'Prof. RJB','Electrical','9999933101','rjbeled@gdec.in','RJB21'),
(NULL,'Prof. KDM','Electrical','9999933102','kdmeled@gdec.in','KDM21'),

-- MECHANICAL (19)
(NULL,'Prof. BAG','Mechanical','9999944100','baged@gdec.in','BAG19'),
(NULL,'Prof. DTP','Mechanical','9999944101','dtped@gdec.in','DTP19'),
(NULL,'Prof. KAH','Mechanical','9999944102','kahed@gdec.in','KAH19'),
(NULL,'Prof. AHJ','Mechanical','9999944103','ahjed@gdec.in','AHJ19'),
(NULL,'Prof. MAV','Mechanical','9999944104','maved@gdec.in','MAV19'),
(NULL,'Prof. SRK','Mechanical','9999944105','srked@gdec.in','SRK19'),

-- AUTOMOBILE (01)
(NULL,'Prof. MGW','Automobile','9999955100','mgwed@gdec.in','MGW01'),
(NULL,'Prof. HHP','Automobile','9999955101','hhped@gdec.in','HHP01'),
(NULL,'Prof. SMG','Automobile','9999955102','smged@gdec.in','SMG01'),

-- CIVIL (06)
(NULL,'Prof. NVP','Civil','9999966100','nvped@gdec.in','NVP06'),
(NULL,'Prof. HMV','Civil','9999966101','hmved@gdec.in','HMV06'),
(NULL,'Prof. KAV','Civil','9999966102','kaved@gdec.in','KAV06');

-- =========================
-- EVENTS (UNCHANGED)
-- =========================

INSERT INTO events VALUES
(NULL,'Fun','Snake & Ladder','Classic dice board game','Beside StairCase','20','Prof. PSN','Shaunak','9876543210',NULL),
(NULL,'Fun','Live Ludo','Real life Ludo game','Electrical GF','20','Prof. HMP','Darshi','9876543211',NULL),
(NULL,'Fun','Treasure Hunt','Clue solving adventure','Outside Admin Office','50','Prof. AMN','Trusha','9876543212',NULL),
(NULL,'Fun','Twister','Balance challenge game','Computer GF','Free','Prof. MAM','Riya','9876543213',NULL),
(NULL,'Fun','Squid Game','Survival mini games','Outside Computer Dept','100','Prof. VIP','Tejash','9876543214',NULL),
(NULL,'Fun','Passing Parcel','Music passing game','Outside Automobile','20','Prof. BUP','Rudra','9876543215',NULL),
(NULL,'Fun','Walk With Music','Freeze when music stops','Civil Dept','20','Prof. KSP','Sujash','9876543216',NULL),
(NULL,'Fun','Live Wire','Avoid wire obstacle','Electrical Dept','100','Prof. BHP','Parth','9876543217',NULL),

(NULL,'Technical','Group Discussion','Communication skills','Seminar Hall','Free','Prof. IVP',NULL,NULL,NULL),
(NULL,'Technical','Technical Quiz','Knowledge test','Room 101','Free','Prof. SSP',NULL,NULL,NULL),
(NULL,'Technical','Robo Race','Robot competition','Ground','Free','Prof. MKT',NULL,NULL,NULL),
(NULL,'Technical','CAD Mania','Design competition','Lab 2','Free','Prof. TPN',NULL,NULL,NULL),
(NULL,'Technical','Electro Fusion','Circuit challenge','Lab','Free','Prof. DCP',NULL,NULL,NULL),
(NULL,'Technical','Decode Industry','Problem solving','Hall','Free','Prof. DHP',NULL,NULL,NULL),
(NULL,'Technical','Aptitude Test','Logical reasoning','Room 105','Free','Prof. RJB',NULL,NULL,NULL),
(NULL,'Technical','Sherlock','Mystery solving','Seminar Hall','Free','Prof. KDM',NULL,NULL,NULL),
(NULL,'Technical','Robo Football','Robot football','Ground','Free','Prof. BAG',NULL,NULL,NULL),
(NULL,'Technical','Overhauling','Machine assembly','Workshop','Free','Prof. DTP',NULL,NULL,NULL),
(NULL,'Technical','Innovative Prototype','Project showcase','Lab','Free','Prof. KAH',NULL,NULL,NULL),

(NULL,'Cultural','Dance','Dance competition','Auditorium','Free','Prof. AHJ',NULL,NULL,NULL),
(NULL,'Cultural','Drama','Stage performance','Hall','Free','Prof. MAV',NULL,NULL,NULL),
(NULL,'Cultural','Singing','Music event','Auditorium','Free','Prof. SRK',NULL,NULL,NULL),
(NULL,'Cultural','Drawing','Women empowerment art','Art Room','Free','Prof. MGW',NULL,NULL,NULL),
(NULL,'Cultural','Rangoli','Nation theme art','Ground','Free','Prof. HHP',NULL,NULL,NULL),

(NULL,'Sports','Football','Team sport','Ground','Free','Prof. SMG','YASH','9876500001',NULL),
(NULL,'Sports','Volleyball','Net game','Court','Free','Prof. AMN','PARIN','9876500002',NULL),
(NULL,'Sports','Kabaddi','Traditional sport','Ground','Free','Prof. MAM','URJA','9876500003',NULL),
(NULL,'Sports','Chess','Strategy game','Room 12','Free','Prof. VIP','KHYATI','9876500004',NULL),
(NULL,'Sports','Cricket','Bat ball game','Ground','Free','Prof. PSN','DIYA','9876500005',NULL),
(NULL,'Sports','Badminton','Racket sport','Court','Free','Prof. BUP','KIRTAN','9876500006',NULL),
(NULL,'Sports','Carrom','Board game','Room','Free','Prof. KSP','ANSH','9876500007',NULL),
(NULL,'Sports','Table Tennis','Fast game','Room 2','Free','Prof. BAP','JEEL','9876500008',NULL),
(NULL,'Sports','Kho-Kho','Chasing game','Ground','Free','Prof. IVP','HARSHIL','9876500009',NULL),
(NULL,'Sports','Tug of War','Strength game','Ground','Free','Prof. SSP','TEJASH','9876510010',NULL);