-- fix institution and system name
UPDATE
	submissions
SET
  information_institution = 'Olympus Lab’, 
  information_system = 'OceanStor Pacific'
WHERE
	id = 543;
    
-- remove duplicated record from 10 node list and IO500 list
DELETE FROM list_sc21_io500 WHERE submission_id = 543;
DELETE FROM list_sc21_10node WHERE submission_id = 543;
