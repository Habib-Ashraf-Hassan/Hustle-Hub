-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2024 at 08:41 PM
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
-- Database: `hustlehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `email`, `phone`, `password`) VALUES
(1, 'HustleHub-ADMIN', 'hustlehubjuja343@gmail.com', '0741674466', 'adminhustle11');

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `approvalid` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `profession` varchar(150) NOT NULL DEFAULT 'Plumber',
  `cvlink` varchar(400) NOT NULL DEFAULT 'no link',
  `nationalid` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '12345',
  `status` varchar(100) NOT NULL DEFAULT 'not approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`approvalid`, `fullname`, `username`, `email`, `phone`, `gender`, `profession`, `cvlink`, `nationalid`, `password`, `status`) VALUES
(1, 'Bob David', 'bobby232', 'boby211@gmail.com', '0722674466', 'Male', 'Electrician', 'https://github.com', '78098675', 'bobby211', 'Approved'),
(2, 'Kenedy Willy', 'kenwill', 'will.ken@gmail.com', '0727686544', 'Female', 'Mover', 'https://github.com', '29921777', 'kenwill11', 'Denied'),
(3, 'Kenedy Willy', 'kenwill', 'will.ken@gmail.com', '0727686544', 'Female', 'Mover', 'https://github.com', '29921777', 'kenwill11', 'Denied'),
(4, 'Kenedy Willy', 'kenwill', 'will.ken@gmail.com', '0727686544', 'Female', 'Mover', 'https://github.com', '29921777', 'nhhyyu', 'Denied'),
(5, 'hdjdjd', 'sjsjdkd', 'boby211@gmail.com', '0722674466', 'Male', 'Carpenter', 'https://drive.google.com/file/d/1LCkmYyNu5pfwJp-H-pcGNYMPX7hM4oA8/view?usp=drive_link', '29921777', 'bobby211', 'Denied'),
(6, 'Ali baba', 'babAli', 'babali@gmail.com', '0740674466', 'Male', 'Mover', 'https://drive.google.com/file/d/1LCkmYyNu5pfwJp-H-pcGNYMPX7hM4oA8/view?usp=drive_link', '29921777', 'bab11', 'Approved'),
(7, 'Rashid Kuku', 'kukiiiR', 'rashidabdallah@gmail.com', '0112334455', 'Male', 'Plumber', 'https://drive.google.com/file/d/1LCkmYyNu5pfwJp-H-pcGNYMPX7hM4oA8/view?usp=drive_link', '29921777', 'R009', 'Denied'),
(8, 'Abdulrazzak Ali', 'habibali', 'abdiali@gmail.com', '0740674466', 'Male', 'Carpenter', 'https://drive.google.com/file/d/1LCkmYyNu5pfwJp-H-pcGNYMPX7hM4oA8/view?usp=drive_link', '29921777', 'abdi11', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientid` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientid`, `fullname`, `username`, `email`, `phone`, `gender`, `password`, `cpassword`) VALUES
(1, 'Ali Adan Yusin', 'adanali', 'yusin888@gmail.com', '0723456743', 'Male', '12345', '12345'),
(4, 'Esther Ngungi', 'amesther_002', 'esther.fav@gmail.com', '0711322900', 'Female', 'esther@11', 'esther@11'),
(5, 'Ivy Muthoni', 'muthoniivy', 'ivy303muthoni@gmail.com', '0744235675', 'Female', '90911', '90911'),
(6, 'Sam Wekesa Ozil', 'samwel11', 'sam.ozilwekesa@gmail.com', '0722909001', 'Male', 'sam11', 'sam11'),
(7, 'Hussein Hassan', 'hassanhu', 'hassan@outlook.com', '0727686544', 'Male', 'hus233', 'hus233'),
(8, 'David Ochieng', 'davido22', 'davidjr@gmail.com', '0711899099', 'Male', 'dav22', 'dav22');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackid` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `usertype` varchar(100) NOT NULL DEFAULT 'Client',
  `contact` varchar(100) NOT NULL,
  `message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedbackid`, `fullname`, `usertype`, `contact`, `message`) VALUES
