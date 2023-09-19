SET AUTOCOMMIT = 0;
START TRANSACTION;

DELETE FROM list_isc23_production WHERE submission_id = 603;

DELETE FROM list_isc23_production WHERE submission_id = 600;
INSERT INTO list_isc23_io500 (listing_id, submission_id, score) VALUES (77, 600, 372.2569885253906);

DELETE FROM list_isc23_10node_production WHERE submission_id = 616;
INSERT INTO list_isc23_10node (listing_id, submission_id, score) VALUES (75, 616, 325.23199462890625);

COMMIT;
