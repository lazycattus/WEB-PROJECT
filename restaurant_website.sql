-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2025 at 11:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(5) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_phone` varchar(50) NOT NULL,
  `client_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_phone`, `client_email`) VALUES
(26, 'Qurratun Aina Sakinah', '0187824620', 'aina@gmail.com'),
(27, 'adam', '01178929', 'adam@gmail.com'),
(28, 'Qurratun Aina Sakinah', '01178929', 'ainarg178@gmail.com'),
(29, 'Qurratun Aina Sakinah', '01178929', 'ainarg178@gmail.com'),
(30, 'Qurratun Aina Sakinah', '01178929', 'sarah@gmail.com'),
(31, 'Qurratun Aina Sakinah', '01178929', 'test@gmail.com'),
(32, 'Luqman', '0101011010', '101@gmail.com'),
(33, 'Luq', '123124235246', 'luq@gmail.com'),
(34, 'Luqman', '01231242141', 'luq@gmail.com'),
(35, 'Luqman', '01234513123', 'Hi@gmail.com'),
(36, 'Qurratun Aina Sakinah', '0101011010', 'aina@gmail.com'),
(37, 'test', '123124235246', 'sarah@gmail.com'),
(38, 'Luqman', '0187824620', 'luq@gmail.com'),
(39, 'test', '123124235246', 'ain@gmail.com'),
(40, 'Qurratun Aina Sakinah', '0190192', 'ain@gmail.com'),
(41, 'Qurratun Aina Sakinah', '0190192', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `image_id` int(2) NOT NULL,
  `image_name` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`image_id`, `image_name`, `image`) VALUES
(1, 'hamburger', 'hamburger.jpeg'),
(2, 'Italian Pasta', 'img_1.jpg'),
(3, 'Cook', 'img_2.jpg'),
(4, 'Pizza', 'img_3.jpg'),
(5, 'Burger', 'burger.jpeg'),
(6, 'coffee', 'coffee.jpeg'),
(7, 'charkueyteow', 'charkueyteow.jpg'),
(8, 'avocado', 'avocadosalad.jpg'),
(9, 'lontong', 'lontong.jpg'),
(10, 'nasilemak', 'nasilemak.jpg'),
(11, 'chocolate lava cake', 'chocolatelavacake.jpg'),
(12, 'tiramisu', 'tiramisu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `in_order`
--

CREATE TABLE `in_order` (
  `id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `menu_id` int(5) NOT NULL,
  `quantity` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `in_order`
--

