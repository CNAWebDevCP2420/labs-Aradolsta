CREATE DATABASE demographics;
USE demographics;
SELECT DATABASE();
CREATE TABLE countries (Country VARCHAR(30), 
PrimaryLanguage VARCHAR(20), Population INT);
DESCRIBE countries;
INSERT INTO countries (Country, PrimaryLanguage, Population)
VALUES('Canada', 'English', 37602103), ('Germany', 'German', 83019200), 
('Greenland', 'Greenlandic', 55877), ('Norway', 'Norwegian', 5328212), 
('Brazil', 'Portuguese', 210147125), ('Portugal', 'Portuguese', 10276617), 
('Australia', 'English', 25520300), ('China', 'Standard Chinese', 1427647786), 
('Poland', 'Polish', 38386000), ('Japan', 'Japanese', 126317000);
SELECT * FROM countries;

SELECT * FROM countries ORDER BY Country;
SELECT * FROM countries ORDER BY Population DESC;
SELECT * FROM countries ORDER BY Population;
SELECT * FROM countries WHERE PrimaryLanguage = 'English';