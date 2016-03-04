<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Table;
use LaravelDoctrine\Migrations\Schema\Builder;

class Version20160304140802 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        (new Builder($schema))->table('users', function (Table $table) {
            $this->addSql('INSERT INTO users(`username`, `password`, `email`) VALUES("instadeal_deploy_admin", md5("NuMeInstad3a1"), "kalexeyev@atypicalbrands.com")');
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        (new Builder($schema))->table('users', function (Table $table) {
            //
        });
    }
}