INSERT INTO `in_order` (`id`, `order_id`, `menu_id`, `quantity`) VALUES
(25, 17, 2, 1),
(26, 17, 3, 1),
(27, 18, 21, 1),
(28, 18, 24, 1),
(29, 19, 2, 1),
(30, 20, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(5) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_description` varchar(255) NOT NULL,
  `menu_price` decimal(6,2) NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  `category_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_description`, `menu_price`, `menu_image`, `category_id`) VALUES
(1, 'Nasi Lemak with Fried Chicken', 'Fragrant coconut rice served with spicy sambal, boiled egg, anchovies, peanuts, cucumber, and crispy fried chicken.', 14.00, 'nasilemak.jpg', 8),
(2, 'Beef Hamburger', 'A juicy grilled beef patty served in a bun with fresh lettuce, tomato, and signature sauce.', 15.90, 'burger.jpeg', 1),
(3, 'Ice Cream', 'A creamy and refreshing frozen dessert available in a variety of delicious flavors.\n', 5.00, 'summer-dessert-sweet-ice-cream.jpg', 2),
(5, 'Coffee', 'Freshly brewed aromatic coffee made from high-quality roasted beans.\n', 6.00, 'coffee.jpeg', 3),
(6, 'Ice Tea', 'A chilled and refreshing tea beverage, lightly sweetened and served over ice.', 3.20, '76643_ice_tea.jpg', 3),
(7, 'Bucatini', 'Thick, hollow pasta served with a rich tomato sauce and seasoned with fresh herbs.\n', 18.00, 'macaroni.jpeg', 4),
(8, 'Cannelloni', 'Rolled pasta tubes stuffed with meat or cheese, baked with marinara and béchamel sauce.', 15.50, 'cooked_pasta.jpeg', 4),
(9, 'Margherita', 'Classic Italian pizza topped with fresh mozzarella, basil leaves, and tomato sauce.', 22.00, 'pizza.jpeg', 5),
(11, 'Mee Goreng Mamak', 'Spicy stir-fried yellow noodles with tofu, potatoes, egg, and vegetables in a savory soy-based sauce.', 5.00, 'meegoreng.jpg', 8),
(12, 'Char Kuey Teow', 'Wok-fried flat rice noodles with prawns, egg, bean sprouts, and chives in a smoky, flavorful sauce.\r\n', 5.00, 'charkueyteow.jpg', 8),
(16, 'Nasi Kerabu with Ayam Percik', 'Blue-tinted herb rice served with grilled spiced chicken, salad, salted egg, and sambal sauce.', 10.50, 'nasikerabu.jpeg', 8),
(17, 'Roti Canai (2 pieces) with Dhal Curry', 'Flaky and crispy flatbread served with warm lentil curry.', 4.50, 'roticanai.jpg', 8),
(18, 'Soto Ayam', 'Aromatic chicken soup with rice cakes, shredded chicken, and bean sprouts, topped with fried shallots.', 8.00, 'sotoayam.jpeg', 8),
(19, 'Lontong with Sambal', 'Compressed rice cakes in coconut vegetable stew, served with spicy sambal for extra kick.', 7.50, 'lontong.jpg', 8),
(20, 'Chicken Burger', 'Crispy or grilled chicken fillet served with fresh veggies and mayo in a soft bun.', 13.90, 'chickenburger.jpeg', 1),
(21, 'Double Cheeseburger', 'Two beef patties stacked with melted cheese, pickles, and sauce for a hearty bite.', 18.90, 'doublecheeseburger.jpeg', 1),
(22, 'Veggie Burger', 'Tasty plant-based patty with fresh vegetables and a tangy dressing, served in a wholemeal bun.', 8.00, 'veggieburger.jpeg', 1),
(23, 'Chocolate Lava Cake', 'Warm, rich chocolate cake with a gooey molten center, served with a scoop of vanilla ice cream.', 9.50, 'chocolatelavacake.jpg', 2),
(24, 'Tiramisu', 'Classic Italian dessert with layers of coffee-soaked sponge and mascarpone cream.', 10.90, 'tiramisu.jpg', 2),
(25, 'Fruit Salad', 'A refreshing mix of seasonal fruits, lightly chilled and served fresh.', 6.50, 'fruitsalad.jpg', 2),
(26, 'Mango Juice', 'Sweet and tropical mango juice, served cold.', 5.50, 'mangojuice.jpg', 3),
(27, 'Mineral Water', 'Pure bottled water to keep you hydrated.', 2.50, 'mineral.jpeg', 3),
(28, 'Spaghetti Carbonara', 'Classic creamy pasta with eggs, cheese, and smoky beef bacon.', 16.90, 'carbonara.jpeg', 4),
(29, 'Fettuccine Alfredo', 'Rich and creamy white sauce pasta with butter, parmesan, and perfectly cooked fettuccine.', 17.90, 'alfredo.jpg', 4),
(30, 'Pepperoni', 'Loaded with spicy pepperoni slices and melted cheese on a crispy crust.', 24.00, 'pepperoni.jpg', 5),
(31, 'Hawaiian', 'Sweet pineapple chunks and savory chicken or ham on a cheesy tomato base.', 23.50, 'hawaiian.jpeg', 5),
(32, 'BBQ Chicken', 'Smoky BBQ sauce, grilled chicken, red onions, and cheese on a hand-tossed crust.', 25.00, 'bbqchicken.jpg', 5),
(33, 'Caesar Salad', 'Crisp romaine lettuce with parmesan, croutons, and Caesar dressing.', 12.90, 'caesarsalad.jpg', 6),
(34, 'Greek Salad', 'A refreshing mix of cucumbers, tomatoes, olives, onions, and feta cheese.', 11.50, 'greeksalad.jpg', 6),
(35, 'Tuna Salad', 'Light and healthy blend of tuna, greens, cherry tomatoes, and vinaigrette.', 13.00, 'tunasalad.jpg', 6),
(36, 'Quinoa & Avocado Salad', 'A hearty, nutritious bowl of quinoa, creamy avocado, and mixed vegetables with lemon dressing.', 14.50, 'avocadosalad.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`category_id`, `category_name`) VALUES
(1, 'burgers'),
(2, 'desserts'),
(3, 'drinks'),
(4, 'pasta'),
(5, 'pizzas'),
(6, 'salads'),
(8, 'Malaysian Traditional Food'),
(14, 'Cuisine');

-- --------------------------------------------------------

--
-- Table structure for table `placed_orders`
--

CREATE TABLE `placed_orders` (
  `order_id` int(5) NOT NULL,
  `order_time` date NOT NULL,
  `client_id` int(5) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `delivered` tinyint(1) NOT NULL DEFAULT 0,
  `canceled` tinyint(1) NOT NULL DEFAULT 0,
  `cancellation_reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `placed_orders`
--

INSERT INTO `placed_orders` (`order_id`, `order_time`, `client_id`, `delivery_address`, `delivered`, `canceled`, `cancellation_reason`) VALUES
(17, '2025-05-27', 26, 'test st', 1, 0, NULL),
(18, '2025-05-27', 27, 'wtv', 0, 0, NULL),
(19, '2025-06-18', 28, 'seremban', 0, 0, NULL),
(20, '2025-06-18', 29, 'test time', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `client_id` int(5) NOT NULL,
  `selected_time` datetime NOT NULL,
  `nbr_guests` int(2) NOT NULL,
  `table_id` int(3) NOT NULL,
  `liberated` tinyint(1) NOT NULL DEFAULT 0,
  `canceled` tinyint(1) NOT NULL DEFAULT 0,
  `cancellation_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `date_created`, `client_id`, `selected_time`, `nbr_guests`, `table_id`, `liberated`, `canceled`, `cancellation_reason`) VALUES
(7, '2025-06-18 10:17:00', 30, '2025-06-19 10:16:00', 1, 1, 1, 1, ''),
(8, '2025-06-18 10:25:00', 31, '2025-06-19 10:25:00', 2, 1, 0, 1, ''),
(9, '2025-06-18 10:46:00', 32, '2025-06-19 10:45:00', 1, 1, 0, 1, ''),
(10, '2025-06-18 10:51:00', 33, '2025-06-19 10:51:00', 2, 1, 0, 1, ''),
(11, '2025-06-18 10:54:00', 34, '2025-06-19 10:51:00', 2, 1, 0, 1, 'Hi this is a big problem'),
(12, '2025-06-18 10:54:00', 35, '2025-06-18 10:59:13', 2, 1, 1, 0, NULL),
(13, '2025-06-18 10:59:00', 36, '2025-06-18 11:01:45', 2, 1, 0, 0, NULL),
(14, '2025-06-18 10:59:00', 37, '2025-06-19 10:59:00', 2, 1, 0, 1, 'aina nak cancel'),
(15, '2025-06-18 11:17:00', 38, '2025-06-19 10:59:00', 2, 1, 1, 1, 'haih'),
(16, '2025-06-18 11:17:00', 39, '2025-06-19 11:17:00', 2, 2, 1, 1, 'big problem no 2'),
(17, '2025-06-18 11:20:00', 40, '2025-06-18 11:19:46', 2, 1, 1, 0, NULL),
(18, '2025-06-18 11:20:00', 41, '2025-06-18 11:19:51', 2, 2, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(3) NOT NULL,
  `is_available` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `is_available`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `full_name`, `password`) VALUES
(1, 'admin_user', 'user_admin@gmail.com', 'User Admin', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `option_id` int(5) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'restaurant_name', 'ORDERLAH'),
(2, 'restaurant_email', 'SSE3308GROUP4@gmail.com'),
(3, 'admin_email', 'admin_email@gmail.com'),
(4, 'restaurant_phonenumber', '+60 3-9212 3456'),
(5, 'restaurant_address', '25 Jalan Rasa Sayang, CyberKafe District, 63000 TechVille, Malaysia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `in_order`
--
ALTER TABLE `in_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu` (`menu_id`),
  ADD KEY `fk_order` (`order_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `FK_menu_category_id` (`category_id`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `placed_orders`
--
ALTER TABLE `placed_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_client` (`client_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`option_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `image_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `in_order`
--
ALTER TABLE `in_order`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `placed_orders`
--
ALTER TABLE `placed_orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `option_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `in_order`
--
ALTER TABLE `in_order`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`menu_id`),
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `placed_orders` (`order_id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `FK_menu_category_id` FOREIGN KEY (`category_id`) REFERENCES `menu_categories` (`category_id`);

--
-- Constraints for table `placed_orders`
--
ALTER TABLE `placed_orders`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
