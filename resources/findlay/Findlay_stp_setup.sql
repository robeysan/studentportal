#Add uof portal
INSERT INTO `portals` (`portal_id`, `portal_address`, `client_entity_id`, `lms_id`, `web_server_id`, `helpdesk_user`, `helpdesk_pass`, `web_assist`, `database_name`, `database_server_id`, `active`, `portal_type_id`, `tlh_user`, `tlh_pass`, `lms_version`)
VALUES
	(NULL, 'uof.local.learninghouse.com', 10570, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '8', NULL, NULL, NULL);

#Client Application for UOF
INSERT INTO `client_applications` (`application_id`, `application_filename`, `name`, `desc`, `client_entity_id`)
VALUES
	(7, 'app_online', 'Findlay University Online Application', 'Findlay University Online Application', 10570);

#Client Programs to Services UOF
INSERT INTO `client_programs_services` (`client_program_id`, `has_ecs`, `has_stp`, `display_name`)
VALUES
	(989, 1, 1, 'Bachelor of Science in Business Management: Emergency Operations Strand');
INSERT INTO `client_programs_services` (`client_program_id`, `has_ecs`, `has_stp`, `display_name`)
VALUES
	(990, 1, 1, 'Bachelor of Science in Business Management: Environmental, Safety and Health Strand');
INSERT INTO `client_programs_services` (`client_program_id`, `has_ecs`, `has_stp`, `display_name`)
VALUES
	(991, 1, 1, 'Bachelor of Science in Business Management: Health Care Management Strand');
INSERT INTO `client_programs_services` (`client_program_id`, `has_ecs`, `has_stp`, `display_name`)
VALUES
	(1000, 1, 1, 'Bachelor of Science in Business Management: Business Management Strand');

#Client programs to applications
INSERT INTO `client_programs_to_applications` (`client_program_id`, `application_id`)
VALUES
	(989, 7);
INSERT INTO `client_programs_to_applications` (`client_program_id`, `application_id`)
VALUES
	(990, 7);
INSERT INTO `client_programs_to_applications` (`client_program_id`, `application_id`)
VALUES
	(991, 7);
INSERT INTO `client_programs_to_applications` (`client_program_id`, `application_id`)
VALUES
	(1000, 7);


