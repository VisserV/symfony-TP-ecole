<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409151949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE correspondence_book_note (id INT AUTO_INCREMENT NOT NULL, child_id INT NOT NULL, writter_id INT NOT NULL, text LONGTEXT NOT NULL, sent_date DATE NOT NULL, seen_date DATE DEFAULT NULL, INDEX IDX_D30F8767DD62C21B (child_id), INDEX IDX_D30F8767679E91B3 (writter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE correspondence_book_note ADD CONSTRAINT FK_D30F8767DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('ALTER TABLE correspondence_book_note ADD CONSTRAINT FK_D30F8767679E91B3 FOREIGN KEY (writter_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE correspondence_book_note');
    }
}
