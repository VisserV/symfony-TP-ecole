<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214155025 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE child_user (child_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_38A275BBDD62C21B (child_id), INDEX IDX_38A275BBA76ED395 (user_id), PRIMARY KEY(child_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE child_user ADD CONSTRAINT FK_38A275BBDD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE child_user ADD CONSTRAINT FK_38A275BBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B35429727ACA70');
        $this->addSql('DROP INDEX IDX_22B35429727ACA70 ON child');
        $this->addSql('ALTER TABLE child DROP parent_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE child_user');
        $this->addSql('ALTER TABLE child ADD parent_id INT NOT NULL');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B35429727ACA70 FOREIGN KEY (parent_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_22B35429727ACA70 ON child (parent_id)');
    }
}
