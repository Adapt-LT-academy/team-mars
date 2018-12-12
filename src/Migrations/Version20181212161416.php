<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212161416 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE Shoe');
        $this->addSql('DROP TABLE ShoeProperties');
        $this->addSql('DROP TABLE User');
        $this->addSql('DROP TABLE size');
        $this->addSql('ALTER TABLE Admin CHANGE Password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Shoe (ID INT AUTO_INCREMENT NOT NULL, Brand VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, Name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ShopURL VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ImageURL VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ShoeProperties (ID INT AUTO_INCREMENT NOT NULL, Colour VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, Size VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, Price VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ShoeID INT DEFAULT NULL, INDEX ShoeID (ShoeID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE User (ID INT AUTO_INCREMENT NOT NULL, SessionID VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, Email VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, type VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, size VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin CHANGE password Password VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