(6, 'Hussein Hassan', 'Client', 'hassan@outlook.com', 'Good easy to use, but can Mpesa intergration be added?'),
(8, 'Ali baba', 'Technician', 'babali@gmail.com', 'i like approval part'),
(9, 'John Smith Rowe', 'Technician', 'smith.john40@gmail.com', 'I like how i could modify my availability status'),
(10, 'John Smith Rowe', 'Technician', 'smith.john40@gmail.com', 'Like how its easy to manage my completed and incomplete jobs'),
(13, 'Abdirahman Green', 'Technician', 'abdirakhman.carp@outlook.com', 'happy to be here');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `clientname` varchar(200) NOT NULL,
  `clientcontact` varchar(100) NOT NULL,
  `clientlocation` varchar(400) NOT NULL,
  `jobdesc` varchar(400) NOT NULL,
  `technicianid` int(11) NOT NULL,
  `technicianname` varchar(200) NOT NULL,
  `techniciancontact` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Not complete',
  `techprofession` varchar(200) NOT NULL,
  `reviews` varchar(400) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `clientid`, `clientname`, `clientcontact`, `clientlocation`, `jobdesc`, `technicianid`, `technicianname`, `techniciancontact`, `status`, `techprofession`, `reviews`) VALUES
(1, 1, 'Ali Adan Yunus', '0723456743', 'At gate C near seasons restaurant', 'Kindly need you to come fix the lock of my cupboard', 4, 'John Smith', '0725676544', 'Completed', 'Carpenter', 'I appreciate your services thanks'),
(2, 1, 'Ali Adan Yunus', '0723456743', 'At gate C near containers ', 'My door knob got destroyed it needs fixing', 5, 'Sarah Johnson', '0735767211', 'Not complete', 'Carpenter', 'I waited for many hours and you did not show up'),
(3, 1, 'Ali Adan Yunus', '0723456743', 'I lived at gate C near containers', 'I wish to shift to Gate A near green savanah;bedsitter 2nd floor', 22, 'Kevin Irungu', '0721090887', 'Not complete', 'Mover', 'Uko na mchezo wewe'),
(4, 5, 'Ivy Muthono', '0744235675', 'Living at Gashororo at Gate B', 'Got clothes in 3 big bags which includes a duvet', 18, 'Zeinab Memusa', '0734566090', 'Completed', 'Laundry', 'none'),
(5, 5, 'Ivy Muthono', '0744235675', 'At Gate B in Gashoror near KCB bank juja', 'I need one to fix my broken chair', 4, 'John Smith', '0725676544', 'Completed', 'Carpenter', 'none'),
(6, 4, 'Esther Ngungi', '0711322900', 'At K road near eco supermarket', 'Need fixing of my desk, it broken from below', 2, 'Abdirahman Green', '0720344909', 'Completed', 'Carpenter', 'thanks i appreciate how fast you were to respond, thanks'),
(7, 6, 'Sam Wekesa Ozil', '0722909001', 'At gate D near KCB bank Juja', 'Flush of toilet not working, i think its blocked', 1, 'Eric Kazungu', '0734567333', 'Completed', 'Plumber', 'Appreciate how negotiable you were'),
(8, 7, 'Hussein Hassan', '0727686544', 'Am at gate A JKUAT near maple fries next to green savanah hotel', 'i have a bulb which i do not know how to fix back', 15, 'Samwell Bett', '0741879988', 'Completed', 'Electrician', 'happy that you could notice they were other issues related and didnt overcharge me'),
(9, 1, 'Ali Adan Yusin', '0723456743', 'am at Gate C', 'Clothes to be washed including two leather jackets', 18, 'Zeinab Memusa', '0734566090', 'Completed', 'Laundry', 'Thanks for your service'),
(10, 1, 'Ali Adan Yusin', '0723456743', 'currently at gate C', 'I need to shift from gate C to gate D one bedroom', 28, 'Ali baba', '0740674466', 'Completed', 'Mover', 'i need you to hurry up please'),
(11, 4, 'Esther Ngungi', '0711322900', 'Am at Kiro road near Cooperative bank opposite Eco supermarket', 'I have a tap that blocked, tap in a sink...', 29, 'Vincent Karanja', '0725686544', 'Completed', 'Plumber', 'please hurry'),
(12, 8, 'David Ochieng', '0711899099', 'Gate D near KCB bank juja', 'My cupboard lock is not opening with my keys', 4, 'John Smith Rowe', '0725686544', 'Completed', 'Carpenter', 'You were very fast in arriving, thanks, it solved my issue'),
(13, 8, 'David Ochieng', '0711899099', 'At Gate D building named Springveille', 'Flush of my toilet aint flushing', 7, 'Yunus Abdi', '0723775677', 'Not complete', 'Plumber', 'Bro its been 2 days na hata hukufika!!'),
(14, 1, 'Ali Adan Yusin', '0723456743', 'At gate C near seasons', 'I have clothes to be washed including a duvet', 16, 'Rashid Abdalla', '0733567221', 'Completed', 'Laundry', 'none'),
(15, 5, 'Ivy Muthono', '0744235675', 'Am currently at Gate B in gashororo', 'Wish to shift from Gate B where am at to Gate C seasons restaurant', 21, 'Isaan Kariithi', '0745676322', 'Completed', 'Mover', 'Kindly do not use mkokoteni, ive lots of items'),
(16, 1, 'Ali Adan Yusin', '0723456743', 'At Gate C near Kutana game station', 'Got clothes 2 bags including 2 carpets', 17, 'Grace Debra', '0721349667', 'Not complete', 'Laundry', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `technicianid` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `nationalid` varchar(10) NOT NULL,
  `CV` varchar(100) NOT NULL DEFAULT 'Not uploaded',
  `profession` varchar(100) NOT NULL,
  `jobdescription` varchar(1000) DEFAULT 'Not added yet...',
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ratings` decimal(10,3) DEFAULT 4.000,
  `image_location` varchar(1500) DEFAULT '../images/usr_service-removebg-preview.png',
  `availability` varchar(100) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`technicianid`, `fullname`, `username`, `email`, `phone`, `nationalid`, `CV`, `profession`, `jobdescription`, `password`, `gender`, `ratings`, `image_location`, `availability`) VALUES
(1, 'Eric Kazungu', 'kazungu233', 'eric.kahindi233@gmail.com', '0734567333', '32217109', 'uploaded', 'Plumber', 'Your plumbing problems solved. From installations and repairs to maintenance and troubleshooting, I\'m your one-stop shop for all your plumbing and water needs.', 'eric233', 'Male', 3.550, '../Plumbers/Plumbers/plumber1.png', 'Available'),
(2, 'Abdirahman Green', 'greenabdi11', 'abdirakhman.carp@outlook.com', '0720344909', '11225567', 'uploaded', 'Carpenter', 'Your dedicated carpentry ready to transform your ideas into masterful craftsmen, with over 5 years of hands-on experience in carpentry..', 'green09', 'Male', 4.250, '../images/dude_carpenter.png', 'Available'),
(3, 'John Doe', 'doe_does_supa11', 'john.doe.james@gmail.com', '0745676565', '20211200', 'uploaded', 'Carpenter', 'Experienced carpenter specializing in custom furniture and woodworking projects.with over 6 years of hands-on experience in carpentry', 'does112', 'Male', 3.900, '../images/bro_carpenter.png', 'Available'),
(4, 'John Smith Rowe', 'smithjohn', 'smith.john40@gmail.com', '0725686544', '39900212', 'uploaded', 'Carpenter', 'Skilled carpenter with attention to detail and a passion  for delivering high-quality work with over 5 years of hands-on experience in carpentry..', 'smith211', 'Male', 4.750, '../images/carpenter_stand.png', 'Available'),
(5, 'Sarah Johnson', 'amsarah', 'johnson.sarah.john@gmail.com', '0735767211', '11225532', 'uploaded', 'Carpenter', 'Creative carpenter known for innovative designs and flawless execution.with over 3 years of hands-on experience in carpentry', 'sara11', 'Female', 3.600, '../images/female_carpenter-.png', 'Available'),
(6, 'Micheal Brown', 'brown#11', 'micheal233brown@gmail.com', '0109897654', '21134767', 'uploaded', 'Carpenter', 'Reliable carpenter offering personalized services tailored to your needs.with over 5 years of hands-on experience in carpentry', 'brown211', 'Male', 4.300, '../images/mechanic-with-thumb-up-removebg-preview.png', 'Available'),
(7, 'Yunus Abdi', 'abdiyu55', 'yunus.abdi.abduba@gmail.com', '0723775677', '30311222', 'uploaded', 'Plumber', 'Leaking faucet? Clogged drain? No problem! I\'m your friendly neighborhood plumber, ready to tackle any residential or commercial plumbing issue, big or small.', 'abdi55', 'Male', 3.550, '../Plumbers/Plumbers/plumber2.png', 'Available'),
(8, 'Harry Wilson', 'harry_man', 'harrywilly@gmail.com', '0711899001', '21199023', 'uploaded', 'Plumber', 'Don\'t let plumbing problems disrupt your day. I\'m a licensed and insured plumber with years of experience, providing honest and transparent service.', 'harryW11', 'Male', 4.000, '../Plumbers/Plumbers/plumber3.png', 'Available'),
(10, 'Leila Hassan', 'leila33', 'leila.hassan@outlook.com', '0732565322', '11290911', 'uploaded', 'Plumber', 'Your one-stop shop for all things plumbing. We specialize in repairs, replacements, installations, and maintenance for kitchens, bathrooms, and everything in between.', 'leila33', 'Female', 4.400, '../Plumbers/Plumbers/plumber_female_better.png', 'Available'),
(11, 'Ali Mwanzi', 'mwanzi', 'mwanzi.ali.mkuu@gmail.com', '073345521', '1126677', 'uploaded', 'Electrician', 'Looking for a trustworthy electrician? I provide top-quality electrical services for residential and commercial clients, with transparent pricing and clear communication.', 'mwanzi88', 'Male', 4.200, '../Electricians/Electricians/electrician1.png', 'Available'),
(12, 'Ghulam Bhaga', 'bhaga_elect', 'bhaga.mithwani@gmail.com', '0734567110', '22335678', 'uploaded', 'Electrician', 'Your electrical problems solved. From installations and repairs to maintenance and troubleshooting, I\'m your one-stop shop for all your electrical needs.', 'bhagaM1', 'Male', 3.900, '../Electricians/Electricians/electrician2.png', 'Available'),
(13, 'Patrick Waruru', 'waruru34', 'patrick.patrick@yahoo.com', '0711345676', '33445678', 'uploaded', 'Electrician', 'Let me brighten your day (and your home)! I offer a wide range of electrical services, from lighting installations to panel upgrades, all at competitive rates.', 'war.patrick', 'Male', 4.000, '../Electricians/Electricians/electrician3.png', 'Available'),
(14, 'Ivy Mucera', 'muceraI34', 'ivy.formal@gmail.com', '0723455667', '22770901', 'uploaded', 'Electrician', 'Master Electrician: Safe, Reliable, and Efficient. I ensure your home or business has reliable and up-to-code electrical systems, with a focus on safety and efficiency.', 'ivy356', 'Female', 4.000, '../Electricians/Electricians/electrician_female.png', 'Available'),
(15, 'Samwell Bett', 'bett.betikabro', 'sam.samwell@yahoo.com', '0741879988', '33771101', 'uploaded', 'Electrician', 'Reliable Electrician offering personalized services tailored to your needs.I\'m  your one-stop shop for all your electrical needs.', 'sam_bet_676', 'Male', 3.950, '../Electricians/electrician.png', 'Available'),
(16, 'Rashid Abdalla', 'abd_rash22', 'rashid_rash33@gmail.com', '0733567221', '31178090', 'uploaded', 'Laundry', 'Don\'t let laundry pile up! I offer professional laundry services, including washing, drying, folding, and ironing. Free pick-up and delivery available.', 'rash33', 'Male', 4.300, '../Laundry/Laundry/laundry1.png', 'Available'),
(17, 'Grace Debra', 'debraG', 'grace.D@yahoo.com', '0721349667', '21100189', 'uploaded', 'Laundry', 'Freshen up your wardrobe. I provide high-quality laundry services with care, ensuring your clothes look and feel their best.From washing light clothes to even heavy clothes all at an negotiable price', 'D_grace', 'Female', 4.150, '../Laundry/Laundry/laundry_female.png', 'Available'),
(18, 'Zeinab Memusa', 'musa_zena', 'zeinab.memusa@students.jkuat.ac.ke', '0734566090', '23390911', 'uploaded', 'Laundry', 'Say goodbye to laundry day. I\'m your convenient and affordable solution for all your laundry needs, from delicates to bulky items.Bringing back your clothes similar to new clothes right from the shop.', 'zena45', 'Female', 4.130, '../Laundry/Laundry/laundry_female_better.png', 'Available'),
(19, 'Yusin Adan Ali', 'adanali_yusin', 'yunus88.netflixaddict@gmail.com', '0798566773', '31109001', 'uploaded', 'Laundry', 'Eco-friendly laundry solutions. I use eco-friendly detergents and practices to ensure your laundry is clean and the environment is protected.With your clothes delivered on time', 'yu_netflix', 'Male', 4.000, '../Laundry/Laundry/laundry2.png', 'Available'),
(20, 'Mwangi Bhajia', 'bhajia66', 'mwangi.kazi@gmail.com', '0711345543', '11336789', 'uploaded', 'Mover', 'Stress-free moving, guaranteed. We take the hassle out of moving, providing professional, efficient, and reliable service.Taking full responsibility and accountability incase of anything', 'bhaj_mwangi', 'Male', 4.400, '../Movers/Movers/mover1.png', 'Available'),
(21, 'Isaan Kariithi', 'kariithi909', 'kariithi.nyoor0@gmail.com', '0745676322', '23345091', 'uploaded', 'Mover', 'Moving made easy. From packing and loading to transport and unloading, we handle everything with care and expertise.With specialized designers who would help you arrange your newly shifted items in a design you would love.', 'kairiithi.jayden', 'Male', 4.620, '../Movers/Movers/mover2.png', 'Available'),
(22, 'Kevin Irungu', 'irungu_mungai', 'irungu.kevin@yahoo.com', '0721090887', '21109088', 'uploaded', 'Mover', 'Your trusted moving partner. We\'re experienced and insured movers who prioritize your satisfaction and ensure your belongings arrive safely.', 'irungu_mungai33', 'Male', 3.280, '../Movers/Movers/mover3.png', 'Available'),
(29, 'Vincent Karanja', 'viK434', 'vincent.allan@gmail.com', '0725686544', '32211767', 'https://drive.google.com/file/d/1LCkmYyNu5pfwJp-H-pcGNYMPX7hM4oA8/view?usp=drive_link', 'Plumber', 'Any plumbing needs will be catered for , na hii ni Kenya, ku bargain sio shida therefore dont hesitate to book/call...', 'vik11', 'Male', 4.250, '../images/usr_service-removebg-preview.png', 'Not Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`approvalid`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`technicianid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approvalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `technicianid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
