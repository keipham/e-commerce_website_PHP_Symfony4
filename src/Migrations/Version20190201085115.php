<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190201085115 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bookings ADD formula_name VARCHAR(255) NOT NULL, ADD games_name VARCHAR(255) NOT NULL, DROP games_id, CHANGE status status VARCHAR(255) NOT NULL, CHANGE formula_id customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE formulas ADD picture VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bookings ADD games_id LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', DROP formula_name, DROP games_name, CHANGE status status VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE customer_id formula_id INT NOT NULL');
        $this->addSql('ALTER TABLE formulas DROP picture');
    }
}
