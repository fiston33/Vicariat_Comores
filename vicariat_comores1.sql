-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2026 at 11:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vicariat_comores`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `fullname`, `email`, `phone`, `amount`, `payment_method`, `status`, `created_at`) VALUES
(1, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 50000.00, 'Bank Transfer', 'pending', '2026-06-20 19:02:09'),
(2, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'MTN Mobile Money', 'pending', '2026-06-20 19:02:56'),
(3, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'Airtel Money', 'pending', '2026-06-20 19:03:22'),
(4, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'MTN Mobile Money', 'pending', '2026-06-20 19:05:20'),
(5, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'MTN Mobile Money', 'pending', '2026-06-20 19:20:33'),
(6, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'Airtel Money', 'pending', '2026-06-20 19:21:21'),
(7, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'Airtel Money', 'confirmed', '2026-06-20 19:23:13'),
(8, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'MTN Mobile Money', 'pending', '2026-06-22 11:25:16'),
(9, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'Airtel Money', 'pending', '2026-06-22 11:27:24'),
(10, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'MTN Mobile Money', 'pending', '2026-06-22 11:29:18'),
(11, 'DUSABIMANA Bertin', 'bertinbebe1@gmail.com', '0788382024', 0.00, 'Airtel Money', 'pending', '2026-06-22 11:30:23'),
(12, 'DUSABIMANA Bertin', 'bertinbebe1@gmail.com', '0788382024', 600.00, 'Airtel Money', 'pending', '2026-06-22 11:33:38'),
(13, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 12000.00, 'MTN Mobile Money', 'pending', '2026-06-26 12:48:27'),
(14, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'MTN Mobile Money', 'pending', '2026-07-17 16:02:27'),
(15, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0788382024', 0.00, 'MTN Mobile Money', 'pending', '2026-07-17 16:02:49'),
(16, 'DUSABIMANA Bertin', 'bertinbebe8@gmail.com', '0788382024', 0.00, '', 'pending', '2026-07-17 16:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `status` enum('draft','published') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parish_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `image`, `description`, `location`, `event_date`, `status`, `created_at`, `parish_id`) VALUES
(2, 'Ceremony Events', '1781784475_charities.jpeg', 'Youth Pastoral Initiatives and Ecumenical Life\r\nThe Vicariat apostolique des Comores supports a vibrant youth pastoral agenda within a country that is over 99% Muslim. Under the guidance of Father Jean Claude Mij Riy, the secretary-chancellor of the Vicariat, the Church encourages a synodal and ecumenical approach in organizing activities and celebrations. In preparation for major events like the 2025 Youth Jubilee in Rome and the 2027 World Youth Day in Seoul, young Catholics are trained in dynamic leadership emphasizing dialogue, accompaniment, and sharing.\r\nThe Vicariat fosters ecumenical cooperation through initiatives such as the “Association sportive chrétienne,” which brings together young people from different Christian confessions in sports, and joint choral events to strengthen fellowship and faith practice. In areas like Anjouan, where there is only one Catholic church on the island, Christians of all denominations attend services together, creating a unique \"unnamed ecumenism\" in this small minority community \r\nwww.vaticannews.va\r\n.\r\nHumanitarian Response: Cyclone Chido in Mayotte\r\nThe Vicariat also plays a key role in humanitarian assistance. After Cyclone Chido devastated Mayotte in December 2024, the Vicariat apostolique des Comores called for solidarity with all affected individuals, regardless of status or background. Infrastructure of the Church itself was damaged, and it opened its facilities to shelter emergency personnel and victims. Father Bienvenu Kasongo highlighted the severe impact, including casualties, destruction of homes, and disruption of essentials like water and electricity.\r\nIn collaboration with organizations like Secours Catholique, Apprentis d’Auteuil, and the Société de Saint-Vincent de Paul, and in coordination with the French government and the European Union, the Vicariat helped deliver emergency supplies, shelter, and medical support. The initiative emphasized inclusivity, providing aid to the entire population affected by the disaster, and promoted solidarity as a guiding principle in reconstruction efforts \r\nwww.vaticannews.va\r\n.', 'Kigali Rwanda  Marriot Hotel', '2026-06-25', 'published', '2026-06-18 12:07:55', NULL),
(4, 'Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!', '1781855954_histmiss.jpeg', 'Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!', 'Mayoteee comores', '2026-07-03', 'published', '2026-06-19 07:59:14', NULL),
(5, 'Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!', '1781856021_catr.jpeg', 'Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! v Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! v Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! v Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!', 'Nyakarambi Kirehe Mahama', '2026-06-25', 'published', '2026-06-19 08:00:21', NULL),
(6, 'Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!', '1781856105_bgme.jpg', 'Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now! Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!Mark your calendars! The party of the year is coming, and you won’t want to miss it. RSVP now!', 'wqretyuki Kigali Rwanda Southern', '2005-11-11', '', '2026-06-19 08:01:45', 9),
(8, 'First Checking Events to Parishes', '1784223552_charities.jpeg', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\\r\\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow', 'Rwanda Southern Nyamagabe', '2026-07-14', '', '2026-07-16 17:39:12', 5),
(9, 'Lionel Andres Messi World', '1784223745_church.jpeg', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\\r\\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow', 'Mayoteee comores Gasak', '2004-11-11', '', '2026-07-16 17:42:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parish_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `category`, `image`, `created_at`, `parish_id`) VALUES
(2, 'Events Hello', '', 'Paroisses', '1781882405_apostols.jpeg', '2026-06-19 14:44:05', NULL),
(3, 'Tresfiendcfncdinc', '', 'Jeunesse', '1781880297_cart.jpeg', '2026-06-19 14:44:57', NULL),
(4, 'Testing Testing Testing Testing', 'In today’s fast-paced digital world, creating long, coherent, and well-structured text can be a daunting task, whether for a blog, an academic essay, or a business proposal. Enter the Very Long Text Generator—an innovative tool designed to generate extensive pieces of text effortlessly. This tool leverages artificial intelligence (AI) and advanced algorithms to produce long-form content that is not only contextually relevant but also coherent and engaging.\r\n\r\nWhy are Very Long Text Generators Important?\r\nIn various fields such as content creation, education, and business, long-form writing is often necessary. Whether you’re crafting a comprehensive report, a detailed article, or an in-depth product description, these generators can help streamline the writing process, saving you time and effort. This is especially useful for professionals who are under constant pressure to meet deadlines without sacrificing quality.', 'Événements', '1781980244_church.jpeg', '2026-06-20 18:30:44', NULL),
(5, 'Testing Testing Testing Testing Testing', 'In today’s fast-paced digital world, creating long, coherent, and well-structured text can be a daunting task, whether for a blog, an academic essay, or a business proposal. Enter the Very Long Text Generator—an innovative tool designed to generate extensive pieces of text effortlessly. This tool leverages artificial intelligence (AI) and advanced algorithms to produce long-form content that is not only contextually relevant but also coherent and engaging.\r\n\r\nWhy are Very Long Text Generators Important?\r\nIn various fields such as content creation, education, and business, long-form writing is often necessary. Whether you’re crafting a comprehensive report, a detailed article, or an in-depth product description, these generators can help streamline the writing process, saving you time and effort. This is especially useful for professionals who are under constant pressure to meet deadlines without sacrificing quality.', 'Événements', '1781980295_cath.jpeg', '2026-06-20 18:31:35', NULL),
(9, 'Lionel Andres Messi World', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow', 'Paroisses', '1784279443_crosslogo.jpg', '2026-07-17 08:38:40', 9);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `type` enum('gallery','video','document','publication') DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `external_link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parish_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `title`, `description`, `file_path`, `external_link`, `created_at`, `parish_id`) VALUES
(18, 'gallery', 'Hello Brothers', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'uploads/1782115354_cholare.jpeg', '', '2026-06-21 15:17:31', NULL),
(19, 'gallery', 'Brother You hate me 21/06', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'uploads/1782115162_apostols.jpeg', '', '2026-06-21 15:23:09', NULL),
(20, 'gallery', 'John 15 5', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'uploads/1782115821_miss.jpeg', '', '2026-06-21 15:30:00', NULL),
(21, 'gallery', 'FReeman', 'wertyu wetryju weartryjogbergnob fngnfokgrfb rgnvjkmthnbf  rnj v', 'uploads/1782056472_house.jpg', '', '2026-06-21 15:41:12', NULL),
(23, 'publication', 'TRFVC', 'etryui tryui rtyuk tryu YTG werthmj ', 'uploads/1782056585_house.jpg', '', '2026-06-21 15:43:05', NULL),
(24, 'document', 'Recommendation', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'uploads/1782056630_teacher_recommendation.pdf', '', '2026-06-21 15:43:50', NULL),
(25, 'video', 'Hello', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', '', 'https://www.youtube.com/watch?v=Bsu8MRnvKkM&source_ve_path=NzY3NTg&embeds_referring_euri=https%3A%2F%2Fwww.bing.com%2F&embeds_referring_origin=https%3A%2F%2Fwww.bing.com', '2026-06-21 15:52:16', NULL),
(26, 'video', 'REEegrt', 'efrdtfyjgukhi wertyjuki', '', 'https://www.youtube.com/watch?v=Bsu8MRnvKkM&source_ve_path=NzY3NTg&embeds_referring_euri=https%3A%2F%2Fwww.bing.com%2F&embeds_referring_origin=https%3A%2F%2Fwww.bing.com', '2026-06-22 06:44:05', NULL),
(27, 'video', 'wertyu', 'weretuyi wertyuk', '', 'https://www.youtube.com/watch?v=Bsu8MRnvKkM&source_ve_path=NzY3NTg&embeds_referring_euri=https%3A%2F%2Fwww.bing.com%2F&embeds_referring_origin=https%3A%2F%2Fwww.bing.com', '2026-06-22 06:50:00', NULL),
(28, 'document', 'werthyjuki', 'waerstdyuki', 'uploads/1782112538_community_recommendation.pdf', '', '2026-06-22 07:15:38', NULL),
(29, 'publication', 'Opening Cathecism', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.', 'uploads/1783086812_charities.jpeg', '', '2026-07-03 13:53:32', NULL),
(30, 'gallery', 'Lionel Messi Puchitin', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow', 'uploads/1784280376_charities.jpeg', '', '2026-07-17 09:26:16', 9);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `parish` varchar(255) DEFAULT NULL,
  `role` enum('Member','Youth','Volunteer','Leader','Priest') DEFAULT 'Member',
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `fullname`, `email`, `phone`, `address`, `parish`, `role`, `status`, `created_at`) VALUES
(1, 'BYIRINGIRO KIBABA', 'byiringirofiston44@gmail.com', '0791886292', 'Kigali City Tower', 'Notre-Dame de Fatima', 'Volunteer', 'rejected', '2026-06-21 16:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(2, 'Fiston Byiringiro', 'byiringirofiston33@gmail.com', 'Laerning Biblble', 'I hope this message finds you in good health and peace. I am writing to kindly request information regarding the pastoral activities and community programs of the Vicariat Apostolique de l’Archipel des Comores.', 'read', '2026-06-19 11:30:05'),
(3, 'Fiston Byiringiro', 'byiringirofiston33@gmail.com', 'Healing about Trinite', 'aertyu wertyuerty ertyu rty', 'read', '2026-06-19 11:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` enum('draft','published') DEFAULT 'draft',
  `author` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parish_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `summary`, `content`, `status`, `author`, `created_at`, `parish_id`) VALUES
(4, 'Vicariat Apolostique de', 'team.jpeg', 'irtnn rtithiyjhn', 'rhrtyotjymyntymjrt rtijt', 'published', 'Admin', '2026-06-18 12:46:08', NULL),
(5, 'Youth Pastoral Initiatives and Ecumenical Life', 'team.jpeg', 'The Vicariat apostolique des Comores supports a vibrant youth pastoral agenda within a country that is over 99% Muslim. Under the guidance of Father Jean Claude Mij Riy, the secretary-chancellor of the Vicariat, the Church encourages a synodal and ecumenical approach in organizing activities and celebrations. In preparation for major events like the 2025 Youth Jubilee in Rome and the 2027 World Youth Day in Seoul, young Catholics are trained in dynamic leadership emphasizing dialogue, accompaniment, and sharing.\r\nThe Vicariat fosters ecumenical cooperation through initiatives such as the “Association sportive chrétienne,” which brings together young people from different Christian confessions in sports, and joint choral events to strengthen fellowship and faith practice. In areas like Anjouan, where there is only one Catholic church on the island, Christians of all denominations attend services together, creating a unique \"unnamed ecumenism\" in this small minority community', 'Youth Pastoral Initiatives and Ecumenical Life\r\nThe Vicariat apostolique des Comores supports a vibrant youth pastoral agenda within a country that is over 99% Muslim. Under the guidance of Father Jean Claude Mij Riy, the secretary-chancellor of the Vicariat, the Church encourages a synodal and ecumenical approach in organizing activities and celebrations. In preparation for major events like the 2025 Youth Jubilee in Rome and the 2027 World Youth Day in Seoul, young Catholics are trained in dynamic leadership emphasizing dialogue, accompaniment, and sharing.\r\nThe Vicariat fosters ecumenical cooperation through initiatives such as the “Association sportive chrétienne,” which brings together young people from different Christian confessions in sports, and joint choral events to strengthen fellowship and faith practice. In areas like Anjouan, where there is only one Catholic church on the island, Christians of all denominations attend services together, creating a unique \"unnamed ecumenism\" in this small minority community \r\nwww.vaticannews.va\r\n.\r\nHumanitarian Response: Cyclone Chido in Mayotte\r\nThe Vicariat also plays a key role in humanitarian assistance. After Cyclone Chido devastated Mayotte in December 2024, the Vicariat apostolique des Comores called for solidarity with all affected individuals, regardless of status or background. Infrastructure of the Church itself was damaged, and it opened its facilities to shelter emergency personnel and victims. Father Bienvenu Kasongo highlighted the severe impact, including casualties, destruction of homes, and disruption of essentials like water and electricity.\r\nIn collaboration with organizations like Secours Catholique, Apprentis d’Auteuil, and the Société de Saint-Vincent de Paul, and in coordination with the French government and the European Union, the Vicariat helped deliver emergency supplies, shelter, and medical support. The initiative emphasized inclusivity, providing aid to the entire population affected by the disaster, and promoted solidarity as a guiding principle in reconstruction efforts', 'published', 'Iammaconha', '2026-06-18 14:49:49', NULL),
(6, 'Greetings to Priests', 'mayotte.jpeg', 'Youth Pastoral Initiatives and Ecumenical Life\r\nThe Vicariat apostolique des Comores supports a vibrant youth pastoral agenda within a country that is over 99% Muslim. Under the guidance of Father Jean Claude Mij Riy, the secretary-chancellor of the Vicariat, the Church encourages a synodal and ecumenical approach in organizing activities and celebrations. In preparation for major events like the 2025 Youth Jubilee in Rome and the 2027 World Youth Day in Seoul, young Catholics are trained in dynamic leadership emphasizing dialogue, accompaniment, and sharing.\r\nThe Vicariat fosters ecumenical cooperation through initiatives such as the “Association sportive chrétienne,” which brings together young people from different Christian confessions in sports, and joint choral events to strengthen fellowship and faith practice. In areas like Anjouan, where there is only one Catholic church on the island, Christians of all denominations attend services together, creating a unique \"unnamed ecumenism\" in this small minority community \r\nwww.vaticannews.va\r\n.\r\nHumanitarian Response: Cyclone Chido in Mayotte\r\nThe Vicariat also plays a key role in humanitarian assistance. After Cyclone Chido devastated Mayotte in December 2024, the Vicariat apostolique des Comores called for solidarity with all affected individuals, regardless of status or background. Infrastructure of the Church itself was damaged, and it opened its facilities to shelter emergency person', 'Youth Pastoral Initiatives and Ecumenical Life\r\nThe Vicariat apostolique des Comores supports a vibrant youth pastoral agenda within a country that is over 99% Muslim. Under the guidance of Father Jean Claude Mij Riy, the secretary-chancellor of the Vicariat, the Church encourages a synodal and ecumenical approach in organizing activities and celebrations. In preparation for major events like the 2025 Youth Jubilee in Rome and the 2027 World Youth Day in Seoul, young Catholics are trained in dynamic leadership emphasizing dialogue, accompaniment, and sharing.\r\nThe Vicariat fosters ecumenical cooperation through initiatives such as the “Association sportive chrétienne,” which brings together young people from different Christian confessions in sports, and joint choral events to strengthen fellowship and faith practice. In areas like Anjouan, where there is only one Catholic church on the island, Christians of all denominations attend services together, creating a unique \"unnamed ecumenism\" in this small minority community \r\nwww.vaticannews.va\r\n.\r\nHumanitarian Response: Cyclone Chido in Mayotte\r\nThe Vicariat also plays a key role in humanitarian assistance. After Cyclone Chido devastated Mayotte in December 2024, the Vicariat apostolique des Comores called for solidarity with all affected individuals, regardless of status or background. Infrastructure of the Church itself was damaged, and it opened its facilities to shelter emergency personnel and victims. Father Bienvenu Kasongo highlighted the severe impact, including casualties, destruction of homes, and disruption of essentials like water and electricity.\r\nIn collaboration with organizations like Secours Catholique, Apprentis d’Auteuil, and the Société de Saint-Vincent de Paul, and in coordination with the French government and the European Union, the Vicariat helped deliver emergency supplies, shelter, and medical support. The initiative emphasized inclusivity, providing aid to the entire population affected by the disaster, and promoted solidarity as a guiding principle in reconstruction efforts', 'published', 'Iammaconha', '2026-06-18 14:50:48', NULL),
(7, 'Day Of Joyfull', 'pastro.jpeg', 'Youth Pastoral Initiatives and Ecumenical Life\r\nThe Vicariat apostolique des Comores supports a vibrant youth pastoral agenda within a country that is over 99% Muslim. Under the guidance of Father Jean Claude Mij Riy, the secretary-chancellor of the Vicariat, the Church encourages a synodal and ecumenical approach in organizing activities and celebrations. In preparation for major events like the 2025 Youth Jubilee in Rome and the 2027 World Youth Day in Seoul, young Catholics are trained in dynamic leadership emphasizing dialogue, accompaniment, and sharing.\r\nThe Vicariat fosters ecumenical cooperation through initiatives such as the “Association sportive chrétienne,” which brings together young people from different Christian confessions in sports, and joint choral events to strengthen fellowship and faith practice. In areas like Anjouan, where there is only one Catholic church on the island, Christians of all denominations attend services together, creating a unique \"unnamed ecumenism\" in this small minority community \r\nwww.vaticannews.va\r\n.\r\nHumanitarian Response: Cyclone Chido in Mayotte\r\nThe Vicariat also plays a key role in humanitarian assistance. After Cyclone Chido devastated Mayotte in December 2024, the Vicariat apostolique des Comores called for solidarity with all affected individuals, regardless of status or background. Infrastructure of the Church itself was damaged, and it opened its facilities to shelter emergency personnel ', 'Youth Pastoral Initiatives and Ecumenical Life\r\nThe Vicariat apostolique des Comores supports a vibrant youth pastoral agenda within a country that is over 99% Muslim. Under the guidance of Father Jean Claude Mij Riy, the secretary-chancellor of the Vicariat, the Church encourages a synodal and ecumenical approach in organizing activities and celebrations. In preparation for major events like the 2025 Youth Jubilee in Rome and the 2027 World Youth Day in Seoul, young Catholics are trained in dynamic leadership emphasizing dialogue, accompaniment, and sharing.\r\nThe Vicariat fosters ecumenical cooperation through initiatives such as the “Association sportive chrétienne,” which brings together young people from different Christian confessions in sports, and joint choral events to strengthen fellowship and faith practice. In areas like Anjouan, where there is only one Catholic church on the island, Christians of all denominations attend services together, creating a unique \"unnamed ecumenism\" in this small minority community \r\nwww.vaticannews.va\r\n.\r\nHumanitarian Response: Cyclone Chido in Mayotte\r\nThe Vicariat also plays a key role in humanitarian assistance. After Cyclone Chido devastated Mayotte in December 2024, the Vicariat apostolique des Comores called for solidarity with all affected individuals, regardless of status or background. Infrastructure of the Church itself was damaged, and it opened its facilities to shelter emergency personnel and victims. Father Bienvenu Kasongo highlighted the severe impact, including casualties, destruction of homes, and disruption of essentials like water and electricity.\r\nIn collaboration with organizations like Secours Catholique, Apprentis d’Auteuil, and the Société de Saint-Vincent de Paul, and in coordination with the French government and the European Union, the Vicariat helped deliver emergency supplies, shelter, and medical support. The initiative emphasized inclusivity, providing aid to the entire population affected by the disaster, and promoted solidarity as a guiding principle in reconstruction efforts', 'published', 'Iammaconha', '2026-06-18 14:52:59', NULL),
(8, 'Testing', 'miss.jpeg', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'published', 'Hertier', '2026-06-22 09:55:22', NULL),
(9, 'Testing', 'u15.jpeg', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'published', 'Valentin', '2026-06-22 10:14:55', NULL),
(10, 'Testing news limit', 'crosslogo.jpg', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'published', 'Achille', '2026-06-22 10:15:37', NULL),
(11, 'Testing Freeman', 'bgme.jpg', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.Once upon a time, in a small town nestled between rolling hills and dense forests, there lived an old clockmaker named Elias. He was known far and wide for his remarkable skill in crafting intricate timepieces, each one a marvel of engineering and artistry. The townspeople often marveled at the precision of his clocks, which not only kept impeccable time but also possessed tiny, hidden features that brought joy to those who discovered them. Some clocks played soft melodies when the hour struck, while others revealed delicate moving figures of dancers, miniature animals, or mystical creatures. People from neighboring towns would travel for hours just to observe the subtle, magical details that Elias infused into his creations.', 'published', 'Louis', '2026-06-22 10:16:45', NULL),
(14, 'News To New Please', 'catr.jpeg', 'NEWWWWWW', 'A typical passage of Lorem Ipsum reads:\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. A typical passage of Lorem Ipsum reads:\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.', 'published', 'Iammaconha', '2026-07-08 07:22:22', 3),
(17, 'Clever is my lil Brother', 'bgme.jpg', 'Once upon a time, in a quiet village nestled between rolling hills and dense forests, there lived an old storyteller named Amari. Amari was known throughout the village not just for the tales he told, but for the way he wove stories that seemed to gloss over the boundaries between reality and imagination. Each evening, children and adults alike would gather around the large oak tree in the village square, eager to hear the latest story that Amari had spun during the day. His stories were not mere entertainment; they carried lessons hidden in the folds of fantastical adventures, lessons that often made listeners ponder the values of courage, kindness, and wisdom long after the fires had dimmed and the audience had dispersed. One day, a stranger arrived in the village, cloaked in garments of deep indigo, and carried with him a mysterious box that no one was allowed to open. The stranger spoke of a treasure that would reveal itself only to those who could solve a puzzle hidden within a riddle, a puzzle that required not only sharpness of mind but also honesty of heart. Intrigued, Amari offered to listen carefully to the stranger\'s words and share the story with the villagers. The tale took hours to unfold, but it held everyone spellbound, and as the night deepened, listeners began to reflect upon their courage to confront fears and their compassion toward others. The story ended without a resolution from the stranger; instead, he left the village quietly, urging each listener to seek the treasure within themselves. In that moment, the villagers realized that the true value of the story lay not in the tangible reward of the box, but in the way it inspired them to explore their own virtues, to challenge themselves, and to understand that every action, however small, contributed to the richness of life that each passed day could bring. Over time, the old oak tree became a symbol of hope and learning, and gene', 'Once upon a time, in a quiet village nestled between rolling hills and dense forests, there lived an old storyteller named Amari. Amari was known throughout the village not just for the tales he told, but for the way he wove stories that seemed to gloss over the boundaries between reality and imagination. Each evening, children and adults alike would gather around the large oak tree in the village square, eager to hear the latest story that Amari had spun during the day. His stories were not mere entertainment; they carried lessons hidden in the folds of fantastical adventures, lessons that often made listeners ponder the values of courage, kindness, and wisdom long after the fires had dimmed and the audience had dispersed. One day, a stranger arrived in the village, cloaked in garments of deep indigo, and carried with him a mysterious box that no one was allowed to open. The stranger spoke of a treasure that would reveal itself only to those who could solve a puzzle hidden within a riddle, a puzzle that required not only sharpness of mind but also honesty of heart. Intrigued, Amari offered to listen carefully to the stranger\'s words and share the story with the villagers. The tale took hours to unfold, but it held everyone spellbound, and as the night deepened, listeners began to reflect upon their courage to confront fears and their compassion toward others. The story ended without a resolution from the stranger; instead, he left the village quietly, urging each listener to seek the treasure within themselves. In that moment, the villagers realized that the true value of the story lay not in the tangible reward of the box, but in the way it inspired them to explore their own virtues, to challenge themselves, and to understand that every action, however small, contributed to the richness of life that each passed day could bring. Over time, the old oak tree became a symbol of hope and learning, and geneOnce upon a time, in a quiet village nestled between rolling hills and dense forests, there lived an old storyteller named Amari. Amari was known throughout the village not just for the tales he told, but for the way he wove stories that seemed to gloss over the boundaries between reality and imagination. Each evening, children and adults alike would gather around the large oak tree in the village square, eager to hear the latest story that Amari had spun during the day. His stories were not mere entertainment; they carried lessons hidden in the folds of fantastical adventures, lessons that often made listeners ponder the values of courage, kindness, and wisdom long after the fires had dimmed and the audience had dispersed. One day, a stranger arrived in the village, cloaked in garments of deep indigo, and carried with him a mysterious box that no one was allowed to open. The stranger spoke of a treasure that would reveal itself only to those who could solve a puzzle hidden within a riddle, a puzzle that required not only sharpness of mind but also honesty of heart. Intrigued, Amari offered to listen carefully to the stranger\'s words and share the story with the villagers. The tale took hours to unfold, but it held everyone spellbound, and as the night deepened, listeners began to reflect upon their courage to confront fears and their compassion toward others. The story ended without a resolution from the stranger; instead, he left the village quietly, urging each listener to seek the treasure within themselves. In that moment, the villagers realized that the true value of the story lay not in the tangible reward of the box, but in the way it inspired them to explore their own virtues, to challenge themselves, and to understand that every action, however small, contributed to the richness of life that each passed day could bring. Over time, the old oak tree became a symbol of hope and learning, and gene', 'published', 'Iammaconha', '2026-07-09 09:38:15', NULL),
(20, 'We are Here For you.', 'apostolsme1.png', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\\r\\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\\r\\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', 'published', 'Thierry', '2026-07-16 16:55:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `other_sites`
--

CREATE TABLE `other_sites` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parishe`
--

CREATE TABLE `parishe` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `history` longtext DEFAULT NULL,
  `parish_life` longtext DEFAULT NULL,
  `council` longtext DEFAULT NULL,
  `commissions` longtext DEFAULT NULL,
  `groups_movements` longtext DEFAULT NULL,
  `organisation` longtext DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `map` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parishe`
--

INSERT INTO `parishe` (`id`, `name`, `slug`, `hero_image`, `logo`, `history`, `parish_life`, `council`, `commissions`, `groups_movements`, `organisation`, `address`, `phone`, `email`, `website`, `facebook`, `youtube`, `instagram`, `map`, `created_at`) VALUES
(3, 'Sainte Therese Mayotee', 'saintetherese', '../uploads/catr.jpeg', '../uploads/logo.webp', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Kigali City Tower', '0788382024', 'bertinbebe11@gmail.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2026-06-26 10:03:11'),
(4, 'Sainte Michelle Mamduzo', 'saintetherese', '../uploads/catr.jpeg', '../uploads/charities.jpeg', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vel, quasi delectus quos cupiditate doloribus laudantium voluptate, consectetur sequi illo expedita error dolores nobis perferendis minus voluptatem autem unde ex.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio perspiciatis commodi ratione? Error officiis cum facere sint, perferendis voluptatem, quia voluptatum autem exercitationem dolore, minima quos libero sapiente adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, quo dignissimos? Dignissimos dicta dolores harum aperiam nostrum nam. Dolorum omnis ducimus quibusdam soluta eaque et dignissimos nihil veniam illum quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae aut nobis, delectus enim quia, voluptates ab harum non veniam provident tempore ut pariatur! Sapiente, corrupti quasi eveniet excepturi dolore commodi?', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vel, quasi delectus quos cupiditate doloribus laudantium voluptate, consectetur sequi illo expedita error dolores nobis perferendis minus voluptatem autem unde ex.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio perspiciatis commodi ratione? Error officiis cum facere sint, perferendis voluptatem, quia voluptatum autem exercitationem dolore, minima quos libero sapiente adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, quo dignissimos? Dignissimos dicta dolores harum aperiam nostrum nam. Dolorum omnis ducimus quibusdam soluta eaque et dignissimos nihil veniam illum quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae aut nobis, delectus enim quia, voluptates ab harum non veniam provident tempore ut pariatur! Sapiente, corrupti quasi eveniet excepturi dolore commodi?', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vel, quasi delectus quos cupiditate doloribus laudantium voluptate, consectetur sequi illo expedita error dolores nobis perferendis minus voluptatem autem unde ex.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio perspiciatis commodi ratione? Error officiis cum facere sint, perferendis voluptatem, quia voluptatum autem exercitationem dolore, minima quos libero sapiente adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, quo dignissimos? Dignissimos dicta dolores harum aperiam nostrum nam. Dolorum omnis ducimus quibusdam soluta eaque et dignissimos nihil veniam illum quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae aut nobis, delectus enim quia, voluptates ab harum non veniam provident tempore ut pariatur! Sapiente, corrupti quasi eveniet excepturi dolore commodi?', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vel, quasi delectus quos cupiditate doloribus laudantium voluptate, consectetur sequi illo expedita error dolores nobis perferendis minus voluptatem autem unde ex.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio perspiciatis commodi ratione? Error officiis cum facere sint, perferendis voluptatem, quia voluptatum autem exercitationem dolore, minima quos libero sapiente adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, quo dignissimos? Dignissimos dicta dolores harum aperiam nostrum nam. Dolorum omnis ducimus quibusdam soluta eaque et dignissimos nihil veniam illum quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae aut nobis, delectus enim quia, voluptates ab harum non veniam provident tempore ut pariatur! Sapiente, corrupti quasi eveniet excepturi dolore commodi?', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vel, quasi delectus quos cupiditate doloribus laudantium voluptate, consectetur sequi illo expedita error dolores nobis perferendis minus voluptatem autem unde ex.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio perspiciatis commodi ratione? Error officiis cum facere sint, perferendis voluptatem, quia voluptatum autem exercitationem dolore, minima quos libero sapiente adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, quo dignissimos? Dignissimos dicta dolores harum aperiam nostrum nam. Dolorum omnis ducimus quibusdam soluta eaque et dignissimos nihil veniam illum quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae aut nobis, delectus enim quia, voluptates ab harum non veniam provident tempore ut pariatur! Sapiente, corrupti quasi eveniet excepturi dolore commodi?', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vel, quasi delectus quos cupiditate doloribus laudantium voluptate, consectetur sequi illo expedita error dolores nobis perferendis minus voluptatem autem unde ex.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio perspiciatis commodi ratione? Error officiis cum facere sint, perferendis voluptatem, quia voluptatum autem exercitationem dolore, minima quos libero sapiente adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, quo dignissimos? Dignissimos dicta dolores harum aperiam nostrum nam. Dolorum omnis ducimus quibusdam soluta eaque et dignissimos nihil veniam illum quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae aut nobis, delectus enim quia, voluptates ab harum non veniam provident tempore ut pariatur! Sapiente, corrupti quasi eveniet excepturi dolore commodi?', 'Kigali City Tower', '0788382024', 'bertinbebe11@gmail.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vel, quasi delectus quos cupiditate doloribus laudantium voluptate, consectetur sequi illo expedita error dolores nobis perferendis minus voluptatem autem unde ex.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio perspiciatis commodi ratione? Error officiis cum facere sint, perferendis voluptatem, quia voluptatum autem exercitationem dolore, minima quos libero sapiente adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor, quo dignissimos? Dignissimos dicta dolores harum aperiam nostrum nam. Dolorum omnis ducimus quibusdam soluta eaque et dignissimos nihil veniam illum quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae aut nobis, delectus enim quia, voluptates ab harum non veniam provident tempore ut pariatur! Sapiente, corrupti quasi eveniet excepturi dolore commodi?', '2026-06-28 17:08:27'),
(5, 'Sainte Michelle Mamduzo', 'saintetherese', '../uploads/mexiconha.jpg', '../uploads/boook.jpg', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky, imagining herself traveling across these distant lands, meeting new people, and discovering cultures', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky, imagining herself traveling across these distant lands, meeting new people, and discovering cultures', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky, imagining herself traveling across these distant lands, meeting new people, and discovering cultures', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky, imagining herself traveling across these distant lands, meeting new people, and discovering cultures', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky, imagining herself traveling across these distant lands, meeting new people, and discovering cultures', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky, imagining herself traveling across these distant lands, meeting new people, and discovering cultures', 'Kigali City Tower', '0788382024', 'bertinbebe11@gmail.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky, imagining herself traveling across these distant lands, meeting new people, and discovering cultures', '2026-07-03 13:20:00'),
(7, 'Sainte Michelle Thresese', 'saintetherese', '../uploads/catr.jpeg', '../uploads/lologo.jpeg', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky,', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky,', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky,', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky,', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky,', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky,', 'Kigali City Tower', '0788382024', 'bertinbebe11@gmail.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'Once upon a time, in a small village nestled between rolling hills and dense forests, there lived a young girl named Amina. She had always been fascinated by the world beyond the narrow paths of her village. Every evening, she would sit by the window, gazing at the distant mountains as the sun dipped below the horizon, dreaming of adventures she had never yet experienced. The villagers often spoke of ancient stories—tales of explorers, mysterious lands, and hidden treasures—but none had the courage to venture far from home. Amina, however, felt a calling she could not ignore, a quiet whisper urging her toward the unknown.\r\nHer curiosity was matched only by her resilience. She spent her days learning from the village elders, absorbing knowledge about herbal remedies, traditional crafts, and oral histories passed down through generations. One day, a wandering storyteller arrived, bringing with him a collection of maps and journals from faraway places. He spoke of towering waterfalls, bustling cities, and deserts so vast that the horizon seemed endless. Amina listened intently, captivated by his stories. That night, she lay beneath the starlit sky,', '2026-07-03 13:36:49'),
(9, 'Sainte Michelle Messi', 'lionelmessi', '../uploads/padili.jpeg', '../uploads/logo.webp', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', 'Kigali City Tower', '0788382024', 'bertinbebe11@gmail.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'One illustrative example is a structured long paragraph about Hermes, the Greek Olympian god:\r\nHermes is a Greek Olympian god, born to Zeus and Maya, known for his quick thinking and cunning nature. He is the youngest of the Olympians and is famous for moving swiftly between the divine and mortal worlds. Because of this ability, Hermes often acted as a messenger between humans and gods. A benevolent deity, Hermes protects travelers and athletes, yet he is mischievous, often playing tricks on other gods either for his amusement or to help humans avoid divine wrath. Hermes possesses wings on his sandals, making him the fastest of all gods. Even as a child, he was compelled to steal, which earned him recognition as the patron of thieves. This lengthier paragraph captures a cohesive topic while offering detailed information and narrative flow ', '2026-07-16 16:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `parishes`
--

CREATE TABLE `parishes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `priest` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mass_schedule` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parishes`
--

INSERT INTO `parishes` (`id`, `name`, `image`, `description`, `location`, `priest`, `phone`, `email`, `mass_schedule`, `created_at`) VALUES
(4, 'La cathédrale Sainte Thérèse de l’Enfant Jésus Moroni', 'church.jpeg', 'La cathédrale Sainte Thérèse de l’Enfant Jésus est située à Moroni, la capitale des Comores, et sert de centre religieux pour la communauté catholique locale. Elle est dédiée à Sainte Thérèse de Lisieux, également connue sous le nom de Thérèse de l’Enfant Jésus, carmélite française canonisée en 1925, célèbre pour sa \"petite voie\" spirituelle axée sur l\'amour et la simplicité de la vie chrétienne \r\nCette cathédrale est le lieu principal des messes et cérémonies importantes pour l’Église catholique dans l’archipel.', 'Moroni City', 'Pope Benedict XVI', '00269 773 05 03', 'B.P. 46, Moroni, Union of Comoros', 'The Cathédrale Sainte Thérèse de l\'Enfant Jésus is the main Roman Catholic church in Moroni, Comoros, serving the local Catholic community and following the Latin rite. It is under the jurisdiction of the Vicariat Apostolique des Îles Comores and is a central place of worship in a predominantly Islamic country.', '2026-06-22 13:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `parish_news`
--

CREATE TABLE `parish_news` (
  `id` int(11) NOT NULL,
  `parish_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parish_prayers`
--

CREATE TABLE `parish_prayers` (
  `id` int(11) NOT NULL,
  `parish_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `prayer_day` varchar(50) DEFAULT NULL,
  `prayer_time` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parish_prayers`
--

INSERT INTO `parish_prayers` (`id`, `parish_id`, `title`, `prayer_day`, `prayer_time`, `description`, `created_at`) VALUES
(6, 4, 'Misaa', 'Sunday', '12:00', 'It is the main church in the Islamic majority island group.[4] The other two Catholic churches are in neighboring Mayotte, which is part of the same archipelago but is an overseas department of France.', '2026-06-22 14:24:07'),
(7, 4, 'Missa ', 'Monday', '10:00', 'It is the main church in the Islamic majority island group.[4] The other two Catholic churches are in neighboring Mayotte, which is part of the same archipelago but is an overseas department of France.', '2026-06-22 14:24:26'),
(8, 4, 'Missa', 'Tuesday', '09:00', 'It is the main church in the Islamic majority island group.[4] The other two Catholic churches are in neighboring Mayotte, which is part of the same archipelago but is an overseas department of France.', '2026-06-22 14:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `prayer_schedule`
--

CREATE TABLE `prayer_schedule` (
  `id` int(11) NOT NULL,
  `parish_id` int(11) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `coordinator` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parish_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `image`, `short_description`, `description`, `category`, `coordinator`, `phone`, `email`, `status`, `created_at`, `parish_id`) VALUES
(4, 'wetryuio rsetdrtfyguhlij ', '1781780018_church.jpeg', 'vmrth re wasedrftgyui erdtfgjh erdtfgh yjhgngdtefdffdjrv bffbgonbgfiog ifnfvivfn', 'uiodrteirdgiuhtgshd iurrrrrrrrrrdfhj rffdbfdbidfbfidfnvijerneivbv ruibfidb ruierguib grbiber idj ierubgrfbf', 'Choir', 'Fiston', '0791886292', 'bertinbebe7@gmail.com', 'active', '2026-06-18 10:53:38', NULL),
(5, 'Learn Bible', '1781785437_crosslogo.jpg', '2qrwetrydtigo', 'wetsrdfgjtdf warertyjgwtert', 'Education', 'Fiston', '0791886292', 'bertinbebe7@gmail.com', 'active', '2026-06-18 12:23:57', NULL),
(6, 'Walking in His Light, Together as One', '1781858445_church.jpeg', 'Walking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as One', 'Walking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as One', 'Catechism', 'Fiston', '0791886292', 'bertinbebe7@gmail.com', 'active', '2026-06-19 08:40:45', NULL),
(7, 'Walking in His Light, Together as One', '1781858494_cholare.jpeg', 'Walking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as One', 'Walking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as OneWalking in His Light, Together as One', 'Family', 'Fiston', '0791886292', 'bertinbebe7@gmail.com', 'active', '2026-06-19 08:41:34', NULL),
(9, 'Remember My Name', '1784234704_u15.jpeg', 'Hermes, a Greek Olympian god, is known for his quick thinking and cunning nature. Born to Zeus and Maya, he is the youngest of the Olympians and often acts as a messenger between gods and humans. Hermes protects travelers and athletes, but he is also mischievous, playing tricks on other gods for amusement or to save people from divine wrath. Even as a child, he could not resist stealing, which earned him the title of patron god', 'Hermes, a Greek Olympian god, is known for his quick thinking and cunning nature. Born to Zeus and Maya, he is the youngest of the Olympians and often acts as a messenger between gods and humans. Hermes protects travelers and athletes, but he is also mischievous, playing tricks on other gods for amusement or to save people from divine wrath. Even as a child, he could not resist stealing, which earned him the title of patron godHermes, a Greek Olympian god, is known for his quick thinking and cunning nature. Born to Zeus and Maya, he is the youngest of the Olympians and often acts as a messenger between gods and humans. Hermes protects travelers and athletes, but he is also mischievous, playing tricks on other gods for amusement or to save people from divine wrath. Even as a child, he could not resist stea\'s', 'Youth', 'Fiston', '0785115378', 'byiringirofiston33@gmail.com', 'inactive', '2026-07-16 20:45:04', 5);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor','user') DEFAULT 'user',
  `profile_image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `role`, `profile_image`, `status`, `created_at`) VALUES
(1, 'Administrator', 'admin@comores.org', '', '0192023a7bbd73250516f069df18b500', 'admin', NULL, 'active', '2026-06-18 09:01:02'),
(2, 'BYIRINGIRO Fiston', 'byiringirofiston33@gmail.com', '0791886292', '$2y$10$hFV9d.lkSLJlMVWZVyiVZ.NoTyFuiBbeo5wFa11Ys8l.fAjj5e1m6', 'admin', '', 'active', '2026-06-18 09:10:08'),
(3, 'Richard', 'richforever@gmail.com', '07888125466', '$2y$10$fnqAiJvUghZkhZLU02HMnukhY00By1X2AntentWknViQ1Rb.7U41K', 'user', '', 'active', '2026-06-18 15:37:34'),
(4, 'Alliance UWINEZA', 'alliancewacu@gmail.com', '0791886292', '$2y$10$j8NXqOYhn5yRFT3WH/pHJ.ocGItAmDpxL/cGwbadeqZlrFUTtoXxK', 'user', '', 'active', '2026-07-17 15:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_events_parish` (`parish_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gallery_parish` (`parish_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_parish` (`parish_id`);

--
-- Indexes for table `other_sites`
--
ALTER TABLE `other_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parishe`
--
ALTER TABLE `parishe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parishes`
--
ALTER TABLE `parishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parish_news`
--
ALTER TABLE `parish_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parish_prayers`
--
ALTER TABLE `parish_prayers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parish_id` (`parish_id`);

--
-- Indexes for table `prayer_schedule`
--
ALTER TABLE `prayer_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parish_id` (`parish_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `other_sites`
--
ALTER TABLE `other_sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parishe`
--
ALTER TABLE `parishe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `parishes`
--
ALTER TABLE `parishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parish_news`
--
ALTER TABLE `parish_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parish_prayers`
--
ALTER TABLE `parish_prayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prayer_schedule`
--
ALTER TABLE `prayer_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_parish` FOREIGN KEY (`parish_id`) REFERENCES `parishe` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gallery_parish` FOREIGN KEY (`parish_id`) REFERENCES `parishe` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_parish` FOREIGN KEY (`parish_id`) REFERENCES `parishe` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `parish_prayers`
--
ALTER TABLE `parish_prayers`
  ADD CONSTRAINT `parish_prayers_ibfk_1` FOREIGN KEY (`parish_id`) REFERENCES `parishes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prayer_schedule`
--
ALTER TABLE `prayer_schedule`
  ADD CONSTRAINT `prayer_schedule_ibfk_1` FOREIGN KEY (`parish_id`) REFERENCES `parishe` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
