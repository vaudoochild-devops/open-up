<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191009132355 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_gratification (user_id INT NOT NULL, gratification_id INT NOT NULL, INDEX IDX_D9F0C0AA76ED395 (user_id), INDEX IDX_D9F0C0ADAC6C3EF (gratification_id), PRIMARY KEY(user_id, gratification_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_gratification ADD CONSTRAINT FK_D9F0C0AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_gratification ADD CONSTRAINT FK_D9F0C0ADAC6C3EF FOREIGN KEY (gratification_id) REFERENCES gratification (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document ADD user_id INT NOT NULL, ADD trader_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A761273968F FOREIGN KEY (trader_id) REFERENCES trader (id)');
        $this->addSql('CREATE INDEX IDX_D8698A76A76ED395 ON document (user_id)');
        $this->addSql('CREATE INDEX IDX_D8698A761273968F ON document (trader_id)');
        $this->addSql('ALTER TABLE item_order DROP FOREIGN KEY FK_DF8E8848FCDAEAAA');
        $this->addSql('DROP INDEX IDX_DF8E8848FCDAEAAA ON item_order');
        $this->addSql('ALTER TABLE item_order CHANGE order_id_id order_id INT NOT NULL');
        $this->addSql('ALTER TABLE item_order ADD CONSTRAINT FK_DF8E88488D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_DF8E88488D9F6D38 ON item_order (order_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_gratification');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76A76ED395');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A761273968F');
        $this->addSql('DROP INDEX IDX_D8698A76A76ED395 ON document');
        $this->addSql('DROP INDEX IDX_D8698A761273968F ON document');
        $this->addSql('ALTER TABLE document DROP user_id, DROP trader_id');
        $this->addSql('ALTER TABLE item_order DROP FOREIGN KEY FK_DF8E88488D9F6D38');
        $this->addSql('DROP INDEX IDX_DF8E88488D9F6D38 ON item_order');
        $this->addSql('ALTER TABLE item_order CHANGE order_id order_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE item_order ADD CONSTRAINT FK_DF8E8848FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_DF8E8848FCDAEAAA ON item_order (order_id_id)');
    }
}
