<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625151515 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE child ADD tuberculose DATETIME DEFAULT NULL, ADD dtp DATETIME DEFAULT NULL, ADD coqueluche DATETIME DEFAULT NULL, ADD meningites DATETIME DEFAULT NULL, ADD hepatite_b DATETIME DEFAULT NULL, ADD ror DATETIME DEFAULT NULL, ADD hpv DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD dtp DATETIME DEFAULT NULL, ADD coqueluche DATETIME DEFAULT NULL, ADD grippe DATETIME DEFAULT NULL, ADD zona DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE child DROP tuberculose, DROP dtp, DROP coqueluche, DROP meningites, DROP hepatite_b, DROP ror, DROP hpv');
        $this->addSql('ALTER TABLE user DROP dtp, DROP coqueluche, DROP grippe, DROP zona');
    }
}
