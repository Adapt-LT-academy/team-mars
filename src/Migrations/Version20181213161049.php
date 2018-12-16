<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181213161049 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE likedshoe DROP FOREIGN KEY FK_CE33FDA058746832');
        $this->addSql('CREATE TABLE shoe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(180) NOT NULL, type VARCHAR(180) NOT NULL, color VARCHAR(180) NOT NULL, price DOUBLE PRECISION NOT NULL, image VARCHAR(180) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE Admin');
        $this->addSql('DROP TABLE ShoeProperties');
        $this->addSql('DROP TABLE User');
        $this->addSql('DROP TABLE likedshoe');
        $this->addSql('DROP TABLE size');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Admin (Email VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, Password VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(Email)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ShoeProperties (ID INT AUTO_INCREMENT NOT NULL, Colour VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, Size VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, Price VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ShoeID INT DEFAULT NULL, INDEX ShoeID (ShoeID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE User (SessionID VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, Email VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(SessionID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE likedshoe (UserID VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, ShoeID INT NOT NULL, INDEX IDX_CE33FDA058746832 (UserID), INDEX IDX_CE33FDA0EFC9782D (ShoeID), PRIMARY KEY(UserID, ShoeID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, type VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, size VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE likedshoe ADD CONSTRAINT FK_CE33FDA058746832 FOREIGN KEY (UserID) REFERENCES User (SessionID)');
        $this->addSql('DROP TABLE shoe');
    }
}
