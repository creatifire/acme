<?php

use Phinx\Migration\AbstractMigration;

class SeedPagesTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            insert into pages (browser_title, page_content)
            values
            ('Hunt Down These Orlando Food Trucks With Gusto',
            'The food truck craze isn’t what typically drives people to Central Florida, but that might change sooner rather than later.

Food trucks are thriving in the Orlando area because they appeal to the younger business crowd in a bustling economy and they are also a perfect fit for families who want high-quality cuisine but might not feel comfortable taking their kids into a brick-and-mortar establishment.

Perhaps most importantly, food trucks present a perfect avenue into the hearts (and stomachs) of the diverse population around Florida’s I-4 corridor — an area that is increasingly being defined by its utter inability to be defined.')
        ");
    }

    public function down()
    {

    }
}
