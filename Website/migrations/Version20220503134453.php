<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503134453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, electrician_id INT DEFAULT NULL, location VARCHAR(255) NOT NULL, job_type VARCHAR(255) NOT NULL, file_name VARCHAR(255) DEFAULT NULL, INDEX IDX_FBD8E0F8A916AF23 (electrician_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qualification (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, qualification_name VARCHAR(255) NOT NULL, expiry_date VARCHAR(255) NOT NULL, INDEX IDX_B712F0CEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8A916AF23 FOREIGN KEY (electrician_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE qualification ADD CONSTRAINT FK_B712F0CEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8A916AF23');
        $this->addSql('ALTER TABLE qualification DROP FOREIGN KEY FK_B712F0CEA76ED395');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE qualification');
        $this->addSql('DROP TABLE user');
    }
}
