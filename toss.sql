-- Host: ####
-- 생성 시간: 22-11-07 14:21
-- 서버 버전: ####
-- PHP 버전: ####

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `toss`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `toss_renyu`
--

CREATE TABLE `toss_renyu` (
  `cashtagTransferId` int(11) NOT NULL,
  `cashtagTransferMethodType` text NOT NULL,
  `sendName` text NOT NULL,
  `transferedTs` text NOT NULL,
  `amount` text NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `toss_renyu`
--

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `toss_renyu`
--
ALTER TABLE `toss_renyu`
  ADD PRIMARY KEY (`cashtagTransferId`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `toss_renyu`
--
ALTER TABLE `toss_renyu`
  MODIFY `cashtagTransferId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2415925;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
