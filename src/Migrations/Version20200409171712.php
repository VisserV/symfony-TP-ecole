<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409171712 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE correspondence_book_note_child (correspondence_book_note_id INT NOT NULL, child_id INT NOT NULL, INDEX IDX_691070EACFA40B5B (correspondence_book_note_id), INDEX IDX_691070EADD62C21B (child_id), PRIMARY KEY(correspondence_book_note_id, child_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE correspondence_book_note_child ADD CONSTRAINT FK_691070EACFA40B5B FOREIGN KEY (correspondence_book_note_id) REFERENCES correspondence_book_note (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE correspondence_book_note_child ADD CONSTRAINT FK_691070EADD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE correspondence_book_note DROP FOREIGN KEY FK_D30F8767DD62C21B');
        $this->addSql('DROP INDEX IDX_D30F8767DD62C21B ON correspondence_book_note');
        $this->addSql('ALTER TABLE correspondence_book_note DROP child_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE correspondence_book_note_child');
        $this->addSql('ALTER TABLE correspondence_book_note ADD child_id INT NOT NULL');
        $this->addSql('ALTER TABLE correspondence_book_note ADD CONSTRAINT FK_D30F8767DD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D30F8767DD62C21B ON correspondence_book_note (child_id)');
    }
}
