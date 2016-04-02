-- Get rid of any old data by resetting the table
DROP TABLE IF EXISTS Employee;
DROP TABLE IF EXISTS Employer;
DROP TABLE IF EXISTS Jobs;
DROP TABLE IF EXISTS Hours;

CREATE TABLE Employee (
  EmployeeID int unsigned NOT NULL AUTO_INCREMENT,
  name int NOT NULL,
  Phone Number varchar(128) DEFAULT NULL,
  Address varchar(18) NOT NULL,
  PRIMARY KEY (EmployeeID)
  FOREIGN KEY (JobID) REFERENCES Jobs(JobID),
) ENGINE=InnoDB;

CREATE TABLE Employer (
  EmployerID int unsigned NOT NULL AUTO_INCREMENT,
  Address VARCHAR (40) 
  PRIMARY KEY (EmployerID)
)

CREATE TABLE Jobs (
  JobID int unsigned NOT NULL AUTO_INCREMENT,
  Work Address VARCHAR (40), 
  PRIMARY KEY (JobID),
  FOREIGN KEY (EmployerID) REFERENCES Employer(EmployerID),
  FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID),
) 

CREATE TABLE Hours (
  HoursID int unsigned NOT NULL,
  Date VARCHAR (40),
  Work Address VARCHAR (40), 
  Hours Worked int (3),
  WagesEarned int (6),
  PRIMARY KEY (HoursID),
  FOREIGN KEY (JobID) REFERENCES Jobs(JobID),
) 