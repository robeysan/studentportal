INSERT INTO client_programs_to_applications VALUES (982,7);

INSERT INTO client_applications VALUES (7,'app_online','TUC Application','TUC Application',11343);

INSERT INTO client_programs_services VALUES (982,1,1,'TEST TUC MA MEDIA COMMUNICATON');

INSERT INTO `portals` (`portal_id`, `portal_address`, `client_entity_id`, `lms_id`, `web_server_id`, `helpdesk_user`, `helpdesk_pass`, `web_assist`, `database_name`, `database_server_id`, `active`, `portal_type_id`, `tlh_user`, `tlh_pass`, `lms_version`)
VALUES
	(NULL, 'tuc.local.learninghouse.com', 11343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '8', NULL, NULL, NULL);