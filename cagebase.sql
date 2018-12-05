CREATE TABLE people
( pID INT, 
firstName VARCHAR(40) NOT NULL,
lastName VARCHAR(30) NOT NULL,
birthDate DATE NOT NULL,
deathDate DATE,
PRIMARY KEY (pID)
);

CREATE TABLE films
( fID INT,
name VARCHAR(90) NOT NULL,
releaseDate DATE,
budget DECIMAL(19,4),
PRIMARY KEY (fID)
);

CREATE TABLE TVSeries
( tID INT,
name VARCHAR(90) NOT NULL,
episodes INT,
releaseDate DATE,
budget DECIMAL(19,4),
PRIMARY KEY (tID)
);

CREATE TABLE stagePlays
( sID INT,
name VARCHAR(90) NOT NULL,
releaseDate DATE,
budget DECIMAL(19,4),
PRIMARY KEY (sID)
);

CREATE TABLE pseudonyms
( pID INT,
name VARCHAR(90) NOT NULL,
PRIMARY KEY( pID, name),
FOREIGN KEY (pID) REFERENCES people(pID)
ON DELETE CASCADE
);

CREATE TABLE filmStaff
( pID INT,
fID INT,
role VARCHAR(90),
PRIMARY KEY( pID, fID, role),
FOREIGN KEY (pID) REFERENCES people(pID)
ON DELETE CASCADE,
FOREIGN KEY (fID) REFERENCES films(fID)
ON DELETE CASCADE
);

CREATE TABLE TVStaff
( pID INT,
tID INT,
role VARCHAR(90),
PRIMARY KEY( pID, tID, role),
FOREIGN KEY (pID) REFERENCES people(pID)
ON DELETE CASCADE,
FOREIGN KEY (tID) REFERENCES TVSeries(tID)
ON DELETE CASCADE
);

CREATE TABLE stagePlayStaff
( pID INT,
sID INT,
role VARCHAR(90),
PRIMARY KEY( pID, sID, role),
FOREIGN KEY (pID) REFERENCES people(pID)
ON DELETE CASCADE,
FOREIGN KEY (sID) REFERENCES stagePlays(sID)
ON DELETE CASCADE
);


--PEOPLE insertions
INSERT INTO people
VALUES (1, 'Nicolas', 'Cage', '07-JAN-1964', NULL);

INSERT INTO people
VALUES (2, 'Amy', 'Heckerling', '07-MAY-1954', NULL);

INSERT INTO people
VALUES (3, 'Martha', 'Coolidge', '17-AUG-1946', NULL);

--FILMS insertions
INSERT INTO films
VALUES (1, 'Fast Times at Ridgemont High', '13-AUG-1982', 5000000.00);

INSERT INTO films
VALUES (2, 'Valley Girl', '29-APR-1983', 350000.00);

--TV insertions
INSERT INTO TVSeries
VALUES (1, 'The Best of Times', 1, '13-JULY-1981', NULL);

--PLAYS insertions
INSERT INTO stagePlays
VALUES (1, 'Industrial Symphony No. 1: The Dream of the Broken Hearted', '10-NOV-89', NULL);

--PSEUDONYMS insertions
INSERT INTO pseudonyms
VALUES (1, 'Nicolas Kim Coppola');

INSERT INTO pseudonyms
VALUES (1, 'Nicolas Coppola');

--FILM STAFF insertions
INSERT INTO filmStaff
VALUES (1,1, '"Brads Bud"');

INSERT INTO filmStaff
VALUES (2,1, 'Director');

INSERT INTO filmStaff
VALUES (1,2, '"Randy"');

INSERT INTO filmStaff
VALUES (3,2, 'Director');

--TV STAFF insertions
INSERT INTO TVStaff
VALUES(1, 1, 'Nicholas');

--PLAY STAFF insertions
INSERT INTO stagePlayStaff
VALUES(1,1, 'Heartbreaker');