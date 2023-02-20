<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220130817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE insurance_claim (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, internal_user_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_of_the_loss DATETIME NOT NULL, nature_of_the_claim LONGTEXT NOT NULL, nature_of_the_damages LONGTEXT NOT NULL, place VARCHAR(255) NOT NULL, contract_number VARCHAR(255) NOT NULL, vehicle_model VARCHAR(255) NOT NULL, vehicle_registration_number VARCHAR(255) NOT NULL, vehicle_location VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_8BDE424A76ED395 (user_id), INDEX IDX_8BDE424BF7692A3 (internal_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insurance_claim_images (id INT AUTO_INCREMENT NOT NULL, insurance_claim_id INT NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) DEFAULT NULL, image_original_name VARCHAR(255) DEFAULT NULL, image_mime_type VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, image_dimensions LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', INDEX IDX_82E8F9B8D6C7D2DD (insurance_claim_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internal_user (id INT AUTO_INCREMENT NOT NULL, search LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, active TINYINT(1) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(60) NOT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_61134782E7927C74 (email), UNIQUE INDEX UNIQ_61134782C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, date_of_birth DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE insurance_claim ADD CONSTRAINT FK_8BDE424A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE insurance_claim ADD CONSTRAINT FK_8BDE424BF7692A3 FOREIGN KEY (internal_user_id) REFERENCES internal_user (id)');
        $this->addSql('ALTER TABLE insurance_claim_images ADD CONSTRAINT FK_82E8F9B8D6C7D2DD FOREIGN KEY (insurance_claim_id) REFERENCES insurance_claim (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE insurance_claim DROP FOREIGN KEY FK_8BDE424A76ED395');
        $this->addSql('ALTER TABLE insurance_claim DROP FOREIGN KEY FK_8BDE424BF7692A3');
        $this->addSql('ALTER TABLE insurance_claim_images DROP FOREIGN KEY FK_82E8F9B8D6C7D2DD');
        $this->addSql('DROP TABLE insurance_claim');
        $this->addSql('DROP TABLE insurance_claim_images');
        $this->addSql('DROP TABLE internal_user');
        $this->addSql('DROP TABLE user');
    }
}
