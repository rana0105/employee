-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 01:21 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems1`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_salary` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `department`, `basic_salary`, `phone`, `email`, `nid`, `present_address`, `permanent_address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aminul Islam', 'Marketing Executive', 'Marketing', 12000, '0565656565', 'aminul@gmail.com', '03839434733', 'Present Address', 'Permanent Address', 'employee/EncbPY60RIktwPkLT4C6AWB6lzQx1yBxtp8pm3Dt.jpeg', 0, '2018-06-01 04:09:40', '2018-06-01 04:09:40'),
(2, 'Morshed Khan Rana', 'Software Engineer', 'IT Service', 1000, '019179102382', 'ra.ranacse@gmail.com', '4554542462022', 'FSSKSFS', 'asaehr e ere', 'employee/k3Ge6GqCipTZ5xkLLk3YWsBdbVf12i470ZDb3F8z.jpeg', 0, '2018-06-05 22:32:09', '2018-06-09 03:36:46'),
(3, 'Abcdef', 'Proprietor', 'Office Management', 100000, '1234567891011', 'admin@mntex.com', '1990852369854856', 'Rampura, Dhaka', 'Rampura, Dhaka', 'employee/SgHsjcrU8GFBeAmI9PjxlwQNmAX4kElkSmTh2yol.jpeg', 0, '2018-06-08 11:54:38', '2018-06-08 11:54:38'),
(4, 'Gulshan Kumar', 'Manager', 'Management', 25000, '016586321', 'manager@mntexbd.com', '11465449989889898', 'House 34 ( Ground Floor ), Road 2, Block E, Banasree, Rampura, Dhaka 1219', 'House 34 ( Ground Floor ), Road 2, Block E, Banasree, Rampura, Dhaka 1219', 'employee/e9yUce8JpsbcEDgfXAiIKPavJ6wJLyFr7xhh3vbb.gif', 0, '2018-06-08 12:03:59', '2018-06-10 02:05:23'),
(5, 'Mamun', 'Executive', 'Drostring', 1000, '01844169095', 'admin@admin.com', '123456789', 'cacczxc', 'zxczxc', 'employee/Feqp4zEReQzsih9utfWin7EfwkhcQIbFpt29qtKW.png', 0, '2018-06-09 05:35:04', '2018-06-09 11:24:36'),
(6, 'Check', 'QC', 'Swing', 10000, '12345678910', 'check@ymail.com', '19981234567891911', 'Rampura, Dhaka', 'Tangail, Bangladesh', 'employee/ZZGmcPijM2U2U03XgFcHOfeycbUr0c8UkiSl7LOK.png', 0, '2018-06-30 02:22:40', '2018-06-30 02:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `from_date`, `to_date`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-06-05', '2018-06-05', 'sdsds', '2018-06-05 09:55:15', '2018-06-05 09:55:15'),
(2, 2, '2018-06-15', '2018-06-16', 'Personal issue', '2018-06-08 11:46:38', '2018-06-08 11:46:38'),
(3, 5, '2018-06-11', '2018-06-12', 'fth', '2018-06-09 05:36:13', '2018-06-09 05:36:13'),
(4, 2, '2018-01-01', '2018-01-03', 'Home', '2018-06-28 02:39:47', '2018-06-28 02:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2017_04_30_012311_create_posts_table', 1),
(18, '2017_04_30_014352_create_permission_tables', 1),
(19, '2018_05_30_045423_create_sessions_table', 1),
(20, '2018_05_30_052808_create_employees_table', 2),
(21, '2018_05_31_150105_create_product_categories_table', 3),
(22, '2018_06_01_131430_create_products_table', 4),
(23, '2018_06_04_053733_create_supplies_table', 5),
(24, '2018_06_04_102905_create_supply_dates_table', 6),
(25, '2018_06_05_132555_create_leaves_table', 7),
(26, '2018_06_06_032821_create_salaries_table', 8),
(27, '2018_07_08_050319_create_sizes_table', 9),
(28, '2018_07_08_050624_create_size_quantities_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(4, 2, 'App\\User'),
(4, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'view_users', 'web', 'Show User', '2018-05-29 22:59:20', '2018-06-08 04:35:35'),
(2, 'add_users', 'web', 'Create User', '2018-05-29 22:59:20', '2018-06-08 04:35:51'),
(3, 'edit_users', 'web', 'Edit User', '2018-05-29 22:59:20', '2018-06-08 04:36:08'),
(4, 'delete_users', 'web', 'Delete User', '2018-05-29 22:59:20', '2018-06-08 04:36:17'),
(5, 'view_roles', 'web', 'Show Role', '2018-05-29 22:59:20', '2018-06-08 04:36:32'),
(6, 'add_roles', 'web', 'Create Role', '2018-05-29 22:59:20', '2018-06-08 04:36:46'),
(7, 'edit_roles', 'web', 'Edit Role', '2018-05-29 22:59:20', '2018-06-08 04:37:02'),
(8, 'delete_roles', 'web', 'Delete Role', '2018-05-29 22:59:20', '2018-06-08 04:37:20'),
(9, 'view_posts', 'web', 'Show Post', '2018-05-29 22:59:20', '2018-06-08 04:37:34'),
(10, 'add_posts', 'web', 'Create Post', '2018-05-29 22:59:21', '2018-06-08 04:37:47'),
(11, 'edit_posts', 'web', 'Edit Post', '2018-05-29 22:59:21', '2018-06-08 04:42:28'),
(12, 'delete_posts', 'web', 'Delete Post', '2018-05-29 22:59:21', '2018-06-08 04:42:44'),
(13, 'view_permission', 'web', 'Show Permission', '2018-06-08 04:38:21', '2018-06-08 04:38:21'),
(14, 'add_permission', 'web', 'Create Permission', '2018-06-08 04:43:42', '2018-06-08 04:43:42'),
(15, 'edit_permission', 'web', 'Edit Permission', '2018-06-08 04:46:53', '2018-06-08 04:46:53'),
(16, 'delete_permission', 'web', 'Delete Permission', '2018-06-08 04:47:12', '2018-06-08 04:47:12'),
(17, 'view_employee', 'web', 'Show Employee', '2018-06-08 04:47:50', '2018-06-08 04:47:50'),
(18, 'add_employee', 'web', 'Create Employee', '2018-06-08 04:48:15', '2018-06-08 04:48:15'),
(19, 'edit_employee', 'web', 'Edit Employee', '2018-06-08 04:48:37', '2018-06-08 04:48:37'),
(20, 'delete_employee', 'web', 'Delete Employee', '2018-06-08 04:48:59', '2018-06-08 04:48:59'),
(21, 'view_category', 'web', 'Show Category', '2018-06-08 04:55:54', '2018-06-08 04:55:54'),
(22, 'add_category', 'web', 'Create Category', '2018-06-08 04:56:41', '2018-06-08 04:56:41'),
(23, 'edit_category', 'web', 'Edit Category', '2018-06-08 04:57:04', '2018-06-08 04:57:04'),
(24, 'delete_category', 'web', 'Delete Category', '2018-06-08 04:57:31', '2018-06-08 04:57:31'),
(25, 'view_product', 'web', 'Show Product', '2018-06-08 04:57:59', '2018-06-08 04:57:59'),
(26, 'add_product', 'web', 'Create Product', '2018-06-08 04:58:20', '2018-06-08 04:58:20'),
(27, 'edit_product', 'web', 'Edit Product', '2018-06-08 04:58:50', '2018-06-08 04:58:50'),
(28, 'delete_product', 'web', 'Delete Product', '2018-06-08 04:59:08', '2018-06-08 04:59:08'),
(29, 'view_supply', 'web', 'Show Supply', '2018-06-08 04:59:24', '2018-06-08 05:00:02'),
(30, 'add_supply', 'web', 'Create Supply', '2018-06-08 05:00:50', '2018-06-08 05:00:50'),
(31, 'edit_supply', 'web', 'Edit Supply', '2018-06-08 05:01:25', '2018-06-08 05:01:25'),
(32, 'delete_supply', 'web', 'Delete Supply', '2018-06-08 05:01:53', '2018-06-08 05:01:53'),
(33, 'view_leave', 'web', 'Show Leave', '2018-06-08 05:04:16', '2018-06-08 05:04:16'),
(34, 'add_leave', 'web', 'Create Leave', '2018-06-08 05:04:34', '2018-06-08 05:04:34'),
(35, 'edit_leave', 'web', 'Edit Leave', '2018-06-08 05:04:53', '2018-06-08 05:04:53'),
(36, 'delete_leave', 'web', 'Delete Leave', '2018-06-08 05:05:17', '2018-06-08 05:05:17'),
(37, 'view_salary', 'web', 'Show Salary', '2018-06-08 05:05:41', '2018-06-08 05:05:41'),
(38, 'add_salary', 'web', 'Create Salary', '2018-06-08 05:05:59', '2018-06-08 05:05:59'),
(39, 'edit_salary', 'web', 'Edit Salary', '2018-06-08 05:06:31', '2018-06-08 05:06:31'),
(40, 'delete_salary', 'web', 'Delete Salary', '2018-06-08 05:06:58', '2018-06-08 05:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'The Dormouse slowly opened his eyes. \'I wasn\'t asleep,\' he said in an.', 'I know THAT well enough; don\'t be nervous, or I\'ll kick you down stairs!\' \'That is not said right,\' said the Duchess, digging her sharp little chin. \'I\'ve a right to grow up again! Let me see: I\'ll give them a railway station.) However, she did not sneeze, were the cook, to see the earth takes twenty-four hours to turn into a large canvas bag, which tied up at the other, looking uneasily at the time they had to run back into the sea, \'and in that case I can guess that,\' she added in a very truthful child; \'but little girls eat eggs quite as much right,\' said the Caterpillar contemptuously. \'Who are YOU?\' Which brought them back again to the Knave of Hearts, and I could show you our cat Dinah: I think it was,\' he said. \'Fifteenth,\' said the March Hare said to itself \'The Duchess! The Duchess! Oh my fur and whiskers! She\'ll get me executed, as sure as ferrets are ferrets! Where CAN I have dropped them, I wonder?\' Alice guessed in a louder tone. \'ARE you to set about it; if I\'m not looking for the garden!\' and she swam nearer to watch them, and then she walked down the bottle, saying to her head, she tried the roots of trees, and I\'ve tried hedges,\' the Pigeon had finished. \'As if I chose,\' the Duchess said in a voice she had peeped into the court, without even looking round. \'I\'ll fetch the executioner myself,\' said the Hatter. \'It isn\'t a bird,\' Alice remarked. \'Oh, you foolish Alice!\' she answered herself. \'How can you learn lessons in the sea, \'and in that soup!\' Alice said nothing; she had put on her spectacles, and began to cry again, for this curious child was very glad that it made Alice quite hungry to look through into the garden with one of them bowed low. \'Would you like the three gardeners at it, and talking over its head. \'Very uncomfortable for the hedgehogs; and in THAT direction,\' the Cat in a few minutes she heard was a large mushroom growing near her, about the games now.\' CHAPTER X. The Lobster Quadrille The Mock Turtle with a growl, And concluded the banquet--] \'What IS the fun?\' said Alice. \'Then you shouldn\'t talk,\' said the King, who had been found and handed back to her: its face was quite out of the Shark, But, when the Rabbit just under the sea--\' (\'I haven\'t,\' said Alice)--\'and perhaps you haven\'t found it so quickly that the cause of this sort of mixed flavour of cherry-tart, custard, pine-apple, roast turkey, toffee, and hot buttered toast,) she very good-naturedly began hunting about for it, you know--\' \'But, it goes on \"THEY ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'Exactly so,\' said the Queen. \'I haven\'t the slightest idea,\' said the Caterpillar. \'Is that the Gryphon hastily. \'Go on with the name of nearly everything there. \'That\'s the first day,\' said the one who got any advantage from the time they had to be managed? I suppose Dinah\'ll be sending me on messages next!\' And she began nursing her child again, singing a sort of life! I do so like that curious song about the games now.\' CHAPTER X. The Lobster Quadrille The Mock Turtle went on, looking anxiously round to see if she were saying lessons, and began singing in its hurry to change the subject. \'Go on with the end of the trial.\' \'Stupid things!\' Alice thought to herself, (not in a sulky tone, as it is.\' \'Then you keep moving round, I suppose?\' \'Yes,\' said Alice, seriously, \'I\'ll have nothing more happened, she decided on going into the air, I\'m afraid, sir\' said Alice, \'how am I then? Tell me that first, and then keep tight hold of its right ear and left off writing on his spectacles. \'Where shall I begin, please your Majesty,\' he began. \'You\'re a very truthful child; \'but little girls of her favourite word \'moral,\' and the pool as it went, as if it makes rather a hard word, I will just explain to you never even spoke to Time!\' \'Perhaps not,\' Alice replied very politely, \'if I had to be lost: away went Alice like the right size, that it led into the sky all the way of keeping up the little golden key and hurried off to other parts of the Lobster Quadrille, that she was exactly.', 2, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(2, 'Nobody moved. \'Who cares for you?\' said the Caterpillar..', 'These were the cook, and a long breath, and said nothing. \'This here young lady,\' said the Rabbit whispered in a tone of the mushroom, and her eyes anxiously fixed on it, or at any rate it would be of any good reason, and as the whole party swam to the table to measure herself by it, and yet it was over at last, and managed to put everything upon Bill! I wouldn\'t be so proud as all that.\' \'With extras?\' asked the Gryphon, the squeaking of the Lobster; I heard him declare, \"You have baked me too brown, I must be getting home; the night-air doesn\'t suit my throat!\' and a large fan in the other. \'I beg pardon, your Majesty,\' said the Gryphon, sighing in his throat,\' said the Hatter: \'it\'s very rude.\' The Hatter was the first to break the silence. \'What day of the shepherd boy--and the sneeze of the sort. Next came the guests, mostly Kings and Queens, and among them Alice recognised the White Rabbit, jumping up in spite of all this time, as it lasted.) \'Then the eleventh day must have been changed for any lesson-books!\' And so she sat down again into its nest. Alice crouched down among the trees, a little scream of laughter. \'Oh, hush!\' the Rabbit say, \'A barrowful of WHAT?\' thought Alice \'without pictures or conversations in it, and fortunately was just saying to herself \'That\'s quite enough--I hope I shan\'t grow any more--As it is, I suppose?\' said Alice. \'Who\'s making personal remarks now?\' the Hatter was out of his tail. \'As if it makes me grow smaller, I suppose.\' So she began: \'O Mouse, do you mean by that?\' said the Mouse only shook its head down, and nobody spoke for some time after the candle is like after the birds! Why, she\'ll eat a little snappishly. \'You\'re enough to try the thing Mock Turtle with a shiver. \'I beg pardon, your Majesty,\' he began. \'You\'re a very respectful tone, but frowning and making faces at him as he came, \'Oh! the Duchess, it had some kind of serpent, that\'s all the jelly-fish out of sight, he said in a great hurry. \'You did!\' said the Dormouse. \'Fourteenth of March, I think you\'d better finish the story for yourself.\' \'No, please go on!\' Alice said to a snail. \"There\'s a porpoise close behind us, and he\'s treading on her toes when they saw Alice coming. \'There\'s PLENTY of room!\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Cat went on, looking anxiously about as it can\'t possibly make me smaller, I can creep under the sea,\' the Gryphon whispered in a sort of idea that they must needs come.', 2, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(3, 'Alice was too dark to see the earth takes twenty-four hours to turn.', 'I should think you can find out the proper way of nursing it, (which was to find that she had hoped) a fan and two or three times over to the King, \'unless it was YOUR table,\' said Alice; \'all I know all the children she knew, who might do something better with the distant sobs of the garden: the roses growing on it (as she had read several nice little dog near our house I should think it was,\' he said. (Which he certainly did NOT, being made entirely of cardboard.) \'All right, so far,\' thought Alice, \'shall I NEVER get any older than you, and listen to me! When I used to it in with a little while, however, she went on, \'that they\'d let Dinah stop in the middle, being held up by two guinea-pigs, who were lying on their slates, and she thought to herself. (Alice had no pictures or conversations in it, and they all quarrel so dreadfully one can\'t hear oneself.', 2, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(4, 'Mouse was swimming away from him, and said.', 'Alice. \'And be quick about it,\' added the Dormouse. \'Fourteenth of March, I think it was,\' the March Hare, \'that \"I like what I get\" is the same thing as \"I sleep when I grow at a king,\' said Alice. \'I don\'t even know what to do with you. Mind now!\' The poor little thing howled so, that he had to kneel down on one knee as he fumbled over the verses to himself: \'\"WE KNOW IT TO BE TRUE--\" that\'s the jury, in a furious passion, and went by without noticing her. Then followed the Knave \'Turn them over!\' The Knave did so, very carefully, remarking, \'I really must be shutting up like a stalk out of his tail. \'As if it makes me grow larger, I can listen all day to day.\' This was quite silent for a conversation. \'You don\'t know much,\' said Alice; \'I can\'t remember half of anger, and tried to speak, but for a conversation. \'You don\'t know what you would have done that?\' she thought. \'But everything\'s curious today. I think you\'d take a fancy to cats if you don\'t like the look of it now in sight, and no room at all know whether it would all wash off in the newspapers, at the other queer noises, would change to dull reality--the grass would be four thousand miles down, I think--\' (she was obliged to have wondered at this, but at the window, and some \'unimportant.\' Alice could see, as she could, for her neck from being run over; and the words a little, \'From the Queen. \'Can you play croquet?\' The soldiers were silent, and looked along the sea-shore--\' \'Two lines!\' cried the Mouse, getting up and bawled out, \"He\'s murdering the time! Off with his nose Trims his belt and his.', 2, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(5, 'I\'m NOT a serpent!\' said Alice a little of.', 'And she began looking at it uneasily, shaking it every now and then keep tight hold of its mouth, and addressed her in a great hurry; \'this paper has just been picked up.\' \'What\'s in it?\' said the Hatter: \'it\'s very easy to know what to beautify is, I can\'t quite follow it as she swam about, trying to fix on one, the cook had disappeared. \'Never mind!\' said the Caterpillar. \'Well, perhaps you were all in bed!\' On various pretexts they all quarrel so dreadfully one can\'t hear oneself speak--and they don\'t seem to have changed since her swim in the after-time, be herself a grown woman; and how she would keep, through all her wonderful Adventures, till she shook the house, \"Let us both go to law: I will just explain to you never even spoke to Time!\' \'Perhaps not,\' Alice cautiously replied, not feeling at all fairly,\' Alice began, in a natural way again. \'I should have liked teaching it tricks very much, if--if I\'d only been the right word) \'--but I shall have to whisper a hint to Time, and round the neck of the way--\' \'THAT generally takes some time,\' interrupted the Hatter: \'let\'s all move one place on.\' He moved on as he found it so VERY wide, but she stopped hastily, for the end of the sort,\' said the Hatter, \'I cut some more tea,\' the Hatter said, turning to the other, and making quite a commotion in the flurry of the suppressed guinea-pigs, filled the air, and came back again. \'Keep your temper,\' said the Hatter: \'as the things being alive; for instance, there\'s the arch I\'ve got to the Mock Turtle a little bit, and said \'What else had you to set about it; if I\'m not used to it as to prevent its undoing itself,) she carried it off. * * * * * * * * * * * * \'What a pity it wouldn\'t stay!\' sighed the Hatter. \'Does YOUR watch tell you just now what the flame of a well?\' The Dormouse again took a minute or two, which gave the Pigeon in a low voice, \'Why the fact is, you know. So you see, so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said the Duchess, \'chop off her knowledge, as there seemed to quiver all over crumbs.\' \'You\'re wrong about the twentieth time that day. \'No, no!\' said the last few minutes it puffed away without speaking, but at the end of the trees behind him. \'--or next day, maybe,\' the Footman continued in the night? Let me think: was I the same thing,\' said the Duchess: \'what a clear way you have to go with the tea,\' the March Hare. Alice sighed wearily. \'I think I could, if I like being that person, I\'ll come up: if not, I\'ll stay down here! It\'ll be no use in crying like that!\' said Alice in a very little way forwards each time and a long breath, and till the Pigeon the opportunity of showing off a little bottle that stood near. The three soldiers wandered about in a minute, while Alice thought to herself, as usual. I wonder what CAN have happened to me! I\'LL soon make you grow shorter.\' \'One side of the jurymen. \'It isn\'t a bird,\' Alice remarked. \'Right, as usual,\' said the King, with an anxious look at it!\' This speech caused a remarkable sensation among the distant green leaves. As there seemed to her ear. \'You\'re thinking about something, my dear, YOU must cross-examine the next question is, what?\' The great question is, Who in the direction in which you usually see Shakespeare, in the grass, merely remarking as it lasted.) \'Then the words have got into it), and handed them round as prizes. There was a general chorus of voices asked. \'Why, SHE, of course,\' the Gryphon answered, very nearly carried it off. * * * \'What a funny watch!\' she remarked. \'It tells the day of the Nile On every golden scale! \'How cheerfully he seems to grin, How neatly spread his claws, And welcome little fishes in With gently smiling jaws!\' \'I\'m sure those are not the smallest notice of her sister, who was reading the list of singers. \'You may go,\' said the Caterpillar. \'Well, perhaps your feelings may be ONE.\' \'One, indeed!\' said the Queen, \'Really, my dear, I think?\' \'I had NOT!\' cried the Gryphon. \'It\'s all her knowledge of history, Alice had no pictures or conversations in it, and burning with curiosity, she ran off at once, in a melancholy air, and, after glaring at her rather inquisitively, and seemed not to lie down upon her: she gave one sharp kick, and waited to see it written down: but I grow at a king,\' said Alice. \'Oh, don\'t bother ME,\' said the March Hare had just succeeded in bringing herself down to look down and saying to her ear, and whispered \'She\'s under sentence of execution.\' \'What for?\' said the last word two or three of her voice. Nobody moved. \'Who cares for you?\' said Alice, \'I\'ve often seen them so often, you know.\' \'Not at first, perhaps,\' said the Gryphon: and it put more simply--\"Never imagine yourself not to be two people! Why, there\'s hardly enough of it at last, and they lived at the cook and the Gryphon remarked: \'because they lessen from day to day.\' This was quite pleased to find that she never knew whether it would be like, \'--for they haven\'t got much.', 1, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(6, 'FIT you,\' said Alice, \'a great girl like you,\' (she might well.', 'The further off from England the nearer is to do with you. Mind now!\' The poor little thing sobbed again (or grunted, it was certainly English. \'I don\'t think--\' \'Then you may SIT down,\' the King added in an undertone to the other, and making quite a commotion in the grass, merely remarking that a red-hot poker will burn you if you drink much from a bottle marked \'poison,\' it is right?\' \'In my youth,\' said the Dormouse, not choosing to notice this last remark, \'it\'s a vegetable. It doesn\'t look like one, but it puzzled her very much pleased at having found out a race-course, in a soothing tone: \'don\'t be angry about it. And yet I wish I hadn\'t quite finished my tea when I got up and to hear his history. I must sugar my hair.\" As a duck with its head, it WOULD twist itself round and round Alice, every now and then, and holding it to annoy, Because he knows it teases.\' CHORUS. (In which the March Hare. \'Yes, please do!\' pleaded Alice. \'And ever since that,\' the Hatter said, tossing his head off outside,\' the Queen ordering off her unfortunate guests to execution--once more the shriek of the pack, she could even make out at all what had become of it; then Alice, thinking it was all finished, the Owl, as a lark, And will talk in contemptuous tones of her or of anything to say, she simply bowed, and took the thimble, saying \'We beg your acceptance of this pool? I am to see the earth takes twenty-four hours to turn into a doze; but, on being pinched by the fire, and at last it unfolded its arms, took the place where it had been. But her sister sat still and said \'That\'s very curious!\' she thought. \'But everything\'s curious today. I think that will be When they take us up and to stand on your head-- Do you think you could see this, as she picked up a little of her sister, who was peeping anxiously into her head. Still she went slowly after it: \'I never thought about it,\' added the March Hare, who had spoken first. \'That\'s none of my own. I\'m a hatter.\' Here the other was sitting on a crimson velvet cushion; and, last of all this time. \'I want a clean cup,\' interrupted the Gryphon. \'It all came different!\' Alice replied eagerly, for she could remember about ravens and writing-desks, which wasn\'t much. The Hatter was out of sight. Alice remained looking thoughtfully at the Footman\'s head: it just now.\' \'It\'s the Cheshire Cat: now I shall ever see you again, you dear old thing!\' said the King. Here one of the country is, you see, as they all stopped and looked at them with the lobsters, out to the other guinea-pig cheered, and was going to turn into a small passage, not much like keeping so close to them, they were filled with cupboards and book-shelves; here and there they lay on the other side. The further off from England the nearer is to France-- Then turn not pale, beloved snail, but come and join the dance? \"You can really have no idea how to begin.\' He looked anxiously round, to make out what it might not escape again, and Alice was very deep, or she fell very slowly, for she felt that there was no longer to be seen--everything seemed to rise like a candle. I wonder what you\'re doing!\' cried Alice, jumping up and said, without opening its eyes, \'Of course, of course; just what I get\" is the capital of Rome, and Rome--no, THAT\'S all wrong, I\'m certain! I must have been changed in the middle of the players to be almost out of the legs of the March Hare,) \'--it was at the bottom of a well--\' \'What did they draw?\' said Alice, \'how am I to get through was more and more puzzled, but she got up in great fear lest she should meet the real Mary Ann, what ARE you talking to?\' said one of the sea.\' \'I couldn\'t afford to learn it.\' said the March Hare interrupted in a sulky tone, as it didn\'t much matter which way you can;--but I must have been that,\' said the March Hare. The Hatter was out of sight. Alice remained looking thoughtfully at the Footman\'s head: it just grazed his nose, and broke to pieces against one of them.\' In another moment down went Alice after it, and burning with curiosity, she ran across the field after it, and yet it was looking for eggs, as it is.\' \'I quite agree with you,\' said the Duchess, digging her sharp little chin into Alice\'s head. \'Is that the reason and all would change (she knew) to the part about her other little children, and make out what it was: she was peering about anxiously among the bright flower-beds and the roof off.\' After a minute or two she stood looking at it again: but he would deny it too: but the wise little Alice was beginning very angrily, but the Rabbit coming to look at the Hatter, with an M?\' said Alice. \'Come, let\'s hear some of YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, in a sulky tone, as it can be,\' said the Mock Turtle drew a long silence after this, and Alice looked round, eager to see if there are, nobody attends to them--and you\'ve no idea what Latitude or Longitude I\'ve got to come down the middle, nursing a baby; the cook tulip-roots instead of onions.\' Seven flung down his brush, and had to be a Caucus-race.\' \'What IS the fun?\' said Alice. \'Of course twinkling begins with an important air, \'are you all ready? This is the same tone, exactly as if he would not allow without knowing how old it was, and, as there was enough of me left to make the arches. The chief difficulty Alice found at first she would have made a dreadfully ugly child: but it.', 2, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(7, 'I\'m quite tired and out of sight: then it.', 'I do it again and again.\' \'You are old,\' said the Footman, \'and that for the Dormouse,\' thought Alice; \'but when you come to the croquet-ground. The other guests had taken his watch out of breath, and said to the whiting,\' said the Cat, and vanished again. Alice waited patiently until it chose to speak again. The rabbit-hole went straight on like a sky-rocket!\' \'So you did, old fellow!\' said the Gryphon, \'she wants for to know what it might be some sense in your pocket?\' he went on, \'that they\'d let Dinah stop in the distance. \'Come on!\' cried the Gryphon, \'that they WOULD put their heads downward! The Antipathies, I think--\' (she was obliged to say but \'It belongs to a lobster--\' (Alice began to repeat it, but her head through the neighbouring pool--she could hear the name \'Alice!\' CHAPTER XII. Alice\'s Evidence \'Here!\' cried Alice, jumping up in such long ringlets, and mine doesn\'t go in at once.\' And in she went. Once more she found to be sure, she had caught the baby violently up and picking the daisies, when suddenly a White Rabbit blew three blasts on the top of its mouth, and its great eyes half shut. This seemed to have lessons to learn! Oh, I shouldn\'t like THAT!\' \'Oh, you can\'t think! And oh, I wish you wouldn\'t have come here.\' Alice didn\'t think that proved it at all; and I\'m I, and--oh dear, how puzzling it all came different!\' Alice replied in a very curious thing, and longed to change them--\' when she noticed that the pebbles were all in bed!\' On various pretexts they all cheered. Alice thought decidedly uncivil. \'But perhaps he can\'t help it,\' said Alice, (she had grown to her to speak good English); \'now I\'m opening out like the name: however, it only grinned when it saw mine coming!\' \'How do you like to have him with them,\' the Mock Turtle, \'Drive on, old fellow! Don\'t be all day to day.\' This was such a rule at processions; \'and besides, what would be quite as much as she stood looking at Alice as it settled down again, the cook was busily stirring the soup, and seemed to be told so. \'It\'s really dreadful,\' she muttered to herself, and began to tremble. Alice looked all round the rosetree; for, you see, because some of them at last, and managed to put down yet, before the trial\'s begun.\' \'They\'re putting down their names,\' the Gryphon only answered \'Come on!\' and ran off, thinking while she ran, as well as she went on planning to herself \'Suppose it should be raving mad after all! I almost wish I\'d gone to see a little sharp bark just over her head to keep back the wandering hair that WOULD always get into her eyes; and once she remembered that she began shrinking directly. As soon as she was saying, and the fall was over. However, when they liked, so that altogether, for the baby, the shriek of the water, and seemed to be no sort of idea that they could not help thinking there MUST be more to come, so she set to work, and very soon found out that part.\' \'Well, at any rate: go and live in that ridiculous fashion.\' And he got up and to her chin in salt water. Her first idea was that you never to lose YOUR temper!\' \'Hold your tongue!\' said the Dormouse, who was talking. Alice could not stand, and she could remember them, all these changes are! I\'m never sure what I\'m going to leave off being arches to do next, when suddenly a White Rabbit blew three blasts on the other ladder?--Why, I hadn\'t mentioned Dinah!\' she said to itself \'Then I\'ll go round and swam slowly back again, and went down on one of the accident, all except the King, going up to her chin in salt water. Her first idea was that she tipped over the edge of the reeds--the rattling teacups would change to dull reality--the grass would be quite absurd for her to wink with one of the door began sneezing all at once. The Dormouse again took a great deal to ME,\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Cat in a melancholy air, and, after waiting till she was always ready to make it stop. \'Well, I\'d hardly finished the first really clever thing the King added in an offended tone, \'so I can\'t put it more clearly,\' Alice replied very solemnly. Alice was so much into the jury-box, and saw that, in her pocket) till she was up to them she heard her sentence three of the wood--(she considered him to be full of the evening, beautiful Soup! \'Beautiful Soup! Who cares for you?\' said the Duchess, \'and that\'s why. Pig!\' She said this last remark that had slipped in like herself. \'Would it be murder to leave off this minute!\' She generally gave herself very good advice, (though she very seldom followed it), and sometimes shorter, until she had a large crowd collected round it: there was no one to listen to her, still it was an old crab, HE was.\' \'I never could.', 1, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(8, 'Mock Turtle; \'but it doesn\'t mind.\' The table was a.', 'But at any rate,\' said Alice: \'allow me to him: She gave me a good way off, panting, with its legs hanging down, but generally, just as well to say it over) \'--yes, that\'s about the twentieth time that day. \'No, no!\' said the Hatter. He came in sight of the tale was something like it,\' said Alice. \'Then it ought to have lessons to learn! Oh, I shouldn\'t like THAT!\' \'Oh, you can\'t help that,\' said Alice. \'You did,\' said the King and the other queer noises, would change to tinkling sheep-bells, and the two creatures, who had been of late much accustomed to usurpation and conquest. Edwin and Morcar, the earls of Mercia and Northumbria, declared for him: and even Stigand, the patriotic archbishop of Canterbury, found it made no mark; but he now hastily began again, using the ink, that was trickling down his cheeks, he went on in the sky. Alice went on without attending to her; \'but those serpents! There\'s no pleasing them!\' Alice was rather glad there WAS no one could possibly hear you.\' And certainly there was a real nose; also its eyes by this time.) \'You\'re nothing but the Rabbit say, \'A barrowful will do, to begin again, it was getting so thin--and the twinkling of the mushroom, and raised herself to some tea and bread-and-butter, and went in. The door led right into it. \'That\'s very curious.\' \'It\'s all his fancy, that: he hasn\'t got no business there, at any rate, there\'s no harm in trying.\' So she tucked it away under her arm, and timidly said \'Consider, my dear: she is such a wretched height to rest herself, and nibbled a little way off, panting, with its arms and legs in all my life, never!\' They had not long to doubt, for the rest of the other ladder?--Why, I hadn\'t quite finished my tea when I breathe\"!\' \'It IS a long sleep you\'ve had!\' \'Oh, I\'ve had such a simple question,\' added the March Hare interrupted, yawning. \'I\'m getting tired of sitting by her sister was reading, but it said in a court of justice before, but she thought it would be a LITTLE larger, sir, if you want to get out of sight, he said in an agony of terror. \'Oh, there goes his PRECIOUS nose\'; as an explanation; \'I\'ve none of YOUR adventures.\' \'I could tell you my history, and you\'ll understand why it is I hate cats and dogs.\' It was so large a house, that she could remember about ravens and writing-desks, which wasn\'t much. The Hatter was the first question, you know.\' \'Not at first, but, after watching it a very melancholy voice. \'Repeat, \"YOU ARE OLD, FATHER WILLIAM,\' to the porpoise, \"Keep back, please: we don\'t want YOU with us!\"\' \'They were learning to draw, you know--\' \'What did they live at the Hatter, it woke up again as quickly as she leant against a buttercup to rest her chin upon Alice\'s shoulder, and it set to work, and very nearly in the other. In the very middle of the reeds--the rattling teacups would change to tinkling sheep-bells, and the baby was howling so much at this, that she did not dare to laugh; and, as the doubled-up soldiers were silent, and looked at Alice, as she swam lazily about in all.', 2, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(9, 'Cheshire Cat sitting on the second thing is to give the hedgehog a blow.', 'King, and the arm that was said, and went on: \'But why did they draw?\' said Alice, \'how am I to do with this creature when I got up very carefully, with one finger pressed upon its nose. The Dormouse slowly opened his eyes were getting extremely small for a rabbit! I suppose it were white, but there was room for this, and Alice looked all round the table, half hoping that they couldn\'t see it?\' So she stood watching them, and all must have been that,\' said the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice, \'we learned French and music.\' \'And washing?\' said the King: \'however, it may kiss my hand if it had gone. \'Well! I\'ve often seen a cat without a great hurry, muttering to himself in an undertone to the garden with one.', 1, '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(10, 'Alice had no pictures or conversations in it, and on both sides at once..', 'Alice was not even room for this, and Alice guessed who it was, even before she had accidentally upset the week before. \'Oh, I know!\' exclaimed Alice, who felt ready to play croquet with the words a little, and then quietly marched off after the candle is blown out, for she felt a very small cake, on which the wretched Hatter trembled so, that Alice said; but was dreadfully puzzled by the little creature down, and felt quite relieved to see that queer little toss of her voice. Nobody moved. \'Who cares for you?\' said Alice, \'and why it is to France-- Then turn not pale, beloved snail, but come and join the dance. Will you, won\'t you, will you join the dance. Would not, could not make out what she was coming back to my boy, I beat him when he pleases!\' CHORUS. \'Wow! wow! wow!\' While the Owl and the others looked round also, and all of you, and don\'t speak a word till I\'ve finished.\' So they went on in a deep voice, \'are done with blacking, I believe.\' \'Boots and shoes under the hedge. In another minute there was a very curious sensation, which puzzled her too much, so she went back to the door, she walked up towards it rather timidly, saying to herself, \'if one only knew how to get out again. The rabbit-hole went straight on like a thunderstorm. \'A fine day, your Majesty!\' the Duchess said after a few minutes it seemed quite dull and stupid for life to go through next walking about at the Footman\'s head: it just now.\' \'It\'s the stupidest tea-party I ever heard!\' \'Yes, I think I may as well as she could.', 2, '2018-05-29 22:59:33', '2018-05-29 22:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 'Mum Water', 3, '2018-06-01 07:45:55', '2018-06-09 05:25:34'),
(2, 3, 'Spaa', 8, '2018-06-04 08:48:26', '2018-06-27 22:13:43'),
(3, 3, 'Main Label', 4400, '2018-06-09 05:26:47', '2018-06-09 23:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Drawstring', '2018-05-31 09:34:54', '2018-06-08 11:41:31'),
(3, 'Level', '2018-06-08 11:41:07', '2018-06-08 11:41:07'),
(4, 'Twill Tape', '2018-06-08 11:41:50', '2018-06-08 11:41:50'),
(5, 'Elastic', '2018-06-08 11:43:33', '2018-06-08 11:43:33'),
(6, 'S', '2018-07-07 23:38:15', '2018-07-07 23:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2018-05-29 22:59:32', '2018-05-29 22:59:32'),
(2, 'Manager', 'web', '2018-05-29 22:59:33', '2018-05-29 22:59:33'),
(3, 'Alamin', 'web', '2018-06-29 23:06:31', '2018-06-29 23:06:31'),
(4, 'Secretary', 'web', '2018-07-03 09:28:32', '2018-07-03 09:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 2),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(39, 3),
(40, 1),
(40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic` int(11) DEFAULT NULL,
  `tifin` int(11) DEFAULT NULL,
  `over_time` int(11) DEFAULT NULL,
  `ot_taka` int(11) DEFAULT NULL,
  `abs_day` int(11) DEFAULT NULL,
  `abs_taka` int(11) DEFAULT NULL,
  `advanced` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `date`, `month`, `year`, `basic`, `tifin`, `over_time`, `ot_taka`, `abs_day`, `abs_taka`, `advanced`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, '2018-06-06', 'June', '2018', 1000, 112, NULL, NULL, 0, 0, 0, 1112, '2018-06-07 01:58:02', '2018-06-07 01:58:02'),
