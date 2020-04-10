<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200410100450 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE class_photo (id INT AUTO_INCREMENT NOT NULL, class_libelle VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, alt_image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_photo_child (class_photo_id INT NOT NULL, child_id INT NOT NULL, INDEX IDX_A08C9CA8CA5087DC (class_photo_id), INDEX IDX_A08C9CA8DD62C21B (child_id), PRIMARY KEY(class_photo_id, child_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE class_photo_child ADD CONSTRAINT FK_A08C9CA8CA5087DC FOREIGN KEY (class_photo_id) REFERENCES class_photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_photo_child ADD CONSTRAINT FK_A08C9CA8DD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE class_photo_child DROP FOREIGN KEY FK_A08C9CA8CA5087DC');
        $this->addSql('DROP TABLE class_photo');
        $this->addSql('DROP TABLE class_photo_child');
    }
}
