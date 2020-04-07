-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 04:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `pass`, `role`) VALUES
('a', 'a', 'a'),
('admin', 'admin', 'Admin'),
('apoteker', 'apoteker', 'Apoteker'),
('b', 'b', 'b'),
('dokter', 'dokter', 'Dokter');

-- --------------------------------------------------------

--
-- Table structure for table `cek_penyakit`
--

CREATE TABLE `cek_penyakit` (
  `id_mr` varchar(15) NOT NULL,
  `id_penyakit` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cek_penyakit`
--

INSERT INTO `cek_penyakit` (`id_mr`, `id_penyakit`) VALUES
('MR20200222001', 'P0001'),
('MR20200222001', 'P0002'),
('MR20200222002', 'P0001'),
('MR20200222002', 'P0002'),
('MR20200226003', 'P0001'),
('MR20200226003', 'P0006'),
('MR20200226004', 'P0006'),
('MR20200226006', 'P0006'),
('MR20200226007', 'P0002'),
('MR20200226007', 'P0003'),
('MR20200303056', 'P0001'),
('MR20200303056', 'P0053'),
('MR20200303057', 'P0002'),
('MR20200303057', 'P0005'),
('MR20200303058', 'P0001'),
('MR20200303058', 'P0036'),
('MR20200306059', 'P0004'),
('MR20200306059', 'P0005'),
('MR20200306060', 'P0006'),
('MR20200306060', 'P0007'),
('MR20200306061', 'P0004'),
('MR20200306061', 'P0006'),
('MR20200306062', 'P0004'),
('MR20200306062', 'P0005'),
('MR20200306063', 'P0003'),
('MR20200306063', 'P0004'),
('MR20200306064', 'P0003'),
('MR20200306064', 'P0005'),
('MR20200306065', 'P0003'),
('MR20200306065', 'P0006'),
('MR20200306066', 'P0006'),
('MR20200306066', 'P0019'),
('MR20200306067', 'P0004'),
('MR20200306068', 'P0006'),
('MR20200306069', 'P0006'),
('MR20200306070', 'P0004'),
('MR20200306070', 'P0005'),
('MR20200306071', 'P0007'),
('MR20200310072', 'P0025'),
('MR20200310073', 'P0025'),
('MR20200310074', 'P0005'),
('MR20200310075', 'P0005'),
('MR20200330077', 'P0007'),
('MR20200330078', 'P0014'),
('MR20200330079', 'P0006'),
('MR20200330081', 'P0014'),
('MR20200330082', 'P0014'),
('MR20200330083', 'P0025'),
('MR20200330084', 'P0100'),
('MR20200331085', 'P0004');

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id_obat` varchar(12) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `stok` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`id_obat`, `nama_obat`, `tipe`, `stok`) VALUES
('O0001', 'Ambroxol', 'Syirup', 178),
('O0002', 'Amoxicillin', 'Syirup', 310),
('O0003', 'Yusmox', 'Syirup', 9),
('O0004', 'Amoxicillin Forte', 'Syirup', 134),
('O0005', 'Antasida', 'Syirup', 42),
('O0006', 'As. Mefenamat', 'Syirup', 16),
('O0007', 'Cefadroxil', 'Syirup', 64),
('O0008', 'Cefixime', 'Syirup', 100),
('O0009', 'Cetirizin', 'Syirup', 88),
('O0010', 'Lerzin', 'Syirup', 100),
('O0011', 'Convermex', 'Syirup', 76),
('O0012', 'Cotrimoxazole', 'Syirup', 88),
('O0013', 'Domperidone', 'Syirup', 100),
('O0014', 'Hufadon ', 'Syirup', 76),
('O0015', 'Erytromicin', 'Syirup', 100),
('O0016', 'Farizol', 'Syirup', 88),
('O0017', 'Metronidazole', 'Syirup', 100),
('O0018', 'Flunax', 'Syirup', 88),
('O0019', 'Flutop C', 'Syirup', 88),
('O0020', 'Flutrop', 'Syirup', 76),
('O0021', 'Hufabetamin', 'Syirup', 100),
('O0022', 'Hufallerzin', 'Syirup', 88),
('O0023', 'Ibuprofen 100 mg', 'Syirup', 88),
('O0024', 'Ibuprofen 200 mg', 'Syirup', 88),
('O0025', 'Kaolin Pectin', 'Syirup', 5),
('O0026', 'Novatusin', 'Syirup', 100),
('O0027', 'OBH Itrasal', 'Syirup', 100),
('O0028', 'Laserin', 'Syirup', 100),
('O0029', 'Paracetamol', 'Syirup', 100),
('O0030', 'Dapyrin', 'Syirup', 100),
('O0031', 'Pimacolin Apel', 'Syirup', 100),
('O0032', 'Pimtracol Lemon', 'Syirup', 100),
('O0033', 'Cherry', 'Syirup', 100),
('O0034', 'Salbutamol, Exspectoran', 'Syirup', 100),
('O0035', 'Glisend Exp', 'Syirup', 100),
('O0036', 'Salbutamol', 'Syirup', 100),
('O0037', 'Glisend', 'Syirup', 100),
('O0038', 'Sanmol', 'Syirup', 100),
('O0039', 'Sucralfat', 'Syirup', 100),
('O0040', 'Lambucyd', 'Syirup', 88),
('O0041', 'Tialysin Plus', 'Syirup', 112),
('O0042', 'Hufavit', 'Syirup', 100),
('O0043', 'Curbeplex', 'Syirup', 100),
('O0044', 'Uni Baby Cough', 'Syirup', 100),
('O0045', 'Vipcol', 'Syirup', 100),
('O0046', 'Zenirex', 'Syirup', 88),
('O0047', 'Zirkum Kid', 'Syirup', 88),
('O0048', 'Acyclovir', 'Salep', 100),
('O0049', 'Alletrol', 'Salep', 100),
('O0050', 'Betametason', 'Salep', 100),
('O0051', 'Orsaderm', 'Salep', 100),
('O0052', 'Betason N', 'Salep', 100),
('O0053', 'Beta, Neomicyn ', 'Salep', 100),
('O0054', 'Bioplacenton', 'Salep', 100),
('O0055', 'Neocenta', 'Salep', 100),
('O0056', 'Bevalex', 'Salep', 100),
('O0057', 'Nisagon', 'Salep', 100),
('O0058', 'Bufacomb', 'Salep', 100),
('O0059', 'Chloramfecort-H', 'Salep', 100),
('O0060', 'Fluocinolone, Genta', 'Salep', 100),
('O0061', 'Synalten', 'Salep', 100),
('O0062', 'Fluocinolone', 'Salep', 88),
('O0063', 'Synarcus', 'Salep', 100),
('O0064', 'Fucidic Acid', 'Salep', 100),
('O0065', 'Acdat CR 5 mg', 'Salep', 100),
('O0066', 'Gentamicyn', 'Salep', 100),
('O0067', 'Genalten', 'Salep', 88),
('O0068', 'Hico Gel', 'Salep', 100),
('O0069', 'Hidrocortison', 'Salep', 100),
('O0070', 'Heltiskin C', 'Salep', 100),
('O0071', 'Keto,Betametason', 'Salep', 100),
('O0072', 'Lespain', 'Salep', 100),
('O0073', 'Lespain Cool', 'Salep', 100),
('O0074', 'Megatic', 'Salep', 100),
('O0075', 'Miconazole', 'Salep', 100),
('O0076', 'Mometason', 'Salep', 100),
('O0077', 'Elomox', 'Salep', 100),
('O0078', 'Moteson', 'Salep', 100),
('O0079', 'Newastar ', 'Salep', 100),
('O0080', 'Piroxicam', 'Salep', 100),
('O0081', 'Faxiden', 'Salep', 100),
('O0082', 'Reco Eye', 'Salep', 100),
('O0083', 'Salep 24', 'Salep', 100),
('O0084', 'Acyclovir 400 mg', 'Tablet', 100),
('O0085', 'Adrome', 'Tablet', 100),
('O0086', 'Alleron', 'Tablet', 100),
('O0087', 'Allopurinol 100 mg', 'Tablet', 100),
('O0088', 'Ambeven Kap', 'Tablet', 100),
('O0089', 'Ambroxol 30 mg', 'Tablet', 100),
('O0090', 'Amlodipine 10 mg', 'Tablet', 100),
('O0091', 'Amlodipine 5 mg', 'Tablet', 100),
('O0092', 'Amoxicillin 500 mg', 'Tablet', 100),
('O0093', 'As. Folat', 'Tablet', 100),
('O0094', 'Folamef', 'Tablet', 100),
('O0095', 'As. Mefenamat', 'Tablet', 100),
('O0096', 'Trifastan', 'Tablet', 100),
('O0097', 'Anastan F', 'Tablet', 100),
('O0098', 'Aspilet', 'Tablet', 100),
('O0099', 'Azytromicin', 'Tablet', 100),
('O0100', 'Bromhexin', 'Tablet', 100),
('O0101', 'Bundavin', 'Tablet', 100),
('O0102', 'Calcifar', 'Tablet', 100),
('O0103', 'Captopril 12,5 mg', 'Tablet', 100),
('O0104', 'Captopril 25 mg', 'Tablet', 100),
('O0105', 'Cefadroxil 500 mg', 'Tablet', 100),
('O0106', 'Cefixime 200 mg', 'Tablet', 100),
('O0107', 'Cefixime', 'Tablet', 100),
('O0108', 'Helixim 100 mg', 'Tablet', 100),
('O0109', 'Cetirizin', 'Tablet', 100),
('O0110', 'Lerzin', 'Tablet', 100),
('O0111', 'Ciprofloxacin', 'Tablet', 100),
('O0112', 'Clyndamicin 150 mg', 'Tablet', 100),
('O0113', 'Clyndamicin', 'Tablet', 100),
('O0114', 'Milorin 300 mg', 'Tablet', 100),
('O0115', 'Coparcetin', 'Tablet', 100),
('O0116', 'Flutamol', 'Tablet', 100),
('O0117', 'Intunal F', 'Tablet', 100),
('O0118', 'Dexametason 0,5 mg', 'Tablet', 100),
('O0119', 'Dexteem Plus', 'Tablet', 100),
('O0120', 'Dextral', 'Tablet', 100),
('O0121', 'Domperidon', 'Tablet', 100),
('O0122', 'Omedon', 'Tablet', 100),
('O0123', 'Dulcolac', 'Tablet', 100),
('O0124', 'Laxana', 'Tablet', 100),
('O0125', 'Erytromicin', 'Tablet', 100),
('O0126', 'Eryra', 'Tablet', 100),
('O0127', 'Estalex', 'Tablet', 100),
('O0128', 'Eperison HCI', 'Tablet', 100),
('O0129', 'FG Throces', 'Tablet', 100),
('O0130', 'Flucadex', 'Tablet', 100),
('O0131', 'Flunarizin', 'Tablet', 100),
('O0132', 'Seremig', 'Tablet', 100),
('O0133', 'Flunax', 'Tablet', 100),
('O0134', 'Flutrop', 'Tablet', 100),
('O0135', 'Furosemide 40 mg', 'Tablet', 100),
('O0136', 'Glibenclamide', 'Tablet', 100),
('O0137', 'Glimepiride 2 mg', 'Tablet', 100),
('O0138', 'Glukosamin', 'Tablet', 100),
('O0139', 'Grafasma', 'Tablet', 100),
('O0140', 'Grantusif', 'Tablet', 100),
('O0141', 'Dextral', 'Tablet', 100),
('O0142', 'Griseovulfin 125 mg', 'Tablet', 100),
('O0143', 'Griseovulfin', 'Tablet', 100),
('O0144', 'Rexavin 500 mg', 'Tablet', 100),
('O0145', 'Guafenesin', 'Tablet', 100),
('O0146', 'Hufabion', 'Tablet', 100),
('O0147', 'Etabion', 'Tablet', 100),
('O0148', 'Hufralgin', 'Tablet', 100),
('O0149', 'Biropyron', 'Tablet', 100),
('O0150', 'Ibuprofen 200 mg', 'Tablet', 100),
('O0151', 'Ibuprofen 400 mg', 'Tablet', 100),
('O0152', 'Inamid', 'Tablet', 100),
('O0153', 'Isosorbite Dinitrate 5 mg', 'Tablet', 100),
('O0154', 'Kalium Diclofenac', 'Tablet', 100),
('O0155', 'Kaditic', 'Tablet', 100),
('O0156', 'Genflam', 'Tablet', 100),
('O0157', 'Ketokonazole 200 mg', 'Tablet', 100),
('O0158', 'Ketorolac', 'Tablet', 100),
('O0159', 'Konvermex 250', 'Tablet', 100),
('O0160', 'Compi 250', 'Tablet', 100),
('O0161', 'Combantrin 250', 'Tablet', 100),
('O0162', 'Konvermex 125', 'Tablet', 100),
('O0163', 'Compi 125', 'Tablet', 100),
('O0164', 'Combantrin 125', 'Tablet', 100),
('O0165', 'Kurkumex Kap', 'Tablet', 100),
('O0166', 'Lambucyd', 'Tablet', 100),
('O0167', 'Lansoprazol 30 mg', 'Tablet', 100),
('O0168', 'Levofloxacin', 'Tablet', 100),
('O0169', 'Lexapram', 'Tablet', 100),
('O0170', 'Librozym', 'Tablet', 100),
('O0171', 'Loratadine', 'Tablet', 100),
('O0172', 'Winantin ', 'Tablet', 100),
('O0173', 'Mecobalamin', 'Tablet', 100),
('O0174', 'Meloxicam 15 mg', 'Tablet', 100),
('O0175', 'Meloxicam 7,5 mg', 'Tablet', 100),
('O0176', 'Mesaflukin', 'Tablet', 100),
('O0177', 'Metamizole Sodium', 'Tablet', 100),
('O0178', 'Metformin', 'Tablet', 100),
('O0179', 'Methylprednisolone 16 mg', 'Tablet', 100),
('O0180', 'Methylprednisolone 8 mg', 'Tablet', 100),
('O0181', 'Methylprednisolone 4 mg', 'Tablet', 100),
('O0182', 'Metronidazole', 'Tablet', 100),
('O0183', 'Nasamex Forte', 'Tablet', 100),
('O0184', 'Nephrolit', 'Tablet', 100),
('O0185', 'Neuralgin Rhema', 'Tablet', 100),
('O0186', 'Neurodex', 'Tablet', 100),
('O0187', 'Omegdiar', 'Tablet', 100),
('O0188', 'Omeprazole', 'Tablet', 100),
('O0189', 'Lokev', 'Tablet', 100),
('O0190', 'Ondansentron 4 mg', 'Tablet', 100),
('O0191', 'PCT 500 mg', 'Tablet', 100),
('O0192', 'Sanmol 500mg', 'Tablet', 100),
('O0193', 'Masamol 500mg', 'Tablet', 100),
('O0194', 'PCT Forte', 'Tablet', 100),
('O0195', 'Sanmol Forte', 'Tablet', 100),
('O0196', 'Termagon Forte', 'Tablet', 100),
('O0197', 'Piroxicam 10 mg', 'Tablet', 100),
('O0198', 'Piroxicam 20 mg', 'Tablet', 100),
('O0199', 'Polycrol Forte', 'Tablet', 100),
('O0200', 'Prednison 5 mg', 'Tablet', 100),
('O0201', 'Primadex  ', 'Tablet', 100),
('O0202', 'Primadex Forte', 'Tablet', 100),
('O0203', 'Zultrop Forte', 'Tablet', 100),
('O0204', 'Ranitidine 150 mg', 'Tablet', 100),
('O0205', 'Salbutamol 2 mg', 'Tablet', 100),
('O0206', 'Salbutamol 4 mg', 'Tablet', 100),
('O0207', 'Scopma  ', 'Tablet', 100),
('O0208', 'Scopma Plus', 'Tablet', 100),
('O0209', 'Selkom C', 'Tablet', 100),
('O0210', 'Calfera', 'Tablet', 100),
('O0211', 'Simvastatin 10 mg', 'Tablet', 100),
('O0212', 'Simvastatin 20 mg', 'Tablet', 100),
('O0213', 'Spasminal', 'Tablet', 100),
('O0214', 'Teosal ', 'Tablet', 100),
('O0215', 'Tera Forte', 'Tablet', 100),
('O0216', 'Elsiron', 'Tablet', 100),
('O0217', 'Tetracyclin', 'Tablet', 100),
('O0218', 'Thiamfenicol', 'Tablet', 100),
('O0219', 'Dionicol', 'Tablet', 100),
('O0220', 'Tranexamid Acid 500 mg', 'Tablet', 100),
('O0221', 'Vastigo', 'Tablet', 100),
('O0222', 'Histigo', 'Tablet', 100),
('O0223', 'Vectrin', 'Tablet', 100),
('O0224', 'Voltadex 25 mg', 'Tablet', 100),
('O0225', 'Voltadex 50 mg', 'Tablet', 100),
('O0226', 'Gratheos 50', 'Tablet', 100),
('O0227', 'Zinc Sulfat', 'Tablet', 100),
('O0228', 'Alkohol', 'Lain-lain', 100),
('O0229', 'Bedak Salisil Talk', 'Lain-lain', 100),
('O0230', 'Betadine 30 ml', 'Lain-lain', 100),
('O0231', 'Betadine 5 ml', 'Lain-lain', 100),
('O0232', 'Cairan Glukosa ', 'Lain-lain', 100),
('O0233', 'Cairan NaCL', 'Lain-lain', 100),
('O0234', 'Cairan RL', 'Lain-lain', 100),
('O0235', 'Callusol', 'Lain-lain', 100),
('O0236', 'Chiliplast', 'Lain-lain', 100),
('O0237', 'Leukoplast', 'Lain-lain', 100),
('O0238', 'Combivent', 'Lain-lain', 100),
('O0239', 'Ventolin Nebul', 'Lain-lain', 100),
('O0240', 'Dulcolax Supp', 'Lain-lain', 100),
('O0241', 'Easy Touch Cholesterol', 'Lain-lain', 100),
('O0242', 'Easy Touch Glukosa', 'Lain-lain', 100),
('O0243', 'Easy Touch Uric Acid', 'Lain-lain', 100),
('O0244', 'Elastic Verban 15 cm', 'Lain-lain', 100),
('O0245', 'Elastic Verban 10 cm', 'Lain-lain', 100),
('O0246', 'Elastic Verban 7,5 cm', 'Lain-lain', 100),
('O0247', 'Enbatic Serbuk', 'Lain-lain', 100),
('O0248', 'Gentiant Violet', 'Lain-lain', 100),
('O0249', 'Giovan Blue', 'Lain-lain', 100),
('O0250', 'Giovan Pink', 'Lain-lain', 100),
('O0251', 'GOM', 'Lain-lain', 100),
('O0252', 'Handscoont M', 'Lain-lain', 100),
('O0253', 'Hypafix 5 cm', 'Lain-lain', 100),
('O0254', 'Kasa Gulung', 'Lain-lain', 100),
('O0255', 'Kasa Steril', 'Lain-lain', 100),
('O0256', 'Ketoprofen', 'Lain-lain', 100),
('O0257', 'Suprafenid 100 mg ', 'Lain-lain', 100),
('O0258', 'Lacto B', 'Lain-lain', 100),
('O0259', 'LFX Minidose', 'Lain-lain', 100),
('O0260', 'Masker', 'Lain-lain', 100),
('O0261', 'Microlax Sup', 'Lain-lain', 100),
('O0262', 'Minyak Kayu Putih', 'Lain-lain', 100),
('O0263', 'Nistatin Vag', 'Lain-lain', 100),
('O0264', 'Obat Sakit Gigi Herbal', 'Lain-lain', 100),
('O0265', 'Okeplast', 'Lain-lain', 100),
('O0266', 'Hansaplast', 'Lain-lain', 100),
('O0267', 'Ondansentron Inj', 'Lain-lain', 100),
('O0268', 'Oralit', 'Lain-lain', 100),
('O0269', 'PK Serbuk', 'Lain-lain', 100),
('O0270', 'Plester Koin Chili (Putih & Co', 'Lain-lain', 100),
('O0271', 'Pot 10 cc', 'Lain-lain', 100),
('O0272', 'Prednison Pot', 'Lain-lain', 100),
('O0273', 'Proris 125 mg', 'Lain-lain', 100),
('O0274', 'Rivanol', 'Lain-lain', 100),
('O0275', 'Rhoto TM', 'Lain-lain', 100),
('O0276', 'Sangobion', 'Lain-lain', 100),
('O0277', 'Hufabion', 'Lain-lain', 100),
('O0278', 'Mersibion', 'Lain-lain', 100),
('O0279', 'Stesolid Rektal Tube 5 mg', 'Lain-lain', 100),
('O0280', 'Superhoid Supp', 'Lain-lain', 100),
('O0281', 'Takahi Koyo\'', 'Lain-lain', 100),
('O0282', 'Test Pack', 'Lain-lain', 100),
('O0283', 'Transpulmin Balsem Bayi', 'Lain-lain', 100),
('O0284', 'Transpulmin Balsem Dewasa', 'Lain-lain', 100),
('O0285', 'VIT A', 'Lain-lain', 100),
('O0286', 'VIT A Ipi', 'Lain-lain', 100),
('O0287', 'Vit B Comp', 'Lain-lain', 100),
('O0288', 'Vit B12', 'Lain-lain', 100),
('O0289', 'Vit B6', 'Lain-lain', 100),
('O0290', 'Vit C Pot 25 mg', 'Lain-lain', 100),
('O0291', 'Vit C Pot 50 mg', 'Lain-lain', 100),
('O0292', 'Vit K', 'Lain-lain', 100),
('O0293', 'Alletrol Eye', 'Drop', 100),
('O0294', 'Ambroxol', 'Drop', 100),
('O0295', 'Promoxol', 'Drop', 100),
('O0296', 'Mucos ', 'Drop', 100),
('O0297', 'Nystatin', 'Drop', 100),
('O0298', 'Ottopain', 'Drop', 100),
('O0299', 'Paracetamol', 'Drop', 100),
('O0300', 'Hufagesic', 'Drop', 100),
('O0301', 'Gravadon', 'Drop', 100),
('O0302', 'Reco Ear', 'Drop', 100),
('O0303', 'Erlamycetin', 'Drop', 100),
('O0304', 'TT', 'Drop', 100),
('O0305', 'Reco Eye', 'Drop', 100),
('O0306', 'TM', 'Drop', 100),
('O0307', 'Tes', 'Syirup', 12);

