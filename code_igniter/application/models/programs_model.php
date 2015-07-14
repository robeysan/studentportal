<?php

class Programs_model extends CI_Model {
	
    function __construct(){
        $this->grail=$this->load->database('grail', true);
	}

    /**
     * various functions to get config values
     *
     * returns boolean for config values
     */ 
    function has_ecs($program_id) {
        return $this->get_config_value('has_ecs', $program_id);
    }

    function has_app($program_id) {
        return $this->get_config_value('has_app', $program_id);
    }

    function has_stp($program_id) {
        return $this->get_config_value('has_stp', $program_id);
    }

    /**
     * get_application_view()
     *
     * returns filename associated with application by
     * program id
     */ 
    function get_application_view($program_id) {
        $this->grail->select('application_filename');
        $this->grail->join('client_programs_to_applications', 
            'client_programs_to_applications.application_id = client_applications.application_id');
        $this->grail->where('client_program_id', $program_id);
        $this->grail->from('client_applications'); 
        $application_filename = $this->value_or_false($this->grail->get(), 'application_filename');

        return $application_filename;
    }

    function get_locations($entity_id) {
        // Takes in entity_id, returns an array with all school locations and programs mapping
        return $this->grail->query("
            SELECT * FROM stp_locations INNER JOIN stp_programs_to_locations USING (location_id) WHERE entity_id = ?
        ", array((int) $entity_id))->result_array(); 
    }

    function getEntityFromProgram($client_program_id = false) {
        if (!$client_program_id) return false;
        return (int) $this->grail->query("
		SELECT client_entity_id 
		FROM client_programs 
		WHERE client_program_id = ?
	", array($client_program_id))->row()->client_entity_id;
    }

    /**
     * get_programs()
     *
     * returns array of data from client_programs
     * by $client_entity_id where an entry exists
     * in client_programs_portal_config
     *
     */ 
    function get_programs($client_entity_id) {
        $this->grail->join('client_programs_services',
           'client_programs_services.client_program_id = client_programs.client_program_id');
        $this->grail->where('client_entity_id', $client_entity_id);
        $this->grail->from('client_programs');
        return $this->value_or_false($this->grail->get());

    }

    function get_stp_programs($entity_id, $classification) {
        return $this->grail->query("
		SELECT * FROM stp_programs WHERE entity_id = ? AND classification = ?
	", array($entity_id, $classification))->result_array();
    }

    function get_stp_partners($entity_id, $student_type = false) {
        // Take in entity_id, return partners list
        if ($student_type == 'ND') $result = $this->grail->query("
            SELECT name FROM stp_partners WHERE entity_id = ?
        ", array($entity_id))->result_array();
        else $result = $this->grail->query("
            SELECT name FROM stp_partners WHERE entity_id = ? AND (student_type != 'ND' OR student_type IS NULL)
        ", array($entity_id))->result_array();
        if (!count($result)) return false;
		foreach ($result as $r) {
            $output[] = $r['name'];
        }
        return $output;
    }

    function get_entity_id_for_current_site() {
        return (int) $this->grail->query("
            SELECT client_entity_id FROM portals WHERE abbrev = ? 
        ", array(SITE))->row()->client_entity_id;
    }

    function get_resource($resource) {
        // Takes in resource name, returns array of data requested.
        // Resource tables are named in the format stp_SITE_RESOURCENAME
        return $this->grail->query("SELECT * FROM stp_".SITE."_".$resource)->result_array();
    }

    function get_elp_programs($entity_id) {
        // Take in GRAIL entity ID, return all ELP programs for that school
        return $this->grail->query("
            SELECT * FROM stp_elp_programs WHERE entity_id = ?
        ", array($entity_id))->result_array();
    }

    function get_preferred_major($program) {
        // Take in GRAIL program id, return preferred major code
        return $this->grail->query("SELECT preferred_major FROM stp_programs WHERE program_id = ?", array($program))->row()->preferred_major;
    }

    private function get_config_value($key, $program_id) {
        $this->grail->select($key);
        $this->grail->where('client_program_id', $program_id);
        $this->grail->from('client_programs_services');
        return $this->value_or_false($this->grail->get(), $key);
    }

    function get_program_name($program_id, $use_client_programs = false) {
        if ($use_client_programs) {
            // Use client_programs
            $this->grail->select('program_name');
            $this->grail->where('client_program_id', $program_id);
            $this->grail->from('client_programs');
        } else { 
            // Use client_programs_services
            $this->grail->select('display_name');
            $this->grail->where('client_program_id', $program_id);
            $this->grail->from('client_programs_services');
        }
        return $this->value_or_false($this->grail->get(), 'display_name');
    }

    private function value_or_false($query, $key = '') {
        if($query->num_rows > 0) {
            $result = $query->row_array();
            if($key == '') {
                return $result;
            }
            return $result[$key];
        }
        return false;
    }
}	
