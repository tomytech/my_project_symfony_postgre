<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230915123233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresses ADD u_id INT NOT NULL');
        $this->addSql('ALTER TABLE adresses ADD CONSTRAINT FK_EF192552E4A59390 FOREIGN KEY (u_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_EF192552E4A59390 ON adresses (u_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE adresses DROP CONSTRAINT FK_EF192552E4A59390');
        $this->addSql('DROP INDEX IDX_EF192552E4A59390');
        $this->addSql('ALTER TABLE adresses DROP u_id');
    }
}
