-- database.sql

CREATE DATABASE IF NOT EXISTS apple_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE apple_store;

-- Settings (Promo Bar)
CREATE TABLE `settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `key_name` VARCHAR(50) NOT NULL UNIQUE,
  `value` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings` (`key_name`, `value`) VALUES
('promo_text', 'Get up to 6 months of No Cost EMI* plus up to ₹15000.00 instant cashback* on selected products with eligible cards. <a href="#">See offers</a>');

-- Navigation
CREATE TABLE `nav_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `label` VARCHAR(50) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `sort_order` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `nav_items` (`label`, `url`, `sort_order`) VALUES
('Store', '#', 1),
('Mac', '#', 2),
('iPad', '#', 3),
('iPhone', '#', 4),
('Watch', '#', 5),
('AirPods', '#', 6),
('Home', '#', 7),
('Entertainment', '#', 8),
('Accessories', '#', 9),
('Support', '#', 10);

-- Hero Section
CREATE TABLE `hero` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(50) NOT NULL,
  `subtitle` VARCHAR(255) NOT NULL,
  `link_1_text` VARCHAR(100) NOT NULL,
  `link_1_url` VARCHAR(255) NOT NULL,
  `link_2_text` VARCHAR(100) NOT NULL,
  `link_2_url` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hero` (`title`, `subtitle`, `link_1_text`, `link_1_url`, `link_2_text`, `link_2_url`) VALUES
('Store', 'The best way to buy the products you love.', 'Connect with a Specialist', '#', 'Find an Apple Store', '#');

-- Category Rail
CREATE TABLE `category_rails` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `label` VARCHAR(50) NOT NULL,
  `image_path` VARCHAR(255) NOT NULL,
  `sort_order` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `category_rails` (`label`, `image_path`, `sort_order`) VALUES
('Mac', 'assets/img/icon-mac.jpg', 1),
('iPhone', 'assets/img/icon-iphone.jpg', 2),
('iPad', 'assets/img/icon-ipad.jpg', 3),
('Apple Watch', 'assets/img/icon-watch.jpg', 4),
('Home', 'assets/img/icon-home.jpg', 5),
('AirPods', 'assets/img/icon-airpods.jpg', 6),
('AirTag', 'assets/img/icon-airtag.jpg', 7),
('Accessories', 'assets/img/icon-accessories.jpg', 8);

-- Sections (Carousels)
CREATE TABLE `sections` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title_primary` VARCHAR(100) NOT NULL,
  `title_secondary` VARCHAR(255) NOT NULL,
  `sort_order` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `sections` (`title_primary`, `title_secondary`, `sort_order`) VALUES
('The latest.', 'Take a look at what’s new.', 1),
('Accessories.', 'Essentials that pair perfectly with your favourite products.', 2),
('The Apple Store difference.', 'Even more reasons to shop with us.', 3),
('Help is here.', 'Whenever and however you need it.', 4),
('Loud and clear.', 'Unparalleled choices for rich, high-quality sound.', 5),
('The Apple experience.', 'Do even more with Apple products and services.', 6),
('Savings and offers.', 'Exclusive deals, special stores and more.', 7);

-- Cards
CREATE TABLE `cards` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `section_id` INT NOT NULL,
  `eyebrow` VARCHAR(50) DEFAULT NULL,
  `title` VARCHAR(150) NOT NULL,
  `subtitle` VARCHAR(255) DEFAULT NULL,
  `price` VARCHAR(50) DEFAULT NULL,
  `image_path` VARCHAR(255) NOT NULL,
  `theme` ENUM('light', 'dark') DEFAULT 'light',
  `button_type` ENUM('arrow', 'plus') DEFAULT 'arrow',
  `sort_order` INT NOT NULL,
  FOREIGN KEY (`section_id`) REFERENCES `sections`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seeding "The latest" section (Section 1)
INSERT INTO `cards` (`section_id`, `eyebrow`, `title`, `subtitle`, `price`, `image_path`, `theme`, `button_type`, `sort_order`) VALUES
(1, 'NEW', 'iPhone 18 Pro', 'Pro further.', 'From ₹164900.00*', 'assets/img/card-iphone18pro.jpg', 'dark', 'arrow', 1),
(1, 'NEW', 'iPhone Duo', 'Hello, hello.', 'From ₹299900.00*', 'assets/img/card-iphoneduo.jpg', 'light', 'arrow', 2),
(1, 'NEW', 'MacBook Pro', 'PROLED XDR Display', 'From ₹349900.00*', 'assets/img/card-macbook.jpg', 'dark', 'arrow', 3);

-- Quick Links
CREATE TABLE `quick_links` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `label` VARCHAR(100) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `sort_order` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `quick_links` (`label`, `url`, `sort_order`) VALUES
('Find a Store', '#', 1),
('Order Status', '#', 2),
('Shopping Help', '#', 3),
('Your Saves', '#', 4);

-- Footnotes
CREATE TABLE `footnotes` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `content` TEXT NOT NULL,
  `sort_order` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `footnotes` (`content`, `sort_order`) VALUES
('◊ No Cost EMI is available with the purchase of an eligible product made using qualifying cards on 3- or 6-month tenures from most leading card issuers. Monthly pricing is rounded to the nearest rupee. Exact pricing will be provided by your card issuer, subject to your card issuer’s terms and conditions. Minimum order spend applies as per your card issuer’s threshold.', 1),
('Δ Instant cashback is available with the purchase of an eligible product with qualifying American Express, Axis Bank and ICICI Bank cards only. Minimum transaction value of ₹10001.00 applies. Click here to see instant cashback amounts and eligible devices.', 2);

-- Footer
CREATE TABLE `footer_columns` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `heading` VARCHAR(100) NOT NULL,
  `sort_order` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `footer_columns` (`heading`, `sort_order`) VALUES
('Shop and Learn', 1),
('Account', 2),
('Apple Store', 3),
('For Business', 4),
('Apple Values', 5);

CREATE TABLE `footer_links` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `column_id` INT NOT NULL,
  `label` VARCHAR(100) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `sort_order` INT NOT NULL,
  FOREIGN KEY (`column_id`) REFERENCES `footer_columns`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `footer_links` (`column_id`, `label`, `url`, `sort_order`) VALUES
(1, 'Store', '#', 1),
(1, 'Mac', '#', 2),
(1, 'iPad', '#', 3),
(1, 'iPhone', '#', 4),
(1, 'Watch', '#', 5),
(1, 'AirPods', '#', 6),
(2, 'Manage Your Apple Account', '#', 1),
(2, 'Apple Store Account', '#', 2),
(2, 'iCloud.com', '#', 3),
(3, 'Find a Store', '#', 1),
(3, 'Genius Bar', '#', 2),
(3, 'Today at Apple', '#', 3),
(4, 'Apple and Business', '#', 1),
(5, 'Accessibility', '#', 1),
(5, 'Environment', '#', 2);