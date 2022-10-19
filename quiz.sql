-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Paź 2022, 14:26
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quiz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `content` varchar(45) DEFAULT NULL,
  `is_right` tinyint(1) DEFAULT NULL,
  `questions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `answers`
--

INSERT INTO `answers` (`id`, `content`, `is_right`, `questions_id`) VALUES
(1, 'jeden', 1, 1),
(2, 'dwa', 0, 1),
(3, 'trzy', 0, 1),
(4, '4', 1, 2),
(5, '6', 0, 2),
(6, '7', 0, 2),
(7, '24 godziny', 1, 3),
(8, '12 godzin', 0, 3),
(9, 'pół dnia', 0, 3),
(10, '7 dni', 1, 4),
(11, '6 dni', 0, 4),
(12, '5 dni', 0, 4),
(13, '1/60', 1, 5),
(14, '2', 0, 5),
(15, '30', 0, 5),
(16, 'W południe', 1, 6),
(17, 'Po południu', 1, 6),
(18, 'Wieczorem', 1, 6),
(19, 'Rano', 0, 6),
(20, 'Nie wychodzić ze szkoły', 0, 6),
(21, 'Więcej niż jeden', 1, 7),
(22, 'Więcej niż dwa', 1, 7),
(23, 'Więcej trzy', 1, 7),
(24, 'Mniej niż jeden', 0, 7),
(25, 'Więcej niż trzy', 0, 7),
(26, 'Dodatnie', 1, 8),
(27, 'Ujemne', 1, 8),
(28, 'Zmiennoprzecinkowe', 0, 8),
(29, 'Więcej niż jeden', 1, 9),
(30, 'Mniej niż dwieście', 1, 9),
(31, 'Sto i koniec', 0, 9),
(32, 'Patronem', 1, 10),
(33, 'Dezydery', 1, 10),
(34, 'Sienkiewicz', 0, 10),
(35, 'Dodatnie', 1, 8),
(36, 'Ujemne', 1, 8),
(37, 'Zmiennoprzecinkowe', 0, 8),
(38, 'Całkowite', 1, 8),
(39, 'Więcej niż jeden', 1, 9),
(40, 'Mniej niż dwieście', 1, 9),
(41, 'Około sto', 1, 9),
(42, 'Dziesięć', 0, 9),
(43, 'Patronem', 1, 10),
(44, 'Dezydery', 1, 10),
(45, 'Chłapowski', 1, 10),
(46, 'Andrzej', 1, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `content` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`id`, `content`) VALUES
(1, 'Ile naturalnych satelitów ma Ziemia?'),
(2, 'Ile to 2 + 2?'),
(3, 'Jak długo trwa dzień?'),
(4, 'Ile dni jest w tygodniu?'),
(5, 'Ile godzin ma minuta?'),
(6, 'Jak wcześnie powinno się wstawać do szkoły?'),
(7, 'Ile klawiszy ma standardowa myszka?'),
(8, 'Jakie wartości przechowuje zmienna typu int?'),
(9, 'Ile klawiszy ma standardowa klawiatura?'),
(10, 'Jak się nazywa patron szkoły?');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `students`
--

INSERT INTO `students` (`id`, `name`, `surname`) VALUES
(1, 'Jan', 'Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students_has_tests`
--

CREATE TABLE `students_has_tests` (
  `id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `tests_has_answers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `students_has_tests`
--

INSERT INTO `students_has_tests` (`id`, `students_id`, `tests_has_answers_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `tests`
--

INSERT INTO `tests` (`id`, `date`) VALUES
(1, '2018-03-21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tests_has_answers`
--

CREATE TABLE `tests_has_answers` (
  `id` int(11) NOT NULL,
  `tests_id` int(11) NOT NULL,
  `answers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `tests_has_answers`
--

INSERT INTO `tests_has_answers` (`id`, `tests_id`, `answers_id`) VALUES
(1, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`,`questions_id`),
  ADD KEY `fk_answers_questions` (`questions_id`);

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `students_has_tests`
--
ALTER TABLE `students_has_tests`
  ADD PRIMARY KEY (`id`,`students_id`,`tests_has_answers_id`),
  ADD KEY `fk_students_has_tests_has_answers_students1` (`students_id`),
  ADD KEY `fk_students_has_tests_has_answers_tests_has_answers1` (`tests_has_answers_id`);

--
-- Indeksy dla tabeli `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tests_has_answers`
--
ALTER TABLE `tests_has_answers`
  ADD PRIMARY KEY (`id`,`tests_id`,`answers_id`),
  ADD KEY `fk_tests_has_answers_tests1` (`tests_id`),
  ADD KEY `fk_tests_has_answers_answers1` (`answers_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `students_has_tests`
--
ALTER TABLE `students_has_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `tests_has_answers`
--
ALTER TABLE `tests_has_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers_questions` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `students_has_tests`
--
ALTER TABLE `students_has_tests`
  ADD CONSTRAINT `fk_students_has_tests_has_answers_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_students_has_tests_has_answers_tests_has_answers1` FOREIGN KEY (`tests_has_answers_id`) REFERENCES `tests_has_answers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `tests_has_answers`
--
ALTER TABLE `tests_has_answers`
  ADD CONSTRAINT `fk_tests_has_answers_answers1` FOREIGN KEY (`answers_id`) REFERENCES `answers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tests_has_answers_tests1` FOREIGN KEY (`tests_id`) REFERENCES `tests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
