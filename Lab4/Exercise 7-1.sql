CREATE DATABASE baseball_stats;
USE baseball_stats;
SELECT DATABASE();
CREATE TABLE teamstats (Team VARCHAR(50), FirstYear INT,
G INT, W INT, L INT, Pennants INT, WS INT,
R INT, AB INT, H INT, HR INT, AVG FLOAT,
RA INT, ERA FLOAT);
DESCRIBE teamstats;
LOAD DATA INFILE 'team_stats_fixed.txt'
INTO TABLE teamstats;
SELECT * FROM teamstats;