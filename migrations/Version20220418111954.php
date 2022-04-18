<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220418111954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE suit (id INT AUTO_INCREMENT NOT NULL, hotel_id INT NOT NULL, name VARCHAR(255) NOT NULL, rooms INT DEFAULT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, home_image VARCHAR(255) NOT NULL, second_image VARCHAR(255) NOT NULL, third_image VARCHAR(255) NOT NULL, INDEX IDX_E9A31F1E3243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE suit ADD CONSTRAINT FK_E9A31F1E3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE administrator ADD hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE administrator ADD CONSTRAINT FK_58DF06513243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58DF06513243BB18 ON administrator (hotel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE suit');
        $this->addSql('ALTER TABLE administrator DROP FOREIGN KEY FK_58DF06513243BB18');
        $this->addSql('DROP INDEX UNIQ_58DF06513243BB18 ON administrator');
        $this->addSql('ALTER TABLE administrator DROP hotel_id');
    }
}