-- --------------------------------------------------------

--
-- Table structure for table `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id_pasien` varchar(12) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `umur` int(3) NOT NULL,
  `kelas` varchar(6) NOT NULL,
  `asrama` varchar(12) NOT NULL,
  `goldar` varchar(2) NOT NULL,
  `tinggi_badan` float NOT NULL,
  `berat_badan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pasien`
--

INSERT INTO `data_pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`, `kelas`, `asrama`, `goldar`, `tinggi_badan`, `berat_badan`) VALUES
('PS000001', 'Wildan', 'Laki-laki', 22, '11', 'Abdur', 'A', 76, 76),
('PS000002', 'Ahmad', 'Laki-laki', 34, '12', 'Abdur', 'O', 1.67, 76),
('PS000003', 'asdasd', 'Laki-laki', 23, '', '', 'A', 0, 0),
('PS000004', 'adssakd', 'Laki-laki', 23, '', '', 'A', 0, 0),
('PS000005', 'AA', 'Laki-Laki', 21, '', '', '', 0, 0),
('PS000006', 'AB', 'Laki-Laki', 22, '', '', '', 0, 0),
('PS000007', 'AC', 'Laki-Laki', 24, '', '', '', 0, 0),
('PS000008', 'AD', 'Laki-Laki', 23, '', '', '', 0, 0),
('PS000009', 'AL', 'Laki-Laki', 21, '', '', '', 0, 0),
('PS000010', 'AK', 'Laki-Laki', 15, '', '', '', 0, 0),
('PS000011', 'OO', 'Perempuan', 15, '', '', '', 0, 0),
('PS000012', 'NF', 'Perempuan', 24, '', '', '', 0, 0),
('PS000013', 'FA', 'Laki-Laki', 24, '', '', '', 0, 0),
('PS000014', 'RD', 'Perempuan', 24, '', '', '', 0, 0),
('PS000015', 'FF', 'Perempuan', 26, '', '', '', 0, 0),
('PS000016', 'WE', 'Perempuan', 16, '', '', '', 0, 0),
('PS000017', 'DS', 'Perempuan', 18, '', '', '', 0, 0),
('PS000018', 'DF', 'Perempuan', 23, '', '', '', 0, 0),
('PS000019', 'DG', 'Perempuan', 21, '', '', '', 0, 0),
('PS000020', 'DH', 'Perempuan', 29, '', '', '', 0, 0),
('PS000021', 'JL', 'Laki-Laki', 20, '', '', '', 0, 0),
('PS000022', 'JM', 'Laki-Laki', 20, '', '', '', 0, 0),
('PS000023', 'NB', 'Laki-Laki', 27, '', '', '', 0, 0),
('PS000024', 'LL', 'Laki-Laki', 22, '', '', '', 0, 0),
('PS000025', 'TR', 'Laki-Laki', 22, '', '', '', 0, 0),
('PS000026', 'werwer', 'Laki-laki', 30, '', '', 'A', 65, 65);

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `id_mr` varchar(15) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pasien` varchar(12) NOT NULL,
  `anamnesa` varchar(100) NOT NULL,
  `pemeriksaan_tindakan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`id_mr`, `kategori`, `tanggal`, `id_pasien`, `anamnesa`, `pemeriksaan_tindakan`) VALUES
