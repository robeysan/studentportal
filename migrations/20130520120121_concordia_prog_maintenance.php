<?php

use Phinx\Migration\AbstractMigration;

class ConcordiaProgMaintenance extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->execute("
            INSERT INTO `client_programs_services` (`client_program_id`, `has_ecs`, `has_stp`, `display_name`)
            VALUES (1108, 1, 1, 'Health Care Administration (Blended)');
        ");
        $this->execute("
            INSERT INTO `client_programs_to_applications` (`client_program_id`, `application_id`)
            VALUES (1108, 1);
        ");
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute("DELETE FROM `client_programs_services` WHERE client_program_id = 1108");
        $this->execute("DELETE FROM `client_programs_to_applications` WHERE client_program_id = 1108");
    }
}
