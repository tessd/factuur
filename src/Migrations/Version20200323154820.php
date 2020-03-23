<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200323154820 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE factuur ADD CONSTRAINT FK_3214771059958012 FOREIGN KEY (klantnr_id) REFERENCES klant (id)');
        $this->addSql('ALTER TABLE factuurregel ADD CONSTRAINT FK_38897CCDD8411A7E FOREIGN KEY (factuurnr_id) REFERENCES factuur (id)');
        $this->addSql('ALTER TABLE factuurregel ADD CONSTRAINT FK_38897CCDB240DC3A FOREIGN KEY (omschrijving_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE factuur DROP FOREIGN KEY FK_3214771059958012');
        $this->addSql('ALTER TABLE factuurregel DROP FOREIGN KEY FK_38897CCDD8411A7E');
        $this->addSql('ALTER TABLE factuurregel DROP FOREIGN KEY FK_38897CCDB240DC3A');
    }
}
