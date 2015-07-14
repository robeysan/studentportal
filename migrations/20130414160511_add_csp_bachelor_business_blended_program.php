<?php

use Phinx\Migration\AbstractMigration;

class AddCspBachelorBusinessBlendedProgram extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->execute("INSERT INTO client_programs_services (`client_program_id`, `has_ecs`, `has_stp`, `display_name`)
            VALUES ('1107', '1', '1', 'Bachelor of Arts in Business (Blended)')"
        );    
        $this->execute("INSERT INTO client_programs_to_applications (`client_program_id`, `application_id`)
            VALUES ('1107', '1')"
        );    
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute("DELETE FROM client_programs_services WHERE client_program_id = '1107'");    
        $this->execute("DELETE FROM client_programs_to_applications WHERE client_program_id = '1107'");    
    }
}
