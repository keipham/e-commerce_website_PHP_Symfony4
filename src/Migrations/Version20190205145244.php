<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190205145244 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments CHANGE overall_rating overall_rating INT DEFAULT NULL, CHANGE comment comment VARCHAR(255) DEFAULT NULL, CHANGE jumanji jumanji INT DEFAULT NULL, CHANGE voodoo voodoo INT DEFAULT NULL, CHANGE assassin assassin INT DEFAULT NULL, CHANGE the_cabin the_cabin INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments CHANGE overall_rating overall_rating INT NOT NULL, CHANGE comment comment VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE jumanji jumanji INT NOT NULL, CHANGE voodoo voodoo INT NOT NULL, CHANGE assassin assassin INT NOT NULL, CHANGE the_cabin the_cabin INT NOT NULL');
    }
}
