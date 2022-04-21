<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420113609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hotel_manager (hotel_id INT NOT NULL, manager_id INT NOT NULL, INDEX IDX_296E3B903243BB18 (hotel_id), INDEX IDX_296E3B90783E3463 (manager_id), PRIMARY KEY(hotel_id, manager_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manager_hotel (manager_id INT NOT NULL, hotel_id INT NOT NULL, INDEX IDX_2A8C9EE3783E3463 (manager_id), INDEX IDX_2A8C9EE33243BB18 (hotel_id), PRIMARY KEY(manager_id, hotel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hotel_manager ADD CONSTRAINT FK_296E3B903243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotel_manager ADD CONSTRAINT FK_296E3B90783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE manager_hotel ADD CONSTRAINT FK_2A8C9EE3783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE manager_hotel ADD CONSTRAINT FK_2A8C9EE33243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE hotel_manager');
        $this->addSql('DROP TABLE manager_hotel');
    }
}
