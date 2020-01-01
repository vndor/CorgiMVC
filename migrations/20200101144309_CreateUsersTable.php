<?php

class CreateUsersTable extends Ruckusing_Migration_Base
{
    public function up()
    {
        $t = $this->create_table("users", array("id" => false));
        $t->column("id", "integer", array("primary_key"      => true, 
                                               "auto_increment"   => true, 
                                               "unsigned"         => true, 
                                               "null"             => false));
        $t->column("username", "string");
        $t->column("password", "string");
        $t->column("role_id", "integer");
        $t->finish();
		
        $this->add_index("users", "username", array("unique" => true));

        // Seed demo users
        
        $admin_password = password_hash("admin", PASSWORD_BCRYPT);
        $user_password = password_hash("user", PASSWORD_BCRYPT);

        $this->execute("INSERT INTO 'users' (username, password, role_id) VALUES('Admin', '{$admin_password}', 1)");
        $this->execute("INSERT INTO 'users' (username, password, role_id) VALUES('User', '{$user_password}', 1)");

    }

    public function down()
    {
        $this->drop_table("users");
    }
}