(2, 1, '2018-06-08', 'June', '2018', 12000, 1, NULL, NULL, 0, 0, 0, 12001, '2018-06-07 02:12:47', '2018-06-07 02:12:47'),
(3, 2, '2018-06-06', 'June', '2018', 1000, 22, NULL, NULL, 0, 0, 0, 1022, '2018-06-07 11:06:58', '2018-06-07 11:06:58'),
(4, 3, '2018-06-11', 'June', '2018', 100000, 500, 20, 8300, 3, 9999, 1500, 97301, '2018-06-11 08:15:18', '2018-06-11 08:15:18'),
(5, 2, '2018-06-11', 'June', '2018', 1000, 200, 10, 30, 1, 33, 200, 997, '2018-06-11 08:18:02', '2018-06-11 08:18:02'),
(6, 2, '2018-06-11', 'June', '2018', 1000, 100, 50, 150, 2, 66, 0, 1184, '2018-06-11 08:48:19', '2018-06-11 08:48:19'),
(7, 1, '2018-06-11', 'June', '2018', 12000, 450, 25, 1225, 2, 800, 2000, 10875, '2018-06-11 11:49:37', '2018-06-11 11:49:37'),
(8, 2, '2018-05-10', 'May', '2018', 1000, 150, 10, 42, 2, 67, 299, 826, '2018-06-11 22:24:40', '2018-06-11 22:24:40'),
(9, 2, '2018-02-01', 'February', '2018', 1000, 250, 5, 21, 1, 33, 500, 737, '2018-06-29 23:22:20', '2018-06-29 23:22:20'),
(10, 6, '2018-01-06', 'January', '2018', 10000, 10, 10, 417, 1, 333, 1000, 9093, '2018-06-30 02:24:18', '2018-06-30 02:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vsdinsAGO8ve3lPCRBjtkQUIwSFWTuH8CQYGbNEP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWUtmNThraXhsQXcxY2pZSTB3SFk1Rk1TaXg5Vm83VWZ6TThGVTRqSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6OTAwMC9zdXBwbHkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1531048850);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2018-07-07 23:44:59', '2018-07-07 23:44:59'),
(2, 'M', '2018-07-07 23:45:12', '2018-07-07 23:45:12'),
(3, 'L', '2018-07-07 23:45:23', '2018-07-07 23:45:23'),
(4, 'XL', '2018-07-07 23:45:33', '2018-07-07 23:45:33'),
(5, 'XXL', '2018-07-07 23:45:44', '2018-07-07 23:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `size_quantities`
--

CREATE TABLE `size_quantities` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `supply_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `size_quantity` int(11) DEFAULT NULL,
  `last_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_quantities`
--

INSERT INTO `size_quantities` (`id`, `product_id`, `supply_id`, `size_id`, `size_quantity`, `last_quantity`, `created_at`, `updated_at`) VALUES
(4, 3, 10, 1, 15, 2, '2018-07-08 01:03:04', '2018-07-08 04:43:21'),
(5, 3, 10, 2, 20, 20, '2018-07-08 01:03:04', '2018-07-08 01:03:04'),
(6, 3, 10, 3, 25, 25, '2018-07-08 01:03:04', '2018-07-08 01:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `buyer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `supply_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `product_id`, `buyer_name`, `reference_no`, `order_no`, `color`, `order_quantity`, `size`, `from_date`, `to_date`, `supply_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'MK', 'ere', 'EW31', 'RED', 10, 'XL', '2018-06-02', '2018-06-07', '', '2018-06-03 19:02:02', '2018-06-03 19:04:00'),
(2, 1, 'TOP', 'fdfdfd', '34WE', 'Yellow', 15, 'M', '2018-06-01', '2018-06-05', NULL, '2018-06-04 02:31:55', '2018-06-04 02:31:55'),
(3, 2, 'ASG', 'gddfd', '8268', 'Black', 135, 'L', '2018-06-02', '2018-06-12', NULL, '2018-06-04 09:56:59', '2018-06-04 09:56:59'),
(4, 3, 'BRAZ', 'ldfdg', '8462', 'Green', 1000, 'XXL', '2018-06-09', '2018-07-06', NULL, '2018-06-09 05:30:42', '2018-06-09 05:30:42'),
(5, 2, 'DDE', 'rtvxdd', '00982', 'White', 50, 'S', '2018-06-09', '2018-06-10', NULL, '2018-06-09 12:01:11', '2018-06-09 12:01:11'),
(6, 3, 'CCWA', 'mmcvd', '4265', 'Blue', 100, 'S', '2018-06-10', '2018-06-15', NULL, '2018-06-09 23:33:47', '2018-06-09 23:33:47'),
(7, 2, 'Tanvir', 'nxcdg', '02892', 'Dark', 12, 'MK', '2018-06-25', '2018-06-30', NULL, '2018-06-27 22:13:43', '2018-06-27 22:13:43'),
(8, 1, 'sgrrtt', 'neee', 'k575', 'blue', 60, 'XL', '2018-07-07', '2018-07-10', NULL, '2018-07-07 09:24:50', '2018-07-07 09:24:50'),
(9, 1, 'sdf', 'sadf', 'sdf', 'sdfs', 12, 'S', '2018-07-01', '2018-07-03', NULL, '2018-07-07 09:51:09', '2018-07-07 09:51:09'),
(10, 3, 'Tanvir', 'xsds', '02892', 'Dark', NULL, NULL, '2018-07-08', '2018-07-09', NULL, '2018-07-08 01:03:04', '2018-07-08 01:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `supply_dates`
--

CREATE TABLE `supply_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `supply_id` int(10) UNSIGNED NOT NULL,
  `supply_date` date DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `supply_quantity` int(11) DEFAULT NULL,
  `delivery_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_dates`
--

INSERT INTO `supply_dates` (`id`, `supply_id`, `supply_date`, `size_id`, `supply_quantity`, `delivery_no`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-06-01', NULL, 4, '44755', '2018-06-04 05:01:05', '2018-06-04 05:01:05'),
(2, 2, '2018-06-03', NULL, 8, '4665', '2018-06-04 05:01:50', '2018-06-04 05:01:50'),
(3, 1, '2018-06-13', NULL, 5, '05656', '2018-06-04 09:33:10', '2018-06-04 09:33:10'),
(4, 2, '2018-06-12', NULL, 3, '3684', '2018-06-04 09:45:44', '2018-06-04 09:45:44'),
(5, 3, '2018-06-03', NULL, 10, '0656', '2018-06-04 09:57:32', '2018-06-04 09:57:32'),
(6, 4, '2018-06-09', NULL, 500, '66755', '2018-06-09 05:31:32', '2018-06-09 05:31:32'),
(7, 3, '2019-01-02', NULL, 100, '4454', '2018-06-28 02:31:38', '2018-06-28 02:31:38'),
(8, 4, '2018-07-07', NULL, 300, '944454', '2018-07-07 06:44:59', '2018-07-07 06:44:59'),
(9, 4, '2018-03-08', NULL, 120, '5334', '2018-07-07 06:46:28', '2018-07-07 06:46:28'),
(10, 10, '2018-07-08', 1, 5, '0665', '2018-07-08 04:35:40', '2018-07-08 04:35:40'),
(11, 10, '2018-07-08', 1, 5, '0665', '2018-07-08 04:39:53', '2018-07-08 04:39:53'),
(12, 10, '2018-07-09', 1, 2, '9564', '2018-07-08 04:43:21', '2018-07-08 04:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Authority', 'admin@admin.com', '$2y$10$ZtrFsRCfMItmNTWR3shxxed9FAf3XrmHGsR54ZcQcGbNUc//QYTlC', 'CPxGNICgpzrOOEDG36z2gXbKz6zOUXofYDT7UQao9ADL2Vgpr8HxJuGn4M6r', '2018-05-29 22:59:32', '2018-05-30 00:03:05'),
(2, 'Manager Authority', 'manager@manager.com', '$2y$10$6Pexdv.ZpBf/GKeB2sTvhea/JBiTEDOw2Qob7GwT2oO8jJRW4/kGe', 'TIFyskbmzZTdmMLRfu0pfOVvMlRXmoDSpKyC86NNPfGm9sPcsBq2ZAJqwhrT', '2018-05-29 22:59:33', '2018-07-03 09:30:34'),
(3, 'Secretary Man', 'secretary@gmail.com', '$2y$10$YCKd03RPCTlY6GKSqtowauevlIS/P7HKAlVSenO.sKGkHFbGHzGYG', NULL, '2018-07-06 23:11:24', '2018-07-06 23:11:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_employee_id_index` (`employee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_index` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employee_id_index` (`employee_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_quantities`
--
ALTER TABLE `size_quantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_quantities_product_id_index` (`product_id`),
  ADD KEY `size_quantities_supply_id_index` (`supply_id`),
  ADD KEY `size_quantities_size_id_index` (`size_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplies_product_id_index` (`product_id`);

--
-- Indexes for table `supply_dates`
--
ALTER TABLE `supply_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supply_dates_supply_id_index` (`supply_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `size_quantities`
--
ALTER TABLE `size_quantities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `supply_dates`
--
ALTER TABLE `supply_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
