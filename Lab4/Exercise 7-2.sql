SELECT team, G, AB FROM teamstats;
SELECT team, G, AB FROM teamstats ORDER BY team;
SELECT team, G, AB FROM teamstats ORDER BY team DESC;
SELECT team, HR FROM teamstats ORDER BY HR LIMIT 1;
SELECT team, HR FROM teamstats ORDER BY HR DESC LIMIT 1;
SELECT SUM(G)/2 FROM teamstats;
SELECT AVG(AVG) FROM teamstats;
SELECT SUM(AVG*AB)/SUM(AB) FROM teamstats;