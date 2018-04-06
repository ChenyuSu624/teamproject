-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2018 at 09:38 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`catID`, `catName`) VALUES
(1, 'scifi'),
(2, 'sports'),
(3, 'Action'),
(4, 'comedy');

-- --------------------------------------------------------

--
-- Table structure for table `movie_format`
--

CREATE TABLE `movie_format` (
  `formatId` int(10) NOT NULL,
  `formatName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_format`
--

INSERT INTO `movie_format` (`formatId`, `formatName`) VALUES
(1, 'bluray'),
(2, 'dvd');

-- --------------------------------------------------------

--
-- Table structure for table `movie_products`
--

CREATE TABLE `movie_products` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `Format` varchar(100) NOT NULL,
  `Rating` varchar(15) NOT NULL,
  `img` varchar(150) NOT NULL,
  `catId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_products`
--

INSERT INTO `movie_products` (`Id`, `name`, `Description`, `price`, `category`, `Format`, `Rating`, `img`, `catId`) VALUES
(1, 'Star Wars: The Last Jedi', 'Rian Johnson (Looper, Brick) wrote and directed this installment of the Star Wars saga, which picks up where The Force Awakens left off. Rey (Daisy Ridley) learns the ways of the Force from Luke Skywalker (Mark Hamill), and develops a telepathic bond with Kylo Ren (Adam Driver), who is struggling to master the Dark Side. Meanwhile, Stormtrooper-turned-Resistance fighter Finn (John Boyega) teams up with pilot Poe Dameron (Oscar Isaac) and maintenance worker Rose Tico (Kelly Marie Tran) for a risky mission behind enemy lines. Carrie Fisher, Domhnall Gleeson, Benicio Del Toro, Gwendoline Christie, and Laura Dern co-star. ~ Jack Rodgers, Rovi', '22.99', 'scifi', 'bluray', 'PG-13', '1.jpg', 1),
(2, 'Blade Runner 2049', 'This sequel to Ridley Scott\'s landmark 1982 science-fiction film picks up the story 30 years later, giving viewers another detailed look at a future in which humanity live in polluted, overcrowded cities and rely on androids known as \"replicants\" for slave labor. In 2049 Los Angeles, K (Ryan Gosling) works as a \"blade runner,\" a specialized law-enforcement agent dedicated to tracking down and killing rogue replicants. But when he uncovers a shocking conspiracy involving the robot laborers, he searches for the one person who might have answers: a former blade runner named Rick Deckard (Harrison Ford), who vanished decades earlier. Directed by Denis Villeneuve (Arrival, Sicario). Ana de Armas, Sylvia Hoeks, Robin Wright, Mackenzie Davis, Dave Bautista, and Jared Leto co-star. ~ Jack Rodgers, Rovi', '19.99', 'scifi', 'bluray', 'R', '2.jpg', 1),
(3, 'The Martian [Extended Edition]', 'After an exploratory mission goes awry, lone astronaut Mark Watney (Matt Damon) is left for dead on the hostile surface of Mars and must use his scientific ingenuity to homestead an enclosed habitat where he can survive. Meanwhile, the astronauts he left behind realize the severity of his plight and join forces with an international coalition of scientists to launch a rescue mission in defiance of NASA protocol. ~ Violet LeVoit, Rovi', '19.99', 'scifi', 'bluray', 'PG-13', '3.jpg', 1),
(4, 'Back to the Future: 30th Anniversary Trilogy', 'High schooler Marty McFly (Michael J. Fox) doesn\'t have the most pleasant of lives. Browbeaten by his principal at school, Marty must also endure the acrimonious relationship between his nerdy father (Crispin Glover) and his lovely mother (Lea Thompson), who in turn suffer the bullying of middle-aged jerk Biff (Thomas F. Wilson), Marty\'s dad\'s supervisor.', '34.99', 'scifi', 'bluray', 'PG', '4.jpg', 1),
(5, 'Guardians of the Galaxy Vol. 2', 'While on the run following a botched heist, the Guardians of the Galaxy encounter a mysterious being known as Ego (Kurt Russell), who claims to be the long-lost father of team leader Peter Quill (Chris Pratt). As Quill learns more about his past, the Guardians battle foes old and new. James Gunn returns to write and direct this installment of the Marvel Cinematic Universe, which also stars Zoe Saldana, Dave Bautista, and Karen Gillan, and features the voices of Bradley Cooper and Vin Diesel. ~ Jack Rodgers, Rovi', '29.99', 'scifi', 'bluray', 'PG-13', '5.jpg', 1),
(6, 'Interstellar', 'Interstellar opens on Earth in the distant future, as Mother Nature is waging war on humanity. Famine is widespread, and all of mankind\'s resources are now dedicated to farming in a desperate fight for survival. A former NASA pilot and engineer named Cooper (Matthew McConaughey) has become a homesteader in order to support his teenage son Tom (Timothee Chalamet) and 10-year-old daughter Murph (Mackenzie Foy). Unfortunately, even that begins to look like a futile endeavor after a sandstorm ravages their close-knit community.', '11.99', 'scifi', 'bluray', 'PG-13', '6.jpg', 1),
(7, 'X-Men: Apocalypse', 'The X-Men are forced to confront an ancient mutant called Apocalypse (Oscar Isaac) in this comic-book adventure set in the 1980s. Eager to take over the world and remake it in his own image, Apocalypse recruits mutants to act as his powerful \"Four Horsemen\" -- among them is the tortured Magneto (Michael Fassbender), who believes humanity might be a lost cause after a personal tragedy. In time, Charles Xavier (James McAvoy) and his charges must work together to save the planet from this threat. New additions to this X-Men team include the elusive Nightcrawler (Kodi Smit-McPhee), fiery Cyclops (Tye Sheridan), and telepathically gifted Jean Grey (Sophie Turner). Rose Byrne, Jennifer Lawrence, and Olivia Munn co-star. ~ Jack Rodgers, Rovi\r\n', '9.99', 'scifi', 'bluray', 'PG-13', '7.jpg', 1),
(8, 'Arrival', 'Denis Villeneuve directed this science-fiction suspense film about Earth\'s response to a possible alien invasion. After extraterrestrial spacecraft plant themselves at various locations around the globe, a linguist (Amy Adams) and a theoretical physicist (Jeremy Renner) must find a way to communicate with the mysterious visitors in order to learn what they want and whether they pose a threat to humanity. Forest Whitaker and Michael Stuhlbarg co-star. ~ Violet LeVoit, Rovi', '12.99', 'scifi', 'bluray', 'PG-13', '8.jpg', 1),
(9, 'NFL: Super Bowl 50', 'Relive the excitement and pageantry from Super Bowl 50, played at Levi\'s Stadium in Santa Clara, California, on February 7, 2016. Behind-the-scenes action from the Denver Broncos\' 24-10 victory of the NFC champion Carolina Panthers is included, as well as footage from the star-studded halftime show that included headling act Coldplay, as well as returning Super Bowl entertainers Beyonce and Bruno Mars, as well as recording artist and disc jockey Mark Ronson. ~ Tom Ciampoli', '22.99', 'sports', 'bluray', 'NR', '9.jpg', 2),
(10, 'Michael Jordan to the Max', 'Michael Jordan was the most famous, most honored, and probably the greatest professional basketball player of his generation, an athlete whose intelligence, charisma, and dazzling on-court skill helped earn his game a new level of popularity and won Jordan a record six NBA title rings. Michael Jordan to the Max, shot and initially released in the high-definition IMAX film format, takes a documentary look at Jordan\'s life and career, focusing primarily on the 1999 NBA playoffs, in which Jordan and the Chicago Bulls achieved their sixth professional championship under his leadership, shortly before announcing his final retirement from the court. Along the way, we\'re offered glimpses of Jordan\'s early days growing up in North Carolina, his rise to fame, and his successful off-court careers in business and advertising. Michael Jordan to the Max was financed in part by mvp.com, an internet company which Jordan helped to found. ~ Mark Deming, Rovi', '7.99', 'sports', 'bluray', 'G', '10.jpg', 2),
(11, 'The Eagle Huntress', 'A 13-year-old Mongolian girl named Aisholpan Nurgaiv strives to become the first female in her culture to learn to hunt alongside a trained eagle. As she prepares for an annual eagle-hunting competition, she must also deal with the disapproval of several tribal elders. Directed by Otto Bell. ~ Jack Rodgers, Rovi', '19.99', 'sports', 'bluray', 'G', '11.jpg', 2),
(12, 'NFL: Baltimore Ravens - Road to XLVII', 'This documentary revisits the Baltimore Ravens squad that won Super Bowl XLVII thanks in part to the emotional rallying the team did around their legendary linebacker Ray Lewis who announced at the beginning of the playoffs that this would be his last year in professional football. ~ Perry Seibert, Rovi', '17.99', 'sports', 'bluray', 'NR', '12.jpg', 2),
(13, 'WWE: Wrestlemania XXXI', 'Relive all of the wild WWE action from WrestleMania 31, the annual event which took place at Levi\'s Stadium on March 29, 2015. All nine matches of the night are featured in this collectors set, including the World Heavyweight Championship bout which was won for the first time by Seth Rollins when he defeated Roman Reigns and Brock Lesnar. ~ Daniel Gelb, Rovi\r\n', '19.99', 'sports', 'bluray', 'NR', '13.jpg', 2),
(14, 'WWE: Royal Rumble 2017', 'Royal Rumble Kick Off Show - Becky Lynch, Nikki Bella, & Naomi vs. Alexa Bliss, Mickie James, & Natalya', '14.99', 'sports', 'bluray', 'NR', '14.jpg', 2),
(15, 'Nowitzki: The Perfect Shot', 'A documentary look at the career of German-born NBA player Dirk Nowitzki, highlighting his transition to America, his early professional struggles and his eventual rise to the top of the basketball world as a championship-winning superstar. ~ Daniel Gelb, Rovi', '12.99', 'sports', 'bluray', 'NR', '15.jpg', 2),
(16, 'Run for Your Life', 'Fischl Leibowitz was born in Romania in 1932, and at the age of 14, as the Soviet Union was poised to take over his homeland, Leibowitz and his older brother fled the country, eventually settling in New York City. Leibowitz Americanized his name to Fred Lebow and took up a career in the garment trade. Lebow was also an avid jogger, if not especially speedy or skilled, and he began making himself known among New York\'s runners. ', '9.99', 'sports', 'bluray', 'NR', '16.jpg', 2),
(17, 'Spider-Man: Homecoming', 'Spider-Man (Tom Holland) learns the ropes of being a superhero under the tutelage of Tony Stark (Robert Downey Jr.), all while juggling his responsibilities as high schooler Peter Parker. Eager to prove to Stark that he\'s ready to join the Avengers, Parker soon gets tangled up with a sinister new villain known as the Vulture (Michael Keaton). Zendaya, Donald Glover, and Marisa Tomei co-star. Directed by Jon Watts (Cop Car). ~ Jack Rodgers, Rovi', '14.99', 'action', 'dvd', 'PG-13', '17.jpg', 3),
(18, 'Kingsman: The Golden Circle', 'Eggsy (Taron Egerton) and Roxy (Sophie Cookson) return to action with the rest of Kingsmen when their headquarters is destroyed by a villainous corporation known as the Golden Circle. Faced with the challenge of defeating a formidable opponent with no home base, the Kingsmen discover an allied organization of spies called Statesman, whose cooperation reaches back to the founding of their own agency. The two groups must join forces to save the world in this sequel directed by Matthew Vaughn. ~ Joshua Kochis, Rovi', '14.99', 'action', 'dvd', 'R ', '18.jpg', 3),
(19, 'Batman: Gotham by Gaslight', 'Set in the Victorian era, this animated remake of the graphic novel, Batman: Gotham by Gaslight pits the Dark Knight detective against the elusive serial killer, Jack the Ripper. Directed by Sam Liu and featuring the voices of Bruce Greenwood and Jennifer Carpenter as Bruce Wayne and Selina Kyle respectively., Rovi', '14.99', 'action', 'dvd', 'R', '19.jpg', 3),
(20, 'Marvel\'s Doctor Strange', 'After a car accident leaves him with nerve damage that ends his career as a New York neurosurgeon, Stephen Strange (Benedict Cumberbatch) travels to Kathmandu in the hope of finding an otherworldly cure for his injuries. There, a powerful mystic known as the Ancient One (Tilda Swinton) accepts him as her pupil and trains him in the art of sorcery. Eventually, Strange must use his new powers to stop a rival (Mads Mikkelsen) from causing chaos by accessing the Dark Dimension. Rachel McAdams, Chiwetel Ejiofor, and Benedict Wong co-star in this entry in the Marvel Cinematic Universe. Directed by Scott Derrickson (Sinister). ~ Jack Rodgers, Rovi', '22.99', 'action', 'dvd', 'PG-13', '20.jpg', 3),
(21, 'The Fast and the Furious', 'A magazine article about real-life car racing gangs for Vibe becomes this fast-paced automotive thriller from director Rob Cohen. Paul Walker stars as Brian O\'Conner, a youthful FBI agent investigating a series of hijackings by going undercover with a street gang led by charismatic Dominic Toretto (Vin Diesel). Caught up in Toretto\'s world of gang conflict that is resolved in late-night car races, Spindler starts to sympathize with his chief suspect and falls in love with Toretto\'s younger sister Mia (Jordana Brewster). In the meantime, Spindler initially suspects the wrong gang of complicity in the crimes he\'s probing, while Toretto remains involved in a forbidden romance, à la Romeo and Juliet, with his girlfriend Letty (Michelle Rodriguez). The Fast and the Furious co-stars Ted Levine, Rick Yune, and Matt Schulze. ~ Karl Williams, Rovi', '7.99', 'action', 'dvd', 'PG-13', '21.jpg', 3),
(22, 'Speed', 'If you don\'t think Speed is the fastest-moving adventure film ever made, we challenge you to find a faster one. Keanu Reeves stars as an LA Bomb Squad specialist whose principal antagonist is elusive bomber-extortionist Dennis Hopper. Seeking vengeance after his latest ransom scheme is thwarted, Hopper presents a personal challenge to Reeves: A wired-for-destruction city bus, which will detonate if the speedometer drops below 50 MPH. Playing the reluctant civilian who is pressed into service as the bus\' \"substitute driver,\" leading lady Sandra Bullock became a major star in her own right. Once Speed gets to the meat of its story, the excitement never lets up--not even after the boobytrapped bus is out of the picture. ~ Hal Erickson, Rovi', '7.99', 'action', 'dvd', 'R', '22.jpg', 3),
(23, 'Dunkirk', 'Acclaimed auteur Christopher Nolan (Memento, The Prestige, The Dark Knight) wrote and directed this historical thriller about the Dunkirk evacuation during the early days of World War II. When 400,000 British and Allied troops end up trapped on the beaches of Dunkirk, France, following a catastrophic defeat, a number of civilian boats set out to rescue them before they are decimated by the approaching Nazi forces. Fionn Whitehead, Tom Glynn-Carney, Jack Lowden, Harry Styles, Aneurin Barnard, James D\'Arcy, Barry Keoghan, Kenneth Branagh, Cillian Murphy, Mark Rylance, and Tom Hardy star. ~ Jack Rodgers, Rovi', '24.99', 'action', 'dvd', 'PG-13', '23.jpg', 3),
(24, '21 Jump Street', 'The television series that shot Johnny Depp to stardom makes the leap to the big screen in this reboot starring Jonah Hill and Channing Tatum. Schmidt (Hill) and Jenko (Tatum) have the kind of faces that could let them pass for teenagers. Eager to prove themselves as effective policemen, the pair join the Jump Street program and go undercover to investigate a high-school drug ring. Now, the only thing more daunting than the prospect of taking on violent adolescent dope slingers is the possibility of experiencing the torture of their teenage years all over again. Ice Cube, Brie Larson, and Rob Riggle co-star. ~ Jason Buchanan, Rovi\r\n', '3.99', 'action', 'dvd', 'R ', '24.jpg', 3),
(25, 'Ferdinand', 'A gentle bull named Ferdinand (voice of John Cena) lives a happy life as the pet of a loving family in Spain, and prefers smelling flowers to fighting. When he is captured and forced to participate in bullfights, he plots to escape and return home with the help of a group of animal friends. Kate McKinnon, Anthony Anderson, Bobby Cannavale, Peyton Manning, Gina Rodriguez, and Gabriel Iglesias also lend their voices to this animated comedy, which was directed by Carlos Saldanha (Rio). ~ Jack Rodgers, Rovi', '19.99', 'comedy', 'dvd', 'PG', '25.jpg', 4),
(26, 'Night at the Museum: Secret of the Tomb', 'Ben Stiller and director Shawn Levy return for more after-hours mayhem in this third outing of the successful Night at the Museum series. When the magic that brings the exhibits to life begins to fade, Larry (Ben Stiller) rallies his historical friends for a trip to London and the adventure of a lifetime. Owen Wilson, Steve Coogan, Ricky Gervais, and Rebel Wilson co-star. ~ Jeremy Wheeler, Rovi', '5.99', 'comedy', 'dvd', 'PG', '26.jpg', 4),
(27, 'The Bucket List', 'Jack Nicholson and Morgan Freeman star as two terminally ill cancer patients who decide to break out of the hospital and live their last days to the fullest in director Rob Reiner\'s seriocomic road movie. Edward Cole (Nicholson) is a corporate billionaire who is currently sharing a hospital room with blue-collar mechanic Carter Chambers (Freeman). Though initially the pair seems to have nothing in common, conversation gradually reveals that both men have a long list of goals they wish to accomplish before they kick the bucket, and an unrealized desire to discover what kind of men they really are.', '3.99', 'comedy', 'dvd', 'PG-13', '27.jpg', 4),
(28, 'Neighbors', 'An immature couple with a newborn infant go to war with the fraternity that turns their once-peaceful neighborhood into party central in this outrageous comedy of one-upsmanship. Restless thirtysomethings Mac (Seth Rogen) and Kelly Radner (Rose Byrne) are still clinging to the last vestiges of their youth as they attempt to adjust to the rigors of raising a newborn in their picturesque suburban starter home. When a massive moving truck pulls into the driveway next door, the bleary-eyed pair grow excited at the prospect of getting new neighbors.', '5.99', 'comedy', 'dvd', 'R', '28.jpg', 4),
(29, 'The House', 'After realizing that they can\'t possibly afford the tuition for the prestigious college their daughter plans to attend, a married couple (Will Ferrell and Amy Poehler) team up with their eccentric neighbor (Jason Mantzoukas) to make money by running an illegal casino in the suburbs. Needless to say, things quickly spiral out of control as they deal with unruly guests while trying to keep their operation hidden from the police. Nick Kroll, Jeremy Renner, and Allison Tolman co-star in this comedy, which was directed by Andrew Jay Cohen. ~ Jack Rodgers, Rovi', '14.99', 'comedy', 'dvd', 'R', '29.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `movie_rating`
--

CREATE TABLE `movie_rating` (
  `ratingId` int(10) NOT NULL,
  `ratingName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_rating`
--

INSERT INTO `movie_rating` (`ratingId`, `ratingName`) VALUES
(1, 'PG'),
(2, 'PG-13'),
(3, 'G'),
(4, 'NR'),
(5, 'R');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `movie_format`
--
ALTER TABLE `movie_format`
  ADD PRIMARY KEY (`formatId`);

--
-- Indexes for table `movie_products`
--
ALTER TABLE `movie_products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `movie_rating`
--
ALTER TABLE `movie_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie_format`
--
ALTER TABLE `movie_format`
  MODIFY `formatId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie_products`
--
ALTER TABLE `movie_products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `movie_rating`
--
ALTER TABLE `movie_rating`
  MODIFY `ratingId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
