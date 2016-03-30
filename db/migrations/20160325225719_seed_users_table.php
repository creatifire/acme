<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
    public function up()
    {
        $password_hash = password_hash('verysecret', PASSWORD_DEFAULT);

        $this->execute("
            insert into users (first_name, last_name, email, password)
            values
            ('Arnold', 'Palmer', 'arnold@palmer.com', '$password_hash')
        ");
    }

    public function down()
    {

    }
}
