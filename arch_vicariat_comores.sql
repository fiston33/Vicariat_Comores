-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2026 at 02:01 PM
-- Server version: 10.3.39-MariaDB-log
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arch_vicariat_comores`
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
(16, 'DUSABIMANA Bertin', 'bertinbebe8@gmail.com', '0788382024', 0.00, '', 'confirmed', '2026-07-17 16:04:45');

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
(1, 'Assemblée Générale Pastorale du Vicariat', '1786037504_church.jpeg', 'Un temps fort de communion et de réflexion a eu lieu lors d’une rencontre pastorale réunissant les prêtres, les religieux et les responsables des communautés de l’archipel des Comores. Cette assemblée avait pour objectif de partager les orientations de la mission de l’Église et de renforcer la collaboration entre les différents acteurs pastoraux.\r\n\r\nDans une atmosphère fraternelle, les participants ont échangé sur les défis actuels de la vie chrétienne et sur les moyens concrets de répondre aux besoins spirituels et humains des fidèles. La rencontre a permis de mettre en lumière l’importance de l’unité, de la coresponsabilité et de l’engagement missionnaire dans le contexte particulier des Comores.\r\n\r\nCe rassemblement pastoral a été marqué par des moments de prière, de dialogue et de discernement, offrant à chacun l’occasion de renouveler son engagement au service de l’Évangile. Il témoigne de la vitalité de l’Église locale et de sa volonté de poursuivre sa mission avec joie et espérance.', 'Moroni - Vicariat Apostolique des Comores', '2026-09-15', 'published', '2026-08-06 17:27:21', NULL),
(2, 'Journée Diocésaine de la Jeunesse Catholique', '1786037706_Itara.jpeg', 'La paroisse Sainte Thérèse de l’Enfant Jésus a organisé une journée entièrement consacrée aux jeunes, placée sous le signe de la prière, de la formation et de la fraternité. Cet événement a rassemblé de nombreux participants désireux de vivre une expérience chrétienne authentique et de renforcer leur engagement dans la communauté.\r\n\r\nTout au long de la journée, les jeunes ont pris part à des temps de prière animés par la chorale, à des sessions de formation biblique et spirituelle, ainsi qu’à des ateliers de partage sur les défis de la jeunesse chrétienne aujourd’hui. Des activités fraternelles, telles que des jeux, des chants et des moments conviviaux, ont permis de créer une atmosphère joyeuse et familiale.\r\n\r\nCette rencontre a été l’occasion pour les jeunes de grandir dans la foi, de découvrir la richesse de la vie communautaire et de s’engager davantage dans la mission de l’Église. Elle témoigne du dynamisme de la jeunesse paroissiale et de son rôle essentiel dans la vitalité de la communauté.', 'Moroni', '2026-10-10', 'published', '2026-08-06 17:27:21', NULL),
(3, 'Célébration de la Messe Chrismale', '1786038194_Apropos.jpeg', 'Les prêtres et les fidèles du Vicariat se sont réunis pour vivre ensemble la célébration de la Messe Chrismale, un moment liturgique d’une grande importance dans la vie de l’Église. Cette célébration a été marquée par la bénédiction des huiles saintes destinées aux sacrements et par le renouvellement des engagements sacerdotaux des prêtres.\r\n\r\nDans une atmosphère de prière et de communion, les fidèles ont accompagné leurs pasteurs dans ce geste de fidélité et de service, témoignant de leur soutien et de leur proximité spirituelle. La Messe Chrismale rappelle la mission confiée aux prêtres d’annoncer l’Évangile, de sanctifier le peuple de Dieu et de servir dans la charité.\r\n\r\nCet événement a renforcé l’unité de la communauté et a renouvelé l’élan missionnaire du Vicariat, invitant chacun à vivre pleinement sa vocation chrétienne dans la joie et l’espérance.', 'Cathédrale Sainte Thérèse de l’Enfant Jésus - Moroni', '2027-03-25', 'published', '2026-08-06 17:27:21', NULL),
(4, 'Rencontre des mouvements et associations catholiques', '1786038365_MayGodBlessYouMa2.jpeg', 'La paroisse Sainte Thérèse de l’Enfant Jésus a accueilli une rencontre fraternelle réunissant les différents groupes et mouvements paroissiaux. Ce temps de communion avait pour objectif de renforcer la collaboration pastorale et de favoriser une meilleure coordination des activités au service de la mission de l’Église.\r\n\r\nDans une ambiance conviviale et fraternelle, les participants ont partagé leurs expériences, leurs projets et leurs défis. Les échanges ont permis de mettre en lumière la richesse et la diversité des engagements au sein de la communauté, tout en rappelant l’importance de travailler ensemble dans l’unité et la coresponsabilité.\r\n\r\nCette rencontre a été vécue comme un signe fort de solidarité et d’ouverture, invitant chaque groupe à contribuer avec ses talents et ses initiatives à la vitalité de la paroisse. Elle témoigne de la volonté commune de bâtir une Église vivante, proche des fidèles et engagée dans la mission évangélique.', 'Centre pastoral du Vicariat', '2026-11-20', 'published', '2026-08-06 17:27:21', NULL),
(5, 'Fête Patronale de la Cathédrale Sainte Thérèse', '1786039049_BackyMama.jpeg', 'La communauté paroissiale s’est rassemblée pour célébrer sa sainte patronne, Sainte Thérèse de l’Enfant Jésus, lors d’une grande célébration eucharistique suivie d’activités communautaires. Cet événement annuel est un moment fort de la vie de la paroisse, marqué par la prière, la fraternité et la joie partagée.\r\n\r\nLa messe solennelle, présidée par le curé entouré des prêtres et des fidèles, a donné à chacun l’occasion de renouveler son engagement de foi et de rendre grâce pour la mission de l’Église. Les chants liturgiques et la ferveur des participants ont créé une atmosphère de communion et d’espérance.\r\n\r\nAprès la célébration eucharistique, diverses activités communautaires ont été organisées : partages fraternels, animations culturelles et moments conviviaux. Ces initiatives ont permis de renforcer les liens entre les membres de la paroisse et de témoigner de la vitalité d’une Église vivante et missionnaire.\r\n\r\nCette fête patronale rappelle à tous l’exemple de Sainte Thérèse, modèle de simplicité, d’amour et de service, et invite la communauté à poursuivre son chemin de foi dans la joie et la fraternité.', 'Cathédrale Sainte Thérèse de l’Enfant Jésus - Moroni', '2026-10-01', 'published', '2026-08-06 17:27:21', 17),
(6, 'Retraite spirituelle paroissiale', '1786039257_WhatsApp Image 2026-06-25 at 15.51.04.jpeg', 'La paroisse Sainte Thérèse de l’Enfant Jésus a proposé aux fidèles un temps privilégié de prière, de méditation et de renouvellement spirituel. Cet événement a été conçu comme une occasion de se rapprocher du Seigneur, de se ressourcer intérieurement et de raviver la flamme de la foi.\r\n\r\nDans une atmosphère de silence et de recueillement, les participants ont été invités à déposer leurs intentions, leurs joies et leurs peines devant Dieu. Les moments de méditation ont permis à chacun de réfléchir sur son chemin spirituel et de trouver un nouvel élan pour vivre pleinement l’Évangile.\r\n\r\nCe temps de grâce a également favorisé la fraternité entre les fidèles, rappelant que la prière communautaire est une source de force et d’unité. Il témoigne de la vitalité de la paroisse et de son désir constant d’accompagner les croyants dans leur cheminement spirituel.', 'Paroisse Saint Joseph', '2026-08-22', 'published', '2026-08-06 17:27:21', 17),
(7, 'Formation des jeunes servants dï¿½autel', '1786039363_Godisgood.jpeg', 'La paroisse Sainte ThÃ©rÃ¨se de lâ€™Enfant JÃ©sus a organisÃ© une formation destinÃ©e aux jeunes engagÃ©s dans le service liturgique afin de les aider Ã  mieux accomplir leur mission. Cet Ã©vÃ©nement a rassemblÃ© de nombreux participants dÃ©sireux de grandir dans leur rÃ´le au sein de la liturgie et de renforcer leur engagement au service de lâ€™Ã‰glise.\r\n\r\nAu cours de cette formation, les jeunes ont reÃ§u des enseignements pratiques et spirituels sur la signification des gestes liturgiques, lâ€™importance de la prÃ©paration et le sens profond de leur service. Des ateliers interactifs et des moments de partage ont permis dâ€™approfondir leur comprÃ©hension et de dÃ©velopper un esprit de responsabilitÃ© et de fraternitÃ©.\r\n\r\nCette initiative vise Ã  encourager les jeunes Ã  vivre leur mission avec sÃ©rieux, joie et dÃ©vouement, en contribuant activement Ã  la beautÃ© et Ã  la dignitÃ© des cÃ©lÃ©brations eucharistiques. Elle tÃ©moigne de la volontÃ© de la paroisse de former une jeunesse engagÃ©e, consciente de son rÃ´le et prÃªte Ã  servir avec foi et humilitÃ©.', 'Paroisse Sainte Marie', '2026-09-05', 'published', '2026-08-06 17:27:21', 17),
(8, 'Rencontre familiale et journï¿½e fraternelle', '1786039507_MayGodBlessYouMa3.jpeg', 'La communautÃ© paroissiale de Sainte ThÃ©rÃ¨se de lâ€™Enfant JÃ©sus a vÃ©cu une journÃ©e spÃ©ciale consacrÃ©e aux familles, placÃ©e sous le signe du partage, de la priÃ¨re et de la convivialitÃ©. Cet Ã©vÃ©nement a rassemblÃ© parents et enfants dans une atmosphÃ¨re fraternelle et joyeuse, renforÃ§ant les liens au sein de la paroisse.\r\n\r\nLa journÃ©e a dÃ©butÃ© par un temps de priÃ¨re communautaire, invitant chaque famille Ã  confier ses joies et ses dÃ©fis au Seigneur. Des moments de mÃ©ditation et de rÃ©flexion ont permis aux participants de renouveler leur engagement chrÃ©tien et de redÃ©couvrir la beautÃ© de la vie familiale vÃ©cue dans la foi.\r\n\r\nDes activitÃ©s conviviales et des ateliers de partage ont ensuite favorisÃ© lâ€™Ã©change dâ€™expÃ©riences entre les familles, crÃ©ant un espace dâ€™Ã©coute et de solidaritÃ©. Les enfants ont participÃ© Ã  des animations ludiques, tandis que les parents ont pris part Ã  des discussions sur lâ€™Ã©ducation chrÃ©tienne et la mission familiale dans lâ€™Ã‰glise.\r\n\r\nCette journÃ©e a Ã©tÃ© un signe fort de communion et dâ€™espÃ©rance, rappelant que la famille est le cÅ“ur vivant de la communautÃ© paroissiale et un pilier essentiel de la mission de lâ€™Ã‰glise.', 'Paroisse Notre Dame de la Paix', '2026-12-12', 'published', '2026-08-06 17:27:21', 17);

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
(1, 'Sonam Prajapati', 'sonam.rocketdigitaltech@gmail.com', 'Improve Your Search Engine Visibility', 'Hello,\r\n\r\nWe can place your website on Google 1st page.\r\n\r\nI can give you our Complete SEO Action Plan along with a customary reach and add great value to your product/ service.\r\n\r\nI may send you a SEO Packages & price list. If interested.\r\n\r\nBest Regards,\r\nsonam\r\nOnline SEO Consultant', 'read', '2026-08-05 00:10:53'),
(2, 'Alicia Wozniak', 'noreply@noreply-archipelsdecomores.org', 'Ready to build archipelsdecomores.org?', 'Hey Archipelsdecomores Org team,\r\n\r\nVisitors to your website are shown a security warning by their browser (Chrome, Firefox, etc.) — most of them won\'t continue after seeing it.\r\n\r\nThe great news: We run WebLaunched providing businesses like yours their own professional website for a small monthly subscription, with everything included — no other invoices. \r\n\r\nExamples: WebLaunched.net', 'unread', '2026-08-10 17:10:24'),
(3, 'Alicia Wozniak', 'noreply@noreply-archipelsdecomores.org', 'Ready to build archipelsdecomores.org?', 'Hey Archipelsdecomores Org team,\r\n\r\nVisitors to your website are shown a security warning by their browser (Chrome, Firefox, etc.) — most of them won\'t continue after seeing it.\r\n\r\nThe great news: We run WebLaunched providing businesses like yours their own professional website for a small monthly subscription, with everything included — no other invoices. \r\n\r\nExamples: WebLaunched.net', 'unread', '2026-08-10 17:10:26'),
(4, 'Alicia Wozniak', 'noreply@noreply-archipelsdecomores.org', 'Ready to build archipelsdecomores.org?', 'Hey Archipelsdecomores Org team,\r\n\r\nVisitors to your website are shown a security warning by their browser (Chrome, Firefox, etc.) — most of them won\'t continue after seeing it.\r\n\r\nThe great news: We run WebLaunched providing businesses like yours their own professional website for a small monthly subscription, with everything included — no other invoices. \r\n\r\nExamples: WebLaunched.net', 'unread', '2026-08-10 17:10:28'),
(5, 'Ward Jackman', 'domains@search-archipelsdecomores.org', 'Results for archipelsdecomores.org', 'Hello\r\n\r\nSubmit archipelsdecomores.org in Google\'s Search Index to appear in online search results!\r\n\r\nSubmit archipelsdecomores.org today:\r\n\r\nsearchindex.net', 'unread', '2026-08-13 18:23:53'),
(6, 'Birgit Mendenhall', 'noreply@noreply-archipelsdecomores.org', 'Ready to build archipelsdecomores.org?', 'Hello archipelsdecomores.org team,\r\n\r\nWe have noticed something about archipelsdecomores.org. Visitors to your website are shown a security warning by their browser (Chrome, Firefox, etc.) — most of them won\'t continue after seeing it.\r\n\r\nEasy fix: We created WebLaunched, providing businesses like yours with a unique, professional website for a small monthly subscription, that includes everything — no other charges. \r\n\r\nDetails: WebLaunched.net', 'unread', '2026-08-17 19:54:21'),
(7, 'Davidrally', 'no.reply.MarcLarsson@gmail.com', 'We guarantee the delivery of your emails every time.', 'Salutations! archipelsdecomores.org, \r\nYour page appeared while I was exploring the internet. \r\nOur service enables businesses to contact website owners through their sites. \r\nThis approach helps companies find partners and customers. \r\nPricing for the platform is structured to remain accessible. \r\nYou can explore how the platform works with a free test. \r\nFeel free to contact us if you would like details. \r\n \r\nThank you for your time. \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.', 'unread', '2026-08-19 02:45:30'),
(8, 'Deepa ', 'deepa.sale01@gmail.com', 'Re:Quality SEO Services', 'Hello http://archipelsdecomores.org,\r\n\r\nWe analyze your website to identify some errors, relevant keyword opportunities, and competition. \r\n\r\nI would like to send you a traffic Report, Maintenance and errors of your website with prices showing you a few things to greatly improve these search results for you. \r\n\r\nIf interested! I will send you a Report, Packages & quote? \r\n\r\nThank you, \r\nDeepa', 'unread', '2026-08-20 09:12:38'),
(9, 'Williamecott', 'dylan-wood32pjfj@gmx.us\r\n', 'Gfdhwuwfeeu fhefuwhdwijduwfeu huwhfduewfhuwijdwuhfwu', 'Egjnjmfnefjwdifj fkmdkdwdwkdwjj fkmfkengjkfmsdnfejfk mkfmkdmwjefnejfem archipelsdecomores.org', 'unread', '2026-08-23 00:04:43'),
(10, 'Robin ', 'robin897898@gmail.com', 'Question about your Google visibility', 'Hi,\r\n\r\nI was looking over your website and noticed a few specific areas where optimization could boost your Google rankings and attract higher-quality leads.\r\n\r\nI have put together a brief SEO strategy and pricing proposal designed to help scale your organic growth.\r\n\r\nWould you be open to reviewing it?\r\n\r\nBest regards,\r\n\r\nRobin', 'unread', '2026-08-24 12:14:50'),
(11, 'Aman Katiyar', 'aman@rocketdigitaltech.com', 'Improve Your Search Engine Visibility', 'Hello http://vicariatapostoliquedelarchipeldescomoresmoroni.org,\r\n\r\nIf you’re looking to boost your website’s visibility, I can help you achieve top Google rankings.\r\n\r\nI’ll prepare a complete SEO plan with actionable steps and potential growth insights for your products or services.\r\n\r\nOnce you share your target keywords and target market, I’ll send a full proposal.\r\n\r\nBest Regards,\r\nAman', 'unread', '2026-08-25 11:32:02'),
(12, 'Holly Biddell', 'domains@search-vicariatapostoliquedelarchipeldescomoresmoroni.org', 'Results for vicariatapostoliquedelarchipeldescomoresmoroni.org', 'Hi\r\n\r\nList vicariatapostoliquedelarchipeldescomoresmoroni.org in Google\'s Search Index and have it be displayed in Google search results!\r\n\r\nRegister vicariatapostoliquedelarchipeldescomoresmoroni.org now:\r\n\r\nhelpindex.pro', 'unread', '2026-08-27 18:05:14'),
(13, 'Joanna Riggs', 'joriggsvideo3@gmail.com', 'vicariatapostoliquedelarchipeldescomoresmoroni.org | Explainer Video', 'Hi,\r\n\r\nI just visited vicariatapostoliquedelarchipeldescomoresmoroni.org and wondered if you\'ve ever considered an impactful video to advertise your business? Our videos can generate impressive results on both your website and across social media.\r\n\r\nOur videos are just $195 USD / £145 for a 30-second video ($239 USD / £179 for 60 seconds) and include a full script, voice-over and visuals.\r\n\r\nI can show you some previous videos we\'ve done if you want me to send some over. Let me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://unsub.agency/unsubscribe.php?d=vicariatapostoliquedelarchipeldescomoresmoroni.org', 'unread', '2026-08-27 18:39:52'),
(14, 'To the http://vicariatapostoliquedelarchipeldescomoresmoroni.org/fekal0911 Owner', 'pirduhina96@gmail.com', 'Dear http://vicariatapostoliquedelarchipeldescomoresmoroni.org/fekal0911 Webmaster', 'Dear http://vicariatapostoliquedelarchipeldescomoresmoroni.org/fekal0911 Administrator', 'unread', '2026-08-31 04:43:34'),
(15, 'Maria England', 'domains@search-vicariatapostoliquedelarchipeldescomoresmoroni.org', 'Results for vicariatapostoliquedelarchipeldescomoresmoroni.org', 'Hey\r\n\r\nList vicariatapostoliquedelarchipeldescomoresmoroni.org in Google\'s Search Index to show up in web search results!\r\n\r\nSubmit vicariatapostoliquedelarchipeldescomoresmoroni.org now:\r\n\r\nsearchregister.live', 'unread', '2026-09-07 19:32:55'),
(16, 'Joanna Riggs', 'joannariggs3@gmail.com', 'vicariatapostoliquedelarchipeldescomoresmoroni.org | Explainer Video', 'Hi,\r\n\r\nI just visited vicariatapostoliquedelarchipeldescomoresmoroni.org and wondered if you\'ve ever considered an impactful video to advertise your business? Our videos can generate impressive results on both your website and across social media.\r\n\r\nOur prices start from just $195 (USD) / £145.\r\n\r\nLet me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://unsub.agency/unsubscribe.php?d=vicariatapostoliquedelarchipeldescomoresmoroni.org', 'unread', '2026-09-09 22:52:57'),
(17, 'Jayne Vo', 'gemma.marshall112@gmail.com', 'Increase your Instagram followers', 'Hi,\r\n\r\nWe run an Instagram service, where we can increase your followers both safely and effectively.\r\n\r\nWe don\'t use bots – everything is done manually to attract real, targeted followers who care about your content.\r\n\r\nThe result? Increased brand awareness, higher engagement, and ultimately, more customers.\r\n\r\nThe price is just $60 (USD) per month.\r\n\r\nYou can find out more information here:\r\n\r\nhttp://instagrow.business/\r\n\r\nIf you are interested just complete the form on the above page.\r\n\r\nIf you are not interested, no problem, just ignore this email.\r\n\r\nKind Regards,\r\nJayne', 'unread', '2026-09-16 21:23:54'),
(18, 'Davidced', 'no.reply.HarrvSimonson@gmail.com', 'Are you looking to acquire more customers for your business?', 'Greetings! vicariatapostoliquedelarchipeldescomoresmoroni.org, \r\nYour website appeared while I was looking through websites in this niche. \r\nWe provide a tool for website outreach. \r\nOur platform supports outreach with websites . \r\n  \r\n  \r\nIf you would like to get more details, contact us. \r\n \r\nThanks for taking a moment to read this. \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.', 'unread', '2026-09-17 01:50:03'),
(19, 'Ananya Singh', 'ananya@rocketdigitaltech.com', 'Let’s Boost Your Website Traffic', 'Hello http://vicariatapostoliquedelarchipeldescomoresmoroni.org,\r\n\r\nI wanted to reach out to see if you’re open to exploring ways to grow your website traffic and boost online performance.\r\n\r\nWe offer customized SEO services that deliver measurable improvements.\r\n\r\nOnce you share your target keywords and target market, I’ll send a full proposal.\r\n\r\nBest Regards,\r\nAnanya', 'unread', '2026-10-06 17:30:14'),
(20, 'NARETGR868686NEYHRTGE', 'ridge360350@nolettersbox.com', 'TOTYJTRT868686TIGFNMYUM', 'MEYJTJ868686MAYTRYR', 'unread', '2026-10-17 21:57:37'),
(21, 'MICHEL, Patrick', 'patlmwk56@gmail.com', 'Synode sur la Synodalité', 'Bonjour,\r\n\r\nJe suis Patrick Michel, membre de l’équipe synodale du diocèse de Port-Louis et également observateur de SynObs Afrique – section francophone, présidée par le Père Paul Béré, SJ, avec pour directrice générale, Sœur Noëlie Djiladoumbaye, XMCJ. Le siège du SynObs est basé à l’Institut de Théologie de la Compagnie de Jésus (ITCJ), Abidjan, Côte d’Ivoire.\r\n\r\n \r\n\r\nLa mission du SynObs est d’assurer le suivi du parcours de mise en œuvre du Synode dans les différents pays d’Afrique en marge du calendrier du processus établi juin 2025 – décembre 2026 : parcours de mise en œuvre dans les Eglises locales et leurs regroupements premier semestre 2027 : Assemblées d’évaluation dans les Diocèses et les Éparchies deuxième semestre 2027 : Assemblées d’évaluation dans les Conférences nationales et internationales, les Structures hiérarchiques orientales et les autres regroupements d\'Églises\r\npremier trimestre 2028 : Assemblées continentales d’évaluation Octobre 2028 : Assemblée ecclésiale au Vatican.\r\n\r\n \r\n\r\nDe ce fait, le rôle de l’observateur du SynObs est de faire un relevé, uniquement relevé sans aucun jugement ou commentaire, de ce qui est entrepris en matière de dynamique synodale dans les Églises locales à ce stade pour être communiqué au siège d’Abidjan\r\n\r\n \r\nLes informations sur les activités dans le cadre de la dynamique synodale au sein du vicariat apostolique de l\'archipel des Comores sont les bienvenues.\r\n\r\nAu niveau de l’océan Indien, je m’occupe du diocèse de Port-Louis, de celui de La-Réunion (Saint-Denis), des Seychelles, du vicariat apostolique de Rodrigues et du vicariat apostolique de l\'archipel des Comores.\r\n\r\nFratenellemnt vôtre\r\nPatrick MICHEL', 'unread', '2026-10-24 03:57:37'),
(22, 'Patrick MICHEL', 'patlmwk56@gmail.com', 'Synode sur la Synodalité', 'Bonjour \r\n\r\n\r\nJe suis Patrick Michel, membre de l’équipe synodale du diocèse de Port-Louis et également observateur de SynObs Afrique – section francophone, présidée par le Père Paul Béré, SJ, avec pour directrice générale, Sœur Noëlie Djiladoumbaye, XMCJ. Le siège du SynObs est basé à l’Institut de Théologie de la Compagnie de Jésus (ITCJ), Abidjan, Côte d’Ivoire.\r\n\r\n \r\nLa mission du SynObs est d’assurer le suivi du parcours de mise en œuvre du Synode dans les différents pays d’Afrique en marge du calendrier du processus établi\r\n\r\njuin 2025 – décembre 2026 : parcours de mise en œuvre dans les Eglises locales et leurs regroupements premier semestre 2027 : Assemblées d’évaluation dans les Diocèses et les Éparchies deuxième semestre 2027 : Assemblées d’évaluation dans les Conférences nationales et internationales, les Structures hiérarchiques orientales et les autres regroupements d\'Églises premier trimestre 2028 : Assemblées continentales d’évaluation Octobre 2028 : Assemblée ecclésiale au Vatican.\r\n\r\n \r\nDe ce fait, le rôle de l’observateur du SynObs est de faire un relevé, uniquement relevé sans aucun jugement ou commentaire, de ce qui est entrepris en matière de dynamique synodale dans les Églises locales à ce stade pour être communiqué au siège d’Abidjan\r\n\r\n\r\n\r\nAu niveau de l’océan Indien, je m’occupe du diocèse de Port-Louis, de celui de La-Réunion (Saint-Denis), du diocèse de Port-Victoria, Seychelles, du vicariat apostolique de Rodrigues et du vicariat apostolique des Comores.\r\n\r\n \r\n\r\nLes observateurs du SynObs Afrique francophone participent à des rencontres mensuelles par zoom chaque premier lundi du mois pour un partage d’informations et d’expériences de synodalité dans les différents points du continent.\r\n\r\n \r\n\r\nToute information dans le processus de mise en œuvre du Marcher Ensemble, initié par le vicariat apostolique de l\'archipel des Comores, est la bienvenue en vue des prochains échanges de novembre au niveau de SynObs Afrique.\r\n\r\n\r\n\r\nMerci d\'avance pour votre collaboration dans le Marcher Ensemble de l\'Eglise Universelle du troisième millénaire\r\n\r\n \r\n\r\nFraternellement vôtre\r\n\r\n \r\n\r\nPatrick MICHEL \r\n\r\n\r\n\r\nNo de te; 52546966 (également disponible sur whatsapp, svp)\r\n\r\n', 'unread', '2026-10-24 04:08:31');

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
(1, 'Grande célébration de la Sainte Thérèse de l’Enfant Jésus', '1786035502_MayGodBlessYouMa2.jpeg', 'La communauté chrétienne de la Cathédrale Sainte Thérèse célèbre avec joie la fête patronale de la paroisse.', 'La communauté chrétienne de la Cathédrale Sainte Thérèse de l’Enfant Jésus a célébré avec une grande joie la fête patronale de la paroisse. Cet événement annuel, profondément enraciné dans la tradition spirituelle, a rassemblé fidèles, prêtres, mouvements et commissions autour d’un même esprit de fraternité et de mission. La journée a débuté par une messe solennelle présidée par le curé de la paroisse, entouré des prêtres et des responsables des différents groupes. Les chants liturgiques, portés par la chorale paroissiale, ont donné à la célébration une atmosphère de ferveur et de communion. Après la messe, les fidèles se sont retrouvés pour partager un moment convivial. Les commissions de la paroisse ont présenté leurs activités, mettant en lumière l’engagement des jeunes, des mouvements de charité et des groupes spirituels. Ce fut l’occasion de renforcer les liens entre les membres de la communauté et de rappeler l’importance d’une Église vivante et missionnaire.', 'published', 'Admin', '2026-08-06 16:52:42', 17),
(2, 'Ouverture des inscriptions au programme de catéchèse', '1786035642_WhatsApp Image 2026-06-25 at 15.50.34.jpeg', 'La paroisse annonce le début des inscriptions pour les enfants, jeunes et adultes souhaitant approfondir leur foi.', 'Le programme de catéchèse accueille les enfants, les jeunes et les adultes pour une formation chrétienne basée sur la Parole de Dieu, la préparation aux sacrements et la vie communautaire. Les inscriptions au catéchisme des enfants sont ouvertes afin de les préparer aux sacrements de l’initiation chrétienne (Baptême, Première Communion, Confirmation). Les catéchistes accompagneront les plus jeunes dans la découverte de la Parole de Dieu et la vie de l’Église. La paroisse propose également des parcours pour les adultes qui désirent approfondir leur vie spirituelle, recevoir un sacrement ou simplement renouveler leur engagement chrétien. Des sessions de formation biblique et théologique seront organisées pour nourrir la foi et renforcer la mission. Les inscriptions se font au bureau paroissial chaque jour ouvrable, de 8h00 à 17h00. Les fidèles sont invités à venir avec les documents nécessaires (acte de naissance ou certificat de baptême, selon le cas). Les responsables des commissions seront disponibles pour orienter et accompagner chacun.', 'published', 'Admin', '2026-08-06 16:52:42', 17),
(3, 'Rencontre de prière et d’adoration eucharistique', '1786035799_BackyMama.jpeg', 'Un temps spécial de prière et d’adoration eucharistique est proposé aux fidèles.', 'La communauté paroissiale est invitée à participer aux moments d’adoration eucharistique, de méditation et de prière communautaire pour renforcer la vie spirituelle. La paroisse Sainte Thérèse de l’Enfant Jésus invite tous les fidèles à participer à un temps spécial de prière et d’adoration eucharistique. Ce moment spirituel est une occasion privilégiée pour se recueillir devant le Saint Sacrement et renouveler son engagement de foi. L’adoration eucharistique est un temps de silence, de méditation et de dialogue intérieur avec le Seigneur. Les fidèles sont invités à déposer leurs joies, leurs peines et leurs intentions personnelles devant Jésus présent dans l’Eucharistie. Les séances d’adoration auront lieu chaque vendredi soir, à partir de 18h00, dans la cathédrale. Tous les fidèles, jeunes et adultes, sont les bienvenus pour partager ce moment de grâce.', 'published', 'Admin', '2026-08-06 16:52:42', 17),
(4, 'Les jeunes de la paroisse lancent une nouvelle activité pastorale', '1786035957_Godisgood.jpeg', 'Le groupe des jeunes catholiques développe de nouvelles activités spirituelles et sociales.', 'À travers cette initiative, les jeunes sont encouragés à participer davantage à la mission de l’Église, au service communautaire et aux activités pastorales. Les jeunes organisent régulièrement des rencontres de prière, des partages bibliques et des retraites spirituelles. Ces moments permettent de grandir dans la foi, de mieux comprendre la Parole de Dieu et de vivre une expérience chrétienne authentique. En plus des activités spirituelles, le groupe met en place des actions sociales telles que des visites aux malades, des aides aux familles vulnérables et des campagnes de sensibilisation. Ces initiatives traduisent concrètement l’appel à la charité et au service des autres. Les jeunes participent activement à l’animation liturgique par le chant, la danse et le théâtre religieux. Ils organisent également des événements culturels et sportifs favorisant la cohésion et l’épanouissement de chacun.', 'published', 'Admin', '2026-08-06 16:52:42', 17),
(5, 'Travaux d’amélioration de la Cathédrale', '1786036175_WhatsApp Image 2026-06-25 at 15.51.54.jpeg', 'Des travaux d’entretien et d’embellissement sont réalisés pour améliorer l’accueil des fidèles.', 'La communauté paroissiale poursuit ses efforts pour maintenir un espace de prière accueillant et adapté aux célébrations liturgiques. Les équipes techniques et bénévoles travaillent à la rénovation des bâtiments, au rafraîchissement des peintures et à la réparation des installations. L’objectif est de garantir un cadre sûr et agréable pour toutes les activités pastorales et communautaires. Un soin particulier est apporté aux espaces verts et aux lieux de rassemblement. Des fleurs et des plantes ont été ajoutées pour créer une atmosphère accueillante et propice à la prière et à la fraternité. La paroisse Sainte Thérèse de l’Enfant Jésus entreprend actuellement des travaux d’entretien et d’embellissement afin d’améliorer l’accueil des fidèles et de rendre les espaces paroissiaux plus chaleureux et fonctionnels.', 'published', 'Admin', '2026-08-06 16:52:42', 17),
(6, 'Assemblée pastorale du Vicariat Apostolique des Comores', '1786036586_Apropos.jpeg', 'Les responsables pastoraux se réunissent pour réfléchir aux orientations de la mission de l’Église aux Comores.', 'Le Vicariat Apostolique de l’Archipel des Comores a organisé une rencontre pastorale réunissant les prêtres, religieux et responsables des communautés chrétiennes afin de partager les défis et les perspectives de la mission évangélique. L’Évêque a célébré la messe solennelle, entouré des prêtres et des responsables paroissiaux. Dans son homélie, il a encouragé les fidèles à vivre pleinement leur foi, à s’engager dans la mission de l’Église et à témoigner de l’amour du Christ dans leur quotidien.', 'published', 'Admin', '2026-08-06 17:14:14', NULL),
(7, 'Visite pastorale dans la paroisse Saint Joseph', '1786036956_Itara.jpeg', 'L’évêque a effectué une visite pastorale auprès des fidèles de la paroisse Saint Joseph', 'L’Évêque a célébré la messe solennelle, entouré des prêtres et des responsables paroissiaux. Dans son homélie, il a encouragé les fidèles à vivre pleinement leur foi, à s’engager dans la mission de l’Église et à témoigner de l’amour du Christ dans leur quotidien. La paroisse Saint Joseph a eu l’honneur d’accueillir l’Évêque lors d’une visite pastorale exceptionnelle. Ce moment de grâce a rassemblé les fidèles autour de leur pasteur, renforçant la communion et l’unité de l’Église locale.', 'published', 'Admin', '2026-08-06 17:14:14', NULL),
(8, 'La communauté célèbre la fête de son saint patron', '1786137628_church.jpeg', 'Les fidèles de la paroisse se sont rassemblés pour célébrer leur fête patronale.', 'La célébration a rassemblé les membres de la communauté autour de la prière, de la Sainte Messe et des activités fraternelles renforçant les liens entre les paroissiens.', 'published', 'Admin', '2026-08-06 17:14:14', NULL),
(9, 'Formation des catéchistes dans les paroisses des Comores', '1786137682_mayotte.jpeg', 'Une session de formation accompagne les catéchistes dans leur mission auprès des communautés.', 'Le Vicariat organise régulièrement des formations pour renforcer les compétences spirituelles et pédagogiques des catéchistes engagés dans l’annonce de la foi.', 'published', 'Admin', '2026-08-06 17:14:14', NULL),
(10, 'Activités des jeunes catholiques pour servir la communauté', '1786137714_MissRumuri.jpeg', 'Les jeunes catholiques participent à des activités spirituelles et sociales.', 'À travers différentes initiatives, les jeunes sont encouragés à devenir des acteurs de la mission de l’Église par la prière, la formation et le service auprès des autres.', 'published', 'Admin', '2026-08-06 17:14:14', NULL);

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
(14, 'Cathédrale Sainte Thérèse de l\'Enfant Jésus Moroni', 'cathedrale-sainte-therese-moroni', 'uploads/1786034083_MayGodBlessYouMa2.jpeg', 'uploads/1786034083_lologo.jpeg', 'La Cathédrale Sainte Thérèse de l\'Enfant Jésus, située à Moroni, est l\'église cathédrale du Vicariat Apostolique de l\'Archipel des Comores. Elle constitue le siège de l\'Évêque et le principal centre de la vie liturgique, pastorale et administrative de l\'Église catholique dans l\'archipel. La cathédrale accueille les grandes célébrations diocésaines, les ordinations, les fêtes liturgiques et les rassemblements des fidèles provenant des différentes paroisses des Comores.', 'La paroisse anime la vie chrétienne à travers les célébrations eucharistiques, les sacrements, la catéchèse, les rencontres des jeunes, les activités caritatives, les groupes de prière et les formations pastorales. Elle accueille également les visiteurs et accompagne les familles dans leur cheminement de foi.', 'Le Conseil Pastoral Paroissial accompagne le curé dans la planification pastorale, la coordination des activités paroissiales et le développement de la communauté chrétienne.', 'Commission Liturgique\r\nCommission de Catéchèse\r\nCommission des Jeunes\r\nCommission Caritas\r\nCommission de Communication\r\nCommission des Familles', ' Chorale Paroissiale\r\n Jeunesse Catholique\r\n Enfants de Marie\r\n Lecteurs\r\n Servants d\'Autel\r\n Groupe de Prière', 'Curé\r\n Conseil Pastoral\r\nConseil Économique\r\n Catéchèse\r\n Chorale\r\nJeunesse\r\nCaritas\r\nSecrétariat', 'Moroni, Grande Comore Union des Comores', '00 262 26961 11 53', 'vicapostolique.comores@mailsds.org', 'https://archipelsdecomores.org', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.youtube.com', 'https://www.google.com/maps/place/Moroni,+Comoros/@-11.700906,43.2380325,14z/data=!3m1!4b1!4m6!3m5!1s0x1898feade3e34bb1:0x3943d96d792e2d3e!8m2!3d-11.7061223!4d43.2517012!16zL20vMDFxazI0?entry=ttu&g_ep=EgoyMDI2MDgwMy4wIKXMDSoASAFQAw%3D%3D', '2026-08-06 16:34:43'),
(15, 'Paroisse d\'Anjouan Immaculée Conseption', 'Laparoissed\'AnjouanImmaculéeConseption', 'uploads/1792068677_MayGodBlessYouMa1.jpeg', 'uploads/1792068677_lologo.jpeg', 'Avec cette doctrine, l’Église catholique souligne la place particulière de Marie en tant que mère du Christ et affirme que Dieu, anticipant la naissance de son Fils (Jésus-Christ), a préservé Marie avant même le moment de sa conception dans le sein de sa mère, Anne. Cette doctrine ne doit pas être confondue avec la conception virginale de Jésus-Christ, c\'est-à-dire le dogme de l\'Incarnation. L\'Immaculée Conception se rapporte uniquement à la conception de Marie sans péché.', 'Avec cette doctrine, l’Église catholique souligne la place particulière de Marie en tant que mère du Christ et affirme que Dieu, anticipant la naissance de son Fils (Jésus-Christ), a préservé Marie avant même le moment de sa conception dans le sein de sa mère, Anne. Cette doctrine ne doit pas être confondue avec la conception virginale de Jésus-Christ, c\'est-à-dire le dogme de l\'Incarnation. L\'Immaculée Conception se rapporte uniquement à la conception de Marie sans péché.', 'Avec cette doctrine, l’Église catholique souligne la place particulière de Marie en tant que mère du Christ et affirme que Dieu, anticipant la naissance de son Fils (Jésus-Christ), a préservé Marie avant même le moment de sa conception dans le sein de sa mère, Anne. Cette doctrine ne doit pas être confondue avec la conception virginale de Jésus-Christ, c\'est-à-dire le dogme de l\'Incarnation. L\'Immaculée Conception se rapporte uniquement à la conception de Marie sans péché.', 'Avec cette doctrine, l’Église catholique souligne la place particulière de Marie en tant que mère du Christ et affirme que Dieu, anticipant la naissance de son Fils (Jésus-Christ), a préservé Marie avant même le moment de sa conception dans le sein de sa mère, Anne. Cette doctrine ne doit pas être confondue avec la conception virginale de Jésus-Christ, c\'est-à-dire le dogme de l\'Incarnation. L\'Immaculée Conception se rapporte uniquement à la conception de Marie sans péché.', 'Avec cette doctrine, l’Église catholique souligne la place particulière de Marie en tant que mère du Christ et affirme que Dieu, anticipant la naissance de son Fils (Jésus-Christ), a préservé Marie avant même le moment de sa conception dans le sein de sa mère, Anne. Cette doctrine ne doit pas être confondue avec la conception virginale de Jésus-Christ, c\'est-à-dire le dogme de l\'Incarnation. L\'Immaculée Conception se rapporte uniquement à la conception de Marie sans péché.', 'Avec cette doctrine, l’Église catholique souligne la place particulière de Marie en tant que mère du Christ et affirme que Dieu, anticipant la naissance de son Fils (Jésus-Christ), a préservé Marie avant même le moment de sa conception dans le sein de sa mère, Anne. Cette doctrine ne doit pas être confondue avec la conception virginale de Jésus-Christ, c\'est-à-dire le dogme de l\'Incarnation. L\'Immaculée Conception se rapporte uniquement à la conception de Marie sans péché.', 'Isle d’Anjouan', '(+262) 269 61 11 53', 'mission-catholique@orange.fr', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://www.google.com/maps/search/?api=1&query=5HV6RCQ2%2B', '2026-10-15 12:51:17'),
(16, 'Petit Terre: Saint Michel Mayotte', 'Laparoissed\'AnjouanImmaculéeConseption', 'uploads/1792069034_team.jpeg', 'uploads/1792069034_lologo.jpeg', 'Saint-Aubert évêque d’Avranches fonda en 708 le Mont Saint-Michel. Par trois fois, l’archange Saint-Michel apparut dans ses rêves. Il prit alors la décision de faire construire un oratoire en hommage au personnage divin, mais où ? C’est le présage d’un taureau attaché sur le Mont Tombe qui annonça l’emplacement de ce qui sera le Mont Saint-Michel.\r\n\r\nPendant les chantiers d’édification de l’oratoire, l’évêque d’Avranches envoya deux chanoines chercher des reliques de Saint-Michel. Ils auraient rapporté un pan de sa cape rouge, ainsi qu’un morceau de marbre sur lequel l’archange avait posé son pied. L\'Histoire et la légende s\'entremêlent intimement.', 'Saint-Aubert évêque d’Avranches fonda en 708 le Mont Saint-Michel. Par trois fois, l’archange Saint-Michel apparut dans ses rêves. Il prit alors la décision de faire construire un oratoire en hommage au personnage divin, mais où ? C’est le présage d’un taureau attaché sur le Mont Tombe qui annonça l’emplacement de ce qui sera le Mont Saint-Michel.\r\n\r\nPendant les chantiers d’édification de l’oratoire, l’évêque d’Avranches envoya deux chanoines chercher des reliques de Saint-Michel. Ils auraient rapporté un pan de sa cape rouge, ainsi qu’un morceau de marbre sur lequel l’archange avait posé son pied. L\'Histoire et la légende s\'entremêlent intimement.', 'Saint-Aubert évêque d’Avranches fonda en 708 le Mont Saint-Michel. Par trois fois, l’archange Saint-Michel apparut dans ses rêves. Il prit alors la décision de faire construire un oratoire en hommage au personnage divin, mais où ? C’est le présage d’un taureau attaché sur le Mont Tombe qui annonça l’emplacement de ce qui sera le Mont Saint-Michel.\r\n\r\nPendant les chantiers d’édification de l’oratoire, l’évêque d’Avranches envoya deux chanoines chercher des reliques de Saint-Michel. Ils auraient rapporté un pan de sa cape rouge, ainsi qu’un morceau de marbre sur lequel l’archange avait posé son pied. L\'Histoire et la légende s\'entremêlent intimement.', 'Saint-Aubert évêque d’Avranches fonda en 708 le Mont Saint-Michel. Par trois fois, l’archange Saint-Michel apparut dans ses rêves. Il prit alors la décision de faire construire un oratoire en hommage au personnage divin, mais où ? C’est le présage d’un taureau attaché sur le Mont Tombe qui annonça l’emplacement de ce qui sera le Mont Saint-Michel.\r\n\r\nPendant les chantiers d’édification de l’oratoire, l’évêque d’Avranches envoya deux chanoines chercher des reliques de Saint-Michel. Ils auraient rapporté un pan de sa cape rouge, ainsi qu’un morceau de marbre sur lequel l’archange avait posé son pied. L\'Histoire et la légende s\'entremêlent intimement.', 'Saint-Aubert évêque d’Avranches fonda en 708 le Mont Saint-Michel. Par trois fois, l’archange Saint-Michel apparut dans ses rêves. Il prit alors la décision de faire construire un oratoire en hommage au personnage divin, mais où ? C’est le présage d’un taureau attaché sur le Mont Tombe qui annonça l’emplacement de ce qui sera le Mont Saint-Michel.\r\n\r\nPendant les chantiers d’édification de l’oratoire, l’évêque d’Avranches envoya deux chanoines chercher des reliques de Saint-Michel. Ils auraient rapporté un pan de sa cape rouge, ainsi qu’un morceau de marbre sur lequel l’archange avait posé son pied. L\'Histoire et la légende s\'entremêlent intimement.', 'Saint-Aubert évêque d’Avranches fonda en 708 le Mont Saint-Michel. Par trois fois, l’archange Saint-Michel apparut dans ses rêves. Il prit alors la décision de faire construire un oratoire en hommage au personnage divin, mais où ? C’est le présage d’un taureau attaché sur le Mont Tombe qui annonça l’emplacement de ce qui sera le Mont Saint-Michel.\r\n\r\nPendant les chantiers d’édification de l’oratoire, l’évêque d’Avranches envoya deux chanoines chercher des reliques de Saint-Michel. Ils auraient rapporté un pan de sa cape rouge, ainsi qu’un morceau de marbre sur lequel l’archange avait posé son pied. L\'Histoire et la légende s\'entremêlent intimement.', 'Moroni, Union des Comores', '(+262) 269 61 11 53', 'mission-catholique@orange.fr', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://www.google.com/maps/place/Le+Petit+Telle/@43.8954964,6.0771225,16.79z/data=!4m9!3m8!1s0x12cbea62eaa3c6a1:0x59246d759f13ef!5m2!4m1!1i2!8m2!3d43.8952183!4d6.0799818!16s%2Fg%2F1tkfws8r?entry=ttu&g_ep=EgoyMDI2MTAxMi4wIKXMDSoASAFQAw%3D%3D', '2026-10-15 12:57:14'),
(17, 'Grande Terre: Notre-Dame de Fatima Mayotte', 'Laparoissed\'AnjouanImmaculéeConseption', 'uploads/1792069215_cart.jpeg', 'uploads/1792069215_lologo.jpeg', 'The cathedral, dating from 1957, follows the Roman or Latin rite and is within the Apostolic Vicariate of the Comoros Archipelago (Apostolicus Vicariatus Insularum Comorensium or Vicariat apostolique de l\'archipel des Comores) which was raised to its current status in 2010 by Pope Benedict XVI through the bull \"Divini Salvatoris\".', 'The cathedral, dating from 1957, follows the Roman or Latin rite and is within the Apostolic Vicariate of the Comoros Archipelago (Apostolicus Vicariatus Insularum Comorensium or Vicariat apostolique de l\'archipel des Comores) which was raised to its current status in 2010 by Pope Benedict XVI through the bull \"Divini Salvatoris\".', 'The cathedral, dating from 1957, follows the Roman or Latin rite and is within the Apostolic Vicariate of the Comoros Archipelago (Apostolicus Vicariatus Insularum Comorensium or Vicariat apostolique de l\'archipel des Comores) which was raised to its current status in 2010 by Pope Benedict XVI through the bull \"Divini Salvatoris\".', 'The cathedral, dating from 1957, follows the Roman or Latin rite and is within the Apostolic Vicariate of the Comoros Archipelago (Apostolicus Vicariatus Insularum Comorensium or Vicariat apostolique de l\'archipel des Comores) which was raised to its current status in 2010 by Pope Benedict XVI through the bull \"Divini Salvatoris\".', 'The cathedral, dating from 1957, follows the Roman or Latin rite and is within the Apostolic Vicariate of the Comoros Archipelago (Apostolicus Vicariatus Insularum Comorensium or Vicariat apostolique de l\'archipel des Comores) which was raised to its current status in 2010 by Pope Benedict XVI through the bull \"Divini Salvatoris\".', 'The cathedral, dating from 1957, follows the Roman or Latin rite and is within the Apostolic Vicariate of the Comoros Archipelago (Apostolicus Vicariatus Insularum Comorensium or Vicariat apostolique de l\'archipel des Comores) which was raised to its current status in 2010 by Pope Benedict XVI through the bull \"Divini Salvatoris\".', 'Moroni, Union des Comores', '(+262) 269 61 11 53', 'mission-catholique@orange.fr', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://vicariatapostoliquedelarchipeldescomoresmoroni.org/', 'https://maps.app.goo.gl/1XyhJqykWL8BxYEq9', '2026-10-15 13:00:15');

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
(46, 14, 'Adoration Eucharistique', 'Monday', '18:00', 'Temps d\'adoration et de méditation devant le Saint-Sacrement.', '2026-08-06 16:48:18'),
(47, 14, 'Sainte Messe', 'Tuesday', '06:30', 'Célébration quotidienne de la Sainte Messe.', '2026-08-06 16:48:18'),
(48, 14, 'Catéchèse des Adultes', 'Tuesday', '18:30', 'Formation chrétienne et partage de la Parole de Dieu.', '2026-08-06 16:48:18'),
(49, 14, 'Sainte Messe', 'Wednesday', '06:30', 'Messe quotidienne ouverte à tous les fidèles.', '2026-08-06 16:48:18'),
(50, 14, 'Prière du Rosaire', 'Wednesday', '17:30', 'Récitation communautaire du Saint Rosaire.', '2026-08-06 16:48:18'),
(51, 14, 'Sainte Messe', 'Thursday', '06:30', 'Célébration eucharistique du matin.', '2026-08-06 16:48:18'),
(52, 14, 'Adoration Eucharistique', 'Thursday', '18:00', 'Adoration silencieuse suivie de la bénédiction du Saint-Sacrement.', '2026-08-06 16:48:18'),
(53, 14, 'Sainte Messe', 'Friday', '06:30', 'Messe quotidienne.', '2026-08-06 16:48:18'),
(54, 14, 'Chemin de Croix', 'Friday', '17:30', 'Prière du Chemin de Croix et méditation sur la Passion du Christ.', '2026-08-06 16:48:18'),
(55, 14, 'Sainte Messe', 'Saturday', '07:00', 'Messe du samedi matin.', '2026-08-06 16:48:18'),
(56, 14, 'Confessions', 'Saturday', '16:00', 'Sacrement de Réconciliation avant la messe anticipée.', '2026-08-06 16:48:18'),
(57, 14, 'Messe Anticipée', 'Saturday', '18:00', 'Messe anticipée du dimanche.', '2026-08-06 16:48:18'),
(58, 14, 'Première Messe Dominicale', 'Sunday', '07:00', 'Première célébration eucharistique du dimanche.', '2026-08-06 16:48:18'),
(59, 14, 'Grand-Messe', 'Sunday', '10:00', 'Grand-Messe présidée à la Cathédrale.', '2026-08-06 16:48:18'),
(60, 14, 'Vêpres', 'Sunday', '17:00', 'Prière du soir avec la communauté.', '2026-08-06 16:48:18'),
(61, 14, 'Messe du Soir', 'Sunday', '18:00', 'Dernière messe dominicale.', '2026-08-06 16:48:18');

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
(1, 'Pastorale des Jeunes', 'uploads/programs/pastorale-jeunes.jpg', 'Accompagnement spirituel et formation des jeunes catholiques.', 'Ce programme accompagne les jeunes à travers des formations chrétiennes, des temps de prière, des rencontres fraternelles et des activités sociales afin de les encourager à participer activement à la mission de l’Église.', 'Jeunesse', 'Responsable de la Pastorale des Jeunes', '+269 000 0000', 'jeunesse@archipelsdecomores.org', 'active', '2026-08-06 18:23:21', NULL),
(2, 'Formation Catéchétique du Vicariat', 'uploads/programs/catechese.jpg', 'Formation chrétienne pour enfants, jeunes et adultes.', 'Le programme de catéchèse aide les fidèles à approfondir leur connaissance de la foi chrétienne, préparer les sacrements et grandir dans leur relation avec Dieu.', 'Formation', 'Coordinateur de la Catéchèse', '+269 000 0001', 'catechese@archipelsdecomores.org', 'active', '2026-08-06 18:23:21', NULL),
(3, 'Caritas - Service de Solidarité', 'uploads/programs/caritas.jpg', 'Accompagnement des personnes vulnérables et actions sociales.', 'Caritas développe des initiatives de solidarité auprès des familles en difficulté à travers l’aide humanitaire, le soutien communautaire et les actions de charité.', 'Social', 'Responsable Caritas', '+269 000 0002', 'caritas@archipelsdecomores.org', 'active', '2026-08-06 18:23:21', NULL),
(4, 'Catéchèse Paroissiale', 'uploads/programs/catechese-paroisse.jpg', 'Préparation aux sacrements et formation spirituelle des fidèles.', 'La Cathédrale Sainte Thérèse de l’Enfant Jésus propose des rencontres régulières de catéchèse pour les enfants, les jeunes et les adultes de la communauté.', 'Catéchèse', 'Responsable Catéchèse Paroissiale', '+269 000 0003', 'cathechese.paroisse@email.com', 'active', '2026-08-06 18:23:21', NULL),
(5, 'Chorale Sainte Thérèse', 'uploads/programs/chorale.jpg', 'Animation musicale des célébrations liturgiques.', 'La chorale accompagne les messes et les célébrations importantes de la paroisse. Elle offre également une formation aux membres souhaitant servir l’Église par le chant.', 'Liturgie', 'Responsable de la Chorale', '+269 000 0004', 'chorale@paroisse.com', 'active', '2026-08-06 18:23:21', NULL),
(6, 'Pastorale Familiale', 'uploads/programs/famille.jpg', 'Soutien spirituel et accompagnement des familles chrétiennes.', 'Ce programme propose des rencontres, des temps de prière et des formations pour renforcer la vie familiale selon les valeurs chrétiennes.', 'Famille', 'Responsable Pastorale Familiale', '+269 000 0005', 'famille@paroisse.com', 'active', '2026-08-06 18:23:21', NULL);

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
(4, 'Alliance UWINEZA', 'alliancewacu@gmail.com', '0791886292', '$2y$10$j8NXqOYhn5yRFT3WH/pHJ.ocGItAmDpxL/cGwbadeqZlrFUTtoXxK', 'user', '', 'active', '2026-07-17 15:35:07'),
(5, 'Twagirimana Remy', 'twaremy@gmail.com', '+250788580457', '$2y$10$Z9bM.t1onB66t.ceqFGhF.c/V5WKrPeyTz1ZMCCXZahKiC0c2ALHO', 'admin', '', 'active', '2026-08-05 11:19:42'),
(6, 'Fiston Byiringiro', 'byiringirofiston32@gmail.com', '0791886292', '$2y$10$YvsmGn4.EZdloZ9.0IeRjeQR2/Fa/LRbIe118JsIT1ZuFxlSZbWtm', 'admin', '', 'active', '2026-10-20 00:34:39');

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
-- Indexes for table `parish_prayers`
--
ALTER TABLE `parish_prayers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `other_sites`
--
ALTER TABLE `other_sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parishe`
--
ALTER TABLE `parishe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `parishes`
--
ALTER TABLE `parishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parish_prayers`
--
ALTER TABLE `parish_prayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `fk_parish_prayers_parishe` FOREIGN KEY (`parish_id`) REFERENCES `parishe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
