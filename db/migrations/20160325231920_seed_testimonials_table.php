<?php

use Phinx\Migration\AbstractMigration;

class SeedTestimonialsTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            insert into testimonials (title, testimonial, user_id)
            values
            ('Truck Food', 'There salami is slammin', 2)
        ");
    }

    public function down()
    {

    }
}