('MR20200222001', 'Umum', '2020-01-22', 'PS000002', 'rteterter', 'qweqeqw'),
('MR20200222002', 'Umum', '2020-03-22', 'PS000002', 'asdasdas', 'qweqweqw'),
('MR20200226003', 'Umum', '2020-04-26', 'PS000001', 'asdsadasd', 'adasdasda'),
('MR20200226004', 'Umum', '2020-02-26', 'PS000001', 'asdasdas', 'sadasdadsadas'),
('MR20200226006', 'Umum', '2020-02-26', 'PS000002', 'rtyryrt', 'yrtyrytry'),
('MR20200226007', 'Umum', '2020-01-26', 'PS000002', 'adsad', 'asdasd'),
('MR20200226008', 'Umum', '2020-03-26', 'PS000008', 'dasdasdas', 'adasdasdasd'),
('MR20200226009', 'Umum', '2020-04-26', 'PS000009', 'dasdasdas', 'adasdasdasd'),
('MR20200226010', 'Umum', '2020-05-26', 'PS000010', 'dasdasdas', 'adasdasdasd'),
('MR20200226011', 'Umum', '2020-06-26', 'PS000011', 'dasdasdas', 'adasdasdasd'),
('MR20200226012', 'Umum', '2020-06-26', 'PS000012', 'dasdasdas', 'adasdasdasd'),
('MR20200226013', 'Umum', '2020-06-26', 'PS000013', 'dasdasdas', 'adasdasdasd'),
('MR20200226014', 'Umum', '2020-06-26', 'PS000014', 'dasdasdas', 'adasdasdasd'),
('MR20200226015', 'Umum', '2020-06-26', 'PS000015', 'dasdasdas', 'adasdasdasd'),
('MR20200226016', 'Umum', '2020-06-26', 'PS000016', 'dasdasdas', 'adasdasdasd'),
('MR20200226017', 'Umum', '2020-06-26', 'PS000017', 'dasdasdas', 'adasdasdasd'),
('MR20200226018', 'Umum', '2020-06-26', 'PS000018', 'dasdasdas', 'adasdasdasd'),
('MR20200226019', 'Umum', '2020-04-26', 'PS000019', 'dasdasdas', 'adasdasdasd'),
('MR20200226020', 'Umum', '2020-04-26', 'PS000020', 'dasdasdas', 'adasdasdasd'),
('MR20200226021', 'Umum', '2020-04-26', 'PS000007', 'dasdasdas', 'adasdasdasd'),
('MR20200226022', 'Umum', '2020-04-26', 'PS000008', 'dasdasdas', 'adasdasdasd'),
('MR20200226023', 'Umum', '2020-04-26', 'PS000009', 'dasdasdas', 'adasdasdasd'),
('MR20200226024', 'Umum', '2020-05-26', 'PS000010', 'dasdasdas', 'adasdasdasd'),
('MR20200226025', 'Umum', '2020-05-26', 'PS000011', 'dasdasdas', 'adasdasdasd'),
('MR20200226026', 'Umum', '2020-05-26', 'PS000012', 'dasdasdas', 'adasdasdasd'),
('MR20200226027', 'Umum', '2020-05-26', 'PS000013', 'dasdasdas', 'adasdasdasd'),
('MR20200226028', 'Umum', '2020-05-26', 'PS000014', 'dasdasdas', 'adasdasdasd'),
('MR20200226029', 'Umum', '2020-05-26', 'PS000015', 'dasdasdas', 'adasdasdasd'),
('MR20200226030', 'Umum', '2020-05-26', 'PS000016', 'dasdasdas', 'adasdasdasd'),
('MR20200226031', 'Umum', '2020-04-26', 'PS000017', 'dasdasdas', 'adasdasdasd'),
('MR20200226032', 'Umum', '2020-04-26', 'PS000018', 'dasdasdas', 'adasdasdasd'),
('MR20200226033', 'Umum', '2020-04-26', 'PS000019', 'dasdasdas', 'adasdasdasd'),
('MR20200226034', 'Umum', '2020-04-26', 'PS000020', 'dasdasdas', 'adasdasdasd'),
('MR20200226035', 'Umum', '2020-04-26', 'PS000007', 'dasdasdas', 'adasdasdasd'),
('MR20200226036', 'Umum', '2020-04-26', 'PS000008', 'dasdasdas', 'adasdasdasd'),
('MR20200226037', 'Umum', '2020-04-26', 'PS000009', 'dasdasdas', 'adasdasdasd'),
('MR20200226038', 'Umum', '2020-04-26', 'PS000010', 'dasdasdas', 'adasdasdasd'),
('MR20200226039', 'Umum', '2020-03-26', 'PS000011', 'dasdasdas', 'adasdasdasd'),
('MR20200226040', 'Umum', '2020-03-26', 'PS000012', 'dasdasdas', 'adasdasdasd'),
('MR20200226041', 'Umum', '2020-03-26', 'PS000013', 'dasdasdas', 'adasdasdasd'),
('MR20200226042', 'Umum', '2020-03-26', 'PS000014', 'dasdasdas', 'adasdasdasd'),
('MR20200226043', 'Umum', '2020-01-26', 'PS000015', 'dasdasdas', 'adasdasdasd'),
('MR20200226044', 'Umum', '2020-03-26', 'PS000016', 'dasdasdas', 'adasdasdasd'),
('MR20200226045', 'Umum', '2020-01-26', 'PS000017', 'dasdasdas', 'adasdasdasd'),
('MR20200226046', 'Umum', '2020-01-26', 'PS000018', 'dasdasdas', 'adasdasdasd'),
('MR20200226047', 'Umum', '2020-03-26', 'PS000019', 'dasdasdas', 'adasdasdasd'),
('MR20200226048', 'Umum', '2020-02-26', 'PS000020', 'dasdasdas', 'adasdasdasd'),
('MR20200226049', 'Umum', '2020-02-26', 'PS000007', 'dasdasdas', 'adasdasdasd'),
('MR20200226050', 'Umum', '2020-02-26', 'PS000008', 'dasdasdas', 'adasdasdasd'),
('MR20200226051', 'Umum', '2020-02-26', 'PS000009', 'dasdasdas', 'adasdasdasd'),
('MR20200226052', 'Umum', '2020-02-26', 'PS000010', 'dasdasdas', 'adasdasdasd'),
('MR20200226053', 'Umum', '2020-01-26', 'PS000011', 'dasdasdas', 'adasdasdasd'),
('MR20200226054', 'Umum', '2020-01-26', 'PS000012', 'dasdasdas', 'adasdasdasd'),
('MR20200226055', 'Umum', '2020-01-26', 'PS000013', 'dasdasdas', 'adasdasdasd'),
('MR20200303056', 'Umum', '2020-03-03', 'PS000025', 'ghghgh', 'hghghghg'),
('MR20200303057', 'Umum', '2020-03-03', 'PS000025', 'asdasda', 'adasdasdas'),
('MR20200303058', 'Umum', '2020-03-03', 'PS000024', 'rtrtrt', 'rererer'),
('MR20200306059', 'Gigi', '2020-03-06', 'PS000024', 'asdasd', 'Cabut'),
('MR20200306060', 'Gigi', '2020-03-06', 'PS000023', 'asdasd', 'Scalling'),
('MR20200306061', 'Gigi', '2020-03-06', 'PS000020', 'asdadasd', 'Scalling'),
('MR20200306062', 'Gigi', '2020-03-06', 'PS000019', 'asdasdasdas', 'Cabut'),
('MR20200306063', 'Gigi', '2020-03-06', 'PS000011', 'adasdasdasd', 'Observasi'),
('MR20200306064', 'Gigi', '2020-03-06', 'PS000010', 'asdada', 'Cabut'),
('MR20200306065', 'Umum', '2020-03-06', 'PS000014', 'asdasdas', 'adasdas'),
('MR20200306066', 'Gigi', '2020-03-06', 'PS000019', 'asdasdas', 'Observasi'),
('MR20200306067', 'Gigi', '2020-03-06', 'PS000021', 'asdasdas', 'Tambal'),
('MR20200306068', 'Umum', '2020-03-06', 'PS000004', 'asdasd', 'adsasd'),
('MR20200306069', 'Gigi', '2020-03-06', 'PS000007', 'asdasda', 'Observasi'),
('MR20200306070', 'Gigi', '2020-03-06', 'PS000006', 'adasdas', 'Observasi'),
('MR20200306071', 'Gigi', '2020-03-06', 'PS000025', 'fgfgfg', 'Scalling'),
('MR20200310072', 'Umum', '2020-03-10', 'PS000022', 'asdasdas', 'fdfdfd'),
('MR20200310073', 'Umum', '2020-03-10', 'PS000022', 'asdasdas', 'fdfdfd'),
('MR20200310074', 'Umum', '2020-03-10', 'PS000020', 'asdsada', 'asdasd'),
('MR20200310075', 'Umum', '2020-03-10', 'PS000020', 'asdsada', 'asdasd'),
('MR20200330077', 'Umum', '2020-03-30', 'PS000025', 'jgjdhjghdjgd', 'asdadadas'),
('MR20200330078', 'Umum', '2020-03-30', 'PS000025', 'dfkgjdfkgj', 'kldskfls'),
('MR20200330079', 'Umum', '2020-03-30', 'PS000025', 'alskdlaskd', 'asd,asdmasdmas'),
('MR20200330081', 'Umum', '2020-03-30', 'PS000025', 'kfjlkdfjalfas', 'asmasdlkasda'),
('MR20200330082', 'Gigi', '2020-03-30', 'PS000025', 'fasfasafas', 'Cabut'),
('MR20200330083', 'Gigi', '2020-03-30', 'PS000025', 'asdasdasda', 'Cabut'),
('MR20200330084', 'Umum', '2020-03-30', 'PS000025', '121weqwadas', 'asdasd'),
('MR20200331085', 'Umum', '2020-03-31', 'PS000026', 'adsadasda', 'asdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(12) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`) VALUES
('P0001', 'Abses'),
('P0002', 'Acne Vulgaris'),
('P0003', 'Anemia'),
('P0004', 'Angular Chelitis'),
('P0005', 'Ankle Sprain'),
('P0006', 'Appendicitis '),
('P0007', 'Arthritis'),
('P0008', 'Asma Bronciale'),
('P0009', 'Bronchitis'),
('P0010', 'Candidiasis'),
('P0011', 'Caries Gigi'),
('P0012', 'Cephalgia'),
('P0013', 'Clavus'),
('P0014', 'Common Cold (CC)'),
('P0015', 'Demam Thypoid'),
('P0016', 'Dermatitis Alergi'),
('P0017', 'Dermatitis Kontak'),
('P0018', 'Dermatitis Venenata/Insect Bite'),
('P0019', 'Diabetes Mellitus Tipe 1'),
('P0020', 'Diabetes Mellitus Tipe 2'),
('P0021', 'Diare Akut'),
('P0022', 'Dizzines'),
('P0023', 'Dysmenorrhea'),
('P0024', 'Eksim '),
('P0025', 'Ekstraksi Kuku'),
('P0026', 'Faringitis '),
('P0027', 'Fatique'),
('P0028', 'Folikulitis '),
('P0029', 'Fraktur'),
('P0030', 'GEA'),
('P0031', 'GERD'),
('P0032', 'Gingivitis'),
('P0033', 'Gout Arthritis'),
('P0034', 'Gout Arthritis'),
('P0035', 'Gravidarum '),
('P0036', 'Hemorroid'),
('P0037', 'Herpes Simpleks'),
('P0038', 'Herpes Zoster'),
('P0039', 'Hiperkolesterolemia'),
('P0040', 'Hipertensi D 1'),
('P0041', 'Hipertensi D 2'),
('P0042', 'Hordeolum'),
('P0043', 'Impetigo'),
('P0044', 'Infeksi Saluran Kemih (ISK)'),
('P0045', 'Insisi Abses'),
('P0046', 'Insisi Clavus'),
('P0047', 'Insisi Veruka'),
('P0048', 'Ischialgia'),
('P0049', 'ISPA'),
('P0050', 'Keloid'),
('P0051', 'Kolik Abdomen'),
('P0052', 'Konjunctivitis '),
('P0053', 'Konstipasi'),
('P0054', 'Kontusio Jaringan'),
('P0055', 'Laringitis'),
('P0056', 'Limfadenopati'),
('P0057', 'Lipoma'),
('P0058', 'Low Back Pain (LBP)'),
('P0059', 'Menorrhagia '),
('P0060', 'Migrain'),
('P0061', 'Miliaria'),
('P0062', 'Miopia'),
('P0063', 'Muscle Sprain'),
('P0064', 'Myalgia'),
('P0065', 'Obs. Cough'),
('P0066', 'Obs. Febris'),
('P0067', 'Obs. Tinnitus'),
('P0068', 'Osteoartritis'),
('P0069', 'Otitis Eksterna'),
('P0070', 'Otitis Media Akut (OMA)'),
('P0071', 'Oxyuriasis'),
('P0072', 'Paronikia'),
('P0073', 'Pediculosis'),
('P0074', 'Post Insisi Abses'),
('P0075', 'Post Insisi Clavus'),
('P0076', 'Post Insisi Veruka'),
('P0077', 'Rhinitis Alergi'),
('P0078', 'Secondari Infeksi '),
('P0079', 'Sind. Dispepsia'),
('P0080', 'Sinusitis'),
('P0081', 'Skabies'),
('P0082', 'Spasme otot'),
('P0083', 'Stomatitis'),
('P0084', 'Strain'),
('P0085', 'Susp. Abses Mamae'),
('P0086', 'Susp. Thypoid'),
('P0087', 'Syncope'),
('P0088', 'Tinea Capitis'),
('P0089', 'Tinea Corporis '),
('P0090', 'Tinea Cruris'),
('P0091', 'Tinea Pedis'),
('P0092', 'Tinea Unguium'),
('P0093', 'Tinea Versicolor'),
('P0094', 'Tonsilitis  '),
('P0095', 'Tonsilitis Faringitis Akut (TFA)'),
('P0096', 'Trauma  '),
('P0097', 'Trauma Unguium'),
('P0098', 'Tuba Chatar'),
('P0099', 'Urtikaria '),
('P0100', 'Varicella '),
('P0101', 'Vertigo'),
('P0102', 'Veruka'),
('P0103', 'Vulnus Combustio (VC)'),
('P0104', 'Vulnus Ekskoriasi (VE)'),
('P0105', 'Vulnus Laceratum (VL)'),
('P0106', 'Vulnus Moksum (VM)'),
('P0107', 'Vulnus Punctum (VP)'),
('P0108', 'tesa'),
('P0109', 'tespo'),
('P0110', 'lklkl');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_mr` varchar(15) NOT NULL,
  `id_obat` varchar(12) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_mr`, `id_obat`, `jumlah`, `status`) VALUES
