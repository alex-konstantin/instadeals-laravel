<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Table;
use LaravelDoctrine\Migrations\Schema\Builder;

class Version20160303183738 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        (new Builder($schema))->table('instadeals', function (Table $table) {
            $this->addSql('ALTER TABLE instadeals ADD UNIQUE (instadeal)');
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        (new Builder($schema))->table('instadeals', function (Table $table) {
            //
        });
    }
}
