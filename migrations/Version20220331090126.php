<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220331090126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE foodtrucks (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, registration VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_foodtrucks (site_id INT NOT NULL, foodtrucks_id INT NOT NULL, INDEX IDX_A0464C55F6BD1646 (site_id), INDEX IDX_A0464C559DE6A5CC (foodtrucks_id), PRIMARY KEY(site_id, foodtrucks_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE site_foodtrucks ADD CONSTRAINT FK_A0464C55F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_foodtrucks ADD CONSTRAINT FK_A0464C559DE6A5CC FOREIGN KEY (foodtrucks_id) REFERENCES foodtrucks (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site_foodtrucks DROP FOREIGN KEY FK_A0464C559DE6A5CC');
        $this->addSql('ALTER TABLE site_foodtrucks DROP FOREIGN KEY FK_A0464C55F6BD1646');
        $this->addSql('DROP TABLE foodtrucks');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE site_foodtrucks');
    }
}