('MR20200222001', 'O0004', 10, 'Terima'),
('MR20200222001', 'O0005', 10, 'Terima'),
('MR20200222002', 'O0001', 30, 'Terima'),
('MR20200222002', 'O0002', 20, 'Terima'),
('MR20200226003', 'O0001', 12, 'Terima'),
('MR20200226003', 'O0011', 12, 'Terima'),
('MR20200226004', 'O0006', 12, 'Terima'),
('MR20200226004', 'O0004', 12, 'Terima'),
('MR20200226006', 'O0006', 12, 'Terima'),
('MR20200226006', 'O0007', 12, 'Terima'),
('MR20200303056', 'O0020', 12, 'Terima'),
('MR20200303056', 'O0023', 12, 'Terima'),
('MR20200303057', 'O0001', 12, 'Terima'),
('MR20200303057', 'O0004', 12, 'Terima'),
('MR20200303058', 'O0001', 12, 'Terima'),
('MR20200303058', 'O0014', 12, 'Terima'),
('MR20200306059', 'O0006', 12, 'Terima'),
('MR20200306060', 'O0022', 12, 'Terima'),
('MR20200306061', 'O0016', 12, 'Terima'),
('MR20200306062', 'O0004', 12, 'Terima'),
('MR20200306063', 'O0024', 12, 'Terima'),
('MR20200306064', 'O0067', 12, 'Terima'),
('MR20200306065', 'O0005', 12, 'Terima'),
('MR20200306067', 'O0018', 12, 'Terima'),
('MR20200306068', 'O0014', 12, 'Terima'),
('MR20200306069', 'O0040', 12, 'Terima'),
('MR20200306071', 'O0001', 12, 'Terima'),
('MR20200306071', 'O0007', 12, 'Terima'),
('MR20200310072', 'O0072', 12, 'Terima'),
('MR20200310074', 'O0010', 12, 'Terima'),
('MR20200330077', 'O0025', 12, 'Terima'),
('MR20200330078', 'O0019', 12, 'Terima'),
('MR20200330079', 'O0046', 12, 'Terima'),
('MR20200330081', 'O0020', 12, 'Terima'),
('MR20200330082', 'O0047', 12, 'Terima'),
('MR20200330083', 'O0001', 12, 'Terima'),
('MR20200330084', 'O0062', 12, 'Terima'),
('MR20200331085', 'O0001', 12, 'Terima');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat`
--

CREATE TABLE `transaksi_obat` (
  `id_transaksi` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `id_obat` varchar(12) NOT NULL,
  `id_pasien` varchar(12) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `keterangan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`id_transaksi`, `tanggal`, `id_obat`, `id_pasien`, `jumlah`, `keterangan`) VALUES
('20200312001', '2020-03-12', 'O0001', 'PS000025', 12, 'Tanpa Resep');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cek_penyakit`
--
ALTER TABLE `cek_penyakit`
  ADD KEY `cek_penyakit_ibfk_2` (`id_penyakit`),
  ADD KEY `id_mr` (`id_mr`);

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`id_mr`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD KEY `id_mr` (`id_mr`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cek_penyakit`
--
ALTER TABLE `cek_penyakit`
  ADD CONSTRAINT `cek_penyakit_ibfk_1` FOREIGN KEY (`id_mr`) REFERENCES `medical_record` (`id_mr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `data_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_mr`) REFERENCES `medical_record` (`id_mr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `transaksi_obat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `data_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
