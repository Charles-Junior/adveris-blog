<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190510224456 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles ADD images_id INT NOT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BFDD3168D44F05E5 ON articles (images_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168D44F05E5');
        $this->addSql('DROP INDEX UNIQ_BFDD3168D44F05E5 ON articles');
        $this->addSql('ALTER TABLE articles DROP images_id');
    }
}
