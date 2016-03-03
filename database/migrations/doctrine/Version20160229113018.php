<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Table;
use LaravelDoctrine\Migrations\Schema\Builder;

class Version20160229113018 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        (new Builder($schema))->table('users', function (Table $table) {
            $this->addSql('ALTER TABLE users ADD remember_token VARCHAR(255) DEFAULT NULL');
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {

    }
}
