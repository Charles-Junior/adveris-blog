<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190510224248 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_BFDD3168A21214B7 ON articles (categories_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168A21214B7');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP INDEX IDX_BFDD3168A21214B7 ON articles');
        $this->addSql('ALTER TABLE articles DROP categories_id');
    }
}
