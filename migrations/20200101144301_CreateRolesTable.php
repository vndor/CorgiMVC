<?php

class CreateRolesTable extends Ruckusing_Migration_Base
{
    public function up()
    {
        $t = $this->create_table("roles", array("id" => false));
        $t->column("id", "integer", array("primary_key"      => true, 
                                               "auto_increment"   => true, 
                                               "unsigned"         => true, 
                                               "null"             => false));
        $t->column("name", "string");
        $t->finish();

        // Seed demo roles

        $this->execute("INSERT INTO 'roles' (id, name) VALUES(1, 'Admin')");
        $this->execute("INSERT INTO 'roles' (id, name) VALUES(2, 'User')");
    }

    public function down()
    {
        $this->drop_table("roles");
    }
}
