<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214150233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_address (user_id INT NOT NULL, address_id INT NOT NULL, INDEX IDX_5543718BA76ED395 (user_id), INDEX IDX_5543718BF5B7AF75 (address_id), PRIMARY KEY(user_id, address_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, street_number VARCHAR(10) DEFAULT NULL, street_name VARCHAR(255) NOT NULL, postal_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, additional1 VARCHAR(255) DEFAULT NULL, additional2 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_address ADD CONSTRAINT FK_5543718BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_address ADD CONSTRAINT FK_5543718BF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE school ADD address_id INT DEFAULT NULL, DROP address');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABBF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F99EDABBF5B7AF75 ON school (address_id)');
        $this->addSql('ALTER TABLE user DROP address');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE school DROP FOREIGN KEY FK_F99EDABBF5B7AF75');
        $this->addSql('ALTER TABLE user_address DROP FOREIGN KEY FK_5543718BF5B7AF75');
        $this->addSql('DROP TABLE user_address');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP INDEX UNIQ_F99EDABBF5B7AF75 ON school');
        $this->addSql('ALTER TABLE school ADD address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP address_id');
        $this->addSql('ALTER TABLE user ADD address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
