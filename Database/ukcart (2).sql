-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 07:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(33, 'Rangwali Pichora and Kurta Churidar', '1200', '', 'clothes1.webp'),
(34, 'Pahadi Stole', '550', '', 'clothes2.jpg'),
(35, 'Pichora', '900', '', 'clothes3.jpg'),
(36, 'Ghagra and Woolen Coat', '650', '', 'clothes4.jpg'),
(37, 'Pankhi Shawl', '800', '', 'clothes5.jpg'),
(38, 'Ghagra Choli', '1100', '', 'clothes6.webp'),
(39, 'Kumaoni Cap ', '360', '', 'clothes7.jpg'),
(40, 'Woven Wool Blanket', '1500', '', 'clothes8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(57, 'Pahadi Aam Ka Achaar', '120', '', 'food1.webp'),
(58, 'Buras Ka Juice', '220', '', 'food2.jpg'),
(59, 'Buras Ka Sharbat', '300', '', 'food3.jpg'),
(60, 'Himalayan Flora Fruit Squash', '250', '', 'food4.jpg'),
(61, 'Orange Juice ', '110', '', 'food5.webp'),
(62, ' Orange Plum Juice ', '180', '', 'food6.jpeg'),
(63, 'Chilli Garlic Pickle', '400', '', 'food7.webp'),
(64, 'Kathal ka Achaar', '300', '', 'food8.webp'),
(65, 'Malta Juice', '430', '', 'food9.jpg'),
(66, 'Jackfruit Pickle', '400', '', 'food10.webp'),
(67, 'Aam Ka Achaar ', '200', '', 'food11.webp'),
(68, 'Pahadi Namak', '200', '', 'food12.jpg'),
(69, 'Murabba', '300', '', 'food13.webp'),
(70, 'Orange Berry Juice', '500', '', 'food14.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(33, 'Pahadi Angir', '200 per kg', '', 'fruits1.webp'),
(34, 'Aadu', '80 Per Kg', '', 'fruits2.jpg'),
(35, 'Golden Raspberries(HISALU)', '200 Per Kg', '', 'fruits3.jpg'),
(36, 'Kafal', '100 Per Kg', '', 'fruits4.jpg'),
(37, 'Kilmora', '250 Per Kg', '', 'fruits5.jpg'),
(38, 'Aadu', '200 Per Kg', '', 'fruits6.webp'),
(39, 'Bedu', '250 Per Kg', '', 'fruits7.jpg'),
(40, 'Malta ', '80 Per Kg', '', 'fruits8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `handicrafts`
--

CREATE TABLE `handicrafts` (
  `id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `handicrafts`
--

INSERT INTO `handicrafts` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(49, 'Ringal Basket', '300', '', 'handicrafts1.jpg'),
(50, 'Aipan Kalash', '1000', '', 'handicrafts2.jpg'),
(51, 'Chapati Basket', '400', '', 'handicrafts3.jpg'),
(52, 'Woven Basket', '600', '', 'handicrafts4.webp'),
(53, 'Handmade Wooden Lamp', '1200', '', 'handicrafts5.jpg'),
(54, 'Mandir Aipan', '300', '', 'handicrafts6.webp'),
(55, 'Ganesh Aipan Art', '490', '', 'handicrafts7.jpg'),
(56, 'Mandir Welcome Aipan', '500', '', 'handicrafts8.jpg'),
(57, 'Handmade Square Pattern Aipan ', '300', '', 'handicrafts9.webp'),
(58, 'Aipan Thali', '440', '', 'handicrafts10.webp'),
(59, 'Pooja Thali ', '260', '', 'handicrafts11.webp'),
(60, 'Ringal Basket Set', '1500', '', 'handicrafts12.webp');

-- --------------------------------------------------------

--
-- Table structure for table `jewellery`
--

CREATE TABLE `jewellery` (
  `id` int(10) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jewellery`
--

INSERT INTO `jewellery` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(65, 'Thread Necklace', '2000', '', 'jewelry1.jpg'),
(66, 'Globand', '4000', '', 'jewelry2.jpg'),
(67, 'Kumaoni Pauchi', '3000', '', 'jewelry3.jpg'),
(68, 'Pahadi Nath', '1200', '', 'jewelry4.jpg'),
(69, 'Pahadi Jewar', '5000', '', 'jewelry5.jpg'),
(70, 'Traditional Gold Plated Pahadi Design', '2200', '', 'jewelry6.jpg'),
(71, 'Kumaoni Gold Plated Globand ', '3500', '', 'jewelry7.png'),
(72, 'Antique Design By SS Jewellers', '4500', '', 'jewelry8.webp'),
(73, 'Latest Pahadi Globand ', '6000', '', 'jewelry9.webp'),
(74, 'Latest Necklace By J K  Jewellers  ', '3400', '', 'jewelry10.webp'),
(75, 'Square Pattern Necklace ', '7000', '', 'jewelry11.webp'),
(76, 'Nathuli ', '3000', '', 'jewelry12.jpg'),
(77, 'Pahadi Jewellery Set', '15000', '', 'jewelry13.jpg'),
(78, 'Fish Pattern Nathuli', '5500', '', 'jewelry14.jpg'),
(79, 'Globand ', '3000', '', 'jewelry15.jpg'),
(80, 'Nathuli ', '4000', '', 'jewelry16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_number` varchar(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `delivery_address` varchar(50) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_image` text NOT NULL,
  `order_date` date NOT NULL,
  `is_accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_name`, `user_number`, `user_email`, `delivery_address`, `product_name`, `product_price`, `product_image`, `order_date`, `is_accepted`) VALUES
(5, 'Vimal', '123', 'vimalagari@gmail.com', 'khairna, garampani', 'Food2', 795, '../images/food_items/food2.jpg', '2025-04-11', 0),
(6, 'Vikram', '2147483647', 'vikramnegi@gmail.com', 'haldwani', 'Pulses7', 709, '../images/pulses/pulses7.jpg', '2025-04-11', 0),
(7, 'Vikram', '2147483647', 'vikramnegi@gmail.com', 'haldwani', 'Food2', 795, '../images/food_items/food2.jpg', '2025-04-11', 0),
(8, 'Ganesh', '8080808080', 'ganesh@gmail.com', 'Shimalkha, Nainital, Uttarakhand', 'Temple2', 786, '../images/temples/temple2.webp', '2025-04-11', 0),
(9, 'Ganesh', '8080808080', 'ganesh@gmail.com', 'Shimalkha, Nainital, Uttarakhand', 'Food6', 253, '../images/food_items/food6.jpeg', '2025-04-11', 0),
(10, 'Vimal', '123', 'vimalagari@gmail.com', 'khairna, garampani', 'Product6', 758, '../images/trending_products/product6.jpg', '2025-04-12', 0),
(11, 'vikrant', '8923360496', 'jalalvikrant6@gmail.com', 'khairna grampani', 'Fruits2', 405, '../images/fruits/fruits2.jpg', '2025-04-17', 1),
(13, 'vikrant', '8923360496', 'jalalvikrant6@gmail.com', 'khairna grampani', 'Product22', 577, '../images/trending_products/product22.webp', '2025-04-17', 1),
(14, 'vikrant', '8923360496', 'jalalvikrant6@gmail.com', 'khairna grampani', 'Food7', 574, '../images/food_items/food7.webp', '2025-04-17', 0),
(15, 'vikrant', '8923360496', 'jalalvikrant6@gmail.com', 'khairna grampani', 'Food5', 624, '../images/food_items/food5.webp', '2025-04-17', 0),
(16, 'vikrant', '8923360496', 'jalalvikrant6@gmail.com', 'dehradun kheri gaun', 'Pahadi Aam Ka Achaar', 120, '../images/food_items/food1.webp', '2025-04-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(29, 'Kakoli', '400', '', 'plant1.webp'),
(30, 'Brahma Kamal', '200', '', 'plant2.jpg'),
(31, 'Jungali Gajar Ghas', '300', '', 'plant3.jpg'),
(32, 'Cymbidium orchid', '300', '', 'plant4.jpg'),
(33, 'Vinca Major', '400', '', 'plant5.jpg'),
(34, 'Wild Jasmine', '200', '', 'plant6.jpg'),
(35, 'Buras', '450', '', 'plant7.webp');

-- --------------------------------------------------------

--
-- Table structure for table `pulses`
--

CREATE TABLE `pulses` (
  `id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pulses`
--

INSERT INTO `pulses` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(45, 'Pahadi Rajma ', '220 Per Kg', '', 'pulses1.jpg'),
(46, 'Navrangi Dal', '200 Per Kg', '', 'pulses2.jpg'),
(47, 'Bhatt Dal', '100 Per Kg', '', 'pulses3.jpeg'),
(48, 'Kala Chana', '80 Per Kg', '', 'pulses4.jpg'),
(49, 'Kulthi Dal', '110 Per Kg', '', 'pulses5.jpg'),
(50, 'Pahadi Dal ', '300 Per Kg', '', 'pulses6.jpg'),
(51, 'Dal', '100 Per Kg', '', 'pulses7.jpg'),
(52, 'Gahat Dal', '300 Per Kg', '', 'pulses8.jpg'),
(53, 'Urad Dal', '210 Per Kg', '', 'pulses9.webp'),
(54, 'Arhar Dal', '250 Per Kg', '', 'pulses10.jpg'),
(55, 'Pahadi Toor Dal', '200 Per Kg', '', 'pulses11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `temples`
--

CREATE TABLE `temples` (
  `id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temples`
--

INSERT INTO `temples` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(37, 'Jageshwar Dham Temple ', '300', '', 'temple1.jpg'),
(38, 'Trayambakeshwar Temple ', '500', '', 'temple2.webp'),
(39, 'Shri Kedarnath Jyotirlinga', '700', '', 'temple3.webp'),
(40, 'Baijnath Temple ', '250', '', 'temple4.jpg'),
(41, 'Dhari Devi Temple ', '400', '', 'temple5.webp'),
(42, 'Har Ki Pauri  ', '200', '', 'temple6.jpg'),
(43, 'Kainchi Dham ', '700', '', 'temple7.jpg'),
(44, 'Shri Badarinath Dham ', '400', '', 'temple8.jpg'),
(45, 'Tunganath Temple', '400', '', 'temple9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tranding_products`
--

CREATE TABLE `tranding_products` (
  `id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tranding_products`
--

INSERT INTO `tranding_products` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(113, 'Pichora', '500', 'A distinctive garment for Kumaoni women is the \'Pichora\' or \'Rangwali,\' a yellowish-orange dupatta with red or maroon polka dots. It features a central Swastik symbol surrounded by motifs like the sun, conch, bell, and goddess symbols. ', 'product1.jpg'),
(114, 'Pahadi Dress', '1800', 'Women wear a \'Ghagra,\' a woolen coat, and a \'Dhantu\' (scarf). During festivals, they don \'Thalka\' or \'Lohiya,\' which are long coats.', 'product2.jpg'),
(115, 'Hand Made Shawl', '548', 'The Pankhi shawl is a traditional handwoven woolen shawl crafted by the Bhotiya tribal artisans of Chamoli district in Uttarakhand. Made from 100% pure sheep wool sourced from local grazing fields, these shawls are known for their softness, lightweight nature, and exceptional warmth', 'product3.jpg'),
(116, 'Malta Juice', '100', 'Malta juice, derived from the Himalayan sweet orange known as \"Malta,\" is a refreshing and healthful beverage cherished in Uttarakhand and other parts of India', 'product4.webp'),
(117, 'Pahadi Aam Ka Achaar', '180', 'Made from handpicked raw mangoes sourced from the hills of Uttarakhand. The mangoes are combined with a blend of traditional spices, including turmeric, red chili, fennel seeds, mustard seeds, nigella seeds, asafoetida, and fenugreek seeds. Cold-pressed mustard oil and Himalayan rock salt are used to preserve the pickle and enhance its flavor', 'product5.webp'),
(118, 'Pahadi Namak', '400', 'Pahadi Namak, also known as Pisyu Loon in Garhwali and Kumaoni dialects, is a traditional Himalayan flavored salt deeply rooted in the culinary heritage of Uttarakhand', 'product6.jpg'),
(119, 'Murabba', '250', 'Made by boiling amla in sugar syrup until soft, this murabba offers a sweet and tangy flavor. Amla is rich in Vitamin C and antioxidants, supporting immunity and overall vitality.', 'product7.webp'),
(120, 'Golden Raspberries(HISALU)', '800', 'The Golden Himalayan Raspberry (Rubus ellipticus), is a cherished wild berry native to the mid-hill regions of Uttarakhand, particularly in the Kumaon and Garhwal areas. Ripening between April and July.', 'product8.jpg'),
(121, 'Kafal', '400 Per Kg', 'Kafal (Myrica esculenta), also known as Bayberry, is a cherished wild fruit native to the Himalayan regions of India, particularly in Uttarakhand. It holds the distinction of being the state fruit of Uttarakhand .', 'product9.jpg'),
(122, 'Kilmora', '300 Per Kg', 'Kilmora, also known as Indian Barberry (Berberis asiatica), is a wild fruit indigenous to the Himalayan regions, particularly in Uttarakhand. This hardy shrub thrives in the rocky terrains of the Kumaon and Garhwal hills.', 'product10.jpg'),
(123, 'Oranges', '120 Per Kg', 'Oranges are a type of citrus fruit that belong to the Rutaceae family. They are typically round, with a bright orange rind and segmented, juicy flesh inside.', 'product11.jpg'),
(124, 'Ringal Basket', '340 Per Piece', 'A Ringal basket is a traditional handcrafted item from the Himalayan state of Uttarakhand, India. Crafted from Ringal, a type of dwarf bamboo (Arundinaria spp.), these baskets are known for their durability, flexibility, and eco-friendliness.', 'product12.jpg'),
(125, 'HandMade Chapati Basket', '450 Per Piece', 'A handmade chapati basket is a traditional kitchen accessory crafted using natural materials like cane, bamboo, sabai grass, or moonj grass. These baskets are designed to keep chapatis warm and fresh, making them an essential item in many households.​', 'product13.jpg'),
(126, 'Aipan Art', '1200', 'Aipan Art is a traditional folk art originating from the Kumaon region of Uttarakhand, India. This ritualistic art form is characterized by intricate designs painted using a white paste made from rice flour, typically on red-colored surfaces like walls, floors, and cloths.​', 'product14.jpg'),
(127, 'Wicker Basket', '150 Per piece', 'A wicker basket is a container crafted through the weaving process known as wickerwork, which involves interlacing pliable materials such as willow, rattan, bamboo, reed, or synthetic fibers.', 'product15.webp'),
(128, 'Pahadi Jewellery', '5600', 'Pahadi Jewellery refers to the traditional adornments worn by women in the hilly regions of Uttarakhand, India. These ornaments are not just decorative but also carry cultural significance, reflecting the rich heritage of the Kumaon and Garhwal regions.', 'product16.jpg'),
(129, 'Globand', '700', 'Pahadi Guloband is a traditional neckpiece from Uttarakhand, deeply rooted in the cultural heritage of the Kumaoni, Garhwali, Bhotiya, and Jaunsari communities.', 'product17.webp'),
(130, 'Pahunchi', '500', 'The Pahadi Pahunchi is a traditional gold bangle worn by married women in the Kumaon and Garhwal regions of Uttarakhand. This ornament holds significant cultural value and is considered an auspicious symbol of marriage.​\r\n', 'product18.jpg'),
(131, 'Pahadi Nath', '800', 'Pahadi Nath, also known as Nathuli or Tehri Nath, is a traditional nose ring worn by women in the hilly regions of Uttarakhand, including the Kumaon and Garhwal areas.', 'product19.jpg'),
(132, 'Brahma Kamal', '250', 'The Brahma Kamal flower boasts large, white, lotus-like petals with a delicate fragrance. It blooms at night, typically between July and August, and remains open for a few hours before closing by dawn.​\r\n', 'product20.jpg'),
(133, 'Cymbidium orchid', '400', 'Cymbidium orchids typically bloom during the cooler months, from late autumn to spring, providing vibrant color when few other plants are in flower.\r\n', 'product21.jpg'),
(134, 'Buras', '570', 'Buras, also known as Buransh or Rhododendron arboreum, is an evergreen shrub or small tree native to the Himalayan region, particularly in Uttarakhand, India.', 'product22.webp'),
(135, 'Pahadi Kala Chana', '200 Per Kg', 'Pahadi Kala Chana, also known as Himalayan Black Chickpeas, is a traditional legume cultivated in the mountainous regions of Uttarakhand and Himachal Pradesh. Renowned for its earthy flavor and dense nutritional profile, this variety of chickpea is a staple in local diets and holds cultural significance in regional cuisines.', 'product23.jpg'),
(136, 'Masoor dal', '120 Per Kg', 'Masoor Dal, also known as red lentils, is a staple in Indian households, cherished for its quick cooking time, rich flavor, and impressive nutritional profile.​\r\n\r\n', 'product24.jpg'),
(137, 'Masoor Dal', '120 Per Kg', 'Masoor Dal, also known as red lentils, is a staple in Indian households, cherished for its quick cooking time, rich flavor, and impressive nutritional profile.​\r\n\r\n', 'product25.jpg'),
(138, 'Urad Dal', '110 Per Kg', '​Urad Dal, also known as black gram or black lentils, is a staple in Indian cuisine, revered for its rich flavor, creamy texture, and impressive nutritional profile.', 'product26.webp'),
(139, 'Bhatt Dal', '300 Per Kg', 'Bhatt ki Dal is a cherished traditional dish from the Kumaon region of Uttarakhand, India. This hearty preparation features black soybeans, locally known as bhatt, cooked in a spiced gravy thickened with roasted wheat flour. Renowned for its rich flavor and nutritional value, Bhatt ki Dal is especially favored during the colder months.​', 'product27.jpeg'),
(140, 'Navrangi Dal', '250 Per Kg', 'Navrangi Dal, also known as Navrang Dal or Navratan Dal, is a flavorful North Indian dish made by combining nine different types of lentils and legumes. The term \"Navrangi\" translates to \"nine-colored,\" reflecting the variety of lentils used, each contributing its unique texture and taste.​', 'product28.jpg'),
(141, 'Wicker Basket', '150 Per piece', 'A wicker basket is a container crafted through the weaving process known as wickerwork, which involves interlacing pliable materials such as willow, rattan, bamboo, reed, or synthetic fibers.', 'product15.webp'),
(142, ' Pahadi Moti Mix Dal ', '160 Per Kg', 'Pahadi Moti Mix Dal is a traditional lentil blend from the Himalayan regions of Uttarakhand and Himachal Pradesh. This hearty mix combines various whole pulses and beans, offering a rich, earthy flavor and a dense nutritional profile.​\r\n\r\n', 'product24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `number` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `delivery_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`number`, `name`, `password`, `email`, `delivery_address`) VALUES
('123', 'Vimal', '123', 'vimalagari@gmail.com', 'khairna, garampani'),
('8080808080', 'Ganesh', '123456789', 'ganesh@gmail.com', 'Shimalkha, Nainital, Uttarakhand'),
('8923360496', 'vikrant', '@1234567', 'jalalvikrant6@gmail.com', 'dehradun kheri gaun'),
('9090909090', 'Vikram', '123', 'vikramnegi@gmail.com', 'haldwani'),
('9898989898', 'hola', '12345678', 'hola@gmail.com', 'UP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `handicrafts`
--
ALTER TABLE `handicrafts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jewellery`
--
ALTER TABLE `jewellery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pulses`
--
ALTER TABLE `pulses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temples`
--
ALTER TABLE `temples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tranding_products`
--
ALTER TABLE `tranding_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `handicrafts`
--
ALTER TABLE `handicrafts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `jewellery`
--
ALTER TABLE `jewellery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pulses`
--
ALTER TABLE `pulses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `temples`
--
ALTER TABLE `temples`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tranding_products`
--
ALTER TABLE `tranding_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
