<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409072539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE school_class (id INT AUTO_INCREMENT NOT NULL, teacher_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_33B1AF8541807E1D (teacher_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE school_class ADD CONSTRAINT FK_33B1AF8541807E1D FOREIGN KEY (teacher_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE child ADD school_class_id INT NOT NULL');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B3542914463F54 FOREIGN KEY (school_class_id) REFERENCES school_class (id)');
        $this->addSql('CREATE INDEX IDX_22B3542914463F54 ON child (school_class_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B3542914463F54');
        $this->addSql('DROP TABLE school_class');
        $this->addSql('DROP INDEX IDX_22B3542914463F54 ON child');
        $this->addSql('ALTER TABLE child DROP school_class_id');
    }
}
