<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190219202608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clients (client_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_C82E7419EB6921 (client_id), INDEX IDX_C82E747294869C (article_id), PRIMARY KEY(client_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E7419EB6921 FOREIGN KEY (client_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E747294869C FOREIGN KEY (article_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE purchared');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC94267294869C');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC9426BAD26311');
        $this->addSql('ALTER TABLE tags DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC94267294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC9426BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE tags ADD PRIMARY KEY (article_id, tag_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE purchared (user_id INT NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE clients');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC94267294869C');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC9426BAD26311');
        $this->addSql('ALTER TABLE tags DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC94267294869C FOREIGN KEY (article_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC9426BAD26311 FOREIGN KEY (tag_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE tags ADD PRIMARY KEY (tag_id, article_id)');
    }
}
