-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2025 at 05:26 AM
-- Server version: 10.11.13-MariaDB
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denterpro_dentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `antibiotic_guidelines`
--

CREATE TABLE `antibiotic_guidelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antibiotic_guidelines`
--

INSERT INTO `antibiotic_guidelines` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(56, 'Empiric Abx Guidelines 2025', 'Empiric Abx Guidelines 2025', 'guide/antibiotic_guideline/1750845405.pdf', 1, '2025-06-25 15:56:45', '2025-06-25 15:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `app_setting_manages`
--

CREATE TABLE `app_setting_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `phoneimage` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `emailimage` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `locationimage` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `policy1title` varchar(255) DEFAULT NULL,
  `policy1description` text DEFAULT NULL,
  `policy2title` varchar(255) DEFAULT NULL,
  `policy2description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'banners/QVCINW0rPr6Ya4cKlOy7S86XRscTK6lpBkugtvg2.jpg', 1, '2025-03-24 08:24:39', '2025-07-03 16:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `bdjobs`
--

CREATE TABLE `bdjobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_deadline` date NOT NULL,
  `source_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bdjobs`
--

INSERT INTO `bdjobs` (`id`, `title`, `description`, `image`, `company_name`, `job_deadline`, `source_url`, `status`, `created_at`, `updated_at`) VALUES
(42, 'Business Development Manager', 'Company: Tech Lab33 Limited \r\nLocation: Apon Height 27/1/B, Road: 03, Shyamoli, Dhaka-1207\r\nJob Type: Full-Time\r\nSalary: Negotiable \r\n\r\n🔹 Job Summary:\r\nWe are looking for a motivated Business Development Manager to drive the growth of our Company. The ideal candidate is a passionate, results-oriented professional who can identify new business opportunities, foster strong relationships with prospective clients, and contribute to the company\'s revenue goals.\r\n\r\n🔹 Key Responsibilities:\r\n•	Identify and pursue new business opportunities through market research, networking, and lead generation.\r\n•	Develop and implement strategic plans to achieve sales targets and grow client base.\r\n•	Build strong, long-term relationships with prospective clients and key stakeholders.\r\n•	Provide consultation to clients to help identify their business needs and match them with appropriate solutions.\r\n•	Prepare and deliver tailored presentations, demos, and proposals.\r\n•	Work closely with technical teams and account managers to oversee delivery and customer satisfaction.\r\n•	Stay updated with industry trends, competitor activity, and customer preferences.\r\n•	Manage and track sales pipeline, performance metrics, and progress toward goals.\r\n\r\n🔹 Qualifications:\r\n•	Bachelor’s degree in Business, Marketing, IT, or related field.\r\n•	1+ years of experience in Business Development or Sales within the software industry.\r\n•	Excellent communication, interpersonal, and negotiation skills.\r\n•	Familiarity with software services, custom software, solutions, or related technologies is a plus.\r\n•	Goal-oriented, motivated, and adaptable with a strong sense of ownership.\r\n\r\nTo apply, please send your updated CV to info@techlab33.com.', NULL, 'Tech Lab33 Limited', '2025-06-30', NULL, 'active', '2025-06-25 14:50:11', '2025-06-25 14:50:32'),
(43, 'Pharma JOB', 'You can Tru', 'files/all/17510130830.jpg', 'OPSONIN PHARMA', '2025-07-21', '27/6/25', 'active', '2025-06-27 14:32:25', '2025-06-27 14:32:25'),
(44, 'pharma jobs', 'you can try', 'files/all/17519095660.jpg', 'Health care', '2025-07-08', '7/7/25', 'active', '2025-07-07 23:32:51', '2025-07-07 23:32:51'),
(45, 'Pharma Jobs', 'You can Try', 'files/all/17524101680.jpg', 'IBNA SINA', '2025-07-22', '12/7/25', 'active', '2025-07-13 18:36:10', '2025-07-13 18:36:10'),
(46, 'Pharma Job', 'You can try', 'files/all/17524104470.jpg', 'Aristo pharma', '2025-07-16', '12/7/25', 'active', '2025-07-13 18:41:07', '2025-07-13 18:41:07'),
(47, 'Pharma Jobs', 'You can try', 'files/all/17524105590.jpg', 'EVAREST', '2025-07-13', '12/7/25', 'active', '2025-07-13 18:43:40', '2025-07-13 18:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`file`)),
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `user_type`, `user_id`, `file`, `status`, `created_at`, `updated_at`) VALUES
(68, 'How is metastatic prostate cancer detected and treated in men over 70?', 'National guidelines on prostate cancer screening with the PSA test are set by the US Preventive Services Task Force (USPSTF). This independent panel of experts in preventive and primary care recommends against screening for prostate cancer in men older than 70.\r\n\r\nWhy? Prostate cancer tends to be slow-growing. Men in this age group are more likely to die with the disease rather than from it. And in the view of the USPSTF, survival benefits from treating PSA-detected prostate cancer in older men are unlikely to outweigh the harms of treatment.\r\n\r\nStill, that leaves open the possibility that men could be screened for prostate cancer only after their disease has advanced to symptomatic stages. For a perspective on PSA screening and advanced prostate cancer treatment in older men, we spoke with Dr. Marc B. Garnick, the Gorman Brothers Professor of Medicine at Harvard Medical School and Beth Israel Deaconess Medical Center, and editor in chief of the Harvard Medical School Guide to Prostate Diseases.\r\n\r\nQ. How often should men over the age of 70 be screened for prostate cancer?\r\n\r\nSuch testing is performed outside of guidelines, and generally following a discussion with the patient’s physician. It\'s not unusual for us to find advanced metastatic prostate cancer in older men flagged by a PSA test. The disease might spread asymptomatically, but some men get a PSA test only after they have advanced prostate cancer symptoms such as trouble urinating, fatigue, or bone pain.\r\n\r\nThe USPSTF\'s PSA screening guidelines are long overdue for an update — they were last published in 2018. And with life expectancy increasing overall for men over 70, we are all anxiously awaiting the new guidelines, which are generally updated every six years.\r\n\r\nQ. What sort of other tests follow after a positive result with PSA screening?\r\n\r\nTypically, a prostate needle biopsy. And I also recommend a digital rectal exam (DRE) to feel for any abnormalities in the prostate gland. President Biden was having urinary symptoms at the time of his PSA test, and he was reported to have had a nodule noted on his DRE. We do not know what his PSA score was.\r\nRecently, we\'ve been moving toward magnetic resonance imaging scans of the prostate that provide more diagnostic information, and can serve as a guide to more precisely identify abnormalities in the prostate gland that we can sample with a biopsy.\r\n\r\nQ. How do we know if the cancer is likely to spread aggressively?\r\n\r\nThe more aggressive tumors have cells with irregular shapes and sizes that can invade into adjoining tissues. A time-honored measure called the Gleason score grades the two most common cancer cell patterns that pathologists see on a biopsy sample.\r\n\r\nThat system has now undergone some labelling changes. To simplify matters, doctors developed a five-tier grading system that ranks tumors from Grade Group 1 — the least dangerous — to Grade Group 5, which is the most dangerous. These Grade Groups still correlate with Gleason scores. For instance, a Gleason score of 3+3=6 correlates with Grade Group 1 for low-risk prostate cancer, whereas a Gleason score of 4+5=9 for high-risk disease correlates with Grade Group 5.\r\n\r\nWe can also evaluate how fast cancer cells are dividing — this measure is called mitotic rate — or order genetic tests that provide additional information. We know that men who test positive for inherited BRCA1 and BRCA2 gene mutations are at risk for more aggressive disease, for instance. BRCA test results also have implications for family members, since the same mutations elevate risks for other inherited cancers including breast cancer and ovarian cancer.\r\nQ. How do you know if the cancer is metastasizing?\r\n\r\nTraditionally, patients would get a computed tomography scan of the abdomen and pelvis along with a bone scan. These tests look for metastases in the lymph nodes and bones, but they are increasingly outdated. These days, doctors are more likely to scan for a protein called prostate-specific membrane antigen (PSMA) that can be expressed at high levels on tumor cell surfaces.\r\n\r\nA PSMA scan is much better at detecting prostate tumors in the body that are still too small to see with other imaging tests. If the scans show evidence of metastatic spread, we classify men as having either high- or low-volume disease depending on the extent. Men with no more than three to five metastases are described as having oligometastatic prostate cancer.\r\n\r\nQ. What treatment options are available for metastatic prostate cancer?\r\n\r\nWe generally don\'t begin with a single drug. Men with low-volume metastatic prostate cancer typically get doublet therapy, which is a combination of two drugs that each starve tumors of testosterone, a hormone that prostate cancer needs to grow.\r\n\r\nOne of the drugs, called leoprolide (Lupron), blocks testosterone production. The other drugs are drawn from a class of medications that prevent testosterone from binding to its cell receptor. Those drugs are called androgen receptor pathway inhibitors (ARPIs). They include enzalutamide (Xtandi), daralutamide (Nubeqa), apaludamide (Erleada), or another drug with a slightly different mechanism called abiraterone (Zytiga).\r\n\r\nIf the cancer progresses on doublet therapy, then we can add chemotherapy to the mix. This is called triplet therapy (Lupron + ARPI + chemotherapy). We may also recommend immediate triplet therapy depending upon the extent of the cancer spread.\r\n\r\nSome men are eligible for other treatments as well. For instance, men with PSMA-positive disease (meaning their cells express the protein in high amounts) can be treated with an intravenously-delivered therapy called Lutetium-177. Known as a radioligand, this type of therapy seeks out PSMA-expressing cells and kills them with tiny radioactive particles.\r\n\r\nSome men are eligible for metastasis-directed therapy (MTD). In such cases, we treat metastatic deposits with highly focused beams of radiation delivered from outside the body. MTD is generally reserved for patients with oligometastatic prostate cancer.\r\n\r\nQ. What happens if a patient is positive on a genetic test for prostate cancer?\r\n\r\nThat opens up options for so-called targeted therapy — which is a term we use to describe treatments that target specific cell changes that cause tumors to grow. Patients with BRCA1 or BRCA2 mutations, for instance, can start on doublet therapy plus a targeted therapy called a PARP inhibitor. Two PARP inhibitors are approved for prostate cancer in BRCA-positive men: olaparib (Lynparza) and rucaparib (Rubraca). Men with a different gene mutation called microsatellite instability are eligible for a targeted drug called pembrolizumab (Keytruda).\r\n\r\nQ. How is the outlook for metastatic prostate cancer changing?\r\n\r\nIt\'s improving dramatically! Metastatic prostate cancer used to carry a very poor prognosis. Today, it\'s not unusual for men to live 10 years or longer with the disease. We\'re even starting to treat cancer in the prostate directly — something we didn\'t do in the past since the cancer had already spread beyond the prostate gland. More recent studies have shown improvements from delivering radiation to the prostate gland itself in patients with metastatic cancer. We\'re including these treatments more often now, which is something we wouldn\'t have considered before.\r\n\r\nQ. Any final notes?\r\n\r\nI would advise men to undergo a cardiac evaluation prior to starting on hormonal therapy. Hormonal therapies can exacerbate cardiovascular risk factors, so these should be addressed before and during treatment.\r\n\r\nThanks for your insights!\r\n\r\nYou\'re very welcome, glad to help.', 'admin', 1, '[\"files\\/all\\/17508498100.jpg\"]', 1, '2025-06-25 17:10:10', '2025-06-25 17:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `user_id`, `user_type`, `comment`, `blog_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(1, 26, 'doctor', 'Illo quia voluptate deserunt sit sequi harum.', 10, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(2, 31, 'doctor', 'Itaque necessitatibus reprehenderit odio.', 1, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(3, 23, 'patient', 'Et consectetur et veniam totam velit.', 1, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(4, 49, 'patient', 'Ipsa molestiae nesciunt similique delectus error vel.', 2, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(5, 10, 'doctor', 'Nisi asperiores aperiam qui voluptatibus est quas fuga.', 2, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(6, 11, 'doctor', 'Maiores laboriosam et cumque dicta recusandae.', 2, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(7, 1, 'student', 'A laudantium repudiandae incidunt nisi vel consequatur illum unde.', 2, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(8, 38, 'patient', 'Autem illo labore exercitationem eveniet sit iusto.', 3, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(9, 27, 'patient', 'Sit autem et fuga omnis.', 3, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(10, 41, 'patient', 'Sequi sunt enim vitae numquam ipsum doloremque.', 3, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(11, 20, 'doctor', 'Sint fugit voluptas facilis esse.', 3, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(12, 97, 'student', 'Aliquam possimus laboriosam qui repellat minima et.', 5, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(13, 59, 'student', 'Totam culpa et voluptatibus sed.', 5, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(14, 76, 'student', 'Ab veniam quae sint enim iusto vel soluta.', 6, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(15, 3, 'student', 'Dolore iste expedita qui eum sapiente assumenda enim consequuntur.', 6, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(16, 43, 'patient', 'Aliquam sit vel totam repellat doloribus architecto harum.', 6, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(17, 83, 'student', 'Unde et assumenda quo repellendus est.', 6, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(18, 25, 'patient', 'Et tempore assumenda voluptate animi.', 7, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(19, 46, 'student', 'Rem rem itaque temporibus quo quia enim illo velit.', 7, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(20, 37, 'doctor', 'Error accusantium non eius molestias nihil.', 7, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(21, 44, 'student', 'Asperiores eum similique iure laudantium necessitatibus in quia.', 7, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(22, 14, 'student', 'Impedit autem et molestiae voluptate.', 7, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(23, 10, 'patient', 'Itaque rerum amet id non dolore.', 12, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(24, 15, 'doctor', 'Quia voluptatem necessitatibus fuga sunt.', 14, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(25, 74, 'student', 'Numquam voluptas tenetur eaque aliquid voluptatem repellendus voluptatem.', 14, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(26, 32, 'patient', 'Nobis rerum voluptatem et.', 14, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(27, 40, 'patient', 'Dolore voluptatibus et nulla sed.', 15, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(28, 51, 'doctor', 'Aliquid voluptas fugit hic sit magni et impedit.', 15, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(29, 45, 'doctor', 'Voluptas sunt tempore voluptates dolores.', 15, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(30, 30, 'doctor', 'Excepturi quia sit quasi eos reiciendis optio.', 15, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(31, 3, 'patient', 'Odio inventore inventore ipsa quos.', 15, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(32, 48, 'patient', 'Facere reiciendis eum laborum qui dolorem culpa suscipit.', 16, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(33, 35, 'doctor', 'Earum rerum cum ut est.', 16, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(34, 2, 'student', 'Dolorem optio omnis et velit iusto.', 17, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(35, 35, 'patient', 'Ad magnam non quo impedit debitis.', 18, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(36, 45, 'student', 'Ut quas saepe cumque illo.', 18, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(37, 26, 'student', 'Aut reprehenderit quas corporis recusandae.', 20, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(38, 7, 'patient', 'Omnis nulla delectus ut molestias.', 20, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(39, 39, 'student', 'Magni blanditiis perspiciatis qui quia qui.', 20, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(40, 46, 'patient', 'Ea culpa facere excepturi unde sit sequi.', 20, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(41, 80, 'student', 'Facilis quia est fuga quia et consectetur consequuntur asperiores.', 20, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(42, 47, 'student', 'Et eius aut facere reiciendis.', 21, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(43, 39, 'student', 'Est dolorem et placeat fugiat aliquid.', 21, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(44, 29, 'patient', 'Qui rerum dolorum dolore omnis.', 21, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(45, 59, 'student', 'Iste quo voluptatum dolores voluptas quidem.', 21, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(46, 61, 'student', 'Iste perferendis veniam qui dolore possimus.', 22, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(47, 9, 'doctor', 'Debitis repellat aut sed sit.', 23, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(48, 12, 'doctor', 'Aut quo temporibus quaerat neque nobis aliquid ducimus quia.', 23, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(49, 20, 'patient', 'Alias nihil illum ipsa aut.', 24, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(50, 27, 'student', 'Qui qui dolorum neque.', 24, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(51, 33, 'student', 'Aliquid porro nobis quisquam totam non nam.', 24, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(52, 37, 'patient', 'Laborum voluptas dolore dicta quam maiores.', 25, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(53, 60, 'student', 'Aspernatur et id eligendi non eligendi.', 26, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(54, 45, 'patient', 'Et et et et rerum.', 26, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(55, 19, 'patient', 'Repellat consectetur sunt sed aperiam eius aut molestias.', 26, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(56, 73, 'student', 'Sint est quia delectus nulla accusantium sequi cum.', 26, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(57, 5, 'doctor', 'Consequuntur quod et nihil tenetur eligendi qui.', 27, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(58, 84, 'student', 'Minus velit explicabo sint laborum ea dicta sed.', 28, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(59, 22, 'doctor', 'Amet eveniet maiores deleniti debitis quis temporibus.', 29, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(60, 1, 'doctor', 'Soluta explicabo qui voluptate.', 29, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(61, 13, 'student', 'Nam velit nihil placeat deleniti.', 29, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(62, 58, 'student', 'Voluptatum quia aut est ipsam tenetur nisi.', 29, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(63, 9, 'patient', 'Commodi aut expedita eos aut ipsam aliquid quisquam.', 29, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(64, 20, 'doctor', 'Maxime non esse voluptas est sint quo.', 30, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(65, 46, 'patient', 'Eveniet sit sed laboriosam nisi.', 30, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(66, 43, 'patient', 'Impedit qui rerum dolorem quia quisquam id atque.', 30, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(67, 49, 'doctor', 'Est enim aut voluptates possimus.', 30, NULL, '2024-12-18 01:37:35', '2024-12-18 01:37:35'),
(68, 67, 'student', 'Porro maiores quae ut dignissimos quod corrupti omnis.', 30, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(69, 27, 'student', 'Reiciendis molestiae harum et delectus ad voluptatem non.', 31, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(70, 22, 'doctor', 'Saepe molestiae quos qui.', 31, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(71, 42, 'doctor', 'Sed ipsam minus optio maxime modi.', 31, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(72, 29, 'patient', 'Adipisci explicabo qui numquam consectetur et veniam inventore possimus.', 31, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(73, 56, 'student', 'Nihil ut maiores tempora quas.', 31, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(74, 28, 'doctor', 'Rem quo consequuntur iure est.', 32, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(75, 62, 'student', 'Ipsum odio repellat error quos ipsa.', 32, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(76, 76, 'student', 'Sed asperiores quas ea enim aut enim.', 32, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(77, 38, 'patient', 'Et asperiores placeat itaque ea omnis nobis.', 32, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(78, 13, 'student', 'Voluptates eum architecto et et temporibus atque.', 32, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(79, 3, 'student', 'Nisi sit repellat non dolorem accusamus adipisci distinctio.', 33, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(80, 41, 'student', 'Quasi est quo voluptates quam occaecati a accusantium necessitatibus.', 33, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(81, 7, 'patient', 'Quasi eaque culpa et saepe corporis.', 33, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(82, 84, 'student', 'Animi ratione recusandae impedit illo.', 33, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(83, 8, 'patient', 'Provident dolor non recusandae nihil earum ratione sunt in.', 33, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(84, 21, 'doctor', 'Occaecati quo odio nisi autem aut earum nobis.', 34, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(85, 43, 'patient', 'Dicta odio officia tenetur suscipit et soluta omnis.', 34, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(86, 7, 'doctor', 'Odit voluptates qui quia omnis.', 34, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(87, 8, 'patient', 'Aut sed ut aut sed vel quasi laboriosam.', 35, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(88, 4, 'patient', 'Rerum impedit ipsum at qui.', 35, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(89, 65, 'student', 'Aut magni et aut consequuntur quod aperiam omnis.', 35, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(90, 34, 'patient', 'Facere pariatur voluptas enim voluptas.', 35, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(91, 16, 'doctor', 'Eius qui molestiae quia aliquam porro.', 36, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(92, 38, 'doctor', 'Aliquid tenetur quaerat eius praesentium porro commodi.', 36, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(93, 19, 'patient', 'Hic ut dolorem fugit rem et.', 37, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(94, 12, 'patient', 'Vel porro voluptatem sit atque.', 37, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(95, 39, 'patient', 'Sit quibusdam nihil rerum non architecto.', 37, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(96, 33, 'student', 'Quod et amet voluptatem voluptates ipsum velit.', 37, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(97, 37, 'doctor', 'Blanditiis eligendi esse corporis enim quidem corrupti sed.', 40, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(98, 43, 'patient', 'Aspernatur ea odio aut.', 40, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(99, 59, 'student', 'Quam culpa laborum architecto aliquam nobis quasi vero vero.', 41, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(100, 40, 'patient', 'Nihil rerum consequatur repellat reiciendis vel aut nulla.', 41, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(101, 47, 'doctor', 'Ipsam odit corporis hic et sint aliquam.', 41, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(102, 35, 'student', 'In ut doloremque ea harum et.', 41, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(103, 16, 'patient', 'Eveniet quisquam iste recusandae magnam minus.', 41, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(104, 39, 'doctor', 'Rerum ut velit dolores tenetur distinctio totam placeat non.', 42, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(105, 61, 'student', 'Aut minus quis voluptatem corrupti.', 42, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(106, 20, 'patient', 'Doloremque qui magnam sit unde.', 42, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(107, 41, 'doctor', 'Quod voluptatibus tenetur dolor et placeat officiis odit id.', 43, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(108, 39, 'patient', 'Rerum enim sit impedit occaecati voluptas illum.', 43, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(109, 49, 'doctor', 'Est est temporibus voluptate quos repellat incidunt.', 43, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(110, 38, 'doctor', 'Enim fugit fugit et pariatur atque.', 43, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(111, 45, 'student', 'Est quis aut accusamus sit optio iure itaque quis.', 45, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(112, 41, 'doctor', 'Et dolorum consequuntur aut eligendi repudiandae excepturi.', 45, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(113, 3, 'doctor', 'Libero autem ullam atque explicabo perferendis.', 45, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(114, 47, 'patient', 'Quidem alias laborum quaerat quod placeat vitae ipsam.', 45, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(115, 84, 'student', 'Voluptatem enim aliquam mollitia non totam aperiam.', 45, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(116, 35, 'doctor', 'Odit nam non voluptas autem veritatis.', 46, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(117, 46, 'doctor', 'Fugiat illo qui rerum quidem doloremque est dolore.', 46, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(118, 92, 'student', 'Accusantium mollitia earum itaque eaque nemo aut.', 46, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(119, 25, 'doctor', 'Reprehenderit odit quas iure aliquid tempore aut.', 46, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(120, 50, 'student', 'Fugiat facilis qui quos incidunt.', 47, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(121, 41, 'patient', 'Minus natus aut qui natus dolorem.', 47, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(122, 22, 'doctor', 'Qui expedita qui molestiae.', 48, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(123, 37, 'patient', 'Alias expedita fugiat quaerat sed.', 48, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(124, 9, 'patient', 'Molestiae quam voluptatem aut quos reiciendis in.', 49, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(125, 7, 'student', 'Similique voluptatum voluptatibus animi aut rerum tenetur sit.', 49, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(126, 6, 'doctor', 'Error hic assumenda et eum.', 50, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(127, 21, 'patient', 'Nemo delectus velit nostrum sunt facere nobis numquam.', 50, NULL, '2024-12-18 01:37:36', '2024-12-18 01:37:36'),
(129, 51, 'doctor', 'good comment', 2, NULL, '2024-12-22 11:31:57', '2024-12-22 11:33:15'),
(130, 51, 'doctor', 'v good', 10, 1, '2024-12-22 11:38:20', '2024-12-22 11:38:20'),
(131, 51, 'doctor', 'hi', 30, NULL, '2024-12-23 10:45:25', '2024-12-23 10:45:25'),
(132, 51, 'doctor', 'gg', 30, NULL, '2024-12-23 10:53:53', '2024-12-23 10:53:53'),
(133, 61, 'doctor', 'dfdsfs', 57, NULL, '2025-03-20 09:26:48', '2025-03-20 09:26:48'),
(134, 61, 'doctor', 'asd', 57, NULL, '2025-03-20 10:03:26', '2025-03-20 10:03:26'),
(135, 61, 'doctor', 'asd', 57, NULL, '2025-03-20 10:03:27', '2025-03-20 10:03:27'),
(136, 61, 'doctor', 'right', 58, NULL, '2025-03-20 10:07:04', '2025-03-20 10:07:04'),
(137, 61, 'doctor', 'right', 58, NULL, '2025-03-20 10:07:05', '2025-03-20 10:07:05'),
(138, 61, 'doctor', 'yes', 58, NULL, '2025-03-20 10:07:18', '2025-03-20 10:07:18'),
(139, 61, 'doctor', 'sjddbdjkffbjfkfbfbfbkfnfnflfnfbf kdldkdbfbfhdjjfkf. dodbb', 58, NULL, '2025-03-20 10:08:37', '2025-03-20 10:08:37'),
(140, 71, 'doctor', 'good', 63, NULL, '2025-04-29 03:32:01', '2025-04-29 03:32:01'),
(141, 71, 'doctor', 'good', 63, NULL, '2025-04-29 03:32:02', '2025-04-29 03:32:02'),
(142, 71, 'doctor', 'hi', 63, NULL, '2025-04-29 03:32:08', '2025-04-29 03:32:08'),
(143, 84, 'doctor', 'How long day কিভাবে খাবে', 63, NULL, '2025-06-08 12:01:03', '2025-06-08 12:01:03'),
(144, 81, 'doctor', 'zd', 57, NULL, '2025-06-17 15:28:15', '2025-06-17 15:28:15'),
(145, 81, 'doctor', 'sadf', 58, NULL, '2025-06-17 15:28:29', '2025-06-17 15:28:29'),
(146, 81, 'doctor', 'asdfasdf', 58, NULL, '2025-06-17 15:28:44', '2025-06-17 15:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `book_type` enum('pdf','book') NOT NULL DEFAULT 'book',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `image`, `pdf`, `status`, `book_type`, `created_at`, `updated_at`) VALUES
(23, 'Medical Health Care Book', 'Medical Health Care Book', 'images/books/1750849331.png', 'pdfs/1750849331.pdf', 'active', 'book', '2025-06-25 17:02:11', '2025-06-25 17:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `chronic_cares`
--

CREATE TABLE `chronic_cares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chronic_cares`
--

INSERT INTO `chronic_cares` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Program-Guidelines-Chronic-Disease-Management-Services-2025-2026', 'Program-Guidelines-Chronic-Disease-Management-Services-2025-2026.', 'guide/chronic_care/1750845919.pdf', 1, '2025-06-25 16:05:19', '2025-06-25 16:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_info` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `user_info`, `message`, `status`, `user_id`, `user_type`, `created_at`, `updated_at`) VALUES
(16, 'Moin', 'moyouuddin@gmail.com', 'varry good apps', 1, 70, 'doctor', '2025-05-06 04:42:29', '2025-05-06 04:43:06'),
(21, 'Syed Sazib', 'syedsajib1010@gmail.com', 'Hello Denter', 1, 78, 'patient', '2025-06-03 10:00:46', '2025-06-25 15:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `custome_notifications`
--

CREATE TABLE `custome_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custome_notifications`
--

INSERT INTO `custome_notifications` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(77, 'Hi', 'Hello', '2025-07-02 12:46:23', '2025-07-02 12:46:23'),
(78, 'aa', 'bbb', '2025-07-02 17:56:35', '2025-07-02 17:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `diabetic_guides`
--

CREATE TABLE `diabetic_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diabetic_guides`
--

INSERT INTO `diabetic_guides` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(23, 'Diabetes guideline 2025', '2025_ADA_Updates_All_Sections_95.', 'guide/diabetic_guides/1750846303.pdf', 1, '2025-06-25 16:11:43', '2025-06-25 16:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `diognostics`
--

CREATE TABLE `diognostics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(11) NOT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`file`)),
  `problem_title` text DEFAULT NULL,
  `problem` text NOT NULL,
  `patient_type` varchar(255) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diognostics`
--

INSERT INTO `diognostics` (`id`, `name`, `age`, `weight`, `gender`, `number`, `file`, `problem_title`, `problem`, `patient_type`, `patient_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(589, 'মইন', '22', '555555', 'Male', '222222', '[\"null\",\"files\\/all\\/17516112440.jpg\",\"null\"]', 'জ্বর', 'তিনদিন থেকে জ্বর এবং মাথা ব্যথা', 'patient', 92, 70, '2025-07-04 12:40:50', '2025-07-04 12:42:21'),
(590, 'as', '5', '54', 'Female', '534', '[\"null\",\"null\",\"null\"]', 't', 'sda', 'patient', 79, 70, '2025-07-07 16:26:42', '2025-07-13 15:09:36'),
(591, 'azam', '50', '66', 'Male', '44', '[\"null\",\"null\",\"null\"]', 'fever', '3 day fever', 'patient', 102, 70, '2025-07-07 20:00:27', '2025-07-07 20:04:11'),
(592, 'lokman', '30', '29', 'Male', '55', '[\"null\",\"files\\/all\\/17523894280.jpg\",\"null\"]', 'জ্বর', 'তিন দিন থেকে চুলকাচ্ছে', 'patient', 103, 70, '2025-07-13 12:50:36', '2025-07-13 12:51:08'),
(593, 'moin', '35', '56', 'Male', '33', '[\"null\",\"null\",\"null\"]', 'বমি', 'since 3D vomiting', 'patient', 92, 70, '2025-07-13 18:20:35', '2025-07-13 18:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_bn` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `name_bn`, `created_at`, `updated_at`) VALUES
(1, 'Bagerhat', 'বাগেরহাট', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(2, 'Bandarban', 'বান্দরবান', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(3, 'Barguna', 'বরগুনা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(4, 'Barisal', 'বরিশাল', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(5, 'Bhola', 'ভোলা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(6, 'Bogura', 'বগুড়া', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(7, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(8, 'Chandpur', 'চাঁদপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(9, 'Chapai Nawabganj', 'চাঁপাইনবাবগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(10, 'Chattogram', 'চট্টগ্রাম', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(11, 'Chuadanga', 'চুয়াডাঙ্গা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(12, 'Comilla', 'কুমিল্লা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(13, 'Cox\'s Bazar', 'কক্সবাজার', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(14, 'Dhaka', 'ঢাকা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(15, 'Dinajpur', 'দিনাজপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(16, 'Faridpur', 'ফরিদপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(17, 'Feni', 'ফেনী', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(18, 'Gaibandha', 'গাইবান্ধা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(19, 'Gazipur', 'গাজীপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(20, 'Gopalganj', 'গোপালগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(21, 'Habiganj', 'হবিগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(22, 'Jamalpur', 'জামালপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(23, 'Jashore', 'যশোর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(24, 'Jhalokati', 'ঝালকাঠি', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(25, 'Jhenaidah', 'ঝিনাইদহ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(26, 'Joypurhat', 'জয়পুরহাট', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(27, 'Khagrachari', 'খাগড়াছড়ি', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(28, 'Khulna', 'খুলনা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(29, 'Kishoreganj', 'কিশোরগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(30, 'Kurigram', 'কুড়িগ্রাম', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(31, 'Kushtia', 'কুষ্টিয়া', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(32, 'Lakshmipur', 'লক্ষ্মীপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(33, 'Lalmonirhat', 'লালমনিরহাট', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(34, 'Madaripur', 'মাদারীপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(35, 'Magura', 'মাগুরা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(36, 'Manikganj', 'মানিকগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(37, 'Meherpur', 'মেহেরপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(38, 'Moulvibazar', 'মৌলভীবাজার', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(39, 'Munshiganj', 'মুন্সীগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(40, 'Mymensingh', 'ময়মনসিংহ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(41, 'Naogaon', 'নওগাঁ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(42, 'Narail', 'নড়াইল', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(43, 'Narayanganj', 'নারায়ণগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(44, 'Narsingdi', 'নরসিংদী', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(45, 'Natore', 'নাটোর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(46, 'Netrokona', 'নেত্রকোনা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(47, 'Nilphamari', 'নীলফামারী', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(48, 'Noakhali', 'নোয়াখালী', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(49, 'Pabna', 'পাবনা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(50, 'Panchagarh', 'পঞ্চগড়', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(51, 'Patuakhali', 'পটুয়াখালী', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(52, 'Pirojpur', 'পিরোজপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(53, 'Rajbari', 'রাজবাড়ী', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(54, 'Rajshahi', 'রাজশাহী', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(55, 'Rangamati', 'রাঙ্গামাটি', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(56, 'Rangpur', 'রংপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(57, 'Satkhira', 'সাতক্ষীরা', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(58, 'Shariatpur', 'শরীয়তপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(59, 'Sherpur', 'শেরপুর', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(60, 'Sirajganj', 'সিরাজগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(61, 'Sunamganj', 'সুনামগঞ্জ', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(62, 'Sylhet', 'সিলেট', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(63, 'Tangail', 'টাঙ্গাইল', '2025-06-22 09:29:05', '2025-06-22 09:29:05'),
(64, 'Thakurgaon', 'ঠাকুরগাঁও', '2025-06-22 09:29:05', '2025-06-22 09:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `userType` varchar(255) NOT NULL DEFAULT 'doctor',
  `specialization` varchar(255) NOT NULL,
  `hospital` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `role` enum('normal','admin') NOT NULL DEFAULT 'normal',
  `address` text DEFAULT NULL,
  `bmdc_number` varchar(255) DEFAULT NULL,
  `bmdc_type` varchar(255) DEFAULT NULL,
  `nextPatient` tinyint(1) NOT NULL DEFAULT 0,
  `organization` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `notification_play` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `total_points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `phone`, `password`, `token`, `userType`, `specialization`, `hospital`, `gender`, `biography`, `dob`, `degree`, `image`, `signature`, `role`, `address`, `bmdc_number`, `bmdc_type`, `nextPatient`, `organization`, `occupation`, `status`, `notification_play`, `created_at`, `updated_at`, `deleted_at`, `total_points`) VALUES
(70, 'Moinuddin', 'moyouuddin@gmail.com', '01912741643', '$2y$10$yiXJJUUOFDPKjDm5QWU/genePsS6TgFbKLksueMYwMqtS1Qvm/kdm', 'dSlPam47TkKxrtMF75-61Z:APA91bHOMBfvTAHuOtBBEr6OlqfLspdo-OVoXbwWj3DvUJVklAWTAHZtummNjVhR1r8qkqHleE7XRbcFZMqdVasHyHP8-at9oG1UZaUu--TRZMy8oJ7bYMo', 'doctor', '8', '2', 'male', 'Doctor', NULL, 'PHD', 'images/doctors/1750871583_image.gif', NULL, 'admin', '14', '546789', 'Medical', 0, 'Diagnostic', 'doctor', 1, 1, '2025-04-10 06:32:21', '2025-07-18 22:45:36', NULL, 282),
(77, 'hadi 1', 'h1@g.c', '01756432678', '$2y$10$foO/7v.WI1wpIkuhrx6t6u7CrjveiaDHzzNJSZap5rzKnlBL95QSS', 'eAOwTAaMSziuNZsQEV8H2c:APA91bHXZ3XR0N3PGo5cieYHGZDAoh1eECRxttrlrpei1twBNvZ65vFN-fayc7Gpmjt_NznYOB4_tqz8S409m3cX1W1XUTOJKKNUkGDjvJaG_x0vmd7l8X8', 'doctor', '1', '12', 'male', NULL, NULL, 'PHD', NULL, NULL, 'admin', '19', '5466455', 'Medical', 0, 'Clinic Center', 'Clinic Center', 1, 1, '2025-05-06 04:20:36', '2025-07-22 17:28:35', NULL, 0),
(81, 'Mr Doctor', 'd1@g.c', '01843678953', '$2y$10$23UrItNvlDuXz1DLS9c7oeZICDmZgHMR8v6MFn.7qJEcQCmJ9rZ6y', 'eAOwTAaMSziuNZsQEV8H2c:APA91bHXZ3XR0N3PGo5cieYHGZDAoh1eECRxttrlrpei1twBNvZ65vFN-fayc7Gpmjt_NznYOB4_tqz8S409m3cX1W1XUTOJKKNUkGDjvJaG_x0vmd7l8X8', 'doctor', 'Dentists', 'National Institute of Cardiovascular Diseases', 'male', NULL, NULL, NULL, 'images/doctors/1750222369.png', NULL, 'admin', 'Dinajpur', NULL, 'Medical', 0, 'Clinic Center', 'doctor', 1, 1, '2025-05-07 16:38:57', '2025-07-22 17:15:11', NULL, 1340),
(82, 'Fahim', 'tjfahim1997@gmail.com', '01798651200', '$2y$10$nzWay/xGuaIAmBYdpXoszOelM5Q.w5Bn1Pk2KvLX9AuK/VGzfNEve', 'fvKleAKjT7SZv35NSi6J1b:APA91bGts0wDLTOBBRUFmmrGpPBpAtmad8LE6u4a43MLGC38rsoPGP8FAQ-ozAg6urA9BJV5z1J6AZAumb9eLSWfARvBSrULpFdwoom4naS7GjMAxqtld1w', 'doctor', 'Cancer Surgeons', 'Dhaka Dental', 'male', NULL, NULL, 'PHD', NULL, NULL, 'admin', 'shyamoli', '84251689', 'Medical', 0, 'HealthCare Center', 'HealthCare Center', 1, 1, '2025-06-02 10:38:43', '2025-07-07 11:41:02', NULL, 0),
(84, 'Abdul kader', 'denter643@gmail.com', '0718865659', '$2y$10$YSswo/iZf3XaPhl4e4ca4Om.JP/WJ5QdUUOSxkotclbwIrgSJXtBK', 'eIxnX_lfR1Cf16XZRm5bqj:APA91bHj8l38lgo32n1upK2uuDTUadi5QcfETcO4HPc35e2kfCE8LOzMSX1AXXhRnAuwJ8gm4ihPbDkTaGcxK0m3BxvW8N6Zy-mgAQQ5-tNWUOzz_SjXY50', 'doctor', 'Dentists', 'NITOR', 'male', NULL, NULL, NULL, NULL, NULL, 'normal', 'khulna', '2993', 'Dental', 0, 'HealthCare Center', 'HealthCare Center', 1, 1, '2025-06-05 21:19:16', '2025-06-25 23:42:40', NULL, 2),
(85, 'Dr Asif Mehedi', 'mehedi244818@gmail.com', '01687815604', '$2y$10$vzb6u4jvrKVJ3P9ZT2r2jOtnz.te4czxG.uMcGZRdd9siJDFYbrwu', 'eYvj0lbKS6WjHVmvjU2b1m:APA91bECAxDE_wEfR7KDWaABuuJ8tRbp2ikbDToWHFJvs-LN--JGy7gOQhxobv-4DXE7P3gYP3cdzAP7Tb2AyQbc2SxveG7IIz3mcZ1CmygrGHQSTbzPx64', 'doctor', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 'dhaka', '133811', 'Medical', 0, 'Diagnostic', 'Diagnostic', 1, 1, '2025-06-30 11:38:40', '2025-06-30 11:38:59', NULL, 0),
(86, 'ersin', 'ersin@gmail.com', '05325211085', '$2y$10$0MbSTioFkR8BpVH/YsEBze6swHBTFLP/pHND6MkUFx7vJgPcjLjLi', 'cZ_CCYJ_SPmrpRO0KSGvo3:APA91bF9tB7q9yhnLkISfLv0zmtIH5tgjzrhKpJkIpsGg5CaSGST9wwexnYWNcbG_zcvLHS3lEFSWWVUJ7-McH9ItAdBq2XNSFk3TUTT-A-5YI4cklSb874', 'doctor', 'Anesthesia & ICU Specialists', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 'turkey', '123123', 'Medical', 0, 'HealthCare Center', 'HealthCare Center', 1, 1, '2025-07-11 19:08:51', '2025-07-11 19:09:24', NULL, 0),
(87, 'dd1', 'a@a.ff', '222', '$2y$10$hw5vr8KA4TALiB98ozVwFuvM.NX5eNzWXlKxHiK68H6sH6BdOFoBW', 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'doctor', 'Cancer Surgeons', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 'Chattogram', NULL, 'null', 0, 'National Institute of Traumatology and Orthopaedic Rehabilitation (NITOR/Pongu Hospital)', 'National Institute of Traumatology and Orthopaedic Rehabilitation (NITOR/Pongu Hospital)', 1, 1, '2025-07-20 14:09:04', '2025-07-20 14:09:22', NULL, 0),
(88, '33', 'ee@e.e', '33', '$2y$10$PpgIi5NF52r2B81fiiGVmud7T9Y4r7X7qZFmG8T8Fs2W20Y0N2WpS', 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'doctor', 'Anesthesia & ICU Specialists', NULL, 'Male', NULL, '2025-07-15 00:00:00', 'asd', 'images/doctors/1753156128.jpg', 'images/signature/1753156145.jpg', 'normal', 'Dhaka', '333', '333', 0, 'National Institute of Kidney Diseases & Urology', 'doctor', 1, 1, '2025-07-20 17:07:07', '2025-07-22 17:12:06', NULL, 0),
(89, 'asd', 'a@aasd.v', '123', '$2y$10$SSkAeIf6cqkGbSJDvm86fu8VRLckRUNdQqbDItbV0BceOiq1vhMG.', NULL, 'doctor', 'Cancer Surgeons', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 'Bogura', NULL, 'null', 0, 'National Institute of Traumatology and Orthopaedic Rehabilitation (NITOR/Pongu Hospital)', 'National Institute of Traumatology and Orthopaedic Rehabilitation (NITOR/Pongu Hospital)', 1, 1, '2025-07-21 11:00:09', '2025-07-21 11:00:09', NULL, 0),
(90, '3333', 'e3@e.e', '3333', '$2y$10$SVsp6NlKE/A3t7SUuLxLQug05IqD.zDzkg8RYANFYf.0rPjiXRom.', 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'doctor', 'Cancer Surgeons', NULL, 'Male', NULL, '2025-07-17 00:00:00', NULL, NULL, NULL, 'normal', 'Chattogram', NULL, 'null', 0, 'National Institute of Mental Health', 'doctor', 1, 1, '2025-07-21 11:20:41', '2025-07-21 11:41:27', NULL, 0),
(91, '121', 'a1aa@a.a', '121', '$2y$10$tDvumTQUxy0PT.5RMYQw4u86RBbWOsY26kRBjSf5iDWLQX5sD6T9K', 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'doctor', 'Cardiologists', NULL, NULL, NULL, '2025-07-09 00:00:00', NULL, NULL, NULL, 'normal', 'Comilla', NULL, 'null', 0, 'Kurmitola General Hospital', 'doctor', 1, 1, '2025-07-21 12:03:08', '2025-07-21 12:03:57', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialties`
--

CREATE TABLE `doctor_specialties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_specialties`
--

INSERT INTO `doctor_specialties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Anesthesia & ICU Specialists', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(2, 'Cancer Surgeons', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(3, 'Cardio-Vascular Surgeons', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(4, 'Cardiologists', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(5, 'Colorectal Surgeons', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(6, 'Critical Care Medicine Specialists', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(7, 'Dentists', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(8, 'Dermatologists', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(9, 'Diabetologists', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(10, 'ENT Specialists', '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(11, 'Endorionlogists', '2024-12-18 01:37:33', '2024-12-18 01:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '6d0ff62e-4b68-4454-9b0c-f9bc9724e189', 'database', 'default', '{\"uuid\":\"6d0ff62e-4b68-4454-9b0c-f9bc9724e189\",\"displayName\":\"App\\\\Jobs\\\\SendNotificationQueue\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNotificationQueue\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendNotificationQueue\\\":3:{s:5:\\\"title\\\";s:6:\\\"Report\\\";s:4:\\\"body\\\";s:7:\\\"aaaaaaa\\\";s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 'ErrorException: Attempt to read property \"id\" on null in /home/denterpro/public_html/main.denterpro.com/app/Jobs/SendNotificationQueue.php:40\nStack trace:\n#0 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php(270): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Attempt to read...\', \'/home/denterpro...\', 40)\n#1 /home/denterpro/public_html/main.denterpro.com/app/Jobs/SendNotificationQueue.php(40): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Attempt to read...\', \'/home/denterpro...\', 40)\n#2 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendNotificationQueue->handle()\n#3 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Container.php(661): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#9 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#10 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendNotificationQueue), false)\n#12 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#13 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#14 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendNotificationQueue))\n#16 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(147): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(130): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Container.php(661): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#28 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Command.php(152): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(1078): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(155): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /home/denterpro/public_html/main.denterpro.com/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 {main}', '2025-03-11 09:22:25'),
(2, '26a20fc1-e03b-4cc1-8e26-efb23e00b698', 'database', 'default', '{\"uuid\":\"26a20fc1-e03b-4cc1-8e26-efb23e00b698\",\"displayName\":\"App\\\\Jobs\\\\SendNotificationQueue\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNotificationQueue\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendNotificationQueue\\\":3:{s:5:\\\"title\\\";s:6:\\\"Report\\\";s:4:\\\"body\\\";s:17:\\\"Id alias aut non.\\\";s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 'ErrorException: Attempt to read property \"id\" on null in /home/denterpro/public_html/main.denterpro.com/app/Jobs/SendNotificationQueue.php:40\nStack trace:\n#0 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php(270): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Attempt to read...\', \'/home/denterpro...\', 40)\n#1 /home/denterpro/public_html/main.denterpro.com/app/Jobs/SendNotificationQueue.php(40): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Attempt to read...\', \'/home/denterpro...\', 40)\n#2 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendNotificationQueue->handle()\n#3 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Container.php(661): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#9 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#10 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendNotificationQueue), false)\n#12 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#13 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#14 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendNotificationQueue))\n#16 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(147): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(130): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Container.php(661): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#28 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Command.php(152): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(1078): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(155): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /home/denterpro/public_html/main.denterpro.com/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 {main}', '2025-03-24 04:55:20'),
(3, 'd6dbec06-a4bf-492c-862e-46a8cf791961', 'database', 'default', '{\"uuid\":\"d6dbec06-a4bf-492c-862e-46a8cf791961\",\"displayName\":\"App\\\\Jobs\\\\SendNotificationQueue\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNotificationQueue\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendNotificationQueue\\\":3:{s:5:\\\"title\\\";s:6:\\\"Report\\\";s:4:\\\"body\\\";s:3:\\\"Abc\\\";s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 'ErrorException: Attempt to read property \"id\" on null in /home/denterpro/public_html/main.denterpro.com/app/Jobs/SendNotificationQueue.php:40\nStack trace:\n#0 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php(270): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Attempt to read...\', \'/home/denterpro...\', 40)\n#1 /home/denterpro/public_html/main.denterpro.com/app/Jobs/SendNotificationQueue.php(40): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Attempt to read...\', \'/home/denterpro...\', 40)\n#2 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\SendNotificationQueue->handle()\n#3 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Container.php(661): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#9 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#10 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendNotificationQueue), false)\n#12 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#13 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationQueue))\n#14 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendNotificationQueue))\n#16 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(147): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(130): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Container/Container.php(661): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#28 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Command.php(152): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(1078): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 /home/denterpro/public_html/main.denterpro.com/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Console/Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /home/denterpro/public_html/main.denterpro.com/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(155): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /home/denterpro/public_html/main.denterpro.com/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 {main}', '2025-03-24 04:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `rating` tinyint(4) NOT NULL DEFAULT 5,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `description`, `status`, `rating`, `user_id`, `user_type`, `created_at`, `updated_at`) VALUES
(15, 'Moin', 'moyouuddin@gmail.com', 'your apps is very essantial', 1, 5, 70, 'doctor', '2025-04-25 11:54:37', '2025-04-25 11:56:22'),
(16, 'rema', 'fusionyouth643@gmail.com', 'vary good', 1, 5, 82, 'patient', '2025-05-04 10:40:39', '2025-05-09 11:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `female_health_guides`
--

CREATE TABLE `female_health_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `female_health_guides`
--

INSERT INTO `female_health_guides` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(18, 'Female health guideline', 'Female health guideline 2025', 'guide/female_health_guides/1750846822.pdf', 1, '2025-06-25 16:20:22', '2025-06-25 16:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `heart_guides`
--

CREATE TABLE `heart_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heart_guides`
--

INSERT INTO `heart_guides` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Heart Guideline', 'Heart Guideline Report', 'guide/heart_guides/1750847106.pdf', 1, '2025-06-25 16:25:06', '2025-06-25 16:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `hepatic_guides`
--

CREATE TABLE `hepatic_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hepatic_guides`
--

INSERT INTO `hepatic_guides` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(21, 'Hepatic Guideline', 'Hepatic Guideline', 'guide/hepatic_guides/1750848126.pdf', 1, '2025-06-25 16:42:06', '2025-06-25 16:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Bangabandhu Sheikh Mujib Medical University (BSMMU)', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(2, 'Dhaka Medical College & Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(3, 'Shaheed Suhrawardy Medical College & Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(4, 'National Institute of Neurosciences & Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(5, 'National Institute of Cardiovascular Diseases', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(6, 'National Institute of Cancer Research & Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(7, 'National Institute of Kidney Diseases & Urology', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(8, 'National Institute of Mental Health', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(9, 'National Institute of Traumatology and Orthopaedic Rehabilitation (NITOR/Pongu Hospital)', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(10, 'Mugda Medical College & Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(11, 'Kurmitola General Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(12, 'Dhaka Shishu (Children) Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(13, 'Sir Salimullah Medical College & Mitford Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(14, 'United Hospital Limited', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(15, 'Evercare Hospital Dhaka', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(16, 'Labaid Specialized Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(17, 'Square Hospitals Ltd.', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(18, 'Ibn Sina Hospital Dhanmondi', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(19, 'Popular Diagnostic Center & Hospital (Dhanmondi)', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(20, 'Bangladesh Specialized Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(21, 'BIRDEM General Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(22, 'Anwer Khan Modern Medical College Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(23, 'Holy Family Red Crescent Medical College Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(24, 'Asgar Ali Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(25, 'Central Hospital Ltd.', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(26, 'Green Life Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(27, 'BRB Hospital Ltd.', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(28, 'Delta Hospital Ltd.', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(29, 'Islami Bank Central Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(30, 'Japan Bangladesh Friendship Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(31, 'Medinova Medical Services Ltd.', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(32, 'City Hospital Ltd.', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(33, 'Mirpur Adhunik Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(34, 'Tairunnessa Memorial Medical Center (Uttara)', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(35, 'Meril Hospital (Uttara)', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(36, 'Aichi Hospital', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18'),
(37, 'Ibrahim Cardiac Hospital & Research Institute', NULL, '2025-06-22 11:04:18', '2025-06-22 11:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kidney_guides`
--

CREATE TABLE `kidney_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kidney_guides`
--

INSERT INTO `kidney_guides` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Kidney Guideline', 'KDIGO-2025-ADPKD-Guideline', 'guide/kidney_guides/1750847597.pdf', 1, '2025-06-25 16:33:17', '2025-06-25 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `live_news`
--

CREATE TABLE `live_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_news`
--

INSERT INTO `live_news` (`id`, `news`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Denter is an app dedicated to providing free treatment to those in need. If you require help, we are always ready to support you. Thanks', 'active', '2025-05-05 03:58:10', '2025-06-25 15:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prescription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `dose` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`dose`)),
  `meal` enum('before','after') NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `prescription_id`, `name`, `dose`, `meal`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'ut', '[1,0,1]', 'before', 21, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(2, 1, 'voluptatem', '[1,0,1]', 'before', 3, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(3, 1, 'facilis', '[1,0,1]', 'after', 20, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(4, 1, 'quod', '[1,0,1]', 'before', 7, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(5, 1, 'non', '[1,0,1]', 'before', 29, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(6, 1, 'nesciunt', '[1,0,1]', 'before', 20, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(7, 1, 'iusto', '[1,0,1]', 'before', 19, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(8, 1, 'nemo', '[1,0,1]', 'before', 4, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(9, 1, 'ut', '[1,0,1]', 'after', 5, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(10, 1, 'natus', '[1,0,1]', 'after', 7, '2024-12-18 01:37:38', '2024-12-18 01:37:38'),
(11, 1, '123', '[22]', 'before', 2, '2024-12-21 08:45:27', '2024-12-21 08:45:27'),
(12, 2, '123', '[1,0,1]', 'before', 2, '2024-12-21 08:47:53', '2024-12-21 08:47:53'),
(13, 3, '123', '[1,0,1]', 'after', 2, '2024-12-21 08:48:36', '2024-12-21 08:48:36'),
(14, 3, 'sds', '[1]', 'after', 12, '2024-12-21 08:48:36', '2024-12-21 08:48:36'),
(15, 3, 'sdsd', '[2]', 'after', 2, '2024-12-21 08:48:36', '2024-12-21 08:48:36'),
(16, 4, 'dfsd', '[1,0,1]', 'after', 2, '2024-12-21 08:55:04', '2024-12-21 08:55:04'),
(17, 5, 'medicine', '[1,0,2]', 'after', 2, '2024-12-21 09:26:09', '2024-12-21 09:26:09'),
(18, 6, 'medicaen', '[1,2,0]', 'after', 60, '2024-12-21 09:27:44', '2024-12-21 09:27:44'),
(19, 7, 'ghcuf', '[1,1,1]', 'after', 34, '2024-12-21 09:42:32', '2024-12-21 09:42:32'),
(20, 7, 'fgg', '[1]', 'before', 2, '2024-12-21 09:42:32', '2024-12-21 09:42:32'),
(21, 8, 'fsdfs', '[1,0,0]', 'after', 2, '2024-12-21 10:13:37', '2024-12-21 10:13:37'),
(22, 9, 'dfd', '[0,1,1]', 'before', 5, '2024-12-22 04:53:17', '2024-12-22 04:53:17'),
(23, 9, 'sd', '[1,0,0]', 'before', 4, '2024-12-22 04:53:17', '2024-12-22 04:53:17'),
(24, 9, 'dfd', '[1,0,0]', 'after', 4, '2024-12-22 04:53:17', '2024-12-22 04:53:17'),
(25, 9, '4', '[0,1,1]', 'before', 4, '2024-12-22 04:53:17', '2024-12-22 04:53:17'),
(26, 10, 'bdhdhdj', '[0,1,1]', 'after', 8, '2024-12-23 06:46:38', '2024-12-23 06:46:38'),
(27, 10, 'vxhxhxhx', '[0,1,1]', 'before', 8, '2024-12-23 06:46:38', '2024-12-23 06:46:38'),
(28, 10, 'hxhxhxz', '[1,1,1]', 'before', 2, '2024-12-23 06:46:38', '2024-12-23 06:46:38'),
(29, 11, 'napa 100', '[0,1,0]', 'after', 15, '2025-01-07 11:22:13', '2025-01-07 11:22:13'),
(30, 11, 'napa 600', '[0,1,0]', 'after', 15, '2025-01-07 11:22:13', '2025-01-07 11:22:13'),
(31, 12, 'napa 100', '[0,1,0]', 'after', 15, '2025-01-07 11:23:55', '2025-01-07 11:23:55'),
(32, 12, 'napa 600', '[0,1,0]', 'after', 15, '2025-01-07 11:23:55', '2025-01-07 11:23:55'),
(33, 13, 'napa 100', '[0,1,0]', 'after', 15, '2025-01-07 11:24:31', '2025-01-07 11:24:31'),
(34, 13, 'napa 600', '[0,1,0]', 'after', 15, '2025-01-07 11:24:31', '2025-01-07 11:24:31'),
(35, 14, 'napa 100', '[0,1,0]', 'after', 15, '2025-01-07 11:25:24', '2025-01-07 11:25:24'),
(36, 14, 'napa 600', '[0,1,0]', 'after', 15, '2025-01-07 11:25:24', '2025-01-07 11:25:24'),
(37, 15, 'napa 100', '[0,1,0]', 'after', 15, '2025-01-07 11:26:27', '2025-01-07 11:26:27'),
(38, 15, 'napa 600', '[0,1,0]', 'after', 15, '2025-01-07 11:26:27', '2025-01-07 11:26:27'),
(39, 16, 'napa 100', '[0,1,0]', 'after', 15, '2025-01-07 11:26:46', '2025-01-07 11:26:46'),
(40, 16, 'napa 600', '[0,1,0]', 'after', 15, '2025-01-07 11:26:46', '2025-01-07 11:26:46'),
(41, 17, 'napa 100', '[0,1,0]', 'after', 15, '2025-01-07 11:30:31', '2025-01-07 11:30:31'),
(42, 17, 'napa 600', '[0,1,0]', 'after', 15, '2025-01-07 11:30:31', '2025-01-07 11:30:31'),
(43, 18, 'fgdf', '[1,1,1]', 'before', 12, '2025-01-16 05:36:15', '2025-01-16 05:36:15'),
(44, 20, 'sdsad', '[0,1,1]', 'before', 32, '2025-01-16 05:38:29', '2025-01-16 05:38:29'),
(45, 20, 'dsfd', '[0,0,1]', 'after', 5, '2025-01-16 05:38:29', '2025-01-16 05:38:29'),
(46, 21, 'nafa', '[1,0,0]', 'before', 10, '2025-03-03 15:31:57', '2025-03-03 15:31:57'),
(47, 22, 'abc', '[1,1,1]', 'after', 15, '2025-03-23 16:04:57', '2025-03-23 16:04:57'),
(48, 23, 'Napa', '[1,1,1]', 'before', 7, '2025-03-24 03:42:06', '2025-03-24 03:42:06'),
(49, 24, 'na', '[0,1,1]', 'after', 12, '2025-03-24 04:23:16', '2025-03-24 04:23:16'),
(50, 25, 'rogi', '[0,1,1]', 'before', 12, '2025-03-24 04:27:12', '2025-03-24 04:27:12'),
(51, 26, 'hed', '[1,0,0]', 'before', 2, '2025-03-24 04:31:45', '2025-03-24 04:31:45'),
(52, 27, 'dfg', '[0,1,1]', 'before', 1, '2025-03-24 04:44:53', '2025-03-24 04:44:53'),
(53, 28, 'kd', '[0,1,1]', 'before', 12, '2025-03-24 04:48:59', '2025-03-24 04:48:59'),
(54, 29, 'Napa', '[1,1,1]', 'after', 10, '2025-04-06 09:10:45', '2025-04-06 09:10:45'),
(55, 29, 'Serjel 500mg', '[0,0,1]', 'after', 7, '2025-04-06 09:10:45', '2025-04-06 09:10:45'),
(56, 30, 'napa', '[1,1,1]', 'after', 3, '2025-04-13 04:49:39', '2025-04-13 04:49:39'),
(57, 31, 'ace', '[1,1,1]', 'before', 7, '2025-04-14 13:41:16', '2025-04-14 13:41:16'),
(58, 31, 'seclo', '[0,1,1]', 'before', 7, '2025-04-14 13:41:16', '2025-04-14 13:41:16'),
(59, 32, 'napa', '[0,0,1]', 'before', 1, '2025-04-20 04:41:43', '2025-04-20 04:41:43'),
(60, 33, 'napa 100', '[0,1,0]', 'after', 15, '2025-04-20 08:41:12', '2025-04-20 08:41:12'),
(61, 33, 'napa 600', '[0,1,0]', 'after', 15, '2025-04-20 08:41:12', '2025-04-20 08:41:12'),
(62, 34, 'napa 100', '[0,1,0]', 'after', 15, '2025-04-20 08:45:39', '2025-04-20 08:45:39'),
(63, 34, 'napa 600', '[0,1,0]', 'after', 15, '2025-04-20 08:45:39', '2025-04-20 08:45:39'),
(64, 35, 'napa 100', '[0,1,0]', 'after', 15, '2025-04-20 08:48:10', '2025-04-20 08:48:10'),
(65, 35, 'napa 600', '[0,1,0]', 'after', 15, '2025-04-20 08:48:10', '2025-04-20 08:48:10'),
(66, 36, 'napa 100', '[0,1,0]', 'after', 15, '2025-04-26 17:02:09', '2025-04-26 17:02:09'),
(67, 36, 'napa 600', '[0,1,0]', 'after', 15, '2025-04-26 17:02:09', '2025-04-26 17:02:09'),
(68, 37, 'Napa', '[1,1,1]', 'after', 3, '2025-04-26 17:11:51', '2025-04-26 17:11:51'),
(69, 37, 'sergel 20', '[1,0,1]', 'before', 3, '2025-04-26 17:11:51', '2025-04-26 17:11:51'),
(70, 38, 'aa', '[1,1,1]', 'before', 5, '2025-04-26 17:28:20', '2025-04-26 17:28:20'),
(71, 39, 'Sergel', '[1,0,1]', 'before', 7, '2025-04-27 04:05:09', '2025-04-27 04:05:09'),
(72, 39, 'Napa', '[1,1,1]', 'after', 7, '2025-04-27 04:05:09', '2025-04-27 04:05:09'),
(73, 40, 'Napa 1', '[1,1,1]', 'after', 7, '2025-04-27 04:41:46', '2025-04-27 04:41:46'),
(74, 41, 'Napa 2', '[1,1,1]', 'after', 3, '2025-04-27 04:42:17', '2025-04-27 04:42:17'),
(75, 42, 'ace', '[1,1,1]', 'after', 3, '2025-05-04 09:12:14', '2025-05-04 09:12:14'),
(76, 43, 'Torax', '[1,0,1]', 'after', 5, '2025-05-06 04:37:27', '2025-05-06 04:37:27'),
(77, 44, 'napa', '[1,1,1]', 'before', 7, '2025-05-06 05:46:53', '2025-05-06 05:46:53'),
(78, 45, 'napa 1', '[1,1,1]', 'before', 5, '2025-05-06 06:01:46', '2025-05-06 06:01:46'),
(79, 46, 'ab', '[1,1,1]', 'before', 5, '2025-05-06 06:16:41', '2025-05-06 06:16:41'),
(80, 47, 'xxx', '[1,1,1]', 'before', 50, '2025-05-06 06:18:08', '2025-05-06 06:18:08'),
(81, 48, 'xxx', '[1,1,1]', 'before', 5, '2025-05-06 06:19:51', '2025-05-06 06:19:51'),
(82, 49, 'ab', '[1,1,0]', 'before', 56, '2025-05-06 06:31:22', '2025-05-06 06:31:22'),
(83, 50, 'গগ', '[1,1,0]', 'before', 20, '2025-05-06 06:35:25', '2025-05-06 06:35:25'),
(84, 51, 'gg', '[1,1,1]', 'before', 22, '2025-05-06 06:51:39', '2025-05-06 06:51:39'),
(85, 52, 'gg', '[1,1,1]', 'before', 22, '2025-05-06 06:51:41', '2025-05-06 06:51:41'),
(86, 53, 'gg', '[1,1,1]', 'before', 22, '2025-05-06 06:51:46', '2025-05-06 06:51:46'),
(87, 54, 'gg', '[1,1,1]', 'before', 22, '2025-05-06 06:51:55', '2025-05-06 06:51:55'),
(88, 55, 'gg', '[1,1,1]', 'before', 22, '2025-05-06 06:51:58', '2025-05-06 06:51:58'),
(89, 56, 'ফফ', '[1,1,1]', 'before', 5, '2025-05-06 06:52:58', '2025-05-06 06:52:58'),
(90, 57, 'kk', '[1,1,1]', 'before', 5, '2025-05-06 06:53:16', '2025-05-06 06:53:16'),
(91, 58, 'kk', '[1,1,1]', 'before', 5, '2025-05-06 06:53:26', '2025-05-06 06:53:26'),
(92, 59, 'rr', '[0,1,1]', 'after', 22, '2025-05-06 06:54:37', '2025-05-06 06:54:37'),
(93, 60, 'hh', '[0,1,1]', 'before', 52, '2025-05-06 06:55:37', '2025-05-06 06:55:37'),
(94, 61, 'hh', '[0,1,1]', 'after', 52, '2025-05-06 06:55:58', '2025-05-06 06:55:58'),
(95, 62, 'napa 100', '[0,1,0]', 'after', 15, '2025-05-06 06:57:26', '2025-05-06 06:57:26'),
(96, 62, 'napa 600', '[0,1,0]', 'after', 15, '2025-05-06 06:57:26', '2025-05-06 06:57:26'),
(97, 63, 'napa 100', '[0,1,0]', 'after', 15, '2025-05-06 06:58:50', '2025-05-06 06:58:50'),
(98, 63, 'napa 600', '[0,1,0]', 'after', 15, '2025-05-06 06:58:50', '2025-05-06 06:58:50'),
(99, 64, 'napa 100', '[0,1,0]', 'after', 15, '2025-05-06 07:02:45', '2025-05-06 07:02:45'),
(100, 64, 'napa 600', '[0,1,0]', 'after', 15, '2025-05-06 07:02:45', '2025-05-06 07:02:45'),
(101, 65, 'Napa', '[0,0,1]', 'after', 3, '2025-05-06 17:49:35', '2025-05-06 17:49:35'),
(102, 66, 'Napa', '[1,1,1]', 'after', 30, '2025-05-06 17:57:22', '2025-05-06 17:57:22'),
(103, 67, 'app', '[0,1,1]', 'after', 15, '2025-05-07 07:04:14', '2025-05-07 07:04:14'),
(104, 68, 'gjgfh', '[1,1,0]', 'after', 7, '2025-05-07 07:14:11', '2025-05-07 07:14:11'),
(105, 69, 'dd', '[1,1,1]', 'before', 5, '2025-05-07 16:53:30', '2025-05-07 16:53:30'),
(106, 70, 'ab', '[1,1,1]', 'after', 5, '2025-05-07 23:40:23', '2025-05-07 23:40:23'),
(107, 71, 'neuro -B', '[1,1,1]', 'after', 5, '2025-05-11 06:24:45', '2025-05-11 06:24:45'),
(108, 73, 'neuro -B', '[1,1,1]', 'after', 5, '2025-05-11 06:24:45', '2025-05-11 06:24:45'),
(109, 72, 'neuro -B', '[1,1,1]', 'after', 5, '2025-05-11 06:24:45', '2025-05-11 06:24:45'),
(110, 74, 'neuro -B', '[1,1,1]', 'after', 5, '2025-05-11 06:24:46', '2025-05-11 06:24:46'),
(111, 75, 'ace', '[1,1,1]', 'after', 7, '2025-05-12 10:11:06', '2025-05-12 10:11:06'),
(112, 76, 'hjhj', '[1,1,0]', 'before', 25, '2025-05-12 14:49:36', '2025-05-12 14:49:36'),
(113, 78, 'ffds', '[1,1,0]', 'before', 2, '2025-05-12 15:33:22', '2025-05-12 15:33:22'),
(114, 79, 'dd', '[0,1,1]', 'after', 2, '2025-05-12 15:37:55', '2025-05-12 15:37:55'),
(115, 80, 'dd', '[1,1,1]', 'before', 12, '2025-05-12 15:40:38', '2025-05-12 15:40:38'),
(116, 81, 'napa', '[1,1,1]', 'before', 2, '2025-05-13 07:47:37', '2025-05-13 07:47:37'),
(117, 82, 'Zimax', '[0,1,0]', 'after', 3, '2025-05-13 07:52:05', '2025-05-13 07:52:05'),
(118, 83, 'bicogin', '[0,1,1]', 'after', 5, '2025-05-14 16:44:53', '2025-05-14 16:44:53'),
(119, 84, 'specbac', '[1,1,1]', 'after', 5, '2025-05-14 16:46:43', '2025-05-14 16:46:43'),
(120, 89, 'Tab lysivin', '[1,1,1]', 'after', 3, '2025-05-27 12:41:34', '2025-05-27 12:41:34'),
(121, 90, 'fggg', '[0,1,1]', 'before', 5, '2025-05-27 12:49:08', '2025-05-27 12:49:08'),
(122, 91, 'ফহজ্জ', '[0,1,1]', 'before', 6, '2025-05-27 12:50:29', '2025-05-27 12:50:29'),
(123, 92, 'napa', '[1,1,1]', 'after', 3, '2025-05-27 12:57:53', '2025-05-27 12:57:53'),
(124, 93, 'নাপা', '[1,1,1]', 'after', 8, '2025-06-02 23:28:00', '2025-06-02 23:28:00'),
(125, 96, 'Ace', '[1,1,1]', 'after', 7, '2025-06-19 22:10:05', '2025-06-19 22:10:05'),
(126, 97, 'Ace', '[1,1,1]', 'after', 7, '2025-06-19 22:10:06', '2025-06-19 22:10:06'),
(127, 101, 'qq', '[0,1,1]', 'after', 7, '2025-06-23 10:26:35', '2025-06-23 10:26:35'),
(128, 102, 'aa', '[1,1,0]', 'after', 5, '2025-06-23 10:29:44', '2025-06-23 10:29:44'),
(129, 104, 'ace', '[1,1,1]', 'after', 7, '2025-06-24 11:30:59', '2025-06-24 11:30:59'),
(130, 105, 'itra 200', '[1,1,1]', 'after', 3, '2025-07-04 12:44:21', '2025-07-04 12:44:21'),
(131, 106, 'নাপা', '[1,1,1]', 'after', 5, '2025-07-07 20:05:40', '2025-07-07 20:05:40'),
(132, 109, 'alatrol', '[1,1,1]', 'before', 3, '2025-07-13 12:57:01', '2025-07-13 12:57:01'),
(133, 110, 'paloset', '[0,0,1]', 'after', 3, '2025-07-13 18:21:57', '2025-07-13 18:21:57'),
(134, 111, 'paloset', '[0,0,1]', 'after', 3, '2025-07-13 18:21:58', '2025-07-13 18:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `mentel_helth_guides`
--

CREATE TABLE `mentel_helth_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentel_helth_guides`
--

INSERT INTO `mentel_helth_guides` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Mental health guideline 2025', 'mhotrs_programmatic_guidance.pdf', 'guide/mentelhelth_guides/1750847698.pdf', 1, '2025-06-25 16:34:58', '2025-06-25 16:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `message_manages`
--

CREATE TABLE `message_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `sender_type` varchar(255) NOT NULL,
  `receiver_type` varchar(255) NOT NULL,
  `file_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`file_url`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_manages`
--

INSERT INTO `message_manages` (`id`, `sender_id`, `receiver_id`, `message`, `sender_type`, `receiver_type`, `file_url`, `created_at`, `updated_at`) VALUES
(1, 79, 54, 'for dctor', 'patient', 'doctor', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/58611746610491.png\"', '2025-05-07 09:34:51', '2025-05-07 09:34:51'),
(2, 79, 54, 'm1', 'patient', 'doctor', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/49951746610858.png\"', '2025-05-07 09:40:58', '2025-05-07 09:40:58'),
(3, 79, 77, 'tt', 'patient', 'doctor', NULL, '2025-05-07 09:46:23', '2025-05-07 09:46:23'),
(4, 77, 79, 'hello', 'doctor', 'doctor', NULL, '2025-05-07 09:47:39', '2025-05-07 09:47:39'),
(5, 77, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-07 09:48:01', '2025-05-07 09:48:01'),
(6, 79, 113, 'message 1', 'patient', 'student', NULL, '2025-05-07 09:54:39', '2025-05-07 09:54:39'),
(7, 113, 79, 'hello patient', 'student', 'patient', NULL, '2025-05-07 09:55:25', '2025-05-07 09:55:25'),
(8, 79, 113, 'message 1', 'patient', 'student', NULL, '2025-05-07 16:20:51', '2025-05-07 16:20:51'),
(9, 79, 113, 'message 1', 'patient', 'student', NULL, '2025-05-07 16:22:32', '2025-05-07 16:22:32'),
(10, 79, 77, 'sadfa asdf sad f 1', 'patient', 'patient', NULL, '2025-05-07 16:24:07', '2025-05-07 16:24:07'),
(11, 79, 77, 'new', 'patient', 'patient', NULL, '2025-05-07 16:25:38', '2025-05-07 16:25:38'),
(12, 79, 79, 'new', 'patient', 'patient', NULL, '2025-05-07 16:27:31', '2025-05-07 16:27:31'),
(13, 79, 79, 'newsdfg', 'patient', 'patient', NULL, '2025-05-07 16:27:40', '2025-05-07 16:27:40'),
(14, 79, 78, 'patiealkrn askn;kdsja nfk;djs nfkjsdf kj dsfkjdsf jdskfj ikbn sdafkjdsaf kgsdkfj', 'patient', 'patient', NULL, '2025-05-07 16:29:13', '2025-05-07 16:29:13'),
(15, 79, 78, 'fddf', 'patient', 'patient', NULL, '2025-05-07 16:33:51', '2025-05-07 16:33:51'),
(16, 79, 78, 'fddf', 'patient', 'patient', NULL, '2025-05-07 16:34:30', '2025-05-07 16:34:30'),
(17, 79, 113, 'fddfsdf', 'patient', 'student', NULL, '2025-05-07 16:34:44', '2025-05-07 16:34:44'),
(18, 79, 78, 'sdf sadf saf saf saf s adf asdf sadf asdf sadf  sda sad', 'patient', 'patient', NULL, '2025-05-07 16:37:58', '2025-05-07 16:37:58'),
(19, 79, 78, 'sdf sadf saf saf saf s adf asdf sadf asdf sadf  sda sad', 'patient', 'patient', NULL, '2025-05-07 16:38:27', '2025-05-07 16:38:27'),
(20, 61, 61, 'dfd', 'doctor', 'doctor', NULL, '2025-05-07 22:10:07', '2025-05-07 22:10:07'),
(21, 61, 70, 'sds', 'doctor', 'doctor', NULL, '2025-05-07 22:10:44', '2025-05-07 22:10:44'),
(22, 61, 70, 'sds', 'doctor', 'doctor', NULL, '2025-05-07 22:10:45', '2025-05-07 22:10:45'),
(23, 61, 70, 'dfs', 'doctor', 'doctor', NULL, '2025-05-07 22:12:54', '2025-05-07 22:12:54'),
(30, 61, 79, 'dsf', 'doctor', 'patient', NULL, '2025-05-07 22:42:56', '2025-05-07 22:42:56'),
(31, 61, 61, 'fsdf', 'doctor', 'doctor', NULL, '2025-05-07 22:47:25', '2025-05-07 22:47:25'),
(32, 61, 70, 'dfs', 'doctor', 'doctor', NULL, '2025-05-07 22:47:38', '2025-05-07 22:47:38'),
(33, 61, 79, 'dffs', 'doctor', 'patient', NULL, '2025-05-07 22:47:46', '2025-05-07 22:47:46'),
(34, 70, 78, 'Hey patient', 'doctor', 'patient', NULL, '2025-05-07 23:29:41', '2025-05-07 23:29:41'),
(35, 79, 61, 'hello', 'patient', 'doctor', NULL, '2025-05-07 23:29:52', '2025-05-07 23:29:52'),
(36, 78, 70, 'Hello doctor', 'patient', 'doctor', NULL, '2025-05-07 23:31:08', '2025-05-07 23:31:08'),
(37, 81, 78, 'hi', 'doctor', 'patient', NULL, '2025-05-07 23:33:28', '2025-05-07 23:33:28'),
(38, 78, 81, 'Hello', 'patient', 'doctor', NULL, '2025-05-07 23:33:44', '2025-05-07 23:33:44'),
(39, 81, 78, 'messages  asce akon', 'doctor', 'patient', NULL, '2025-05-07 23:34:07', '2025-05-07 23:34:07'),
(40, 78, 81, 'massage jacche but slow', 'patient', 'doctor', NULL, '2025-05-07 23:34:20', '2025-05-07 23:34:20'),
(41, 81, 78, 'akhon ai vabei chalate hobe', 'doctor', 'patient', NULL, '2025-05-07 23:34:53', '2025-05-07 23:34:53'),
(42, 81, 78, 'puser system change kora somvab na akhon', 'doctor', 'patient', NULL, '2025-05-07 23:35:36', '2025-05-07 23:35:36'),
(43, 81, 78, 'hi', 'doctor', 'patient', NULL, '2025-05-08 09:40:45', '2025-05-08 09:40:45'),
(44, 78, 81, 'Hello', 'patient', 'doctor', NULL, '2025-05-08 09:41:32', '2025-05-08 09:41:32'),
(45, 81, 114, 'yh', 'doctor', 'patient', NULL, '2025-05-08 09:47:29', '2025-05-08 09:47:29'),
(46, 81, 78, 'check time', 'doctor', 'patient', NULL, '2025-05-08 10:49:09', '2025-05-08 10:49:09'),
(47, 78, 81, 'ok', 'patient', 'doctor', NULL, '2025-05-08 10:49:55', '2025-05-08 10:49:55'),
(48, 78, 81, 'perfect', 'patient', 'doctor', NULL, '2025-05-08 10:50:11', '2025-05-08 10:50:11'),
(49, 81, 78, 'ok', 'doctor', 'patient', NULL, '2025-05-08 10:51:20', '2025-05-08 10:51:20'),
(50, 81, 78, 'check', 'doctor', 'patient', NULL, '2025-05-08 10:52:13', '2025-05-08 10:52:13'),
(51, 78, 81, 'right', 'patient', 'doctor', NULL, '2025-05-08 10:52:59', '2025-05-08 10:52:59'),
(52, 81, 78, 'hi', 'doctor', 'patient', NULL, '2025-05-08 10:53:21', '2025-05-08 10:53:21'),
(53, 78, 81, 'ok', 'patient', 'doctor', NULL, '2025-05-08 10:53:37', '2025-05-08 10:53:37'),
(54, 81, 78, 'hhhh', 'doctor', 'patient', NULL, '2025-05-08 10:53:56', '2025-05-08 10:53:56'),
(55, 78, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-08 10:54:42', '2025-05-08 10:54:42'),
(56, 78, 81, 'hey', 'patient', 'doctor', NULL, '2025-05-08 10:55:33', '2025-05-08 10:55:33'),
(57, 81, 78, 'message  dan', 'doctor', 'patient', NULL, '2025-05-08 10:59:57', '2025-05-08 10:59:57'),
(58, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-08 11:08:16', '2025-05-08 12:08:16'),
(59, 79, 81, 'sir', 'patient', 'doctor', NULL, '2025-05-08 12:08:35', '2025-05-08 12:08:35'),
(60, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-08 12:08:57', '2025-05-08 12:08:57'),
(61, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-08 20:09:04', '2025-05-08 20:09:04'),
(62, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-08 12:32:18', '2025-05-08 12:32:18'),
(63, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-08 00:18:04', '2025-05-08 13:18:04'),
(64, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-12 10:26:24', '2025-05-12 10:26:24'),
(65, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-12 10:26:25', '2025-05-12 10:26:25'),
(66, 61, 79, 'sdds', 'doctor', 'patient', NULL, '2025-05-12 15:42:30', '2025-05-12 15:42:30'),
(67, 79, 61, 'hiiiii', 'patient', 'doctor', NULL, '2025-05-12 15:42:44', '2025-05-12 15:42:44'),
(68, 61, 79, 'sdsd', 'doctor', 'patient', NULL, '2025-05-12 15:43:06', '2025-05-12 15:43:06'),
(69, 79, 61, 'hi', 'patient', 'doctor', NULL, '2025-05-12 15:43:40', '2025-05-12 15:43:40'),
(70, 61, 79, 'sdfsdf', 'doctor', 'patient', NULL, '2025-05-12 15:44:18', '2025-05-12 15:44:18'),
(71, 79, 61, 'hi', 'patient', 'doctor', NULL, '2025-05-12 15:44:41', '2025-05-12 15:44:41'),
(72, 61, 79, 'bh', 'doctor', 'patient', NULL, '2025-05-12 15:45:59', '2025-05-12 15:45:59'),
(73, 79, 61, 'omor', 'patient', 'doctor', NULL, '2025-05-12 15:46:08', '2025-05-12 15:46:08'),
(74, 61, 79, 'gg', 'doctor', 'patient', NULL, '2025-05-12 15:46:19', '2025-05-12 15:46:19'),
(75, 61, 79, 'ggg', 'doctor', 'patient', NULL, '2025-05-12 15:48:39', '2025-05-12 15:48:39'),
(76, 79, 61, 'yyy', 'patient', 'doctor', NULL, '2025-05-12 15:48:54', '2025-05-12 15:48:54'),
(77, 61, 79, 'gg', 'doctor', 'patient', NULL, '2025-05-12 15:49:01', '2025-05-12 15:49:01'),
(78, 79, 61, 'pp', 'patient', 'doctor', NULL, '2025-05-12 15:49:34', '2025-05-12 15:49:34'),
(79, 61, 79, 'fff', 'doctor', 'patient', NULL, '2025-05-12 15:49:45', '2025-05-12 15:49:45'),
(80, 61, 79, 'hh', 'doctor', 'patient', NULL, '2025-05-12 15:51:07', '2025-05-12 15:51:07'),
(81, 79, 61, 'yyyyy', 'patient', 'doctor', NULL, '2025-05-12 15:51:18', '2025-05-12 15:51:18'),
(82, 79, 61, 'tt', 'patient', 'doctor', NULL, '2025-05-12 15:51:32', '2025-05-12 15:51:32'),
(83, 79, 61, 'r', 'patient', 'doctor', NULL, '2025-05-12 15:52:31', '2025-05-12 15:52:31'),
(84, 61, 79, 'hhhdfsf', 'doctor', 'patient', NULL, '2025-05-12 15:57:26', '2025-05-12 15:57:26'),
(85, 79, 61, 'ki', 'patient', 'doctor', NULL, '2025-05-12 15:57:47', '2025-05-12 15:57:47'),
(86, 61, 79, 'dfd', 'doctor', 'patient', NULL, '2025-05-12 15:58:29', '2025-05-12 15:58:29'),
(87, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 15:58:36', '2025-05-12 15:58:36'),
(88, 61, 79, 'gggg', 'doctor', 'patient', NULL, '2025-05-12 15:59:19', '2025-05-12 15:59:19'),
(89, 79, 61, 'hadi', 'patient', 'doctor', NULL, '2025-05-12 15:59:51', '2025-05-12 15:59:51'),
(90, 79, 61, 'hhj', 'patient', 'doctor', NULL, '2025-05-12 16:01:12', '2025-05-12 16:01:12'),
(91, 79, 61, 'hhj', 'patient', 'doctor', NULL, '2025-05-12 16:01:13', '2025-05-12 16:01:13'),
(92, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:01:17', '2025-05-12 16:01:17'),
(93, 61, 79, 'ghg', 'doctor', 'patient', NULL, '2025-05-12 16:01:28', '2025-05-12 16:01:28'),
(94, 79, 61, 'ggg', 'patient', 'doctor', NULL, '2025-05-12 16:02:28', '2025-05-12 16:02:28'),
(95, 79, 61, 'ggg', 'patient', 'doctor', NULL, '2025-05-12 16:02:32', '2025-05-12 16:02:32'),
(96, 79, 61, 'tt', 'patient', 'doctor', NULL, '2025-05-12 16:02:35', '2025-05-12 16:02:35'),
(97, 79, 61, 'iii', 'patient', 'doctor', NULL, '2025-05-12 16:02:40', '2025-05-12 16:02:40'),
(98, 61, 79, 'drd', 'doctor', 'patient', NULL, '2025-05-12 16:02:47', '2025-05-12 16:02:47'),
(99, 61, 79, 'fff', 'doctor', 'patient', NULL, '2025-05-12 16:03:46', '2025-05-12 16:03:46'),
(100, 61, 79, 'vv', 'doctor', 'patient', NULL, '2025-05-12 16:04:18', '2025-05-12 16:04:18'),
(101, 79, 61, 'hhh', 'patient', 'doctor', NULL, '2025-05-12 16:04:25', '2025-05-12 16:04:25'),
(102, 79, 61, 'ghh', 'patient', 'doctor', NULL, '2025-05-12 16:04:29', '2025-05-12 16:04:29'),
(103, 79, 61, 'ghh', 'patient', 'doctor', NULL, '2025-05-12 16:04:29', '2025-05-12 16:04:29'),
(104, 61, 79, 'gg', 'doctor', 'patient', NULL, '2025-05-12 16:04:31', '2025-05-12 16:04:31'),
(105, 79, 61, 'jjj', 'patient', 'doctor', NULL, '2025-05-12 16:06:58', '2025-05-12 16:06:58'),
(106, 79, 61, 'hj', 'patient', 'doctor', NULL, '2025-05-12 16:07:04', '2025-05-12 16:07:04'),
(107, 79, 61, 'g', 'patient', 'doctor', NULL, '2025-05-12 16:07:07', '2025-05-12 16:07:07'),
(108, 79, 61, 'g', 'patient', 'doctor', NULL, '2025-05-12 16:07:07', '2025-05-12 16:07:07'),
(109, 61, 79, 'gg', 'doctor', 'patient', NULL, '2025-05-12 16:07:21', '2025-05-12 16:07:21'),
(110, 79, 61, 'jjj', 'patient', 'doctor', NULL, '2025-05-12 16:11:00', '2025-05-12 16:11:00'),
(111, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:11:04', '2025-05-12 16:11:04'),
(112, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:11:06', '2025-05-12 16:11:06'),
(113, 70, 79, 'Hey', 'doctor', 'patient', NULL, '2025-05-12 16:11:17', '2025-05-12 16:11:17'),
(114, 61, 79, 'dfd', 'doctor', 'patient', NULL, '2025-05-12 16:11:18', '2025-05-12 16:11:18'),
(115, 79, 70, 'hi', 'patient', 'doctor', NULL, '2025-05-12 16:11:37', '2025-05-12 16:11:37'),
(116, 61, 79, 'hh', 'doctor', 'patient', NULL, '2025-05-12 16:11:52', '2025-05-12 16:11:52'),
(117, 70, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-12 16:11:54', '2025-05-12 16:11:54'),
(118, 79, 70, 'ggg', 'patient', 'doctor', NULL, '2025-05-12 16:12:10', '2025-05-12 16:12:10'),
(119, 79, 70, 'kk', 'patient', 'doctor', NULL, '2025-05-12 16:12:15', '2025-05-12 16:12:15'),
(120, 79, 70, 'k', 'patient', 'doctor', NULL, '2025-05-12 16:12:19', '2025-05-12 16:12:19'),
(121, 61, 79, 'hh', 'doctor', 'patient', NULL, '2025-05-12 16:12:27', '2025-05-12 16:12:27'),
(122, 70, 79, 'hhh', 'doctor', 'patient', NULL, '2025-05-12 16:12:32', '2025-05-12 16:12:32'),
(123, 81, 70, 'gg', 'doctor', 'doctor', NULL, '2025-05-12 16:14:50', '2025-05-12 16:14:50'),
(124, 81, 70, 'gg', 'doctor', 'doctor', NULL, '2025-05-12 16:14:52', '2025-05-12 16:14:52'),
(125, 70, 81, 'Mm', 'doctor', 'doctor', NULL, '2025-05-12 16:15:23', '2025-05-12 16:15:23'),
(126, 81, 70, 'hhh', 'doctor', 'doctor', NULL, '2025-05-12 16:15:28', '2025-05-12 16:15:28'),
(127, 70, 81, 'hh', 'doctor', 'doctor', NULL, '2025-05-12 16:15:46', '2025-05-12 16:15:46'),
(128, 81, 70, 'hhh', 'doctor', 'doctor', NULL, '2025-05-12 16:15:55', '2025-05-12 16:15:55'),
(129, 81, 70, 'hh', 'doctor', 'doctor', NULL, '2025-05-12 16:16:31', '2025-05-12 16:16:31'),
(130, 81, 70, 'kk', 'doctor', 'doctor', NULL, '2025-05-12 16:16:36', '2025-05-12 16:16:36'),
(131, 81, 70, 'j', 'doctor', 'doctor', NULL, '2025-05-12 16:16:40', '2025-05-12 16:16:40'),
(132, 81, 70, 'j', 'doctor', 'doctor', NULL, '2025-05-12 16:16:40', '2025-05-12 16:16:40'),
(133, 81, 70, 'j', 'doctor', 'doctor', NULL, '2025-05-12 16:16:42', '2025-05-12 16:16:42'),
(134, 61, 79, 'dfd', 'doctor', 'patient', NULL, '2025-05-12 16:16:45', '2025-05-12 16:16:45'),
(135, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:17:06', '2025-05-12 16:17:06'),
(136, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:17:10', '2025-05-12 16:17:10'),
(137, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:17:31', '2025-05-12 16:17:31'),
(138, 79, 61, 'jj', 'patient', 'doctor', NULL, '2025-05-12 16:17:36', '2025-05-12 16:17:36'),
(139, 61, 79, 'fdfd', 'doctor', 'patient', NULL, '2025-05-12 16:18:38', '2025-05-12 16:18:38'),
(140, 79, 61, 'hhh', 'patient', 'doctor', NULL, '2025-05-12 16:18:45', '2025-05-12 16:18:45'),
(141, 79, 61, 'hhh', 'patient', 'doctor', NULL, '2025-05-12 16:18:57', '2025-05-12 16:18:57'),
(142, 79, 61, 'jj', 'patient', 'doctor', NULL, '2025-05-12 16:19:09', '2025-05-12 16:19:09'),
(143, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:19:30', '2025-05-12 16:19:30'),
(144, 61, 79, 'dfd', 'doctor', 'patient', NULL, '2025-05-12 16:19:48', '2025-05-12 16:19:48'),
(145, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:20:00', '2025-05-12 16:20:00'),
(146, 79, 61, 'yy', 'patient', 'doctor', NULL, '2025-05-12 16:20:35', '2025-05-12 16:20:35'),
(147, 79, 61, 'yy', 'patient', 'doctor', NULL, '2025-05-12 16:20:36', '2025-05-12 16:20:36'),
(148, 61, 79, 'gg', 'doctor', 'patient', NULL, '2025-05-12 16:20:45', '2025-05-12 16:20:45'),
(149, 61, 79, 'fr', 'doctor', 'patient', NULL, '2025-05-12 16:21:25', '2025-05-12 16:21:25'),
(150, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:21:38', '2025-05-12 16:21:38'),
(151, 61, 79, 'yyyyyy', 'doctor', 'patient', NULL, '2025-05-12 16:23:37', '2025-05-12 16:23:37'),
(152, 61, 79, 'dfdfd', 'doctor', 'patient', NULL, '2025-05-12 16:24:39', '2025-05-12 16:24:39'),
(153, 79, 61, 'hu', 'patient', 'doctor', NULL, '2025-05-12 16:25:10', '2025-05-12 16:25:10'),
(154, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:25:15', '2025-05-12 16:25:15'),
(155, 61, 79, 'dfdf', 'doctor', 'patient', NULL, '2025-05-12 16:25:33', '2025-05-12 16:25:33'),
(156, 61, 79, 'yy', 'doctor', 'patient', NULL, '2025-05-12 16:25:41', '2025-05-12 16:25:41'),
(157, 79, 61, 'hhhh', 'patient', 'doctor', NULL, '2025-05-12 16:25:44', '2025-05-12 16:25:44'),
(158, 79, 61, 'hhh', 'patient', 'doctor', NULL, '2025-05-12 16:27:41', '2025-05-12 16:27:41'),
(159, 79, 61, 'hhh', 'patient', 'doctor', NULL, '2025-05-12 16:27:46', '2025-05-12 16:27:46'),
(160, 61, 79, 'hhh', 'doctor', 'patient', NULL, '2025-05-12 16:27:53', '2025-05-12 16:27:53'),
(161, 61, 79, 'fdf', 'doctor', 'patient', NULL, '2025-05-12 16:28:53', '2025-05-12 16:28:53'),
(162, 79, 61, 'hi', 'patient', 'doctor', NULL, '2025-05-12 16:29:04', '2025-05-12 16:29:04'),
(163, 61, 79, 'jj', 'doctor', 'patient', NULL, '2025-05-12 16:29:15', '2025-05-12 16:29:15'),
(164, 79, 61, 'jj', 'patient', 'doctor', NULL, '2025-05-12 16:29:24', '2025-05-12 16:29:24'),
(165, 79, 61, 'hh', 'patient', 'doctor', NULL, '2025-05-12 16:30:17', '2025-05-12 16:30:17'),
(166, 61, 79, 'fdf', 'doctor', 'patient', NULL, '2025-05-12 16:30:46', '2025-05-12 16:30:46'),
(167, 61, 79, 'dfd', 'doctor', 'patient', NULL, '2025-05-12 16:38:56', '2025-05-12 16:38:56'),
(168, 61, 79, 'dfd', 'doctor', 'patient', NULL, '2025-05-12 16:39:11', '2025-05-12 16:39:11'),
(169, 61, 79, 'hh', 'doctor', 'patient', NULL, '2025-05-12 16:39:16', '2025-05-12 16:39:16'),
(170, 79, 61, 'eeer', 'patient', 'doctor', NULL, '2025-05-12 16:40:29', '2025-05-12 16:40:29'),
(171, 79, 61, 'yyyy', 'patient', 'doctor', NULL, '2025-05-12 16:40:42', '2025-05-12 16:40:42'),
(172, 61, 79, 'd', 'doctor', 'patient', NULL, '2025-05-12 16:40:42', '2025-05-12 16:40:42'),
(173, 79, 61, 'gggg', 'patient', 'doctor', NULL, '2025-05-12 16:40:51', '2025-05-12 16:40:51'),
(174, 61, 79, 'gg', 'doctor', 'patient', NULL, '2025-05-12 16:43:39', '2025-05-12 16:43:39'),
(175, 61, 79, 'fdf', 'doctor', 'patient', NULL, '2025-05-12 16:48:04', '2025-05-12 16:48:04'),
(176, 79, 61, 'ggg', 'patient', 'doctor', NULL, '2025-05-12 16:48:22', '2025-05-12 16:48:22'),
(177, 79, 61, 'aaa', 'patient', 'doctor', NULL, '2025-05-12 16:48:30', '2025-05-12 16:48:30'),
(178, 79, 61, 'yyyy', 'patient', 'doctor', NULL, '2025-05-12 16:48:37', '2025-05-12 16:48:37'),
(179, 79, 61, 'yyy', 'patient', 'doctor', NULL, '2025-05-12 16:48:49', '2025-05-12 16:48:49'),
(180, 61, 79, 'dfdsf', 'doctor', 'patient', NULL, '2025-05-12 16:49:45', '2025-05-12 16:49:45'),
(181, 61, 79, 'tdff', 'doctor', 'patient', NULL, '2025-05-12 16:50:02', '2025-05-12 16:50:02'),
(182, 79, 61, 'ghh', 'patient', 'doctor', NULL, '2025-05-12 16:50:12', '2025-05-12 16:50:12'),
(183, 79, 61, 'tygh', 'patient', 'doctor', NULL, '2025-05-12 16:51:01', '2025-05-12 16:51:01'),
(184, 79, 61, 'tygh', 'patient', 'doctor', NULL, '2025-05-12 16:51:03', '2025-05-12 16:51:03'),
(185, 79, 79, 'omor', 'patient', 'doctor', NULL, '2025-05-12 16:53:22', '2025-05-12 16:53:22'),
(186, 79, 61, 'omor', 'patient', 'doctor', NULL, '2025-05-12 16:54:56', '2025-05-12 16:54:56'),
(187, 61, 79, 'dfd', 'doctor', 'patient', NULL, '2025-05-12 17:02:51', '2025-05-12 17:02:51'),
(188, 61, 79, 'dsd', 'doctor', 'patient', NULL, '2025-05-12 17:03:02', '2025-05-12 17:03:02'),
(189, 61, 79, 'sd', 'doctor', 'patient', NULL, '2025-05-12 17:04:00', '2025-05-12 17:04:00'),
(190, 61, 54, 'Hello 2', 'doctor', 'doctor', NULL, '2025-05-12 17:05:51', '2025-05-12 17:05:51'),
(191, 61, 79, 'dfdfdf', 'doctor', 'patient', NULL, '2025-05-12 17:07:38', '2025-05-12 17:07:38'),
(192, 61, 54, 'Hello 2', 'doctor', 'doctor', NULL, '2025-05-12 17:09:38', '2025-05-12 17:09:38'),
(193, 61, 54, 'Hello 2', 'doctor', 'doctor', NULL, '2025-05-12 17:10:09', '2025-05-12 17:10:09'),
(194, 61, 54, 'Hello 2', 'doctor', 'doctor', NULL, '2025-05-12 17:11:06', '2025-05-12 17:11:06'),
(195, 61, 54, 'Hello 2', 'doctor', 'doctor', NULL, '2025-05-12 17:11:52', '2025-05-12 17:11:52'),
(196, 61, 54, 'Hello 2', 'doctor', 'doctor', NULL, '2025-05-12 17:12:27', '2025-05-12 17:12:27'),
(197, 61, 54, 'Hello 2', 'doctor', 'doctor', NULL, '2025-05-12 17:12:32', '2025-05-12 17:12:32'),
(198, 61, 54, 'Hello 2', 'doctor', 'doctor', NULL, '2025-05-12 17:13:34', '2025-05-12 17:13:34'),
(199, 79, 54, 'Hello 2', 'patient', 'doctor', NULL, '2025-05-12 17:16:18', '2025-05-12 17:16:18'),
(200, 79, 54, 'Hello 2', 'patient', 'doctor', NULL, '2025-05-12 17:17:42', '2025-05-12 17:17:42'),
(201, 81, 77, 'tt', 'doctor', 'doctor', NULL, '2025-05-12 17:18:17', '2025-05-12 17:18:17'),
(202, 81, 61, 'tt', 'doctor', 'doctor', NULL, '2025-05-12 17:18:26', '2025-05-12 17:18:26'),
(203, 81, 79, 'dfdf', 'doctor', 'doctor', NULL, '2025-05-12 17:20:16', '2025-05-12 17:20:16'),
(204, 81, 79, 'dfdf', 'doctor', 'patient', NULL, '2025-05-12 17:20:32', '2025-05-12 17:20:32'),
(205, 81, 79, 'omor', 'doctor', 'patient', NULL, '2025-05-12 17:23:23', '2025-05-12 17:23:23'),
(206, 61, 79, 'dfd', 'doctor', 'patient', NULL, '2025-05-12 17:23:43', '2025-05-12 17:23:43'),
(207, 61, 79, 'dsd', 'doctor', 'patient', NULL, '2025-05-12 17:24:46', '2025-05-12 17:24:46'),
(208, 81, 61, 'wwwwwww', 'doctor', 'doctor', NULL, '2025-05-12 17:25:04', '2025-05-12 17:25:04'),
(209, 61, 81, 'kk', 'doctor', 'doctor', NULL, '2025-05-12 17:25:47', '2025-05-12 17:25:47'),
(210, 81, 61, 'yyyyyyy', 'doctor', 'doctor', NULL, '2025-05-12 17:26:03', '2025-05-12 17:26:03'),
(211, 61, 81, 'gg', 'doctor', 'doctor', NULL, '2025-05-12 17:26:11', '2025-05-12 17:26:11'),
(212, 61, 81, 'gg', 'doctor', 'doctor', NULL, '2025-05-12 17:27:06', '2025-05-12 17:27:06'),
(213, 81, 61, 'hi', 'doctor', 'doctor', NULL, '2025-05-12 17:27:40', '2025-05-12 17:27:40'),
(214, 61, 81, 'hh', 'doctor', 'doctor', NULL, '2025-05-12 17:27:42', '2025-05-12 17:27:42'),
(215, 81, 61, 'hi', 'doctor', 'doctor', NULL, '2025-05-12 17:29:04', '2025-05-12 17:29:04'),
(216, 81, 78, 'kkk', 'doctor', 'patient', NULL, '2025-05-12 17:29:59', '2025-05-12 17:29:59'),
(217, 78, 81, 'jjh', 'patient', 'doctor', NULL, '2025-05-12 17:30:21', '2025-05-12 17:30:21'),
(218, 81, 78, 'hi', 'doctor', 'patient', NULL, '2025-05-12 17:30:38', '2025-05-12 17:30:38'),
(219, 61, 81, 'fd', 'doctor', 'doctor', NULL, '2025-05-12 17:30:44', '2025-05-12 17:30:44'),
(220, 78, 81, 'lll', 'patient', 'doctor', NULL, '2025-05-12 17:30:53', '2025-05-12 17:30:53'),
(221, 81, 79, 'omorddd', 'doctor', 'patient', NULL, '2025-05-12 17:31:03', '2025-05-12 17:31:03'),
(222, 61, 79, 'fdf', 'doctor', 'patient', NULL, '2025-05-12 17:31:32', '2025-05-12 17:31:32'),
(223, 79, 61, 'jjj', 'patient', 'doctor', NULL, '2025-05-12 17:31:44', '2025-05-12 17:31:44'),
(224, 79, 61, 'hhh', 'patient', 'doctor', NULL, '2025-05-12 17:31:56', '2025-05-12 17:31:56'),
(225, 61, 79, 'dfdf', 'doctor', 'patient', NULL, '2025-05-12 17:31:57', '2025-05-12 17:31:57'),
(226, 79, 61, 'hhhfgg', 'patient', 'doctor', NULL, '2025-05-12 17:31:57', '2025-05-12 17:31:57'),
(227, 79, 61, 'g', 'patient', 'doctor', NULL, '2025-05-12 17:31:59', '2025-05-12 17:31:59'),
(228, 79, 61, 'g', 'patient', 'doctor', NULL, '2025-05-12 17:31:59', '2025-05-12 17:31:59'),
(229, 79, 61, 'g', 'patient', 'doctor', NULL, '2025-05-12 17:32:00', '2025-05-12 17:32:00'),
(230, 79, 61, 'g', 'patient', 'doctor', NULL, '2025-05-12 17:32:03', '2025-05-12 17:32:03'),
(231, 79, 61, 'gg', 'patient', 'doctor', NULL, '2025-05-12 17:32:04', '2025-05-12 17:32:04'),
(232, 79, 61, 'g', 'patient', 'doctor', NULL, '2025-05-12 17:32:07', '2025-05-12 17:32:07'),
(233, 81, 78, 'hi', 'doctor', 'patient', NULL, '2025-05-13 09:42:20', '2025-05-13 09:42:20'),
(234, 78, 81, 'hello', 'patient', 'doctor', NULL, '2025-05-13 09:42:40', '2025-05-13 09:42:40'),
(235, 81, 78, 'hi', 'doctor', 'patient', NULL, '2025-05-13 09:42:48', '2025-05-13 09:42:48'),
(236, 78, 81, 'jjj', 'patient', 'doctor', NULL, '2025-05-13 09:43:21', '2025-05-13 09:43:21'),
(237, 81, 78, 'hi', 'doctor', 'patient', NULL, '2025-05-13 09:43:35', '2025-05-13 09:43:35'),
(238, 81, 70, 'hi', 'doctor', 'doctor', NULL, '2025-05-14 14:17:22', '2025-05-14 14:17:22'),
(239, 81, 77, 'tt', 'doctor', 'doctor', NULL, '2025-05-15 11:19:06', '2025-05-15 11:19:06'),
(240, 81, 70, 'hi', 'doctor', 'doctor', NULL, '2025-05-15 11:56:36', '2025-05-15 11:56:36'),
(241, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 11:57:59', '2025-05-15 11:57:59'),
(242, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 11:58:14', '2025-05-15 11:58:14'),
(243, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 12:07:21', '2025-05-15 12:07:21'),
(244, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 12:07:57', '2025-05-15 12:07:57'),
(245, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-15 12:20:07', '2025-05-15 12:20:07'),
(246, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 12:20:17', '2025-05-15 12:20:17'),
(247, 79, 81, 'good', 'patient', 'doctor', NULL, '2025-05-15 12:20:45', '2025-05-15 12:20:45'),
(248, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 12:20:52', '2025-05-15 12:20:52'),
(249, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 12:40:58', '2025-05-15 12:40:58'),
(250, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 12:45:22', '2025-05-15 12:45:22'),
(251, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 12:47:49', '2025-05-15 12:47:49'),
(252, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 12:48:01', '2025-05-15 12:48:01'),
(253, 79, 81, 'sss', 'patient', 'doctor', NULL, '2025-05-15 12:52:01', '2025-05-15 12:52:01'),
(254, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 12:56:14', '2025-05-15 12:56:14'),
(255, 79, 81, 'hello', 'patient', 'doctor', NULL, '2025-05-15 12:56:50', '2025-05-15 12:56:50'),
(256, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 12:58:06', '2025-05-15 12:58:06'),
(257, 81, 79, 'kkk', 'doctor', 'patient', NULL, '2025-05-15 12:58:27', '2025-05-15 12:58:27'),
(258, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 13:02:07', '2025-05-15 13:02:07'),
(259, 81, 79, 'hadiuzzaman', 'doctor', 'patient', NULL, '2025-05-15 13:02:21', '2025-05-15 13:02:21'),
(260, 79, 81, 'hadi', 'patient', 'doctor', NULL, '2025-05-15 13:02:32', '2025-05-15 13:02:32'),
(261, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 13:24:07', '2025-05-15 13:24:07'),
(262, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 13:24:35', '2025-05-15 13:24:35'),
(263, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 13:25:11', '2025-05-15 13:25:11'),
(264, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 13:26:00', '2025-05-15 13:26:00'),
(265, 79, 81, 'hadiuzzaman', 'patient', 'doctor', NULL, '2025-05-15 13:26:16', '2025-05-15 13:26:16'),
(266, 79, 81, 'hello', 'patient', 'doctor', NULL, '2025-05-15 13:26:44', '2025-05-15 13:26:44'),
(267, 81, 79, 'hellooooooo', 'doctor', 'patient', NULL, '2025-05-15 13:27:15', '2025-05-15 13:27:15'),
(268, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 13:50:23', '2025-05-15 13:50:23'),
(269, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 13:52:42', '2025-05-15 13:52:42'),
(270, 79, 81, 'hadi', 'patient', 'doctor', NULL, '2025-05-15 13:53:02', '2025-05-15 13:53:02'),
(271, 81, 79, 'hadi', 'doctor', 'patient', NULL, '2025-05-15 13:53:08', '2025-05-15 13:53:08'),
(272, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 14:06:48', '2025-05-15 14:06:48'),
(273, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 14:09:36', '2025-05-15 14:09:36'),
(274, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 14:12:55', '2025-05-15 14:12:55'),
(275, 79, 81, 'hello', 'patient', 'doctor', NULL, '2025-05-15 14:13:04', '2025-05-15 14:13:04'),
(276, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 14:13:21', '2025-05-15 14:13:21'),
(277, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-15 14:13:29', '2025-05-15 14:13:29'),
(278, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-15 14:13:40', '2025-05-15 14:13:40'),
(279, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 14:13:51', '2025-05-15 14:13:51'),
(280, 79, 81, 'sss', 'patient', 'doctor', NULL, '2025-05-15 14:29:52', '2025-05-15 14:29:52'),
(281, 79, 81, 'sss', 'patient', 'doctor', NULL, '2025-05-15 14:31:09', '2025-05-15 14:31:09'),
(282, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 14:38:23', '2025-05-15 14:38:23'),
(283, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 14:39:03', '2025-05-15 14:39:03'),
(284, 81, 79, 'hello world', 'doctor', 'patient', NULL, '2025-05-15 14:40:03', '2025-05-15 14:40:03'),
(285, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 14:40:48', '2025-05-15 14:40:48'),
(286, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-15 14:40:59', '2025-05-15 14:40:59'),
(287, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 14:48:30', '2025-05-15 14:48:30'),
(288, 79, 81, 'who are you', 'patient', 'doctor', NULL, '2025-05-15 14:48:42', '2025-05-15 14:48:42'),
(289, 81, 79, 'good morning', 'doctor', 'patient', NULL, '2025-05-15 14:48:54', '2025-05-15 14:48:54'),
(290, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 14:51:55', '2025-05-15 14:51:55'),
(291, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-15 14:56:04', '2025-05-15 14:56:04'),
(292, 79, 81, 'hello world', 'patient', 'doctor', NULL, '2025-05-15 14:57:07', '2025-05-15 14:57:07'),
(293, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-15 14:59:58', '2025-05-15 14:59:58'),
(294, 81, 114, 'hello', 'doctor', 'student', NULL, '2025-05-15 15:02:57', '2025-05-15 15:02:57'),
(295, 114, 81, 'hi', 'student', 'doctor', NULL, '2025-05-15 15:10:27', '2025-05-15 15:10:27'),
(296, 81, 114, 'hello', 'doctor', 'student', NULL, '2025-05-15 15:10:42', '2025-05-15 15:10:42'),
(297, 114, 81, 'hi', 'student', 'doctor', NULL, '2025-05-15 15:10:52', '2025-05-15 15:10:52'),
(298, 114, 81, 'hello world', 'student', 'doctor', NULL, '2025-05-15 15:11:31', '2025-05-15 15:11:31'),
(299, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 15:13:17', '2025-05-15 15:13:17'),
(300, 114, 81, 'hw', 'student', 'doctor', NULL, '2025-05-15 15:13:35', '2025-05-15 15:13:35'),
(301, 114, 81, 'hi', 'student', 'doctor', NULL, '2025-05-15 15:13:51', '2025-05-15 15:13:51'),
(302, 114, 81, 'hello', 'student', 'doctor', NULL, '2025-05-15 15:14:34', '2025-05-15 15:14:34'),
(303, 114, 81, 'hadi', 'student', 'doctor', NULL, '2025-05-15 15:14:44', '2025-05-15 15:14:44'),
(304, 114, 81, 'zzz', 'student', 'doctor', NULL, '2025-05-15 15:15:09', '2025-05-15 15:15:09'),
(305, 79, 81, 'hi doctor', 'patient', 'doctor', NULL, '2025-05-15 15:15:41', '2025-05-15 15:15:41'),
(306, 79, 81, 'how are you', 'patient', 'doctor', NULL, '2025-05-15 15:16:00', '2025-05-15 15:16:00'),
(307, 81, 79, 'i am fine', 'doctor', 'patient', NULL, '2025-05-15 15:16:10', '2025-05-15 15:16:10'),
(308, 81, 114, 'hi', 'doctor', 'student', NULL, '2025-05-15 15:17:32', '2025-05-15 15:17:32'),
(309, 114, 81, 'hello', 'student', 'doctor', NULL, '2025-05-15 15:17:41', '2025-05-15 15:17:41'),
(310, 81, 114, 'what', 'doctor', 'student', NULL, '2025-05-15 15:17:53', '2025-05-15 15:17:53'),
(311, 114, 81, 'i am fine', 'student', 'doctor', NULL, '2025-05-15 15:18:02', '2025-05-15 15:18:02'),
(312, 114, 81, 'hi', 'student', 'doctor', NULL, '2025-05-15 15:18:14', '2025-05-15 15:18:14'),
(313, 114, 81, 'hello', 'student', 'doctor', NULL, '2025-05-15 15:18:57', '2025-05-15 15:18:57'),
(314, 114, 81, 'hi', 'student', 'doctor', NULL, '2025-05-15 15:19:05', '2025-05-15 15:19:05'),
(315, 114, 81, 'ss', 'student', 'doctor', NULL, '2025-05-15 15:19:18', '2025-05-15 15:19:18'),
(316, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 17:23:50', '2025-05-15 17:23:50'),
(317, 81, 79, 'good morning', 'doctor', 'patient', NULL, '2025-05-15 17:24:01', '2025-05-15 17:24:01'),
(318, 81, 79, 'hi', 'doctor', 'patient', NULL, '2025-05-15 17:24:21', '2025-05-15 17:24:21'),
(319, 79, 81, 'hello', 'patient', 'doctor', NULL, '2025-05-15 17:24:28', '2025-05-15 17:24:28'),
(320, 81, 79, 'hello', 'doctor', 'patient', NULL, '2025-05-15 17:24:48', '2025-05-15 17:24:48'),
(321, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-05-15 17:24:56', '2025-05-15 17:24:56'),
(322, 81, 79, 'how are you doing', 'doctor', 'patient', NULL, '2025-05-15 17:25:06', '2025-05-15 17:25:06'),
(323, 79, 81, 'i am fine', 'patient', 'doctor', NULL, '2025-05-15 17:25:17', '2025-05-15 17:25:17'),
(324, 79, 81, 'and you', 'patient', 'doctor', NULL, '2025-05-15 17:25:23', '2025-05-15 17:25:23'),
(325, 81, 79, 'i am also fine', 'doctor', 'patient', NULL, '2025-05-15 17:25:36', '2025-05-15 17:25:36'),
(326, 79, 81, 'what you name', 'patient', 'doctor', NULL, '2025-05-15 17:25:50', '2025-05-15 17:25:50'),
(327, 81, 79, 'dr jarin', 'doctor', 'patient', NULL, '2025-05-15 17:31:02', '2025-05-15 17:31:02'),
(328, 70, 83, 'ki ptoblem', 'doctor', 'patient', NULL, '2025-05-27 12:01:40', '2025-05-27 12:01:40'),
(329, 70, 83, 'test koran?', 'doctor', 'patient', NULL, '2025-05-27 12:02:21', '2025-05-27 12:02:21'),
(330, 83, 70, 'আমার বিয়ে হচ্ছে না এর সমাধান কি', 'patient', 'doctor', NULL, '2025-05-27 12:03:03', '2025-05-27 12:03:03'),
(331, 83, 70, 'আমার বিয়ে হচ্ছে না এর সমাধান কি', 'patient', 'doctor', NULL, '2025-05-27 12:03:05', '2025-05-27 12:03:05'),
(332, 83, 70, 'আমি মাধব আমার কি টেস্টওয়েট হরমোন কম', 'patient', 'doctor', NULL, '2025-05-27 12:03:30', '2025-05-27 12:03:30'),
(333, 83, 70, 'আমি কি এ জীবনে বিয়ে করতে পারবোনা', 'patient', 'doctor', NULL, '2025-05-27 12:03:58', '2025-05-27 12:03:58'),
(334, 70, 83, 'হ্যাঁ পারবেন', 'doctor', 'patient', NULL, '2025-05-27 12:04:24', '2025-05-27 12:04:24'),
(335, 70, 78, 'এইটা বাংলা আসছে', 'doctor', 'patient', NULL, '2025-05-27 12:18:34', '2025-05-27 12:18:34'),
(336, 78, 70, 'চেক করে দেতেছি', 'patient', 'doctor', NULL, '2025-05-27 12:20:32', '2025-05-27 12:20:32'),
(337, 83, 70, 'hi', 'doctor', 'doctor', NULL, '2025-06-02 12:29:45', '2025-06-02 12:29:45'),
(338, 82, 77, 'asdf', 'doctor', 'doctor', NULL, '2025-06-02 15:55:13', '2025-06-02 15:55:13'),
(339, 82, 81, 'jh', 'doctor', 'doctor', NULL, '2025-06-02 15:55:55', '2025-06-02 15:55:55'),
(340, 81, 82, 'hh', 'doctor', 'doctor', NULL, '2025-06-02 15:56:14', '2025-06-02 15:56:14'),
(341, 81, 82, 'uhd', 'doctor', 'doctor', NULL, '2025-06-02 15:56:33', '2025-06-02 15:56:33'),
(342, 82, 81, 'sdfg', 'doctor', 'doctor', NULL, '2025-06-02 15:56:47', '2025-06-02 15:56:47'),
(343, 81, 82, 'yy', 'doctor', 'doctor', NULL, '2025-06-02 15:57:23', '2025-06-02 15:57:23'),
(344, 81, 82, 'yy', 'doctor', 'doctor', NULL, '2025-06-02 15:57:24', '2025-06-02 15:57:24'),
(345, 81, 82, 'yyh', 'doctor', 'doctor', NULL, '2025-06-02 15:57:31', '2025-06-02 15:57:31'),
(346, 81, 82, 'yy', 'doctor', 'doctor', NULL, '2025-06-02 15:57:44', '2025-06-02 15:57:44'),
(347, 82, 81, 'asd', 'doctor', 'doctor', NULL, '2025-06-02 15:59:18', '2025-06-02 15:59:18'),
(348, 81, 82, 'uuuu', 'doctor', 'doctor', NULL, '2025-06-02 15:59:22', '2025-06-02 15:59:22'),
(349, 81, 82, 'uuuu', 'doctor', 'doctor', NULL, '2025-06-02 15:59:24', '2025-06-02 15:59:24'),
(350, 81, 82, 'poandm', 'doctor', 'doctor', NULL, '2025-06-02 15:59:37', '2025-06-02 15:59:37'),
(351, 81, 82, 'poandm', 'doctor', 'doctor', NULL, '2025-06-02 15:59:37', '2025-06-02 15:59:37'),
(352, 81, 82, 'poandm', 'doctor', 'doctor', NULL, '2025-06-02 15:59:37', '2025-06-02 15:59:37'),
(353, 81, 82, 'oooooo', 'doctor', 'doctor', NULL, '2025-06-02 15:59:43', '2025-06-02 15:59:43'),
(354, 81, 82, 'oooooo', 'doctor', 'doctor', NULL, '2025-06-02 15:59:43', '2025-06-02 15:59:43'),
(355, 81, 82, 'oooooo', 'doctor', 'doctor', NULL, '2025-06-02 15:59:43', '2025-06-02 15:59:43'),
(356, 81, 82, 'oooooo', 'doctor', 'doctor', NULL, '2025-06-02 15:59:44', '2025-06-02 15:59:44'),
(357, 81, 82, 'oooooo', 'doctor', 'doctor', NULL, '2025-06-02 15:59:44', '2025-06-02 15:59:44'),
(358, 81, 82, 'gggg', 'doctor', 'doctor', NULL, '2025-06-02 16:00:41', '2025-06-02 16:00:41'),
(359, 81, 82, 'gggg', 'doctor', 'doctor', NULL, '2025-06-02 16:00:42', '2025-06-02 16:00:42'),
(360, 81, 82, 'gggg', 'doctor', 'doctor', NULL, '2025-06-02 16:00:43', '2025-06-02 16:00:43'),
(361, 81, 82, 'gggg', 'doctor', 'doctor', NULL, '2025-06-02 16:00:44', '2025-06-02 16:00:44'),
(362, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:51', '2025-06-02 16:00:51'),
(363, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:51', '2025-06-02 16:00:51'),
(364, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:52', '2025-06-02 16:00:52'),
(365, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:52', '2025-06-02 16:00:52'),
(366, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:53', '2025-06-02 16:00:53'),
(367, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:53', '2025-06-02 16:00:53'),
(368, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:53', '2025-06-02 16:00:53'),
(369, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:53', '2025-06-02 16:00:53'),
(370, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:54', '2025-06-02 16:00:54'),
(371, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:54', '2025-06-02 16:00:54'),
(372, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:54', '2025-06-02 16:00:54'),
(373, 81, 82, 'kkkjjj', 'doctor', 'doctor', NULL, '2025-06-02 16:00:55', '2025-06-02 16:00:55'),
(374, 114, 81, 'ss', 'student', 'doctor', NULL, '2025-06-02 16:06:21', '2025-06-02 16:06:21'),
(375, 81, 114, 'gg', 'doctor', 'student', NULL, '2025-06-02 16:07:56', '2025-06-02 16:07:56'),
(376, 81, 114, 'gg', 'doctor', 'student', NULL, '2025-06-02 16:07:57', '2025-06-02 16:07:57'),
(377, 114, 81, 'hi', 'student', 'doctor', NULL, '2025-06-02 16:08:05', '2025-06-02 16:08:05'),
(378, 81, 114, 'fg', 'doctor', 'student', NULL, '2025-06-02 16:08:17', '2025-06-02 16:08:17'),
(379, 82, 81, 'll', 'doctor', 'doctor', NULL, '2025-06-02 16:08:34', '2025-06-02 16:08:34'),
(380, 81, 82, 'h', 'doctor', 'doctor', NULL, '2025-06-02 16:08:49', '2025-06-02 16:08:49'),
(381, 81, 82, 'h', 'doctor', 'doctor', NULL, '2025-06-02 16:08:50', '2025-06-02 16:08:50'),
(382, 81, 82, 'h', 'doctor', 'doctor', NULL, '2025-06-02 16:09:01', '2025-06-02 16:09:01'),
(383, 81, 82, 'yyy', 'doctor', 'doctor', NULL, '2025-06-02 16:09:33', '2025-06-02 16:09:33'),
(384, 81, 82, 'hhhd', 'doctor', 'doctor', NULL, '2025-06-02 16:11:40', '2025-06-02 16:11:40'),
(385, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-06-02 16:13:00', '2025-06-02 16:13:00'),
(386, 81, 79, 'hmm', 'doctor', 'patient', NULL, '2025-06-02 16:13:12', '2025-06-02 16:13:12'),
(387, 81, 79, 'jj', 'doctor', 'patient', NULL, '2025-06-02 16:13:20', '2025-06-02 16:13:20'),
(388, 79, 81, 'hi', 'patient', 'doctor', NULL, '2025-06-02 16:13:25', '2025-06-02 16:13:25'),
(389, 81, 79, 'fv', 'doctor', 'patient', NULL, '2025-06-02 16:13:33', '2025-06-02 16:13:33'),
(390, 77, 81, 'hi', 'doctor', 'doctor', NULL, '2025-06-02 16:14:36', '2025-06-02 16:14:36'),
(391, 81, 77, 'u', 'doctor', 'doctor', NULL, '2025-06-02 16:14:50', '2025-06-02 16:14:50'),
(392, 81, 77, 'fdd', 'doctor', 'doctor', NULL, '2025-06-02 16:14:57', '2025-06-02 16:14:57'),
(393, 81, 77, 'fddf', 'doctor', 'doctor', NULL, '2025-06-02 16:14:58', '2025-06-02 16:14:58'),
(394, 81, 77, 'fddff', 'doctor', 'doctor', NULL, '2025-06-02 16:14:59', '2025-06-02 16:14:59'),
(395, 77, 81, 'hi', 'doctor', 'doctor', NULL, '2025-06-02 16:15:17', '2025-06-02 16:15:17'),
(396, 81, 77, 'gg', 'doctor', 'doctor', NULL, '2025-06-02 16:15:19', '2025-06-02 16:15:19'),
(397, 81, 77, 'jjj', 'doctor', 'doctor', NULL, '2025-06-02 16:15:38', '2025-06-02 16:15:38'),
(398, 81, 77, 'fv', 'doctor', 'doctor', NULL, '2025-06-02 16:15:48', '2025-06-02 16:15:48'),
(399, 77, 81, 'hi', 'doctor', 'doctor', NULL, '2025-06-02 16:15:52', '2025-06-02 16:15:52'),
(400, 81, 77, 'ff', 'doctor', 'doctor', NULL, '2025-06-02 16:16:00', '2025-06-02 16:16:00'),
(401, 77, 81, 'hh', 'doctor', 'doctor', NULL, '2025-06-02 16:16:44', '2025-06-02 16:16:44'),
(402, 77, 81, 'jj', 'doctor', 'doctor', NULL, '2025-06-02 16:16:51', '2025-06-02 16:16:51'),
(403, 81, 77, 'hi', 'doctor', 'doctor', NULL, '2025-06-02 16:16:58', '2025-06-02 16:16:58'),
(404, 77, 81, 'kjsjen', 'doctor', 'doctor', NULL, '2025-06-02 16:17:01', '2025-06-02 16:17:01'),
(405, 77, 81, 'kjsjen', 'doctor', 'doctor', NULL, '2025-06-02 16:17:03', '2025-06-02 16:17:03'),
(406, 77, 81, 'ccg', 'doctor', 'doctor', NULL, '2025-06-02 16:17:07', '2025-06-02 16:17:07'),
(407, 81, 77, 'hh', 'doctor', 'doctor', NULL, '2025-06-02 16:17:11', '2025-06-02 16:17:11'),
(408, 81, 77, 'ff', 'doctor', 'doctor', NULL, '2025-06-02 16:17:15', '2025-06-02 16:17:15'),
(409, 77, 81, 'hhhh', 'doctor', 'doctor', NULL, '2025-06-02 16:17:20', '2025-06-02 16:17:20'),
(410, 77, 81, 'hhhh', 'doctor', 'doctor', NULL, '2025-06-02 16:17:22', '2025-06-02 16:17:22'),
(411, 77, 81, 'jjj', 'doctor', 'doctor', NULL, '2025-06-02 16:17:25', '2025-06-02 16:17:25'),
(412, 81, 77, 'gg', 'doctor', 'doctor', NULL, '2025-06-02 16:17:26', '2025-06-02 16:17:26'),
(413, 81, 77, 'hi', 'doctor', 'doctor', NULL, '2025-06-02 16:17:42', '2025-06-02 16:17:42'),
(414, 70, 79, 'হ', 'doctor', 'patient', NULL, '2025-06-02 23:36:33', '2025-06-02 23:36:33'),
(415, 70, 79, 'হ', 'doctor', 'patient', NULL, '2025-06-02 23:36:34', '2025-06-02 23:36:34'),
(416, 70, 79, 'হক', 'doctor', 'patient', NULL, '2025-06-02 23:36:47', '2025-06-02 23:36:47'),
(417, 70, 85, 'কি', 'doctor', 'patient', NULL, '2025-06-02 23:37:29', '2025-06-02 23:37:29'),
(418, 70, 78, 'চ্যাট করা যাচ্ছে না', 'doctor', 'patient', NULL, '2025-06-02 23:42:11', '2025-06-02 23:42:11'),
(419, 78, 70, 'আমি তো আপনার ম্যাসেজ পাইছি', 'patient', 'doctor', NULL, '2025-06-03 00:22:14', '2025-06-03 00:22:14'),
(420, 78, 70, 'আমি তো আপনার ম্যাসেজ পাইছি', 'patient', 'doctor', NULL, '2025-06-03 00:22:17', '2025-06-03 00:22:17'),
(421, 81, 91, 'hi', 'doctor', 'patient', NULL, '2025-06-03 11:12:36', '2025-06-03 11:12:36'),
(422, 91, 81, 'hello', 'patient', 'doctor', NULL, '2025-06-03 11:12:47', '2025-06-03 11:12:47'),
(423, 114, 81, 'hi', 'student', 'doctor', NULL, '2025-06-03 17:21:10', '2025-06-03 17:21:10'),
(424, 82, 82, 'sdf', 'doctor', 'doctor', NULL, '2025-06-03 18:35:23', '2025-06-03 18:35:23'),
(425, 70, 92, 'ki problem', 'doctor', 'patient', NULL, '2025-06-03 23:27:14', '2025-06-03 23:27:14'),
(426, 92, 70, 'jor', 'patient', 'doctor', NULL, '2025-06-03 23:29:21', '2025-06-03 23:29:21'),
(427, 70, 92, 'ace khan', 'doctor', 'patient', NULL, '2025-06-03 23:29:36', '2025-06-03 23:29:36'),
(428, 92, 70, 'ok', 'patient', 'doctor', NULL, '2025-06-03 23:29:48', '2025-06-03 23:29:48'),
(429, 92, 70, 'ok', 'patient', 'doctor', NULL, '2025-06-03 23:31:34', '2025-06-03 23:31:34'),
(430, 92, 70, 'test', 'patient', 'doctor', NULL, '2025-06-03 23:32:25', '2025-06-03 23:32:25'),
(431, 92, 70, 'hggg', 'patient', 'doctor', NULL, '2025-06-03 23:33:10', '2025-06-03 23:33:10'),
(432, 70, 92, 'don\'t do that', 'doctor', 'patient', NULL, '2025-06-03 23:33:44', '2025-06-03 23:33:44'),
(433, 70, 92, 'don\'t do that', 'doctor', 'patient', NULL, '2025-06-03 23:33:48', '2025-06-03 23:33:48'),
(434, 92, 70, 'ki', 'patient', 'doctor', NULL, '2025-06-03 23:34:11', '2025-06-03 23:34:11'),
(435, 92, 70, 'na', 'patient', 'doctor', NULL, '2025-06-03 23:34:25', '2025-06-03 23:34:25'),
(436, 70, 92, 'ok', 'doctor', 'patient', NULL, '2025-06-03 23:34:44', '2025-06-03 23:34:44'),
(437, 70, 92, 'ki', 'doctor', 'patient', NULL, '2025-06-03 23:35:03', '2025-06-03 23:35:03'),
(438, 70, 92, 'ki', 'doctor', 'patient', NULL, '2025-06-03 23:35:05', '2025-06-03 23:35:05'),
(439, 70, 92, 'ki', 'doctor', 'patient', NULL, '2025-06-03 23:35:17', '2025-06-03 23:35:17'),
(440, 92, 70, 'no', 'patient', 'doctor', NULL, '2025-06-03 23:35:50', '2025-06-03 23:35:50'),
(441, 92, 70, 'hsg', 'patient', 'doctor', NULL, '2025-06-03 23:36:01', '2025-06-03 23:36:01'),
(442, 82, 114, 'ghg', 'doctor', 'student', NULL, '2025-06-04 10:44:24', '2025-06-04 10:44:24'),
(443, 70, 115, 'কতদিন থেকে', 'doctor', 'student', NULL, '2025-06-05 13:28:00', '2025-06-05 13:28:00'),
(444, 115, 70, 'তিন দিন থেকে', 'student', 'doctor', NULL, '2025-06-05 13:28:21', '2025-06-05 13:28:21'),
(445, 70, 115, 'আর কোন সমস্যা', 'doctor', 'student', NULL, '2025-06-05 13:28:39', '2025-06-05 13:28:39'),
(446, 115, 70, 'না', 'student', 'doctor', NULL, '2025-06-05 13:28:47', '2025-06-05 13:28:47'),
(447, 70, 78, 'have anyreport', 'doctor', 'patient', NULL, '2025-06-17 10:46:00', '2025-06-17 10:46:00'),
(448, 70, 79, 'any problem বলেন', 'doctor', 'patient', NULL, '2025-06-17 10:52:01', '2025-06-17 10:52:01'),
(449, 70, 114, 'any problem থাকলে বলেন', 'doctor', 'student', NULL, '2025-06-17 10:53:49', '2025-06-17 10:53:49'),
(450, 114, 70, 'hhh', 'student', 'doctor', NULL, '2025-06-17 10:54:04', '2025-06-17 10:54:04'),
(451, 81, 77, 'tt', 'doctor', 'doctor', NULL, '2025-06-17 16:07:59', '2025-06-17 16:07:59'),
(452, 81, 114, 'tt', 'doctor', 'student', NULL, '2025-06-17 16:09:19', '2025-06-17 16:09:19'),
(453, 81, 114, 'tt', 'doctor', 'student', '\"https:\\/\\/main.denterpro.com\\/storage\\/message_file\\/30421750155057.png\"', '2025-06-17 16:10:57', '2025-06-17 16:10:57'),
(454, 81, 114, NULL, 'doctor', 'student', '\"https:\\/\\/main.denterpro.com\\/storage\\/message_file\\/98761750155185.png\"', '2025-06-17 16:13:05', '2025-06-17 16:13:05'),
(455, 81, 114, NULL, 'doctor', 'student', '\"https:\\/\\/main.denterpro.com\\/storage\\/message_file\\/41751750155311.png\"', '2025-06-17 16:15:11', '2025-06-17 16:15:11'),
(456, 81, 114, 'a', 'doctor', 'student', NULL, '2025-06-17 16:47:51', '2025-06-17 16:47:51'),
(457, 81, 114, NULL, 'doctor', 'student', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/57771750160547.jpg\"', '2025-06-17 17:42:27', '2025-06-17 17:42:27'),
(458, 70, 79, NULL, 'doctor', 'patient', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/72301750161361.jpg\"', '2025-06-17 17:56:02', '2025-06-17 17:56:02'),
(459, 79, 70, NULL, 'patient', 'doctor', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/58591750161386.jpg\"', '2025-06-17 17:56:26', '2025-06-17 17:56:26'),
(460, 70, 79, NULL, 'doctor', 'patient', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/73361750161386.jpg\"', '2025-06-17 17:56:26', '2025-06-17 17:56:26'),
(461, 70, 79, NULL, 'doctor', 'patient', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/74621750161417.jpg\"', '2025-06-17 17:56:57', '2025-06-17 17:56:57'),
(462, 79, 70, NULL, 'patient', 'doctor', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/86801750161427.jpg\"', '2025-06-17 17:57:07', '2025-06-17 17:57:07'),
(463, 70, 79, NULL, 'doctor', 'patient', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/72971750161442.jpg\"', '2025-06-17 17:57:22', '2025-06-17 17:57:22'),
(464, 79, 70, NULL, 'patient', 'doctor', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/48421750228599.jpg\"', '2025-06-18 12:36:39', '2025-06-18 12:36:39'),
(465, 70, 79, NULL, 'doctor', 'patient', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/41271750344315.jpg\"', '2025-06-19 20:45:15', '2025-06-19 20:45:15'),
(466, 70, 79, NULL, 'doctor', 'patient', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/99221750344318.jpg\"', '2025-06-19 20:45:18', '2025-06-19 20:45:18'),
(467, 70, 79, NULL, 'doctor', 'patient', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/79841750344339.jpg\"', '2025-06-19 20:45:39', '2025-06-19 20:45:39'),
(468, 70, 96, 'আর কোন সমস্যা আছে নাকি', 'doctor', 'patient', NULL, '2025-06-19 22:08:48', '2025-06-19 22:08:48'),
(469, 96, 70, 'no', 'patient', 'doctor', NULL, '2025-06-19 22:09:15', '2025-06-19 22:09:15'),
(470, 81, 114, 'hi', 'doctor', 'student', NULL, '2025-06-22 11:50:08', '2025-06-22 11:50:08'),
(471, 70, 115, NULL, 'doctor', 'student', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/89261750743105.jpg\"', '2025-06-24 11:31:45', '2025-06-24 11:31:45'),
(472, 70, 115, NULL, 'doctor', 'student', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/41931750743140.jpg\"', '2025-06-24 11:32:20', '2025-06-24 11:32:20'),
(473, 70, 115, NULL, 'doctor', 'student', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/66301750743160.jpg\"', '2025-06-24 11:32:40', '2025-06-24 11:32:40'),
(474, 70, 82, 'থেকে মাথাব্যথা', 'doctor', 'patient', NULL, '2025-06-24 14:52:01', '2025-06-24 14:52:01'),
(475, 82, 70, '2days', 'patient', 'doctor', NULL, '2025-06-24 14:53:57', '2025-06-24 14:53:57'),
(476, 82, 70, '2days', 'patient', 'doctor', NULL, '2025-06-24 14:53:59', '2025-06-24 14:53:59'),
(477, 70, 82, 'মেনু বলেছে মাথায় কি উকুন হইছে', 'doctor', 'patient', NULL, '2025-06-24 14:54:28', '2025-06-24 14:54:28'),
(478, 82, 70, 'hmmm hoyce', 'patient', 'doctor', NULL, '2025-06-24 14:54:41', '2025-06-24 14:54:41'),
(479, 70, 82, 'চিকিৎসা দিচ্ছি', 'doctor', 'patient', NULL, '2025-06-24 14:54:52', '2025-06-24 14:54:52'),
(480, 82, 70, 'মেনুর বাপ এসে পরিস্কার করলেই হবে', 'patient', 'doctor', NULL, '2025-06-24 14:55:24', '2025-06-24 14:55:24'),
(481, 70, 96, NULL, 'doctor', 'patient', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/25241750953748.jpg\"', '2025-06-26 22:02:28', '2025-06-26 22:02:28'),
(482, 77, 81, 'hi', 'doctor', 'doctor', NULL, '2025-07-02 12:43:17', '2025-07-02 12:43:17'),
(483, 81, 77, 'hello', 'doctor', 'doctor', NULL, '2025-07-02 12:43:47', '2025-07-02 12:43:47'),
(484, 77, 81, NULL, 'doctor', 'doctor', '\"http:\\/\\/main.denterpro.com\\/storage\\/message_file\\/62321751438633.jpg\"', '2025-07-02 12:43:53', '2025-07-02 12:43:53'),
(485, 81, 77, 'hello', 'doctor', 'doctor', NULL, '2025-07-02 12:44:27', '2025-07-02 12:44:27'),
(486, 70, 92, 'চুলকানি কয়দিন থেকে', 'doctor', 'patient', NULL, '2025-07-04 12:42:47', '2025-07-04 12:42:47'),
(487, 70, 92, 'চুলকানি কয়দিন থেকে', 'doctor', 'patient', NULL, '2025-07-04 12:42:48', '2025-07-04 12:42:48'),
(488, 70, 102, 'itching', 'doctor', 'patient', NULL, '2025-07-07 20:04:35', '2025-07-07 20:04:35'),
(489, 70, 102, 'আছে', 'doctor', 'patient', NULL, '2025-07-07 20:04:40', '2025-07-07 20:04:40'),
(490, 102, 70, 'no', 'patient', 'doctor', NULL, '2025-07-07 20:05:09', '2025-07-07 20:05:09'),
(491, 102, 70, 'no', 'patient', 'doctor', NULL, '2025-07-07 20:05:11', '2025-07-07 20:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_28_060320_create_settings_table', 1),
(7, '2024_08_25_123750_create_permission_tables', 1),
(8, '2024_09_04_052124_create_sessions_table', 1),
(9, '2024_09_09_102427_create_app_setting_manages_table', 1),
(10, '2024_12_03_062925_create_sliders_table', 1),
(11, '2024_12_03_063047_create_books_table', 1),
(12, '2024_12_03_063124_create_jobs_table', 1),
(13, '2024_12_04_041540_create_patients_table', 1),
(14, '2024_12_04_055445_create_students_table', 1),
(15, '2024_12_04_065845_create_doctors_table', 1),
(16, '2024_12_05_035017_create_patient_problems_table', 1),
(17, '2024_12_05_061323_create_doctor_specialties_table', 1),
(18, '2024_12_07_064234_create_notifications_table', 1),
(19, '2024_12_07_083207_create_privacy_policies_table', 1),
(20, '2024_12_07_092349_create_feedback_table', 1),
(21, '2024_12_07_101637_create_contacts_table', 1),
(22, '2024_12_07_103305_create_videos_table', 1),
(23, '2024_12_08_034720_create_blogs_table', 1),
(24, '2024_12_08_081650_create_blog_comments_table', 1),
(25, '2024_12_08_101902_create_prescription_assists_table', 1),
(26, '2024_12_10_030943_create_diognostics_table', 1),
(27, '2024_12_10_072830_create_national_guide_lines_table', 1),
(28, '2024_12_10_085411_create_teenager_helps_table', 1),
(29, '2024_12_10_115729_create_quiz_manages_table', 1),
(30, '2024_12_10_115815_create_medicines_table', 1),
(31, '2024_12_10_115957_create_prescriptions_table', 1),
(32, '2024_12_11_034159_create_quiz_question_manages_table', 1),
(33, '2024_12_11_034444_create_quiz_question_ans_manages_table', 1),
(35, '2024_12_11_062509_create_prescription_assist_replays_table', 1),
(36, '2024_12_12_034848_create_antibiotic_guidelines_table', 1),
(37, '2024_12_18_070839_create_chronic_cares_table', 1),
(38, '2024_12_18_071632_create_female_health_guides_table', 1),
(39, '2024_12_18_071713_create_pregnant_mother_guides_table', 1),
(40, '2024_12_18_071739_create_skin_guides_table', 1),
(41, '2024_12_18_071901_create_diabetic_guides_table', 1),
(42, '2024_12_18_072336_create_kidney_guides_table', 1),
(43, '2024_12_18_072407_create_heart_guides_table', 1),
(44, '2024_12_18_072440_create_mentel_helth_guides_table', 1),
(45, '2024_12_18_073319_create_hepatic_guides_table', 1),
(46, '2025_03_24_062421_create_social_links_table', 2),
(47, '2025_03_24_071713_create_banners_table', 3),
(48, '2025_04_25_122421_create_live_news_table', 4),
(49, '2025_04_27_095315_create_quiz_results_table', 5),
(50, '2024_12_11_062143_create_message_manages_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `national_guide_lines`
--

CREATE TABLE `national_guide_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `national_guide_lines`
--

INSERT INTO `national_guide_lines` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Operational-manual-for-tuberculosis.', 'Operational-manual-for-tuberculosis.', 'guidelines/1750845742.pdf', 1, '2025-06-25 16:02:22', '2025-06-25 16:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `body`, `read`, `user_id`, `user_type`, `created_at`, `updated_at`) VALUES
(5396, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 61, 'doctor', '2025-06-25 16:33:41', '2025-06-25 16:33:41'),
(5397, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 70, 'doctor', '2025-06-25 16:33:41', '2025-07-22 17:46:52'),
(5398, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 77, 'doctor', '2025-06-25 16:33:42', '2025-07-02 12:37:40'),
(5399, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 80, 'doctor', '2025-06-25 16:33:42', '2025-06-25 16:33:42'),
(5400, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 81, 'doctor', '2025-06-25 16:33:42', '2025-07-20 10:21:54'),
(5401, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 82, 'doctor', '2025-06-25 16:33:42', '2025-07-10 12:16:01'),
(5402, 'Moinuddin', 'You have a new message', 0, 96, 'patient', '2025-06-26 22:02:30', '2025-06-26 22:02:30'),
(5403, 'hadi 1', 'You have a new message', 1, 81, 'doctor', '2025-07-02 12:43:18', '2025-07-20 10:21:54'),
(5404, 'Mr Doctor', 'You have a new message', 0, 77, 'doctor', '2025-07-02 12:43:49', '2025-07-02 12:43:49'),
(5405, 'hadi 1', 'You have a new message', 1, 81, 'doctor', '2025-07-02 12:43:56', '2025-07-20 10:21:54'),
(5406, 'Mr Doctor', 'You have a new message', 0, 77, 'doctor', '2025-07-02 12:44:29', '2025-07-02 12:44:29'),
(5407, 'Hi', 'Hello', 1, 81, 'doctor', '2025-07-02 12:46:23', '2025-07-20 10:21:54'),
(5408, 'New Quiz', 'Please perticepent this quiz', 1, 81, 'doctor', '2025-07-02 17:45:10', '2025-07-20 10:21:54'),
(5409, 'aa', 'bbb', 0, 77, 'doctor', '2025-07-02 17:56:35', '2025-07-02 17:56:35'),
(5410, 'New Quiz', 'Please perticepent this quiz', 0, 77, 'doctor', '2025-07-02 18:01:30', '2025-07-02 18:01:30'),
(5411, 'New Quiz', 'Please perticepent this quiz', 0, 77, 'doctor', '2025-07-02 18:01:48', '2025-07-02 18:01:48'),
(5412, 'New Quiz', 'Please perticepent this quiz', 1, 81, 'doctor', '2025-07-02 18:01:49', '2025-07-20 10:21:54'),
(5413, 'New Quiz', 'Quiz Start 03 Jul 2025, 05:39 PM', 0, 77, 'doctor', '2025-07-02 18:06:28', '2025-07-02 18:06:28'),
(5414, 'New Quiz', 'Quiz Start 03 Jul 2025, 05:39 PM', 1, 81, 'doctor', '2025-07-02 18:06:29', '2025-07-20 10:21:54'),
(5415, 'New Quiz', 'Quiz Start 04 Jul 2025, 06:08 PM', 0, 77, 'doctor', '2025-07-02 18:10:29', '2025-07-02 18:10:29'),
(5416, 'New Quiz', 'Quiz Start 04 Jul 2025, 06:08 PM', 1, 81, 'doctor', '2025-07-02 18:10:30', '2025-07-20 10:21:54'),
(5417, 'New Quiz', 'Quiz Start 04 Jul 2025, 09:37 AM', 1, 81, 'doctor', '2025-07-03 09:38:20', '2025-07-20 10:21:54'),
(5418, 'New Quiz', 'Quiz Start 04 Jul 2025, 09:37 AM', 0, 77, 'doctor', '2025-07-03 09:38:20', '2025-07-03 09:38:20'),
(5419, ' Quiz Update', 'Quiz Start 04 Jul 2025, 09:37 AM', 0, 77, 'doctor', '2025-07-03 09:40:44', '2025-07-03 09:40:44'),
(5420, ' Quiz Update', 'Quiz Start 04 Jul 2025, 09:37 AM', 1, 81, 'doctor', '2025-07-03 09:40:45', '2025-07-20 10:21:54'),
(5421, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 70, 'doctor', '2025-07-04 12:40:53', '2025-07-22 17:46:52'),
(5422, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 77, 'doctor', '2025-07-04 12:40:53', '2025-07-04 12:40:53'),
(5423, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 81, 'doctor', '2025-07-04 12:40:54', '2025-07-20 10:21:54'),
(5424, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 82, 'doctor', '2025-07-04 12:40:54', '2025-07-10 12:16:01'),
(5425, 'Moinuddin', 'You have a new message', 1, 92, 'patient', '2025-07-04 12:42:48', '2025-07-16 19:25:53'),
(5426, 'Moinuddin', 'You have a new message', 1, 92, 'patient', '2025-07-04 12:42:52', '2025-07-16 19:25:53'),
(5427, 'Report', 'জ্বর', 1, 92, 'patient', '2025-07-04 12:44:22', '2025-07-16 19:25:53'),
(5428, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 70, 'doctor', '2025-07-07 16:26:43', '2025-07-22 17:46:52'),
(5429, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 77, 'doctor', '2025-07-07 16:26:43', '2025-07-07 16:26:43'),
(5430, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 81, 'doctor', '2025-07-07 16:26:44', '2025-07-20 10:21:54'),
(5431, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 82, 'doctor', '2025-07-07 16:26:44', '2025-07-10 12:16:01'),
(5432, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 70, 'doctor', '2025-07-07 20:00:33', '2025-07-22 17:46:52'),
(5433, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 77, 'doctor', '2025-07-07 20:00:36', '2025-07-07 20:00:36'),
(5434, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 81, 'doctor', '2025-07-07 20:00:38', '2025-07-20 10:21:54'),
(5435, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 82, 'doctor', '2025-07-07 20:00:39', '2025-07-10 12:16:01'),
(5436, 'Moinuddin', 'You have a new message', 0, 102, 'patient', '2025-07-07 20:04:37', '2025-07-07 20:04:37'),
(5437, 'Moinuddin', 'You have a new message', 0, 102, 'patient', '2025-07-07 20:04:44', '2025-07-07 20:04:44'),
(5438, 'Md.Ahasan Habib', 'You have a new message', 1, 70, 'doctor', '2025-07-07 20:05:11', '2025-07-22 17:46:52'),
(5439, 'Md.Ahasan Habib', 'You have a new message', 1, 70, 'doctor', '2025-07-07 20:05:14', '2025-07-22 17:46:52'),
(5440, 'Report', 'fever', 0, 102, 'patient', '2025-07-07 20:05:42', '2025-07-07 20:05:42'),
(5441, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 70, 'doctor', '2025-07-13 12:50:39', '2025-07-22 17:46:52'),
(5442, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 77, 'doctor', '2025-07-13 12:50:40', '2025-07-13 12:50:40'),
(5443, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 81, 'doctor', '2025-07-13 12:50:40', '2025-07-20 10:21:54'),
(5444, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 82, 'doctor', '2025-07-13 12:50:40', '2025-07-13 12:50:40'),
(5445, 'Report', 'জ্বর', 0, 103, 'patient', '2025-07-13 12:57:02', '2025-07-13 12:57:02'),
(5446, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 70, 'doctor', '2025-07-13 18:20:37', '2025-07-22 17:46:52'),
(5447, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 77, 'doctor', '2025-07-13 18:20:42', '2025-07-13 18:20:42'),
(5448, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 1, 81, 'doctor', '2025-07-13 18:20:43', '2025-07-20 10:21:54'),
(5449, 'New case assigned to you', 'You have a new case assigned to you. Please review and complete it.', 0, 82, 'doctor', '2025-07-13 18:20:43', '2025-07-13 18:20:43'),
(5450, 'Report', 'বমি', 1, 92, 'patient', '2025-07-13 18:21:58', '2025-07-16 19:25:53'),
(5451, 'Report', 'বমি', 1, 92, 'patient', '2025-07-13 18:21:59', '2025-07-16 19:25:53'),
(5452, 'New Quiz', 'Quiz Start 22 Jul 2025, 05:03 PM', 1, 88, 'doctor', '2025-07-22 17:03:29', '2025-07-22 17:05:35'),
(5453, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 81, 'doctor', '2025-07-22 17:14:55', '2025-07-22 17:14:55'),
(5454, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 88, 'doctor', '2025-07-22 17:14:55', '2025-07-22 17:14:55'),
(5455, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 88, 'doctor', '2025-07-22 17:27:50', '2025-07-22 17:27:50'),
(5456, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 1, 70, 'doctor', '2025-07-22 17:45:33', '2025-07-22 17:46:52'),
(5457, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 77, 'doctor', '2025-07-22 17:45:34', '2025-07-22 17:45:34'),
(5458, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 81, 'doctor', '2025-07-22 17:45:34', '2025-07-22 17:45:34'),
(5459, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 82, 'doctor', '2025-07-22 17:45:34', '2025-07-22 17:45:34'),
(5460, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 84, 'doctor', '2025-07-22 17:45:34', '2025-07-22 17:45:34'),
(5461, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 85, 'doctor', '2025-07-22 17:45:35', '2025-07-22 17:45:35'),
(5462, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 86, 'doctor', '2025-07-22 17:45:35', '2025-07-22 17:45:35'),
(5463, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 87, 'doctor', '2025-07-22 17:45:35', '2025-07-22 17:45:35'),
(5464, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 88, 'doctor', '2025-07-22 17:45:35', '2025-07-22 17:45:35'),
(5465, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 89, 'doctor', '2025-07-22 17:45:35', '2025-07-22 17:45:35'),
(5466, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 90, 'doctor', '2025-07-22 17:45:36', '2025-07-22 17:45:36'),
(5467, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 91, 'doctor', '2025-07-22 17:45:36', '2025-07-22 17:45:36'),
(5468, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 81, 'doctor', '2025-07-23 09:55:03', '2025-07-23 09:55:03'),
(5469, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 81, 'doctor', '2025-07-23 09:57:30', '2025-07-23 09:57:30'),
(5470, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 88, 'doctor', '2025-07-23 09:57:30', '2025-07-23 09:57:30'),
(5471, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 81, 'doctor', '2025-07-23 10:24:02', '2025-07-23 10:24:02'),
(5472, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 81, 'doctor', '2025-07-23 10:24:27', '2025-07-23 10:24:27'),
(5473, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 88, 'doctor', '2025-07-23 10:24:27', '2025-07-23 10:24:27'),
(5474, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 77, 'doctor', '2025-07-23 10:26:06', '2025-07-23 10:26:06'),
(5475, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 81, 'doctor', '2025-07-23 10:26:06', '2025-07-23 10:26:06'),
(5476, ' Quiz Update', 'Quiz Start 22 Jul 2025, 05:03 PM', 0, 88, 'doctor', '2025-07-23 10:26:07', '2025-07-23 10:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('moyouuddin@gmail.com', '89678', '2025-04-25 11:39:34'),
('noel.kiehn@example.com', '62083', '2025-03-18 03:55:05'),
('p1@g.c', '50642', '2025-04-25 12:12:00'),
('tjfahim1997@gmail.com', '76675', '2025-03-03 09:29:04'),
('tuhindoctor@gmail.com', '12345', '2024-12-22 06:59:39'),
('zhhadi50@gmail.com', '32934', '2025-04-24 04:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `userType` varchar(255) NOT NULL DEFAULT 'patient',
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `notification_play` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `image`, `token`, `userType`, `password`, `address`, `dob`, `gender`, `medical_history`, `organization`, `occupation`, `notification_play`, `deleted_at`, `created_at`, `updated_at`) VALUES
(64, 'OMARfaruk', 'omorfaruk01312@gmail.com', '01314749671', NULL, 'ebXWR8cwSaeeJXoG1LfMHy:APA91bF6zkf_jDMKxGo-8C5fbM6rjHRsww79hMsPCBALffjfSSFwyRsPrGCH_YkyY9GnHW7a6YmLHRd-rL2XnM1o5DythGN4Xvk-AFdwrtfUduT1WPE1Lds', 'patient', '$2y$10$3F3s7v2hJoe8rptoES8IXO0y.VXNMcX.kK2azTrP4VUGyJrDAZoPu', 'dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-03-03 13:35:11', '2025-03-04 04:13:28'),
(67, 'MD Omar Faruk', 'omorfaruks@gmail.com', '0123799754', 'images/patients/1742452063.png', 'c8h7ia0OQdSr-bS-x1ip2A:APA91bGNnaLzpVJBA33mQSLTgW1mP8W6KjRYFBKKOPyV8Qevw-ma_iw2WoVd4vLoHfbmcxVlCAt191c9bxkfO6ijnSNJwnT9a18xc8SWDkzUtB30rVB-wao', 'patient', '$2y$10$smzd2gf4JcLow5ZvPaUV7uy2kNNPHS2d0r8yl0j4iv8EPzFP8T9Hi', 'dhaka', '2025-03-19', 'Male', 'dfd', NULL, NULL, 0, '2025-06-25 15:21:01', '2025-03-07 11:36:52', '2025-06-25 15:21:01'),
(70, 'Hadiuzzaman', 'zhhadi50@gmail.com', '01709842421', NULL, 'fqHIYLt2SoKZc_903_2rhS:APA91bFDDiyDcaulYifnXhGvOF6n23v9uCvLY8LGDEBdbBrOKZa7G73aNXbO-cO8ej8Qbuh01uFawz_LLG6wku-nepg6D_kR2HAkGKbtRo7zhnnDTz4s4-8', 'patient', '$2y$10$Brv8UouW2FGITJhNENoljea/iTaDfm/pGitCVMm6EENvQQ42oM6XS', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-03-24 08:39:07', '2025-06-30 13:20:34'),
(72, 'shihab', 'shihab00072@gmail.com', '01521240980', NULL, 'e1-OqmAoQjCuQfaOoubP8U:APA91bFBiBe4gUnBN1qW4Z8KFtLlugumt2SRV-Kea9eXSWKVU6D0S3VDJENuFbFxRwexGA2WGa_IIUZ7_ceL8KSi8vHwPZXGu9psXOnEW1GtvXjvLleXf1w', 'patient', '$2y$10$pE8nmk/iry9vx0mPDLJ5nONiJmo0XB7XzwegYu/bFR0XlwJWjY3Zu', 'khulna', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-03-24 13:14:18', '2025-03-24 13:14:37'),
(73, 'Rogan Ramos', 'jiryjydy@mailinator.com', '+1 (686) 247-3818', 'images/patients/1743924103_image.png', 'Aliqua Rem corrupti', 'patient', '$2y$10$UN2/USeO.Rc1dZJYK2PGYOGesexnH0EnxZf3mvb0tZPprN3fBrit6', 'Voluptate fuga Quid', '2011-08-26', 'male', 'Delectus ut est au', NULL, NULL, 1, '2025-04-10 06:45:13', '2025-04-06 07:21:43', '2025-04-10 06:45:13'),
(74, 'Hadi 1', 'ab@a.com', '01994258275', NULL, NULL, 'patient', '$2y$10$TH9npHUj6IjXBmz23otKHucrsr6r9b7zqNh8Ytq4M3IVuHg6vC7fi', 'dkaka', NULL, NULL, NULL, NULL, NULL, 1, '2025-04-20 04:10:03', '2025-04-10 07:07:11', '2025-04-20 04:10:03'),
(75, 'test 1', 'ab@b.com', '01799999999', NULL, NULL, 'patient', '$2y$10$eMZk/L0zenGZ8jsUByPZEunDCmyO2Pbva9XRNh2iTjt3pTKlcHvX2', 'Dhaha', NULL, NULL, NULL, NULL, NULL, 1, '2025-04-20 04:09:56', '2025-04-13 04:00:21', '2025-04-20 04:09:56'),
(76, 'a@@', 'a@a.c', '017542574564', NULL, 'cw78fJDGTn6nuGsTsH1L1k:APA91bGNSZYmwzo1K1F7Toz3RDDb6vprrPpDjWRGFZQ-Z1ObdgWxLHNDljCLy69ltQc53Hm5D1zpgATtrwQhJ0_1-U-swLGNxjVRsvx8hoRtn09ow0vcOWY', 'patient', '$2y$10$4ekPit/xTa6hDpbKbBtR7.6qjAP6E35N0h4Mgofe6Grw3n0rxy4RG', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, '2025-04-20 04:09:37', '2025-04-13 04:09:31', '2025-04-20 04:09:37'),
(77, 'omor', 'omortest@gmail.com', '1223444', NULL, 'f7IRH3R5QlK15-0rVlJY7p:APA91bENyf98vFxkyzQvqFkmPcReHuDLHP8Pa_GQaviWbIg45OrAtwyJpre-AH5-l72FdQggvjQCAgA14NTLDhsvAv-DzVjtbtrdZndou04kyBvTpMfZmmA', 'patient', '$2y$10$bWCSQQgDXtWrTWDVjzp4pO7XVlx7nv4Q07svHTL9KGPO4JXJY/e.K', 'dhaka', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-25 15:21:24', '2025-04-15 15:51:58', '2025-06-25 15:21:24'),
(78, 'Syed Sajib', 'syedsajib@gmail.com', '01518933113', NULL, 'ebCB6BZKSXWgdF0A4GF3O2:APA91bGQyVCSLST9Vd8InQSE6VJOfc_j1eHgsdMvwTwfLw_C__d3hAaBsENvBiSVb81XeuYaf-9NyhUQ19Fdn7Os-9oPW6hlKHuZdlUOW8sP3hQ1W_YTyzU', 'patient', '$2y$10$D4TCKL0myB2CFtD4WmDHtO9axPDfShc0lRkjMdLBZsuc9ORXEWqBm', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-04-20 04:03:44', '2025-07-16 12:46:35'),
(79, 'Hadiuzzaman', 'p1@g.c', '01742786524', 'images/patients/1750231098.jpg', 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'patient', '$2y$10$F0ZOFGe4Zu2/DyoToVgOEe5RKi7N1ww81soq1PySogjJ75QHRAlga', 'Meherpur', '2025-06-18', 'Male', NULL, NULL, NULL, 1, NULL, '2025-04-20 06:32:01', '2025-07-20 17:00:08'),
(80, 'patient 2', 'p2@g.c', '01555', NULL, 'cgOo9Rr_QMqwrG0opgIs8V:APA91bEN2c8U_80WptGEhDEKCIKSgnG1d3-zejaDeN2JR_Jg4YnjuLI71VtQtQHIcDU4weXgs2PZpgwfWGWKXLw2zo37BpBNTSQclTD9xQLckj072IaPn3c', 'patient', '$2y$10$Q1EBCpm1F8h5o3mtjkRMk.WB25cKlatGitzdfjF/WOmTD6cq6YCF.', 'ggh', NULL, NULL, NULL, NULL, NULL, 1, '2025-05-08 00:27:02', '2025-04-20 08:14:24', '2025-05-08 00:27:02'),
(81, 'Patient', 'p2@gmail.com', '23424234', NULL, 'fo6kZXSXSEye0sKx8hb9qT:APA91bF8u9fx8nRNZl3tJABtaBKOPk4IvoUkzC39vYofs9c9XZGRh15oJyiXh8pg15NnF1GV8n_Fn9-yzZMhVX9x5RsGVC_5GZeaRmskM0vg5kKcKPzxgx8', 'patient', '$2y$10$wJa8932WJ71IqGbxKqxAhOgr0JlDFkIqydtFhdULBLiGiGSzTkVrC', 'dhaka', '2025-06-13', 'male', NULL, NULL, NULL, 1, '2025-06-25 23:46:32', '2025-04-24 01:18:38', '2025-06-25 23:46:32'),
(82, 'Rema', 'fusionyouth643@gmail.com', '01796519467', NULL, 'd1-ZfyAVQTu86t3Zzmjwki:APA91bGuv_xxZV40sILYuKTGr9elXhK1KAHcx_itA8wGigfNQ2qVUFbzpfrnGH6RISffWVaW7AfQlnWPv2qUhwNcLOUmd4BEOGSnJWLspM-tHNs1lxNzJ7U', 'patient', '$2y$10$NvRVoaa0jpo8WXLC0IxeWeVf5e8/R6Ovm06wCM7tu153jY.fqzfie', 'dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-05-04 09:05:09', '2025-06-24 14:11:43'),
(83, 'Tanzim', 'tanzimkhuna69@gmail.com', '01329741904', NULL, 'epSYj9ajSryW8YItwAgXBe:APA91bGu7nXraoDReMQlKmnQ_RsizzVS57H3CiHm-A0kzMl-1yUoVlBWjYiTTWkG0tfnL1EmRQKcR5alP3w0Qh5giulMPD6N80H4QNbaq-F9iV3EmK-Jm1U', 'patient', '$2y$10$vaQLXRqihPoJF4t6gl5M5.gS69E97bf107YQkutED7xGQacs2SU7S', 'dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-05-12 09:56:34', '2025-05-27 11:57:55'),
(85, 'Madhob', NULL, '01313493934', NULL, 'cnKJ2zyAR-u90-19R-3gXV:APA91bEL9aINMZ-Cq_yd5StUEko6qGIm6cdi3SA-I5NLaz8jiJcdQQCcx-8lDYEAg1klIGM37TUJsJn2sxIG7ErOG4DiupvTTXz0oWmPAn1L3y5REgx2STA', 'patient', '$2y$10$GmMi7uia2fES0X2pT27tJulYvQh8D0TUuDNcmpE8ovrUGdH0ttFey', 'dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-05-12 10:21:19', '2025-05-27 12:35:33'),
(86, 'Shoheb Rana', NULL, '01979661408', NULL, 'f6h6VeAuRF67EOqVp7rM2B:APA91bH8ItQQuYlv6ehE4_AZfqLmCL6Snh4851jTqulck8DARrwIhMBD1xA-y-YCPfeFZE1-9LCZ4QSl2zKmbh_tQg4Z11W84dy8orWBoFqTJOYNqiOALb8', 'patient', '$2y$10$MNMyqU66ptFlJq4hIl8wZOB8iUYqu8YqSdrWC/InSA3fh/SD2lyC2', 'dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-05-13 09:46:33', '2025-05-13 09:57:56'),
(87, 'Md Abdullah Al Masum', NULL, '01761171704', NULL, 'eOJbC0ewThC2hmy2vg788P:APA91bFHVCxrJHElgeAHUlE0HEfsXNWrxrtd9A8mHHbZvf3GunuIKQPo4yUvVrT-bD67EzvCbt9LWkPr1Gyb01dgaM434iU37BwCFyW2jjlimseDB4UGR-c', 'patient', '$2y$10$.MByJNblDoE.rKKtIMvZoe7aefDHlbigJIdfv8DZpqy6AWKw.i8DK', 'dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-05-28 12:43:42', '2025-05-28 12:44:07'),
(88, 'Md.Nurnabi', NULL, '01752929714', NULL, 'dq2ja64aQ2CLf0ZW68HHgt:APA91bHQ3eL2gA5Ga3NOVlfZH6AJJu-lbfrYA_8h7pPCn-Bi2FuvmCf6rEaxAgFSsQ3VwOOiBblM9W1vfn2N0b6ZvarIWJRhPXg03i4YqYAQrlNIOFSGjs0', 'patient', '$2y$10$fg0qrNdZmAD0Zi0niXg2SO187j6edwNV5oTtoI0QFK9TwO7j.m3jq', 'Dhanmondi', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-06-02 12:11:03', '2025-06-02 12:24:23'),
(89, 'Riad', NULL, '01813690890', NULL, NULL, 'patient', '$2y$10$maLLe2oEAJVEiqVLtZfJl.XAnyLZfWe3MwGig5UHr54LMttO2FJnm', 'Chattogram', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-06-02 13:02:46', '2025-06-02 13:02:46'),
(90, 'Hadiuzzaman', NULL, '0174444444', NULL, NULL, 'patient', '$2y$10$HUVHBv8OqdSvdjkgKz0uAOKL3FYZDXsqWgCIDoSkBV2fhbAzDZjW2', 'p20@g.c', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-25 23:47:17', '2025-06-03 11:08:36', '2025-06-25 23:47:17'),
(91, 'pt', NULL, '9999', NULL, 'fvKleAKjT7SZv35NSi6J1b:APA91bGts0wDLTOBBRUFmmrGpPBpAtmad8LE6u4a43MLGC38rsoPGP8FAQ-ozAg6urA9BJV5z1J6AZAumb9eLSWfARvBSrULpFdwoom4naS7GjMAxqtld1w', 'patient', '$2y$10$RwAhzFKpLlEiL2Rq8TWbxuiMjG8aNkj3DuOUjwRoFNHVItfitQRgK', 'shymoli', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-25 15:19:39', '2025-06-03 11:10:40', '2025-06-25 15:19:39'),
(92, 'Khaza', NULL, '01708481110', NULL, 'e8nVx_zYShGFnK-H95MTAO:APA91bEO_0x7VGPDES9H_WqAY7mz_eFiLQqB9ZKh6QQpLxlPqfG2kRSZHQrHjeu_ws6anKulIsbj0fCd9ujsi9vdBRHPz8UfZ7-04beDb--Ts6rh93L4sQQ', 'patient', '$2y$10$Ja9L1jpEV5eS6TfXsKBYaON3yluZD0V1mMiWe7mQmSrTLeaJt/fI6', 'dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-06-03 23:19:19', '2025-07-13 18:17:19'),
(93, 'francisca vicario', 'franciscavicario@2ml09451353298', '09451353298', NULL, NULL, 'patient', '$2y$10$HxOT/gwqmDAV9fkOhJ9FB.z5z9X5jwW.MaQPQRXyH0f3du9qdvRbO', 'santa rosa laguna', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-25 15:20:21', '2025-06-06 04:43:20', '2025-06-25 15:20:21'),
(94, 'zainul abedeen', NULL, '9548377322', NULL, NULL, 'patient', '$2y$10$gJ0IE2zSaP6VSSYPd7Ze5uxZWayIlqbBum4ronOs8xxR.hlCIn7Wu', 'moradabad', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-06-13 22:34:41', '2025-06-13 22:34:41'),
(95, 'p@g.c', 'p@g.c', '1234', 'images/patients/1750231408.jpg', 'drr7rXNLTfmyLgaV2nmWUz:APA91bHI3MJFIkl_wRYwx2FZKYTDaGB7gIFFyu4tkessoyCd2H2gIpkWrGjsR5xKDU-rSjFb7fjKBNG44WvhdQ_pM51HjgpqrpI8lWafjhUaf6uUuNMFz-M', 'patient', '$2y$10$ypXIwMw7Fk.U71H2VNmziu6Yp41nKZAlueksnhEydzGNJDf0Q/GaG', 'sad', '2025-06-18', 'Female', 'sdfg', NULL, NULL, 1, '2025-06-25 23:46:15', '2025-06-18 13:22:31', '2025-06-25 23:46:15'),
(96, 'Md Tanveer Huda', NULL, '01752061136', NULL, 'cXQQQQCfSAWe55PTwAqdry:APA91bHlndyeH2hy6HtQghesjc2PSypnV8NAIA8Lx4MGfjI1BmUOdY6SsLEQr__dqIDfIQPW36dqIG5dNFPn5vTP9fnS3h07cjXUMDqy74SYNMoGqrqbzWo', 'patient', '$2y$10$hQQjaNyk5LKdswSIOgVGJetDKYMXyMeux/WbipdMZAmtG8NgDS1Hy', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-06-19 22:05:25', '2025-06-19 22:06:29'),
(97, 'Md Nayemor Rahman', NULL, '01798121792', NULL, 'eFQRgmTDQVKJmSLFU8z021:APA91bHLnjDqxx92xnul3Mv6BygY0eSWL7HHOIWVhpas9uoG6E0aZ1P3lI1XmgWzRmDy7iAk6UnZDRvwr7NwvMBJDxcmyEmnYKX-2m7MTOzp2j03cBDXmVI', 'patient', '$2y$10$INljNkU6UwJVxrziEbbif.1PV6VYPzWtRowz37EtOItqBJjc6T76u', 'chuadanga', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-06-19 22:17:40', '2025-06-19 22:18:03'),
(98, 't', 't@t.c', '666666', NULL, 'dnQrI9faRfGjWUfoWV-nky:APA91bFkyb4XeLjE4unXqMssIpEwoJk85Xy6E_Z4BLsKpkLut0eOH_QLYpGrSqVyFg1bFpE4FytwUYz1ZM0omaTUlx9HVg5_tw5PfxPaZ8HsjJ8sJ6Yx-zk', 'patient', '$2y$10$.9vQHS/5i9cDoPJU3af8J.SVZm22GA/.oMMSm/H73LwhF9LN1Pkdy', 'hh', '2025-06-25', 'Male', 'ggyy', NULL, NULL, 1, '2025-06-25 23:45:50', '2025-06-25 15:55:27', '2025-06-25 23:45:50'),
(99, 'Jabed', NULL, '01832780931', NULL, 'ctpn4WF0T2yn84LVHs7X7Z:APA91bE8NM5LlA6ajzcFuOMziDNY6d-J_cYSAr3TRfmZbNqyRWQLJqcxH8YlLCYSphl5YxEsy5XxprFXbIA8sgWHNWoc_oyt1gW5yJDt-P3AqK7shUxGnNY', 'patient', '$2y$10$wPVq83sXjjcpDis9TtcXPOMpHlKuylgu7zMNVETnwT.3yMyPzCGSO', 'Dhaka, Bangladesh', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-06-27 01:32:16', '2025-06-27 01:32:44'),
(100, 'Shakib', NULL, '01308831689', NULL, 'd3F3tbCPShqEWoPmhnTspL:APA91bH8qxQpztr6h62AYFMTLuqPzlWzhcw_aM8tPUJ7Q-i5MiX5vzVcZ4YL9XL8oXqh9kvlnkv8lHWZLWEcCAgIDk-WBcWYYw3fdhQAVgKnU_GiV_ns_98', 'patient', '$2y$10$rxVpRwFTtWnXTJFFs3/vwuQl.92/y303RQFZChvcnan9zAMEQpIx2', 'Dinajpur', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-06-27 05:21:28', '2025-06-27 05:21:44'),
(101, 'Masum Billah', NULL, '01339630364', NULL, NULL, 'patient', '$2y$10$J.oAPtZcL3w2nwXNOBUbHOcDgxR4Pys6YyHZWuUk8HmPhuUfz5UZu', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-02 19:59:02', '2025-07-02 19:59:02'),
(102, 'Md.Ahasan Habib', NULL, '01722344523', NULL, 'cq5ousI9TMiVHwd3YkEh6b:APA91bGtnTCPV3llcKpgxYQpO44oX6rjb6n19F0VgjEIm87sWJxnafpsQ8smVnE0OPnJzDgP5Qjp_d4I9PK5AtwGNiJ7AfUEl1qqhdrv5f1WYYbOy_reaSQ', 'patient', '$2y$10$Clut0C2Iq9MyUoVOSzRx5uEMTAvPWYU.8itqw9ywi1K/NrE0PeNLS', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-07 19:57:53', '2025-07-07 19:58:14'),
(103, 'lokman hosen sujon', NULL, '01712825789', NULL, 'dBSUN5hcTpuqTcQiZyzVhp:APA91bE9KOE7AiJJSTjFzVkjKU-FkQJbdI2FW8iWjfOgSUxWQEdVlkHVU6KgsygVQUQPBWL_TC_Rd3waTlBGp8R8UijN1xRxQ6NqfzMadv9TsJHF5Zlcm7s', 'patient', '$2y$10$Cudsc70D9JWgPi15OrjKQO8IBARHqQMe3B7VFGcXVB8jBACZyJE2u', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-13 12:48:39', '2025-07-13 12:48:56'),
(104, 't1', NULL, '123456', NULL, 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'patient', '$2y$10$3c1EqbRPQWPbPa3/2ZxD1uP3YH9X4.myCPmxnimXNwdEBMFHYdzX.', 'Khulna', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-20 11:17:57', '2025-07-20 11:18:13'),
(105, '11', NULL, '11', 'images/patients/1753009450.jpg', 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'patient', '$2y$10$f.ZJlTpq6oy8X6Xs4mFcY.gDuEdgCHgc2lRA6LsJRjfzd5vjB1p0i', 'Brahmanbaria', '2025-07-15', 'Female', NULL, NULL, NULL, 1, NULL, '2025-07-20 17:01:11', '2025-07-20 17:04:10'),
(106, 'ff', NULL, '88', NULL, NULL, 'patient', '$2y$10$0WYU6wJDY35HGhC54KAFn.vPye7lt0Q14tSOp/HacbbBAQuwgxMHS', 'Chattogram', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-21 10:52:12', '2025-07-21 10:52:12'),
(107, '12', NULL, '12', NULL, NULL, 'patient', '$2y$10$rU5Djdz4PVuono9zkz5J4.RBcLx.RQY/H8O1TPvfBlfjWglFhWZ.y', 'Chattogram', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-21 10:52:46', '2025-07-21 10:52:46'),
(108, '121212', NULL, '121212', NULL, 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'patient', '$2y$10$gmb1IkMU9bxE54cakuT7tO6rcNf6FDDWiSsUJhpqPnBuOkJkNTEfm', 'Chapai Nawabganj', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-21 10:53:27', '2025-07-21 10:53:51'),
(109, '1122', NULL, '1122', NULL, NULL, 'patient', '$2y$10$08jTON3r/9UVxoONvAQwhuaWfxXCGIptTScHuJrOmPY/lNgUif8ba', 'Chattogram', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-21 10:54:27', '2025-07-21 10:54:27'),
(110, '53432', NULL, '3453', NULL, NULL, 'patient', '$2y$10$etK5hmHd1D2Ja5LiX2sQeum2C1mmlzguUa7Uir3O9M8ujO22TTtIy', 'Dhaka', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-21 10:55:19', '2025-07-21 10:55:19'),
(111, 'gg', NULL, '3434', NULL, NULL, 'patient', '$2y$10$/h1r82Tcl69GHgK3WEIO1.YyjBfquzP8caUdxUJ9mRJdUb6bTjIgS', 'Comilla', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-07-21 10:58:14', '2025-07-21 10:58:14'),
(112, '55', 'fdfd@d.c', '55', NULL, 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'patient', '$2y$10$gGHioBTdNoSV2IyIzeLJOuNQ5xpu4qH4er5SJYLibwdpJoUggJDSS', 'Chapai Nawabganj', '2025-07-02', NULL, NULL, NULL, NULL, 1, NULL, '2025-07-21 12:17:28', '2025-07-21 12:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `patient_problems`
--

CREATE TABLE `patient_problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `problem` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_problems`
--

INSERT INTO `patient_problems` (`id`, `name`, `age`, `gender`, `number`, `image`, `problem`, `patient_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Dominic Sauer', 40, 'female', '573-248-8050', 'https://via.placeholder.com/640x480.png/00ccbb?text=people+Patient+fuga', 'Et aut vel est quam et tempore illum in libero.', 2, 1, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(2, 'Jazmyn Huels', 70, 'male', '938.782.9101', 'https://via.placeholder.com/640x480.png/0033aa?text=people+Patient+voluptas', 'Harum nesciunt sit eaque consectetur consequuntur fugiat numquam fuga voluptatibus ipsa.', 3, 4, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(3, 'Katelyn Heaney', 19, 'male', '(412) 794-6851', 'https://via.placeholder.com/640x480.png/000022?text=people+Patient+culpa', 'Blanditiis quasi dolor maiores sunt et aut.', 3, 5, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(4, 'Mrs. Providenci Wintheiser Sr.', 43, 'male', '803-933-4961', 'https://via.placeholder.com/640x480.png/0077aa?text=people+Patient+doloribus', 'Dolore ullam dolore ea similique repellat voluptatem eligendi officiis cumque dicta debitis.', 3, 7, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(5, 'Armani Mitchell', 21, 'other', '484-868-0746', 'https://via.placeholder.com/640x480.png/00bbdd?text=people+Patient+ratione', 'Soluta sed quam et cum consequatur dolorem eum ipsum perspiciatis.', 3, 8, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(6, 'Gabriella Goyette', 72, 'female', '601-350-0156', 'https://via.placeholder.com/640x480.png/0088ee?text=people+Patient+voluptatem', 'Libero esse iusto est sapiente molestias laboriosam recusandae.', 4, 11, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(7, 'Miss Josefa Fritsch', 100, 'female', '(605) 499-3055', 'https://via.placeholder.com/640x480.png/00eecc?text=people+Patient+deserunt', 'Earum nulla molestias consequatur tempore odit consectetur aliquid magni id est enim enim.', 4, 12, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(8, 'Dr. Susan Satterfield III', 43, 'male', '+1.260.456.5462', 'https://via.placeholder.com/640x480.png/00ccaa?text=people+Patient+amet', 'Corporis ipsam facere perferendis sint in numquam veritatis et quam.', 4, 13, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(9, 'Dominique Kihn', 54, 'other', '+17727597820', 'https://via.placeholder.com/640x480.png/00aaaa?text=people+Patient+sit', 'Minima qui qui sed beatae rem corporis architecto ratione quia autem fugit et.', 4, 15, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(10, 'Dorian Trantow PhD', 91, 'female', '564.897.3829', 'https://via.placeholder.com/640x480.png/00dd00?text=people+Patient+velit', 'Perspiciatis fugiat quae est fugit quia veniam iste ea quod.', 5, 17, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(11, 'Dr. Juliana Rempel II', 8, 'other', '(404) 359-0766', 'https://via.placeholder.com/640x480.png/00cc33?text=people+Patient+sint', 'Aspernatur possimus maiores ut molestiae accusantium delectus.', 5, 19, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(12, 'Deangelo Gislason', 5, 'male', '+15416128314', 'https://via.placeholder.com/640x480.png/009911?text=people+Patient+non', 'Blanditiis vitae mollitia blanditiis velit aliquam dolor.', 5, 21, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(13, 'Velva Kshlerin', 83, 'female', '(256) 738-8891', 'https://via.placeholder.com/640x480.png/00ee99?text=people+Patient+eos', 'Et inventore omnis maxime rem consequatur dolores repellat tenetur.', 6, 22, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(14, 'Kira Zemlak', 40, 'female', '361-947-3280', 'https://via.placeholder.com/640x480.png/0033cc?text=people+Patient+vel', 'Error rerum in sit qui a tempore totam.', 7, 23, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(15, 'Kaylah Harvey', 89, 'male', '+1-820-590-7540', 'https://via.placeholder.com/640x480.png/00ff22?text=people+Patient+illo', 'Praesentium voluptatem quaerat deleniti eveniet ut et animi.', 8, 28, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(16, 'Dr. Mateo Ledner', 10, 'female', '1-848-290-1258', 'https://via.placeholder.com/640x480.png/00ccee?text=people+Patient+sed', 'Et molestiae enim odio aut fuga rem placeat velit unde saepe quo.', 8, 32, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(17, 'Mr. Fabian Sporer', 55, 'female', '+1-818-949-5480', 'https://via.placeholder.com/640x480.png/00aadd?text=people+Patient+voluptates', 'Et veniam dolore officiis alias ex sed.', 8, 34, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(18, 'Irma Schumm', 34, 'other', '364-789-2260', 'https://via.placeholder.com/640x480.png/008855?text=people+Patient+qui', 'Aut facere labore optio doloremque itaque reiciendis quas exercitationem.', 9, 38, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(19, 'Emilia Metz', 77, 'other', '531-569-6498', 'https://via.placeholder.com/640x480.png/009955?text=people+Patient+enim', 'Unde incidunt voluptas esse id dolor et qui amet eos.', 9, 40, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(20, 'Austen VonRueden', 47, 'male', '+1.985.212.4064', 'https://via.placeholder.com/640x480.png/0000bb?text=people+Patient+ipsum', 'Occaecati rerum incidunt maxime id exercitationem et ex ducimus rerum sunt totam.', 9, 41, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(21, 'Malika Russel II', 95, 'female', '331.738.7451', 'https://via.placeholder.com/640x480.png/002299?text=people+Patient+modi', 'Quia vel placeat omnis delectus laborum omnis.', 10, 47, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(22, 'Asa Durgan', 83, 'female', '+1.202.766.1320', 'https://via.placeholder.com/640x480.png/0055ee?text=people+Patient+aut', 'Eos in eum iusto laudantium placeat optio totam voluptas et consequatur architecto quaerat.', 10, 51, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(23, 'Christa Hill', 30, 'other', '283.899.4626', 'https://via.placeholder.com/640x480.png/00ff99?text=people+Patient+ut', 'Similique culpa et at saepe quasi et odit fugit.', 10, 1, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(24, 'Emerson Bernhard V', 27, 'male', '1-917-208-3654', 'https://via.placeholder.com/640x480.png/0000ee?text=people+Patient+assumenda', 'Repellendus dolorem aut quo nam magni qui officiis quis perferendis sit aut eum.', 11, 4, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(25, 'Dr. Lucious Witting PhD', 90, 'other', '+14637196137', 'https://via.placeholder.com/640x480.png/0066ff?text=people+Patient+quia', 'Quae deleniti eius mollitia maxime autem maiores nemo aperiam beatae qui.', 11, 5, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(26, 'Nannie Hayes', 15, 'male', '+17758095138', 'https://via.placeholder.com/640x480.png/006677?text=people+Patient+numquam', 'Nam tenetur necessitatibus at suscipit ipsum sed.', 11, 7, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(27, 'Alexanne Wolf', 81, 'female', '(231) 780-0611', 'https://via.placeholder.com/640x480.png/0011ee?text=people+Patient+totam', 'Ut omnis accusamus perspiciatis cupiditate quibusdam et ut velit mollitia amet pariatur.', 12, 8, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(28, 'Mrs. Dianna Skiles IV', 95, 'other', '(210) 704-1069', 'https://via.placeholder.com/640x480.png/003399?text=people+Patient+explicabo', 'Dicta dolores eius sit magnam inventore ut culpa aliquid ut.', 12, 11, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(29, 'Lionel Wunsch IV', 19, 'other', '(470) 804-3504', 'https://via.placeholder.com/640x480.png/001177?text=people+Patient+consectetur', 'Quia repellat ipsam nemo sit eligendi cum itaque nulla explicabo sed blanditiis voluptas.', 12, 12, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(30, 'Cedrick Botsford', 3, 'other', '+17276173074', 'https://via.placeholder.com/640x480.png/0077dd?text=people+Patient+earum', 'Eveniet libero deserunt omnis tempora nobis optio atque nobis similique quisquam illo quia quia.', 12, 13, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(31, 'Prof. Kody McClure V', 80, 'female', '+12122874689', 'https://via.placeholder.com/640x480.png/007700?text=people+Patient+aut', 'Ut accusantium animi aut veritatis cupiditate dolorem sunt dolores.', 12, 15, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(32, 'Rollin Schamberger', 31, 'male', '(623) 457-4100', 'https://via.placeholder.com/640x480.png/006677?text=people+Patient+omnis', 'Sunt est nihil doloribus placeat et optio incidunt.', 13, 17, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(33, 'Jonatan Cruickshank', 9, 'male', '1-541-820-1759', 'https://via.placeholder.com/640x480.png/00ccdd?text=people+Patient+ipsum', 'Consequatur quibusdam totam qui minus maiores harum nam et repudiandae quis.', 13, 19, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(34, 'Mrs. Camila Littel III', 21, 'other', '1-636-778-4922', 'https://via.placeholder.com/640x480.png/00aaaa?text=people+Patient+consequatur', 'Modi voluptas veritatis praesentium quo earum et.', 13, 21, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(35, 'Velda Franecki', 18, 'male', '615-870-8771', 'https://via.placeholder.com/640x480.png/00dd00?text=people+Patient+alias', 'Impedit in consequatur ducimus non deleniti voluptatibus dolorem.', 13, 22, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(36, 'Raquel Shanahan', 85, 'male', '+1 (319) 544-5815', 'https://via.placeholder.com/640x480.png/0000dd?text=people+Patient+quaerat', 'Voluptatem hic molestiae accusantium voluptatem incidunt maxime est.', 13, 23, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(37, 'Leila Jaskolski', 23, 'male', '539.657.7845', 'https://via.placeholder.com/640x480.png/0011aa?text=people+Patient+quo', 'Animi fugit voluptatem totam ex debitis dolor.', 14, 28, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(38, 'Alexandrine Beatty', 20, 'other', '860-694-0266', 'https://via.placeholder.com/640x480.png/008855?text=people+Patient+magni', 'Alias deleniti sit neque et nobis voluptas autem animi odit.', 14, 32, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(39, 'Terence Watsica', 87, 'female', '325-700-0058', 'https://via.placeholder.com/640x480.png/00ff66?text=people+Patient+non', 'Quos aut fugit placeat dicta et beatae nesciunt est aliquam enim.', 14, 34, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(40, 'Brielle Tromp Sr.', 92, 'female', '(267) 626-5528', 'https://via.placeholder.com/640x480.png/009944?text=people+Patient+sunt', 'Molestias doloribus et molestiae itaque officiis esse voluptas delectus corrupti et.', 16, 38, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(41, 'Wilburn Rodriguez', 96, 'other', '+1 (385) 210-1679', 'https://via.placeholder.com/640x480.png/009900?text=people+Patient+consequatur', 'Eaque animi iste doloribus harum sunt quos numquam natus similique.', 16, 40, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(42, 'Arno Greenfelder', 86, 'male', '906.939.0488', 'https://via.placeholder.com/640x480.png/000000?text=people+Patient+cumque', 'Facere autem quae fuga dolores beatae ullam consequatur et itaque quae vel veritatis.', 16, 41, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(43, 'Charlie Klocko', 49, 'female', '+1-657-747-4205', 'https://via.placeholder.com/640x480.png/009988?text=people+Patient+id', 'Ducimus temporibus odit ipsam est provident voluptatem debitis est.', 17, 47, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(44, 'Ike Jacobi', 51, 'male', '(618) 590-3074', 'https://via.placeholder.com/640x480.png/000022?text=people+Patient+consequatur', 'Cupiditate illo qui ad velit consequuntur consequatur sint dolores eum nam incidunt.', 18, 51, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(45, 'Gustave Wilkinson', 8, 'other', '+1-310-693-0657', 'https://via.placeholder.com/640x480.png/000055?text=people+Patient+quam', 'Ex voluptatem non neque dolorem alias ea corrupti est consequatur.', 19, 1, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(46, 'Anastacio Toy', 67, 'male', '(847) 691-2563', 'https://via.placeholder.com/640x480.png/00ddff?text=people+Patient+beatae', 'Aliquam eaque odio eligendi incidunt aliquam et debitis consequatur et sint error rerum.', 19, 4, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(47, 'Donato Romaguera', 29, 'male', '1-678-772-5672', 'https://via.placeholder.com/640x480.png/0033cc?text=people+Patient+odio', 'Et et nam alias architecto ut corrupti quam a vel dolor facere reprehenderit maiores quis.', 19, 5, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(48, 'Jovan Gislason', 93, 'other', '+1-937-424-2500', 'https://via.placeholder.com/640x480.png/00eecc?text=people+Patient+quo', 'Cumque nihil quae maxime quisquam deleniti quasi ea magni recusandae architecto excepturi sapiente et.', 19, 7, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(49, 'Mr. Brice Roob V', 82, 'other', '541-536-5331', 'https://via.placeholder.com/640x480.png/002299?text=people+Patient+dicta', 'Quod qui quod vitae suscipit culpa voluptatem.', 19, 8, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(50, 'Hailee Brekke', 2, 'other', '820-558-5307', 'https://via.placeholder.com/640x480.png/0088cc?text=people+Patient+consequuntur', 'Libero tenetur itaque aut consequatur autem alias.', 20, 11, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(51, 'Kassandra Ward', 43, 'other', '(734) 935-4582', 'https://via.placeholder.com/640x480.png/00dd77?text=people+Patient+accusantium', 'Neque nesciunt officiis beatae sapiente ut unde laborum.', 20, 12, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(52, 'Eli Dach', 82, 'male', '(907) 419-0404', 'https://via.placeholder.com/640x480.png/006666?text=people+Patient+ex', 'Explicabo corrupti asperiores nulla earum voluptas dolorem est esse non modi assumenda assumenda.', 20, 13, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(53, 'Albert DuBuque', 28, 'male', '+13808022875', 'https://via.placeholder.com/640x480.png/00cc33?text=people+Patient+natus', 'Cumque vero alias cum odio laboriosam ea architecto at ipsum optio unde id.', 20, 15, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(54, 'Dr. Mozelle Berge', 67, 'other', '(614) 879-9465', 'https://via.placeholder.com/640x480.png/00ee88?text=people+Patient+et', 'Molestiae incidunt sit et aut iste numquam enim quae repudiandae non.', 23, 17, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(55, 'Royce Murray DDS', 34, 'male', '+1-484-633-3117', 'https://via.placeholder.com/640x480.png/008800?text=people+Patient+est', 'Qui soluta est necessitatibus aut quos rerum dicta et.', 23, 19, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(56, 'Ericka Crist', 20, 'male', '+1.386.421.0842', 'https://via.placeholder.com/640x480.png/003333?text=people+Patient+et', 'Sed quae vitae aut neque repellat ut quam hic qui aut molestiae molestiae voluptas.', 23, 21, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(57, 'Brittany Kris', 95, 'female', '+1 (619) 289-3088', 'https://via.placeholder.com/640x480.png/008866?text=people+Patient+corporis', 'Rerum et animi veniam impedit reprehenderit omnis velit architecto velit ad quidem.', 25, 22, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(58, 'Dr. Joseph Schulist IV', 54, 'other', '+1-909-597-9224', 'https://via.placeholder.com/640x480.png/000011?text=people+Patient+ratione', 'Quis nam ut consectetur dicta eius unde neque qui nostrum placeat.', 25, 23, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(59, 'Desmond Torp', 72, 'male', '+1.973.770.3177', 'https://via.placeholder.com/640x480.png/00aacc?text=people+Patient+consequatur', 'Laboriosam est velit aperiam harum consectetur dolorum modi cum nihil praesentium aliquid.', 26, 28, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(60, 'Gaston O\'Hara', 54, 'other', '430.325.7171', 'https://via.placeholder.com/640x480.png/0055dd?text=people+Patient+enim', 'Quisquam reprehenderit nihil eos aperiam ipsa necessitatibus nobis harum.', 26, 32, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(61, 'Deon Davis', 22, 'other', '949-580-5166', 'https://via.placeholder.com/640x480.png/000033?text=people+Patient+cum', 'Consequatur repellendus voluptatem totam modi quia neque laborum quasi et.', 26, 34, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(62, 'Mr. Angus Lehner', 14, 'other', '531.879.4509', 'https://via.placeholder.com/640x480.png/00ddcc?text=people+Patient+animi', 'Ut voluptates expedita sit rem distinctio odit et enim minima voluptate ut.', 26, 38, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(63, 'Khalil Schmeler', 80, 'male', '215.388.9166', 'https://via.placeholder.com/640x480.png/00bb77?text=people+Patient+quis', 'Et voluptas libero quaerat sint harum est blanditiis architecto deleniti repellat rerum non.', 26, 40, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(64, 'Tiana Pollich Jr.', 69, 'female', '+18659548506', 'https://via.placeholder.com/640x480.png/008899?text=people+Patient+animi', 'Dolores doloremque ipsum natus voluptatibus quia necessitatibus exercitationem facilis eum eos.', 27, 41, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(65, 'Dr. Eldred Kozey Sr.', 13, 'female', '657-414-9809', 'https://via.placeholder.com/640x480.png/008844?text=people+Patient+qui', 'Voluptatem nesciunt est blanditiis dolor unde molestias sapiente temporibus sapiente possimus facilis fugit accusamus possimus.', 28, 47, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(66, 'Arvid Ferry PhD', 22, 'other', '1-689-366-6857', 'https://via.placeholder.com/640x480.png/00dd00?text=people+Patient+eligendi', 'Exercitationem ea illum nostrum accusamus nemo consectetur molestias ut iure sit unde nostrum.', 29, 51, '2024-12-18 01:37:33', '2024-12-18 01:37:33'),
(67, 'Mellie Mueller', 23, 'other', '+1-484-878-1680', 'https://via.placeholder.com/640x480.png/00bb22?text=people+Patient+incidunt', 'Et adipisci ut dolore et consectetur quia omnis.', 29, 1, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(68, 'Mrs. Ottilie Bechtelar', 62, 'female', '251.645.6586', 'https://via.placeholder.com/640x480.png/002222?text=people+Patient+laboriosam', 'Facilis quaerat non suscipit voluptas omnis quo sequi.', 29, 4, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(69, 'Adan Herman', 48, 'male', '657.395.2789', 'https://via.placeholder.com/640x480.png/00eeff?text=people+Patient+molestiae', 'Unde et ut autem et molestias aut dolore.', 30, 5, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(70, 'Nikko Feest', 29, 'other', '510.286.2884', 'https://via.placeholder.com/640x480.png/0077ff?text=people+Patient+velit', 'Ut mollitia aut vitae ipsam qui amet dolores enim quis.', 30, 7, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(71, 'Gisselle Leannon', 81, 'other', '(435) 265-3103', 'https://via.placeholder.com/640x480.png/00ee22?text=people+Patient+dolorum', 'Ab mollitia eaque eos ipsum et voluptatum dignissimos in nihil.', 30, 8, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(72, 'Ms. Isabell Schmitt', 77, 'male', '+1.854.374.9963', 'https://via.placeholder.com/640x480.png/00aabb?text=people+Patient+ea', 'Ut exercitationem nesciunt nulla optio minima et ea.', 30, 11, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(73, 'Kendall Bartoletti DVM', 57, 'female', '(640) 607-0300', 'https://via.placeholder.com/640x480.png/00eeff?text=people+Patient+qui', 'Consequatur temporibus et nostrum atque velit voluptatem nulla maiores sed fuga repellat.', 31, 12, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(74, 'Bette Hickle Jr.', 4, 'other', '+15022688444', 'https://via.placeholder.com/640x480.png/007722?text=people+Patient+aut', 'Temporibus laborum atque qui iusto alias minus sed doloremque nulla.', 31, 13, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(75, 'Cortney Feeney PhD', 49, 'other', '+1-434-434-0178', 'https://via.placeholder.com/640x480.png/008822?text=people+Patient+qui', 'Quasi cum enim magnam iusto sed voluptas dolorem qui voluptas ea quo.', 31, 15, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(76, 'Dr. Noel Schinner', 100, 'female', '1-339-554-2138', 'https://via.placeholder.com/640x480.png/007733?text=people+Patient+quo', 'Voluptatum et sed praesentium maiores quo quidem modi tempore cupiditate error sed in.', 31, 17, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(77, 'Loraine Ryan', 68, 'female', '(240) 630-1535', 'https://via.placeholder.com/640x480.png/000088?text=people+Patient+sed', 'Veniam enim rerum sit ab possimus quas omnis tempore eum facilis aspernatur corrupti.', 31, 19, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(78, 'Mrs. Adele Flatley DDS', 2, 'other', '+1-608-790-1737', 'https://via.placeholder.com/640x480.png/006666?text=people+Patient+sed', 'Voluptatem optio id quo est ut qui dolorem officiis dolorum.', 32, 21, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(79, 'Donna Skiles DDS', 16, 'other', '+1-240-609-0007', 'https://via.placeholder.com/640x480.png/00ffbb?text=people+Patient+nam', 'Consequatur sequi et ipsa sit et voluptas quas dolor tempore.', 32, 22, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(80, 'Kole Bogisich Jr.', 6, 'female', '330-846-4478', 'https://via.placeholder.com/640x480.png/00ff44?text=people+Patient+perspiciatis', 'Omnis sit facilis dolor dolorum amet nemo cum dignissimos neque cumque voluptates.', 32, 23, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(81, 'Sherman Dickinson', 96, 'male', '+14089084156', 'https://via.placeholder.com/640x480.png/000011?text=people+Patient+libero', 'Odit reiciendis reiciendis ut quibusdam deleniti voluptas magni non nostrum fugit magni.', 33, 28, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(82, 'Abner Boehm', 13, 'female', '+1-725-591-8450', 'https://via.placeholder.com/640x480.png/000022?text=people+Patient+dignissimos', 'Reprehenderit perspiciatis itaque officiis temporibus qui consequuntur architecto quae nihil dolor natus laboriosam animi vero.', 33, 32, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(83, 'Dr. Lou Schaden DVM', 83, 'male', '+17704389467', 'https://via.placeholder.com/640x480.png/0066bb?text=people+Patient+quos', 'Soluta reiciendis accusantium aut quasi id nam esse.', 34, 34, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(84, 'Marco Upton IV', 84, 'female', '+1.803.307.4272', 'https://via.placeholder.com/640x480.png/00cc66?text=people+Patient+est', 'Minus similique minima error hic cupiditate quas facilis sint occaecati in.', 34, 38, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(85, 'Keegan Mayer', 92, 'other', '971.298.6459', 'https://via.placeholder.com/640x480.png/00aaaa?text=people+Patient+quam', 'Qui ut provident est et adipisci minus voluptatem ut.', 34, 40, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(86, 'Prince Ritchie II', 53, 'male', '+1-956-429-7222', 'https://via.placeholder.com/640x480.png/0044ff?text=people+Patient+perspiciatis', 'Quis nobis enim facilis velit omnis eos ut atque facilis reprehenderit tenetur.', 34, 41, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(87, 'Melyna Hansen', 51, 'female', '(304) 663-6113', 'https://via.placeholder.com/640x480.png/000066?text=people+Patient+earum', 'Iste pariatur beatae nesciunt magni sapiente modi facilis.', 34, 47, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(88, 'Rafael Hauck', 75, 'female', '+18044193493', 'https://via.placeholder.com/640x480.png/0077cc?text=people+Patient+sunt', 'Consequatur et adipisci ut maxime quasi repellat est aut neque dicta.', 35, 51, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(89, 'Alvena Roob', 92, 'other', '+1-775-426-3927', 'https://via.placeholder.com/640x480.png/007777?text=people+Patient+eum', 'Eius incidunt accusamus quia iusto optio explicabo iste tempora sed aut quis.', 36, 1, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(90, 'Lauretta Wyman Jr.', 74, 'male', '270-202-2241', 'https://via.placeholder.com/640x480.png/00aabb?text=people+Patient+cumque', 'Aut impedit et voluptatem suscipit libero quas dolor quasi ullam unde.', 37, 4, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(91, 'Reilly Wiza', 67, 'other', '(509) 218-2487', 'https://via.placeholder.com/640x480.png/00eedd?text=people+Patient+cumque', 'Adipisci ipsum vel expedita laborum sequi numquam.', 37, 5, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(92, 'Heather Hickle Jr.', 23, 'other', '+1.312.853.8807', 'https://via.placeholder.com/640x480.png/0066bb?text=people+Patient+nulla', 'Corporis id cumque reprehenderit occaecati aut quia.', 37, 7, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(93, 'Miss Shany Botsford', 76, 'other', '+1-678-896-6926', 'https://via.placeholder.com/640x480.png/00bb22?text=people+Patient+laboriosam', 'Libero qui exercitationem fuga optio et blanditiis quae omnis temporibus laudantium nam possimus.', 37, 8, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(94, 'Griffin Cole', 21, 'male', '(316) 531-4641', 'https://via.placeholder.com/640x480.png/007744?text=people+Patient+omnis', 'Similique deleniti molestias quia molestiae eveniet quod perspiciatis id libero debitis facere explicabo.', 37, 11, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(95, 'Isac Lynch', 34, 'female', '432-967-0953', 'https://via.placeholder.com/640x480.png/006699?text=people+Patient+rerum', 'Consectetur ratione tempore est quis officia sint voluptas neque libero voluptas ipsam.', 38, 12, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(96, 'Heath Wolff', 72, 'other', '+1-540-707-2308', 'https://via.placeholder.com/640x480.png/002299?text=people+Patient+nam', 'Pariatur quidem repellendus quibusdam non in quis dicta est aut temporibus eum quidem magnam.', 38, 13, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(97, 'Raul Kreiger DDS', 51, 'other', '+1-574-214-9732', 'https://via.placeholder.com/640x480.png/00ff77?text=people+Patient+eligendi', 'Aut consectetur doloribus facere alias illum harum.', 38, 15, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(98, 'Aisha Kulas', 88, 'male', '+1-828-233-0441', 'https://via.placeholder.com/640x480.png/00ddff?text=people+Patient+et', 'Sed ipsa explicabo est maiores sed quidem quod repellat perferendis neque perspiciatis.', 38, 17, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(99, 'Mitchel Metz MD', 95, 'other', '+17378071324', 'https://via.placeholder.com/640x480.png/00ff55?text=people+Patient+soluta', 'Qui eos eum reiciendis est iste magnam aut totam error numquam dolorem.', 39, 19, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(100, 'Imogene Wunsch', 25, 'other', '+1-843-217-8670', 'https://via.placeholder.com/640x480.png/00aa55?text=people+Patient+molestiae', 'Cum mollitia nobis qui recusandae molestiae iusto totam rem nulla ut dolorem sed.', 39, 21, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(101, 'Mr. Shawn Daniel', 60, 'male', '+18728740402', 'https://via.placeholder.com/640x480.png/00ccbb?text=people+Patient+hic', 'Est illo distinctio cupiditate dolorem sed dolores id ea est repellat id.', 39, 22, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(102, 'Ludwig Terry III', 89, 'female', '1-423-431-2715', 'https://via.placeholder.com/640x480.png/007788?text=people+Patient+molestias', 'Quia doloremque voluptas quis quas ipsa excepturi ea inventore corrupti doloremque non laboriosam.', 40, 23, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(103, 'Kevon Conroy', 22, 'male', '320.300.0295', 'https://via.placeholder.com/640x480.png/00dddd?text=people+Patient+ut', 'Veniam iste ipsum voluptas quisquam et blanditiis architecto et.', 40, 28, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(104, 'Dexter Hammes', 41, 'female', '959-914-5922', 'https://via.placeholder.com/640x480.png/005511?text=people+Patient+fugiat', 'Tenetur et recusandae corrupti veritatis officiis odio.', 40, 32, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(105, 'Dr. Jovanny Hegmann', 93, 'other', '731-707-6631', 'https://via.placeholder.com/640x480.png/001177?text=people+Patient+aut', 'Sed autem quo sunt sed explicabo inventore officiis.', 40, 34, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(106, 'Ms. Lenna Lind II', 5, 'female', '(678) 650-1850', 'https://via.placeholder.com/640x480.png/005588?text=people+Patient+hic', 'Non consequuntur ut sed explicabo sunt consequuntur odit optio sapiente nihil quia.', 41, 38, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(107, 'Prof. Vada Johnston', 70, 'male', '+1-517-908-1239', 'https://via.placeholder.com/640x480.png/00aa44?text=people+Patient+totam', 'Voluptatem culpa et consequuntur perspiciatis fugit est est illo officiis eum doloremque dolorem voluptas.', 41, 40, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(108, 'Jeanette Streich', 48, 'female', '+1.972.401.6557', 'https://via.placeholder.com/640x480.png/005511?text=people+Patient+eos', 'Ut tempora et soluta est consectetur impedit commodi aperiam minima reiciendis eligendi.', 41, 41, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(109, 'Sonny Lang', 11, 'female', '(267) 768-0644', 'https://via.placeholder.com/640x480.png/00ff22?text=people+Patient+dolores', 'Ipsum nulla ratione architecto velit dignissimos sequi reiciendis natus.', 42, 47, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(110, 'Ozella Cormier', 94, 'other', '+1.901.673.6879', 'https://via.placeholder.com/640x480.png/005500?text=people+Patient+omnis', 'Praesentium molestiae tempore fuga impedit omnis dicta.', 42, 51, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(111, 'Dr. Brooklyn Rutherford', 21, 'male', '986-241-1396', 'https://via.placeholder.com/640x480.png/003355?text=people+Patient+esse', 'Magni enim odio nulla doloremque expedita quod nemo.', 42, 1, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(112, 'Berta Schneider', 93, 'female', '947-237-1178', 'https://via.placeholder.com/640x480.png/0066aa?text=people+Patient+doloribus', 'Sed aut dignissimos quos quo numquam quas dolorum harum vero ratione.', 42, 4, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(113, 'Tremaine Nolan', 62, 'other', '1-540-562-3927', 'https://via.placeholder.com/640x480.png/00aa22?text=people+Patient+aut', 'Dolore fugit optio ipsam voluptates voluptatum eum cumque minus error et quis dolorem.', 42, 5, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(114, 'Allie Jast', 63, 'other', '+1-667-418-4916', 'https://via.placeholder.com/640x480.png/00aa33?text=people+Patient+quod', 'Ut qui et voluptate molestias dolorum doloribus minus repellendus delectus.', 43, 7, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(115, 'Lois Nolan', 60, 'female', '(414) 356-6747', 'https://via.placeholder.com/640x480.png/004444?text=people+Patient+dicta', 'Ea et aperiam perspiciatis accusamus illum ea aliquam provident qui voluptatum quae et nemo.', 44, 8, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(116, 'Lillian Weimann DDS', 70, 'male', '+1.718.822.4488', 'https://via.placeholder.com/640x480.png/00bb55?text=people+Patient+fugit', 'Beatae aut est aut ipsam praesentium error.', 44, 11, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(117, 'Hildegard Block', 40, 'other', '(564) 919-1091', 'https://via.placeholder.com/640x480.png/000022?text=people+Patient+tempore', 'Et quia voluptatibus commodi quia quo impedit.', 44, 12, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(118, 'Gardner Stokes III', 75, 'other', '+1-325-452-9823', 'https://via.placeholder.com/640x480.png/0077aa?text=people+Patient+libero', 'Porro voluptate ducimus harum ab porro aut aut.', 44, 13, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(119, 'Verna Conroy PhD', 68, 'female', '561.754.6345', 'https://via.placeholder.com/640x480.png/00aa11?text=people+Patient+perferendis', 'Tempora quos id id nobis eveniet eveniet velit modi est laudantium non blanditiis.', 45, 15, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(120, 'Verla Lubowitz DDS', 77, 'male', '+1-657-459-6580', 'https://via.placeholder.com/640x480.png/00aa77?text=people+Patient+quod', 'Voluptatem cum placeat autem sit tempore doloribus facere.', 46, 17, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(121, 'Natalia Kuphal', 60, 'other', '+1 (770) 894-1261', 'https://via.placeholder.com/640x480.png/00ff11?text=people+Patient+quod', 'Qui impedit nostrum eum deserunt dolor eos sequi aut vero est sed unde.', 46, 19, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(122, 'Remington Green', 28, 'female', '+1.575.633.5000', 'https://via.placeholder.com/640x480.png/00ccbb?text=people+Patient+rerum', 'Quia incidunt aut nihil aspernatur itaque dolorem.', 46, 21, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(123, 'Johann Kub', 91, 'male', '+1.980.902.0713', 'https://via.placeholder.com/640x480.png/002233?text=people+Patient+eligendi', 'Inventore atque aut unde minus repellat quo tenetur quia.', 47, 22, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(124, 'Finn Cummings', 46, 'other', '424.251.3941', 'https://via.placeholder.com/640x480.png/00ccdd?text=people+Patient+enim', 'Non impedit eum magnam atque harum explicabo.', 47, 23, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(125, 'Kyleigh Renner', 41, 'other', '+1-458-775-2454', 'https://via.placeholder.com/640x480.png/003366?text=people+Patient+magni', 'Sit delectus commodi architecto dolorem totam et odit nam quas dicta ea.', 47, 28, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(126, 'Dr. Adrain Collier Sr.', 90, 'female', '+1-364-324-0984', 'https://via.placeholder.com/640x480.png/00bb55?text=people+Patient+ut', 'Odit eos consequuntur consequatur aliquam sit consequatur sequi voluptatem voluptas quia et recusandae omnis.', 47, 32, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(127, 'Mr. Florian Hudson', 89, 'other', '229-555-2043', 'https://via.placeholder.com/640x480.png/00eedd?text=people+Patient+pariatur', 'At quos ducimus at cum illum odio optio id fugit qui a.', 47, 34, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(128, 'Carol Hermann', 82, 'female', '651-515-9722', 'https://via.placeholder.com/640x480.png/002288?text=people+Patient+praesentium', 'Facilis perspiciatis necessitatibus aut consectetur aut id facilis repudiandae rerum quibusdam officiis sit impedit.', 48, 38, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(129, 'Benedict Wintheiser DDS', 28, 'male', '940.789.8131', 'https://via.placeholder.com/640x480.png/00ee44?text=people+Patient+enim', 'Consequuntur quis recusandae ea itaque quas officia iste sed laborum nostrum sed ducimus eius.', 48, 40, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(130, 'Dr. Kaylah Lang II', 10, 'other', '469-993-2903', 'https://via.placeholder.com/640x480.png/006600?text=people+Patient+dolorum', 'Pariatur iure modi tempore excepturi ut beatae.', 48, 41, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(131, 'Bridie Huels', 44, 'female', '+1.405.610.1813', 'https://via.placeholder.com/640x480.png/00cccc?text=people+Patient+ipsum', 'Eos dolorem qui est omnis ipsum veritatis dolor possimus doloribus atque.', 49, 47, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(132, 'Prof. Leta Lubowitz Sr.', 77, 'female', '+1.310.765.0644', 'https://via.placeholder.com/640x480.png/003300?text=people+Patient+qui', 'Inventore repellendus excepturi qui et distinctio rem autem.', 49, 51, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(133, 'Mr. Buford Kuhlman', 30, 'other', '1-937-204-4280', 'https://via.placeholder.com/640x480.png/004400?text=people+Patient+non', 'Ut eum quisquam ut quisquam ab officiis cum.', 49, 1, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(134, 'Keyshawn Spinka', 20, 'male', '475-204-1598', 'https://via.placeholder.com/640x480.png/001166?text=people+Patient+asperiores', 'Sapiente cumque consectetur nihil optio qui reprehenderit aliquid.', 51, 4, '2024-12-18 01:37:34', '2024-12-18 01:37:34'),
(135, 'Lela Weimann', 84, 'other', '(712) 251-0896', 'https://via.placeholder.com/640x480.png/00ccee?text=people+Patient+exercitationem', 'Rerum quia magnam qui maiores culpa omnis voluptatem unde est ipsa.', 51, 5, '2024-12-18 01:37:34', '2024-12-18 01:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Patient', 1, 'auth_token', 'bec9e57455896123e6c778c7dd4526c0ea6090928eddecdfc4b0ddee382f50a8', '[\"*\"]', '2024-12-09 22:00:25', NULL, '2024-12-09 21:59:52', '2024-12-09 22:00:25'),
(2, 'App\\Models\\Doctor', 51, 'auth_token', '9963155ed891063db8e0abb36e05e55d948e8bff894c3d547a243a59ab7b4160', '[\"*\"]', '2024-12-09 22:10:43', NULL, '2024-12-09 22:01:22', '2024-12-09 22:10:43'),
(3, 'App\\Models\\Doctor', 51, 'auth_token', '950c443e0d8212ab6907ce1f0d4bbc78777cf3014d631b229303e1088ac28897', '[\"*\"]', '2024-12-10 06:06:07', NULL, '2024-12-10 04:29:43', '2024-12-10 06:06:07'),
(4, 'App\\Models\\Patient', 1, 'auth_token', 'bc04cf480e42c0d7bcb1818cd0519515f2dce3cc7491fb661d3ab0cd3eee506a', '[\"*\"]', '2024-12-10 09:43:59', NULL, '2024-12-10 04:30:32', '2024-12-10 09:43:59'),
(5, 'App\\Models\\Doctor', 51, 'auth_token', '82ceac1780f33c5f427ce420ff973af9db9fddda46b3d5cef1be502c4223a524', '[\"*\"]', '2024-12-10 09:13:20', NULL, '2024-12-10 06:13:04', '2024-12-10 09:13:20'),
(6, 'App\\Models\\Doctor', 51, 'auth_token', 'fa2231a676dad9082a363d334c6f1f0c616cf897adc0202cd3fa56ff02ae4c82', '[\"*\"]', '2024-12-10 07:30:05', NULL, '2024-12-10 06:15:03', '2024-12-10 07:30:05'),
(7, 'App\\Models\\Doctor', 51, 'auth_token', '42aa4a5ef8aa43757220b484c5938699ff75817c301bc40a7ee5bf463c59e18a', '[\"*\"]', '2024-12-11 04:23:08', NULL, '2024-12-10 06:20:47', '2024-12-11 04:23:08'),
(8, 'App\\Models\\Patient', 1, 'auth_token', '74dfc1f90d8699234b284ffdc59fcf6b08f5f4d0f7941d4aff36db8ff3161787', '[\"*\"]', '2024-12-10 09:19:49', NULL, '2024-12-10 09:16:49', '2024-12-10 09:19:49'),
(9, 'App\\Models\\Student', 101, 'auth_token', 'e3559d2632dc23ef2d4ebfc07a3a5b8bef12223c5c937007cc72d442349ab0cb', '[\"*\"]', '2024-12-11 05:20:08', NULL, '2024-12-10 09:25:02', '2024-12-11 05:20:08'),
(10, 'App\\Models\\Doctor', 51, 'auth_token', 'c6b42dfefee192066f18a2b761dfc2cf624624eaf20cbd1c7aafbf82922aa27d', '[\"*\"]', '2024-12-10 09:44:23', NULL, '2024-12-10 09:44:11', '2024-12-10 09:44:23'),
(11, 'App\\Models\\Doctor', 51, 'auth_token', '3b6810b869c094948c0efbf858962ec57724e971b1fb8be886fb9747b90d6575', '[\"*\"]', '2024-12-10 10:10:32', NULL, '2024-12-10 10:08:59', '2024-12-10 10:10:32'),
(12, 'App\\Models\\Student', 101, 'auth_token', '06ca5e342d8e924622148845aa3a546e9692b3e6f0146c0b6421534864109b87', '[\"*\"]', '2024-12-11 03:40:42', NULL, '2024-12-10 10:36:08', '2024-12-11 03:40:42'),
(13, 'App\\Models\\Patient', 1, 'auth_token', '79cb190b1e508be0589e7aad9ccad7dff102680b89e9ced33beae4c38a9f869a', '[\"*\"]', '2024-12-11 05:11:57', NULL, '2024-12-10 10:38:43', '2024-12-11 05:11:57'),
(14, 'App\\Models\\Patient', 1, 'auth_token', '42500168600b57d13c0b7860f83bdef0b31502be1c605254c4f94b8307317930', '[\"*\"]', '2024-12-11 06:08:08', NULL, '2024-12-11 04:35:25', '2024-12-11 06:08:08'),
(15, 'App\\Models\\Patient', 1, 'auth_token', '4209554233284c22c23005da6d744ffa8d704b82fe13f30d63015fe216872d14', '[\"*\"]', '2024-12-11 04:51:33', NULL, '2024-12-11 04:39:22', '2024-12-11 04:51:33'),
(16, 'App\\Models\\Doctor', 51, 'auth_token', 'eb20b3fe1a006fdc0f724925efeb5cb635b6bb3fbdf65534998c077c233176f2', '[\"*\"]', '2024-12-11 11:45:56', NULL, '2024-12-11 05:04:01', '2024-12-11 11:45:56'),
(17, 'App\\Models\\Patient', 6, 'auth_token', 'cb639b9b74f30fb9f05104ce7a577f08828a13f08f4c9acf5eeed9f55dfee851', '[\"*\"]', '2024-12-15 09:28:49', NULL, '2024-12-11 05:16:16', '2024-12-15 09:28:49'),
(18, 'App\\Models\\Patient', 1, 'auth_token', 'c481c40535fd529f8c814191ffad1f080db4e12839d74018faeae04fa42aa84e', '[\"*\"]', '2024-12-11 05:23:34', NULL, '2024-12-11 05:22:25', '2024-12-11 05:23:34'),
(19, 'App\\Models\\Patient', 6, 'auth_token', '08f669c6c8bee1263b11b37b564a6df1ea24b0dc2f73cb182da277fd7bf7daea', '[\"*\"]', '2024-12-11 05:42:21', NULL, '2024-12-11 05:25:47', '2024-12-11 05:42:21'),
(20, 'App\\Models\\Patient', 1, 'auth_token', 'afcf3245dd10967c1b7496deb2cf0b06901ff2d917a584adf9becc9d9ceda5cf', '[\"*\"]', '2024-12-11 08:53:36', NULL, '2024-12-11 05:28:17', '2024-12-11 08:53:36'),
(21, 'App\\Models\\Patient', 6, 'auth_token', '297769c8adb4cff0db3e1d5a8807f2089718458fac290f0733ca66a096bd8814', '[\"*\"]', '2024-12-11 06:51:48', NULL, '2024-12-11 06:26:22', '2024-12-11 06:51:48'),
(22, 'App\\Models\\Patient', 1, 'auth_token', 'b48c1a8aa9c46faae48be7b95e6d219be860178c4cd82832f87f16c31839ca5d', '[\"*\"]', '2024-12-11 07:01:07', NULL, '2024-12-11 06:35:55', '2024-12-11 07:01:07'),
(23, 'App\\Models\\Patient', 6, 'auth_token', '7ed2d5564d66cb8fe4dd1e85e043eddfcb4c6f5eb504da3d30ad3b44eaa00e6b', '[\"*\"]', '2024-12-11 13:38:34', NULL, '2024-12-11 06:59:23', '2024-12-11 13:38:34'),
(24, 'App\\Models\\Doctor', 51, 'auth_token', '462859c62c0ea4fc0cc754fe30e3a79a870d23f8a16656cfe032e04cf9496cc0', '[\"*\"]', '2024-12-11 07:01:43', NULL, '2024-12-11 07:01:39', '2024-12-11 07:01:43'),
(25, 'App\\Models\\Student', 101, 'auth_token', 'e18824aed119adc01a9ecec81f384d8b78a978b162987c09733abefa21035c11', '[\"*\"]', '2024-12-11 07:03:50', NULL, '2024-12-11 07:02:16', '2024-12-11 07:03:50'),
(26, 'App\\Models\\Patient', 1, 'auth_token', '8a4a17f1984bff7a5ddd944eef889a697d535291b5a7c472f246a100d1df4b93', '[\"*\"]', '2024-12-11 07:10:06', NULL, '2024-12-11 07:04:15', '2024-12-11 07:10:06'),
(27, 'App\\Models\\Student', 101, 'auth_token', '82e5b26f8785f3b67978c32d176d3002a22621987f8cad6880cde000435c81ba', '[\"*\"]', '2024-12-11 07:10:43', NULL, '2024-12-11 07:10:36', '2024-12-11 07:10:43'),
(28, 'App\\Models\\Doctor', 51, 'auth_token', 'dbbe46db1fd86b45826fde9d97be5e9f7f3651c0eb09d2a4087b534e9c018451', '[\"*\"]', '2024-12-11 07:17:37', NULL, '2024-12-11 07:11:08', '2024-12-11 07:17:37'),
(29, 'App\\Models\\Patient', 1, 'auth_token', 'f1f2eeb36f310c520f49452f099e25ffc794fe4706b579cc6a3835977faf7f63', '[\"*\"]', '2024-12-11 07:19:41', NULL, '2024-12-11 07:18:00', '2024-12-11 07:19:41'),
(30, 'App\\Models\\Student', 101, 'auth_token', 'f30797019076778f99177ea8da083893a022be1ac3456a7aa7d5dd6a583c61c7', '[\"*\"]', '2024-12-11 07:21:04', NULL, '2024-12-11 07:20:04', '2024-12-11 07:21:04'),
(31, 'App\\Models\\Patient', 1, 'auth_token', '5a839450c5b0da5ea41eed8761202919c3aff41cf340709e148579e4bdb35453', '[\"*\"]', '2024-12-11 07:27:14', NULL, '2024-12-11 07:21:30', '2024-12-11 07:27:14'),
(32, 'App\\Models\\Doctor', 51, 'auth_token', '3914030bdc3d837ae10a19858fe5755e1386e2f3da942e9f8021fe5d47b712b7', '[\"*\"]', '2024-12-11 07:41:24', NULL, '2024-12-11 07:27:34', '2024-12-11 07:41:24'),
(33, 'App\\Models\\Patient', 1, 'auth_token', 'e28d0763b55db028ce775add615d44d297aeddefa4c01930e4cc15d19190a084', '[\"*\"]', '2024-12-11 07:43:03', NULL, '2024-12-11 07:41:53', '2024-12-11 07:43:03'),
(34, 'App\\Models\\Doctor', 51, 'auth_token', 'dbb92a566dea64abe0a04071f9c88983142cce258c87081d7784de091840fd7f', '[\"*\"]', '2024-12-11 07:43:37', NULL, '2024-12-11 07:43:30', '2024-12-11 07:43:37'),
(35, 'App\\Models\\Student', 101, 'auth_token', '9fc4507f9b604614cb31bcd8b5247a9b443d8ed11d24f228693abd3666f9e73a', '[\"*\"]', '2024-12-11 11:09:31', NULL, '2024-12-11 07:43:57', '2024-12-11 11:09:31'),
(36, 'App\\Models\\Patient', 1, 'auth_token', '230c7817dfd997901b558138d2695a40e9d63b4938f6b62f183dc0c5212e2c5c', '[\"*\"]', '2024-12-11 09:16:52', NULL, '2024-12-11 09:11:56', '2024-12-11 09:16:52'),
(37, 'App\\Models\\Doctor', 51, 'auth_token', '2a4df79d0d74236a08f24eac2b8193b07cd12c38f12df19aa4c83e4e4a4ae53d', '[\"*\"]', '2024-12-11 10:31:14', NULL, '2024-12-11 09:25:56', '2024-12-11 10:31:14'),
(38, 'App\\Models\\Doctor', 51, 'auth_token', '1035888acb07632393d0cf1fe70bd6b3514c97fbaa5d3ad966d9695eb996fa3b', '[\"*\"]', '2024-12-11 11:05:51', NULL, '2024-12-11 10:47:37', '2024-12-11 11:05:51'),
(39, 'App\\Models\\Doctor', 51, 'auth_token', '1f0b5da25c30604b9a5233ace901aaab5aae49642d3f35d47d9da55b03ffaa9a', '[\"*\"]', '2024-12-11 11:31:03', NULL, '2024-12-11 11:10:10', '2024-12-11 11:31:03'),
(40, 'App\\Models\\Patient', 1, 'auth_token', '5e2b43625aac6ea1a7ff4374203cc467af3021b24c74cab0c0280f566db87893', '[\"*\"]', '2024-12-11 11:58:59', NULL, '2024-12-11 11:31:26', '2024-12-11 11:58:59'),
(41, 'App\\Models\\Patient', 1, 'auth_token', 'eedf0f2136716a2ce3cc24b6cc047c1987e819f4d5169fe33a28b5d1a7c84f6b', '[\"*\"]', '2024-12-12 04:26:14', NULL, '2024-12-11 11:47:15', '2024-12-12 04:26:14'),
(42, 'App\\Models\\Doctor', 51, 'auth_token', '06a4d36d209b9f05bc7d244898842c4f54e6d53b580ed30fd2b3f527045f2764', '[\"*\"]', '2024-12-12 04:07:13', NULL, '2024-12-11 11:59:33', '2024-12-12 04:07:13'),
(43, 'App\\Models\\Doctor', 51, 'auth_token', '0eea7bb4628f13f9db203f7885d3f0fb8b05ce106e913ca0d97ac5cfa9f16d4d', '[\"*\"]', '2024-12-11 12:20:25', NULL, '2024-12-11 12:18:44', '2024-12-11 12:20:25'),
(44, 'App\\Models\\Patient', 1, 'auth_token', '0e54f868300392eeecdf8ee6ab945f3f5b214aca7c25f445b65c23cc5626d2f9', '[\"*\"]', '2024-12-11 12:22:14', NULL, '2024-12-11 12:21:05', '2024-12-11 12:22:14'),
(45, 'App\\Models\\Patient', 1, 'auth_token', 'e32f2af8587b2d8d721f9bde0697822a7f23dcda1b4b8f53662b2d0f7fc6ab0e', '[\"*\"]', '2024-12-11 13:35:33', NULL, '2024-12-11 12:25:38', '2024-12-11 13:35:33'),
(46, 'App\\Models\\Patient', 1, 'auth_token', '863be143f7f93772003014ef2f6a6b7c2fa8060a54d50ea780bc586b5bf7f4b8', '[\"*\"]', '2024-12-11 12:28:07', NULL, '2024-12-11 12:26:20', '2024-12-11 12:28:07'),
(47, 'App\\Models\\Student', 101, 'auth_token', '6c421d73293bcfe1acb616ba75da3318ab94b2f863db8b40d19ca415a3ad84ae', '[\"*\"]', '2024-12-11 12:28:58', NULL, '2024-12-11 12:28:38', '2024-12-11 12:28:58'),
(48, 'App\\Models\\Doctor', 51, 'auth_token', '273629942fb317cf8155f82fe7207ca00be9af6098393685e178e67af06c9eef', '[\"*\"]', '2024-12-12 05:44:38', NULL, '2024-12-11 12:29:17', '2024-12-12 05:44:38'),
(49, 'App\\Models\\Doctor', 52, 'auth_token', '886d704dd33580caadfb5d27bcdcdfcba4b6e1b0c3584db300cdea85caacb3a9', '[\"*\"]', NULL, NULL, '2024-12-11 12:37:36', '2024-12-11 12:37:36'),
(50, 'App\\Models\\Student', 101, 'auth_token', '935f3bd5dae906b1dfc0fd04399afbd5fa577d9b5c6d3b810c3563201669ea7b', '[\"*\"]', '2024-12-11 17:29:52', NULL, '2024-12-11 12:38:30', '2024-12-11 17:29:52'),
(51, 'App\\Models\\Doctor', 51, 'auth_token', '51c58f5c3b999928a7720423e05ebe43f16887db57602abe7aaef827d4fd4102', '[\"*\"]', '2024-12-11 14:38:24', NULL, '2024-12-11 13:36:38', '2024-12-11 14:38:24'),
(52, 'App\\Models\\Patient', 1, 'auth_token', '4145c48884d04ed5de9efdf2eb96595143ec96de1a3c777d0fe6225880f0f198', '[\"*\"]', '2024-12-11 13:47:53', NULL, '2024-12-11 13:39:43', '2024-12-11 13:47:53'),
(53, 'App\\Models\\Doctor', 51, 'auth_token', '701efb59898a9babdffb10a01beb8f25ccc58fe001ddefb84201f561ecf7b5a8', '[\"*\"]', '2024-12-12 06:30:46', NULL, '2024-12-11 13:48:25', '2024-12-12 06:30:46'),
(54, 'App\\Models\\Patient', 1, 'auth_token', '4e063d363092465a17f3d83296c3d9007775e0d4fe3c3bb9d9c49a9b78282a41', '[\"*\"]', '2025-01-04 11:32:08', NULL, '2024-12-11 17:04:54', '2025-01-04 11:32:08'),
(55, 'App\\Models\\Patient', 1, 'auth_token', '3330c7b1703f5aec870650c0865cf6c52c215dcdb1c258947f09a34827137aa3', '[\"*\"]', '2024-12-11 17:48:42', NULL, '2024-12-11 17:48:20', '2024-12-11 17:48:42'),
(56, 'App\\Models\\Patient', 1, 'auth_token', 'b716e9c6dd77b61632c4be769f63b8d40b22aa8ee8ff4511272d823d7277612c', '[\"*\"]', '2024-12-12 04:07:50', NULL, '2024-12-12 04:07:37', '2024-12-12 04:07:50'),
(57, 'App\\Models\\Doctor', 51, 'auth_token', 'c741ce93afebcd7e8e3a0655c63f72a8d5098a03073cbbd7ab77b44122fc1c61', '[\"*\"]', '2024-12-12 06:28:43', NULL, '2024-12-12 04:08:30', '2024-12-12 06:28:43'),
(58, 'App\\Models\\Student', 101, 'auth_token', 'e19e64af3265caa037798e87e04583e59a13f8715b2a0b742ff3ee46b95363f8', '[\"*\"]', '2024-12-12 05:47:52', NULL, '2024-12-12 04:26:42', '2024-12-12 05:47:52'),
(59, 'App\\Models\\Patient', 1, 'auth_token', 'e06698a2ca7c8b25486c083ac2af7a583b281f98ad8682c0dff81023021a4d6c', '[\"*\"]', '2024-12-15 09:10:18', NULL, '2024-12-12 05:45:11', '2024-12-15 09:10:18'),
(60, 'App\\Models\\Patient', 1, 'auth_token', '5bd186c906bdf22ec65c8faee6d4349718edf69ae01d512e01aba62f21cdf569', '[\"*\"]', '2024-12-12 05:53:58', NULL, '2024-12-12 05:50:36', '2024-12-12 05:53:58'),
(61, 'App\\Models\\Doctor', 51, 'auth_token', '18745a7657fc051430aff94059d18cbc92c79ac9e09aced62fe09d5340b5fd5a', '[\"*\"]', '2024-12-12 05:55:57', NULL, '2024-12-12 05:55:51', '2024-12-12 05:55:57'),
(62, 'App\\Models\\Student', 101, 'auth_token', '49a0bba06e5b422e990ce075fe44bb5d9bba7ec1e4e7b8df79a5470a23c44416', '[\"*\"]', '2024-12-12 05:58:14', NULL, '2024-12-12 05:57:41', '2024-12-12 05:58:14'),
(63, 'App\\Models\\Doctor', 52, 'auth_token', '50ac35d28a23d354e8cf2b81162251e265f420e96f60b3e31bebfe4f3b6e4c45', '[\"*\"]', NULL, NULL, '2024-12-12 07:17:00', '2024-12-12 07:17:00'),
(64, 'App\\Models\\Doctor', 53, 'auth_token', '5dc35e445d823fbbea58bb9e1b0cf72b3cddfe877748593a228f76add8439f23', '[\"*\"]', NULL, NULL, '2024-12-12 07:24:56', '2024-12-12 07:24:56'),
(65, 'App\\Models\\Doctor', 54, 'auth_token', '4bfe3fda7dd0a4ee977dc649e545431682559d57d32867cf2acd6272cf1b58ca', '[\"*\"]', NULL, NULL, '2024-12-12 07:27:15', '2024-12-12 07:27:15'),
(66, 'App\\Models\\Doctor', 52, 'auth_token', '4ffea0fb1d65fb9b7646bb75aba0e9a2e6af4d2b0b3f5918cb0afa7c9458cead', '[\"*\"]', NULL, NULL, '2024-12-12 07:34:08', '2024-12-12 07:34:08'),
(67, 'App\\Models\\Doctor', 53, 'auth_token', 'f90376f505144329c1cad17d2b1f323ef5e1b2a56c97436e8b1439a4051a2988', '[\"*\"]', NULL, NULL, '2024-12-12 08:13:09', '2024-12-12 08:13:09'),
(68, 'App\\Models\\Doctor', 54, 'auth_token', '878353d602668d8368d20f1d9b8eea56abdbe738efa0f1302d1f6fbd50e8bb03', '[\"*\"]', NULL, NULL, '2024-12-12 08:16:36', '2024-12-12 08:16:36'),
(69, 'App\\Models\\Doctor', 55, 'auth_token', '7053e9d4010909628bb64e1ba98190b024ccdf9604e7b8e58ad65142a86e3ad5', '[\"*\"]', NULL, NULL, '2024-12-12 08:20:20', '2024-12-12 08:20:20'),
(70, 'App\\Models\\Doctor', 55, 'auth_token', '0dd37ec47a00a4fc5b1d0a096597c21063c3fb1ee5bf5dabd5f1aac46a84d9ad', '[\"*\"]', '2024-12-12 08:22:04', NULL, '2024-12-12 08:21:44', '2024-12-12 08:22:04'),
(71, 'App\\Models\\Doctor', 55, 'auth_token', 'e239674c886091649ba279e0647504199881df8351d9fb163d3120a279df4420', '[\"*\"]', '2024-12-12 08:23:52', NULL, '2024-12-12 08:22:39', '2024-12-12 08:23:52'),
(72, 'App\\Models\\Doctor', 55, 'auth_token', 'c9a62b294ecd2c2daf58bd219db21a93ed83080b0955bceb5f804673b2a423c3', '[\"*\"]', '2024-12-12 08:25:22', NULL, '2024-12-12 08:25:19', '2024-12-12 08:25:22'),
(73, 'App\\Models\\Doctor', 51, 'auth_token', '41b1cd77fa75ee88d3843bff67f44684bb20ac9bf8040dc812c6f0e9faab2dc8', '[\"*\"]', '2024-12-12 09:21:51', NULL, '2024-12-12 08:25:48', '2024-12-12 09:21:51'),
(74, 'App\\Models\\Student', 101, 'auth_token', 'c63d194f302ed4b1b1cb2802fee119364949b4caa44bdf8f12b0f3c88bc7a9c2', '[\"*\"]', '2024-12-12 09:52:26', NULL, '2024-12-12 09:22:15', '2024-12-12 09:52:26'),
(75, 'App\\Models\\Patient', 1, 'auth_token', '654219b384d0dc9eeba9fc413e292a73fec9cf216328d591965c782a917aad22', '[\"*\"]', '2024-12-12 09:53:20', NULL, '2024-12-12 09:52:53', '2024-12-12 09:53:20'),
(76, 'App\\Models\\Student', 101, 'auth_token', 'd8f730aaad5e721e5641a129f333e900cb56faa88ea01ed124f901ba5737381f', '[\"*\"]', '2024-12-12 09:55:53', NULL, '2024-12-12 09:54:47', '2024-12-12 09:55:53'),
(77, 'App\\Models\\Patient', 1, 'auth_token', '6c94c3583747adf79ea16281919200ce7893e68048bd3cf0d5c2c1528b8711e1', '[\"*\"]', '2024-12-12 09:56:26', NULL, '2024-12-12 09:56:16', '2024-12-12 09:56:26'),
(78, 'App\\Models\\Doctor', 51, 'auth_token', '18538f7979d7be44a3010199276ea6874c3fe1a755d36ff7ea94cd13adf5f597', '[\"*\"]', '2024-12-12 09:58:06', NULL, '2024-12-12 09:56:53', '2024-12-12 09:58:06'),
(79, 'App\\Models\\Doctor', 56, 'auth_token', '18c8eabbcccff9e71828f9a3439db217cf6ec4fa10a235ef08e4d4ba624edc2e', '[\"*\"]', NULL, NULL, '2024-12-12 09:59:06', '2024-12-12 09:59:06'),
(80, 'App\\Models\\Doctor', 56, 'auth_token', '0ca8cf312a216374b0e721b8621a387a3691cabbafb595cc911970d95b981d90', '[\"*\"]', '2024-12-12 09:59:40', NULL, '2024-12-12 09:59:36', '2024-12-12 09:59:40'),
(81, 'App\\Models\\Doctor', 57, 'auth_token', 'dc86b41c5657fda3f108941aba3c2dae84ad9b0aa52ab153645efdf9cf9470d6', '[\"*\"]', NULL, NULL, '2024-12-12 10:07:36', '2024-12-12 10:07:36'),
(82, 'App\\Models\\Doctor', 58, 'auth_token', 'b2552581532e84b8342d920f983161a537d5f8a7fd8d41bc8175df631cf267b3', '[\"*\"]', NULL, NULL, '2024-12-12 10:08:06', '2024-12-12 10:08:06'),
(83, 'App\\Models\\Doctor', 59, 'auth_token', '0e753e8058eccad15eec7cf2c6434e5dd522f7270c07aa3c8db1fa8ea5ea2aee', '[\"*\"]', NULL, NULL, '2024-12-12 10:10:34', '2024-12-12 10:10:34'),
(84, 'App\\Models\\Doctor', 60, 'auth_token', '9fd4a4ba4392b2d38cc25994b3beba1c9f3bb9ad405808ba6a8be201dd0a37f1', '[\"*\"]', NULL, NULL, '2024-12-12 10:12:07', '2024-12-12 10:12:07'),
(85, 'App\\Models\\Patient', 52, 'auth_token', 'f748cfa266adbc15558fd1d15510415a744cdc84f027b95a1948bac58bd9d3b2', '[\"*\"]', NULL, NULL, '2024-12-12 10:18:59', '2024-12-12 10:18:59'),
(86, 'App\\Models\\Student', 102, 'auth_token', 'a0b46973343459ac0ec9a9ac16ed5e5d5254ad926875e22c2e4d3e1ec44cd1e2', '[\"*\"]', NULL, NULL, '2024-12-12 10:21:14', '2024-12-12 10:21:14'),
(87, 'App\\Models\\Doctor', 51, 'auth_token', 'c7ad95d17f635622c0ee82675bd292ca0eb1afbdea8f7162b2beaaa388d01ee8', '[\"*\"]', '2024-12-12 10:33:27', NULL, '2024-12-12 10:23:07', '2024-12-12 10:33:27'),
(88, 'App\\Models\\Student', 101, 'auth_token', 'df7b380f7a0a95450955cfd7e22af0a7f2b2bc3490682ccc8944383a67af4d41', '[\"*\"]', '2024-12-12 11:01:42', NULL, '2024-12-12 10:33:51', '2024-12-12 11:01:42'),
(89, 'App\\Models\\Doctor', 51, 'auth_token', '162e1fe758811c83baa6c22415311b2387700bc27b7da8e1cc6cae20efd407a9', '[\"*\"]', '2024-12-14 05:28:03', NULL, '2024-12-12 11:05:55', '2024-12-14 05:28:03'),
(90, 'App\\Models\\Doctor', 51, 'auth_token', 'feae16c52c4f75114f0d96ed7e150eb054edfa9ca28d51447c60bf7d80ea5389', '[\"*\"]', '2024-12-12 11:06:32', NULL, '2024-12-12 11:06:15', '2024-12-12 11:06:32'),
(91, 'App\\Models\\Student', 101, 'auth_token', '906b12260ef3f7cd207ad6ebd45224fd11197f9dc0336e5ef8a9d857dbe87e23', '[\"*\"]', '2024-12-12 11:07:53', NULL, '2024-12-12 11:07:00', '2024-12-12 11:07:53'),
(92, 'App\\Models\\Doctor', 51, 'auth_token', '680d17425d9c63d58724428b7cd163f6d50d6e5c066838ab413a0b8cc3409649', '[\"*\"]', '2024-12-21 04:54:22', NULL, '2024-12-12 11:08:21', '2024-12-21 04:54:22'),
(93, 'App\\Models\\Doctor', 51, 'auth_token', '89cbb066dc1fac0d9ae43cca43ad0eb00bd66ec639d8ac781cf4acf8e4d41b44', '[\"*\"]', NULL, NULL, '2024-12-12 13:18:54', '2024-12-12 13:18:54'),
(94, 'App\\Models\\Doctor', 51, 'auth_token', '1907914f1e690cbd349aad0fe22de0ef9021d9c1a9f61c3e68d0c3489682c71f', '[\"*\"]', '2024-12-14 06:54:53', NULL, '2024-12-14 06:46:55', '2024-12-14 06:54:53'),
(95, 'App\\Models\\Student', 102, 'auth_token', 'ed84e320eb0a01d432b7f20d374c0d9eb95e5de3d14f86cd79a4681c00934b8f', '[\"*\"]', NULL, NULL, '2024-12-14 07:01:19', '2024-12-14 07:01:19'),
(96, 'App\\Models\\Doctor', 51, 'auth_token', 'b96a89679974b631d0a1af6881e518c7ed2d2b85d61fbbc691122af405a36b7f', '[\"*\"]', '2024-12-15 07:15:22', NULL, '2024-12-14 07:01:23', '2024-12-15 07:15:22'),
(97, 'App\\Models\\Student', 101, 'auth_token', 'a7b52de35c2926afb2bdb3d1f1d4c3fcc952d362c329027ca0cad0981746924c', '[\"*\"]', '2024-12-15 17:55:58', NULL, '2024-12-14 07:06:36', '2024-12-15 17:55:58'),
(98, 'App\\Models\\Patient', 52, 'auth_token', 'bd2fef08ecef3a3f1378d3fdc043b5a629d5d37621196dd7e7e03325d65ad917', '[\"*\"]', NULL, NULL, '2024-12-15 04:26:42', '2024-12-15 04:26:42'),
(99, 'App\\Models\\Patient', 52, 'auth_token', 'fef4763108dbd26f9aa52f4ac0d6691d206c7ac7942bb10a09d5db0f20edb7ef', '[\"*\"]', '2024-12-15 06:26:17', NULL, '2024-12-15 04:27:23', '2024-12-15 06:26:17'),
(100, 'App\\Models\\Patient', 1, 'auth_token', '329d5f1ecd295eb060c2628ce0fd8b2eaaa9965979f0dcf9cb4ef6b4332dfb07', '[\"*\"]', '2024-12-15 05:15:03', NULL, '2024-12-15 05:10:51', '2024-12-15 05:15:03'),
(101, 'App\\Models\\Doctor', 52, 'auth_token', '16be9058df2bf9fa284dac7aaea3d477972dd0bc2ff079e6f1f37bf3c9d84f74', '[\"*\"]', NULL, NULL, '2024-12-15 06:29:12', '2024-12-15 06:29:12'),
(102, 'App\\Models\\Doctor', 53, 'auth_token', 'c0bb960f1d0a46e24abeae68ff56d6567358fe4bcfab68b3af11c5a6229a681b', '[\"*\"]', NULL, NULL, '2024-12-15 06:30:03', '2024-12-15 06:30:03'),
(103, 'App\\Models\\Doctor', 53, 'auth_token', '2d5e4d00538f24be225f02ba07f782cdd338c14d0b49271fab642adfcac5de4a', '[\"*\"]', '2024-12-15 07:16:21', NULL, '2024-12-15 06:30:29', '2024-12-15 07:16:21'),
(104, 'App\\Models\\Student', 101, 'auth_token', '040c165a01db43a14643128439e3902c5186321c649934f4d28e9bf2cddfdd65', '[\"*\"]', '2024-12-26 13:38:09', NULL, '2024-12-15 07:15:43', '2024-12-26 13:38:09'),
(105, 'App\\Models\\Patient', 1, 'auth_token', 'd1d9f0d756ade06f7b93f3d142326728bb97fd1fac9f29eb134149be251ec671', '[\"*\"]', '2024-12-15 09:56:17', NULL, '2024-12-15 07:18:31', '2024-12-15 09:56:17'),
(106, 'App\\Models\\Patient', 1, 'auth_token', '0647425c694da8e33cf232f02918719612eb04f25650b634354b914f756b3f65', '[\"*\"]', '2024-12-15 09:42:36', NULL, '2024-12-15 07:19:14', '2024-12-15 09:42:36'),
(107, 'App\\Models\\Patient', 1, 'auth_token', '43f5a9f437a90cfd3ec597b2fcc7fb841d3383b4415a45a63a9e5b4cdb5e2add', '[\"*\"]', '2024-12-17 04:27:52', NULL, '2024-12-15 09:30:14', '2024-12-17 04:27:52'),
(108, 'App\\Models\\Doctor', 51, 'auth_token', 'c98290d1b6e2f31ad2f28c9daae70d7ceab8f16791aea8121ce99d8f68635e34', '[\"*\"]', '2024-12-17 05:38:53', NULL, '2024-12-15 09:42:54', '2024-12-17 05:38:53'),
(109, 'App\\Models\\Patient', 1, 'auth_token', '44f0651b9cba5ad8317e7195789be9bd92aa01b0b8055397c9f359d868d10dd2', '[\"*\"]', '2024-12-15 09:56:59', NULL, '2024-12-15 09:56:48', '2024-12-15 09:56:59'),
(110, 'App\\Models\\Doctor', 51, 'auth_token', '20bb1cd63a5abf7805720414f6578dd43b43b380eb4352617a6b17cdddea10bd', '[\"*\"]', '2024-12-17 11:15:02', NULL, '2024-12-15 09:57:34', '2024-12-17 11:15:02'),
(111, 'App\\Models\\Doctor', 51, 'auth_token', '5670e0ffc3b58bfa3ccf8c4658e831669d16719adeffe6f5d4d820a61123b49b', '[\"*\"]', '2024-12-17 10:08:04', NULL, '2024-12-17 04:28:12', '2024-12-17 10:08:04'),
(112, 'App\\Models\\Patient', 1, 'auth_token', '3fda7fe07abaddc8093c7546d67216ea3917081f474648847814b117d4b28b13', '[\"*\"]', '2024-12-17 05:58:18', NULL, '2024-12-17 05:39:29', '2024-12-17 05:58:18'),
(113, 'App\\Models\\Doctor', 51, 'auth_token', '1b401c1de4b80982a68204cacb3c6ab39b9caa2729a7577ce1fbb53ee2fcf22d', '[\"*\"]', '2024-12-17 09:43:11', NULL, '2024-12-17 05:58:41', '2024-12-17 09:43:11'),
(114, 'App\\Models\\Patient', 1, 'auth_token', 'b0a611bb62bae95754632253e2a4b319d70185bb180e25214b5a629a8407ff8c', '[\"*\"]', '2024-12-17 11:44:34', NULL, '2024-12-17 09:43:39', '2024-12-17 11:44:34'),
(115, 'App\\Models\\Patient', 1, 'auth_token', 'cfd1959270a36c2f2ddadc9a1b55a7ad632e73d729227e26c30f84c801239f02', '[\"*\"]', '2024-12-18 04:15:51', NULL, '2024-12-17 10:08:23', '2024-12-18 04:15:51'),
(116, 'App\\Models\\Patient', 1, 'auth_token', 'e1edd5b053b2f35c738a3f0266e0151f346220e379da13ba90431e3a10cbb36f', '[\"*\"]', '2024-12-18 04:52:22', NULL, '2024-12-17 11:27:44', '2024-12-18 04:52:22'),
(117, 'App\\Models\\Student', 101, 'auth_token', 'e69900dbeab6c778ac458e06347537e2fc46eaebd9f304126de3d2fe95c3d986', '[\"*\"]', '2024-12-17 11:45:26', NULL, '2024-12-17 11:45:06', '2024-12-17 11:45:26'),
(118, 'App\\Models\\Doctor', 51, 'auth_token', 'd004e8c4f6e2af523fd57dae2cd97f539375bd9980c1034684124ec450b4590a', '[\"*\"]', '2024-12-18 07:04:45', NULL, '2024-12-17 11:45:47', '2024-12-18 07:04:45'),
(119, 'App\\Models\\Doctor', 51, 'auth_token', '4094525972461fda1dfcf650bfea41a42ddb100aa202fa758b963821eb1b9148', '[\"*\"]', '2024-12-18 04:31:00', NULL, '2024-12-18 04:30:53', '2024-12-18 04:31:00'),
(120, 'App\\Models\\Patient', 1, 'auth_token', '0269a2dda47c2780611206ea0e64fdac77fcbfafc6cd8033b04d7ae3696f28c0', '[\"*\"]', '2024-12-18 04:52:47', NULL, '2024-12-18 04:35:20', '2024-12-18 04:52:47'),
(121, 'App\\Models\\Doctor', 51, 'auth_token', 'e795aa7f0c8caaa41bc77d596c552bdcebf9f00e34a4d2ab74788a76c720404e', '[\"*\"]', '2024-12-18 06:54:23', NULL, '2024-12-18 05:36:18', '2024-12-18 06:54:23'),
(122, 'App\\Models\\Patient', 1, 'auth_token', '458f7f02e8ab55a56158324a0bd18ed9761991ff1a41529b50de86eceb991b75', '[\"*\"]', '2024-12-18 07:04:21', NULL, '2024-12-18 07:04:18', '2024-12-18 07:04:21'),
(123, 'App\\Models\\Patient', 1, 'auth_token', 'd9b190eed7fa82eb066d4d5f0a6321241662c8d4368b00cbcbb6e9aa5b011de3', '[\"*\"]', '2024-12-19 05:08:51', NULL, '2024-12-18 07:05:18', '2024-12-19 05:08:51'),
(124, 'App\\Models\\Doctor', 52, 'auth_token', '262020ec7d7b9299352152447ebb43fa5b8587ea4abbd340a97d1f867d6b2bac', '[\"*\"]', NULL, NULL, '2024-12-18 12:23:10', '2024-12-18 12:23:10'),
(125, 'App\\Models\\Doctor', 52, 'auth_token', '01d54a9e67e140c67c02e50522487065f93fac2ae2d357188c70d02df7a4be17', '[\"*\"]', '2024-12-24 03:41:04', NULL, '2024-12-18 12:26:17', '2024-12-24 03:41:04'),
(126, 'App\\Models\\Doctor', 51, 'auth_token', '5e36d2b2e6cfe29bc36eab38e22e6b9d5b6477d854d38e55bef376221d7a435a', '[\"*\"]', '2024-12-19 07:44:27', NULL, '2024-12-19 05:09:15', '2024-12-19 07:44:27'),
(127, 'App\\Models\\Doctor', 51, 'auth_token', 'dd9a3936a4366e98254211c3cd4403c3a833e84967225c756e3de589ddc0f615', '[\"*\"]', '2024-12-19 06:13:56', NULL, '2024-12-19 06:13:37', '2024-12-19 06:13:56'),
(128, 'App\\Models\\Doctor', 51, 'auth_token', '4e8b1a8a9a1981b035aedec8b03920fcbe897da83a7a2ea32c55bfffd523afbe', '[\"*\"]', NULL, NULL, '2024-12-19 07:54:19', '2024-12-19 07:54:19'),
(129, 'App\\Models\\Doctor', 51, 'auth_token', '0fdbd1353ff58f8176163d6db292953d34bd4359fb1394c505f98f66d40275bd', '[\"*\"]', '2024-12-19 09:40:58', NULL, '2024-12-19 09:21:26', '2024-12-19 09:40:58'),
(130, 'App\\Models\\Doctor', 51, 'auth_token', '8cc6e8b463d972fdff63ddccf4355fede4b03698eab4665902a13f54e52975d4', '[\"*\"]', '2024-12-21 05:07:38', NULL, '2024-12-19 09:30:16', '2024-12-21 05:07:38'),
(131, 'App\\Models\\Doctor', 51, 'auth_token', 'c8e02b2004d1affe387b215042e8f6b0a258463243788f41c48ac3695db9f44f', '[\"*\"]', '2024-12-19 09:43:54', NULL, '2024-12-19 09:41:25', '2024-12-19 09:43:54'),
(132, 'App\\Models\\Doctor', 53, 'auth_token', '6af839bcc3a868397c9b96a3432bbf13aa2faf8f5e635918d58bc98f2d511a36', '[\"*\"]', NULL, NULL, '2024-12-19 09:45:17', '2024-12-19 09:45:17'),
(133, 'App\\Models\\Doctor', 54, 'auth_token', '70a2332eb20496cd3343ac25a19184df286e9b8e4abb39e1c324fda86a1a1826', '[\"*\"]', NULL, NULL, '2024-12-19 09:47:10', '2024-12-19 09:47:10'),
(134, 'App\\Models\\Doctor', 54, 'auth_token', '5e6a5f61a45f9b0bcfcbdf131d5ce071fb4aeb6cb2bda95debfd5e81ecb3a3ce', '[\"*\"]', '2024-12-21 09:36:11', NULL, '2024-12-19 09:47:34', '2024-12-21 09:36:11'),
(135, 'App\\Models\\Patient', 1, 'auth_token', '6142d12a40228ab1ab78937e98ef251d17217f75d5ef42415a60aeaff367689d', '[\"*\"]', '2024-12-21 05:56:43', NULL, '2024-12-21 05:00:50', '2024-12-21 05:56:43'),
(136, 'App\\Models\\Doctor', 51, 'auth_token', 'e90d41f78398a489da4b905810e0b19ff5c5304b653eb4b4a278b47fe5e3c2f4', '[\"*\"]', '2024-12-21 05:57:22', NULL, '2024-12-21 05:57:14', '2024-12-21 05:57:22'),
(137, 'App\\Models\\Patient', 1, 'auth_token', '995bab12028b79e80594891706f0228a31cc8c2c385d4c7ef8ab0f4720a50bc9', '[\"*\"]', '2024-12-21 06:52:29', NULL, '2024-12-21 06:27:46', '2024-12-21 06:52:29'),
(138, 'App\\Models\\Doctor', 51, 'auth_token', '73d918fe15159e3d59b5013780be82d1afafa6a77ecfb16f30f44343acebe642', '[\"*\"]', '2024-12-21 09:34:40', NULL, '2024-12-21 06:50:39', '2024-12-21 09:34:40'),
(139, 'App\\Models\\Doctor', 51, 'auth_token', '654250ef3bfaabf8a6c89c0a53442a536566ff11b946a6774775f862f3abf732', '[\"*\"]', '2024-12-21 06:59:44', NULL, '2024-12-21 06:52:55', '2024-12-21 06:59:44'),
(140, 'App\\Models\\Doctor', 51, 'auth_token', 'd2709471779caf7a1ee617fd8a62b23e8d753967318fb1aecf1810518348511a', '[\"*\"]', '2024-12-21 07:30:54', NULL, '2024-12-21 07:13:55', '2024-12-21 07:30:54'),
(141, 'App\\Models\\Patient', 1, 'auth_token', 'c0505bac896bb82253461aba5b21990002624fad5f93d46e96a44b1ca3df685b', '[\"*\"]', '2024-12-21 08:43:54', NULL, '2024-12-21 07:31:25', '2024-12-21 08:43:54'),
(142, 'App\\Models\\Doctor', 11, 'auth_token', 'c2eac16c9024ffc8558326b21368e1afa9e56660e5c6110f4f164b82b5cd6389', '[\"*\"]', '2024-12-21 08:49:07', NULL, '2024-12-21 08:44:34', '2024-12-21 08:49:07'),
(143, 'App\\Models\\Doctor', 11, 'auth_token', 'd5cea4767d180541b7d6cabe1c4d9bb80c65192de5417aff9b12c1838c8af183', '[\"*\"]', '2024-12-21 09:51:56', NULL, '2024-12-21 08:44:40', '2024-12-21 09:51:56'),
(144, 'App\\Models\\Patient', 1, 'auth_token', '7040188e61b5ec9708b4578d81f09f3e52b06a93ed1556cf0afd0a99c4bded6a', '[\"*\"]', '2024-12-21 08:53:41', NULL, '2024-12-21 08:49:27', '2024-12-21 08:53:41'),
(145, 'App\\Models\\Patient', 1, 'auth_token', 'a3b22aea1bbecfdaec7c4792a1bcbe4a0f2f16abe46e04698efc6bde0caea4c3', '[\"*\"]', '2024-12-21 11:14:21', NULL, '2024-12-21 08:50:48', '2024-12-21 11:14:21'),
(146, 'App\\Models\\Doctor', 11, 'auth_token', '1d4920235cbc9d47c7520099fb5b8ea82e2384153dd8403f685c544558cfc7ac', '[\"*\"]', '2024-12-21 11:55:57', NULL, '2024-12-21 08:54:17', '2024-12-21 11:55:57'),
(147, 'App\\Models\\Patient', 1, 'auth_token', 'c15c94a83f5473e456785da0dd1c8ffbcbc29c877cd8544b7f863fe34117fdfe', '[\"*\"]', '2024-12-21 09:39:29', NULL, '2024-12-21 09:35:09', '2024-12-21 09:39:29'),
(148, 'App\\Models\\Patient', 52, 'auth_token', '67857cbac23a504d547f5aadcfc291b317b07cabeef426c6d5cb33fcd21de37a', '[\"*\"]', NULL, NULL, '2024-12-21 09:37:05', '2024-12-21 09:37:05'),
(149, 'App\\Models\\Patient', 52, 'auth_token', 'b499f718ccca1ca6c9c08d095e99fa15896d1ef6edabf032248a6b34690ade89', '[\"*\"]', '2024-12-21 11:45:28', NULL, '2024-12-21 09:37:21', '2024-12-21 11:45:28'),
(150, 'App\\Models\\Patient', 52, 'auth_token', '525b2b3a1291ac2d41b5c83899294488405b599effcc1347b4195a0e9c276a51', '[\"*\"]', '2024-12-21 09:39:46', NULL, '2024-12-21 09:39:41', '2024-12-21 09:39:46'),
(151, 'App\\Models\\Doctor', 51, 'auth_token', '1caadb09974f13825e26b23f47f736fd62a93c6f82b4f92b4e3399b4f91e7117', '[\"*\"]', '2024-12-21 09:42:32', NULL, '2024-12-21 09:42:01', '2024-12-21 09:42:32'),
(152, 'App\\Models\\Patient', 52, 'auth_token', 'fdc3ae06873460622003db2cebaff623348b6dd4578f5733d7a3442e2c926b2b', '[\"*\"]', '2024-12-23 04:00:48', NULL, '2024-12-21 09:42:58', '2024-12-23 04:00:48'),
(153, 'App\\Models\\Doctor', 53, 'auth_token', '794772dbe998c8538591709ccb2e1bd36fbd851891241c6271e21aeeb1974013', '[\"*\"]', '2024-12-21 12:03:27', NULL, '2024-12-21 11:45:47', '2024-12-21 12:03:27'),
(154, 'App\\Models\\Patient', 1, 'auth_token', '73bf33d929b992506071fcd87fcf3f84477b275fcb53c478ab13856f88d8ab15', '[\"*\"]', '2024-12-21 12:06:02', NULL, '2024-12-21 11:57:18', '2024-12-21 12:06:02'),
(155, 'App\\Models\\Doctor', 15, 'auth_token', '9587bc1328dcb1a9b09d1d71625f8923d00abe36d672727efc45a0af5fc2f72d', '[\"*\"]', '2024-12-21 12:04:56', NULL, '2024-12-21 12:04:13', '2024-12-21 12:04:56'),
(156, 'App\\Models\\Doctor', 15, 'auth_token', '487fd894662e615dea7fb00570a0d37f310c57cbce0455f25b879375e2a47c6c', '[\"*\"]', '2024-12-22 05:00:05', NULL, '2024-12-21 12:05:00', '2024-12-22 05:00:05'),
(157, 'App\\Models\\Doctor', 15, 'auth_token', '6b98c3ae8d7c8f8fe4f499b27d7c9850a8ad8d8f9ab6ed482d1eb7aacf320730', '[\"*\"]', '2024-12-22 04:09:44', NULL, '2024-12-21 12:06:14', '2024-12-22 04:09:44'),
(158, 'App\\Models\\Doctor', 15, 'auth_token', '8924651654ec8bea507e983ebfd0f4f234a4f2f6cd5e6b07d4214285b23636f1', '[\"*\"]', '2024-12-22 03:50:43', NULL, '2024-12-21 12:07:50', '2024-12-22 03:50:43'),
(159, 'App\\Models\\Doctor', 15, 'auth_token', '38f3789ff92c0bd3ab73b822a885bac8fe34ab4896b6793a416e37c9d919223f', '[\"*\"]', '2024-12-23 06:17:36', NULL, '2024-12-22 03:51:04', '2024-12-23 06:17:36'),
(160, 'App\\Models\\Doctor', 51, 'auth_token', '19ae3e6d973e5903d98bf468a41fe7229cffba67a11cf12894b6690d1957e7fb', '[\"*\"]', '2024-12-22 04:11:54', NULL, '2024-12-22 04:10:42', '2024-12-22 04:11:54'),
(161, 'App\\Models\\Patient', 52, 'auth_token', 'ea8ffc63155d11b476dab52d5cbc7bcfe05812484146c6676c4e4db11ebb4c84', '[\"*\"]', '2024-12-22 04:15:58', NULL, '2024-12-22 04:12:02', '2024-12-22 04:15:58'),
(162, 'App\\Models\\Patient', 1, 'auth_token', '0a7123c4db81c31f3cc7b0415f60de57e8d2bbf53b826b20ed871cbc498532b9', '[\"*\"]', '2024-12-22 04:16:39', NULL, '2024-12-22 04:12:14', '2024-12-22 04:16:39'),
(163, 'App\\Models\\Doctor', 53, 'auth_token', '012fca5db476018385d018e5256926d269a4cffe489b7944555ae8023835cff5', '[\"*\"]', '2024-12-22 04:47:48', NULL, '2024-12-22 04:16:17', '2024-12-22 04:47:48'),
(164, 'App\\Models\\Doctor', 51, 'auth_token', 'b182987646acd958dbbb4a5b818b666aebfcdf826fe4811c1f96836b3e521fed', '[\"*\"]', '2024-12-22 04:33:00', NULL, '2024-12-22 04:17:01', '2024-12-22 04:33:00'),
(165, 'App\\Models\\Doctor', 15, 'auth_token', '421ce7c5dbc8bba2aabc6c2743314a6576c462d1c0f232072f2a2c0960eb1297', '[\"*\"]', '2024-12-22 04:51:24', NULL, '2024-12-22 04:33:30', '2024-12-22 04:51:24'),
(166, 'App\\Models\\Patient', 52, 'auth_token', '4f985bdc55f7caf7bde9efd63d0001b1d62509d1a3c071d6e739d6bc3c4ff2d2', '[\"*\"]', '2024-12-22 05:30:39', NULL, '2024-12-22 04:48:14', '2024-12-22 05:30:39'),
(167, 'App\\Models\\Doctor', 17, 'auth_token', '1bc0170ef7921cd1ede088636b7bc251d4b08544d10a388c12b81948f2353f56', '[\"*\"]', '2024-12-23 04:42:44', NULL, '2024-12-22 04:52:03', '2024-12-23 04:42:44'),
(168, 'App\\Models\\Patient', 1, 'auth_token', '9f24634c04205365d3a4ae68d01d4f83b4b9012223d00f577d67fec1d352f316', '[\"*\"]', '2024-12-22 08:35:57', NULL, '2024-12-22 05:59:57', '2024-12-22 08:35:57'),
(169, 'App\\Models\\Doctor', 51, 'auth_token', '63528e4cbdb68aa2dc4e3ebba0226fd77e81ec0e076d0fcb94b2fbbafadb4ede', '[\"*\"]', '2024-12-23 06:42:55', NULL, '2024-12-22 08:36:30', '2024-12-23 06:42:55'),
(170, 'App\\Models\\Patient', 52, 'auth_token', '572f301e23e02eb617e28f00175a966913383c8a7543a48c1a626eb77a5e99ae', '[\"*\"]', '2024-12-23 04:36:38', NULL, '2024-12-22 08:53:50', '2024-12-23 04:36:38'),
(171, 'App\\Models\\Doctor', 53, 'auth_token', 'e3c8e12082f477f3f224658c7f27612c53be6edac0e74c1e0f22640658346a76', '[\"*\"]', '2024-12-23 04:39:52', NULL, '2024-12-23 04:37:11', '2024-12-23 04:39:52'),
(172, 'App\\Models\\Patient', 52, 'auth_token', 'bd10bcd2682c673dfaef8a4627517428de742cdfc12d9cbc392bce9c2083ee0b', '[\"*\"]', '2024-12-23 04:39:19', NULL, '2024-12-23 04:39:13', '2024-12-23 04:39:19'),
(173, 'App\\Models\\Patient', 52, 'auth_token', '4d7e71ceffb8562f23923efa458bc6ef1903c9212fae38eba4f177032a1698df', '[\"*\"]', '2024-12-23 04:48:27', NULL, '2024-12-23 04:40:24', '2024-12-23 04:48:27'),
(174, 'App\\Models\\Patient', 1, 'auth_token', '262ece945ed04f18a983b0fdb2cd3fd18407164ffcb183a3d06ed82901595e98', '[\"*\"]', '2024-12-23 08:51:43', NULL, '2024-12-23 04:45:07', '2024-12-23 08:51:43'),
(175, 'App\\Models\\Doctor', 53, 'auth_token', '8e0e567f8cba2bd670ebbd57c8e03b6b43389e470755636582ced3c237494dee', '[\"*\"]', '2024-12-23 04:52:00', NULL, '2024-12-23 04:48:51', '2024-12-23 04:52:00'),
(176, 'App\\Models\\Patient', 52, 'auth_token', '67e467a1a053fc6e4c0227f584f3d0c5ede6bb4b81df7780a74fb4af9f02eb79', '[\"*\"]', '2024-12-23 06:21:05', NULL, '2024-12-23 04:52:25', '2024-12-23 06:21:05'),
(177, 'App\\Models\\Patient', 52, 'auth_token', '242630e13bfddb77959cd394434e01fb6789cd80d3a100eed18012ff1256c609', '[\"*\"]', '2024-12-23 06:12:53', NULL, '2024-12-23 06:12:45', '2024-12-23 06:12:53'),
(178, 'App\\Models\\Doctor', 51, 'auth_token', '587e2c81a5271dab4d41226f7045fef2c8e2b0d6b1882cb71d946288da74ecd9', '[\"*\"]', '2024-12-24 05:49:00', NULL, '2024-12-23 06:20:08', '2024-12-24 05:49:00'),
(179, 'App\\Models\\Doctor', 51, 'auth_token', '6eeda9cc913de41f2508771a8569967f09a0298311f2a01916d818910a2ba576', '[\"*\"]', '2024-12-24 04:41:38', NULL, '2024-12-23 06:21:29', '2024-12-24 04:41:38'),
(180, 'App\\Models\\Doctor', 51, 'auth_token', '48741b201e0135beb995a19325b37934689070e6972aac0005558a37d38144d5', '[\"*\"]', '2024-12-23 10:57:23', NULL, '2024-12-23 08:52:13', '2024-12-23 10:57:23'),
(181, 'App\\Models\\Doctor', 51, 'auth_token', '50398fc16262068c4ceb25c00213cb631216b31519f8f21e0d295b13fe351d91', '[\"*\"]', '2024-12-24 08:46:01', NULL, '2024-12-23 09:14:52', '2024-12-24 08:46:01'),
(182, 'App\\Models\\Doctor', 51, 'auth_token', 'e24ef5ed42bc130485c06ae7bf0f37aac268bcbd9b9fa89d599dda26e80bfa41', '[\"*\"]', '2024-12-24 08:48:49', NULL, '2024-12-24 03:31:55', '2024-12-24 08:48:49'),
(183, 'App\\Models\\Patient', 52, 'auth_token', '20f4090fed144a7bbe8ddec0e5359c88f15702ccd97247cb7ab527bb13290185', '[\"*\"]', '2024-12-24 05:54:29', NULL, '2024-12-24 04:42:01', '2024-12-24 05:54:29'),
(184, 'App\\Models\\Doctor', 51, 'auth_token', 'ce710e32cfa1ea6e55ac9b43cda967d1975978d7d6ee36515df2d6b5012f80d1', '[\"*\"]', '2024-12-24 08:57:19', NULL, '2024-12-24 05:54:11', '2024-12-24 08:57:19'),
(185, 'App\\Models\\Doctor', 51, 'auth_token', '5768aa4d22da33877f303a2ed0abcdb8cdf2f18f2cdffbf16abb9a5be2f163fb', '[\"*\"]', '2024-12-24 09:47:21', NULL, '2024-12-24 05:55:03', '2024-12-24 09:47:21'),
(186, 'App\\Models\\Patient', 1, 'auth_token', 'f2a686f54a829ae1626ff71ce3331f2fac14385e1eab6ea7fb0c594ab6f85328', '[\"*\"]', '2024-12-24 08:52:07', NULL, '2024-12-24 08:49:18', '2024-12-24 08:52:07'),
(187, 'App\\Models\\Doctor', 51, 'auth_token', 'ee6a0b633be32ac7c7e7c4a30e4ebebcfadb54318b5c839fe4268bbba020e18a', '[\"*\"]', '2024-12-24 09:45:32', NULL, '2024-12-24 08:52:33', '2024-12-24 09:45:32'),
(188, 'App\\Models\\Patient', 1, 'auth_token', 'b15e534de024e6a3f6b7b9ecac4fe75f5048acc684a985a1f4dddfae2d26349e', '[\"*\"]', '2024-12-24 09:23:28', NULL, '2024-12-24 09:22:12', '2024-12-24 09:23:28'),
(189, 'App\\Models\\Doctor', 51, 'auth_token', '70f51c30eddcc5a18dd3f847080a1ed7d61ea25b9a8fdd9966f97cb14e067b54', '[\"*\"]', '2024-12-24 09:46:08', NULL, '2024-12-24 09:24:01', '2024-12-24 09:46:08'),
(190, 'App\\Models\\Patient', 1, 'auth_token', '3a5b7dbf40da88bace7558a72dd7eb766828f845cf0a8e5c93943fb44e143239', '[\"*\"]', '2024-12-24 09:46:53', NULL, '2024-12-24 09:45:58', '2024-12-24 09:46:53'),
(191, 'App\\Models\\Doctor', 51, 'auth_token', '5e97493db32996c97e35944f6ccc68eed11bdbaf886bb7618737000cdaad6c25', '[\"*\"]', '2025-01-07 09:23:15', NULL, '2024-12-24 09:47:10', '2025-01-07 09:23:15'),
(192, 'App\\Models\\Doctor', 52, 'auth_token', 'fbd19db48c77a9a695505789cbcc4df29920c500ea56a199006d8cc4e4f3da3e', '[\"*\"]', '2025-01-01 08:02:41', NULL, '2024-12-24 10:26:27', '2025-01-01 08:02:41'),
(193, 'App\\Models\\Patient', 1, 'auth_token', '54e1cab4bb700f4165166c98ca2520628fe65517fe1a8b77e70f80b9ca3f64ae', '[\"*\"]', '2025-01-01 17:29:08', NULL, '2024-12-26 13:40:01', '2025-01-01 17:29:08'),
(194, 'App\\Models\\Doctor', 51, 'auth_token', '808a7e481147d39b566e33c2e28da5205de475e2dad2f26b1110289e034f6f5a', '[\"*\"]', '2024-12-31 10:05:13', NULL, '2024-12-31 09:57:27', '2024-12-31 10:05:13'),
(195, 'App\\Models\\Doctor', 51, 'auth_token', '4d3792d4a7f689b802ecafee1ff963b0ada5d89cad67b3ad49ca3e6c9a376cda', '[\"*\"]', '2025-01-06 03:42:01', NULL, '2025-01-01 17:29:09', '2025-01-06 03:42:01'),
(196, 'App\\Models\\Doctor', 52, 'auth_token', '6b1afb8fe6da853b9e44a3f651e83326ebe0a93d2beb58c139155b0afb260121', '[\"*\"]', '2025-02-07 12:41:45', NULL, '2025-01-05 06:42:46', '2025-02-07 12:41:45'),
(197, 'App\\Models\\Patient', 1, 'auth_token', '56acb81f2c5a8b773b3e7555495dd05fd219e152fcd50d7085cd7703f99392aa', '[\"*\"]', '2025-01-07 10:25:30', NULL, '2025-01-07 08:56:40', '2025-01-07 10:25:30'),
(198, 'App\\Models\\Doctor', 51, 'auth_token', '8f3aee807d7544a0d2cdf0ea43fee855be51fb6a8594b50b21240454c585befa', '[\"*\"]', NULL, NULL, '2025-01-07 09:14:04', '2025-01-07 09:14:04'),
(199, 'App\\Models\\Doctor', 51, 'auth_token', 'a0ac6fe955765cf7a14638e1193950040fb09542404f3b8df8900acfe43b97e3', '[\"*\"]', NULL, NULL, '2025-01-07 09:16:08', '2025-01-07 09:16:08'),
(200, 'App\\Models\\Doctor', 51, 'auth_token', '5a960e5dafa5b7adba65a473aab90d3790260bfbdcff70f447fe41aaf24160d3', '[\"*\"]', NULL, NULL, '2025-01-07 09:18:56', '2025-01-07 09:18:56'),
(201, 'App\\Models\\Doctor', 50, 'auth_token', '08c1fb0ecb0c460d937c1bc233d44449ab0045e267b1cdcdc05554d83b01b2e5', '[\"*\"]', '2025-01-07 09:35:02', NULL, '2025-01-07 09:23:49', '2025-01-07 09:35:02'),
(202, 'App\\Models\\Doctor', 5, 'auth_token', '17f5903d2fff88baf803bee0c6aebdb12cfd8ba1e312612e41cfee284d997fdd', '[\"*\"]', '2025-01-07 11:19:23', NULL, '2025-01-07 09:45:48', '2025-01-07 11:19:23'),
(203, 'App\\Models\\Patient', 1, 'auth_token', '8047e9558c4e1a28cb380f5a47bb23944577879d8c0e76106fef4d8e3e7bf66e', '[\"*\"]', '2025-01-07 11:41:19', NULL, '2025-01-07 11:19:54', '2025-01-07 11:41:19'),
(204, 'App\\Models\\Doctor', 51, 'auth_token', '1d8241ddecc869153e7f8b40e224872982b7d4573f4fc2887886469642bc3958', '[\"*\"]', '2025-01-07 11:30:31', NULL, '2025-01-07 11:21:25', '2025-01-07 11:30:31'),
(205, 'App\\Models\\Doctor', 10, 'auth_token', '803c2bf30a60d29337c475f45c3079c091738a4e988f5e2b296be74c9b99c970', '[\"*\"]', '2025-01-07 11:51:26', NULL, '2025-01-07 11:42:09', '2025-01-07 11:51:26'),
(206, 'App\\Models\\Patient', 1, 'auth_token', '083e1e28593fce366a0765d8464ba0d72ee45d681e7fc76595e500c839d83d6c', '[\"*\"]', '2025-01-07 11:46:35', NULL, '2025-01-07 11:45:54', '2025-01-07 11:46:35'),
(207, 'App\\Models\\Patient', 1, 'auth_token', '10ef7b36aec5c787d337291f2731f151725a476f50f3f41c5ac587354599da4a', '[\"*\"]', '2025-01-08 03:53:05', NULL, '2025-01-07 11:51:49', '2025-01-08 03:53:05'),
(208, 'App\\Models\\Doctor', 51, 'auth_token', '8221dccfc1599be756383c60fbe3f6c817a4ce8a838c0c2b1106dc339d78ea21', '[\"*\"]', '2025-01-07 11:54:22', NULL, '2025-01-07 11:52:22', '2025-01-07 11:54:22'),
(209, 'App\\Models\\Doctor', 51, 'auth_token', 'de0fc0315adcf651650a225fb76ae868d51af5325ba58db27cb678c8b297f5dd', '[\"*\"]', '2025-01-09 04:30:05', NULL, '2025-01-08 03:53:57', '2025-01-09 04:30:05'),
(210, 'App\\Models\\Patient', 1, 'auth_token', '6a096b500402bccb59f422a6c9cf39b32926f8b2e599ce473390e6595ea3fe0c', '[\"*\"]', '2025-01-09 04:49:37', NULL, '2025-01-08 04:58:27', '2025-01-09 04:49:37'),
(211, 'App\\Models\\Patient', 1, 'auth_token', 'd2cb8ffdd35ccb0d57eb8af7b4c1fb81526a9fb1fc047931891f3a60f88b1e05', '[\"*\"]', '2025-01-16 04:17:03', NULL, '2025-01-09 04:10:04', '2025-01-16 04:17:03'),
(212, 'App\\Models\\Patient', 1, 'auth_token', '6043e36d0f7d990ff6fb5aa27a0cf6d4b5a6930f4b14deca11f42d2b944f473c', '[\"*\"]', '2025-01-09 04:28:56', NULL, '2025-01-09 04:27:54', '2025-01-09 04:28:56'),
(213, 'App\\Models\\Doctor', 51, 'auth_token', 'fb7bf5229042384a4632b7c66980ff6d5561f9f378eb5210b9cb635374011829', '[\"*\"]', '2025-01-16 04:16:53', NULL, '2025-01-09 04:29:19', '2025-01-16 04:16:53'),
(214, 'App\\Models\\Patient', 1, 'auth_token', '05638afa7173bca9a780b4627032fee8b0afff0405a97d287478fa9c5e9d3703', '[\"*\"]', '2025-01-09 07:20:09', NULL, '2025-01-09 04:30:45', '2025-01-09 07:20:09'),
(215, 'App\\Models\\Doctor', 51, 'auth_token', 'd96fc2bdd6310c9f85dc07b013e7539489de0229d3d6dd3c4561f7e9952b6c00', '[\"*\"]', '2025-01-09 05:10:08', NULL, '2025-01-09 04:50:08', '2025-01-09 05:10:08'),
(216, 'App\\Models\\Doctor', 51, 'auth_token', '83de5a13e0b72efd3b66fccb641c8309cc8e7ab98ce7cd8739a5dd795229e911', '[\"*\"]', '2025-01-16 05:59:37', NULL, '2025-01-09 07:21:08', '2025-01-16 05:59:37'),
(217, 'App\\Models\\Doctor', 55, 'auth_token', '5b3c4f0b9b4e8a15ce162632b91c1e140989b1563b59d61975a9f6e5ec73965e', '[\"*\"]', NULL, NULL, '2025-01-16 04:29:13', '2025-01-16 04:29:13'),
(218, 'App\\Models\\Patient', 53, 'auth_token', '610f0968e76acf2e5f36fc6ebdfe75aae255dd19257954a77a484ca208810fee', '[\"*\"]', NULL, NULL, '2025-01-16 04:41:05', '2025-01-16 04:41:05'),
(219, 'App\\Models\\Doctor', 51, 'auth_token', 'cf40fe4ede7ebf27362aaa7aba7a03c366401d4c924601588b18a192ffd19f91', '[\"*\"]', '2025-01-19 03:48:06', NULL, '2025-01-16 04:52:35', '2025-01-19 03:48:06'),
(220, 'App\\Models\\Doctor', 51, 'auth_token', 'cd9401ddf978fa61af129dc588bf634192ab39b4115c57fa35215b07b7128b03', '[\"*\"]', '2025-01-19 03:58:48', NULL, '2025-01-19 03:52:11', '2025-01-19 03:58:48'),
(221, 'App\\Models\\Doctor', 51, 'auth_token', 'c4432358f168e79a2aa940057cb02056b7789fa2b612d4c4d075611a6a37b72d', '[\"*\"]', '2025-01-19 14:38:34', NULL, '2025-01-19 14:38:21', '2025-01-19 14:38:34'),
(222, 'App\\Models\\Doctor', 51, 'auth_token', '90735f52f05919f31cee032c4155d6d00196e1d485d6e107ba6431f00e11c53a', '[\"*\"]', '2025-01-20 03:52:12', NULL, '2025-01-20 03:34:47', '2025-01-20 03:52:12'),
(223, 'App\\Models\\Doctor', 51, 'auth_token', 'c8fbf1fd562a9b684e8df817c28f1d13278957bfbdeed2fee58e0ce73419721e', '[\"*\"]', '2025-02-02 05:44:48', NULL, '2025-01-21 03:54:15', '2025-02-02 05:44:48'),
(224, 'App\\Models\\Doctor', 51, 'auth_token', 'cb5d51cf396f8bb068f646c684851d524b95aded0b5763debc4315ac69ff90df', '[\"*\"]', '2025-01-23 04:18:45', NULL, '2025-01-23 04:11:47', '2025-01-23 04:18:45'),
(225, 'App\\Models\\Doctor', 51, 'auth_token', 'fe8d4acaaaeb90a469f75d4bf5d301a0b666e57e2d532220696492001c36917f', '[\"*\"]', '2025-02-10 19:02:36', NULL, '2025-01-23 09:00:36', '2025-02-10 19:02:36'),
(226, 'App\\Models\\Doctor', 51, 'auth_token', 'd1265e2b03f336525a3f554daad1176837411045b0472a282f52da0fd65985e6', '[\"*\"]', '2025-01-25 10:12:40', NULL, '2025-01-25 10:12:20', '2025-01-25 10:12:40'),
(227, 'App\\Models\\Doctor', 51, 'auth_token', '8c5f48ecd90189b0e0ed5ecd6abd8b8cff84e13392d0d595c6b99dc9ab6e2de2', '[\"*\"]', '2025-01-26 05:05:07', NULL, '2025-01-26 05:01:37', '2025-01-26 05:05:07'),
(228, 'App\\Models\\Doctor', 51, 'auth_token', '02f8ae9a1db572507e63cd60deeae0b8b6f3d84a11b985ef5a8c05f34df93b9e', '[\"*\"]', '2025-01-27 06:59:25', NULL, '2025-01-27 03:36:16', '2025-01-27 06:59:25'),
(229, 'App\\Models\\Doctor', 51, 'auth_token', 'a48e4836369b37440b1f1bbc1aee0329aab187ed7db970a5ed5659ac597089ae', '[\"*\"]', '2025-02-01 06:03:43', NULL, '2025-02-01 05:56:30', '2025-02-01 06:03:43'),
(230, 'App\\Models\\Doctor', 51, 'auth_token', '941af0dc09353cd9d78bed9c36dbdb88c92ab160b08d6a7abd388324dddfcffc', '[\"*\"]', '2025-02-01 08:52:49', NULL, '2025-02-01 08:40:13', '2025-02-01 08:52:49'),
(231, 'App\\Models\\Doctor', 51, 'auth_token', 'e9fb8b001ab06484a1ae100dff24c6ca8efdebbbe9be55af53b1a5164e91f8d2', '[\"*\"]', '2025-02-02 04:26:31', NULL, '2025-02-02 04:25:39', '2025-02-02 04:26:31'),
(232, 'App\\Models\\Doctor', 51, 'auth_token', '4bbe21434a7c3d2ec44668cf6db502b0c51a706c1bd444cf6b08fa50d2c73b8d', '[\"*\"]', '2025-02-02 09:42:02', NULL, '2025-02-02 09:41:03', '2025-02-02 09:42:02'),
(233, 'App\\Models\\Doctor', 51, 'auth_token', '5b487be2e30b16f4d72bf8593d40bab396e2a018e7bed203c32047ebde61bb4a', '[\"*\"]', '2025-02-03 06:32:20', NULL, '2025-02-03 06:14:09', '2025-02-03 06:32:20'),
(234, 'App\\Models\\Doctor', 51, 'auth_token', '0d03a5ff798873b51e48642896c48858ca16398ecacb33a4273d99ead21743ed', '[\"*\"]', '2025-02-04 07:09:39', NULL, '2025-02-04 07:08:23', '2025-02-04 07:09:39'),
(235, 'App\\Models\\Student', 102, 'auth_token', '60ad25e75dfe3c3dde03ee701c0901ee64d4109545536d7151c563fb92d43ad9', '[\"*\"]', NULL, NULL, '2025-02-16 17:47:05', '2025-02-16 17:47:05'),
(236, 'App\\Models\\Student', 102, 'auth_token', 'bab4e249508bfa121e206e881ea8026902ea5cbde3061e8e3ef1a2c87f279521', '[\"*\"]', '2025-02-16 18:23:55', NULL, '2025-02-16 17:47:30', '2025-02-16 18:23:55'),
(237, 'App\\Models\\Doctor', 51, 'auth_token', '76afcab4ac57185a61ab992b4a593f1e3447d8dc37bc439282984ecfba3c400b', '[\"*\"]', '2025-02-17 04:28:03', NULL, '2025-02-17 04:07:18', '2025-02-17 04:28:03'),
(238, 'App\\Models\\Doctor', 51, 'auth_token', '56e4df349265be33f23e300ad9f24d05bbaf0754920c7a905d4be4b62219d45d', '[\"*\"]', '2025-02-17 05:21:23', NULL, '2025-02-17 04:59:38', '2025-02-17 05:21:23'),
(239, 'App\\Models\\Doctor', 51, 'auth_token', '8d8c112e5a8d3288f07e9309686928415ff287dbd3b0f36c8c4024e859756e0a', '[\"*\"]', '2025-02-17 05:22:07', NULL, '2025-02-17 05:22:01', '2025-02-17 05:22:07'),
(240, 'App\\Models\\Student', 103, 'auth_token', '627ea8b8e0105dfbd1233990baf8636b1eb7eae1e44a8f71dc242c03389cb744', '[\"*\"]', NULL, NULL, '2025-02-17 06:01:24', '2025-02-17 06:01:24'),
(241, 'App\\Models\\Student', 103, 'auth_token', '164bb86faa166b6ded46cecf6f8fb3239f3cafaa8b0c23711cc4ef17c989458a', '[\"*\"]', '2025-02-17 06:01:38', NULL, '2025-02-17 06:01:35', '2025-02-17 06:01:38'),
(242, 'App\\Models\\Student', 104, 'auth_token', '1c29d46be016dabfa7e865078142f1750699ac6588afca137a3f347d55234544', '[\"*\"]', NULL, NULL, '2025-02-17 06:06:50', '2025-02-17 06:06:50'),
(243, 'App\\Models\\Student', 104, 'auth_token', 'bdcec31f8874a216fa74cda193f585a87f45446ea7e9b201fcf2eaed819b170c', '[\"*\"]', '2025-02-17 06:07:04', NULL, '2025-02-17 06:06:59', '2025-02-17 06:07:04'),
(244, 'App\\Models\\Doctor', 51, 'auth_token', '1a9f74f8ed719d4c33d580e2d75f1180ea04503e93477e14ad052b3c8d634119', '[\"*\"]', '2025-02-17 06:23:45', NULL, '2025-02-17 06:10:55', '2025-02-17 06:23:45'),
(245, 'App\\Models\\Doctor', 51, 'auth_token', '398aa6bd63f95bfeda3b366a5146d327fe577193ec63dd19b042ee712e9a8818', '[\"*\"]', '2025-02-17 06:36:25', NULL, '2025-02-17 06:36:22', '2025-02-17 06:36:25'),
(246, 'App\\Models\\Doctor', 51, 'auth_token', '656bc6ee9ab336ec3e2453c8a8dcf1a435e047fbe382d917042544292e805ff4', '[\"*\"]', '2025-02-17 06:38:59', NULL, '2025-02-17 06:38:05', '2025-02-17 06:38:59'),
(247, 'App\\Models\\Doctor', 51, 'auth_token', '90bcbae6d97e0930a8cd7ce4cf762eea96b3dee87dfceb64793559c9b2943092', '[\"*\"]', '2025-02-17 08:54:45', NULL, '2025-02-17 07:51:02', '2025-02-17 08:54:45'),
(248, 'App\\Models\\Doctor', 51, 'auth_token', '78722156fd797ff9baa03f16e43f94e40a297f29598b906ba4456b75ece0c5f6', '[\"*\"]', '2025-02-18 14:34:45', NULL, '2025-02-18 14:34:42', '2025-02-18 14:34:45'),
(249, 'App\\Models\\Doctor', 51, 'auth_token', '13f2853faab88fba6d6cd2fda372df17c79458627e6039c07b90272689965ed6', '[\"*\"]', '2025-02-18 14:36:58', NULL, '2025-02-18 14:36:54', '2025-02-18 14:36:58'),
(250, 'App\\Models\\Doctor', 51, 'auth_token', 'ee9dcd7ed8d309067930448efbef45fd5d3f28aa231aa5b83fcbf0e2835c769a', '[\"*\"]', '2025-02-18 15:05:08', NULL, '2025-02-18 14:38:19', '2025-02-18 15:05:08'),
(251, 'App\\Models\\Doctor', 51, 'auth_token', 'fb07d4e862b654d85691ff280e6f681f4c2a2f1af5810327edefcbac5e887087', '[\"*\"]', '2025-02-18 15:11:51', NULL, '2025-02-18 15:06:22', '2025-02-18 15:11:51'),
(252, 'App\\Models\\Doctor', 51, 'auth_token', '558cf888b0929f2bb393d91040a36414c741730cbc0cb5bff9f3c899f1f973df', '[\"*\"]', '2025-02-18 15:19:06', NULL, '2025-02-18 15:14:51', '2025-02-18 15:19:06');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(253, 'App\\Models\\Doctor', 51, 'auth_token', 'b6405c959e913bc5f667b5df33171b20b7258bcfe5025d821630c70e6dbc40ef', '[\"*\"]', '2025-02-18 15:36:01', NULL, '2025-02-18 15:21:15', '2025-02-18 15:36:01'),
(254, 'App\\Models\\Patient', 54, 'auth_token', 'dab441441414c859cead0d871a766eba44a215d4af83e19e08f68c5cacb06362', '[\"*\"]', NULL, NULL, '2025-02-18 15:39:48', '2025-02-18 15:39:48'),
(255, 'App\\Models\\Patient', 54, 'auth_token', 'c0fede9a16fcf9f2ac80805f7da59d7b85d05b1c2809258772dbb2a78e79968a', '[\"*\"]', '2025-02-18 15:40:25', NULL, '2025-02-18 15:40:14', '2025-02-18 15:40:25'),
(256, 'App\\Models\\Patient', 55, 'auth_token', '133245abae40f30bb451c8ab45d0976bd88ecf8c37ae94dffc04996614acbd6b', '[\"*\"]', NULL, NULL, '2025-02-18 15:42:16', '2025-02-18 15:42:16'),
(257, 'App\\Models\\Patient', 55, 'auth_token', 'cf879e5860759aa554b36b38aeb1666ded051220234540ac62297997f3726897', '[\"*\"]', '2025-02-18 15:48:26', NULL, '2025-02-18 15:42:45', '2025-02-18 15:48:26'),
(258, 'App\\Models\\Patient', 56, 'auth_token', '8968cf35d06c50e93e6ebc9928e7e1f785f57d4cd313fff92150d46dc076fe09', '[\"*\"]', NULL, NULL, '2025-02-18 15:49:24', '2025-02-18 15:49:24'),
(259, 'App\\Models\\Patient', 56, 'auth_token', 'a9e814b5b01b307674bfebafd00e13f18a7ed30777cefd98aced6ba8d8462bc8', '[\"*\"]', '2025-02-18 15:49:46', NULL, '2025-02-18 15:49:36', '2025-02-18 15:49:46'),
(260, 'App\\Models\\Patient', 57, 'auth_token', '6c89c5bc856527c3194d65c1715a92b45837c4e01a753cb374bc9de8760ac4f8', '[\"*\"]', NULL, NULL, '2025-02-18 15:50:32', '2025-02-18 15:50:32'),
(261, 'App\\Models\\Patient', 57, 'auth_token', '60696b2ee76476646f68cf56a396f610b2ac1b18cf0a8fcda1fc746652530e65', '[\"*\"]', '2025-02-18 15:50:50', NULL, '2025-02-18 15:50:44', '2025-02-18 15:50:50'),
(262, 'App\\Models\\Patient', 58, 'auth_token', '181c0b9e70f66329550900e8f0693f38286b508bb79df68d53a976dbbec07a9c', '[\"*\"]', NULL, NULL, '2025-02-18 15:53:51', '2025-02-18 15:53:51'),
(263, 'App\\Models\\Patient', 58, 'auth_token', 'b403eda79c663c42fc6dd1bc49e9496219b6ef9e430c730bf74254527ee7a913', '[\"*\"]', '2025-02-18 15:54:08', NULL, '2025-02-18 15:54:02', '2025-02-18 15:54:08'),
(264, 'App\\Models\\Patient', 59, 'auth_token', 'afcf1a9ad2cde09605378d38f886dbbf83113d074d770997339a388d24aaadcb', '[\"*\"]', NULL, NULL, '2025-02-18 15:55:35', '2025-02-18 15:55:35'),
(265, 'App\\Models\\Patient', 59, 'auth_token', 'b833856590e37f3bbf608e05a4061b799aa028c97e85a5717bfb7a58ce087887', '[\"*\"]', '2025-02-18 15:56:01', NULL, '2025-02-18 15:55:53', '2025-02-18 15:56:01'),
(266, 'App\\Models\\Patient', 1, 'auth_token', '28c95afbaecd580c9e5b31e7430e6737cdfc0609a0490da65ae04cacac440cd4', '[\"*\"]', '2025-02-19 04:04:24', NULL, '2025-02-19 03:51:40', '2025-02-19 04:04:24'),
(267, 'App\\Models\\Student', 101, 'auth_token', '41f553b082544f91def090d77a7a06e1272122a0ba7a2b8928f912b0b768ab99', '[\"*\"]', '2025-02-19 04:05:03', NULL, '2025-02-19 04:04:51', '2025-02-19 04:05:03'),
(268, 'App\\Models\\Doctor', 56, 'auth_token', '909c3c637fc6045d22ced5acc48837d3f118f01ce18f08b8796c112018e1fd66', '[\"*\"]', NULL, NULL, '2025-02-19 04:05:49', '2025-02-19 04:05:49'),
(269, 'App\\Models\\Doctor', 57, 'auth_token', '7355279f7525cbd789a081f6c9fcb80eb7693b1195be7da7a0cb312a2a63c70b', '[\"*\"]', NULL, NULL, '2025-02-19 04:18:40', '2025-02-19 04:18:40'),
(270, 'App\\Models\\Student', 105, 'auth_token', '49c92beafe4727a3bec1f9b2d35251e76aa2cd9a2d4e43ed96124c1c29faf94f', '[\"*\"]', NULL, NULL, '2025-02-19 04:21:51', '2025-02-19 04:21:51'),
(271, 'App\\Models\\Student', 105, 'auth_token', '61f0fffc9b7725f63921e95055d07eec2e1929c453b7fda1d3cd7e17ed237415', '[\"*\"]', '2025-02-19 04:40:51', NULL, '2025-02-19 04:22:18', '2025-02-19 04:40:51'),
(272, 'App\\Models\\Patient', 60, 'auth_token', '01688c420aabeb24fbe8b46f2269e5f961f1981b9dcbb2b844ee188132aee8f2', '[\"*\"]', NULL, NULL, '2025-02-19 04:48:30', '2025-02-19 04:48:30'),
(273, 'App\\Models\\Patient', 60, 'auth_token', '90237eb67b5b21f2af421503cb2012f8405a4f43fce3835820733d5e758cdcdb', '[\"*\"]', '2025-02-19 04:52:40', NULL, '2025-02-19 04:48:49', '2025-02-19 04:52:40'),
(274, 'App\\Models\\Patient', 60, 'auth_token', 'f00a607faf83e1ca69b50f854f593e329ce85883414ca310416e79365f3f5eac', '[\"*\"]', '2025-02-19 04:56:07', NULL, '2025-02-19 04:53:19', '2025-02-19 04:56:07'),
(275, 'App\\Models\\Patient', 61, 'auth_token', 'f8aa1deeb2f6f2f8c0ffe9462661de732aac1eba9c8f246c5d9bbd55331ec7e5', '[\"*\"]', NULL, NULL, '2025-02-19 04:58:14', '2025-02-19 04:58:14'),
(276, 'App\\Models\\Patient', 61, 'auth_token', '3a6086e2bdafa73135a6b76c187a841376ebd51d3c17cb0526501394d10799b2', '[\"*\"]', '2025-02-19 04:59:20', NULL, '2025-02-19 04:58:59', '2025-02-19 04:59:20'),
(277, 'App\\Models\\Student', 106, 'auth_token', '8b2fed210ab1dcb4ecea4e824ec2691f50fd9306e43f736933c0d54b57050ebf', '[\"*\"]', NULL, NULL, '2025-02-19 06:10:19', '2025-02-19 06:10:19'),
(278, 'App\\Models\\Student', 106, 'auth_token', 'cb305658e14bc4d3db28d9bafb2b3e53494ea7f512119e864ec315e1e23e26d3', '[\"*\"]', '2025-02-19 06:10:37', NULL, '2025-02-19 06:10:29', '2025-02-19 06:10:37'),
(279, 'App\\Models\\Patient', 1, 'auth_token', 'cfc22fa5b56d0398daacb3e775af634aabe3a06a4ab572f8ebdacfeed782a34a', '[\"*\"]', '2025-02-19 07:17:22', NULL, '2025-02-19 07:17:16', '2025-02-19 07:17:22'),
(280, 'App\\Models\\Student', 107, 'auth_token', '60aea3e59104f18c4c17dabe5ea4e6deaa5f94fa0c70927f9414eaf7bb888a7b', '[\"*\"]', NULL, NULL, '2025-02-19 07:54:40', '2025-02-19 07:54:40'),
(281, 'App\\Models\\Student', 107, 'auth_token', '41b682d309f45f992189ba902490ff3252c410cc986de1fb973675e14844c835', '[\"*\"]', '2025-02-19 09:33:44', NULL, '2025-02-19 07:54:51', '2025-02-19 09:33:44'),
(282, 'App\\Models\\Patient', 62, 'auth_token', '2e82677a5cc257b6173fd58f7e2c772c5fcd56624900a63db6544ba673e6c0e8', '[\"*\"]', NULL, NULL, '2025-02-19 09:12:23', '2025-02-19 09:12:23'),
(283, 'App\\Models\\Patient', 62, 'auth_token', 'b11b85c93707b6125bfd5fd3c670bcb5cad996ff6995e1b92767fed21a47f51a', '[\"*\"]', '2025-02-19 09:14:38', NULL, '2025-02-19 09:12:40', '2025-02-19 09:14:38'),
(284, 'App\\Models\\Student', 101, 'auth_token', 'c4dfc1788e73bd015ad5c8a5745036acbc277ad1de080ebb2caa29d9225782cf', '[\"*\"]', '2025-03-01 06:49:58', NULL, '2025-02-19 09:15:01', '2025-03-01 06:49:58'),
(285, 'App\\Models\\Student', 101, 'auth_token', '8fe6624fe1774ca8b519a89874de3580c3b661731f4f5e8e64802b8dc07e8501', '[\"*\"]', '2025-02-19 15:00:11', NULL, '2025-02-19 14:40:17', '2025-02-19 15:00:11'),
(286, 'App\\Models\\Student', 108, 'auth_token', '505f9105a4cfa7fbdd260e673cba70adb8dc986910ed63c374fb4c4441a12339', '[\"*\"]', NULL, NULL, '2025-03-01 14:03:19', '2025-03-01 14:03:19'),
(287, 'App\\Models\\Student', 108, 'auth_token', '1ecdf1d29738e5ccaa6c52f02058e9de107d3813f4f1171c6359f68037e22a09', '[\"*\"]', '2025-03-01 17:35:11', NULL, '2025-03-01 14:03:30', '2025-03-01 17:35:11'),
(288, 'App\\Models\\Doctor', 58, 'auth_token', '708946482cfc0295c69b75119640e616b9646b6c5c736e3976cb3a5f53cb8b13', '[\"*\"]', NULL, NULL, '2025-03-01 17:37:00', '2025-03-01 17:37:00'),
(289, 'App\\Models\\Doctor', 59, 'auth_token', '3505b26f13a27a4d0625fafa87b7749d2652645ba3bbfa7235247c516a48b603', '[\"*\"]', NULL, NULL, '2025-03-01 17:38:29', '2025-03-01 17:38:29'),
(290, 'App\\Models\\Student', 109, 'auth_token', '14a4714155e6692a5b06b31c35f95e7594ff9e93b588b151d3227beeed04defa', '[\"*\"]', NULL, NULL, '2025-03-01 17:41:03', '2025-03-01 17:41:03'),
(291, 'App\\Models\\Student', 109, 'auth_token', '76d033c602dca9be0775a6188e6042b057820939fd1cc1136079b22369f4ed76', '[\"*\"]', '2025-03-01 17:47:52', NULL, '2025-03-01 17:41:37', '2025-03-01 17:47:52'),
(292, 'App\\Models\\Student', 109, 'auth_token', 'c41bb969047347a145c72d2b0662cd8ccf3eaf4da6b5f531ea1b3cc277b114ab', '[\"*\"]', '2025-03-01 17:53:24', NULL, '2025-03-01 17:53:19', '2025-03-01 17:53:24'),
(293, 'App\\Models\\Student', 109, 'auth_token', '9c8ced7555ce8543a479c7799c6bf0831be8b562f6e1f88253ffa63ede8d3263', '[\"*\"]', '2025-03-01 18:18:42', NULL, '2025-03-01 18:05:45', '2025-03-01 18:18:42'),
(294, 'App\\Models\\Student', 109, 'auth_token', 'c8cae3f0ff550550ae174b38201fc3236e2aefee47366a051f8e963b557fa3d7', '[\"*\"]', '2025-03-03 05:51:01', NULL, '2025-03-03 05:39:29', '2025-03-03 05:51:01'),
(295, 'App\\Models\\Doctor', 60, 'auth_token', '8e767bd6c77c6fa058e83ecaf0852c1a919b3c8fb11bedf9611ae957b1a2e74e', '[\"*\"]', NULL, NULL, '2025-03-03 08:59:25', '2025-03-03 08:59:25'),
(296, 'App\\Models\\Doctor', 61, 'auth_token', '61ff8f5884f07b838db277a473c5535e5071b73912fe4dd32460488431e117c0', '[\"*\"]', NULL, NULL, '2025-03-03 09:00:22', '2025-03-03 09:00:22'),
(297, 'App\\Models\\Patient', 63, 'auth_token', 'e0a28075111ac48f5a55d5e572497eb7365f8bcaa8e8fa6d75355cb4f7107985', '[\"*\"]', NULL, NULL, '2025-03-03 09:01:59', '2025-03-03 09:01:59'),
(298, 'App\\Models\\Patient', 63, 'auth_token', '0acd3918f5d935cb83b15665cd0db11e27ae94eb7c9fed201e6c93859bcd32b2', '[\"*\"]', '2025-03-03 09:32:42', NULL, '2025-03-03 09:02:17', '2025-03-03 09:32:42'),
(299, 'App\\Models\\Patient', 63, 'auth_token', 'eb083dd5bcd39e3097a4fa5431b23eb7368985aec04f1c6dca69f2fa9237eaec', '[\"*\"]', '2025-03-03 09:28:32', NULL, '2025-03-03 09:03:32', '2025-03-03 09:28:32'),
(300, 'App\\Models\\Patient', 64, 'auth_token', '68d74dee9b26919d359b69ee22b9a16120c8911234cf1cd552e65938159524d4', '[\"*\"]', NULL, NULL, '2025-03-03 13:35:11', '2025-03-03 13:35:11'),
(301, 'App\\Models\\Patient', 64, 'auth_token', '25e52346d6d1f8729b4f3f1556b37e5755cfb5d5f7aca64b2fa7eb8fba70a3f6', '[\"*\"]', '2025-03-04 04:05:56', NULL, '2025-03-03 13:35:39', '2025-03-04 04:05:56'),
(302, 'App\\Models\\Patient', 2, 'auth_token', '69da43ae4cea3406418d81a8cd812e71e06ea9ceb6a268922fd0e839d113b430', '[\"*\"]', '2025-03-03 15:23:47', NULL, '2025-03-03 15:17:29', '2025-03-03 15:23:47'),
(303, 'App\\Models\\Student', 1, 'auth_token', '79ff3f4897b0116259bf57343d6fec8888ddb0b1bedf00fbf1c3cd0fb21cb5c0', '[\"*\"]', '2025-03-03 15:26:29', NULL, '2025-03-03 15:25:05', '2025-03-03 15:26:29'),
(304, 'App\\Models\\Doctor', 1, 'auth_token', 'e927c68424e6dc81d4ad7a4546349a117ca3a0ba855cc115cd039045ad0e546a', '[\"*\"]', '2025-03-03 15:46:53', NULL, '2025-03-03 15:27:12', '2025-03-03 15:46:53'),
(305, 'App\\Models\\Student', 1, 'auth_token', 'd8ee48100cfb1892249d95294b499bfba7e6d6dc2b0704b46c5b09be9e926dc5', '[\"*\"]', '2025-03-04 14:17:58', NULL, '2025-03-03 15:47:43', '2025-03-04 14:17:58'),
(306, 'App\\Models\\Student', 109, 'auth_token', 'bfbe6a47ae97e70ff026ce3b36a5fc94c1a738bff9e352a7879aa31391e8f04a', '[\"*\"]', '2025-03-03 19:38:52', NULL, '2025-03-03 19:38:20', '2025-03-03 19:38:52'),
(307, 'App\\Models\\Patient', 64, 'auth_token', '03d69b71b86e76dfa290f0b5ea70508fd61001348d260267953827e791c4636e', '[\"*\"]', '2025-03-04 04:20:03', NULL, '2025-03-04 04:09:52', '2025-03-04 04:20:03'),
(308, 'App\\Models\\Patient', 65, 'auth_token', '1db4678ff07784960779a73be56c267020572a12438d80422d2c61a264e13031', '[\"*\"]', NULL, NULL, '2025-03-04 05:32:13', '2025-03-04 05:32:13'),
(309, 'App\\Models\\Patient', 2, 'auth_token', '6d3be1afbc8747946069cdb57143669d7edc2f3b318e439c6542fbd821c5ade8', '[\"*\"]', '2025-03-04 14:27:03', NULL, '2025-03-04 14:18:35', '2025-03-04 14:27:03'),
(310, 'App\\Models\\Student', 1, 'auth_token', '6446800fa65ac56fdcf56bb195689842d93c6af97c3d54c48bd9398bd8127175', '[\"*\"]', '2025-03-07 08:50:00', NULL, '2025-03-04 14:28:00', '2025-03-07 08:50:00'),
(311, 'App\\Models\\Doctor', 52, 'auth_token', 'cd4f9e1825856cd6675b6603578cede9b5b545fba851c6d54a6eead4998da80a', '[\"*\"]', '2025-03-11 04:57:46', NULL, '2025-03-07 08:26:43', '2025-03-11 04:57:46'),
(312, 'App\\Models\\Patient', 66, 'auth_token', 'a1ac138a9cab62e7d1b63b3d983999e3a50b9ed90744887d1a0a18745853297d', '[\"*\"]', NULL, NULL, '2025-03-07 08:37:25', '2025-03-07 08:37:25'),
(313, 'App\\Models\\Patient', 66, 'auth_token', '8beed9c0b1446cb9ec31fddeca4f73c0d62835cf6879850f13b588cfc503a7fa', '[\"*\"]', '2025-03-07 08:44:45', NULL, '2025-03-07 08:41:30', '2025-03-07 08:44:45'),
(314, 'App\\Models\\Student', 1, 'auth_token', 'd704bffe3c2664e708485613a68e5b7f90b63925a2f39f6ec03b3c723ccf91c1', '[\"*\"]', '2025-03-20 09:08:54', NULL, '2025-03-07 08:51:13', '2025-03-20 09:08:54'),
(315, 'App\\Models\\Patient', 67, 'auth_token', '83b6875351a3b0a4f21db429420544a36a5028abd2d0defcce920e2dea4c84d6', '[\"*\"]', NULL, NULL, '2025-03-07 11:36:52', '2025-03-07 11:36:52'),
(316, 'App\\Models\\Patient', 65, 'auth_token', '24a8395f4a4cb9ff86c8ff9b42e087fd259639e12683a2836c3e064ff92d0930', '[\"*\"]', '2025-03-07 12:55:39', NULL, '2025-03-07 12:52:13', '2025-03-07 12:55:39'),
(317, 'App\\Models\\Patient', 67, 'auth_token', '5ccedf426e5d115130259e443e034caea7a65ae327955f7e0732fefafa4b7f17', '[\"*\"]', '2025-03-07 13:14:57', NULL, '2025-03-07 13:12:52', '2025-03-07 13:14:57'),
(318, 'App\\Models\\Patient', 67, 'auth_token', '2f2a08d5ba2cb865a3934a071e5978db73b84590fb13b2f73f426e268791daa7', '[\"*\"]', '2025-03-07 15:37:27', NULL, '2025-03-07 15:37:24', '2025-03-07 15:37:27'),
(319, 'App\\Models\\Patient', 67, 'auth_token', 'b9c1b7738485f276d0c6edb01bc11c5eae865b050681911500bc88edecd99935', '[\"*\"]', '2025-03-09 04:59:06', NULL, '2025-03-09 04:54:06', '2025-03-09 04:59:06'),
(320, 'App\\Models\\Patient', 67, 'auth_token', '42aa5606c1c87ba6ab332986166e7eac8a21e62f27f2265affa170315c3ac915', '[\"*\"]', '2025-03-12 08:46:20', NULL, '2025-03-09 05:01:25', '2025-03-12 08:46:20'),
(321, 'App\\Models\\Patient', 67, 'auth_token', 'ea2f76779d0526984f0b41e01282c10055497d119705e2dc43142b601e00d1d4', '[\"*\"]', '2025-03-10 13:37:10', NULL, '2025-03-09 05:26:01', '2025-03-10 13:37:10'),
(322, 'App\\Models\\Patient', 67, 'auth_token', 'd9a0db5c18083f7c0cdf7197cf5771f6ca6f8698e0aa3275dc37a99b80449907', '[\"*\"]', '2025-03-10 13:53:36', NULL, '2025-03-10 13:37:27', '2025-03-10 13:53:36'),
(323, 'App\\Models\\Patient', 67, 'auth_token', '4bf7d6b55fcc541ff7ac5c64183f20c8b2438073090516e8c4ceb3e6ecbca894', '[\"*\"]', '2025-03-11 05:19:57', NULL, '2025-03-10 13:37:31', '2025-03-11 05:19:57'),
(324, 'App\\Models\\Patient', 67, 'auth_token', '1f05ee7aca6eeab15062968bfc236f71324f1b76f159f803c968b2e6d1ef0cf4', '[\"*\"]', '2025-03-11 04:21:39', NULL, '2025-03-11 04:18:58', '2025-03-11 04:21:39'),
(325, 'App\\Models\\Patient', 67, 'auth_token', 'cb82c0fdf1b599aa5dfed1afc283ca8a25c76663c26a169877695e928295e873', '[\"*\"]', '2025-03-11 16:01:34', NULL, '2025-03-11 04:22:14', '2025-03-11 16:01:34'),
(326, 'App\\Models\\Doctor', 52, 'auth_token', 'bec4305ce9aca6e749c048539383a4857a6830f986cf6a94359409a00a9c6701', '[\"*\"]', '2025-03-20 07:51:51', NULL, '2025-03-11 05:03:45', '2025-03-20 07:51:51'),
(327, 'App\\Models\\Patient', 67, 'auth_token', '0e7934f28052c20f7b5336d293398550c47664b8168cab2ea226a43b7b7e0570', '[\"*\"]', '2025-03-11 15:48:20', NULL, '2025-03-11 05:21:29', '2025-03-11 15:48:20'),
(328, 'App\\Models\\Patient', 68, 'auth_token', '12d09b6b61cc069a75da215c697c17d3cf87586cbd5aa08e4dd642a23ee41b84', '[\"*\"]', NULL, NULL, '2025-03-11 07:03:55', '2025-03-11 07:03:55'),
(329, 'App\\Models\\Patient', 68, 'auth_token', 'babd1c84a71f9b24c3f538cc00e7bb56ac28de52fd9f522c2ed36261f6169743', '[\"*\"]', '2025-03-15 20:21:07', NULL, '2025-03-11 07:04:17', '2025-03-15 20:21:07'),
(330, 'App\\Models\\Patient', 67, 'auth_token', 'da4dae6bf4e5f49460b006c80dc8aeda7fcb63e73ff1f247a31986016387bc73', '[\"*\"]', '2025-03-11 15:40:41', NULL, '2025-03-11 15:30:15', '2025-03-11 15:40:41'),
(331, 'App\\Models\\Patient', 67, 'auth_token', '02058a48068d9b0ecf07cc37b1e1a6d4ecbabf2bf32b5a4f10e70c186d60321f', '[\"*\"]', '2025-03-11 22:21:01', NULL, '2025-03-11 22:15:04', '2025-03-11 22:21:01'),
(332, 'App\\Models\\Patient', 67, 'auth_token', '13c3b32d49f8b6f23a786ef614a55136880dd70613a0f0c7ebec3fb7ab0d502a', '[\"*\"]', '2025-03-12 08:39:20', NULL, '2025-03-11 22:50:49', '2025-03-12 08:39:20'),
(333, 'App\\Models\\Patient', 65, 'auth_token', 'b5b9fd42c6bf8c72bbfa71ea769299685488b090852c4cdfb842b1dc5f433943', '[\"*\"]', '2025-03-12 07:59:10', NULL, '2025-03-11 22:58:21', '2025-03-12 07:59:10'),
(334, 'App\\Models\\Patient', 65, 'auth_token', 'dfc0b5eb453e7ae49c02bf29f4c33d7e7611b4da0788da4cf54341bc29b7c895', '[\"*\"]', '2025-03-12 08:23:13', NULL, '2025-03-12 08:05:44', '2025-03-12 08:23:13'),
(335, 'App\\Models\\Patient', 65, 'auth_token', 'e50e29d0ae4b8a8f60f23401a1597b3899ba32c3e789033d5323fc047fbd09e6', '[\"*\"]', '2025-03-12 08:24:47', NULL, '2025-03-12 08:24:38', '2025-03-12 08:24:47'),
(336, 'App\\Models\\Patient', 65, 'auth_token', '3014efe65a02189b176e2cf1fd37c137dcdf2b4c67c3db7516d51ccb783f8bf3', '[\"*\"]', '2025-03-12 08:26:55', NULL, '2025-03-12 08:26:38', '2025-03-12 08:26:55'),
(337, 'App\\Models\\Doctor', 62, 'auth_token', '5db22df6343ded2e313049c39cc01a49221db40d3eb989c3ceb9ae82cbdd1071', '[\"*\"]', NULL, NULL, '2025-03-12 08:28:55', '2025-03-12 08:28:55'),
(338, 'App\\Models\\Doctor', 62, 'auth_token', '10c09e125eda1f13a9cefb734a3250ea35040e4db2a5081c57f41ec15d106e18', '[\"*\"]', '2025-03-12 09:23:04', NULL, '2025-03-12 08:39:35', '2025-03-12 09:23:04'),
(339, 'App\\Models\\Doctor', 62, 'auth_token', '4057e5f0e584acbb049250236d76344262fdcf054ef490e09278aeea9d06a681', '[\"*\"]', '2025-03-16 05:46:47', NULL, '2025-03-12 08:46:47', '2025-03-16 05:46:47'),
(340, 'App\\Models\\Doctor', 62, 'auth_token', '9a2ec62c3350495ae2d67de98d86707c179b19e434564bda334483d56d32794d', '[\"*\"]', '2025-03-19 09:37:38', NULL, '2025-03-12 09:17:55', '2025-03-19 09:37:38'),
(341, 'App\\Models\\Patient', 67, 'auth_token', 'efdcd199363e049dc6580c5781257e4ca2112a1132b18fc18906d07c14630ad4', '[\"*\"]', '2025-03-12 09:26:03', NULL, '2025-03-12 09:23:33', '2025-03-12 09:26:03'),
(342, 'App\\Models\\Doctor', 52, 'auth_token', 'bb5632b274413f6399e6eb11b7eec6423235ca7d129d1f3db4ae82a32bf8f710', '[\"*\"]', NULL, NULL, '2025-03-12 12:56:52', '2025-03-12 12:56:52'),
(343, 'App\\Models\\Patient', 67, 'auth_token', '2813098d9a2c1c974d545170761ac786a7bf16f55542c0d658bc1675d99bdb16', '[\"*\"]', '2025-03-18 04:54:14', NULL, '2025-03-16 05:55:06', '2025-03-18 04:54:14'),
(344, 'App\\Models\\Patient', 69, 'auth_token', '987ac0dded06f878f904c5fae68dff5de6188bdb95bef187347f6e667a1c20cb', '[\"*\"]', NULL, NULL, '2025-03-17 08:49:18', '2025-03-17 08:49:18'),
(345, 'App\\Models\\Patient', 69, 'auth_token', '8b20fff4c6001a83308af74ae429b222d0ddc0e9cf4d8d73350e7a2df45c4fa6', '[\"*\"]', '2025-03-17 08:52:13', NULL, '2025-03-17 08:49:52', '2025-03-17 08:52:13'),
(346, 'App\\Models\\Doctor', 7, 'auth_token', '6c4e4c0b81afa8905e2bd4a5db93219e0479f324618c22eb70ddca8aec98230d', '[\"*\"]', '2025-03-18 04:33:50', NULL, '2025-03-18 03:52:53', '2025-03-18 04:33:50'),
(347, 'App\\Models\\Patient', 67, 'auth_token', '48749e57e67b0c9db0c44c91558d23f9ae09a567199ceb157d1a8823b4bbf4ad', '[\"*\"]', '2025-03-19 09:01:36', NULL, '2025-03-18 05:27:50', '2025-03-19 09:01:36'),
(348, 'App\\Models\\Patient', 67, 'auth_token', '6a2af41ecdb776d88faaaccc0c896503ee418fc9392195df0fdbbc0d5bad94ed', '[\"*\"]', '2025-03-23 05:50:31', NULL, '2025-03-18 10:08:07', '2025-03-23 05:50:31'),
(349, 'App\\Models\\Patient', 67, 'auth_token', '9e0962bf3b60493deef5298c47ac05d3ac4e76369333b89837d1e76b1f9e077a', '[\"*\"]', '2025-03-19 08:24:23', NULL, '2025-03-19 07:34:53', '2025-03-19 08:24:23'),
(350, 'App\\Models\\Doctor', 2, 'auth_token', '27f129db40b7f5997036e010f062ddd99b6fbfa93bceacf58c25a9a70e487046', '[\"*\"]', '2025-03-19 09:33:11', NULL, '2025-03-19 09:02:00', '2025-03-19 09:33:11'),
(351, 'App\\Models\\Doctor', 2, 'auth_token', '6696c937281af1d9532d44a9ceda09fa949b013f110cb8142991b5bc2eb85342', '[\"*\"]', '2025-03-20 06:42:27', NULL, '2025-03-19 09:17:43', '2025-03-20 06:42:27'),
(352, 'App\\Models\\Patient', 67, 'auth_token', '708605a5e1f77a54c8c2a074f6f224490ba9c2d16a23d97eb1a146ce149cce26', '[\"*\"]', '2025-03-19 09:47:48', NULL, '2025-03-19 09:33:31', '2025-03-19 09:47:48'),
(353, 'App\\Models\\Patient', 67, 'auth_token', 'd2b404757e2468301c8464c76e0d179c2dd1e38e4558e13c15fcd9bc25c3950c', '[\"*\"]', '2025-03-19 09:51:33', NULL, '2025-03-19 09:38:15', '2025-03-19 09:51:33'),
(354, 'App\\Models\\Patient', 65, 'auth_token', '72c7aa3d06042ce33de5747ea7e2c2874a36be75ec8f56b732a9977540777360', '[\"*\"]', '2025-03-20 10:01:25', NULL, '2025-03-19 11:59:27', '2025-03-20 10:01:25'),
(355, 'App\\Models\\Doctor', 2, 'auth_token', 'f58c5d5fdcf995cbc8807fab3e1ca533f33c91d8e40c4a858bddea3a3d3cee10', '[\"*\"]', '2025-03-20 04:47:18', NULL, '2025-03-20 04:14:42', '2025-03-20 04:47:18'),
(356, 'App\\Models\\Patient', 67, 'auth_token', '875decac0238138df6f5633a012339d76a2d85741c624084b885167dc7a405e8', '[\"*\"]', '2025-03-20 08:54:00', NULL, '2025-03-20 04:48:45', '2025-03-20 08:54:00'),
(357, 'App\\Models\\Patient', 67, 'auth_token', '2d9ebedb1b1214fc4e09acd47d67ce0dfa90a8b64e9f0eda0b0090cd62c84bef', '[\"*\"]', '2025-03-20 12:05:10', NULL, '2025-03-20 05:28:08', '2025-03-20 12:05:10'),
(358, 'App\\Models\\Patient', 67, 'auth_token', 'c07e0c71258186c6cc19ac3b083f52c4c56c8574eb5025ba292d487293773f8d', '[\"*\"]', NULL, NULL, '2025-03-20 06:42:58', '2025-03-20 06:42:58'),
(359, 'App\\Models\\Patient', 67, 'auth_token', 'a46bf4fbaeece91189ce4be2f0396f95ae0c14ac6a73730345e39c3451762c21', '[\"*\"]', NULL, NULL, '2025-03-20 06:43:03', '2025-03-20 06:43:03'),
(360, 'App\\Models\\Patient', 67, 'auth_token', 'a41f52ca081a0acc5eab818ced6ee1fed99f10a08a9a4de218a6b52bb738bd06', '[\"*\"]', NULL, NULL, '2025-03-20 06:43:16', '2025-03-20 06:43:16'),
(361, 'App\\Models\\Patient', 67, 'auth_token', 'f223c5d27eaca68d55c7470d79ffc3735b213a80cd685863e52f7beb5b6fbe61', '[\"*\"]', NULL, NULL, '2025-03-20 06:43:25', '2025-03-20 06:43:25'),
(362, 'App\\Models\\Patient', 67, 'auth_token', '72d8a5add533ad7c9fdc7ebf63456715bab500d6049d31d6cab99ba3af004b89', '[\"*\"]', '2025-03-20 07:22:36', NULL, '2025-03-20 06:57:59', '2025-03-20 07:22:36'),
(363, 'App\\Models\\Patient', 67, 'auth_token', '51e297cdfcd61ae32841e2344567851bdee66ea39b7fb0b27e1a880b9374d87c', '[\"*\"]', '2025-03-20 09:01:33', NULL, '2025-03-20 08:14:23', '2025-03-20 09:01:33'),
(364, 'App\\Models\\Doctor', 61, 'auth_token', '9a9a79a5833f15ddd93abb7dbd4ecd2d9af8a348256d02f0bdb0da9a4b5366fb', '[\"*\"]', '2025-03-20 10:06:24', NULL, '2025-03-20 08:56:46', '2025-03-20 10:06:24'),
(365, 'App\\Models\\Doctor', 61, 'auth_token', 'cbdc132664201aaa7b98f3b3c2b99a895b5084c1e8e8bc69acf4972736f5346f', '[\"*\"]', '2025-03-20 09:22:11', NULL, '2025-03-20 09:07:26', '2025-03-20 09:22:11'),
(366, 'App\\Models\\Patient', 67, 'auth_token', '2fce7e195c299bea6b4dffdc02481b0ee2cbe3e0d184d8d969395084cb859bdd', '[\"*\"]', '2025-03-20 09:45:21', NULL, '2025-03-20 09:45:02', '2025-03-20 09:45:21'),
(367, 'App\\Models\\Doctor', 61, 'auth_token', '875e15af9b36a5bfbd6983e51712e14655588f016a986b3347092fbd3df70c0e', '[\"*\"]', '2025-03-20 10:24:40', NULL, '2025-03-20 09:45:44', '2025-03-20 10:24:40'),
(368, 'App\\Models\\Doctor', 61, 'auth_token', '126f3af251bb815df9cf1a3ced4531d27bc8787dccefdb54ed4952992b768f24', '[\"*\"]', '2025-04-20 05:17:10', NULL, '2025-03-20 10:02:21', '2025-04-20 05:17:10'),
(369, 'App\\Models\\Doctor', 62, 'auth_token', 'd84edc7d949dea7c1ee75231a501d81cc94a1f377cbcc2dc7d1512a9283fd4cf', '[\"*\"]', '2025-03-20 10:34:32', NULL, '2025-03-20 10:25:07', '2025-03-20 10:34:32'),
(370, 'App\\Models\\Doctor', 62, 'auth_token', 'a70065d0387c8162db51967197bac053eb7dc78a84e0b9e095e119b32bb89e86', '[\"*\"]', '2025-03-20 10:25:17', NULL, '2025-03-20 10:25:10', '2025-03-20 10:25:17'),
(371, 'App\\Models\\Doctor', 61, 'auth_token', '40e86c51fc38702d9b876c7b98fff2f0f6d7e2cd02826b1f51cfce6b2680ce93', '[\"*\"]', '2025-03-24 04:17:49', NULL, '2025-03-20 10:25:42', '2025-03-24 04:17:49'),
(372, 'App\\Models\\Doctor', 65, 'auth_token', '0f8d80ce790ceda5fbe19d1a14e21e08c7198be5204dfe85c138fb19e0fdf256', '[\"*\"]', NULL, NULL, '2025-03-21 23:53:38', '2025-03-21 23:53:38'),
(373, 'App\\Models\\Doctor', 66, 'auth_token', 'ceec3ab1b023202fb1f65d4b54007aa9ad945dbaa26f386da271d1e30be81ff0', '[\"*\"]', NULL, NULL, '2025-03-23 05:26:53', '2025-03-23 05:26:53'),
(374, 'App\\Models\\Doctor', 61, 'auth_token', '1c32271939471a3aa3894701ef6ff540afa562b268906565e8cb8f8519a8f725', '[\"*\"]', '2025-03-23 05:41:58', NULL, '2025-03-23 05:28:46', '2025-03-23 05:41:58'),
(375, 'App\\Models\\Patient', 67, 'auth_token', '9f6bc13996e58b34dddf70c9f15b361fa6b94be3177c2cfd6144e0301b7ed5ba', '[\"*\"]', '2025-03-23 06:17:27', NULL, '2025-03-23 05:43:40', '2025-03-23 06:17:27'),
(376, 'App\\Models\\Doctor', 61, 'auth_token', '177382a1488663bb60ae16495be4ad44c27304cbc06e1ebe7121711894b2ccd9', '[\"*\"]', '2025-03-23 06:17:49', NULL, '2025-03-23 05:51:11', '2025-03-23 06:17:49'),
(377, 'App\\Models\\Doctor', 61, 'auth_token', '13fabdc213f0bbd9b2766bf0f23d41b8d4e9d8f6bab3b327d89567b0e299e7d7', '[\"*\"]', '2025-03-24 04:42:47', NULL, '2025-03-23 06:05:34', '2025-03-24 04:42:47'),
(378, 'App\\Models\\Patient', 67, 'auth_token', '61fe267c5283d992f41ee2d60afa27b5c8ab9c888b0c57bae371c9d97a4dedb9', '[\"*\"]', '2025-03-23 09:45:22', NULL, '2025-03-23 06:23:13', '2025-03-23 09:45:22'),
(379, 'App\\Models\\Doctor', 2, 'auth_token', '6c2aa5d0b642a9b7adccf13833ebc41aeee90435938fbaffeacdedaf743fbfba', '[\"*\"]', NULL, NULL, '2025-03-23 12:50:35', '2025-03-23 12:50:35'),
(380, 'App\\Models\\Patient', 3, 'auth_token', '27062f744e82ebde2a21aa42f80a86bf7c849ca1d64e2899f59156ee92d9a192', '[\"*\"]', NULL, NULL, '2025-03-23 12:51:19', '2025-03-23 12:51:19'),
(381, 'App\\Models\\Student', 3, 'auth_token', 'a8cafc491186156df1e546cdf238a7906b3294735b92dbc4029e2f6aa682f549', '[\"*\"]', NULL, NULL, '2025-03-23 12:51:53', '2025-03-23 12:51:53'),
(382, 'App\\Models\\Doctor', 46, 'auth_token', '4e8e19ab35f48785dec49fd3ec7622de5327929eb89d8fb02cbd870fde57a331', '[\"*\"]', NULL, NULL, '2025-03-23 13:16:50', '2025-03-23 13:16:50'),
(383, 'App\\Models\\Doctor', 46, 'auth_token', 'aac45585015b6be4514024d9f89b56614972bb6bc289ef6b1918f21abafe1189', '[\"*\"]', NULL, NULL, '2025-03-23 13:17:29', '2025-03-23 13:17:29'),
(384, 'App\\Models\\Doctor', 60, 'auth_token', '0e2faba6dc043e3f8bf2569e8dcd37bf594531575719d5f3a039b18f03aad9e2', '[\"*\"]', NULL, NULL, '2025-03-23 13:18:11', '2025-03-23 13:18:11'),
(385, 'App\\Models\\Doctor', 49, 'auth_token', 'f239414be1be315980b38302b09154c538da43e8b1baeaa9934ae69156963512', '[\"*\"]', NULL, NULL, '2025-03-23 13:20:35', '2025-03-23 13:20:35'),
(386, 'App\\Models\\Doctor', 49, 'auth_token', '874d51ed2688130935d8ca776046987b971c7772a2020cb988ccedbd2f4e5db8', '[\"*\"]', '2025-03-23 15:58:33', NULL, '2025-03-23 13:22:00', '2025-03-23 15:58:33'),
(387, 'App\\Models\\Doctor', 4, 'auth_token', '9cca90b0a01a94efd3b5157a74f5d0f91368a07de480fc0a355ac23ffef1d667', '[\"*\"]', '2025-03-23 15:55:39', NULL, '2025-03-23 15:53:21', '2025-03-23 15:55:39'),
(388, 'App\\Models\\Doctor', 60, 'auth_token', 'd5c73ce828fd668a9108e697a85b94158d2345852fceafdb0b9eef1cd5891f0b', '[\"*\"]', '2025-03-23 16:05:41', NULL, '2025-03-23 15:57:08', '2025-03-23 16:05:41'),
(389, 'App\\Models\\Doctor', 60, 'auth_token', '2b00cccaa4e3376216dd6f830fa345df6b3c98a13f7f9e7ad0a8cdc7f91608bc', '[\"*\"]', '2025-03-24 03:39:48', NULL, '2025-03-23 16:00:55', '2025-03-24 03:39:48'),
(390, 'App\\Models\\Patient', 64, 'auth_token', 'a66c56d728cb0b4e9ca8ce0bfcd8efa24f07a7cc59e7426a46d75bf50bd8d72c', '[\"*\"]', '2025-03-24 04:20:59', NULL, '2025-03-24 04:20:29', '2025-03-24 04:20:59'),
(391, 'App\\Models\\Doctor', 61, 'auth_token', '52dde1aeee569eea446bc4cd6b66085fadb2b099fe14f20fe810fb17cf5fd3d8', '[\"*\"]', '2025-03-24 06:05:27', NULL, '2025-03-24 04:22:37', '2025-03-24 06:05:27'),
(392, 'App\\Models\\Doctor', 66, 'auth_token', '4349b2c9c1215d7dda1b027f121690cdc4b26025a149f34eec9fcc81b89edcb0', '[\"*\"]', '2025-03-24 08:35:11', NULL, '2025-03-24 06:02:26', '2025-03-24 08:35:11'),
(393, 'App\\Models\\Doctor', 61, 'auth_token', '51a547c68bad57d870d332f526220d750384d13553b3c776ebc8a0e7c64a77bf', '[\"*\"]', '2025-03-24 06:11:08', NULL, '2025-03-24 06:06:00', '2025-03-24 06:11:08'),
(394, 'App\\Models\\Doctor', 61, 'auth_token', '8d594c9599a51d648ced679de3901ae84dfc3791783754e2a957d48c6ae9022f', '[\"*\"]', '2025-03-25 05:14:54', NULL, '2025-03-24 06:32:55', '2025-03-25 05:14:54'),
(395, 'App\\Models\\Doctor', 67, 'auth_token', '9c6f6a8ab2ba087c53138a9bfdc3d18571ee3e405b23305a6b1eaf378e0a187b', '[\"*\"]', NULL, NULL, '2025-03-24 08:36:43', '2025-03-24 08:36:43'),
(396, 'App\\Models\\Patient', 70, 'auth_token', '764f51653257b57f23d3952cd01f1b5cb08ee1614514ab508cdf34ff1dd04210', '[\"*\"]', NULL, NULL, '2025-03-24 08:39:07', '2025-03-24 08:39:07'),
(397, 'App\\Models\\Patient', 71, 'auth_token', 'c8b6f059ed13bbde242661bedf57ae3404007eb51f5b448a9a49f9d5eb961492', '[\"*\"]', NULL, NULL, '2025-03-24 08:41:00', '2025-03-24 08:41:00'),
(398, 'App\\Models\\Doctor', 61, 'auth_token', 'caaecc013cd4349e3a1fb0967271ba70d68cc16f9cdba91a1cdaf7d005f4186e', '[\"*\"]', '2025-03-25 04:54:45', NULL, '2025-03-24 08:41:56', '2025-03-25 04:54:45'),
(399, 'App\\Models\\Doctor', 68, 'auth_token', '67f36bae957659e461bd44647a5ed35de6f6b7186e31cd0aff19cf9d89c2f206', '[\"*\"]', NULL, NULL, '2025-03-24 09:53:38', '2025-03-24 09:53:38'),
(400, 'App\\Models\\Doctor', 52, 'auth_token', '8ea274ea9cfe245ff32788ba4ce737c4b914b0e63a889b9ed3120208bff3b943', '[\"*\"]', '2025-03-25 04:55:12', NULL, '2025-03-24 11:43:17', '2025-03-25 04:55:12'),
(401, 'App\\Models\\Patient', 72, 'auth_token', '70b3c95d1e22fc886df31c167ccd0de82e381432dcc5d52a3a3233c3544c4f72', '[\"*\"]', NULL, NULL, '2025-03-24 13:14:18', '2025-03-24 13:14:18'),
(402, 'App\\Models\\Patient', 72, 'auth_token', 'bda6f64a18012f77d3bcff17044bfb2d1856226fb93cb65fb31d5be5b422a52f', '[\"*\"]', '2025-05-27 11:09:16', NULL, '2025-03-24 13:14:36', '2025-05-27 11:09:16'),
(403, 'App\\Models\\Patient', 70, 'auth_token', '5abcdd11fa661ca1b12e489ea8fc91076b189a36792b60d523b3921881fe2b16', '[\"*\"]', '2025-04-10 07:13:53', NULL, '2025-03-25 04:41:17', '2025-04-10 07:13:53'),
(404, 'App\\Models\\Student', 112, 'auth_token', '4a2dccc19ffcde58c53c6af0383f874633690bf91c705a4f22e586faeda7908f', '[\"*\"]', NULL, NULL, '2025-04-06 08:45:34', '2025-04-06 08:45:34'),
(405, 'App\\Models\\Student', 112, 'auth_token', '3dfe4655abe927f6c90ad33ed1e60a563c85e5e5a3435cd621c92b0b12e49d4e', '[\"*\"]', '2025-04-06 09:29:08', NULL, '2025-04-06 08:45:55', '2025-04-06 09:29:08'),
(406, 'App\\Models\\Doctor', 70, 'auth_token', 'ec1721333ae0c16dc4dafe1b2f2c47eff2d72b266fb431a2389914174b242884', '[\"*\"]', NULL, NULL, '2025-04-10 06:32:21', '2025-04-10 06:32:21'),
(407, 'App\\Models\\Patient', 74, 'auth_token', 'c8bd323e62d005711ef9a90a778c6d4863369c433df47d02f7e197ee7dc71638', '[\"*\"]', NULL, NULL, '2025-04-10 07:07:11', '2025-04-10 07:07:11'),
(408, 'App\\Models\\Doctor', 61, 'auth_token', 'c7c42389069d9f6d122495a566321f5477974a9f6f17e14daf553e5ffe6d9de4', '[\"*\"]', '2025-04-10 07:08:54', NULL, '2025-04-10 07:08:50', '2025-04-10 07:08:54'),
(409, 'App\\Models\\Doctor', 70, 'auth_token', '2457ba092e125f0118f12b4e91627a6c941db5e3b9d6b0d2bbdc56bb51a0b520', '[\"*\"]', '2025-04-10 07:10:07', NULL, '2025-04-10 07:10:03', '2025-04-10 07:10:07'),
(410, 'App\\Models\\Doctor', 70, 'auth_token', '99965f15a2afbe637c2b179291647670652f47f1fa3cc88a8490b87949628f34', '[\"*\"]', '2025-04-10 07:13:28', NULL, '2025-04-10 07:11:07', '2025-04-10 07:13:28'),
(411, 'App\\Models\\Doctor', 70, 'auth_token', '9185468e480d1f906a317cae1491066048f7554bff2cde80be6560f0068be973', '[\"*\"]', '2025-04-10 10:27:07', NULL, '2025-04-10 07:15:23', '2025-04-10 10:27:07'),
(412, 'App\\Models\\Doctor', 70, 'auth_token', '905011040a8fd5b32a6e60bba4d57b007e327a68ac1fb7f7ff018f368b7b8338', '[\"*\"]', '2025-04-20 05:22:53', NULL, '2025-04-10 08:27:20', '2025-04-20 05:22:53'),
(413, 'App\\Models\\Patient', 74, 'auth_token', '82f09254c6b414ac569d4031c4b161834c5353206cc8f3f6503507a2d82dfea2', '[\"*\"]', '2025-04-10 11:12:26', NULL, '2025-04-10 10:29:08', '2025-04-10 11:12:26'),
(414, 'App\\Models\\Doctor', 70, 'auth_token', 'ac4f610f2b816de76e7598900eded50c49d872f103483011393ea4f789dd6df1', '[\"*\"]', '2025-04-13 03:59:02', NULL, '2025-04-10 11:12:59', '2025-04-13 03:59:02'),
(415, 'App\\Models\\Patient', 75, 'auth_token', '65ebc8e927f53ac01e0054d4278aa26278db6265a4a8974603ec8adbfc22a162', '[\"*\"]', NULL, NULL, '2025-04-13 04:00:21', '2025-04-13 04:00:21'),
(416, 'App\\Models\\Patient', 75, 'auth_token', '4ebb12770a3601965ec5dad4757e629b993671c8016a83c16de9902e86eec58f', '[\"*\"]', '2025-04-13 04:01:17', NULL, '2025-04-13 04:00:44', '2025-04-13 04:01:17'),
(417, 'App\\Models\\Patient', 76, 'auth_token', 'adde067f013d1f8ab75b5537f20636fda959192b307607347489a00c37b642b7', '[\"*\"]', NULL, NULL, '2025-04-13 04:09:31', '2025-04-13 04:09:31'),
(418, 'App\\Models\\Patient', 76, 'auth_token', '83aeb3066c8a70d0cabf6834033951308b64451cda67e68e656afa99fd37f499', '[\"*\"]', '2025-04-20 03:53:40', NULL, '2025-04-13 04:09:46', '2025-04-20 03:53:40'),
(419, 'App\\Models\\Patient', 77, 'auth_token', 'c75b4c279a3597b678c26c5688939d8d875de9555e3982b2b826c2ffc6d41621', '[\"*\"]', NULL, NULL, '2025-04-15 15:51:58', '2025-04-15 15:51:58'),
(420, 'App\\Models\\Patient', 77, 'auth_token', '8cadf5898efe3b09200422749bcbc29c2096a8a7b5264bfcfb1d17e4cfd1d78c', '[\"*\"]', '2025-04-19 15:23:51', NULL, '2025-04-15 15:52:37', '2025-04-19 15:23:51'),
(421, 'App\\Models\\Doctor', 61, 'auth_token', '6de33683064b7af73b392491cb7bfa072bdd211be2c2b781d1b4f35db5364479', '[\"*\"]', '2025-04-19 15:31:34', NULL, '2025-04-19 15:24:04', '2025-04-19 15:31:34'),
(422, 'App\\Models\\Doctor', 61, 'auth_token', '5f7e958857d72822d8bec8aa7c4fa4e215daa3e6607d0b0b0af4db54bd312fcd', '[\"*\"]', '2025-04-19 16:06:33', NULL, '2025-04-19 16:06:30', '2025-04-19 16:06:33'),
(423, 'App\\Models\\Doctor', 61, 'auth_token', 'f931c540904d3b1efc67884863973e2c5eb6ae53ed9816957765d506f539d120', '[\"*\"]', '2025-04-22 09:11:07', NULL, '2025-04-20 03:52:33', '2025-04-22 09:11:07'),
(424, 'App\\Models\\Patient', 78, 'auth_token', '6fe6df7f39014d03795025f2191989b8a37e3efac21e61a9e8ed67e0065db128', '[\"*\"]', NULL, NULL, '2025-04-20 04:03:44', '2025-04-20 04:03:44'),
(425, 'App\\Models\\Patient', 78, 'auth_token', '71bad7ba52f97423c8af227893940f964d135c246e849db29b8c4fdbf5318792', '[\"*\"]', '2025-04-20 05:09:14', NULL, '2025-04-20 04:04:59', '2025-04-20 05:09:14'),
(426, 'App\\Models\\Student', 112, 'auth_token', '28d61950f9a918cd37753e0a7a5015f2ccb5f0b016b2224cfe71b05625542eea', '[\"*\"]', '2025-04-20 04:53:12', NULL, '2025-04-20 04:06:40', '2025-04-20 04:53:12'),
(427, 'App\\Models\\Doctor', 70, 'auth_token', 'cf2641d9e1f926fdf1a53433ee5b6ccbf7714e3ef49f6a0fceec0a08532684fa', '[\"*\"]', '2025-04-20 05:08:10', NULL, '2025-04-20 04:14:21', '2025-04-20 05:08:10'),
(428, 'App\\Models\\Patient', 78, 'auth_token', '8cd4c3ecaf3153e982808a59cdb28534fd05afe79bb2081af3a10ae8082e6f11', '[\"*\"]', '2025-04-21 05:10:15', NULL, '2025-04-20 05:17:33', '2025-04-21 05:10:15'),
(429, 'App\\Models\\Doctor', 70, 'auth_token', 'a8612dc71b095530fcf9e56d747b78dd4104c6fc630341ba02ce4a28a169c13f', '[\"*\"]', '2025-04-20 05:23:40', NULL, '2025-04-20 05:23:17', '2025-04-20 05:23:40'),
(430, 'App\\Models\\Doctor', 70, 'auth_token', '2f6102c255c5e3dc6c99c30ac83a27221e45d3bbf9400d95afe3fa714e72d59c', '[\"*\"]', '2025-04-22 17:51:21', NULL, '2025-04-20 05:25:10', '2025-04-22 17:51:21'),
(431, 'App\\Models\\Student', 112, 'auth_token', '27d6ace30d3847c19a63845751cd17fe35c40ec0770fa5181a559113cbdec140', '[\"*\"]', '2025-04-20 06:29:10', NULL, '2025-04-20 05:32:21', '2025-04-20 06:29:10'),
(432, 'App\\Models\\Patient', 79, 'auth_token', '461f531bc4480ff6eae517cfc38b77f04ba7741b300680125e2a57c27d8f55a9', '[\"*\"]', NULL, NULL, '2025-04-20 06:32:01', '2025-04-20 06:32:01'),
(433, 'App\\Models\\Patient', 79, 'auth_token', '3a97d040ec71bcdf44581163d6d04c1b22a4d90387f950ab48dc6e1f3adfad4c', '[\"*\"]', '2025-04-20 07:56:20', NULL, '2025-04-20 06:32:21', '2025-04-20 07:56:20'),
(434, 'App\\Models\\Patient', 79, 'auth_token', '4cb64e8c78fbacaafff0c0ef2c7bbd0dd55db26aae064aa29d32a52972003f53', '[\"*\"]', '2025-04-20 07:11:07', NULL, '2025-04-20 06:35:06', '2025-04-20 07:11:07'),
(435, 'App\\Models\\Doctor', 70, 'auth_token', '93524aa6fb5388aded75b0b2ab27cf2782df381b45a293deadc88409ffcd5876', '[\"*\"]', '2025-04-20 07:50:09', NULL, '2025-04-20 07:12:03', '2025-04-20 07:50:09'),
(436, 'App\\Models\\Doctor', 61, 'auth_token', '2f864eab6cc6612c003b5eef05cb77020aa8a773f8c2ce648f7d07108e73a520', '[\"*\"]', '2025-04-20 07:55:27', NULL, '2025-04-20 07:52:23', '2025-04-20 07:55:27'),
(437, 'App\\Models\\Doctor', 71, 'auth_token', 'ddfe0008bea7afa9564d673126f81a4d8a91388bda0f3ae2d630eacd49d25940', '[\"*\"]', NULL, NULL, '2025-04-20 07:57:21', '2025-04-20 07:57:21'),
(438, 'App\\Models\\Doctor', 72, 'auth_token', '63f03f773ad7de91400ca82ebe733c7a4f1a8afbb680376819c5393130b8e35b', '[\"*\"]', NULL, NULL, '2025-04-20 07:59:50', '2025-04-20 07:59:50'),
(439, 'App\\Models\\Doctor', 73, 'auth_token', 'de437a3ca6e9221ca9da3054850996293b71e3b7ef13e534b15d04a95df2b1a5', '[\"*\"]', NULL, NULL, '2025-04-20 08:01:49', '2025-04-20 08:01:49'),
(440, 'App\\Models\\Doctor', 70, 'auth_token', '0b21e2716ebcc9bed95c5bd92ea87d183e58d6ead80efae6215eebeb3b3b4656', '[\"*\"]', NULL, NULL, '2025-04-20 08:09:41', '2025-04-20 08:09:41'),
(441, 'App\\Models\\Patient', 80, 'auth_token', '5fb851c1adae55aeddb654b9f923dc4d63477b3b279e787c6fc568182158bfe8', '[\"*\"]', NULL, NULL, '2025-04-20 08:14:24', '2025-04-20 08:14:24'),
(442, 'App\\Models\\Patient', 80, 'auth_token', '3db20cad7f0c742aa496252a68e71284622f7d8bd74122ae1fcfc2de333eb9d6', '[\"*\"]', NULL, NULL, '2025-04-20 08:14:38', '2025-04-20 08:14:38'),
(443, 'App\\Models\\Patient', 80, 'auth_token', 'fd1ccab5d484e5e453aed0970bb2fb0184ee9041b87c7755483d1a897f2b56e6', '[\"*\"]', NULL, NULL, '2025-04-20 08:14:46', '2025-04-20 08:14:46'),
(444, 'App\\Models\\Patient', 80, 'auth_token', 'd3a84e64130c533bcfe133875bacde1ab0035d2bb328ddeed5924602e9700bdb', '[\"*\"]', NULL, NULL, '2025-04-20 08:15:07', '2025-04-20 08:15:07'),
(445, 'App\\Models\\Doctor', 74, 'auth_token', '5da84758797bedb449fe223ecf779302a31390635d4e61ccabf6059ca8568c75', '[\"*\"]', NULL, NULL, '2025-04-20 08:16:09', '2025-04-20 08:16:09'),
(446, 'App\\Models\\Doctor', 74, 'auth_token', '25df101ca212c1c06b1ff5f47acc9dae75ee478f077d43043147a6dac058c89d', '[\"*\"]', NULL, NULL, '2025-04-20 08:17:42', '2025-04-20 08:17:42'),
(447, 'App\\Models\\Doctor', 74, 'auth_token', '6d3c8562d6ce53a616a00895dd9af15e5491046a97d5d63eec48c9630b24b118', '[\"*\"]', NULL, NULL, '2025-04-20 08:20:50', '2025-04-20 08:20:50'),
(448, 'App\\Models\\Doctor', 74, 'auth_token', '4fd0d6bd8bfbf9ced5689ea50711bec8a056877fcfecdd6ea30a5ca320ff81b4', '[\"*\"]', NULL, NULL, '2025-04-20 08:24:43', '2025-04-20 08:24:43'),
(449, 'App\\Models\\Doctor', 74, 'auth_token', '7958bce3dd14f603d42e23155f0dec41485ea57f345c92ae46976b6f05b0f6eb', '[\"*\"]', '2025-04-27 11:23:39', NULL, '2025-04-20 08:25:32', '2025-04-27 11:23:39'),
(450, 'App\\Models\\Doctor', 74, 'auth_token', '315183f5d5257ddde849548c58dd55023fc42cad61541641da0565ab6d3e3333', '[\"*\"]', '2025-04-20 09:13:50', NULL, '2025-04-20 08:26:55', '2025-04-20 09:13:50'),
(451, 'App\\Models\\Patient', 79, 'auth_token', 'd90941f41a43d4e60eafbcf55a7a1e9bb881d41c8b2c4c170ef548558d24d295', '[\"*\"]', '2025-04-22 15:33:54', NULL, '2025-04-20 09:14:59', '2025-04-22 15:33:54'),
(452, 'App\\Models\\Patient', 79, 'auth_token', 'e395bf336723309cdc051ca1740b488900414addb8b78bda4c94534f667c8d95', '[\"*\"]', '2025-04-22 15:34:23', NULL, '2025-04-22 15:34:17', '2025-04-22 15:34:23'),
(453, 'App\\Models\\Doctor', 61, 'auth_token', 'aa09b5a7764054623d3cb599a2e385ad21cab38112bb8af21ec30d93b44ddb55', '[\"*\"]', '2025-04-24 01:17:44', NULL, '2025-04-24 01:08:08', '2025-04-24 01:17:44'),
(454, 'App\\Models\\Patient', 81, 'auth_token', 'b04d0b0260f7a45ca62396eb90f654c0ffab675523eba07eac24e90aec12a8d6', '[\"*\"]', NULL, NULL, '2025-04-24 01:18:38', '2025-04-24 01:18:38'),
(455, 'App\\Models\\Patient', 81, 'auth_token', '8ec660b3453d933c9610a12794fcf5d143267472839b5e6437a1e5a374fc4f14', '[\"*\"]', '2025-04-24 01:21:20', NULL, '2025-04-24 01:18:52', '2025-04-24 01:21:20'),
(456, 'App\\Models\\Doctor', 61, 'auth_token', '3cdf476ae5811b7de3594467e86ffaf56916f9beeed658e005d86bee7a0a1ff0', '[\"*\"]', '2025-04-24 01:25:09', NULL, '2025-04-24 01:21:47', '2025-04-24 01:25:09'),
(457, 'App\\Models\\Patient', 78, 'auth_token', '9c3087a76f5391f933ff40f2622833e5ff092b9fd5f35129943e834df96ac85d', '[\"*\"]', '2025-04-24 04:03:06', NULL, '2025-04-24 03:38:24', '2025-04-24 04:03:06'),
(458, 'App\\Models\\Patient', 78, 'auth_token', '8408e521f1f0247a9080f243f58607b310b2ee0bfdf0d616935267578a7f5baf', '[\"*\"]', '2025-04-24 04:08:33', NULL, '2025-04-24 04:04:15', '2025-04-24 04:08:33'),
(459, 'App\\Models\\Patient', 78, 'auth_token', 'c103e75998984d4aeca5a1a946bc5c40d93a61f2c2f64e3f5a606abc9d9f4b46', '[\"*\"]', '2025-04-24 04:42:19', NULL, '2025-04-24 04:33:16', '2025-04-24 04:42:19'),
(460, 'App\\Models\\Doctor', 71, 'auth_token', '76f3d04fb3bfc17fdb07cc787ed39067c60c0fcd3f7563ef1c960c988148501e', '[\"*\"]', '2025-04-24 04:42:26', NULL, '2025-04-24 04:39:20', '2025-04-24 04:42:26'),
(461, 'App\\Models\\Doctor', 70, 'auth_token', '2928f901cb44efe68b96decdac8687d921fdd0e218ebbeebf5a525b73dbd7915', '[\"*\"]', '2025-04-29 10:36:47', NULL, '2025-04-24 08:39:59', '2025-04-29 10:36:47'),
(462, 'App\\Models\\Doctor', 61, 'auth_token', '446c4606b6ef562f17ca0f6cf6ed6214c5c5318f0ca6475b7e48ef82589d02a1', '[\"*\"]', '2025-04-26 16:47:19', NULL, '2025-04-25 04:32:56', '2025-04-26 16:47:19'),
(463, 'App\\Models\\Patient', 79, 'auth_token', 'f76097aaf8abe17e4cba87de8737acb194a23b9109e7d6b60ff12c8a6547d0d8', '[\"*\"]', '2025-05-12 18:05:44', NULL, '2025-04-25 04:55:18', '2025-05-12 18:05:44'),
(464, 'App\\Models\\Patient', 78, 'auth_token', 'da91ea4860a14d468d6f20893635c02d12be1935248a03dd8aa5aedf3ee76f52', '[\"*\"]', '2025-04-25 11:46:51', NULL, '2025-04-25 09:44:13', '2025-04-25 11:46:51'),
(465, 'App\\Models\\Patient', 79, 'auth_token', '0d183ee907ff5f009f1b54c7067aefc58dec91ade26d4f94f8981cd02ef042c8', '[\"*\"]', '2025-04-25 11:44:08', NULL, '2025-04-25 11:43:46', '2025-04-25 11:44:08'),
(466, 'App\\Models\\Patient', 78, 'auth_token', '3876f812bc4dd23c68c7f337490bb3003e2aa4507dce85d75cf8c2da76c651c4', '[\"*\"]', '2025-04-26 15:46:51', NULL, '2025-04-25 11:50:39', '2025-04-26 15:46:51'),
(467, 'App\\Models\\Patient', 79, 'auth_token', 'ad2c9e6e759660d97c9a2cc0620023eb37cf06d03a39af0c67e06fd138a40e89', '[\"*\"]', '2025-04-26 16:15:06', NULL, '2025-04-25 12:12:21', '2025-04-26 16:15:06'),
(468, 'App\\Models\\Doctor', 61, 'auth_token', 'ad158a698cb1578739db44558d6db88c6bd933b57133b098fcf9f655e7ff70c0', '[\"*\"]', '2025-04-26 16:01:24', NULL, '2025-04-26 16:01:16', '2025-04-26 16:01:24'),
(469, 'App\\Models\\Patient', 81, 'auth_token', 'd909657dca4e36fd67a3476645b3cf36f5dc39195503193b9eaf915aa117bb8c', '[\"*\"]', '2025-04-26 16:38:49', NULL, '2025-04-26 16:01:59', '2025-04-26 16:38:49'),
(470, 'App\\Models\\Patient', 78, 'auth_token', '0cde04a576b1559a461d123dd73de6eb8f61d4be77f4d2046d835d9c737eb844', '[\"*\"]', '2025-04-26 16:26:42', NULL, '2025-04-26 16:06:59', '2025-04-26 16:26:42'),
(471, 'App\\Models\\Patient', 79, 'auth_token', '418e014ae58d2c5bf6bd4b655d6277b57e42d881b5b82d85aa9419d85938f61a', '[\"*\"]', '2025-04-26 16:17:43', NULL, '2025-04-26 16:16:39', '2025-04-26 16:17:43'),
(472, 'App\\Models\\Doctor', 71, 'auth_token', '2743d4b3fe4c35646e618835ec710928fad395c30b2c723692c41af5ecafa4b4', '[\"*\"]', '2025-04-26 16:50:35', NULL, '2025-04-26 16:18:40', '2025-04-26 16:50:35'),
(473, 'App\\Models\\Doctor', 70, 'auth_token', '985e5fc7e4f4b6c825a42eefc5a226f71d3d663edc6b91bdaa7c5aab38f9e2a2', '[\"*\"]', '2025-04-26 16:29:24', NULL, '2025-04-26 16:27:31', '2025-04-26 16:29:24'),
(474, 'App\\Models\\Patient', 78, 'auth_token', '2b7b3c1745ad4556a6c98e9e284cb4edf8be6c6cf4637cf3d5a2741b6aa623ee', '[\"*\"]', '2025-04-26 16:32:24', NULL, '2025-04-26 16:30:09', '2025-04-26 16:32:24'),
(475, 'App\\Models\\Doctor', 70, 'auth_token', '413cc6ba826dd40d6366c54a04faa194aafed344a4a26a39ea844dbff0445e84', '[\"*\"]', '2025-04-26 16:52:36', NULL, '2025-04-26 16:32:55', '2025-04-26 16:52:36'),
(476, 'App\\Models\\Doctor', 61, 'auth_token', '66bb24a5aadd879dff5025d964a7f331483874a4a7cfbcab5c4da02f571ea77c', '[\"*\"]', '2025-04-26 16:43:37', NULL, '2025-04-26 16:39:17', '2025-04-26 16:43:37'),
(477, 'App\\Models\\Doctor', 70, 'auth_token', '5e71f812c1b36fdd5c71da5c9fbdfb86c53e13008b73af2a88c21bc054055c94', '[\"*\"]', '2025-04-26 16:43:58', NULL, '2025-04-26 16:43:56', '2025-04-26 16:43:58'),
(478, 'App\\Models\\Doctor', 70, 'auth_token', '037296924bcdc9cd0d8bbee8233566b3318589a545098ce34ba9499980dfd185', '[\"*\"]', '2025-04-27 15:53:56', NULL, '2025-04-26 16:47:30', '2025-04-27 15:53:56'),
(479, 'App\\Models\\Doctor', 61, 'auth_token', '0a397bdfc7d36c4fd6c7883f6091fa2bccee641481f64e24879af82e5d1bc135', '[\"*\"]', '2025-04-26 16:56:20', NULL, '2025-04-26 16:51:14', '2025-04-26 16:56:20'),
(480, 'App\\Models\\Patient', 78, 'auth_token', '8a97b7bc9f51059cd6a075758e42cbcfca192635039cc059624e58786a587bdb', '[\"*\"]', '2025-04-26 16:55:58', NULL, '2025-04-26 16:53:09', '2025-04-26 16:55:58'),
(481, 'App\\Models\\Patient', 79, 'auth_token', 'f7a289d5d6a4d0d96104ec20624077d1927576777f71021a1a25c757caa8c9b9', '[\"*\"]', '2025-04-26 17:02:46', NULL, '2025-04-26 16:56:36', '2025-04-26 17:02:46'),
(482, 'App\\Models\\Doctor', 61, 'auth_token', '033fce1597f0b07ec50dbb27b13d0cfb314a7051a883050a92bc778a955dce9f', '[\"*\"]', '2025-04-26 16:57:21', NULL, '2025-04-26 16:56:41', '2025-04-26 16:57:21'),
(483, 'App\\Models\\Doctor', 70, 'auth_token', 'a7fd3ad8b355404d08b46e1ea521ed1c7862be93d393a2651649db73eb6f572a', '[\"*\"]', '2025-04-26 17:01:50', NULL, '2025-04-26 16:57:47', '2025-04-26 17:01:50'),
(484, 'App\\Models\\Doctor', 71, 'auth_token', 'd38eaae82b9657fa0a15f9029892092902aeb947b44ab1e8184f09d6f637ac93', '[\"*\"]', '2025-04-26 17:02:09', NULL, '2025-04-26 16:58:15', '2025-04-26 17:02:09'),
(485, 'App\\Models\\Doctor', 61, 'auth_token', '6816905190ea06ade0de4cf166e880408148398745646cde9a80f0bd5afbdc64', '[\"*\"]', '2025-04-26 17:09:13', NULL, '2025-04-26 17:08:35', '2025-04-26 17:09:13'),
(486, 'App\\Models\\Doctor', 70, 'auth_token', '9312f0010bb48cad94f986a03690019c86b83a90f0e99563532f55d0d3d568a8', '[\"*\"]', '2025-04-26 18:28:00', NULL, '2025-04-26 17:09:40', '2025-04-26 18:28:00'),
(487, 'App\\Models\\Doctor', 71, 'auth_token', 'fbfbab10ca3ccd5ebde8f0d689761e81c1c5cab41816d28bb553843299f65eb6', '[\"*\"]', '2025-04-26 17:28:20', NULL, '2025-04-26 17:27:36', '2025-04-26 17:28:20'),
(488, 'App\\Models\\Doctor', 71, 'auth_token', 'bfcd3772521e656875638476caaf9aada1bb10ab1a706e5b5e24efc2708ad98d', '[\"*\"]', '2025-04-28 10:48:45', NULL, '2025-04-27 03:49:43', '2025-04-28 10:48:45'),
(489, 'App\\Models\\Doctor', 70, 'auth_token', '9df3f51b523669870b9ab76fc6a230cabbca6ead36c37d11d3c1045eeb33623d', '[\"*\"]', '2025-04-28 06:36:38', NULL, '2025-04-27 04:01:24', '2025-04-28 06:36:38'),
(490, 'App\\Models\\Patient', 79, 'auth_token', 'bf31fc7cbdaa7532b53e2d903168a311db077125abf4f82451854c43a5627259', '[\"*\"]', '2025-04-27 08:27:12', NULL, '2025-04-27 04:35:21', '2025-04-27 08:27:12'),
(491, 'App\\Models\\Student', 113, 'auth_token', '36848ba1b5ba236ab890ebc0bdfa41d1f22361ad227051a5db578f454aceb0fa', '[\"*\"]', NULL, NULL, '2025-04-27 08:27:53', '2025-04-27 08:27:53'),
(492, 'App\\Models\\Student', 113, 'auth_token', '18cfd7e853f3b1ea6ddfd7bd55e41203423848f9f2ca9aed8450bda3f00771ab', '[\"*\"]', '2025-04-27 08:29:56', NULL, '2025-04-27 08:28:10', '2025-04-27 08:29:56'),
(493, 'App\\Models\\Doctor', 71, 'auth_token', 'c1b3dfda1c222b14beeafd991add6df35bb7150c0b60a858ab80af156d195051', '[\"*\"]', '2025-04-28 06:29:00', NULL, '2025-04-27 08:30:12', '2025-04-28 06:29:00'),
(494, 'App\\Models\\Doctor', 61, 'auth_token', 'a919f0f243e45118d1ec0ca3ec8f749ab5f355ec21e182a1177106e130061719', '[\"*\"]', '2025-04-29 02:16:03', NULL, '2025-04-27 15:55:30', '2025-04-29 02:16:03'),
(495, 'App\\Models\\Doctor', 71, 'auth_token', 'd313c6eeb2fef3748b0146070c7220f496b44e7a10072c4324ba565c32daf70b', '[\"*\"]', '2025-05-02 03:48:02', NULL, '2025-04-27 16:09:05', '2025-05-02 03:48:02'),
(496, 'App\\Models\\Doctor', 71, 'auth_token', '9f2d665b2d45e9daa9e1562117b5214eb08002e8995046f9039ed862992e0ec8', '[\"*\"]', '2025-04-28 05:12:30', NULL, '2025-04-28 04:45:57', '2025-04-28 05:12:30'),
(497, 'App\\Models\\Patient', 79, 'auth_token', '14f247d393561b359cf6b011649da2687402ee6d8483fc4c1a3f31242a4e8e73', '[\"*\"]', '2025-04-28 05:28:10', NULL, '2025-04-28 05:15:49', '2025-04-28 05:28:10'),
(498, 'App\\Models\\Doctor', 71, 'auth_token', '982d32998e155e55006c8c97fb79f761a0d682eed19dbb68c476364b7c661d1e', '[\"*\"]', '2025-04-28 06:05:35', NULL, '2025-04-28 05:30:35', '2025-04-28 06:05:35'),
(499, 'App\\Models\\Patient', 79, 'auth_token', '10e7fb751630c03e14771c14b42b857362bd093db78c4d1c1d9d110d82a9759f', '[\"*\"]', '2025-04-28 06:32:06', NULL, '2025-04-28 06:18:59', '2025-04-28 06:32:06'),
(500, 'App\\Models\\Patient', 79, 'auth_token', '3b0f8975507f8b77794c10800a86825cf9b2627c6d235e099fbd63ffdadd4a0f', '[\"*\"]', '2025-04-28 06:51:31', NULL, '2025-04-28 06:29:14', '2025-04-28 06:51:31'),
(501, 'App\\Models\\Doctor', 71, 'auth_token', '6e74151649a9a08ed8ad2ce1f3bb68b84ad1915268314dfca8af91d9394be7ee', '[\"*\"]', '2025-04-28 17:56:48', NULL, '2025-04-28 06:51:46', '2025-04-28 17:56:48'),
(502, 'App\\Models\\Patient', 81, 'auth_token', 'ca8e47f3f2c096d9344f709e2c76bd9ffdb5a3b12d3cf2f7b6727729724fae6b', '[\"*\"]', '2025-04-29 02:20:58', NULL, '2025-04-29 02:17:08', '2025-04-29 02:20:58'),
(503, 'App\\Models\\Doctor', 71, 'auth_token', '12a17c1737f0a974942a4c1418e74dc8b94974620aefdd1147ff9edd3a9f913b', '[\"*\"]', '2025-04-29 04:31:43', NULL, '2025-04-29 03:31:03', '2025-04-29 04:31:43'),
(504, 'App\\Models\\Doctor', 70, 'auth_token', '734392e59f143c73bb2af953486f19d2c0c8d132e486d3a8f3d54875f4436299', '[\"*\"]', '2025-04-29 04:33:18', NULL, '2025-04-29 03:50:43', '2025-04-29 04:33:18'),
(505, 'App\\Models\\Patient', 79, 'auth_token', 'dafb3f9eb1a739263a4da3c90010d8f8ab799f3c1c2196f3a0a142bd81c950d9', '[\"*\"]', '2025-05-02 04:48:27', NULL, '2025-04-29 04:32:14', '2025-05-02 04:48:27'),
(506, 'App\\Models\\Patient', 78, 'auth_token', 'e8dc163d5062dc916c6972a26005369145443225835afc7e2e4320af1730dc72', '[\"*\"]', '2025-05-03 06:00:35', NULL, '2025-04-29 04:33:38', '2025-05-03 06:00:35');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(507, 'App\\Models\\Doctor', 61, 'auth_token', '185211baa79b124d7f51eeb14527f91db7ab29211e03ecbfbdac5419624a817a', '[\"*\"]', '2025-05-01 04:23:29', NULL, '2025-05-01 04:22:11', '2025-05-01 04:23:29'),
(508, 'App\\Models\\Doctor', 61, 'auth_token', '03db1abfb069db820712a9d2984928846853610d597287a9916c542970f7a276', '[\"*\"]', '2025-05-03 17:33:55', NULL, '2025-05-02 03:29:31', '2025-05-03 17:33:55'),
(509, 'App\\Models\\Patient', 79, 'auth_token', 'fc21534e3ef07aa61aa7916048091c1163e268d9c1e96e4b3cf16b672a08ed4a', '[\"*\"]', '2025-05-02 17:29:58', NULL, '2025-05-02 04:47:56', '2025-05-02 17:29:58'),
(510, 'App\\Models\\Doctor', 71, 'auth_token', '3fbae4b54e625af97ef69e6ce5743fc7c74569be7627f18430c79d6e07e45cb4', '[\"*\"]', '2025-05-03 13:41:38', NULL, '2025-05-02 04:48:43', '2025-05-03 13:41:38'),
(511, 'App\\Models\\Doctor', 70, 'auth_token', '4663353fcef9421a51c4817b83fd31a3673883289d4aade5803d0f3585499893', '[\"*\"]', '2025-05-03 16:21:00', NULL, '2025-05-02 16:29:44', '2025-05-03 16:21:00'),
(512, 'App\\Models\\Doctor', 71, 'auth_token', '90a1fac6dc07edfec769426a4c1fc913d0502b44e6bc74820a9d82218153baa2', '[\"*\"]', '2025-05-03 12:22:00', NULL, '2025-05-02 17:30:34', '2025-05-03 12:22:00'),
(513, 'App\\Models\\Patient', 78, 'auth_token', '35249ad5dab3fd3168b0c5a81fbea635e39e9592fe3872b959b14822756c56ac', '[\"*\"]', '2025-05-03 06:01:49', NULL, '2025-05-03 06:00:58', '2025-05-03 06:01:49'),
(514, 'App\\Models\\Patient', 79, 'auth_token', '0d2865557fa7ad7347295cfb660f8dbfbe7593626157547d37069bf6a5e95575', '[\"*\"]', '2025-05-03 15:22:14', NULL, '2025-05-03 15:20:53', '2025-05-03 15:22:14'),
(515, 'App\\Models\\Doctor', 71, 'auth_token', '47314163a560c29e4a53ab3d91ae265d621ee733c066726b1a18649527afcbfb', '[\"*\"]', '2025-05-03 16:40:08', NULL, '2025-05-03 15:23:30', '2025-05-03 16:40:08'),
(516, 'App\\Models\\Doctor', 61, 'auth_token', '29970d100214a75cdcd391ad18fe4ae238ce70f28173816324957ccb64b7587e', '[\"*\"]', '2025-05-03 15:36:16', NULL, '2025-05-03 15:30:01', '2025-05-03 15:36:16'),
(517, 'App\\Models\\Doctor', 61, 'auth_token', '13a776c8fb8ef1290bcf4854838bfacb70504ef0e8148ba9adc0374d4e05b9a9', '[\"*\"]', '2025-05-03 16:15:21', NULL, '2025-05-03 15:45:36', '2025-05-03 16:15:21'),
(518, 'App\\Models\\Patient', 81, 'auth_token', 'b273a3e0db76eca4d523d3507e8e1c2f406f59c3ecf8c24c2a209d36d0bc6eef', '[\"*\"]', '2025-05-03 16:17:30', NULL, '2025-05-03 16:16:00', '2025-05-03 16:17:30'),
(519, 'App\\Models\\Doctor', 61, 'auth_token', 'a9b94158068f1e2dd37d5d7dbf62e46a505cb4ea8ee7492671d73858943a21bb', '[\"*\"]', '2025-05-03 16:19:19', NULL, '2025-05-03 16:17:51', '2025-05-03 16:19:19'),
(520, 'App\\Models\\Patient', 81, 'auth_token', 'e69f9d26e8d7facf5134c52f40858ab3d0b9664bc52dd1cab18a5192e9911fd4', '[\"*\"]', '2025-05-03 16:20:58', NULL, '2025-05-03 16:19:42', '2025-05-03 16:20:58'),
(521, 'App\\Models\\Doctor', 61, 'auth_token', '74a723821aab7cbd3762932acea1f837598c9f999b041ddb5a20343d5569b8b5', '[\"*\"]', '2025-05-03 16:22:31', NULL, '2025-05-03 16:21:19', '2025-05-03 16:22:31'),
(522, 'App\\Models\\Patient', 81, 'auth_token', 'f2ad8a6ff09019a090fae64db76c4ddf3938da5d7d1f3ef4ad0b86f69ee6468a', '[\"*\"]', '2025-05-03 16:26:52', NULL, '2025-05-03 16:22:58', '2025-05-03 16:26:52'),
(523, 'App\\Models\\Doctor', 61, 'auth_token', '2d32486c859d5ef7fab78058d65befcd15af9041b7d99f8a3bdf10260e228e5c', '[\"*\"]', '2025-05-03 16:45:35', NULL, '2025-05-03 16:27:13', '2025-05-03 16:45:35'),
(524, 'App\\Models\\Doctor', 70, 'auth_token', '2039e870255382a2a5bf4b7d1dac992e652a193b5f3aaa39d3d933ea0dfca4de', '[\"*\"]', '2025-05-03 17:15:49', NULL, '2025-05-03 17:07:29', '2025-05-03 17:15:49'),
(525, 'App\\Models\\Doctor', 71, 'auth_token', '56f1a8dcd329eb1b30be28d04a9454277200485726f2e8fd7ae3b4002ec2aa78', '[\"*\"]', '2025-05-04 03:27:37', NULL, '2025-05-03 17:13:25', '2025-05-04 03:27:37'),
(526, 'App\\Models\\Patient', 78, 'auth_token', '6474ce6c35e33613c2e8c6697dee6ded66c3a5431d7bc70616a7ed5c3f30b862', '[\"*\"]', '2025-05-04 11:26:34', NULL, '2025-05-03 17:16:10', '2025-05-04 11:26:34'),
(527, 'App\\Models\\Patient', 79, 'auth_token', '230b96708ec86b7399ae3557259868dfd5ee51bafd4403441850fafdb13b8440', '[\"*\"]', '2025-05-03 17:21:28', NULL, '2025-05-03 17:20:36', '2025-05-03 17:21:28'),
(528, 'App\\Models\\Doctor', 61, 'auth_token', '311ae929cb924a532157590f09764982c85fb66ac939715878961590e0c7f1e4', '[\"*\"]', '2025-05-05 16:03:28', NULL, '2025-05-03 17:30:46', '2025-05-05 16:03:28'),
(529, 'App\\Models\\Doctor', 71, 'auth_token', '75b6829b1e24aa6dd26ba748167bc700bd925c3b4fe4409f83b8c84ff6fdb39c', '[\"*\"]', '2025-05-04 04:31:54', NULL, '2025-05-04 03:29:58', '2025-05-04 04:31:54'),
(530, 'App\\Models\\Patient', 79, 'auth_token', 'eb0df375e566734c5d9d56fbb922b50d4a9f91038df27d88e6e591e1fc4616e1', '[\"*\"]', '2025-05-06 05:31:26', NULL, '2025-05-04 03:35:18', '2025-05-06 05:31:26'),
(531, 'App\\Models\\Doctor', 70, 'auth_token', '9b1bed86da85c20bf72def62902aea826f6369d1147a1743501032cf3f251b82', '[\"*\"]', '2025-06-17 10:26:04', NULL, '2025-05-04 03:46:23', '2025-06-17 10:26:04'),
(532, 'App\\Models\\Patient', 82, 'auth_token', 'c4908c6c9b2998eed924ece002099dd0cd197ed0582c0516fc90b5265755b2f6', '[\"*\"]', NULL, NULL, '2025-05-04 09:05:09', '2025-05-04 09:05:09'),
(533, 'App\\Models\\Patient', 82, 'auth_token', '2661c62e35924f7decc51dceb73f34335fedf841b3a5eaf8ba093d19caab4bb0', '[\"*\"]', '2025-05-04 10:41:30', NULL, '2025-05-04 09:05:31', '2025-05-04 10:41:30'),
(534, 'App\\Models\\Patient', 79, 'auth_token', '2df52afe7498e660a0b6d3629dc93198b01916710492353d399497f9e9c4600f', '[\"*\"]', '2025-05-04 16:26:57', NULL, '2025-05-04 16:24:02', '2025-05-04 16:26:57'),
(535, 'App\\Models\\Doctor', 70, 'auth_token', '83daf53f74da54882f7469138ccbb7a94ed2804bf2388e150488189dd9a37fa1', '[\"*\"]', '2025-05-04 17:11:53', NULL, '2025-05-04 17:06:46', '2025-05-04 17:11:53'),
(536, 'App\\Models\\Patient', 78, 'auth_token', '4c9eb6b686f2b8e6c763431e32330a6c6a421c3f0e5eda896da46b508c0d725a', '[\"*\"]', '2025-05-14 11:11:52', NULL, '2025-05-04 17:12:11', '2025-05-14 11:11:52'),
(537, 'App\\Models\\Doctor', 75, 'auth_token', '86cae4bf25eb73e3448f47d5390ba883177b75371a72318b852107a306d0e3e0', '[\"*\"]', NULL, NULL, '2025-05-05 06:27:23', '2025-05-05 06:27:23'),
(538, 'App\\Models\\Doctor', 76, 'auth_token', '4cf365d7a7372d52f7a3d186e9fd47737cb0d8f33c329b151e3292b363a95a83', '[\"*\"]', NULL, NULL, '2025-05-05 15:35:05', '2025-05-05 15:35:05'),
(539, 'App\\Models\\Doctor', 61, 'auth_token', 'd808756652ce4cc5d0a870817845c9fc37c23eb5fd3cee6f8d4094ba0cbb2ba4', '[\"*\"]', '2025-05-06 14:44:38', NULL, '2025-05-05 15:51:23', '2025-05-06 14:44:38'),
(540, 'App\\Models\\Doctor', 70, 'auth_token', '7c87ceb6244b19c6e667f3035d746fbbfa4df9fba63d433184294a536bdcaf5d', '[\"*\"]', '2025-05-05 15:57:45', NULL, '2025-05-05 15:52:44', '2025-05-05 15:57:45'),
(541, 'App\\Models\\Patient', 79, 'auth_token', '820be141f5881e964cae34baf15b08b62553d79b7dc464bc587712b8853cf0d9', '[\"*\"]', '2025-05-05 15:55:12', NULL, '2025-05-05 15:54:36', '2025-05-05 15:55:12'),
(542, 'App\\Models\\Doctor', 61, 'auth_token', 'b8d41660ab2eb9a7966711e15b2092ef1a0029f004b3b8ea53bc9ea00cb56d4f', '[\"*\"]', '2025-05-05 17:01:45', NULL, '2025-05-05 17:00:38', '2025-05-05 17:01:45'),
(543, 'App\\Models\\Doctor', 70, 'auth_token', 'ccf5780b9fe82c01ffddb3c36da2e5b212ce36e014f652afe9c1af80d45b675b', '[\"*\"]', '2025-05-05 17:10:06', NULL, '2025-05-05 17:06:39', '2025-05-05 17:10:06'),
(544, 'App\\Models\\Doctor', 70, 'auth_token', 'b2dbabf0e5c8c44fab19aab1b1b4db2734c0c7640bad3879e3adb8fc48c48935', '[\"*\"]', '2025-05-06 04:25:35', NULL, '2025-05-05 17:12:09', '2025-05-06 04:25:35'),
(545, 'App\\Models\\Doctor', 71, 'auth_token', 'edf070a867ee330095daf5ca7ae5d71065e88d9bffb8bca2da53f7fb6462915a', '[\"*\"]', '2025-05-06 04:00:36', NULL, '2025-05-05 17:51:15', '2025-05-06 04:00:36'),
(546, 'App\\Models\\Patient', 79, 'auth_token', '97d0511ed5cee3b427de982fddd897cc13769d5c1bd9dca9fe821a513f02c634', '[\"*\"]', '2025-05-06 04:02:02', NULL, '2025-05-06 04:00:51', '2025-05-06 04:02:02'),
(547, 'App\\Models\\Doctor', 71, 'auth_token', '22b115c9be55ce873ce6bc4d9fd085d35cf18aedee9a61a55b5591ec062faa8a', '[\"*\"]', '2025-05-06 04:19:44', NULL, '2025-05-06 04:03:09', '2025-05-06 04:19:44'),
(548, 'App\\Models\\Doctor', 77, 'auth_token', '25dd792fded2ddfc5f993676dcddeb084c69ea48ac30ee5543a8f9b97aeac499', '[\"*\"]', NULL, NULL, '2025-05-06 04:20:36', '2025-05-06 04:20:36'),
(549, 'App\\Models\\Patient', 78, 'auth_token', '5801ffc45067261469961a6b427b928f1c052b0886355200999db137b225dbf3', '[\"*\"]', '2025-05-06 04:59:45', NULL, '2025-05-06 04:25:57', '2025-05-06 04:59:45'),
(550, 'App\\Models\\Doctor', 77, 'auth_token', '5067e34d7855dd89ab7157031c69ab33e8220620be24d7ae5747dbb991e4fc58', '[\"*\"]', '2025-05-06 05:29:51', NULL, '2025-05-06 04:28:56', '2025-05-06 05:29:51'),
(551, 'App\\Models\\Doctor', 78, 'auth_token', '78ba4198a753c5881fdfbc94695c060759ea5360ba7434cec44e795375147c68', '[\"*\"]', NULL, NULL, '2025-05-06 05:37:22', '2025-05-06 05:37:22'),
(552, 'App\\Models\\Doctor', 78, 'auth_token', '5675a0c2c8704fc880fc07319e967c46df7cc9f3429b8d0f56da6653941e5e73', '[\"*\"]', '2025-05-06 05:43:41', NULL, '2025-05-06 05:37:47', '2025-05-06 05:43:41'),
(553, 'App\\Models\\Doctor', 71, 'auth_token', '30d3db749fde476eef06c0d3286d852c599080ea9a69c3f2391e5ea929465bba', '[\"*\"]', '2025-05-06 06:55:58', NULL, '2025-05-06 05:44:00', '2025-05-06 06:55:58'),
(554, 'App\\Models\\Patient', 79, 'auth_token', '27d95b2005f498c8cbc94f646a34c3629e73cb2e98b0f94dde25a233bc601961', '[\"*\"]', '2025-05-06 05:59:39', NULL, '2025-05-06 05:44:44', '2025-05-06 05:59:39'),
(555, 'App\\Models\\Doctor', 71, 'auth_token', 'da42df8bcaa49c8295cea927444f18f3762f493db8b7cbe8eae019241329e2c0', '[\"*\"]', '2025-05-06 07:02:45', NULL, '2025-05-06 06:56:31', '2025-05-06 07:02:45'),
(556, 'App\\Models\\Doctor', 61, 'auth_token', 'dd6b67d900e9130c85f766316c4ae54700a774d51f02abe6aca4769418a741a2', '[\"*\"]', '2025-05-12 17:09:38', NULL, '2025-05-06 14:40:12', '2025-05-12 17:09:38'),
(557, 'App\\Models\\Patient', 81, 'auth_token', 'b7b1c715eda6110d4eb4ae8aa96ccbf4d9a6166864a4660b44947ea936c55f30', '[\"*\"]', '2025-05-06 16:53:14', NULL, '2025-05-06 14:45:04', '2025-05-06 16:53:14'),
(558, 'App\\Models\\Doctor', 61, 'auth_token', 'baadeec9ae2fe727a0320c5363cb8468137beb965035f48a3f2e61410ab9ec62', '[\"*\"]', '2025-05-06 16:54:21', NULL, '2025-05-06 16:53:36', '2025-05-06 16:54:21'),
(559, 'App\\Models\\Patient', 81, 'auth_token', '8dd1cec856d364bfc2dda3810ce2a6de33dd20be65478a3837f0cfae9aec743d', '[\"*\"]', '2025-05-06 17:19:52', NULL, '2025-05-06 17:14:16', '2025-05-06 17:19:52'),
(560, 'App\\Models\\Doctor', 61, 'auth_token', 'd8962aabde2808bb7939088efc4c6c9cbca36cd72664e2a9ee1539c7d6884ac7', '[\"*\"]', '2025-05-06 17:21:39', NULL, '2025-05-06 17:20:42', '2025-05-06 17:21:39'),
(561, 'App\\Models\\Doctor', 70, 'auth_token', '28c9e18b12b10f40894f9d640eef1e8e34077d270d7c1461ab206e5954ce0841', '[\"*\"]', '2025-05-06 17:50:11', NULL, '2025-05-06 17:45:38', '2025-05-06 17:50:11'),
(562, 'App\\Models\\Doctor', 79, 'auth_token', '07adfcfe80265ca4b1fe92dce002aac1e846bc5ff5658a4342a9cf6094cd5db2', '[\"*\"]', NULL, NULL, '2025-05-06 17:51:27', '2025-05-06 17:51:27'),
(563, 'App\\Models\\Patient', 78, 'auth_token', '258446eb749dd3d9224f60b6266325079541b41345d4e9815e8e89da78bc3b68', '[\"*\"]', '2025-05-06 17:54:05', NULL, '2025-05-06 17:52:19', '2025-05-06 17:54:05'),
(564, 'App\\Models\\Doctor', 70, 'auth_token', '9d87267b783c9dd575d0e37b71fd9c22111b204993783d0c6420bb244e4ca013', '[\"*\"]', '2025-05-06 17:57:59', NULL, '2025-05-06 17:54:35', '2025-05-06 17:57:59'),
(565, 'App\\Models\\Patient', 78, 'auth_token', 'b4091c9d3060d01c945e2e987dd1ba245054ade96fd9fef6542900289bc21686', '[\"*\"]', '2025-05-06 18:06:35', NULL, '2025-05-06 17:58:06', '2025-05-06 18:06:35'),
(566, 'App\\Models\\Doctor', 70, 'auth_token', '28f8885d458ad7099f264c82585dd4e5a26443d4b51ff5b54546964d7e064318', '[\"*\"]', '2025-05-06 18:08:48', NULL, '2025-05-06 18:07:34', '2025-05-06 18:08:48'),
(567, 'App\\Models\\Doctor', 61, 'auth_token', '103df454e2fdd9f63765f6e2d30f3b2269df19f87eb9d1f7d7cac0f5bf619234', '[\"*\"]', '2025-05-07 22:47:56', NULL, '2025-05-07 02:00:17', '2025-05-07 22:47:56'),
(568, 'App\\Models\\Patient', 78, 'auth_token', '3223ad848aee48ec691d3f10fe1992befaf5300640193409934a499df8a6155e', '[\"*\"]', '2025-05-07 03:33:26', NULL, '2025-05-07 03:31:24', '2025-05-07 03:33:26'),
(569, 'App\\Models\\Doctor', 70, 'auth_token', 'a8ab6ff563a421dd4caaa58105e2aa9ec6a65349421ac71aaf2e99ce31aaad09', '[\"*\"]', '2025-05-07 04:20:44', NULL, '2025-05-07 03:33:50', '2025-05-07 04:20:44'),
(570, 'App\\Models\\Doctor', 80, 'auth_token', '154fcaf6e480383b09d344bdede8f136a0bc5d56e063d6ec1d15abdfd8a5e9d2', '[\"*\"]', NULL, NULL, '2025-05-07 04:22:23', '2025-05-07 04:22:23'),
(571, 'App\\Models\\Doctor', 80, 'auth_token', '28c9c6542da8eff884a86790e3263fe79b9c711e0fd9d2ce8dc3fb1fe79785dd', '[\"*\"]', '2025-05-07 16:27:29', NULL, '2025-05-07 04:22:44', '2025-05-07 16:27:29'),
(572, 'App\\Models\\Doctor', 71, 'auth_token', '492e78d0a3cb9c247bbe6409a31694ccd03fb3d526a87a2178fa57c47b31fecd', '[\"*\"]', '2025-05-07 07:08:36', NULL, '2025-05-07 07:02:09', '2025-05-07 07:08:36'),
(573, 'App\\Models\\Patient', 79, 'auth_token', '143326a1c976f42574b2e88d627056273a577fd7848f98537e287d5bc5f601dc', '[\"*\"]', '2025-05-07 09:52:53', NULL, '2025-05-07 07:08:53', '2025-05-07 09:52:53'),
(574, 'App\\Models\\Patient', 79, 'auth_token', 'd43c357fe1d827fed335f06890a425d66a32455b63c1250e2cb11cb28f3dbad1', '[\"*\"]', '2025-05-07 16:38:27', NULL, '2025-05-07 09:29:57', '2025-05-07 16:38:27'),
(575, 'App\\Models\\Doctor', 77, 'auth_token', 'a0b1c73d0388160364af4f40e8bccebb62830eda58e0d9e49837f395be7ea6f3', '[\"*\"]', '2025-05-07 09:49:59', NULL, '2025-05-07 09:31:53', '2025-05-07 09:49:59'),
(576, 'App\\Models\\Student', 113, 'auth_token', '0f8d1952fec4b7f30ae52245b95b1b819aeef28cb7dc65c2301e3d3a02478973', '[\"*\"]', '2025-05-07 09:55:30', NULL, '2025-05-07 09:54:07', '2025-05-07 09:55:30'),
(577, 'App\\Models\\Patient', 79, 'auth_token', '35bc19725640693835b83e999b44bdd1c478c9363260cb17cf641597ceb63424', '[\"*\"]', '2025-05-07 16:33:25', NULL, '2025-05-07 09:56:13', '2025-05-07 16:33:25'),
(578, 'App\\Models\\Patient', 78, 'auth_token', 'b0037ef1459c46c1153bfc9dc30a35f4367b00237783780d16afc0002176364d', '[\"*\"]', '2025-05-07 22:04:19', NULL, '2025-05-07 16:27:45', '2025-05-07 22:04:19'),
(579, 'App\\Models\\Student', 113, 'auth_token', '1159dc9b83a7494d8117895900c4e69a7aeadd56533274e5d4da06b18472cdab', '[\"*\"]', '2025-05-07 16:43:18', NULL, '2025-05-07 16:33:43', '2025-05-07 16:43:18'),
(580, 'App\\Models\\Doctor', 81, 'auth_token', '1c53c44d51a0cbb12576f2e176a7f689dcb2511f5c62dee60a6613e6847d10d0', '[\"*\"]', NULL, NULL, '2025-05-07 16:38:57', '2025-05-07 16:38:57'),
(581, 'App\\Models\\Doctor', 81, 'auth_token', '6f6d203445b034a9cafcc461067793ee95ec4708686f0299da122fc432b20909', '[\"*\"]', '2025-05-07 16:43:04', NULL, '2025-05-07 16:39:28', '2025-05-07 16:43:04'),
(582, 'App\\Models\\Doctor', 81, 'auth_token', '509529d4cfc92a50204400b0d9be8142f2cce3fa9cc4e560bb3baee7313df6bd', '[\"*\"]', '2025-05-07 16:55:11', NULL, '2025-05-07 16:44:26', '2025-05-07 16:55:11'),
(583, 'App\\Models\\Doctor', 75, 'auth_token', '0e43584196ee13461bd965a1124d96efa57350c9ff8fcfb02bb133110652cedb', '[\"*\"]', '2025-05-27 13:20:42', NULL, '2025-05-07 16:53:14', '2025-05-27 13:20:42'),
(584, 'App\\Models\\Patient', 79, 'auth_token', 'fad70c287f9edd5a88dda08e0a6e220ccb15aad3cf8165fb83f91acd285233d2', '[\"*\"]', '2025-05-07 23:21:05', NULL, '2025-05-07 16:55:30', '2025-05-07 23:21:05'),
(585, 'App\\Models\\Doctor', 70, 'auth_token', '6ea6dcc9b3fe8cef2ed9e246eb9219266bfa60639352e66ddb2df4e85c45a571', '[\"*\"]', '2025-05-07 22:11:42', NULL, '2025-05-07 22:05:07', '2025-05-07 22:11:42'),
(586, 'App\\Models\\Patient', 78, 'auth_token', 'b02e1ea1e654c62ef09c6451c0a7c706095ddd57faa04ca141a8486e71e8ace6', '[\"*\"]', '2025-05-07 22:56:57', NULL, '2025-05-07 22:12:01', '2025-05-07 22:56:57'),
(587, 'App\\Models\\Doctor', 61, 'auth_token', 'd791ca66bb1b0170334e1c1b46643778153b2193f19a8f23852067e357c33acd', '[\"*\"]', '2025-05-08 00:12:17', NULL, '2025-05-07 22:22:35', '2025-05-08 00:12:17'),
(588, 'App\\Models\\Patient', 81, 'auth_token', '177923be05e439aa5a4dd78e23999fac3cceb9e90329dab16ed0a8d1442742f4', '[\"*\"]', '2025-05-07 22:56:05', NULL, '2025-05-07 22:48:33', '2025-05-07 22:56:05'),
(589, 'App\\Models\\Doctor', 61, 'auth_token', '7392d39735330cd4670f1ecebdf134a1b941039957c86d5c14acc66351484560', '[\"*\"]', '2025-05-07 22:56:44', NULL, '2025-05-07 22:56:36', '2025-05-07 22:56:44'),
(590, 'App\\Models\\Patient', 81, 'auth_token', '8b7eb32c64c3c87ea4f1216907532f62e4133247175e74ffeccc3e24ecbd5e86', '[\"*\"]', '2025-05-12 14:46:56', NULL, '2025-05-07 22:57:03', '2025-05-12 14:46:56'),
(591, 'App\\Models\\Doctor', 70, 'auth_token', '0de8023188c5d9df445d77a8be75e1751b73fe192fd163c69af114137c4b6499', '[\"*\"]', '2025-05-07 23:26:31', NULL, '2025-05-07 23:26:03', '2025-05-07 23:26:31'),
(592, 'App\\Models\\Patient', 78, 'auth_token', 'ca942bca516723cb6a83506620d000c871979b13ef94ae3759311642b2fa8779', '[\"*\"]', '2025-05-07 23:28:55', NULL, '2025-05-07 23:27:45', '2025-05-07 23:28:55'),
(593, 'App\\Models\\Doctor', 70, 'auth_token', '0739399bfcc8b8c040ddfc9612d764863ab345db807398daf3f8819d7cc83c5f', '[\"*\"]', '2025-05-07 23:30:19', NULL, '2025-05-07 23:29:15', '2025-05-07 23:30:19'),
(594, 'App\\Models\\Doctor', 81, 'auth_token', 'a26012c02ef31777bd0f06b8db4bce4847c3e38d31502f406db2d0e8bbef97f8', '[\"*\"]', '2025-05-07 23:44:17', NULL, '2025-05-07 23:30:27', '2025-05-07 23:44:17'),
(595, 'App\\Models\\Patient', 78, 'auth_token', '4608e329b470f9a766f371ee7cd4a6c312d8d71450ce5e36538958ee61d359e3', '[\"*\"]', '2025-05-12 10:22:47', NULL, '2025-05-07 23:30:40', '2025-05-12 10:22:47'),
(596, 'App\\Models\\Doctor', 81, 'auth_token', '1a4098c734c7f9547d73f177e417680167ec62f39d737aa24f23f4500c9d89d8', '[\"*\"]', '2025-05-07 23:44:50', NULL, '2025-05-07 23:44:48', '2025-05-07 23:44:50'),
(597, 'App\\Models\\Patient', 80, 'auth_token', '49709473687d72fa3019b4c0204e2152b0a0ccc815be073466c182d25f794a9a', '[\"*\"]', '2025-05-08 00:27:02', NULL, '2025-05-07 23:46:10', '2025-05-08 00:27:02'),
(598, 'App\\Models\\Doctor', 81, 'auth_token', '0e6e5f0d2ce9cf99e03b1d17c328377532ebbf6ba3ec104f8dc6f079dd2c007b', '[\"*\"]', '2025-05-08 00:13:58', NULL, '2025-05-08 00:13:13', '2025-05-08 00:13:58'),
(599, 'App\\Models\\Student', 114, 'auth_token', '0feecddc78deb9392d4bf35e117c4b310a5007fbd443e56c030a88913bdb3bb8', '[\"*\"]', NULL, NULL, '2025-05-08 09:36:57', '2025-05-08 09:36:57'),
(600, 'App\\Models\\Student', 114, 'auth_token', '6083c67f17989d1ba1b0eabe44641e4ded7d7be5114d8335c3534667186adbf4', '[\"*\"]', '2025-05-08 09:37:36', NULL, '2025-05-08 09:37:09', '2025-05-08 09:37:36'),
(601, 'App\\Models\\Doctor', 81, 'auth_token', '92730beb9bf9f3843c7b4434cbdfdc1c0fb38aef95e17e601019f2430c234986', '[\"*\"]', '2025-05-12 10:16:09', NULL, '2025-05-08 09:37:48', '2025-05-12 10:16:09'),
(602, 'App\\Models\\Doctor', 81, 'auth_token', 'f9a0db30136849c4474aa4f0f3f133911d2725d9b7f241ff441cbe34953eb6bc', '[\"*\"]', '2025-05-08 13:16:58', NULL, '2025-05-08 09:39:41', '2025-05-08 13:16:58'),
(603, 'App\\Models\\Student', 114, 'auth_token', '72db4fd8f95f3e18bd534ba5580e597b6659ac61f9222b85c268dc600f305360', '[\"*\"]', '2025-05-08 12:05:54', NULL, '2025-05-08 11:58:28', '2025-05-08 12:05:54'),
(604, 'App\\Models\\Patient', 79, 'auth_token', '71496d2741031e96a3dba06caf3afe22fe8fd1b010d155c715058a28b008ce3c', '[\"*\"]', '2025-05-12 10:38:04', NULL, '2025-05-08 12:06:54', '2025-05-12 10:38:04'),
(605, 'App\\Models\\Patient', 82, 'auth_token', 'c179f821bf1886a0f8dc9d4227fe2424e34723326bdd0f95499450d70c454815', '[\"*\"]', '2025-05-11 16:37:44', NULL, '2025-05-08 21:09:44', '2025-05-11 16:37:44'),
(606, 'App\\Models\\Doctor', 81, 'auth_token', '019cc7d4952727123a547d432b07316406ecd3ed412aec206fa5f19fd860664e', '[\"*\"]', '2025-05-10 12:15:53', NULL, '2025-05-10 12:00:54', '2025-05-10 12:15:53'),
(607, 'App\\Models\\Patient', 83, 'auth_token', '59b517ade7325cc98d4a82fe8260ab62601929476001eda4ec536c64d359a121', '[\"*\"]', NULL, NULL, '2025-05-12 09:56:34', '2025-05-12 09:56:34'),
(608, 'App\\Models\\Patient', 83, 'auth_token', '64827176ac7ab0ae6922cb55856a63e207aa45cc7a201ac45633198ad35c6765', '[\"*\"]', '2025-05-27 12:33:19', NULL, '2025-05-12 09:57:03', '2025-05-27 12:33:19'),
(609, 'App\\Models\\Patient', 84, 'auth_token', '97bb72b3ccd499aa003a593089b830c7c28f1288f19319d623cb4fc8315e2a5a', '[\"*\"]', NULL, NULL, '2025-05-12 10:20:45', '2025-05-12 10:20:45'),
(610, 'App\\Models\\Patient', 85, 'auth_token', '710f2a58610e9a4ba001202d6ea1fac647aa938d10fb52cb106094e48049a7b0', '[\"*\"]', NULL, NULL, '2025-05-12 10:21:19', '2025-05-12 10:21:19'),
(611, 'App\\Models\\Patient', 79, 'auth_token', '20e5ee0697446e00805e021156189d5d8e7d75fd7d4f73374dbd8d2795c2d03d', '[\"*\"]', '2025-05-12 10:21:42', NULL, '2025-05-12 10:21:24', '2025-05-12 10:21:42'),
(612, 'App\\Models\\Patient', 85, 'auth_token', '743b876a8cffaaf3987192e55c2cc4b098dde81bb643d3d3a2aa424b9e3e1fe7', '[\"*\"]', '2025-05-27 12:26:28', NULL, '2025-05-12 10:21:43', '2025-05-27 12:26:28'),
(613, 'App\\Models\\Doctor', 81, 'auth_token', '892d84473fe3d51b712a05d64b31333d81db40cbda7e9401ecb4cdcd6d9cf46d', '[\"*\"]', '2025-05-12 10:27:03', NULL, '2025-05-12 10:22:31', '2025-05-12 10:27:03'),
(614, 'App\\Models\\Doctor', 70, 'auth_token', '543912945e8225b3bd7723e5c9a6ec02edba3a8941ea36ece668f83f2dcf75e0', '[\"*\"]', '2025-05-12 10:27:36', NULL, '2025-05-12 10:23:07', '2025-05-12 10:27:36'),
(615, 'App\\Models\\Student', 114, 'auth_token', '8e1547f42f3e83177413a308e5860c066677b4259602045fe706dac94418bd6d', '[\"*\"]', '2025-05-12 11:31:12', NULL, '2025-05-12 10:27:15', '2025-05-12 11:31:12'),
(616, 'App\\Models\\Doctor', 81, 'auth_token', 'a7f9e01d12d4bf08e4e36f03ae545b1642e40e3903327cb01e8d7810bb154b98', '[\"*\"]', '2025-05-12 10:35:40', NULL, '2025-05-12 10:28:43', '2025-05-12 10:35:40'),
(617, 'App\\Models\\Doctor', 70, 'auth_token', '700c42b04f4718efcff8b450cf44dc6191085801e9df0c0373b4a534d4ffaee9', '[\"*\"]', '2025-05-12 17:29:33', NULL, '2025-05-12 10:36:01', '2025-05-12 17:29:33'),
(618, 'App\\Models\\Doctor', 81, 'auth_token', '6b5cc880dd45de9b276ab2e13b3f23e909ba9c4cc608d1fc9001af20f816c3ff', '[\"*\"]', '2025-05-12 17:31:03', NULL, '2025-05-12 10:36:33', '2025-05-12 17:31:03'),
(619, 'App\\Models\\Doctor', 81, 'auth_token', '871cf4a79c1d95893019a0adbc5ea59bd865f7c2cda634387d7ba6ae334d700f', '[\"*\"]', '2025-05-12 14:21:01', NULL, '2025-05-12 12:38:37', '2025-05-12 14:21:01'),
(620, 'App\\Models\\Doctor', 81, 'auth_token', '1696e0cabd9223e1dbd5ccabbf35bb8b9f313be592fb7ced76aeae849776cd9d', '[\"*\"]', '2025-05-12 14:23:20', NULL, '2025-05-12 14:21:42', '2025-05-12 14:23:20'),
(621, 'App\\Models\\Doctor', 81, 'auth_token', 'b22feb03db347c34f74cd29913450f84d4d9fcc910b837b159c900b8f0fa76cc', '[\"*\"]', '2025-05-12 14:26:15', NULL, '2025-05-12 14:24:24', '2025-05-12 14:26:15'),
(622, 'App\\Models\\Patient', 79, 'auth_token', '186eac8976d01a3eee61d4a74c7c7bf1da933f456dd78f5d3fa759a473870578', '[\"*\"]', '2025-05-12 14:26:34', NULL, '2025-05-12 14:26:32', '2025-05-12 14:26:34'),
(623, 'App\\Models\\Doctor', 81, 'auth_token', '584ac691146916f322bc958c76e50dc5702651c289bd06442b796c0f6d097702', '[\"*\"]', '2025-05-12 14:49:28', NULL, '2025-05-12 14:28:27', '2025-05-12 14:49:28'),
(624, 'App\\Models\\Doctor', 61, 'auth_token', '142fde12b78d05daf31812391f588d22de06bb9b0f72fec18cc2029690d3cfa3', '[\"*\"]', '2025-05-12 17:45:55', NULL, '2025-05-12 14:47:35', '2025-05-12 17:45:55'),
(625, 'App\\Models\\Patient', 79, 'auth_token', '2425b49c6cdbf49bde0403958618ba9d1d327f97e28cf633d783f6432d996db5', '[\"*\"]', '2025-05-12 17:45:15', NULL, '2025-05-12 14:49:39', '2025-05-12 17:45:15'),
(626, 'App\\Models\\Doctor', 81, 'auth_token', 'd6d2e3a407c7f88e1a2cac7c2f9a8f758c2aad63558c1d0bd5932ef9d3659f48', '[\"*\"]', '2025-05-12 17:29:22', NULL, '2025-05-12 16:14:37', '2025-05-12 17:29:22'),
(627, 'App\\Models\\Patient', 79, 'auth_token', '1e719bc9800314b274f844bb7674ca47ae1d8dce3e3eb4917c6064f912f18d71', '[\"*\"]', '2025-05-14 11:44:11', NULL, '2025-05-12 16:52:41', '2025-05-14 11:44:11'),
(628, 'App\\Models\\Patient', 79, 'auth_token', 'e968b3e55b8122c8d76bdac75114c0854321be5cb790bddf81fa2d918bb772f6', '[\"*\"]', '2025-05-12 17:17:42', NULL, '2025-05-12 17:15:36', '2025-05-12 17:17:42'),
(629, 'App\\Models\\Doctor', 81, 'auth_token', '3912c02bc416d2ccc6fb6b99efbcf71c8f9de33de34447e2a15d7c72f59a1138', '[\"*\"]', '2025-05-14 16:54:56', NULL, '2025-05-12 17:29:44', '2025-05-14 16:54:56'),
(630, 'App\\Models\\Patient', 78, 'auth_token', '76ac54557ac78bc61b14a47d191115bc8198a432ccce1e232d7d6ea5b6550ff8', '[\"*\"]', '2025-05-12 18:00:45', NULL, '2025-05-12 17:29:54', '2025-05-12 18:00:45'),
(631, 'App\\Models\\Patient', 79, 'auth_token', '944127612c743378b52a2fa19e32fff5e9cfd95c22c9e23a0cd9447974155113', '[\"*\"]', '2025-05-12 20:33:15', NULL, '2025-05-12 17:46:25', '2025-05-12 20:33:15'),
(632, 'App\\Models\\Doctor', 61, 'auth_token', '19ebfd2e8aeaba36446021158312e51b4d53e14c4477966e93445c8a8ac510b4', '[\"*\"]', '2025-05-12 20:27:32', NULL, '2025-05-12 20:25:21', '2025-05-12 20:27:32'),
(633, 'App\\Models\\Patient', 81, 'auth_token', '6447db44b5eb75e15cd2c60f173f5fc75612ccc93040286a32b4c7e40116ebde', '[\"*\"]', '2025-05-12 20:29:10', NULL, '2025-05-12 20:27:56', '2025-05-12 20:29:10'),
(634, 'App\\Models\\Patient', 82, 'auth_token', 'bed14073a4d83b1aae33a34ea4eff4e7bc83427032f19eaf9a76f7f696101d0c', '[\"*\"]', '2025-05-13 07:52:17', NULL, '2025-05-13 07:42:18', '2025-05-13 07:52:17'),
(635, 'App\\Models\\Doctor', 81, 'auth_token', 'c723804f35f108152485d3618515cbcad29701173e893c84bb49c5f81e41057d', '[\"*\"]', '2025-05-13 09:52:36', NULL, '2025-05-13 09:23:54', '2025-05-13 09:52:36'),
(636, 'App\\Models\\Patient', 86, 'auth_token', 'f770aa467556f64c0d9c44399b3f1db94e5c2b98007d63fbf379fd6784965bef', '[\"*\"]', NULL, NULL, '2025-05-13 09:46:33', '2025-05-13 09:46:33'),
(637, 'App\\Models\\Patient', 79, 'auth_token', '8b9202592ea83ea437303277a5b8055dd2fc3c6cdf595a8abbf2bacc25a84b30', '[\"*\"]', '2025-05-14 11:17:03', NULL, '2025-05-13 09:52:56', '2025-05-14 11:17:03'),
(638, 'App\\Models\\Patient', 86, 'auth_token', '36457a6ae1a8877e2a010ddf03946b6a5152e7bbd4386ad7c61d1604e63dc437', '[\"*\"]', '2025-05-13 09:58:03', NULL, '2025-05-13 09:57:55', '2025-05-13 09:58:03'),
(639, 'App\\Models\\Doctor', 70, 'auth_token', '80f60f5e6bc1a6b60c52533f7fc49e0c63f5bdb5aa14ae80044e3ed6f92ff1de', '[\"*\"]', '2025-05-26 22:41:55', NULL, '2025-05-14 11:12:11', '2025-05-26 22:41:55'),
(640, 'App\\Models\\Doctor', 81, 'auth_token', '2fcbf367de7e1a3b18f6032f496cf8efd46546935619d64e37aceb02877ef2c9', '[\"*\"]', '2025-05-14 17:23:32', NULL, '2025-05-14 11:17:21', '2025-05-14 17:23:32'),
(641, 'App\\Models\\Doctor', 81, 'auth_token', 'd616d560082bbe6cb507bd4658f2bee552c90bb4362b2d526359c7e5b2d9ea07', '[\"*\"]', '2025-05-15 09:56:18', NULL, '2025-05-14 11:44:30', '2025-05-15 09:56:18'),
(642, 'App\\Models\\Student', 115, 'auth_token', '396bd413308c334b42719681c98a740cbfd7959ad419d3d78c0460f2729fd669', '[\"*\"]', NULL, NULL, '2025-05-14 16:31:45', '2025-05-14 16:31:45'),
(643, 'App\\Models\\Student', 115, 'auth_token', 'ee7a1405544a31952ddb48b65d0f08d666c3df535daf3c48b853897402272714', '[\"*\"]', '2025-05-14 16:46:49', NULL, '2025-05-14 16:33:29', '2025-05-14 16:46:49'),
(644, 'App\\Models\\Doctor', 81, 'auth_token', 'd5b5bc588c9557b39ed933c65a303ce22c0b5fbaa95724fc1583dfc0bf9ffba9', '[\"*\"]', '2025-05-15 15:05:17', NULL, '2025-05-14 17:31:11', '2025-05-15 15:05:17'),
(645, 'App\\Models\\Patient', 79, 'auth_token', '1d7ba276ae2c0599ec87eb13e8318ae845f2fca942482c386862524331405254', '[\"*\"]', NULL, NULL, '2025-05-15 10:28:04', '2025-05-15 10:28:04'),
(646, 'App\\Models\\Patient', 79, 'auth_token', '9c2e6b741429a81538979e346bd6e67e9f84d5fea1237e274d2195a11ca59cfb', '[\"*\"]', NULL, NULL, '2025-05-15 10:32:24', '2025-05-15 10:32:24'),
(647, 'App\\Models\\Doctor', 81, 'auth_token', '07c114955fb1cd2c740b415a0f2e2c1383cbfdf8117ba0ee594aff37e7ec453c', '[\"*\"]', '2025-05-15 11:30:16', NULL, '2025-05-15 10:32:39', '2025-05-15 11:30:16'),
(648, 'App\\Models\\Doctor', 81, 'auth_token', '86a03d4cd46a88c88a6d51162449cc68c2fbcbe5becae7ef4e58109b5bdf4f4f', '[\"*\"]', '2025-05-15 12:48:01', NULL, '2025-05-15 11:56:18', '2025-05-15 12:48:01'),
(649, 'App\\Models\\Patient', 79, 'auth_token', '466c8dd32157583d28614a68df16abcd91725526d80ec2c533bcd8e1d9bff73f', '[\"*\"]', '2025-05-15 13:01:07', NULL, '2025-05-15 11:57:38', '2025-05-15 13:01:07'),
(650, 'App\\Models\\Doctor', 81, 'auth_token', '40ffa23f66360459f76a410ab41e2c96d2ed48032fe6c4e00f0b5e48dc9f5706', '[\"*\"]', '2025-05-15 13:00:42', NULL, '2025-05-15 12:51:27', '2025-05-15 13:00:42'),
(651, 'App\\Models\\Doctor', 81, 'auth_token', '6c99a43453442eff7ae5e3ded74f906e963b90a95792ae9d373ed369f3a5947c', '[\"*\"]', '2025-05-15 13:08:59', NULL, '2025-05-15 13:01:23', '2025-05-15 13:08:59'),
(652, 'App\\Models\\Patient', 79, 'auth_token', 'acd4b7f11b2f925634f5a88567dc6ca0fd0c38dfe5b2ff97c77cceb14d14f7bf', '[\"*\"]', '2025-05-15 13:17:32', NULL, '2025-05-15 13:01:38', '2025-05-15 13:17:32'),
(653, 'App\\Models\\Patient', 79, 'auth_token', '54d8b66803e25391d49b05120ea197e087fd313b90118d460217e8313c5f1670', '[\"*\"]', '2025-05-15 13:17:45', NULL, '2025-05-15 13:17:45', '2025-05-15 13:17:45'),
(654, 'App\\Models\\Patient', 79, 'auth_token', '18ecb4c0852d22621e69d234b7db394ca2fce015280e02f6472702ca56872507', '[\"*\"]', '2025-05-15 13:21:51', NULL, '2025-05-15 13:18:43', '2025-05-15 13:21:51'),
(655, 'App\\Models\\Patient', 79, 'auth_token', 'cc6fbaea3beabbbfbb41034ddfd1269ed7503d110ecd0dff62060863c78af75e', '[\"*\"]', '2025-05-15 13:47:25', NULL, '2025-05-15 13:22:13', '2025-05-15 13:47:25'),
(656, 'App\\Models\\Doctor', 81, 'auth_token', 'b8cb82d17dc3f736fff730cedd286c633f98b89f0f398c3d5b3b50efbd5e8c6a', '[\"*\"]', '2025-05-15 13:23:05', NULL, '2025-05-15 13:22:55', '2025-05-15 13:23:05'),
(657, 'App\\Models\\Doctor', 81, 'auth_token', '3e12a3ab35a0008a90da322c11443f67c9c57ecc58e8bb059daf2b2df6c64b26', '[\"*\"]', '2025-05-15 17:31:02', NULL, '2025-05-15 13:23:44', '2025-05-15 17:31:02'),
(658, 'App\\Models\\Patient', 79, 'auth_token', '2cbb15f4970ffbba475428086a12cee78f96a54cb6e4aa17134b56294b7794b4', '[\"*\"]', '2025-05-15 15:02:49', NULL, '2025-05-15 13:47:32', '2025-05-15 15:02:49'),
(659, 'App\\Models\\Student', 114, 'auth_token', 'b05586dd7c79def2876fed4c17663043e83f8bbdc3b70570b3833c8b13c0642d', '[\"*\"]', '2025-05-15 15:07:18', NULL, '2025-05-15 15:05:43', '2025-05-15 15:07:18'),
(660, 'App\\Models\\Doctor', 81, 'auth_token', 'faf6e18b7cedf536b56fe62535172ded9ba9c5098f449dba779306c289b591bf', '[\"*\"]', '2025-05-27 13:06:32', NULL, '2025-05-15 15:07:33', '2025-05-27 13:06:32'),
(661, 'App\\Models\\Student', 114, 'auth_token', '60f073253604e1f5d5a2b33d780ea5c673ce65217f264c5cfe35f48edd07d512', '[\"*\"]', '2025-06-03 17:20:37', NULL, '2025-05-15 15:10:14', '2025-06-03 17:20:37'),
(662, 'App\\Models\\Patient', 79, 'auth_token', '4f7b460cfa7ee77e19e69b2af2c9535139666440dddebb078b34b5f550d26286', '[\"*\"]', '2025-05-15 15:16:00', NULL, '2025-05-15 15:12:27', '2025-05-15 15:16:00'),
(663, 'App\\Models\\Patient', 79, 'auth_token', 'a8253f2adc2aba30db487deb881bcaca89b5098f8150452e64ecd323b4102139', '[\"*\"]', '2025-05-15 17:25:50', NULL, '2025-05-15 15:36:44', '2025-05-15 17:25:50'),
(664, 'App\\Models\\Patient', 81, 'auth_token', 'ce9a56ed627ddc6783966d2e3ce53c89b58c406d9602f8c4f46b5885416dea68', '[\"*\"]', '2025-06-01 21:22:47', NULL, '2025-05-26 22:27:29', '2025-06-01 21:22:47'),
(665, 'App\\Models\\Patient', 78, 'auth_token', '2481da800d004aa77364767d284217f10b23fba7f3a0b49210aa8f7f5575f354', '[\"*\"]', '2025-05-27 12:21:32', NULL, '2025-05-26 22:44:55', '2025-05-27 12:21:32'),
(666, 'App\\Models\\Patient', 81, 'auth_token', 'fb4a0d44c543d7972e116b4943d4bb3459cf078b2f4e7e4a4633f7b92eedbc0a', '[\"*\"]', '2025-05-26 23:10:20', NULL, '2025-05-26 22:59:07', '2025-05-26 23:10:20'),
(667, 'App\\Models\\Doctor', 70, 'auth_token', '2a1ac8e9f6036ab1c0ede365c0e19414ff5a86e0b9e233993476c0f5789bc565', '[\"*\"]', '2025-05-27 12:23:49', NULL, '2025-05-27 12:22:11', '2025-05-27 12:23:49'),
(668, 'App\\Models\\Patient', 78, 'auth_token', 'df49a0d32268cc6bee96d4f7092d502820adc75ef754b70762accef0374cbbcd', '[\"*\"]', '2025-05-27 12:46:30', NULL, '2025-05-27 12:24:09', '2025-05-27 12:46:30'),
(669, 'App\\Models\\Patient', 85, 'auth_token', 'b2e478e6a370bbe5071de83298bc58ccc7d573f417d6c74078c1892d06f9fbb5', '[\"*\"]', '2025-05-27 12:58:07', NULL, '2025-05-27 12:35:32', '2025-05-27 12:58:07'),
(670, 'App\\Models\\Doctor', 70, 'auth_token', '8a583acb6554efb6be3a98a957c5be053afb9be02c987c08881b8475e7bb7a36', '[\"*\"]', '2025-05-28 14:58:53', NULL, '2025-05-27 12:46:59', '2025-05-28 14:58:53'),
(671, 'App\\Models\\Patient', 79, 'auth_token', '67a7811989f321516597fe0a8f6296199f2109353cb14b290c6131020843d0eb', '[\"*\"]', '2025-06-02 16:13:50', NULL, '2025-05-27 13:06:54', '2025-06-02 16:13:50'),
(672, 'App\\Models\\Patient', 79, 'auth_token', '7e6c9b4779049bf29db74f987226a71fc75c061dbafe4310de0903d7a46f1bbd', '[\"*\"]', '2025-05-27 13:18:28', NULL, '2025-05-27 13:10:40', '2025-05-27 13:18:28'),
(673, 'App\\Models\\Doctor', 81, 'auth_token', '94b610773af93ad55ba155fe9c44e24537806441cadb411f4371b4e5f703f7d8', '[\"*\"]', '2025-05-27 13:22:55', NULL, '2025-05-27 13:22:45', '2025-05-27 13:22:55'),
(674, 'App\\Models\\Student', 115, 'auth_token', '44ac7c4ec68ec0ddd2f5eace9c34c86a3b62e82bdbfb09185bca27b2f0aeca3a', '[\"*\"]', '2025-06-05 21:12:37', NULL, '2025-05-27 14:44:13', '2025-06-05 21:12:37'),
(675, 'App\\Models\\Patient', 87, 'auth_token', '7340f3979126f5e8f7766c04c98d862fe8015e30e5889d29e51db85ba63ed8a0', '[\"*\"]', NULL, NULL, '2025-05-28 12:43:42', '2025-05-28 12:43:42'),
(676, 'App\\Models\\Patient', 87, 'auth_token', '35ec6059e5c02420823e91ad840d45f7972ed42a9758c2f50e13606698917277', '[\"*\"]', '2025-07-08 21:06:45', NULL, '2025-05-28 12:44:06', '2025-07-08 21:06:45'),
(677, 'App\\Models\\Patient', 78, 'auth_token', '07d3e2905d64d0cf809831b452ac5900c0e28f13e664d9f9029b003632713824', '[\"*\"]', '2025-05-28 15:01:07', NULL, '2025-05-28 14:59:12', '2025-05-28 15:01:07'),
(678, 'App\\Models\\Doctor', 70, 'auth_token', 'fe8ecee98f1d7d01fa20fa8dfb49431707942614741fbe98f323972f295b9861', '[\"*\"]', '2025-05-28 15:24:48', NULL, '2025-05-28 15:01:32', '2025-05-28 15:24:48'),
(679, 'App\\Models\\Doctor', 81, 'auth_token', '85a0c97b4f565465fba26afedff94f887db1334c6c9ab3b0ae846db705f86166', '[\"*\"]', '2025-05-28 15:36:51', NULL, '2025-05-28 15:05:14', '2025-05-28 15:36:51'),
(680, 'App\\Models\\Doctor', 81, 'auth_token', 'c24d95940d52c4e59072451d30d4d1bfd7221e48d2cfc3a614c3357891f058d7', '[\"*\"]', '2025-06-03 11:01:00', NULL, '2025-05-28 15:23:41', '2025-06-03 11:01:00'),
(681, 'App\\Models\\Patient', 78, 'auth_token', '6c421a30afa6667007894899b74945800767be76a25a7857a23600bc7201eb7a', '[\"*\"]', '2025-05-28 15:53:39', NULL, '2025-05-28 15:25:14', '2025-05-28 15:53:39'),
(682, 'App\\Models\\Patient', 79, 'auth_token', '75de6c99cb11bda434a08a9b99acb2de82f92b19fec0c4bcdcef10ef2db3f80d', '[\"*\"]', '2025-06-02 10:37:57', NULL, '2025-05-28 15:37:08', '2025-06-02 10:37:57'),
(683, 'App\\Models\\Doctor', 70, 'auth_token', '52e45fff9538ced24c64ea9245b873b316bb88e789cbb2117630cbb2a78febda', '[\"*\"]', '2025-05-29 23:43:02', NULL, '2025-05-28 15:54:06', '2025-05-29 23:43:02'),
(684, 'App\\Models\\Patient', 78, 'auth_token', '56b3a40561cba2042fce88580b8946be8902675a4efebb1d3990bcf2b4a0a5f8', '[\"*\"]', '2025-06-02 15:40:48', NULL, '2025-05-30 00:14:41', '2025-06-02 15:40:48'),
(685, 'App\\Models\\Doctor', 70, 'auth_token', 'bc930b90cf93c315b73ac7bfb5e1c19a31b70688c56b3886898e57ed93377de0', '[\"*\"]', '2025-05-31 22:30:29', NULL, '2025-05-31 14:00:12', '2025-05-31 22:30:29'),
(686, 'App\\Models\\Doctor', 70, 'auth_token', '30a5641e3acb78b4c9ba8b0ec6c4c62aeda5587fa305908d67065a30606c6610', '[\"*\"]', '2025-06-02 10:54:10', NULL, '2025-05-31 18:31:56', '2025-06-02 10:54:10'),
(687, 'App\\Models\\Patient', 79, 'auth_token', '9030ac3ef7bc57c3820314a20292601b46e36e6f2b53605b01920ae6cd685db9', '[\"*\"]', NULL, NULL, '2025-05-31 18:40:12', '2025-05-31 18:40:12'),
(688, 'App\\Models\\Doctor', 81, 'auth_token', 'c8c70c43ce5e43d71cf94c21840b7ea77c79a5d129a33b71827b6d31391c4dd5', '[\"*\"]', '2025-06-01 21:42:14', NULL, '2025-05-31 18:44:59', '2025-06-01 21:42:14'),
(689, 'App\\Models\\Patient', 79, 'auth_token', '68450ce8d69099d4025ff2b35b9c310e42bf470370f6fed5c4c165353cc24ec0', '[\"*\"]', '2025-06-02 10:31:44', NULL, '2025-06-02 10:31:25', '2025-06-02 10:31:44'),
(690, 'App\\Models\\Doctor', 82, 'auth_token', 'f9719f0a2ff1890e7aa3070ca6c8f3acafef0f9ac3016c01b6b2c81a0e7e03ed', '[\"*\"]', NULL, NULL, '2025-06-02 10:38:43', '2025-06-02 10:38:43'),
(691, 'App\\Models\\Doctor', 82, 'auth_token', '52aecd0e1a7866f7cbf1f43ee2e5061c55b08cf613640d0ea24781675c870e13', '[\"*\"]', '2025-06-02 10:40:01', NULL, '2025-06-02 10:39:01', '2025-06-02 10:40:01'),
(692, 'App\\Models\\Doctor', 82, 'auth_token', '62958169a1c39c6b4bf146c772e318ea939683813565c353eedd044a417e42b2', '[\"*\"]', '2025-06-03 11:29:39', NULL, '2025-06-02 10:54:10', '2025-06-03 11:29:39'),
(693, 'App\\Models\\Patient', 78, 'auth_token', '298db6338ce0eb4bc31a0c939a70a7281067db72027ebe5aeb00cc6e573d3a1f', '[\"*\"]', '2025-06-02 12:25:52', NULL, '2025-06-02 10:54:27', '2025-06-02 12:25:52'),
(694, 'App\\Models\\Doctor', 82, 'auth_token', '91a01247301c044766f6c98665d5d80228d95d36665713e7f6a1eb099d461e96', '[\"*\"]', '2025-06-02 15:54:14', NULL, '2025-06-02 12:10:36', '2025-06-02 15:54:14'),
(695, 'App\\Models\\Patient', 88, 'auth_token', '946d27aa079422b361bb6a0d840da4234285e6e4bff5e8f4cf4f66fafbcc2c39', '[\"*\"]', NULL, NULL, '2025-06-02 12:11:03', '2025-06-02 12:11:03'),
(696, 'App\\Models\\Patient', 88, 'auth_token', '96ebb0a66bdbed4d8db286cae6e9cdaeca80ce251a642afb3c50d9a5cd40f765', '[\"*\"]', '2025-06-02 12:21:59', NULL, '2025-06-02 12:11:30', '2025-06-02 12:21:59'),
(697, 'App\\Models\\Doctor', 83, 'auth_token', '45d4907f299803f51d4089428420c19d318d40e8dc14278a8439179d81848a15', '[\"*\"]', NULL, NULL, '2025-06-02 12:28:26', '2025-06-02 12:28:26'),
(698, 'App\\Models\\Doctor', 83, 'auth_token', '88d01b0105858e89d12a99aa24bb8e602ac2b49be9d19acdee3fd43e816fc0f5', '[\"*\"]', '2025-06-02 12:30:37', NULL, '2025-06-02 12:28:43', '2025-06-02 12:30:37'),
(699, 'App\\Models\\Patient', 89, 'auth_token', '6009fa35aef85fd4d6d3d0767dcd8bad62104b6592b92c7d1dd2aa8512449fc7', '[\"*\"]', NULL, NULL, '2025-06-02 13:02:46', '2025-06-02 13:02:46'),
(700, 'App\\Models\\Doctor', 81, 'auth_token', '2705337cbb105f9c2e976f6df9bf6ae52e9cfd6eee6bd17ef8811617628735c9', '[\"*\"]', '2025-06-02 14:01:07', NULL, '2025-06-02 13:42:17', '2025-06-02 14:01:07'),
(701, 'App\\Models\\Doctor', 81, 'auth_token', 'fe14f708bd968003e6f0fd9b23b7b2f8e7ca28e0d061af2bec84b3312dfec7e5', '[\"*\"]', '2025-06-02 14:52:21', NULL, '2025-06-02 14:17:54', '2025-06-02 14:52:21'),
(702, 'App\\Models\\Doctor', 70, 'auth_token', 'ae9c5913a9cb85d26a6faa3753d75e05da592f5f9da0358d3247fa1fabee6142', '[\"*\"]', '2025-06-02 16:00:11', NULL, '2025-06-02 15:41:10', '2025-06-02 16:00:11'),
(703, 'App\\Models\\Doctor', 81, 'auth_token', 'bc08941b7d5d3c7a1b7e97e1bc3c29018e4c9a9f3a6bcb87cf603aae2562fd23', '[\"*\"]', '2025-06-02 16:16:15', NULL, '2025-06-02 15:54:34', '2025-06-02 16:16:15'),
(704, 'App\\Models\\Patient', 78, 'auth_token', '7005701c98b999cfec8642cd95632aebaead53b01273dc9073269dad2773ed10', '[\"*\"]', '2025-06-03 16:31:30', NULL, '2025-06-02 16:00:31', '2025-06-03 16:31:30'),
(705, 'App\\Models\\Doctor', 77, 'auth_token', '63283fd8a6f957eb27433cb07c56795cf12d167d9c628221952fdcb2815524e3', '[\"*\"]', '2025-06-02 16:16:20', NULL, '2025-06-02 16:14:22', '2025-06-02 16:16:20'),
(706, 'App\\Models\\Doctor', 77, 'auth_token', 'b2287c1d1e81b5ea098b2b1ad01462de5f2d0abeb698a057a975bcd485ba0413', '[\"*\"]', '2025-06-03 10:02:44', NULL, '2025-06-02 16:16:36', '2025-06-03 10:02:44'),
(707, 'App\\Models\\Doctor', 81, 'auth_token', '1a544a074e3f935d6618449130afae82cedf7954c5d270485f8cff8d290e9c9b', '[\"*\"]', '2025-06-03 11:07:45', NULL, '2025-06-02 16:16:41', '2025-06-03 11:07:45'),
(708, 'App\\Models\\Doctor', 82, 'auth_token', '6061654ba7da1be8635b358b28c3d0a44dede30cbff58f6a6ecadb8f112902c9', '[\"*\"]', '2025-06-03 11:07:38', NULL, '2025-06-03 10:03:13', '2025-06-03 11:07:38'),
(709, 'App\\Models\\Doctor', 82, 'auth_token', 'c8957d81432ea6734ef69c670bc3d8f6466e055f486fbbd2ef0ed8ed72f65dc7', '[\"*\"]', '2025-06-03 10:46:30', NULL, '2025-06-03 10:42:52', '2025-06-03 10:46:30'),
(710, 'App\\Models\\Doctor', 81, 'auth_token', 'e7fc6775419064cde10786c1bf80797570963df40c0a23b3e93e30f64772bff6', '[\"*\"]', '2025-06-03 11:02:22', NULL, '2025-06-03 11:01:22', '2025-06-03 11:02:22'),
(711, 'App\\Models\\Patient', 90, 'auth_token', 'd5976a6ffcd25939114ff0d98e2d0a9f2d1709c2d54771514e48a995114c38c0', '[\"*\"]', NULL, NULL, '2025-06-03 11:08:36', '2025-06-03 11:08:36'),
(712, 'App\\Models\\Doctor', 82, 'auth_token', '3397d107472d8f66443fc8739c9b0719496c49da31f7dcea080d99aa058acd33', '[\"*\"]', '2025-06-03 11:09:57', NULL, '2025-06-03 11:08:37', '2025-06-03 11:09:57'),
(713, 'App\\Models\\Patient', 91, 'auth_token', '41ac89622197c5e36dcfdebc0cfa154f440e4725fc034bb737971a92b0c99a50', '[\"*\"]', NULL, NULL, '2025-06-03 11:10:40', '2025-06-03 11:10:40'),
(714, 'App\\Models\\Patient', 91, 'auth_token', '8530808d75940e377580036a1a9d5398f83632c4a8831de2a3fab480f3d9cf06', '[\"*\"]', '2025-06-03 12:20:46', NULL, '2025-06-03 11:10:50', '2025-06-03 12:20:46'),
(715, 'App\\Models\\Doctor', 81, 'auth_token', 'af2233bf7c60e055258709539efaf5fcc54cbc8680d14a7ff0e434453f938616', '[\"*\"]', '2025-06-03 16:51:33', NULL, '2025-06-03 11:11:36', '2025-06-03 16:51:33'),
(716, 'App\\Models\\Patient', 91, 'auth_token', '78ad104a176140dd085f7e5b2bc24ee75b6a7e3c85ff11b7b212938c3c1406d4', '[\"*\"]', '2025-06-03 17:11:02', NULL, '2025-06-03 11:29:46', '2025-06-03 17:11:02'),
(717, 'App\\Models\\Doctor', 82, 'auth_token', 'cbe6ed4c3162f54f2cb3b61d6fe4666cb8220e63467f81c12bbaac99b4a91f7b', '[\"*\"]', '2025-06-03 12:43:47', NULL, '2025-06-03 12:21:08', '2025-06-03 12:43:47'),
(718, 'App\\Models\\Patient', 91, 'auth_token', '6a8af6edd2f3a6aea3eef2a857fbfaa5cc6195ffb6ebb0b32ee79d764a39ca2f', '[\"*\"]', '2025-06-03 12:44:04', NULL, '2025-06-03 12:43:58', '2025-06-03 12:44:04'),
(719, 'App\\Models\\Doctor', 70, 'auth_token', '37ee6ee5059555b3a79bb365399a061d15952a67beca6ab84061b171433476d7', '[\"*\"]', '2025-06-03 16:46:27', NULL, '2025-06-03 16:31:55', '2025-06-03 16:46:27'),
(720, 'App\\Models\\Patient', 91, 'auth_token', 'dbab0bfa423552c9473382a28f57394c1b53faab9539887a0864e15fe171bb16', '[\"*\"]', '2025-06-03 16:34:07', NULL, '2025-06-03 16:33:57', '2025-06-03 16:34:07'),
(721, 'App\\Models\\Patient', 78, 'auth_token', 'dd98cf6f8d7a130cfbf85bb0b6653c8715cfd4cece2d967c10d88d8f30577b1d', '[\"*\"]', '2025-06-03 16:49:10', NULL, '2025-06-03 16:46:50', '2025-06-03 16:49:10'),
(722, 'App\\Models\\Doctor', 70, 'auth_token', '8fc53d01029569ee96d67c4c0e7a3fdf5c502e668380949d03693fafebf52910', '[\"*\"]', '2025-06-23 17:00:18', NULL, '2025-06-03 16:49:47', '2025-06-23 17:00:18'),
(723, 'App\\Models\\Student', 114, 'auth_token', 'e28734266712a94fb792aca09dc445ea96052b7fb82c77cacb8e77dc67bb2834', '[\"*\"]', '2025-06-16 09:58:10', NULL, '2025-06-03 16:51:46', '2025-06-16 09:58:10'),
(724, 'App\\Models\\Doctor', 82, 'auth_token', 'd8d98b3fd23df5e73a91ee1ea5298b4ffad85522a6e55326b2ca1b37e5bbe56c', '[\"*\"]', '2025-07-07 15:31:37', NULL, '2025-06-03 17:11:29', '2025-07-07 15:31:37'),
(725, 'App\\Models\\Student', 114, 'auth_token', 'be2d71351c91a488d076f82913dd609ba93df9dadc8d0b3244d649566eba1f5d', '[\"*\"]', '2025-06-03 17:21:10', NULL, '2025-06-03 17:20:53', '2025-06-03 17:21:10'),
(726, 'App\\Models\\Patient', 92, 'auth_token', 'ce88d65d1348dd5a2be305a12e5c356d3be3d7a19936a050c6b8530ec5170255', '[\"*\"]', NULL, NULL, '2025-06-03 23:19:19', '2025-06-03 23:19:19'),
(727, 'App\\Models\\Patient', 92, 'auth_token', '6095b3a8248dd9b05935391418bbbed356b23b5ecd45850f16148190dff06c7f', '[\"*\"]', '2025-06-04 00:05:26', NULL, '2025-06-03 23:19:38', '2025-06-04 00:05:26'),
(728, 'App\\Models\\Doctor', 82, 'auth_token', '68e5cca70e6cd04df793486c9a12d66a602cf6058c770f29c06e63faeebc1135', '[\"*\"]', '2025-06-16 10:12:18', NULL, '2025-06-04 09:51:43', '2025-06-16 10:12:18'),
(729, 'App\\Models\\Doctor', 82, 'auth_token', 'cc26afd94bea62dafcbb2f3774a482da4b7918633a770d5bb23f4daa90257032', '[\"*\"]', '2025-06-04 12:30:47', NULL, '2025-06-04 10:21:42', '2025-06-04 12:30:47'),
(730, 'App\\Models\\Student', 115, 'auth_token', '3a77f54bdc1870393f09b15c0163a41903408b1d5d1b056b94ef610c45ad4541', '[\"*\"]', '2025-06-05 21:17:44', NULL, '2025-06-05 21:17:40', '2025-06-05 21:17:44'),
(731, 'App\\Models\\Doctor', 84, 'auth_token', 'fe986505bdd1d350103dd031f78b87ac2bd07a7050578f29e9d124f368fa6f77', '[\"*\"]', NULL, NULL, '2025-06-05 21:19:16', '2025-06-05 21:19:16'),
(732, 'App\\Models\\Doctor', 84, 'auth_token', 'fafd951674dfaf7da9412baa0ba3da9007cf164a74a6c302157c7d6c1ea68bd7', '[\"*\"]', '2025-06-20 14:16:11', NULL, '2025-06-05 21:24:55', '2025-06-20 14:16:11'),
(733, 'App\\Models\\Patient', 93, 'auth_token', '490394a8337abfdbfc4301f3ec48bdcd2d908decffc8cc1cb66d2ef1adc03c2a', '[\"*\"]', NULL, NULL, '2025-06-06 04:43:20', '2025-06-06 04:43:20'),
(734, 'App\\Models\\Patient', 94, 'auth_token', '9d6a9676b39fb590deef31c8f4329a264d4d684630e31154342861cb2bb9f661', '[\"*\"]', NULL, NULL, '2025-06-13 22:34:41', '2025-06-13 22:34:41'),
(735, 'App\\Models\\Doctor', 81, 'auth_token', '7067f63819e9391f6faeac2dfdd548d4f7ebbb3843704f0f722ca6cac4c85154', '[\"*\"]', '2025-06-16 10:10:46', NULL, '2025-06-16 10:09:17', '2025-06-16 10:10:46'),
(736, 'App\\Models\\Patient', 79, 'auth_token', '3685b1b459847e616df6662ad3a942fecb2f89d7bf08a94e5b55270d662f7a9f', '[\"*\"]', '2025-06-16 10:11:50', NULL, '2025-06-16 10:11:11', '2025-06-16 10:11:50'),
(737, 'App\\Models\\Patient', 79, 'auth_token', 'a5aedfebecf0485f86dcd024f13da82af26e8224fcd692d901d5f6cb6e03d9e4', '[\"*\"]', '2025-06-16 11:56:09', NULL, '2025-06-16 10:13:07', '2025-06-16 11:56:09'),
(738, 'App\\Models\\Doctor', 81, 'auth_token', '42cd14d0caad73e57fc5bf741a228ec44974f5e0a97b7632e812ab62a4b25ce3', '[\"*\"]', '2025-06-25 15:50:22', NULL, '2025-06-16 10:15:18', '2025-06-25 15:50:22'),
(739, 'App\\Models\\Patient', 79, 'auth_token', 'b20b8cf89e672c8dddb48a9f08735e798f0839eb9dd810834d7632ba31aa58b3', '[\"*\"]', NULL, NULL, '2025-06-16 10:22:20', '2025-06-16 10:22:20'),
(740, 'App\\Models\\Doctor', 81, 'auth_token', '34f0230dfa20ffb165f742590c842d9942064b12a4a01381ccfb67978d078ea8', '[\"*\"]', '2025-06-16 10:59:02', NULL, '2025-06-16 10:22:30', '2025-06-16 10:59:02'),
(741, 'App\\Models\\Doctor', 81, 'auth_token', 'ff93c2b723767a0a0f1873918f2502b818f43c756a2257ebb3ee1f82e8c5aec8', '[\"*\"]', '2025-06-16 11:20:41', NULL, '2025-06-16 11:02:36', '2025-06-16 11:20:41'),
(742, 'App\\Models\\Doctor', 81, 'auth_token', 'e9d618a86475f16711e79f5bfffeb227c2a395b63b8c8bac03a8ca99d63c723f', '[\"*\"]', '2025-06-16 11:45:27', NULL, '2025-06-16 11:36:20', '2025-06-16 11:45:27'),
(743, 'App\\Models\\Patient', 79, 'auth_token', 'b4ec5b99ef99b12888c3d2ee8a3812d0be3693eaf12ea5611ceb85bb818b327c', '[\"*\"]', '2025-06-16 11:56:26', NULL, '2025-06-16 11:45:51', '2025-06-16 11:56:26'),
(744, 'App\\Models\\Doctor', 81, 'auth_token', '836406b53c6ea7030781eca4cd14837057166921a6e8f0ce8c4bf31b44cde3a5', '[\"*\"]', '2025-06-16 11:47:41', NULL, '2025-06-16 11:47:25', '2025-06-16 11:47:41'),
(745, 'App\\Models\\Student', 114, 'auth_token', '6463cf2cea16c1cdddf3a66527ded7c231171b8624060b6a3d5c04cdf908b635', '[\"*\"]', '2025-06-17 17:42:49', NULL, '2025-06-16 11:56:22', '2025-06-17 17:42:49'),
(746, 'App\\Models\\Doctor', 81, 'auth_token', '33a7e5d213bb9595c32c98f31a1a28249f5ff15a83e69bc598d33ff21cd8461d', '[\"*\"]', '2025-06-23 10:18:30', NULL, '2025-06-16 11:56:37', '2025-06-23 10:18:30'),
(747, 'App\\Models\\Doctor', 70, 'auth_token', 'c0ae637f4d32e7642af73c788f81566f64e49477722d313f5fe08ae852ccfe37', '[\"*\"]', '2025-06-17 10:30:14', NULL, '2025-06-17 09:50:46', '2025-06-17 10:30:14'),
(748, 'App\\Models\\Patient', 78, 'auth_token', '58a7a07bf928f66bd280e535f6d5d6dc32ebe29a872c7e87283a7763f8f75cf8', '[\"*\"]', '2025-06-17 11:51:04', NULL, '2025-06-17 10:30:41', '2025-06-17 11:51:04'),
(749, 'App\\Models\\Doctor', 70, 'auth_token', 'd1c099c553791b4111ade571517227158206e5ec466d9d156dcab53c0cc47850', '[\"*\"]', '2025-06-19 09:01:30', NULL, '2025-06-17 10:30:56', '2025-06-19 09:01:30'),
(750, 'App\\Models\\Doctor', 81, 'auth_token', '7f9e1443a4f3aae1654c6222ce1a26db46c293d401d3dfb5a2af80c01df992d2', '[\"*\"]', '2025-06-17 15:10:15', NULL, '2025-06-17 12:22:51', '2025-06-17 15:10:15'),
(751, 'App\\Models\\Doctor', 81, 'auth_token', '048128ae2ef65bec406a14f396b1cb38af8d672e15dada44842c1f50f099cfc8', '[\"*\"]', '2025-06-17 16:15:11', NULL, '2025-06-17 14:11:11', '2025-06-17 16:15:11'),
(752, 'App\\Models\\Doctor', 81, 'auth_token', '54679531952448dda4d5f279a56e17a8441bbbdfe951c88b97b9524cf71f8813', '[\"*\"]', '2025-06-18 11:07:01', NULL, '2025-06-17 15:10:49', '2025-06-18 11:07:01'),
(753, 'App\\Models\\Patient', 79, 'auth_token', '0b4b0f192385545c521b18c6b78cd481d314d65bbbdc3d7da0780e2a8aa1bcdc', '[\"*\"]', '2025-06-18 10:49:50', NULL, '2025-06-17 17:55:28', '2025-06-18 10:49:50'),
(754, 'App\\Models\\Doctor', 81, 'auth_token', '0862394e9b91e4bbcd86b9d6b038ed0e7f6f26d0d42ff1b3159dec7f4720d074', '[\"*\"]', '2025-06-18 10:49:00', NULL, '2025-06-18 10:34:03', '2025-06-18 10:49:00'),
(755, 'App\\Models\\Doctor', 81, 'auth_token', 'b1779101c8c9c4e41afa7cad2cb37f9639e3bd4ef0231067a068b5c2a28308c8', '[\"*\"]', '2025-06-22 11:50:16', NULL, '2025-06-18 10:50:17', '2025-06-22 11:50:16'),
(756, 'App\\Models\\Doctor', 81, 'auth_token', '75cea928fb53d1c9b86cc7b7d6e000bbc3e1df2c4dcbef8c11645c12e08b45ff', '[\"*\"]', '2025-06-18 10:52:49', NULL, '2025-06-18 10:51:09', '2025-06-18 10:52:49'),
(757, 'App\\Models\\Doctor', 81, 'auth_token', 'fa5461e9de506b9f36e899d50c93d5d97700f5416c8cb48a5274ffc91be05dac', '[\"*\"]', NULL, NULL, '2025-06-18 11:01:46', '2025-06-18 11:01:46');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(758, 'App\\Models\\Patient', 79, 'auth_token', '5f07e6391707e972d75b4610dad1d1c3cb2c9d3910a5cc02f56571855e2c0192', '[\"*\"]', '2025-06-18 13:18:27', NULL, '2025-06-18 11:18:03', '2025-06-18 13:18:27'),
(759, 'App\\Models\\Patient', 95, 'auth_token', '37367ef15165bace9ec6736c6a0ae3e061b11399f3ee38064f659cef401e02bf', '[\"*\"]', NULL, NULL, '2025-06-18 13:22:31', '2025-06-18 13:22:31'),
(760, 'App\\Models\\Patient', 95, 'auth_token', 'e21c9514fd51210c699fa27270fc570927ed5e0e1d0e52078543805d281cd67a', '[\"*\"]', '2025-06-18 13:23:38', NULL, '2025-06-18 13:22:54', '2025-06-18 13:23:38'),
(761, 'App\\Models\\Doctor', 81, 'auth_token', '131c2d0d68bcafd92823167ee22a20c604b8aa5e12adceaa7597b55d910ea7c3', '[\"*\"]', '2025-06-18 13:59:47', NULL, '2025-06-18 13:24:12', '2025-06-18 13:59:47'),
(762, 'App\\Models\\Patient', 95, 'auth_token', '4ea21b0818f49e8831563a00f9fee06ecc167491454adff15e854b1680421398', '[\"*\"]', '2025-06-18 14:01:22', NULL, '2025-06-18 14:00:50', '2025-06-18 14:01:22'),
(763, 'App\\Models\\Student', 114, 'auth_token', '290cd9a3502c1bea6d4896f82eae32e77eb361656315fa59c4c58e67fd3a7d31', '[\"*\"]', '2025-06-22 12:03:46', NULL, '2025-06-18 14:02:00', '2025-06-22 12:03:46'),
(764, 'App\\Models\\Patient', 78, 'auth_token', 'f08cf2f40ee4a122a097029be233a312c1b8659d42059ab4b0c44cfc44ab5350', '[\"*\"]', '2025-06-27 12:15:52', NULL, '2025-06-19 16:50:30', '2025-06-27 12:15:52'),
(765, 'App\\Models\\Doctor', 70, 'auth_token', 'fa06522531ef89d9dbe6ca3cf58a76ef3fc20dc4d6fd3d5f1cc3a9753a3bc94c', '[\"*\"]', '2025-06-20 14:38:23', NULL, '2025-06-19 20:44:33', '2025-06-20 14:38:23'),
(766, 'App\\Models\\Doctor', 70, 'auth_token', '72944ebc55c533dd8aace1e2b6f9264e22f6e2fed7ecdceaf7c8264c0cffae44', '[\"*\"]', NULL, NULL, '2025-06-19 22:02:01', '2025-06-19 22:02:01'),
(767, 'App\\Models\\Patient', 96, 'auth_token', '5772fd354770e5ee7448c01c60d46fdb323a823335c9d7d50b8890f484cdeb47', '[\"*\"]', NULL, NULL, '2025-06-19 22:05:25', '2025-06-19 22:05:25'),
(768, 'App\\Models\\Patient', 96, 'auth_token', '554a1a5b06beaf8f54f9435d959674dde63c152d769d1fcfbef802383e34e4bb', '[\"*\"]', '2025-06-19 22:22:41', NULL, '2025-06-19 22:06:28', '2025-06-19 22:22:41'),
(769, 'App\\Models\\Patient', 97, 'auth_token', '69a56aa9e7bc229c94725c46ec76a1e1e4b8e2b4f3f36123b0f4beb2ab576684', '[\"*\"]', NULL, NULL, '2025-06-19 22:17:40', '2025-06-19 22:17:40'),
(770, 'App\\Models\\Patient', 97, 'auth_token', '2c6b78aa4db4af515b31a4a312f20cb973e54b90fdcdaae73cf30afb92b35ce7', '[\"*\"]', '2025-06-19 22:21:36', NULL, '2025-06-19 22:18:01', '2025-06-19 22:21:36'),
(771, 'App\\Models\\Patient', 82, 'auth_token', '88cad463628e704fb6ff515abb18e0b3057015f16da6e0cd2ac5d84745ab90b1', '[\"*\"]', '2025-06-20 21:31:14', NULL, '2025-06-20 14:19:06', '2025-06-20 21:31:14'),
(772, 'App\\Models\\Patient', 82, 'auth_token', 'eb36aa047164effa4e18506aa0be33ae932d833fa0a40b8d9a40990041c5a720', '[\"*\"]', '2025-06-20 19:33:49', NULL, '2025-06-20 14:38:57', '2025-06-20 19:33:49'),
(773, 'App\\Models\\Doctor', 70, 'auth_token', '97a4f893d35ab5d98ff6dc2eae9903c2747920a08c259ff36dfedfb8a7d17fb5', '[\"*\"]', '2025-06-20 21:41:08', NULL, '2025-06-20 19:36:36', '2025-06-20 21:41:08'),
(774, 'App\\Models\\Doctor', 70, 'auth_token', 'fd195ae270b142d595b607da3f4968726526ecd09f0090891d0f9816b13fa52d', '[\"*\"]', '2025-06-20 21:33:52', NULL, '2025-06-20 21:31:37', '2025-06-20 21:33:52'),
(775, 'App\\Models\\Patient', 82, 'auth_token', '603be62ef77eacf173a8f052ad536705f82eae45bdc9502f061e636231045e57', '[\"*\"]', '2025-06-24 14:12:09', NULL, '2025-06-20 21:34:14', '2025-06-24 14:12:09'),
(776, 'App\\Models\\Doctor', 70, 'auth_token', '3349108ad89bd058ddfefa5baf1be3833168087eebafdb03c9c62858fba99736', '[\"*\"]', '2025-06-24 11:26:42', NULL, '2025-06-20 21:44:03', '2025-06-24 11:26:42'),
(777, 'App\\Models\\Doctor', 70, 'auth_token', '6f6c1b6a201e31c970636e752c8418b484c3cc59434c25dc8c7d0dc16fb66704', '[\"*\"]', '2025-06-21 00:04:39', NULL, '2025-06-21 00:03:36', '2025-06-21 00:04:39'),
(778, 'App\\Models\\Doctor', 70, 'auth_token', '02c94e342499aa4e4b8b4548b4df6c279a1e6440837be9ebe222d7f36f0575e2', '[\"*\"]', NULL, NULL, '2025-06-21 00:26:56', '2025-06-21 00:26:56'),
(779, 'App\\Models\\Doctor', 70, 'auth_token', '036e351eca067be8dbad9442f325083e50ab420d2a512a7777024d77ded1bb1f', '[\"*\"]', NULL, NULL, '2025-06-21 00:27:07', '2025-06-21 00:27:07'),
(780, 'App\\Models\\Doctor', 70, 'auth_token', '62f465fd497c06e7a3b1e5aa89cf622345bf07a599f48f524a21552e5c28a9fa', '[\"*\"]', '2025-06-21 00:27:58', NULL, '2025-06-21 00:27:14', '2025-06-21 00:27:58'),
(781, 'App\\Models\\Student', 114, 'auth_token', '96381f4d813a7f47fc454a14899cfc41d96fb66d166b265f96c932e0d8f94366', '[\"*\"]', '2025-06-22 10:51:52', NULL, '2025-06-22 10:47:51', '2025-06-22 10:51:52'),
(782, 'App\\Models\\Student', 114, 'auth_token', '0fa2efc56db73d76716268bcba72a39f38236d17ea53230c45f14afc71f3fbfa', '[\"*\"]', NULL, NULL, '2025-06-22 11:00:52', '2025-06-22 11:00:52'),
(783, 'App\\Models\\Student', 114, 'auth_token', '7cd1c4b17af127e6721fa42e66de37b2697045a225bcc4b4c74e9347cc14cd23', '[\"*\"]', NULL, NULL, '2025-06-22 11:03:50', '2025-06-22 11:03:50'),
(784, 'App\\Models\\Student', 114, 'auth_token', '960c21f8b4a02e398c25e6c7bdde1066793e4c2ba37e785a4afbc0753fa5b23c', '[\"*\"]', NULL, NULL, '2025-06-22 11:06:29', '2025-06-22 11:06:29'),
(785, 'App\\Models\\Student', 114, 'auth_token', 'dbd60ac98b3dae99d7896ddeb22d0be00ceae1034ed181bd5362e6f8cf91f1fe', '[\"*\"]', '2025-06-22 11:50:42', NULL, '2025-06-22 11:50:33', '2025-06-22 11:50:42'),
(786, 'App\\Models\\Patient', 79, 'auth_token', 'c13edbff7e36ea6b47aecb2bb0c307cc5d5a71eeef10086c933c18e7b08026da', '[\"*\"]', '2025-06-22 11:54:19', NULL, '2025-06-22 11:53:38', '2025-06-22 11:54:19'),
(787, 'App\\Models\\Patient', 79, 'auth_token', '6b1c9b7ee510bee43401632ba18f3b58350e3ca22d5677cf82545b2427251a80', '[\"*\"]', '2025-06-22 11:59:46', NULL, '2025-06-22 11:57:50', '2025-06-22 11:59:46'),
(788, 'App\\Models\\Student', 114, 'auth_token', '97a2622cc2118abbd8263e123c4ad5170be6431dc6d2777ca520223556a482d8', '[\"*\"]', '2025-06-22 12:14:32', NULL, '2025-06-22 12:00:07', '2025-06-22 12:14:32'),
(789, 'App\\Models\\Patient', 79, 'auth_token', '30f8b464ec030adc8b56f7fd7a30a7515ecad42866a74cac140c43dfda547153', '[\"*\"]', '2025-06-22 12:11:15', NULL, '2025-06-22 12:06:40', '2025-06-22 12:11:15'),
(790, 'App\\Models\\Patient', 95, 'auth_token', '69229decbc219beeead29d3c064197ffc214f15a048232489c41d04327a59a70', '[\"*\"]', '2025-06-22 13:18:43', NULL, '2025-06-22 13:18:41', '2025-06-22 13:18:43'),
(791, 'App\\Models\\Doctor', 81, 'auth_token', '1bc3ec2825e38a75472a2514aeaa99721ce66caed55278ee6ce3ce3f30aff573', '[\"*\"]', '2025-06-23 10:10:04', NULL, '2025-06-22 16:07:19', '2025-06-23 10:10:04'),
(792, 'App\\Models\\Doctor', 81, 'auth_token', 'f99d504b58bb8475accebf9f10b3d04bb98579859712f3b0aecdf8b3e5b319ad', '[\"*\"]', '2025-06-23 10:07:12', NULL, '2025-06-23 10:05:16', '2025-06-23 10:07:12'),
(793, 'App\\Models\\Patient', 79, 'auth_token', 'a47ccae0e2969a5056c711e3f6eaf2b931400ccc53804d2c663043e35c69b93b', '[\"*\"]', '2025-06-23 10:12:22', NULL, '2025-06-23 10:07:41', '2025-06-23 10:12:22'),
(794, 'App\\Models\\Patient', 79, 'auth_token', '5d444af30df55c57011b4ba75378d8c114ec48b03f7d0022e996d09b96b08ae5', '[\"*\"]', '2025-06-23 10:28:24', NULL, '2025-06-23 10:09:00', '2025-06-23 10:28:24'),
(795, 'App\\Models\\Patient', 79, 'auth_token', '31295adea3f955ff03f6eb86d3c031f521365979a714fe4676e3d6f1af1fe4cc', '[\"*\"]', '2025-06-23 10:11:05', NULL, '2025-06-23 10:10:17', '2025-06-23 10:11:05'),
(796, 'App\\Models\\Doctor', 81, 'auth_token', '3df67175786bc5115d2a3e94f5a08a25b0fb3fff136e7efe64227b950800d5a3', '[\"*\"]', '2025-06-23 10:17:20', NULL, '2025-06-23 10:11:18', '2025-06-23 10:17:20'),
(797, 'App\\Models\\Patient', 79, 'auth_token', 'bc92be4e7970a1dbd8949e9caf94838b01e5190e6880820afc31419e1dad1efd', '[\"*\"]', '2025-06-23 10:24:43', NULL, '2025-06-23 10:17:38', '2025-06-23 10:24:43'),
(798, 'App\\Models\\Doctor', 81, 'auth_token', 'f41f9f70ced68f95c72bc3286de52165f522cb146c597397e267b82b6de63b60', '[\"*\"]', '2025-06-23 17:05:46', NULL, '2025-06-23 10:25:02', '2025-06-23 17:05:46'),
(799, 'App\\Models\\Patient', 79, 'auth_token', '453f1e194001362ec9a5607bad0a9134e62dd4c73edc483e294b0085972f4050', '[\"*\"]', '2025-06-23 12:55:25', NULL, '2025-06-23 11:39:34', '2025-06-23 12:55:25'),
(800, 'App\\Models\\Doctor', 81, 'auth_token', '1ae0891f2e4955631d02914a77f7b81bb40385f304d7f6a42c418802d1d9ea9b', '[\"*\"]', '2025-06-23 12:56:11', NULL, '2025-06-23 12:55:51', '2025-06-23 12:56:11'),
(801, 'App\\Models\\Doctor', 81, 'auth_token', '1179a8e7916ac55b40dfa9d0bb30e0cd2a0d7895ce21c4522aeb06664e0c6753', '[\"*\"]', '2025-06-23 13:29:20', NULL, '2025-06-23 13:25:48', '2025-06-23 13:29:20'),
(802, 'App\\Models\\Doctor', 81, 'auth_token', '3a2f61e9c25543536887cd82bb4fc5f7219c1aa74c27828e88dd31ad63daee24', '[\"*\"]', '2025-06-23 14:01:10', NULL, '2025-06-23 13:56:54', '2025-06-23 14:01:10'),
(803, 'App\\Models\\Doctor', 81, 'auth_token', 'c6c9afbc60f217bc3dca1e78113b457db8f2619c1f15e7b54e3414ed512636f0', '[\"*\"]', '2025-06-23 14:26:38', NULL, '2025-06-23 14:25:08', '2025-06-23 14:26:38'),
(804, 'App\\Models\\Patient', 79, 'auth_token', '909eef57ac2d6c97ca2894c5a50ab61bb6ee8fbd207bbf871e944e8a4d243759', '[\"*\"]', '2025-06-23 14:30:27', NULL, '2025-06-23 14:26:59', '2025-06-23 14:30:27'),
(805, 'App\\Models\\Doctor', 70, 'auth_token', 'd07349afcdb7736eac206126f3960ef70a521df90d0ec83286b7a956516a88fe', '[\"*\"]', '2025-06-23 15:11:03', NULL, '2025-06-23 15:08:16', '2025-06-23 15:11:03'),
(806, 'App\\Models\\Doctor', 70, 'auth_token', '38339184bea1bc9a26227d0483d964baac194f663e6ade1675d27cd5eac1f385', '[\"*\"]', '2025-06-23 17:03:27', NULL, '2025-06-23 17:02:28', '2025-06-23 17:03:27'),
(807, 'App\\Models\\Patient', 78, 'auth_token', '86cbb7519a955747cd31117dce50ee05e30a9130f216e26b74980af9d083b3da', '[\"*\"]', '2025-07-07 16:47:36', NULL, '2025-06-23 17:03:57', '2025-07-07 16:47:36'),
(808, 'App\\Models\\Patient', 79, 'auth_token', '4399de5fa83484528f7dbb725cdce23e6525a60529cd66ab798af67156f9817b', '[\"*\"]', '2025-06-23 17:10:56', NULL, '2025-06-23 17:06:14', '2025-06-23 17:10:56'),
(809, 'App\\Models\\Student', 114, 'auth_token', '260d40a552415d3e7e337025b2000541250b120eb1847f338aa084e53cb896b4', '[\"*\"]', '2025-06-24 11:05:11', NULL, '2025-06-23 17:11:35', '2025-06-24 11:05:11'),
(810, 'App\\Models\\Doctor', 70, 'auth_token', '37df9dc93447387a5e4be4e9a6c05dfdcb8344619de721354c035b3108fd70ca', '[\"*\"]', '2025-06-26 13:32:22', NULL, '2025-06-23 22:50:58', '2025-06-26 13:32:22'),
(811, 'App\\Models\\Doctor', 70, 'auth_token', '1a05bd230ad9409d09a73013cc0e7b12101b926b494c17c72c8ae02401f9e276', '[\"*\"]', '2025-06-26 14:47:45', NULL, '2025-06-23 23:06:48', '2025-06-26 14:47:45'),
(812, 'App\\Models\\Doctor', 81, 'auth_token', '7e7fea20d745b708c13e259dfac081254df2b245a6e48106687e259a985e3227', '[\"*\"]', '2025-06-24 11:15:52', NULL, '2025-06-24 11:05:34', '2025-06-24 11:15:52'),
(813, 'App\\Models\\Doctor', 70, 'auth_token', '4a68ab36d43e1882d330ea528edac6565543c39d67bde47258870e89c3783e35', '[\"*\"]', '2025-06-24 11:24:41', NULL, '2025-06-24 11:19:24', '2025-06-24 11:24:41'),
(814, 'App\\Models\\Doctor', 81, 'auth_token', '3d58c982233380e4c9e9f15b2aeed46273a83dd199593aeb3e3246af30175bde', '[\"*\"]', '2025-06-24 11:27:00', NULL, '2025-06-24 11:25:02', '2025-06-24 11:27:00'),
(815, 'App\\Models\\Student', 115, 'auth_token', 'f40291e6006d97c2ffa0f265268b8cb178a5649e7d826c9514f4945b3c0ce29a', '[\"*\"]', '2025-06-24 11:29:02', NULL, '2025-06-24 11:27:11', '2025-06-24 11:29:02'),
(816, 'App\\Models\\Student', 114, 'auth_token', '27d0120ae05b6ec890711b417d57c1fd024d6a2c5862261f1744c610dc0ddd04', '[\"*\"]', '2025-06-24 11:28:51', NULL, '2025-06-24 11:28:43', '2025-06-24 11:28:51'),
(817, 'App\\Models\\Doctor', 70, 'auth_token', '9e7083cd9c138ef707990ec3a755e764dab8f55ba47b540c450c9f12dd7e160e', '[\"*\"]', '2025-06-24 21:30:28', NULL, '2025-06-24 11:29:50', '2025-06-24 21:30:28'),
(818, 'App\\Models\\Student', 114, 'auth_token', '9caf8677b45865d9138bf1278c8d9be11b8d4315b138b90c98b3506fe46cc5d8', '[\"*\"]', NULL, NULL, '2025-06-24 11:31:28', '2025-06-24 11:31:28'),
(819, 'App\\Models\\Student', 114, 'auth_token', 'c4b273f09d1c88e5a31503bbccba80960c73f1288457309def801f17bd1064f2', '[\"*\"]', '2025-06-25 15:50:57', NULL, '2025-06-24 11:32:56', '2025-06-25 15:50:57'),
(820, 'App\\Models\\Student', 114, 'auth_token', '7a35635cf59acf74358586e1747276f9cfed4c48fb5faacb68e15dfc2e48862e', '[\"*\"]', NULL, NULL, '2025-06-24 11:33:15', '2025-06-24 11:33:15'),
(821, 'App\\Models\\Student', 114, 'auth_token', '574a491dd0a71293e9ec2a88bb7c375ee59ce9212610dafc154ddc3785da2961', '[\"*\"]', '2025-06-25 15:51:53', NULL, '2025-06-24 11:34:33', '2025-06-25 15:51:53'),
(822, 'App\\Models\\Patient', 82, 'auth_token', 'd3e6ecb00585428200058ad3a9353a8790886917f7d6bdb0daa9774d5ef72b87', '[\"*\"]', '2025-07-10 16:45:26', NULL, '2025-06-24 14:12:39', '2025-07-10 16:45:26'),
(823, 'App\\Models\\Patient', 92, 'auth_token', '754686f9ce4fc39e65d624075b9f61414de4343d5dd1f778823659a40d6cb672', '[\"*\"]', '2025-06-25 11:32:55', NULL, '2025-06-24 21:30:49', '2025-06-25 11:32:55'),
(824, 'App\\Models\\Doctor', 70, 'auth_token', '33496d57e61c7722f141ce7195250bccd0a5ba514ba704e52bdfe97bda652613', '[\"*\"]', '2025-06-24 21:49:20', NULL, '2025-06-24 21:45:20', '2025-06-24 21:49:20'),
(825, 'App\\Models\\Doctor', 70, 'auth_token', 'a53dfd4f6ada93db41acd360d8fb20b6200ef67e1d97b6a692405dd63b409d01', '[\"*\"]', '2025-06-26 21:00:40', NULL, '2025-06-25 11:33:15', '2025-06-26 21:00:40'),
(826, 'App\\Models\\Patient', 79, 'auth_token', 'e45a80dd0dd7e57451eb89d1daf81e24469468ed79038dc5981958064858340b', '[\"*\"]', '2025-06-25 15:54:24', NULL, '2025-06-25 15:51:19', '2025-06-25 15:54:24'),
(827, 'App\\Models\\Patient', 98, 'auth_token', '358329bcbe998cac5eeb15b8dcdc351a7f4b4e4ac5fd5c9bcf3402d86f3852df', '[\"*\"]', NULL, NULL, '2025-06-25 15:55:27', '2025-06-25 15:55:27'),
(828, 'App\\Models\\Patient', 98, 'auth_token', '1d25f9210b77636edcb6f2ac0d87291e3bca26596d8c325972e2ed72e670c8d1', '[\"*\"]', '2025-06-25 16:33:41', NULL, '2025-06-25 15:55:50', '2025-06-25 16:33:41'),
(829, 'App\\Models\\Patient', 98, 'auth_token', 'c1110141399dbdd4d5da779be132de1ecf08faf77de8d31d7e58dafc5cb1efc0', '[\"*\"]', '2025-06-25 17:05:34', NULL, '2025-06-25 16:56:10', '2025-06-25 17:05:34'),
(830, 'App\\Models\\Doctor', 70, 'auth_token', '27a1042e54d9c5840f0eac237fda4186cfdc278c509c26410c82d5a020b0bab1', '[\"*\"]', '2025-06-26 12:22:23', NULL, '2025-06-25 23:03:44', '2025-06-26 12:22:23'),
(831, 'App\\Models\\Doctor', 81, 'auth_token', '8384ebc47fb5eaf0142465b83f799cf5238c21c8d99b90538f357bc3d010b92a', '[\"*\"]', '2025-06-30 13:18:19', NULL, '2025-06-26 09:32:07', '2025-06-30 13:18:19'),
(832, 'App\\Models\\Doctor', 81, 'auth_token', '29789618b6ff4db8e574c9fab7759bfb5076d9b4f4cf951ee8ee299b180fb488', '[\"*\"]', '2025-06-26 12:28:43', NULL, '2025-06-26 09:34:19', '2025-06-26 12:28:43'),
(833, 'App\\Models\\Patient', 79, 'auth_token', '7f014d3a9641c571188269a2704091ebf5af66ca75e87ad90fb59d22941e3538', '[\"*\"]', NULL, NULL, '2025-06-26 12:26:20', '2025-06-26 12:26:20'),
(834, 'App\\Models\\Patient', 79, 'auth_token', '0eb36d6613e627f4a8d375a329c4070689f379d9d0dd9377911fd5017a691a23', '[\"*\"]', '2025-06-26 12:26:37', NULL, '2025-06-26 12:26:32', '2025-06-26 12:26:37'),
(835, 'App\\Models\\Doctor', 81, 'auth_token', '6bfdd7b5a7f932828e3f35e754ea5a66be8aebfbb4a957c49b205ef1ed6955ec', '[\"*\"]', '2025-06-26 12:27:00', NULL, '2025-06-26 12:26:53', '2025-06-26 12:27:00'),
(836, 'App\\Models\\Doctor', 70, 'auth_token', '5efd8f57b9116161d7c9259e4c6384ac6ff242ec8a65efd8798b20d46cc4a782', '[\"*\"]', '2025-06-26 13:51:14', NULL, '2025-06-26 12:29:17', '2025-06-26 13:51:14'),
(837, 'App\\Models\\Doctor', 70, 'auth_token', '9acb5e0047dbd3798c9fe8b84db9c2ca9dae6fdf0a5d45521417a2bd4595e87a', '[\"*\"]', '2025-06-26 12:43:39', NULL, '2025-06-26 12:42:06', '2025-06-26 12:43:39'),
(838, 'App\\Models\\Doctor', 70, 'auth_token', '04510c148602ed3a3b0ce8b09f37ed7867aba18c4faeb587758175e3c2a6b258', '[\"*\"]', '2025-06-26 14:30:53', NULL, '2025-06-26 13:37:10', '2025-06-26 14:30:53'),
(839, 'App\\Models\\Doctor', 70, 'auth_token', '76b87289d8fa0970fe9769562fe3e1041589ba09794f175bc8445831fafe63cb', '[\"*\"]', '2025-06-26 15:11:45', NULL, '2025-06-26 14:58:16', '2025-06-26 15:11:45'),
(840, 'App\\Models\\Doctor', 70, 'auth_token', '29cb02db08e0bcbc3e8909c23070f0ceca0ddf4c7a91ff0f841255355725c990', '[\"*\"]', '2025-06-26 21:02:51', NULL, '2025-06-26 21:01:07', '2025-06-26 21:02:51'),
(841, 'App\\Models\\Patient', 92, 'auth_token', 'fe0ba92e665ef6a5f99161cea34e2cc08d31fa08f276f1add93e8fad6d7d012f', '[\"*\"]', '2025-06-28 20:04:47', NULL, '2025-06-26 21:03:11', '2025-06-28 20:04:47'),
(842, 'App\\Models\\Doctor', 70, 'auth_token', 'aabde0cc9ab206b2420c6d924376c7235fc2fb911e299bf7d95607383910bf74', '[\"*\"]', '2025-06-26 22:02:45', NULL, '2025-06-26 21:59:32', '2025-06-26 22:02:45'),
(843, 'App\\Models\\Patient', 99, 'auth_token', 'e61079953c718a62acebcea318189a67c4974918843bac7e6d1cce89a7a8fed3', '[\"*\"]', NULL, NULL, '2025-06-27 01:32:16', '2025-06-27 01:32:16'),
(844, 'App\\Models\\Patient', 99, 'auth_token', '6fadc1b3ea69b889cb0124e44e7c8197931d451feefe4c9984e1cd3752dedb72', '[\"*\"]', '2025-06-27 01:34:14', NULL, '2025-06-27 01:32:43', '2025-06-27 01:34:14'),
(845, 'App\\Models\\Patient', 100, 'auth_token', 'e26d26556be0b426525423b543eb57a2f4f84c68bfa83cd7b9d090bdc5c30cfe', '[\"*\"]', NULL, NULL, '2025-06-27 05:21:28', '2025-06-27 05:21:28'),
(846, 'App\\Models\\Patient', 100, 'auth_token', 'e5dbafe1ec29813f07aaf437d83c06e9752771acbc082b973d9dc8e836bede89', '[\"*\"]', '2025-06-27 05:23:14', NULL, '2025-06-27 05:21:43', '2025-06-27 05:23:14'),
(847, 'App\\Models\\Doctor', 70, 'auth_token', '8ffa29b56cd91863b46757aed1a437c1d3e69009dda6956a225a4bcf509e8b7f', '[\"*\"]', '2025-06-29 18:37:09', NULL, '2025-06-28 20:05:28', '2025-06-29 18:37:09'),
(848, 'App\\Models\\Patient', 92, 'auth_token', '233987a8936283a07bd4530083bd1cbac94e220ebb54b9d3e6761bd58de1fa68', '[\"*\"]', '2025-06-29 18:37:35', NULL, '2025-06-29 18:37:31', '2025-06-29 18:37:35'),
(849, 'App\\Models\\Patient', 92, 'auth_token', 'f93fc7df34f3999bacaa65bcd89e64847ec039df33ef1d3cae1bae51cbc1193a', '[\"*\"]', '2025-07-02 21:23:22', NULL, '2025-06-29 19:17:06', '2025-07-02 21:23:22'),
(850, 'App\\Models\\Doctor', 85, 'auth_token', '94d58ec72d24880f4937746b55eee61dbac0bb4d4a074e399ccc795dec837910', '[\"*\"]', NULL, NULL, '2025-06-30 11:38:40', '2025-06-30 11:38:40'),
(851, 'App\\Models\\Doctor', 85, 'auth_token', '27897f415c9e868db1ffb9879c411b4663fd578f8e449dc4ef9d8460936b4947', '[\"*\"]', '2025-06-30 15:56:04', NULL, '2025-06-30 11:38:58', '2025-06-30 15:56:04'),
(852, 'App\\Models\\Patient', 70, 'auth_token', '5ab5cdd73d9a34431c5d231a09883d9f7032fed74779ac0bb1feb53cdd16fbbe', '[\"*\"]', '2025-07-01 12:06:35', NULL, '2025-06-30 13:20:33', '2025-07-01 12:06:35'),
(853, 'App\\Models\\Doctor', 77, 'auth_token', '788277736471612dce8c0eac0974cc1a21049b0c76f4bee61c4d92169f65dd22', '[\"*\"]', '2025-07-01 17:31:19', NULL, '2025-07-01 12:09:51', '2025-07-01 17:31:19'),
(854, 'App\\Models\\Doctor', 81, 'auth_token', '74ef959a825572c67808914f96e3ad43c1c8e75c9296418e60b379d4453bfd2e', '[\"*\"]', '2025-07-02 13:01:08', NULL, '2025-07-01 17:00:53', '2025-07-02 13:01:08'),
(855, 'App\\Models\\Doctor', 81, 'auth_token', 'f967a69161d191e8dce28c8483a32bc4bb00f5c1351a25b1528baa8867134ed7', '[\"*\"]', '2025-07-02 12:36:06', NULL, '2025-07-01 17:31:40', '2025-07-02 12:36:06'),
(856, 'App\\Models\\Doctor', 77, 'auth_token', 'ae930b8b9093e400e313c7befc3a57982088ff2f9d63453eddfea9e9741dc482', '[\"*\"]', '2025-07-03 10:32:08', NULL, '2025-07-02 12:36:26', '2025-07-03 10:32:08'),
(857, 'App\\Models\\Doctor', 81, 'auth_token', 'f1645e66735a4af08b2621c7e885afbdfcb07e4bd506e50b919142fae08ffb90', '[\"*\"]', '2025-07-02 13:17:08', NULL, '2025-07-02 12:37:12', '2025-07-02 13:17:08'),
(858, 'App\\Models\\Patient', 79, 'auth_token', 'd42aab25fbfc26c4fcf965b02cb64f68c6ea79c7c127a8a7e0e1a7a383e028b3', '[\"*\"]', '2025-07-02 18:03:11', NULL, '2025-07-02 13:17:42', '2025-07-02 18:03:11'),
(859, 'App\\Models\\Student', 116, 'auth_token', '77ba94504a9e7c0d77444ca9ee6163684d2a02af9f2482b4b83bfacfd134377c', '[\"*\"]', NULL, NULL, '2025-07-02 13:49:01', '2025-07-02 13:49:01'),
(860, 'App\\Models\\Student', 116, 'auth_token', '0c9c1a144dc67a13d22e5c4bcbe6f981a86eddf3c2bd400ce3d1e417261d02ef', '[\"*\"]', '2025-07-03 20:41:41', NULL, '2025-07-02 13:49:36', '2025-07-03 20:41:41'),
(861, 'App\\Models\\Doctor', 81, 'auth_token', 'a4968e48729144297c5b84b628cb396c33f9805720473581a5278945cb8a8d62', '[\"*\"]', '2025-07-03 09:41:02', NULL, '2025-07-02 18:03:49', '2025-07-03 09:41:02'),
(862, 'App\\Models\\Patient', 101, 'auth_token', '0a000005a7f666d79ea961f8d0cc6378ddc7e2fc3c4acbcf98854ff17c3ccfbe', '[\"*\"]', NULL, NULL, '2025-07-02 19:59:02', '2025-07-02 19:59:02'),
(863, 'App\\Models\\Patient', 101, 'auth_token', '2232ed82cb9f30128a2d85106dc26fba3b6515901863d1d0eec50ad1b6cf33aa', '[\"*\"]', '2025-07-12 14:46:59', NULL, '2025-07-02 20:00:35', '2025-07-12 14:46:59'),
(864, 'App\\Models\\Doctor', 70, 'auth_token', 'd70c4e295b493f78bf18e9ee4d8ff32a8bf304bbb0a40751d6e0e2025b3c1605', '[\"*\"]', '2025-07-03 14:09:00', NULL, '2025-07-02 21:24:55', '2025-07-03 14:09:00'),
(865, 'App\\Models\\Doctor', 81, 'auth_token', '2e5f5ce302d0f7223163184ae4934117bfd9579908fcfa08c1deb998fd8e0c82', '[\"*\"]', '2025-07-03 14:08:49', NULL, '2025-07-03 13:48:16', '2025-07-03 14:08:49'),
(866, 'App\\Models\\Patient', 79, 'auth_token', '7b0bcb3300b1012fde667efbe0048fa7783bcf4aa4bf3ac481de750669fcad91', '[\"*\"]', '2025-07-07 11:48:54', NULL, '2025-07-03 14:09:07', '2025-07-07 11:48:54'),
(867, 'App\\Models\\Patient', 92, 'auth_token', '86680e6a9066b8c3a3f508460452f9ba87ae59673be1315d96821ef6f2c0d66d', '[\"*\"]', '2025-07-04 12:40:59', NULL, '2025-07-03 14:09:58', '2025-07-04 12:40:59'),
(868, 'App\\Models\\Doctor', 70, 'auth_token', '31ca684c00a309abcde0a4914155c0bdd37772a63210014143b49b48da833250', '[\"*\"]', '2025-07-04 12:44:34', NULL, '2025-07-04 12:41:23', '2025-07-04 12:44:34'),
(869, 'App\\Models\\Patient', 92, 'auth_token', '99aaef1579fce71f1680831ef109789bbca43c024d4e8d74e80c1fffb0e70fef', '[\"*\"]', '2025-07-04 12:46:15', NULL, '2025-07-04 12:45:22', '2025-07-04 12:46:15'),
(870, 'App\\Models\\Doctor', 70, 'auth_token', 'bec30fe93e957936420fe2048af78882b86595426985e77cc57bad9eb2f600e6', '[\"*\"]', '2025-07-07 16:31:05', NULL, '2025-07-04 12:46:33', '2025-07-07 16:31:05'),
(871, 'App\\Models\\Doctor', 81, 'auth_token', 'dcc5cf884e404f19e9b1a9f90e3afd2ecf4d69b89ff47a482ff829ff4f4f64aa', '[\"*\"]', '2025-07-11 22:53:33', NULL, '2025-07-04 21:37:54', '2025-07-11 22:53:33'),
(872, 'App\\Models\\Patient', 79, 'auth_token', '7e1ee2b65522fa5af8416ab37a01d6f9a07d6276c29f5324545e691bbdad44de', '[\"*\"]', '2025-07-07 15:36:05', NULL, '2025-07-07 15:31:57', '2025-07-07 15:36:05'),
(873, 'App\\Models\\Patient', 79, 'auth_token', '1d2b76744f6a9557c2c15e8c0f6424c01a0386007b18ecd908166da704dcc8ca', '[\"*\"]', '2025-07-07 16:56:03', NULL, '2025-07-07 15:37:14', '2025-07-07 16:56:03'),
(874, 'App\\Models\\Doctor', 82, 'auth_token', '2f33dbd9a600d729577fd1c73dbff7c853c8c9bb04b866d192c8c77434fdbb0e', '[\"*\"]', '2025-07-10 16:34:21', NULL, '2025-07-07 16:57:03', '2025-07-10 16:34:21'),
(875, 'App\\Models\\Doctor', 70, 'auth_token', 'e713f4f1dbed87f78c8efc57dca519a59cb148ab7a86e40689d0632589ec1894', '[\"*\"]', '2025-07-13 17:08:06', NULL, '2025-07-07 17:30:56', '2025-07-13 17:08:06'),
(876, 'App\\Models\\Doctor', 70, 'auth_token', '64a886648959f48b28ffb9bdc80a6cb8ff34b4ee7dbf3f424146a4f3d38769bd', '[\"*\"]', '2025-07-07 18:03:21', NULL, '2025-07-07 17:49:16', '2025-07-07 18:03:21'),
(877, 'App\\Models\\Patient', 92, 'auth_token', '5743b60e760470f9655a091c619d1f72e7202e3f4be2ea4f3f5e6f5716e1fdeb', '[\"*\"]', '2025-07-07 20:01:07', NULL, '2025-07-07 18:03:52', '2025-07-07 20:01:07'),
(878, 'App\\Models\\Patient', 102, 'auth_token', 'ba265f49b61697a3c2b98d018617886c27bef33b287c4736648faa8455d81dfc', '[\"*\"]', NULL, NULL, '2025-07-07 19:57:53', '2025-07-07 19:57:53'),
(879, 'App\\Models\\Patient', 102, 'auth_token', '609c6f35e11c78d9debf657234f9d33d36e37d27d4c0f4165a8aff3cb35d06ab', '[\"*\"]', '2025-07-07 20:06:14', NULL, '2025-07-07 19:58:13', '2025-07-07 20:06:14'),
(880, 'App\\Models\\Doctor', 70, 'auth_token', 'df758fd49bcfd9bf14bd768723f3ea87381d98a912fbf063afe98d6753bd9276', '[\"*\"]', '2025-07-13 18:16:58', NULL, '2025-07-07 20:02:15', '2025-07-13 18:16:58'),
(881, 'App\\Models\\Doctor', 86, 'auth_token', '0da243653c634b47d49f659d3202bddd14ab6b6ba61fad0043ff77b22b4093c5', '[\"*\"]', NULL, NULL, '2025-07-11 19:08:51', '2025-07-11 19:08:51'),
(882, 'App\\Models\\Doctor', 86, 'auth_token', 'bbd3743f9903529393b2f4c0cadfce09d9798e30a538f3c6b57ee6bd36149965', '[\"*\"]', '2025-07-11 19:09:47', NULL, '2025-07-11 19:09:23', '2025-07-11 19:09:47'),
(883, 'App\\Models\\Patient', 103, 'auth_token', '7f90a066ada901896759af5f6abeecfe9aeba13ca1bc984c7e36624bed83983c', '[\"*\"]', NULL, NULL, '2025-07-13 12:48:39', '2025-07-13 12:48:39'),
(884, 'App\\Models\\Patient', 103, 'auth_token', '60316446b5c889c3e95775a665e6f57842e5ff93d059379c39a2f94f48ee420d', '[\"*\"]', '2025-07-13 12:55:32', NULL, '2025-07-13 12:48:54', '2025-07-13 12:55:32'),
(885, 'App\\Models\\Doctor', 70, 'auth_token', 'e5de22a639a1a62d55ef92da0fa8d383cced8c25e42e6a78ea29730fcfa6e340', '[\"*\"]', '2025-07-13 12:57:17', NULL, '2025-07-13 12:55:56', '2025-07-13 12:57:17'),
(886, 'App\\Models\\Patient', 103, 'auth_token', '4006e67f065c015d6de1a34aa14ea347428663c77d74ade00a4123bd5220ece5', '[\"*\"]', '2025-07-23 02:51:03', NULL, '2025-07-13 12:57:32', '2025-07-23 02:51:03'),
(887, 'App\\Models\\Doctor', 81, 'auth_token', '0d459825f431fa9497d3550c1ced18dce407e89262b3c92bf4ce42be1cbc2a36', '[\"*\"]', '2025-07-13 17:09:51', NULL, '2025-07-13 17:06:58', '2025-07-13 17:09:51'),
(888, 'App\\Models\\Patient', 78, 'auth_token', '40e9f6c20277f6b43f9400149aeda4c1d97c3b940ae5bd97b80846aa4ee9a973', '[\"*\"]', '2025-07-14 16:40:51', NULL, '2025-07-13 17:08:29', '2025-07-14 16:40:51'),
(889, 'App\\Models\\Patient', 92, 'auth_token', 'f5fbe90c89aeb4a0ccceb93e961d4d599e80a5eaecbd3ed3281d2ad58b478ede', '[\"*\"]', '2025-07-13 18:20:44', NULL, '2025-07-13 18:17:17', '2025-07-13 18:20:44'),
(890, 'App\\Models\\Doctor', 70, 'auth_token', 'd5b943676f9185986e80d9b2b7b457fe506d84492ad380c45652b9cbd7a4e59a', '[\"*\"]', '2025-07-13 18:41:48', NULL, '2025-07-13 18:21:15', '2025-07-13 18:41:48'),
(891, 'App\\Models\\Patient', 92, 'auth_token', '870b99b6dba4a061b105820789a32ee012c31e28d1c728b99e4b3682589a2f4a', '[\"*\"]', '2025-07-16 19:25:53', NULL, '2025-07-13 18:42:04', '2025-07-16 19:25:53'),
(892, 'App\\Models\\Doctor', 81, 'auth_token', '297dec2d2b313937ea5b8d6f0809f0a5a011c2a1b4f507d6d5616ec88b0f112e', '[\"*\"]', '2025-07-15 14:32:36', NULL, '2025-07-14 11:21:47', '2025-07-15 14:32:36'),
(893, 'App\\Models\\Doctor', 70, 'auth_token', 'f694aa7268fa448d11ec66009325bd01c645412e9a4017270ea9bf160619e478', '[\"*\"]', '2025-07-14 16:42:57', NULL, '2025-07-14 16:41:15', '2025-07-14 16:42:57'),
(894, 'App\\Models\\Patient', 78, 'auth_token', '6828ed6f45af60db24f8afbcdfe8789ed5cce7b3dfbf1eea348ac3975955fd80', '[\"*\"]', '2025-07-20 11:28:12', NULL, '2025-07-16 12:46:34', '2025-07-20 11:28:12'),
(895, 'App\\Models\\Doctor', 81, 'auth_token', '4a16ecdeca0004c76371acec98b87453198101989dfbad23b44bc506940859e5', '[\"*\"]', '2025-07-16 12:53:43', NULL, '2025-07-16 12:50:47', '2025-07-16 12:53:43'),
(896, 'App\\Models\\Doctor', 70, 'auth_token', '7b216b1aa9c161f3bf9cc709270939989fef19d9593497d563354ec13a0b79de', '[\"*\"]', '2025-07-22 17:46:52', NULL, '2025-07-18 22:45:35', '2025-07-22 17:46:52'),
(897, 'App\\Models\\Doctor', 81, 'auth_token', 'd32d8d61b70a389a234f2563059c75132e10abde1ba1a316811661ded65db10a', '[\"*\"]', '2025-07-20 10:22:11', NULL, '2025-07-20 09:56:03', '2025-07-20 10:22:11'),
(898, 'App\\Models\\Patient', 104, 'auth_token', '09faf597c5845eaac51a10871b64cecaf3124618466b1f6cf4403e46db21c65e', '[\"*\"]', NULL, NULL, '2025-07-20 11:17:57', '2025-07-20 11:17:57'),
(899, 'App\\Models\\Patient', 104, 'auth_token', '8d265e58842bb82511c44a04d373a9269611e8e2ae0c0d92efbb6558d54841c0', '[\"*\"]', '2025-07-20 11:18:17', NULL, '2025-07-20 11:18:12', '2025-07-20 11:18:17'),
(900, 'App\\Models\\Student', 117, 'auth_token', '1fe45648f54d2bdf18030f9f11137e2034528c2a2455ef193e7f12a9080fa9c9', '[\"*\"]', NULL, NULL, '2025-07-20 14:06:41', '2025-07-20 14:06:41'),
(901, 'App\\Models\\Student', 117, 'auth_token', '8a65c03c672f53bba0b72a4cecee931878a154345b33a83708b69ba818204966', '[\"*\"]', '2025-07-20 14:06:56', NULL, '2025-07-20 14:06:50', '2025-07-20 14:06:56'),
(902, 'App\\Models\\Doctor', 87, 'auth_token', 'bd9a2ffdedaac95636eb52318f3d75d983bf17bc703ee8ffd31a1fed736f4b5c', '[\"*\"]', NULL, NULL, '2025-07-20 14:09:05', '2025-07-20 14:09:05'),
(903, 'App\\Models\\Doctor', 87, 'auth_token', '90377ca6c4aefada7f9852b1b5ecc0e41d632c9530cd1e1de6a38082331d2615', '[\"*\"]', '2025-07-20 14:09:48', NULL, '2025-07-20 14:09:21', '2025-07-20 14:09:48'),
(904, 'App\\Models\\Patient', 79, 'auth_token', '5fdf526c0d450fd61472222fcc8a14893a5ba520d70f0d0e961b2e5cf81baf6c', '[\"*\"]', '2025-07-20 17:00:10', NULL, '2025-07-20 14:10:03', '2025-07-20 17:00:10'),
(905, 'App\\Models\\Patient', 78, 'auth_token', '4ada6f45ab08d69deae7634b4df2ba3d660349f180c90fc9d7142962ee6e2851', '[\"*\"]', '2025-07-21 10:31:50', NULL, '2025-07-20 14:15:33', '2025-07-21 10:31:50'),
(906, 'App\\Models\\Patient', 105, 'auth_token', '7c396763accf3528db61f6c19d680c52d5a404d56a47bdf6e63695521df04914', '[\"*\"]', NULL, NULL, '2025-07-20 17:01:11', '2025-07-20 17:01:11'),
(907, 'App\\Models\\Patient', 105, 'auth_token', 'e9d9b75aba5f82514e25f416faed2abe812761a341045070601ad100189c5c50', '[\"*\"]', '2025-07-20 17:04:22', NULL, '2025-07-20 17:01:19', '2025-07-20 17:04:22'),
(908, 'App\\Models\\Student', 118, 'auth_token', '5f653938c630aa3bde5461c17a0d78ad172d8e9777c8fbf3848bee7594cdbda0', '[\"*\"]', NULL, NULL, '2025-07-20 17:04:58', '2025-07-20 17:04:58'),
(909, 'App\\Models\\Student', 118, 'auth_token', '4e530679fb92bafd4760d40ea1db3a0995243a2bbdfc99e46cd984495f5254c4', '[\"*\"]', '2025-07-20 17:06:00', NULL, '2025-07-20 17:05:05', '2025-07-20 17:06:00'),
(910, 'App\\Models\\Doctor', 88, 'auth_token', '6c991c53052b0287db8e9eeccfcac97ef5b88c52bd5480e1b280c92f2de8cf93', '[\"*\"]', NULL, NULL, '2025-07-20 17:07:07', '2025-07-20 17:07:07'),
(911, 'App\\Models\\Doctor', 88, 'auth_token', '2fa8a29edab1328a0df2a85e247eac1abe9e6e2fa6e986852acba48a02c5bbf8', '[\"*\"]', '2025-07-20 17:07:15', NULL, '2025-07-20 17:07:12', '2025-07-20 17:07:15'),
(912, 'App\\Models\\Doctor', 88, 'auth_token', '62051d85619bee8f7af750c6d656dd5e8b9cd9a5f8a47d40645e52955bfc8034', '[\"*\"]', '2025-07-21 09:50:45', NULL, '2025-07-21 09:50:41', '2025-07-21 09:50:45'),
(913, 'App\\Models\\Doctor', 88, 'auth_token', '67a980595bff6a5562323fe2a6c129f76572dd8c38141155c263daf71f50565e', '[\"*\"]', '2025-07-21 10:28:57', NULL, '2025-07-21 10:12:39', '2025-07-21 10:28:57'),
(914, 'App\\Models\\Student', 118, 'auth_token', '6e158347f53ed47c614ea5e62279e263804faf00ae731b0476b476efb98ae299', '[\"*\"]', '2025-07-21 10:30:26', NULL, '2025-07-21 10:29:44', '2025-07-21 10:30:26'),
(915, 'App\\Models\\Student', 118, 'auth_token', 'f85090e5b9c855868bd9223db14d5f84f085095f87bb95b4265ebe49b30e38a6', '[\"*\"]', '2025-07-21 10:32:20', NULL, '2025-07-21 10:32:06', '2025-07-21 10:32:20'),
(916, 'App\\Models\\Student', 119, 'auth_token', 'ac6db3c0178467367fa88d3c46700043fe4ca9c22f209ae29887c0a9a1cb5d72', '[\"*\"]', NULL, NULL, '2025-07-21 10:40:31', '2025-07-21 10:40:31'),
(917, 'App\\Models\\Student', 120, 'auth_token', '74a4953134a455a285431628fbfba89566844475c749d87a1b5f2b2857ddbfb9', '[\"*\"]', NULL, NULL, '2025-07-21 10:48:29', '2025-07-21 10:48:29'),
(918, 'App\\Models\\Student', 121, 'auth_token', '5afc38ea2500b237b10a3de15514ad27f54a5521746b8dce8c293ed97cd283d2', '[\"*\"]', NULL, NULL, '2025-07-21 10:50:05', '2025-07-21 10:50:05'),
(919, 'App\\Models\\Patient', 106, 'auth_token', 'a2c3ec30ea95ecaf733d97dc71485e7e88a15d8cb30b2f01614066b91a4b04e1', '[\"*\"]', NULL, NULL, '2025-07-21 10:52:12', '2025-07-21 10:52:12'),
(920, 'App\\Models\\Patient', 107, 'auth_token', '0026e1375a990b5c0f65755b98e95956040c0497be1064b6e1007ade0692b32f', '[\"*\"]', NULL, NULL, '2025-07-21 10:52:46', '2025-07-21 10:52:46'),
(921, 'App\\Models\\Patient', 108, 'auth_token', '925e5dfb4f2893990968a22b0ae2f642fe57b18b801d762e032141d40717b5dc', '[\"*\"]', NULL, NULL, '2025-07-21 10:53:30', '2025-07-21 10:53:30'),
(922, 'App\\Models\\Patient', 108, 'auth_token', 'f749ff7133839cbf1d4bc610efec6250701b1b69eaecc3b3bb79c5b6e02696f4', '[\"*\"]', '2025-07-21 10:53:58', NULL, '2025-07-21 10:53:50', '2025-07-21 10:53:58'),
(923, 'App\\Models\\Patient', 109, 'auth_token', '13896fff41fac9a5ec62697e8a113f8c298fa74d6518083acdb39e1f0efaf5ab', '[\"*\"]', NULL, NULL, '2025-07-21 10:54:27', '2025-07-21 10:54:27'),
(924, 'App\\Models\\Patient', 110, 'auth_token', '3cc8c7da65e5d6080ec5f62877196525f8ef188772e4b757c282ea8a408c3ce2', '[\"*\"]', NULL, NULL, '2025-07-21 10:55:19', '2025-07-21 10:55:19'),
(925, 'App\\Models\\Patient', 111, 'auth_token', 'bbd97a2ee1eff4162f6df75cbf3f99b7e35645e0f0b34c671693f6fa3768c77e', '[\"*\"]', NULL, NULL, '2025-07-21 10:58:14', '2025-07-21 10:58:14'),
(926, 'App\\Models\\Doctor', 89, 'auth_token', 'fd1cf06f61d40a52d31fc632c1c933972ebc562bafab86abf49ea057d9502bb1', '[\"*\"]', NULL, NULL, '2025-07-21 11:00:09', '2025-07-21 11:00:09'),
(927, 'App\\Models\\Student', 122, 'auth_token', '1778eb79e567399740515b5f3a47bb5081abe90a91daf28721b8adf5c4a8aa03', '[\"*\"]', NULL, NULL, '2025-07-21 11:01:10', '2025-07-21 11:01:10'),
(928, 'App\\Models\\Student', 123, 'auth_token', 'a409697381d5773c517441a4399578b1f1384ef5564c10b90dd640a8448cf800', '[\"*\"]', NULL, NULL, '2025-07-21 11:03:21', '2025-07-21 11:03:21'),
(929, 'App\\Models\\Student', 123, 'auth_token', '27b3995fc2d787f94f8b0651a8e548167643979edcce43307fd95fc7aab72bff', '[\"*\"]', '2025-07-21 11:07:51', NULL, '2025-07-21 11:04:41', '2025-07-21 11:07:51'),
(930, 'App\\Models\\Doctor', 88, 'auth_token', '0cac411e4cfa873a6a0d88a7b5c7fa796a393199c7da917069dafef16b7f471b', '[\"*\"]', '2025-07-21 11:19:55', NULL, '2025-07-21 11:08:31', '2025-07-21 11:19:55'),
(931, 'App\\Models\\Doctor', 90, 'auth_token', '5d76bd59f84aaaa566770cb8bac300974bcb8e3d3064d1636092a617964ec39a', '[\"*\"]', NULL, NULL, '2025-07-21 11:20:42', '2025-07-21 11:20:42'),
(932, 'App\\Models\\Doctor', 90, 'auth_token', '558c3a46b457de8266147cedfb20aa2e6daad902238bbb1844ec535761ee8a1d', '[\"*\"]', '2025-07-21 11:41:28', NULL, '2025-07-21 11:20:50', '2025-07-21 11:41:28'),
(933, 'App\\Models\\Patient', 79, 'auth_token', '98615e840fc981bf578b54cba5362ef6cdf5729295264ac69bfa037618603bba', '[\"*\"]', NULL, NULL, '2025-07-21 11:36:42', '2025-07-21 11:36:42'),
(934, 'App\\Models\\Doctor', 88, 'auth_token', '7e95edaca974841a814a7eee0c073df10382ab950f9866c356310dbedf674f78', '[\"*\"]', NULL, NULL, '2025-07-21 11:37:01', '2025-07-21 11:37:01'),
(935, 'App\\Models\\Doctor', 88, 'auth_token', '34879adeb94b46a7c80e6e10f13847a8ba637396310f872fa79ac428507cdd10', '[\"*\"]', NULL, NULL, '2025-07-21 11:38:59', '2025-07-21 11:38:59'),
(936, 'App\\Models\\Doctor', 88, 'auth_token', '43dc3dd3f2cddab4969cb5d8acb05d95e433bced2a4ddf419ea812718a36cac2', '[\"*\"]', NULL, NULL, '2025-07-21 11:40:27', '2025-07-21 11:40:27'),
(937, 'App\\Models\\Student', 118, 'auth_token', 'b36f49b94bf5b8fc9e9bc7904621f32fcde2f5fa2c1eeeee0454eac9e3492c64', '[\"*\"]', '2025-07-21 12:01:53', NULL, '2025-07-21 11:41:53', '2025-07-21 12:01:53'),
(938, 'App\\Models\\Student', 118, 'auth_token', '6538f11f582c08abff8b69d48e66ab52b443b24252ca177e26005af69b10c910', '[\"*\"]', NULL, NULL, '2025-07-21 11:57:27', '2025-07-21 11:57:27'),
(939, 'App\\Models\\Student', 123, 'auth_token', '7c3437715ce999c128f65937a36dc929836b7389bb1e5de64937c2a354187d1a', '[\"*\"]', NULL, NULL, '2025-07-21 11:57:59', '2025-07-21 11:57:59'),
(940, 'App\\Models\\Student', 123, 'auth_token', '7343ff850fce31812fdb21c010796248282023653598e537be2cf0c8cbbaee00', '[\"*\"]', NULL, NULL, '2025-07-21 12:00:49', '2025-07-21 12:00:49'),
(941, 'App\\Models\\Doctor', 88, 'auth_token', 'cc3b83754433669102fe31c55518ec2736cc08fac40be98e46d2390515e0cdbd', '[\"*\"]', NULL, NULL, '2025-07-21 12:01:11', '2025-07-21 12:01:11'),
(942, 'App\\Models\\Doctor', 91, 'auth_token', 'f5e72a4a90e36582eb58c38f95e2f98d4b8fc1e1a55a252cd84f00217f3c05f0', '[\"*\"]', NULL, NULL, '2025-07-21 12:03:08', '2025-07-21 12:03:08'),
(943, 'App\\Models\\Doctor', 91, 'auth_token', '530e4c22ba3c6f632e2d008c6159739c22279890314ef1a51bbcded63612b68c', '[\"*\"]', '2025-07-21 12:03:58', NULL, '2025-07-21 12:03:15', '2025-07-21 12:03:58'),
(944, 'App\\Models\\Student', 124, 'auth_token', '10e847edb966a2734e42b35cbfd8a2aa387f4790e9354e7aa115bce6ad902eaf', '[\"*\"]', NULL, NULL, '2025-07-21 12:04:43', '2025-07-21 12:04:43'),
(945, 'App\\Models\\Student', 124, 'auth_token', '64127420c4a0988eb73b85654ff7ad0555aa569be94d38e74ccbe265d73710fa', '[\"*\"]', '2025-07-21 12:16:50', NULL, '2025-07-21 12:04:51', '2025-07-21 12:16:50'),
(946, 'App\\Models\\Patient', 112, 'auth_token', 'ba93dde644f38c233da2f6b89db3e7fa05dd8dda74b86daeeb03b6c1470f1666', '[\"*\"]', NULL, NULL, '2025-07-21 12:17:28', '2025-07-21 12:17:28'),
(947, 'App\\Models\\Patient', 112, 'auth_token', '9d496a08b1f8da2bfa98c9658e38286ad48046797d38b5554dbec2a4607ee50b', '[\"*\"]', '2025-07-21 12:24:19', NULL, '2025-07-21 12:17:34', '2025-07-21 12:24:19'),
(948, 'App\\Models\\Doctor', 88, 'auth_token', 'a82bf98e696354fb88ffb4293da1b10137d29d2fefb5a25489210861643e733f', '[\"*\"]', '2025-07-21 12:25:09', NULL, '2025-07-21 12:25:05', '2025-07-21 12:25:09'),
(949, 'App\\Models\\Student', 118, 'auth_token', '69a8430053013a703b14bf1fa442576512902a8f3c4a278b0da6cc90c0541279', '[\"*\"]', '2025-07-22 09:47:20', NULL, '2025-07-22 09:46:57', '2025-07-22 09:47:20'),
(950, 'App\\Models\\Doctor', 88, 'auth_token', '623e6514c21c0e76023524545c04a56a6e12d086b9445698013dc1388d72280f', '[\"*\"]', '2025-07-23 11:20:16', NULL, '2025-07-22 09:48:12', '2025-07-23 11:20:16'),
(951, 'App\\Models\\Doctor', 88, 'auth_token', '82b721986e52aaf422476b74763307a410c7609bd9640166544f467612d37c3c', '[\"*\"]', '2025-07-22 17:14:23', NULL, '2025-07-22 17:04:47', '2025-07-22 17:14:23'),
(952, 'App\\Models\\Doctor', 81, 'auth_token', '31ec806451974bd937e168c029d8835c7b05d57c36bf49538d6b62ec8030f9d8', '[\"*\"]', '2025-07-22 17:28:18', NULL, '2025-07-22 17:15:10', '2025-07-22 17:28:18'),
(953, 'App\\Models\\Doctor', 77, 'auth_token', 'fe689bd5c0454884c15697813c6011578e2fdfb4c24e866ee0d6faaa2578fdba', '[\"*\"]', '2025-07-23 10:26:45', NULL, '2025-07-22 17:28:34', '2025-07-23 10:26:45'),
(954, 'App\\Models\\Doctor', 81, 'auth_token', '245d6875babc4a9dfc6c011b98de90bee7278292d0869f743db3b1239bbb84dc', '[\"*\"]', NULL, NULL, '2025-07-22 17:35:17', '2025-07-22 17:35:17'),
(955, 'App\\Models\\Doctor', 81, 'auth_token', '6fdeba28c73ce75cc818c50d9a545205dc8d29b2a862b6b1d510a31ff8e2915e', '[\"*\"]', NULL, NULL, '2025-07-23 09:33:58', '2025-07-23 09:33:58'),
(956, 'App\\Models\\Doctor', 81, 'auth_token', 'd00b436b285668164827b1bbe9acb1aa48a221fe2baf040448b03e6e77a4e6a1', '[\"*\"]', NULL, NULL, '2025-07-23 09:34:39', '2025-07-23 09:34:39'),
(957, 'App\\Models\\Doctor', 81, 'auth_token', '541d01dd4d16f6ced3c1352c4135f34d580e89d7050d7d28e7389dab451b2e80', '[\"*\"]', '2025-07-23 10:23:33', NULL, '2025-07-23 09:58:38', '2025-07-23 10:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_mother_guides`
--

CREATE TABLE `pregnant_mother_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pregnant_mother_guides`
--

INSERT INTO `pregnant_mother_guides` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(18, 'Pregnancy  mother health guideline', 'Pregnant mother health guideline', 'guide/female_mother_guides/1750847907.pdf', 1, '2025-06-25 16:38:27', '2025-06-25 16:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diognostic_id` bigint(20) UNSIGNED NOT NULL,
  `note` text DEFAULT NULL,
  `report_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `diognostic_id`, `note`, `report_file`, `created_at`, `updated_at`) VALUES
(68, 531, 'এক মাস পরে দেখা করবেন', 'files/prescriptions/prescription_68.pdf', '2025-05-07 07:14:11', '2025-05-07 07:14:11'),
(69, 532, 'বাংলিশ', 'files/prescriptions/prescription_69.pdf', '2025-05-07 16:53:30', '2025-05-07 16:53:30'),
(70, 536, 'আমি বাংলায় লিখি', 'files/prescriptions/prescription_70.pdf', '2025-05-07 23:40:23', '2025-05-07 23:40:23'),
(71, 539, 'use fungidal Hc ব্যবহার করবেন', 'files/prescriptions/prescription_71.pdf', '2025-05-11 06:24:45', '2025-05-11 06:24:45'),
(72, 539, 'use fungidal Hc ব্যবহার করবেন', 'files/prescriptions/prescription_72.pdf', '2025-05-11 06:24:45', '2025-05-11 06:24:45'),
(73, 539, 'use fungidal Hc ব্যবহার করবেন', 'files/prescriptions/prescription_73.pdf', '2025-05-11 06:24:45', '2025-05-11 06:24:45'),
(74, 539, 'use fungidal Hc ব্যবহার করবেন', 'files/prescriptions/prescription_74.pdf', '2025-05-11 06:24:46', '2025-05-11 06:24:46'),
(75, 540, 'good rest', 'files/prescriptions/prescription_75.pdf', '2025-05-12 10:11:06', '2025-05-12 10:11:06'),
(76, 534, 'hj', 'files/prescriptions/prescription_76.pdf', '2025-05-12 14:49:36', '2025-05-12 14:49:36'),
(78, 544, 'sds', 'files/prescriptions/prescription_78.pdf', '2025-05-12 15:33:22', '2025-05-12 15:33:22'),
(79, 541, 'sd', 'files/prescriptions/prescription_79.pdf', '2025-05-12 15:37:55', '2025-05-12 15:37:55'),
(80, 533, 'ddd', 'files/prescriptions/prescription_80.pdf', '2025-05-12 15:40:38', '2025-05-12 15:40:38'),
(81, 548, '', 'files/prescriptions/prescription_81.pdf', '2025-05-13 07:47:37', '2025-05-13 07:47:37'),
(82, 549, 'Clinface gel তিন দিন ব্যবহার করবে', 'files/prescriptions/prescription_82.pdf', '2025-05-13 07:52:05', '2025-05-13 07:52:05'),
(83, 551, 'fungidal apply', 'files/prescriptions/prescription_83.pdf', '2025-05-14 16:44:53', '2025-05-14 16:44:53'),
(84, 550, '', 'files/prescriptions/prescription_84.pdf', '2025-05-14 16:46:43', '2025-05-14 16:46:43'),
(89, 558, 'fungidal লাগাবেন', 'files/prescriptions/prescription_89.pdf', '2025-05-27 12:41:34', '2025-05-27 12:41:35'),
(90, 557, 'ফহজগভজব', 'files/prescriptions/prescription_90.pdf', '2025-05-27 12:49:08', '2025-05-27 12:49:08'),
(91, 555, 'দঘহজ্জজ্জ', 'files/prescriptions/prescription_91.pdf', '2025-05-27 12:50:29', '2025-05-27 12:50:30'),
(92, 559, 'test', 'files/prescriptions/prescription_92.pdf', '2025-05-27 12:57:53', '2025-05-27 12:57:53'),
(93, 569, 'fingidal তিন দিন লাগাবেন', 'files/prescriptions/prescription_93.pdf', '2025-06-02 23:28:00', '2025-06-02 23:28:00'),
(94, 538, 'বাংলা', 'files/prescriptions/prescription_94.pdf', '2025-06-03 11:05:59', '2025-06-03 11:05:59'),
(95, 581, 'আপনি হসপিটালে যোগাযোগ করুন এখানে কোন ট্রিটমেন্ট দেওয়া যাচ্ছে না', 'files/prescriptions/prescription_95.pdf', '2025-06-17 10:49:34', '2025-06-17 10:49:34'),
(96, 582, 'রোদ লাগাবেন প্রত্যেকদিন', 'files/prescriptions/prescription_96.pdf', '2025-06-19 22:10:05', '2025-06-19 22:10:05'),
(97, 582, 'রোদ লাগাবেন প্রত্যেকদিন', 'files/prescriptions/prescription_97.pdf', '2025-06-19 22:10:06', '2025-06-19 22:10:06'),
(98, 580, 'NA', 'files/prescriptions/prescription_98.pdf', '2025-06-20 10:27:45', '2025-06-20 10:27:46'),
(99, 579, 'Try later', 'files/prescriptions/prescription_99.pdf', '2025-06-20 10:28:17', '2025-06-20 10:28:17'),
(100, 578, 'fungidal hc', 'files/prescriptions/prescription_100.pdf', '2025-06-20 10:28:45', '2025-06-20 10:28:45'),
(101, 584, 'fdddd', 'files/prescriptions/prescription_101.pdf', '2025-06-23 10:26:35', '2025-06-23 10:26:35'),
(102, 583, 'bbb', 'files/prescriptions/prescription_102.pdf', '2025-06-23 10:29:44', '2025-06-23 10:29:45'),
(103, 577, 'plz go to Hospital', 'files/prescriptions/prescription_103.pdf', '2025-06-24 11:26:15', '2025-06-24 11:26:15'),
(104, 586, '', 'files/prescriptions/prescription_104.pdf', '2025-06-24 11:30:59', '2025-06-24 11:31:00'),
(105, 589, 'তানজিডাল এইসি তিনদিন লাগাবে আক্রান্ত স্থানে', 'files/prescriptions/prescription_105.pdf', '2025-07-04 12:44:21', '2025-07-04 12:44:21'),
(106, 591, '', 'files/prescriptions/prescription_106.pdf', '2025-07-07 20:05:40', '2025-07-07 20:05:41'),
(107, 592, 'গরম পানি লাগাবেন', NULL, '2025-07-13 12:56:42', '2025-07-13 12:56:42'),
(108, 592, 'গরম পানি লাগাবেন', NULL, '2025-07-13 12:56:45', '2025-07-13 12:56:45'),
(109, 592, 'গরম পানি লাগাবেন', 'files/prescriptions/prescription_109.pdf', '2025-07-13 12:57:01', '2025-07-13 12:57:01'),
(110, 593, '', 'files/prescriptions/prescription_110.pdf', '2025-07-13 18:21:57', '2025-07-13 18:21:57'),
(111, 593, '', 'files/prescriptions/prescription_111.pdf', '2025-07-13 18:21:58', '2025-07-13 18:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_assists`
--

CREATE TABLE `prescription_assists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `userType` varchar(255) NOT NULL,
  `replay_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `replay_user_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_assist_replays`
--

CREATE TABLE `prescription_assist_replays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `files_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`files_url`)),
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prescription_assist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_assist_replays`
--

INSERT INTO `prescription_assist_replays` (`id`, `title`, `description`, `files_url`, `doctor_id`, `prescription_assist_id`, `created_at`, `updated_at`) VALUES
(15, 'dfdsfs', 'sdfsdf', '[\"\"]', 61, 32, '2025-05-06 16:53:56', '2025-05-06 16:53:56'),
(16, 'Test', 'cugxfohhoh hoikc', '[\"\"]', 80, 43, '2025-05-07 08:55:30', '2025-05-07 08:55:30'),
(17, 'test 2', 'ace plus', '[\"\"]', 70, 44, '2025-05-08 21:27:01', '2025-05-08 21:27:01'),
(18, 'problem', 'done', '[\"\"]', 70, 45, '2025-05-08 21:32:16', '2025-05-08 21:32:16'),
(19, 'aaa', 'aaa', '[\"\"]', 81, 46, '2025-05-10 12:24:34', '2025-05-10 12:24:34'),
(20, 'sdfd', 'fsdf', '[\"\"]', 61, 32, '2025-05-12 17:38:48', '2025-05-12 17:38:48'),
(21, 'sdfd', 'fsdf', '[\"\"]', 61, 32, '2025-05-12 17:38:52', '2025-05-12 17:38:52'),
(22, 'fd', 'dfd', '[\"\"]', 61, 33, '2025-05-12 17:39:46', '2025-05-12 17:39:46'),
(23, 'dfsf', 'sdfsdf', '[\"\"]', 61, 38, '2025-05-12 17:40:43', '2025-05-12 17:40:43'),
(24, 'sd', 'sds', '[\"\"]', 61, 48, '2025-05-12 17:41:27', '2025-05-12 17:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_reads`
--

CREATE TABLE `prescription_reads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`files`)),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_read_reports`
--

CREATE TABLE `prescription_read_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`files`)),
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prescription_read_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_read_reports`
--

INSERT INTO `prescription_read_reports` (`id`, `title`, `description`, `files`, `doctor_id`, `prescription_read_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '\"\"', 4, 1, '2024-12-22 01:55:39', '2024-12-22 01:55:39'),
(2, 'problem', 'big problem', '[\"ab.c\",\"sy.b\"]', 4, 1, '2024-12-22 01:56:07', '2024-12-22 01:56:07'),
(3, NULL, NULL, '\"\"', 51, 3, '2024-12-22 08:43:17', '2024-12-22 08:43:17'),
(4, 'problem', 'big problem', '[\"ab.c\",\"sy.b\"]', 51, 3, '2024-12-22 08:43:36', '2024-12-22 08:43:36'),
(5, 'problem', 'big problem', '[\"ab.c\",\"sy.b\"]', 51, 3, '2024-12-24 03:56:05', '2024-12-24 03:56:05'),
(6, 'rhhh', 'evgrhhhrn\nrnrhtjrhjrjrhrh tbtbrhrhrj\nrrbrhthththh evrbrhrhb rbrhhrh\nbrbrbrn fbrbrhrn rbrnrbtfbrbrb rbrbrb', '[\"files\\/all\\/17350146540.jpg\"]', 51, 4, '2024-12-24 04:30:58', '2024-12-24 04:30:58'),
(7, 'rhhh', 'evgrhhhrn\nrnrhtjrhjrjrhrh tbtbrhrhrj\nrrbrhthththh evrbrhrhb rbrhhrh\nbrbrbrn fbrbrhrn rbrnrbtfbrbrb rbrbrb', '[\"files\\/all\\/17350146540.jpg\"]', 51, 4, '2024-12-24 04:31:33', '2024-12-24 04:31:33'),
(8, 'rhhh', 'evgrhhhrn\nrnrhtjrhjrjrhrh tbtbrhrhrj\nrrbrhthththh evrbrhrhb rbrhhrh\nbrbrbrn fbrbrhrn rbrnrbtfbrbrb rbrbrb', '[\"files\\/all\\/17350146540.jpg\"]', 51, 4, '2024-12-24 04:32:56', '2024-12-24 04:32:56'),
(9, 'Error solve', 'Error solve Error solve\nError solve Error solve', '[\"files\\/all\\/17350150280.jpg\"]', 51, 2, '2024-12-24 04:37:13', '2024-12-24 04:37:13'),
(10, 'ss', 'dfds', '\"\"', 61, 28, '2025-04-25 04:34:04', '2025-04-25 04:34:04'),
(11, 'sdw', 'sdas', '[\"files\\/all\\/17457694710.jpg\"]', 61, 29, '2025-04-27 15:57:58', '2025-04-27 15:57:58'),
(12, 'dfd', 'sdf', '[\"files\\/all\\/17457696160.jpg\"]', 61, 27, '2025-04-27 16:00:24', '2025-04-27 16:00:24'),
(13, 'fdsf', 'fds', '[\"files\\/all\\/17457697130.jpg\"]', 61, 26, '2025-04-27 16:01:57', '2025-04-27 16:01:57'),
(14, 'fsdf', 'dfsd', '[\"files\\/all\\/17457701940.jpg\"]', 61, 25, '2025-04-27 16:09:56', '2025-04-27 16:09:56'),
(15, 'problem', 'big problem', '[\"ab.c\",\"sy.b\"]', 71, 24, '2025-04-27 16:10:20', '2025-04-27 16:10:20'),
(16, 'ggg', 'ggg', '\"\"', 71, 23, '2025-04-28 05:49:23', '2025-04-28 05:49:23'),
(17, 'ggg', 'ggg', '\"\"', 71, 23, '2025-04-28 05:49:24', '2025-04-28 05:49:24'),
(18, 'ggg', 'ggg', '\"\"', 71, 23, '2025-04-28 05:49:25', '2025-04-28 05:49:25'),
(19, 'ggg', 'ggg', '\"\"', 71, 23, '2025-04-28 05:49:27', '2025-04-28 05:49:27'),
(20, 'ggg', 'ggg', '[\"files\\/all\\/17458193760.jpg\"]', 71, 23, '2025-04-28 05:49:38', '2025-04-28 05:49:38'),
(21, 'ggg', 'ggg', '[\"files\\/all\\/17458193760.jpg\"]', 71, 23, '2025-04-28 05:49:39', '2025-04-28 05:49:39'),
(22, 'ggg', 'ggg', '[\"files\\/all\\/17458193760.jpg\"]', 71, 23, '2025-04-28 05:49:39', '2025-04-28 05:49:39'),
(23, 'ggg', 'ggg', '[\"files\\/all\\/17458193760.jpg\"]', 71, 23, '2025-04-28 05:49:39', '2025-04-28 05:49:39'),
(24, 'problem', 'big problem fix', '[\"ab.c\",\"sy.b\"]', 71, 3, '2025-04-28 05:51:24', '2025-04-28 05:51:24'),
(25, 'aa', 'bb', '\"\"', 71, 30, '2025-04-28 05:54:35', '2025-04-28 05:54:35'),
(26, 'aa', 'bb', '\"\"', 71, 30, '2025-04-28 05:54:37', '2025-04-28 05:54:37'),
(27, 'aa', 'bb', '[\"files\\/all\\/17458196810.jpg\"]', 71, 30, '2025-04-28 05:54:43', '2025-04-28 05:54:43'),
(28, 'problem', 'big problem fix', '[\"ab.c\",\"sy.b\"]', 71, 30, '2025-04-28 05:56:16', '2025-04-28 05:56:16'),
(29, 'problem', 'big problem fix', '[\"ab.c\",\"sy.b\"]', 71, 30, '2025-04-28 05:56:25', '2025-04-28 05:56:25'),
(30, 'aa', 'aa', '\"\"', 71, 30, '2025-04-28 06:03:43', '2025-04-28 06:03:43'),
(31, 'fs', 'fsfs', '[\"files\\/all\\/17458928370.jpg\"]', 61, 31, '2025-04-29 02:14:01', '2025-04-29 02:14:01'),
(32, 'ok', 'aaa', '[\"files\\/all\\/17458976800.jpg\"]', 71, 32, '2025-04-29 03:34:43', '2025-04-29 03:34:43'),
(33, NULL, 'Rabin rafan', '\"\"', 70, 35, '2025-05-08 21:14:32', '2025-05-08 21:14:32'),
(34, NULL, 'any whare', '\"\"', 70, 36, '2025-05-08 21:18:32', '2025-05-08 21:18:32'),
(35, 'aaaa', 'aaaa', '[\"files\\/all\\/17468581530.jpg\"]', 81, 37, '2025-05-10 12:22:35', '2025-05-10 12:22:35'),
(36, 'ggggg', '-ggggggggg', '[\"files\\/all\\/17468595190.jpg\"]', 81, 38, '2025-05-10 12:45:20', '2025-05-10 12:45:20'),
(37, 'fdf', 'dffd', '[\"files\\/all\\/17470501700.jpg\"]', 61, 33, '2025-05-12 17:42:51', '2025-05-12 17:42:51'),
(38, 'dff', 'dfsd', '[\"files\\/all\\/17470502410.jpg\"]', 61, 39, '2025-05-12 17:44:03', '2025-05-12 17:44:03'),
(39, NULL, 'cerebas\nnapa', '\"\"', 70, 42, '2025-06-05 13:49:06', '2025-06-05 13:49:06'),
(40, NULL, 'ace', '\"\"', 70, 44, '2025-06-17 11:30:09', '2025-06-17 11:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'Privacy Policy\r\nThis privacy policy applies to the Denter app (hereby referred to as \"Application\") for mobile devices that was created by md omar faruk (hereby referred to as \"Service Provider\") as a Free service. This service is intended for use \"AS IS\".\r\n\r\n\r\nInformation Collection and Use\r\nThe Application collects information when you download and use it. This information may include information such as\r\n\r\nYour device\'s Internet Protocol address (e.g. IP address)\r\nThe pages of the Application that you visit, the time and date of your visit, the time spent on those pages\r\nThe time spent on the Application\r\nThe operating system you use on your mobile device\r\n\r\nThe Application does not gather precise information about the location of your mobile device.\r\n\r\n\r\nThe Service Provider may use the information you provided to contact you from time to time to provide you with important information, required notices and marketing promotions.\r\n\r\n\r\nFor a better experience, while using the Application, the Service Provider may require you to provide us with certain personally identifiable information, including but not limited to mohammadomar01312@gmail.com. The information that the Service Provider request will be retained by them and used as described in this privacy policy.\r\n\r\n\r\nThird Party Access\r\nOnly aggregated, anonymized data is periodically transmitted to external services to aid the Service Provider in improving the Application and their service. The Service Provider may share your information with third parties in the ways that are described in this privacy statement.\r\n\r\n\r\nPlease note that the Application utilizes third-party services that have their own Privacy Policy about handling data. Below are the links to the Privacy Policy of the third-party service providers used by the Application:\r\n\r\nGoogle Play Services\r\nGoogle Analytics for Firebase\r\nFirebase Crashlytics\r\n\r\nThe Service Provider may disclose User Provided and Automatically Collected Information:\r\n\r\nas required by law, such as to comply with a subpoena, or similar legal process;\r\nwhen they believe in good faith that disclosure is necessary to protect their rights, protect your safety or the safety of others, investigate fraud, or respond to a government request;\r\nwith their trusted services providers who work on their behalf, do not have an independent use of the information we disclose to them, and have agreed to adhere to the rules set forth in this privacy statement.\r\n\r\nOpt-Out Rights\r\nYou can stop all collection of information by the Application easily by uninstalling it. You may use the standard uninstall processes as may be available as part of your mobile device or via the mobile application marketplace or network.\r\n\r\n\r\nData Retention Policy\r\nThe Service Provider will retain User Provided data for as long as you use the Application and for a reasonable time thereafter. If you\'d like them to delete User Provided Data that you have provided via the Application, please contact them at mohammadomar01312@gmail.com and they will respond in a reasonable time.\r\n\r\n\r\nChildren\r\nThe Service Provider does not use the Application to knowingly solicit data from or market to children under the age of 13.\r\n\r\n\r\nThe Application does not address anyone under the age of 13. The Service Provider does not knowingly collect personally identifiable information from children under 13 years of age. In the case the Service Provider discover that a child under 13 has provided personal information, the Service Provider will immediately delete this from their servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact the Service Provider (mohammadomar01312@gmail.com) so that they will be able to take the necessary actions.\r\n\r\n\r\nSecurity\r\nThe Service Provider is concerned about safeguarding the confidentiality of your information. The Service Provider provides physical, electronic, and procedural safeguards to protect information the Service Provider processes and maintains.\r\n\r\n\r\nChanges\r\nThis Privacy Policy may be updated from time to time for any reason. The Service Provider will notify you of any changes to the Privacy Policy by updating this page with the new Privacy Policy. You are advised to consult this Privacy Policy regularly for any changes, as continued use is deemed approval of all changes.\r\n\r\n\r\nThis privacy policy is effective as of 2025-05-26\r\n\r\n\r\nYour Consent\r\nBy using the Application, you are consenting to the processing of your information as set forth in this Privacy Policy now and as amended by us.\r\n\r\n\r\nContact Us\r\nIf you have any questions regarding privacy while using the Application, or have questions about the practices, please contact the Service Provider via email at mohammadomar01312@gmail.com.', '2024-12-18 01:37:34', '2025-05-26 23:00:22'),
(2, 'Terms and Conditions', 'Terms and Conditions – Denter\r\n\r\nWelcome to Denter – your all-in-one medical support and doctor collaboration app, built to empower healthcare professionals, students, and patients across Bangladesh.\r\n\r\nBy downloading or using Denter, you agree to the following terms:\r\n\r\nUser Conduct:\r\nAll users are expected to engage respectfully and professionally. When communicating with doctors, students, or other users, always use polite, appropriate language. Any abusive, misleading, or offensive behavior may lead to account suspension or removal.\r\n\r\nData Security and Privacy:\r\nWe value your trust. Denter does not sell, share, or use your data for third-party marketing or tracking. All personal and professional communication is encrypted and handled securely. We do not collect sensitive personal health records without user consent. Your privacy is our top priority.\r\n\r\nContent Usage:\r\nMedical information, articles, and educational content provided within the app are for informational purposes only and should not replace professional medical advice or treatment. Users should consult with qualified professionals before making healthcare decisions.\r\n\r\nLocal Relevance:\r\nDenter is designed specifically for the healthcare community in Bangladesh. All features and resources are tailored to local guidelines, practices, and user needs.\r\n\r\nUpdates & Support:\r\nWe may update our terms and features from time to time to enhance your experience. For feedback or support, contact us at moyouuddin@gmail.com — we respond within 24 hours.\r\n\r\nBy using Denter, you’re joining a trusted, respectful, and secure digital health community. Thank you for being part of the journey.', NULL, '2025-06-26 12:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_manages`
--

CREATE TABLE `quiz_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `leaderboard` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `user` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_manages`
--

INSERT INTO `quiz_manages` (`id`, `name`, `description`, `start_time`, `end_time`, `status`, `leaderboard`, `user`, `created_at`, `updated_at`) VALUES
(29, 'Software Issue', 'asd', '2025-07-22 17:03:00', '2025-07-31 17:03:00', 1, 'inactive', '[\"77\",\"81\",\"88\"]', '2025-07-22 17:03:29', '2025-07-23 10:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question_ans_manages`
--

CREATE TABLE `quiz_question_ans_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_quiz_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `quiz_question_manages_id` bigint(20) UNSIGNED NOT NULL,
  `user_answer` varchar(255) DEFAULT NULL,
  `answer_is_correct` tinyint(1) NOT NULL,
  `points` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question_manages`
--

CREATE TABLE `quiz_question_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_manage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `question_type` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_question_manages`
--

INSERT INTO `quiz_question_manages` (`id`, `quiz_manage_id`, `question`, `answer`, `question_type`, `option_1`, `option_2`, `option_3`, `option_4`, `points`, `status`, `created_at`, `updated_at`) VALUES
(45, 29, 'asdf', 'sda', 'answer_type', NULL, NULL, NULL, NULL, 1, 1, '2025-07-22 17:13:05', '2025-07-22 17:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `quiz_manage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `score`, `wrong_answer`, `correct_answer`, `user_id`, `user_type`, `quiz_manage_id`, `created_at`, `updated_at`) VALUES
(13, 10, 1, 1, 70, 'doctor', 14, '2025-05-06 03:33:51', '2025-05-06 03:33:51'),
(14, 20, 0, 2, 71, 'doctor', 14, '2025-05-06 03:37:11', '2025-05-06 03:37:11'),
(15, 10, 0, 1, 71, 'doctor', 15, '2025-05-06 03:53:02', '2025-05-06 03:53:02'),
(16, 10, 0, 1, 70, 'doctor', 15, '2025-05-07 03:35:11', '2025-05-07 03:35:11'),
(17, 2, 2, 2, 70, 'doctor', 18, '2025-05-11 14:16:41', '2025-05-11 14:16:41'),
(28, 160, 1, 2, 70, 'doctor', 19, '2025-05-14 12:37:16', '2025-05-14 12:37:16'),
(29, 210, 0, 3, 81, 'doctor', 19, '2025-05-14 17:42:49', '2025-05-14 17:42:49'),
(30, 2, 0, 2, 70, 'doctor', 20, '2025-05-16 21:41:22', '2025-05-16 21:41:22'),
(31, 2, 2, 2, 84, 'doctor', 18, '2025-06-08 12:06:49', '2025-06-08 12:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0fUvmrCt24MMHB7p0eMwShE0uwqDoe6tyE8fBO8L', NULL, '66.249.90.228', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnpGZjVwNlN2dE9iUTRaa3hqbkxIcjFNbUJlSG10TmI1eURjcmZGZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753221974),
('3YseycRej7VYLbGSZudU4Ull6BzyJ7BgG98EH0Z9', NULL, '20.171.207.136', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkVYRHh4RWtiYjlIUzdIcHIyczJzanYzUzFvQVUwMWlQNUtIb2tsbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3Lm1haW4uZGVudGVycHJvLmNvbS9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753206556),
('4XW2UXMtrbCAE6v0VSxGnHEB3jPSiVvKw6aXv68b', 1, '103.129.238.118', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQnJ5R2k5WHRJYUhyVUphaVQ1VHB0dlZqUElIWkVvT0R6bmxzZWJTNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbWFpbi5kZW50ZXJwcm8uY29tL3F1aXpNYW5hZ2UtZmlsdGVyLWRvY3RvciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToidG9rZW4iO3M6MzI3OiJleUowZVhBaU9pSktWMVFpTENKaGJHY2lPaUpJVXpJMU5pSjkuZXlKcGMzTWlPaUpvZEhSd2N6b3ZMMjFoYVc0dVpHVnVkR1Z5Y0hKdkxtTnZiUzkyWlhKcFpua3RiRzluYVc0aUxDSnBZWFFpT2pFM05UTXhOakl3TWpRc0ltVjRjQ0k2TVRjMU5EQXlOakF5TkN3aWJtSm1Jam94TnpVek1UWXlNREkwTENKcWRHa2lPaUpaUVRJM2JreEJhalpSV0U1MFIyaFRJaXdpYzNWaUlqb2lNU0lzSW5CeWRpSTZJakl6WW1RMVl6ZzVORGxtTmpBd1lXUmlNemxsTnpBeFl6UXdNRGczTW1SaU4yRTFPVGMyWmpjaWZRLmtua2hfZWdPMHRqZTFOX2tsaVhFQ05iVWN5SmpKUXFxOFN3TlV1TExFZTgiO30=', 1753166616),
('6cGduRX56QhXKTImS6BhF8GE7RKCoYbQq7DySC0X', NULL, '66.249.90.230', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1FTVm9IQVRQMEpkT2ZkbzdFOTg5a3dvY0dvT1I3UTh4Z1U2SWJhMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753227585),
('6yNbmKqbTJwAMbZkbqyykLEQUMR5FmMq5mejcdY9', NULL, '66.249.90.230', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmE3YmQzaXRxbld5Z1NvQlZ0RElaamdNWkR4cE9ta2pYNjRRSFBqbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753237240),
('7uKlovGKGrEVlGsCc7sQBiFp9EZCXQCL67ZEpR9u', NULL, '206.189.19.19', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmhpVjk4V3hEQzlhUTIzZ2FNR2Z0RUswVXlQQ3FySW8weTJoT0YxRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753172372),
('8nHfB81qgWXW77FZaib4oAaYhnQkO4flTeyyFHhm', NULL, '46.101.111.185', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ2o4eERxNmtSMVZqVmZoRjdzTktUYlhDYVdxMlRIY3FpajQ4VEp5SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHBzOi8vbWFpbi5kZW50ZXJwcm8uY29tLz9yZXN0X3JvdXRlPSUyRndwJTJGdjIlMkZ1c2VycyUyRiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753172378),
('AEZpCBejtO0kufQuf9QcziuIbRAA4Ne2zTeftEsP', NULL, '66.249.92.40', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUxmbkRsdzdzckJNVThCaWVKOEVkdEtKUHVqVVJiWHo5aXZ0WHVQcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753193774),
('bqIRVI3yBJFqWCFN7DYebwfthat0x35tOYP0hcvp', NULL, '66.249.90.230', 'Mozilla/5.0 (X11; Linux i686; rv:93.0) Gecko/20100101 Firefox/93.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWk5BQVlXR2Y4czlDN2xSc1Q5NGtERW45Q0ZOVmNneUxGZXFxemdkRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753237308),
('Ca7cL0Kh60XFcxGILznFQCInUVDji03aj0f9CJxN', NULL, '206.189.19.19', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0p5aTNsUHQyRmRuamd4Y0dIQmdvWlV4OUtIMEdyckNCaDh1T1hkdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753172362),
('CZkrw93CucHhoDDJK2QvpBujlfEZAiHArhkNamdf', NULL, '192.178.10.40', 'Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUVUeHkzYm1PVlZocVRlVklHS0JmMVY2WmpucEtjTDRlemtJb2ZtdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753247796),
('eouEskkiyXtw2QnRum006OWcF10ijtvpJRdV0UEC', NULL, '165.227.173.41', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA344089) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3416.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkoyYVlmUVB1NXExcldmZkpiUVdXR0FWSmlScmxuMko5d3JPNkVsbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vd3d3Lm1haW4uZGVudGVycHJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753172367),
('FwrwIXZCsLSUWRzCbQEL5S4iSri2RMcYNvZFgk7u', 1, '103.129.238.118', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMHdZclpKYnNsaXhMT3BUWTRaNkg2blVaNlhtMzJlcG5LV25PRlFlaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vbWFpbi5kZW50ZXJwcm8uY29tL3F1aXpNYW5hZ2UvZWlkdHdpdGh1c2VyLzI5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJ0b2tlbiI7czozMjc6ImV5SjBlWEFpT2lKS1YxUWlMQ0poYkdjaU9pSklVekkxTmlKOS5leUpwYzNNaU9pSm9kSFJ3Y3pvdkwyMWhhVzR1WkdWdWRHVnljSEp2TG1OdmJTOTJaWEpwWm5rdGJHOW5hVzRpTENKcFlYUWlPakUzTlRNeU5ESTROalVzSW1WNGNDSTZNVGMxTkRFd05qZzJOU3dpYm1KbUlqb3hOelV6TWpReU9EWTFMQ0pxZEdraU9pSlNXRnB2ZFZsNU1WWkZZVU5xV25WeElpd2ljM1ZpSWpvaU1TSXNJbkJ5ZGlJNklqSXpZbVExWXpnNU5EbG1OakF3WVdSaU16bGxOekF4WXpRd01EZzNNbVJpTjJFMU9UYzJaamNpZlEuNWNDbGtjTnJNLUFHdUFCLUc5aGx1R3ZpV05KTXlSY2VvZ25NZFdZaEZMSSI7fQ==', 1753244786),
('g8PEGL253Fa1ob7tuntqn2uOdl5ScGukniw0gDw8', NULL, '66.249.90.229', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidzVzZktRY2l3WFU4Uk9VVFNkdHo2VHMyRmQxalRZRUlTSHpIQU9seiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753199389),
('gK0nMBTAibQkcnKii5sN8C9MWTeCWQZrmQWSxml8', NULL, '66.249.92.40', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFcxdldoTWs4QUZ3YWh2WkNyRUkzam4zS0RoQXdOa1RkMmtXSG5FOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753185125),
('GRcP5v8fs4uBXKnVudhHKpYVMIWl4KBxonuCRvgc', NULL, '66.249.90.228', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczFtcktjVnJydVhCMWN3RkdsQkJCUmsyalNnRXZKSktua3dIb0lieSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753238474),
('H12tJkujyBBqv0bZhtBlnVUteFMz54jNMMf4irgW', NULL, '165.227.173.41', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWm9sUFZ1VGVOUGl2ZDdBdVlSOFNLRnJLWkthMG0wRVBNb05wVkdIYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHBzOi8vd3d3Lm1haW4uZGVudGVycHJvLmNvbS8/cmVzdF9yb3V0ZT0lMkZ3cCUyRnYyJTJGdXNlcnMlMkYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753172380),
('H55YXCweAFa4FJhWvCn2UKBRA8JNA3ogo2cb75S4', NULL, '66.249.92.38', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVhzNGo2QzlKVEhLdmxuOHRvRTFUa01tQVpjQTB1N0FiaUZHNGVPSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753192831),
('HocikIFHOhNGYkxcs4nuRDJu2GnI3atBHj1BuLXi', NULL, '165.227.173.41', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkV4TFVMdW9aRTVRelJzY0ZBTnByTnptU0ZTTEtXYWR3cmkycjFrSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vd3d3Lm1haW4uZGVudGVycHJvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753172362),
('KfqKmE9mRWmCKQEoI1LQZsiFMi9mMkXbdNTY0Xyk', NULL, '64.233.172.198', 'Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFNNR0ZTcHVJb1RMcFRTdjNFY0gwME5nbkg0RlVlOVZKUDNtMll2aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753174978),
('kZw56lhwsiClgNsSvoVqb5nlyy1WGeZHSeOyAh06', NULL, '66.249.92.40', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDFtNzVaOElqN3BrZmRkWGZpaDdZankxTjdrNGQ4NG9taDJaWk9tRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753190049),
('L5yVWDp5S34GWbK1QFVzqSbPUcj17hJOgeNsJmYi', NULL, '206.189.19.19', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA344089) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3416.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2NFNXBsaGpmOUdNR1dwVTJvSVppd0NFVElTZEg4aDI0Y3h0c3J5dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753172362),
('lFlgQOrBaavahXQbTZWHUyFnfSuwQyAtbwOMztet', NULL, '46.101.111.185', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA344089) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3416.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiem9CdDU4MEFwTmhqRVBDSWE1c3pVVE5LS1VGMmpNcjl4SkRLUzg1NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vbWFpbi5kZW50ZXJwcm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753172365),
('lVk0cUCWdVxC4OfF0Vxd1Ol89My1aUOEzDFbNey7', NULL, '46.101.111.185', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGlsYm15U2pMV1E4TjJabmQ5bnpwU0oySjZiVGNhTDIxWmxXSUxlSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vbWFpbi5kZW50ZXJwcm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753172361),
('MHYDjWgez91gd5paAL3oibtdInihTcinLzABDRVP', NULL, '66.249.90.229', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTlId0VqTXFXVUpUc0Y5QTJRbEViUFZKRGlXd0FnUU9oRHQwSTh1dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753210480),
('P97HwLcPYM8xHkNjX0wqlXNHp30TIhJZzgTMd7mA', NULL, '66.249.92.39', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHVBY0FmTnpkYTJZSVhNUlE1VmJlbWJvS3lac3paOU5RY1czRDg1QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753177325),
('pwVxkDtwrWFVuQxBQQ222eEy0ouqwbiIyfm29NGj', NULL, '64.233.172.200', 'Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejY5emg0NzFuVjBnRklKZnd5S3RUYWllTUhuSmpkVVdZZTNrc0hHOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753247559),
('Rtd1C5K5qKcwqOqM06Wc6TTQdINZzBrEMGiPL0pI', NULL, '205.210.31.84', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSE5TSVV1TmdHR2s4Q25wQm9jQTVURFhSMG1XeG5lOWo5blo2dG56ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753167892),
('rWHbomNBS0Vk5ehqzCAvePOaSZXfssHq8EdG8usa', NULL, '66.249.92.40', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWxmc0ZhN2hqZ0xHcUJRWlA5SDZrMk5Lemx3TjB1bVVPTmFyYWdWRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753190048),
('TCoUbBAQoLDPFgpfbCeJagafUnNxyvysK6C7wODy', NULL, '66.249.92.40', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTRxeGIzWGNPelhIMzVOa0tzcWx3TUFhUnZWYzhEVzlyeGRvd0RvbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753169399),
('uN7XXeWLLfv3ECUIMMZOQRao525GgZop49erm3H9', NULL, '66.249.92.38', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTg3cGE2MmZWNGZ6enpmRmxGVXRqbjJ4OFhJUnZSb3MxTkY2bkc1QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753193708),
('urC3Pp9WYHai4REnJi8UQIFCxduBoogoirwZio2h', NULL, '66.249.90.230', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTl1dlJGZWFnZzVQbGxzVzNYWDhWWktTSlo0VGhUOUJybVN2MUpheSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753210479),
('vDarubFktf0UlDLMzn0z4mEtcLjoEWrQeOEi3dG1', NULL, '66.249.90.228', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXA5NkhWeTNZSFRUeTVKV2dIcWVhUTBvMGFVazIyeUxoYTY3aHVtWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753236906),
('VMjslP4q1IRiXXjNcek5iqs5u0MvCzsTt5dWLH1l', NULL, '66.249.92.38', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid09wY3lmTFNRWmVFNjhiREQyaUliVU5FOVgxU0d3am1HamZqYzV6USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753193850),
('vT8l7Dyrt2r8krAHzrzZEAS2kmJKnUfs8NJNVrPu', 1, '103.129.238.118', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVll5d3BDVDVLQlFRSUpTZUs5UDdTaGNIRXlyWlFjdWV2ZUpPTFdqbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vbWFpbi5kZW50ZXJwcm8uY29tL3F1aXpNYW5hZ2UvcXVpek1hbmFnZS11c2VyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJ0b2tlbiI7czozMjc6ImV5SjBlWEFpT2lKS1YxUWlMQ0poYkdjaU9pSklVekkxTmlKOS5leUpwYzNNaU9pSm9kSFJ3Y3pvdkwyMWhhVzR1WkdWdWRHVnljSEp2TG1OdmJTOTJaWEpwWm5rdGJHOW5hVzRpTENKcFlYUWlPakUzTlRNeE9ESXhOVFFzSW1WNGNDSTZNVGMxTkRBME5qRTFOQ3dpYm1KbUlqb3hOelV6TVRneU1UVTBMQ0pxZEdraU9pSlhOR1JhUVZkaE1uSnRhbFEzZFRSbklpd2ljM1ZpSWpvaU1TSXNJbkJ5ZGlJNklqSXpZbVExWXpnNU5EbG1OakF3WVdSaU16bGxOekF4WXpRd01EZzNNbVJpTjJFMU9UYzJaamNpZlEubDVLN29LbE10N3lETU5mOER6cGlQNUp3NTlkMmp5MlZNXzVDeGZ1RDh6cyI7fQ==', 1753184733),
('X2MgBJl1qzsZUmbo63hZPjYwfinPHPTXOSYk2MDt', NULL, '66.249.90.230', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMTNWSkJWandzMUxQNFZhOXFGSkZxdk1ISWh0WEl0SjhOcGE2TUZveCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753227584),
('XgwDXDFzWYK408AIzs0ReOWRJqFPxyoVVWS9Kiyp', NULL, '66.249.90.228', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmtIMkQ5bmYxNDl6NEJ5cnFYQVByaG04bkRRWDg3WlJjQmxvemo5TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753221977),
('xI16hWTRdXG4DbZXcoQS2VtqPUa6z9OsSrDR1vvU', NULL, '66.249.90.228', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkhMdzBWSUFQOE5jcnIxV05QejhzT3pSTFlYc0xrUUhKQ29tOXlEVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753243882),
('xPzrWvMUnQeVgFy9CAlkHf2AdcPOm4tWvKp9r4vj', NULL, '66.249.92.39', 'Mozilla/5.0 (X11; Linux i686; rv:93.0) Gecko/20100101 Firefox/93.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnJ3ajVNWVVVSTdINjNkUTBwOFVUUGdNZTU4anpYRUNneHpndm02VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753193961),
('xUVcGBXbauDempLjh2BxJKl9EoDAheVva0dOnycA', NULL, '66.249.92.38', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEhxMmdiak9uU3AwSjJmQjNIQjNvZ2wzZzcwZTRuVGZodWh6Z2hHSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753169398),
('ysvRnOnDdQRRv5uCt9BRGsGjlMTghmbkoE41zvnK', NULL, '66.249.92.38', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXJVVHRvN1ZOVG5qYlJOeXgyN1hLOGxKWGhRMEYwNzVmZ2hLbTdvbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753177327),
('Z8zmaBPjcpPR9UHjBGle5hWboWIppnK7EcxG9Hej', NULL, '66.249.88.196', 'PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmpCMlBzZVdCVE4xSzl4U3Y0Q2tuaTJQUFJlZExwZEZKcGU5bzlZciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tYWluLmRlbnRlcnByby5jb20vcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753247796);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_email` varchar(255) NOT NULL,
  `website_logo` text NOT NULL,
  `website_favicon` text NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `api_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_email`, `website_logo`, `website_favicon`, `address`, `phone`, `api_url`, `created_at`, `updated_at`) VALUES
(1, 'denterpro.com', 'info.denter@gmail.com', 'CDqrTjG89Q0kW36duFXJ0QT1E8gY47vSk9iUdbXl.png', 'TkGs6fReLuPYjZ0rwnTQe688NWIIYqCYavX9gWfg.png', 'Dhaka, Bangladesh', '+8801708481110', NULL, '2024-12-18 01:37:19', '2025-06-25 15:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `skin_guides`
--

CREATE TABLE `skin_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skin_guides`
--

INSERT INTO `skin_guides` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Skin Care Guideline', 'TVW-Skin-Integrity-Guideline-V4-Ratified-Dec-2024', 'guide/skin_guides/1750848028.pdf', 1, '2025-06-25 16:40:28', '2025-06-25 16:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cum ab ipsum fuga corrupti rerum accusamus ad.', 'Quia aut rem excepturi maiores culpa est. Iusto nesciunt delectus ab ad nam magni reprehenderit. Occaecati dolor quidem ad odit vel. Dicta reiciendis optio qui fuga.', 'images/sliders/1751538950.png', 1, '2024-12-18 01:37:38', '2025-07-03 16:35:50'),
(2, 'Quasi incidunt voluptatem debitis quis ducimus cumque.', 'Labore quasi nisi corporis omnis sit delectus. Et incidunt et aperiam modi voluptatem. Et magnam qui ut sunt. Fugit recusandae itaque consequuntur placeat sunt amet repellendus.', 'images/sliders/1751538968.png', 1, '2024-12-18 01:37:38', '2025-07-03 16:36:08'),
(8, 'Incididunt voluptatu', 'Ut repellendus Sint', 'images/sliders/1751538932.png', 1, '2025-03-25 04:38:33', '2025-07-03 16:35:32'),
(9, 'Incidunt reiciendis', 'In adipisicing tempo', 'images/sliders/1751538910.png', 1, '2025-03-25 04:42:10', '2025-07-03 16:35:10'),
(10, 'Cumque saepe sunt e', 'Asperiores ipsam cup', 'images/sliders/1751537431.jpg', 1, '2025-03-25 04:46:25', '2025-07-03 16:10:31'),
(11, 'Voluptatibus', 'Exercitation quia hi', 'images/sliders/1751538894.png', 1, '2025-04-06 07:06:16', '2025-07-03 16:34:54'),
(15, 'Odio neque quis veli', 'Quisquam expedita in', 'images/sliders/1751538981.png', 1, '2025-07-03 16:36:21', '2025-07-03 16:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `messenger` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `gmail`, `linkedin`, `messenger`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/share/1E1ovAZyra/', NULL, 'https://www.linkedin.com/company/denterpro/about/?viewAsMember=true', NULL, '2025-03-24 06:33:51', '2025-07-07 13:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `userType` varchar(255) NOT NULL DEFAULT 'student',
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `notification_play` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `image`, `token`, `userType`, `password`, `address`, `dob`, `gender`, `university`, `year`, `specialization`, `medical_history`, `additional_info`, `organization`, `occupation`, `bio`, `notification_play`, `created_at`, `updated_at`) VALUES
(110, 'Kasimir Burt', 'fabynade@mailinator.com', '+1 (962) 514-9109', NULL, NULL, 'student', '$2y$10$IhbK3QNJ1nZmWbuNKXT6SOYyxVgVnOIEeXG.NmBum1OUdvmoTPkTq', 'Ipsum ut in eos simi', '1980-02-08', 'male', 'Aliqua Vel possimus', '1977', 'Nostrum amet sit ea', 'Laudantium quo ut i', NULL, NULL, NULL, 'Voluptas nisi aute v', 1, '2025-03-20 07:57:29', '2025-03-20 07:57:29'),
(111, 'Moana Fitzgerald', 'myfu@mailinator.com', '+1 (434) 297-2742', 'images/students/1743923993_image.jpg', NULL, 'student', '$2y$10$IhtfUgR0AwKaf2aMWcTZ7ue8/ReXnC//qywvc/V4BgeFAWzH2368q', 'Minima assumenda do', '2002-04-13', 'male', 'Commodi dolores elig', '1986', 'Voluptate vel distin', 'Reprehenderit tenet', NULL, NULL, NULL, 'Est exercitation sit', 1, '2025-04-06 07:19:53', '2025-04-06 07:19:53'),
(115, 'lamiya', 'remamoin1996@gmail.com', '01869174075', NULL, 'fYT5Jm3fSreNT02pU4-B7E:APA91bHUChxtWLgRTLjgbWDhRP20lCrmwT_KGmpsS5S0YQtwkBZH3Q0jtN2O5eHnAPvkI8bhM_MPCitrb70lWBRuWeQnzut8NaEKpILGStYBn-um4CPA3F0', 'student', '$2y$10$V1dEGAiwzii.hWjYhNdra.CJPm7mp1f5n0OiT1fisJA15bWMYf0u2', 'dhaka', NULL, NULL, 'DMC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-14 16:31:44', '2025-06-24 11:27:12'),
(116, 'waasuge', 'waasugeilkayar@gmail.com', '61811724', NULL, 'f3l1rZ53RIOA8r9EuffJIm:APA91bHVhmTIQ5EH-BEc-h9jSX9r5eVRWx__rONGs14rQpUGvaQZvRLc1RHcPAcuOQkUP8uGc_cIUDscVifyEHD5V87yU3WarYwUJvfEQz4IKZzfk9QMAHc', 'student', '$2y$10$8zVHdj5E.HUEM8EdSDZwd.E8rkdDXj0oWsf.FmZ.OFKZ3KKgSt0NW', 'somalia', NULL, NULL, 'alkhalil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-02 13:49:01', '2025-07-02 13:49:37'),
(117, 'tt1', 'tt1@1.c', '111', NULL, 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'student', '$2y$10$AG6BG3i6lC64.Rz2fnrituHSHp6B/aHCvBfF2mOQJQHCQwnsXeV7e', 'Chuadanga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-20 14:06:41', '2025-07-20 14:06:52'),
(118, '22', 'ww@w.c', '22', NULL, 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'student', '$2y$10$5IRb9LfU5DSNplD8kSWYfeBR3aL2Xk0GDeiUhvGUUFcs/dopBCFKm', 'Bandarban', '2025-07-02', 'Male', 'aa', 'aa', 'aa', 'aa', 'aa', 'Bangabandhu Sheikh Mujib Medical University (BSMMU)', NULL, NULL, 1, '2025-07-20 17:04:58', '2025-07-22 09:47:19'),
(119, '44', 'w@www.w', '44', NULL, NULL, 'student', '$2y$10$MQN8ydnn5lh3hK6ffXS1FOrEm6jpWsj2aRuL8cIj7oaIesFJWMPja', 'Chattogram', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-21 10:40:31', '2025-07-21 10:40:31'),
(120, 'w', 'w4@w.c', '4444', NULL, NULL, 'student', '$2y$10$lDoT2MBxAMCdzOXoqT1YD.Zivq.DGumWh4b.x8QE6FViS.R3aJoNG', 'Brahmanbaria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'string|nullable', NULL, NULL, 1, '2025-07-21 10:48:29', '2025-07-21 10:48:29'),
(121, '77', 'y@j.c', '77', NULL, NULL, 'student', '$2y$10$TluC.bNWKqTlgZc4yrM9he9jbvX1FsObDYlapT0f69EZcfIg1Mdw6', 'Chattogram', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'string|nullable', NULL, NULL, 1, '2025-07-21 10:50:05', '2025-07-21 10:50:05'),
(122, 'gf', 'hh@s.f', '4545', NULL, NULL, 'student', '$2y$10$HacTQiEJPUc5kzpYLAVCG.2AWOCYohBPamgv5/CR2lktxXR90kh6i', 'Chattogram', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-21 11:01:10', '2025-07-21 11:01:10'),
(123, 'jj', 'j@j.j', '665', NULL, 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'student', '$2y$10$5IRb9LfU5DSNplD8kSWYfeBR3aL2Xk0GDeiUhvGUUFcs/dopBCFKm', 'Chapai Nawabganj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'National Institute of Mental Health', NULL, NULL, 1, '2025-07-21 11:03:21', '2025-07-21 11:04:43'),
(124, '1212', 'asas@a.c', '1212', NULL, 'e7GnzmEaTIuUm1-LWxt-KT:APA91bHrU8_3XK6TVbZtrBqSUc9Vmn442RKL0ShXiHWUun-YyULF-2jkdSFXKmdKo2WgpbDmFAMWgY5TwoyOF2xIPFsp6MS9QWnPtlxmyGy4D8XWymwwogc', 'student', '$2y$10$SUCncCnG0z4mboWAIcpLQO.9Xz4OHzu48/VH0JLQ0Rnh5CrY126O6', 'Chattogram', '2025-07-02', 'Male', NULL, NULL, NULL, NULL, NULL, 'Square Hospitals Ltd.', NULL, NULL, 1, '2025-07-21 12:04:43', '2025-07-21 12:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `teenager_helps`
--

CREATE TABLE `teenager_helps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teenager_helps`
--

INSERT INTO `teenager_helps` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(28, 'Youth health strategic-2025', 'Plan-strategy-2018-eng-adolescent-and-youth-health-strategic-plan-2018-2025', 'teenager_guides/1750846118.pdf', 1, '2025-06-25 16:08:38', '2025-06-25 16:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `unknown_medicines`
--

CREATE TABLE `unknown_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`files`)),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unknown_medicine_reports`
--

CREATE TABLE `unknown_medicine_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`files`)),
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unkown_medicine_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unknown_medicine_reports`
--

INSERT INTO `unknown_medicine_reports` (`id`, `title`, `description`, `files`, `doctor_id`, `unkown_medicine_id`, `created_at`, `updated_at`) VALUES
(2, 'as med', 'aasdfasd asdfa', '[\"ab.ab\",\"xy.b\"]', 51, 1, '2024-12-21 21:38:50', '2024-12-21 21:38:50'),
(5, 'problem', 'big problem', '[\"ab.c\",\"sy.b\"]', 15, 1, '2024-12-22 04:30:02', '2024-12-22 04:30:02'),
(6, 'problem', 'big problem', '[\"ab.c\",\"sy.b\"]', 51, 1, '2024-12-24 06:22:27', '2024-12-24 06:22:27'),
(7, 'fbhrrj', 'f dbrhrjjjrjrbr rbrb4b4br. rrb4brh\nrvrvrhh4b r\nm5rjrb d rbrb', '[\"files\\/all\\/17350215960.jpg\"]', 51, 1, '2024-12-24 06:26:40', '2024-12-24 06:26:40'),
(8, 'aaaa', 'aaa', '\"\"', 71, 1, '2025-04-28 05:46:20', '2025-04-28 05:46:20'),
(9, 'aaaaaa', 'aaaaaaa', '\"\"', 71, 1, '2025-04-28 05:48:26', '2025-04-28 05:48:26'),
(10, 'aabb', 'aabb', '\"\"', 71, 11, '2025-04-28 06:22:46', '2025-04-28 06:22:46'),
(11, 'problem report', 'big problem', '[\"ab.c\",\"sy.b\"]', 79, 11, '2025-04-28 06:32:06', '2025-04-28 06:32:06'),
(12, 'ds', 'df', '[\"files\\/all\\/17462863450.jpg\"]', 61, 11, '2025-05-03 15:32:26', '2025-05-03 15:32:26'),
(13, 'reaply', 'yes only 400', '\"\"', 70, 11, '2025-05-08 21:37:42', '2025-05-08 21:37:42'),
(14, NULL, 'only 400', '\"\"', 70, 11, '2025-05-08 21:38:33', '2025-05-08 21:38:33'),
(15, 'sssss', 'abc', '\"\"', 81, 11, '2025-05-10 11:58:41', '2025-05-10 11:58:41'),
(16, 'problem solve', 'big problem', '\"\"', 81, 11, '2025-05-10 12:02:02', '2025-05-10 12:02:02'),
(17, 'problem solve', 'big problem', '\"\"', 81, 11, '2025-05-10 12:04:19', '2025-05-10 12:04:19'),
(18, 'problem solve', 'big problem', '\"\"', 81, 11, '2025-05-10 12:04:51', '2025-05-10 12:04:51'),
(19, 'aaa', 'bbn', '[\"files\\/all\\/17468575550.jpg\"]', 81, 16, '2025-05-10 12:16:27', '2025-05-10 12:16:27'),
(20, 'ffffffffff', 'fffffffffg', '[\"files\\/all\\/17468597300.jpg\"]', 81, 17, '2025-05-10 12:48:52', '2025-05-10 12:48:52'),
(21, 'sdsa', 'sd', '[\"files\\/all\\/17470502830.jpg\"]', 61, 12, '2025-05-12 17:44:44', '2025-05-12 17:44:44'),
(22, 'dfdsd', 'dssdfds', '[\"files\\/all\\/17470502950.jpg\"]', 61, 13, '2025-05-12 17:44:56', '2025-05-12 17:44:56'),
(23, 'dsad', 'sadss', '[\"files\\/all\\/17470503290.jpg\"]', 61, 15, '2025-05-12 17:45:31', '2025-05-12 17:45:31'),
(24, 'sd', 'sdf', '\"\"', 81, 20, '2025-06-16 12:01:11', '2025-06-16 12:01:11'),
(25, 'feedbac', 'ঢাকা মেডিকেল থেকে নিতে পারবেন', '\"\"', 70, 21, '2025-06-17 11:27:44', '2025-06-17 11:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `status` enum('active','pending','block','suspend') NOT NULL DEFAULT 'active',
  `notification_play` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `phone`, `profile_picture`, `role`, `status`, `notification_play`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Moin', 'admin@admin.com', NULL, '$2y$10$qscCgsQsubKiWZYx4V6Ek.X0l2gC8UGy57e6Q9IWZeJrvI0/4jhr.', NULL, NULL, NULL, NULL, '01708481110', 'profile_picture/80441744007008.jpg', 'admin', 'active', 1, 1, NULL, '2024-12-18 01:37:19', '2025-06-25 15:51:29'),
(2, 'Jane Smith', 'user@user.com', NULL, '$2y$10$8MIQr3jmmO77usGIa68eF.T542tsxECA/0KDRVRnnwZuNbb4SpANO', NULL, NULL, NULL, NULL, '0987654321', NULL, 'admin', 'active', 1, 1, '2025-06-25 15:51:45', '2024-12-18 01:37:19', '2025-06-25 15:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `image_poster` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `url`, `image_poster`, `status`, `created_at`, `updated_at`) VALUES
(23, 'ডাঃ দেবী শেঠির ১৪ টি উপদেশ | Dr. Devi Shetty 14 Health Tips', 'Dr. Devi Shetty 14 Health Tips', 'https://www.youtube.com/watch?v=YvRWwWUWrCc', 'videos_poster/z2sYmMyLn0a0IKFJdzADDH17DsWJNJ81IgOwRYUv.jpg', 1, '2025-06-25 14:58:41', '2025-06-25 14:58:41'),
(24, 'এলার্জি থেকে মুক্তির উপায় | Skin Allergy Bangla Tips | Dr.Rashidul Hasan | Doctor Tube', 'এলার্জি থেকে মুক্তির উপায়', 'https://www.youtube.com/watch?v=A1JJoyZjwQI', 'videos_poster/F9c6PD7b0sWauS9U0yn6IiwDZl96OqM30BO0csxt.png', 1, '2025-06-26 12:46:38', '2025-06-26 13:51:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antibiotic_guidelines`
--
ALTER TABLE `antibiotic_guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_setting_manages`
--
ALTER TABLE `app_setting_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bdjobs`
--
ALTER TABLE `bdjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chronic_cares`
--
ALTER TABLE `chronic_cares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custome_notifications`
--
ALTER TABLE `custome_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diabetic_guides`
--
ALTER TABLE `diabetic_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diognostics`
--
ALTER TABLE `diognostics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD UNIQUE KEY `doctors_phone_unique` (`phone`);

--
-- Indexes for table `doctor_specialties`
--
ALTER TABLE `doctor_specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `female_health_guides`
--
ALTER TABLE `female_health_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heart_guides`
--
ALTER TABLE `heart_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hepatic_guides`
--
ALTER TABLE `hepatic_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kidney_guides`
--
ALTER TABLE `kidney_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_news`
--
ALTER TABLE `live_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentel_helth_guides`
--
ALTER TABLE `mentel_helth_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_manages`
--
ALTER TABLE `message_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `national_guide_lines`
--
ALTER TABLE `national_guide_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_phone_unique` (`phone`);

--
-- Indexes for table `patient_problems`
--
ALTER TABLE `patient_problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pregnant_mother_guides`
--
ALTER TABLE `pregnant_mother_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_assists`
--
ALTER TABLE `prescription_assists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_assist_replays`
--
ALTER TABLE `prescription_assist_replays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_reads`
--
ALTER TABLE `prescription_reads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_read_reports`
--
ALTER TABLE `prescription_read_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_manages`
--
ALTER TABLE `quiz_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_question_ans_manages`
--
ALTER TABLE `quiz_question_ans_manages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_question_ans_manages_quiz_question_manages_id_foreign` (`quiz_question_manages_id`);

--
-- Indexes for table `quiz_question_manages`
--
ALTER TABLE `quiz_question_manages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_question_manages_quiz_manage_id_foreign` (`quiz_manage_id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skin_guides`
--
ALTER TABLE `skin_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`);

--
-- Indexes for table `teenager_helps`
--
ALTER TABLE `teenager_helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unknown_medicines`
--
ALTER TABLE `unknown_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unknown_medicine_reports`
--
ALTER TABLE `unknown_medicine_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antibiotic_guidelines`
--
ALTER TABLE `antibiotic_guidelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `app_setting_manages`
--
ALTER TABLE `app_setting_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bdjobs`
--
ALTER TABLE `bdjobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `chronic_cares`
--
ALTER TABLE `chronic_cares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `custome_notifications`
--
ALTER TABLE `custome_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `diabetic_guides`
--
ALTER TABLE `diabetic_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `diognostics`
--
ALTER TABLE `diognostics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=594;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `doctor_specialties`
--
ALTER TABLE `doctor_specialties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `female_health_guides`
--
ALTER TABLE `female_health_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `heart_guides`
--
ALTER TABLE `heart_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hepatic_guides`
--
ALTER TABLE `hepatic_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4265;

--
-- AUTO_INCREMENT for table `kidney_guides`
--
ALTER TABLE `kidney_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `live_news`
--
ALTER TABLE `live_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `mentel_helth_guides`
--
ALTER TABLE `mentel_helth_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `message_manages`
--
ALTER TABLE `message_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `national_guide_lines`
--
ALTER TABLE `national_guide_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5477;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `patient_problems`
--
ALTER TABLE `patient_problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=958;

--
-- AUTO_INCREMENT for table `pregnant_mother_guides`
--
ALTER TABLE `pregnant_mother_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `prescription_assists`
--
ALTER TABLE `prescription_assists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `prescription_assist_replays`
--
ALTER TABLE `prescription_assist_replays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `prescription_reads`
--
ALTER TABLE `prescription_reads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `prescription_read_reports`
--
ALTER TABLE `prescription_read_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_manages`
--
ALTER TABLE `quiz_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `quiz_question_ans_manages`
--
ALTER TABLE `quiz_question_ans_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `quiz_question_manages`
--
ALTER TABLE `quiz_question_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skin_guides`
--
ALTER TABLE `skin_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `teenager_helps`
--
ALTER TABLE `teenager_helps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `unknown_medicines`
--
ALTER TABLE `unknown_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `unknown_medicine_reports`
--
ALTER TABLE `unknown_medicine_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- Constraints for table `quiz_question_ans_manages`
--
ALTER TABLE `quiz_question_ans_manages`
  ADD CONSTRAINT `quiz_question_ans_manages_quiz_question_manages_id_foreign` FOREIGN KEY (`quiz_question_manages_id`) REFERENCES `quiz_question_manages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_question_manages`
--
ALTER TABLE `quiz_question_manages`
  ADD CONSTRAINT `quiz_question_manages_quiz_manage_id_foreign` FOREIGN KEY (`quiz_manage_id`) REFERENCES `quiz_manages` (`id`) ON DELETE CASCADE;

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
