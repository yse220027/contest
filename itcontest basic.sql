-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-10-13 07:04:43
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `itcontest`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `meetings`
--

CREATE TABLE `meetings` (
  `mtgid` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mtgname` varchar(255) NOT NULL,
  `venuename` varchar(255) NOT NULL,
  `reservation` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `lesson` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `meetings`
--

INSERT INTO `meetings` (`mtgid`, `name`, `mtgname`, `venuename`, `reservation`, `start_time`, `end_time`, `lesson`) VALUES
(3, '田中太郎', 'チームビルディングセッション', 'フォレストグリーンアリーナ', '2023-10-26', '15:00:00', '16:00:00', 'online'),
(1475, '山本次郎', 'プロジェクト進捗レビュー', 'A12会議室', '2023-10-04', '19:00:00', '20:00:00', 'venue'),
(1476, '高橋三郎', 'イノベーションサミット', 'ムーンビューコンベンションセンター', '2023-10-13', '18:30:00', '20:00:00', 'venue'),
(1477, '山本四郎', 'チームビルディング研修', 'フォレストグリーンアリーナ', '2023-10-10', '13:20:00', '15:15:00', 'online'),
(1480, '橋本徹', 'デザインブレーンストーミング', 'シティータワーコンファレンスルーム', '2023-10-19', '12:35:00', '15:35:00', 'online'),
(1482, '板橋悟朗', 'マーケティングストラテジー会議', 'マリーナベイホテル宴会場', '2023-10-24', '13:30:00', '15:30:00', 'online'),
(1483, '望月 裕子', 'プロジェクト進捗レビュー', 'サンライズホール', '2023-11-16', '22:00:00', '23:30:00', 'venue'),
(1484, '相田由紀子', 'チームビルディングセッション', 'フォレストグリーンアリーナ', '2023-12-21', '15:00:00', '17:00:00', 'online'),
(1487, '高橋 三郎', 'プロジェクト進捗レビュー', 'ムーンビューコンベンションセンター', '2023-10-15', '02:08:00', '03:08:00', 'venue'),
(1528, '中西笙', '卒業制作作品発表にむけて', 'HR教室', '2023-10-10', '09:30:00', '10:30:00', 'online'),
(1547, '田中紘一', 'リダイレクトテスト', 'YSE', '2023-10-10', '11:20:00', '12:20:00', 'venue'),
(1551, '甲斐田智治', 'システムテスト', 'B社会議室', '2023-10-21', '11:30:00', '12:20:00', 'venue'),
(1555, '鈴木孝則', '新人研修会', '第一会議室', '2023-10-21', '10:30:00', '12:20:00', 'venue');

-- --------------------------------------------------------

--
-- テーブルの構造 `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT '',
  `mtgid` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel1` varchar(255) DEFAULT NULL,
  `tel2` varchar(255) DEFAULT NULL,
  `tel3` varchar(255) DEFAULT NULL,
  `lesson` varchar(255) DEFAULT NULL,
  `questiontype` varchar(255) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `questions`
--

INSERT INTO `questions` (`id`, `name`, `mtgid`, `email`, `tel1`, `tel2`, `tel3`, `lesson`, `questiontype`, `question`, `created_at`) VALUES
(19, '田中 太郎', 1234, 'abc@efg.hij', '080', '1234', '5678', 'online', 'other', '最近のプロジェクトで最も挑戦的だった部分は何ですか？', '2023-09-28 13:41:14'),
(20, '田中 太郎', 5678, 'abc@efg.hij', '080', '1234', '5678', 'venue', 'other', 'この会社のビジョンやミッションについて、どのように感じていますか？', '2023-09-28 13:42:11'),
(21, '鈴木 一郎', 1553, 'suzuki.ichiro@example.com', '888', '3333', '4444', 'online', 'technical', '個人の生産性を向上させるためのおすすめのツールはありますか？', '2023-09-28 13:47:56'),
(22, '山田 美咲', 3456, '', '', '', '', 'venue', 'other', 'チーム内のコミュニケーションを効果的にする方法は？ ', '2023-09-28 13:48:57'),
(23, '伊藤 健太', 1553, 'ito.kenta@example.com', '', '', '', 'online', 'technical', '業界内で注目しているトレンドや技術はありますか？', '2023-09-28 13:49:57'),
(24, '山口 直人', 4567, 'yamaguchi.naoto@example.com', '999', '8888', '7777', 'online', 'other', '社内での情報共有やナレッジマネジメントについての考えは？ ', '2023-09-28 13:51:18'),
(26, '田中 太郎', 1553, 'abc@efg.hij', '080', '1234', '5678', 'venue', 'other', '社内での情報共有やナレッジマネジメントについての考えを教えてください。', '2023-09-28 15:09:08'),
(27, '田中 浩二', 1553, '', '', '', '', 'venue', 'financial', '料金のプランはいくつありますか？', '2023-10-08 12:43:43'),
(28, '高橋 三郎', 2023, '', '', '', '', 'venue', 'technical', 'AからBにと資料にありましたが処理はどういった方法で行われていますか？', '2023-10-08 12:45:39');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`mtgid`);

--
-- テーブルのインデックス `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question` (`question`) USING HASH;

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `meetings`
--
ALTER TABLE `meetings`
  MODIFY `mtgid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1577;

--
-- テーブルの AUTO_INCREMENT `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
