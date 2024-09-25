<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191009130021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gratification (id INT AUTO_INCREMENT NOT NULL, sponsor_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, amount INT NOT NULL, quantity INT NOT NULL, INDEX IDX_E311A15A12F7FB51 (sponsor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, shop_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_1F1B251E4D16C4DD (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop (id INT AUTO_INCREMENT NOT NULL, shop_type_id INT NOT NULL, trader_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, x_coordinate DOUBLE PRECISION NOT NULL, y_coordinate DOUBLE PRECISION NOT NULL, INDEX IDX_AC6A4CA2C67FCCB9 (shop_type_id), UNIQUE INDEX UNIQ_AC6A4CA21273968F (trader_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, status_user VARCHAR(255) NOT NULL, status_admin VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B6BD307F642B8210 (admin_id), UNIQUE INDEX UNIQ_B6BD307FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone INT NOT NULL, UNIQUE INDEX UNIQ_7D3656A4F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wallet (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, amount DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_7C68921FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zipcode INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, x_coordinate DOUBLE PRECISION NOT NULL, y_coordinate DOUBLE PRECISION NOT NULL, balance_wallet DOUBLE PRECISION NOT NULL, INDEX IDX_8D93D6499B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_order (id INT AUTO_INCREMENT NOT NULL, item_id INT NOT NULL, order_id_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_DF8E8848126F525E (item_id), INDEX IDX_DF8E8848FCDAEAAA (order_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsor (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_818CC9D49B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trader (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, shop_id INT NOT NULL, siret INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_C8A621B39B6B5FBA (account_id), INDEX IDX_C8A621B34D16C4DD (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stripe (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, id_transaction_stripe VARCHAR(255) NOT NULL, id_custumer_stripe VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_A4F1EC5AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, status VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, qrcode VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_user (order_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C062EC5E8D9F6D38 (order_id), INDEX IDX_C062EC5EA76ED395 (user_id), PRIMARY KEY(order_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email_send (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, status VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_38451A489B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gratification ADD CONSTRAINT FK_E311A15A12F7FB51 FOREIGN KEY (sponsor_id) REFERENCES sponsor (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA2C67FCCB9 FOREIGN KEY (shop_type_id) REFERENCES shop_type (id)');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA21273968F FOREIGN KEY (trader_id) REFERENCES trader (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT FK_7C68921FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE item_order ADD CONSTRAINT FK_DF8E8848126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_order ADD CONSTRAINT FK_DF8E8848FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE sponsor ADD CONSTRAINT FK_818CC9D49B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE trader ADD CONSTRAINT FK_C8A621B39B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE trader ADD CONSTRAINT FK_C8A621B34D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE stripe ADD CONSTRAINT FK_A4F1EC5AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_user ADD CONSTRAINT FK_C062EC5E8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_user ADD CONSTRAINT FK_C062EC5EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE email_send ADD CONSTRAINT FK_38451A489B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE item_order DROP FOREIGN KEY FK_DF8E8848126F525E');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E4D16C4DD');
        $this->addSql('ALTER TABLE trader DROP FOREIGN KEY FK_C8A621B34D16C4DD');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F642B8210');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499B6B5FBA');
        $this->addSql('ALTER TABLE sponsor DROP FOREIGN KEY FK_818CC9D49B6B5FBA');
        $this->addSql('ALTER TABLE trader DROP FOREIGN KEY FK_C8A621B39B6B5FBA');
        $this->addSql('ALTER TABLE email_send DROP FOREIGN KEY FK_38451A489B6B5FBA');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4F5B7AF75');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY FK_7C68921FA76ED395');
        $this->addSql('ALTER TABLE stripe DROP FOREIGN KEY FK_A4F1EC5AA76ED395');
        $this->addSql('ALTER TABLE order_user DROP FOREIGN KEY FK_C062EC5EA76ED395');
        $this->addSql('ALTER TABLE gratification DROP FOREIGN KEY FK_E311A15A12F7FB51');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA21273968F');
        $this->addSql('ALTER TABLE item_order DROP FOREIGN KEY FK_DF8E8848FCDAEAAA');
        $this->addSql('ALTER TABLE order_user DROP FOREIGN KEY FK_C062EC5E8D9F6D38');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA2C67FCCB9');
        $this->addSql('DROP TABLE gratification');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE shop');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE wallet');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE item_order');
        $this->addSql('DROP TABLE sponsor');
        $this->addSql('DROP TABLE trader');
        $this->addSql('DROP TABLE stripe');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_user');
        $this->addSql('DROP TABLE email_send');
        $this->addSql('DROP TABLE shop_type');
    }
}
