-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jun 21, 2026 at 10:04 PM
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
-- Database: `leparisien`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$I2aPtu1q16gEhXNQ3JSuy.3AJusOXDGodH4eisvD9/kxbw25W4dCa', 1),
(5, 'a', 'a', 'a', '$2y$10$w4SHHHgczGTSforAv1rNuuqgwSFQszR1fzvO2GiQusT2YcgtYTH7q', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(20) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `arhiva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(9, '20.06.2026.', 'La cuisine est bonne', 'Le titre \"La cuisine est bonne\" évoque la célébration de la bonne chère, du savoir-faire culinaire et du plaisir de partager un bon repas.\r\n\r\nEn bref : Une ode à la gastronomie, aux traditions culinaires et à la joie de vivre à travers la table.', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).\r\n\r\nLe Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'tasty-baguette-with-slices-white-bread_114579-5820.png', 'Vivre Mieux', 0),
(10, '21.06.2026.', 'Le Café : Un Instant de Vie', 'Le café est bien plus qu\'une simple boisson énergétique ; c\'est un véritable rituel quotidien et un symbole de convivialité à travers le monde. De la récolte des grains de caféier jusqu\'à la tasse, il se décline en une infinité d\'arômes et de méthodes de préparation, comme l\'expresso ou le café filtre. Véritable créateur de liens sociaux, le café rythme nos journées, stimule l\'esprit et offre une pause chaleureuse à partager.', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).\r\n\r\nPlusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d\'entre elles a été altérée par l\'addition d\'humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu\'il n\'y a rien d\'embarrassant caché dans le texte. Tous les générateurs de Lorem Ipsum sur Internet tendent à reproduire le même extrait sans fin, ce qui fait de lipsum.com le seul vrai générateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour générer un Lorem Ipsum irréprochable. Le Lorem Ipsum ainsi obtenu ne contient aucune répétition, ni ne contient des mots farfelus, ou des touches d\'humour.\r\n', 'coffe.png', 'Vivre Mieux', 0),
(11, '21.06.2026.', 'Contrats Signés', 'Ce document marque la conclusion officielle et la validation juridique des accords passés entre les parties prenantes. Il symbolise l\'aboutissement des négociations, l\'engagement mutuel à respecter les clauses définies, ainsi que le lancement officiel de la collaboration et des projets communs.', 'Contrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique. Les premières lignes du Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", proviennent de la section 1.10.32.\r\n\r\nLe Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.\r\n\r\n', 'handshake.png', 'Vivre Mieux', 0),
(12, '21.06.2026.', 'Nouveaux Appartements', 'Découvrez nos nouveaux appartements modernes, alliant confort, design contemporain et innovations écologiques. Idéalement situés, ces espaces de vie lumineux offrent des prestations de haute qualité, une isolation thermique optimale et des aménagements pensés pour votre bien-être au quotidien. Une opportunité parfaite pour un investissement ou pour y installer votre futur chez-vous.', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).\r\n\r\nContrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique. Les premières lignes du Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", proviennent de la section 1.10.32.\r\n\r\n', 'apartment-building-residential-structure-block-of-flats.png', 'Parisien', 0),
(13, '21.06.2026.', 'Nouveaux Drapeaux à Paris', 'À l\'occasion des récentes célébrations et transformations de la capitale, de nouveaux drapeaux et étendards ornent désormais les rues et les monuments historiques de Paris. Symboles de renouveau, d\'unité et d\'ouverture internationale, ces nouvelles couleurs redessinent le paysage visuel parisien, mêlant fierté historique et modernité urbaine sous le regard des habitants et des visiteurs du monde entier.', 'Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d\'entre elles a été altérée par l\'addition d\'humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu\'il n\'y a rien d\'embarrassant caché dans le texte. Tous les générateurs de Lorem Ipsum sur Internet tendent à reproduire le même extrait sans fin, ce qui fait de lipsum.com le seul vrai générateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour générer un Lorem Ipsum irréprochable. Le Lorem Ipsum ainsi obtenu ne contient aucune répétition, ni ne contient des mots farfelus, ou des touches d\'humour.\r\n\r\nLe Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.\r\n\r\n', 'frenchflag.png', 'Parisien', 0),
(14, '21.06.2026.', 'Lancement des Travaux du Nouveau Centre Culturel', 'Les travaux de construction du nouveau centre culturel ont officiellement débuté, marquant le coup d\'envoi d\'un projet majeur pour la communauté. Ce futur espace moderne et polyvalent sera dédié aux arts, aux spectacles et aux échanges citoyens. Conçu pour dynamiser la vie locale, il offrira bientôt des infrastructures de pointe pour accueillir les artistes, les expositions et un large public, devenant ainsi le nouveau cœur battant de la culture.', 'Phasellus ullamcorper, dolor ut volutpat suscipit, nulla nisi tristique felis, vitae efficitur est est id dui. In arcu risus, maximus sit amet pulvinar vel, sodales vel arcu. Maecenas facilisis ex eu neque ullamcorper, eget vestibulum velit porttitor. Aenean dictum ut turpis finibus convallis. Vestibulum in eros in tellus viverra euismod. Aliquam mollis erat ut malesuada interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla consequat posuere ipsum sed sagittis. Nam et imperdiet mi. Integer sed consectetur eros. Cras egestas, lectus eget porta mollis, metus purus pellentesque magna, vel auctor massa orci vitae justo. Fusce vel ligula efficitur, varius dui ac, efficitur felis. Nunc tincidunt pellentesque nibh. Nulla suscipit massa et magna vestibulum accumsan.\r\n\r\nSuspendisse faucibus, mauris nec mattis ornare, turpis est condimentum ligula, in venenatis diam diam et enim. Phasellus vulputate tellus id laoreet ullamcorper. Curabitur ullamcorper porttitor tristique. Suspendisse molestie lacus sit amet consectetur suscipit. Phasellus et faucibus libero, id auctor risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean a nibh imperdiet, dapibus quam quis, bibendum tellus. Mauris posuere venenatis tristique. Quisque a ex in sem ultrices lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\n', 'construction-site_53876-42900.png', 'Parisien', 0),
(15, '21.06.2026.', 'Le PSG Sacré Champion !', 'Au terme d\'une saison intense et maîtrisée, le Paris Saint-Germain décroche officiellement le titre de champion. Grâce à des performances collectives solides et au talent de ses stars, le club de la capitale confirme une fois de plus sa domination sur le football français. Les supporters célèbrent ce nouveau trophée historique qui vient enrichir la vitrine déjà bien remplie des Rouge et Bleu.', 'Vivamus non sapien sit amet est tempor luctus eget non enim. Etiam non ante lacus. Donec accumsan sed arcu id varius. Suspendisse ultrices nulla ac tempor tempus. Aenean aliquam nisi et nisi finibus egestas. Mauris id nulla eu lorem aliquet venenatis sit amet nec neque. Etiam tincidunt massa sed erat vestibulum, vel dapibus nunc porttitor. Vivamus ullamcorper congue malesuada. Nunc lacinia accumsan justo sed iaculis. Duis ut leo nec mi elementum lobortis. Sed sed fringilla sapien. Integer mattis imperdiet bibendum. Vivamus pretium est leo, a gravida nunc auctor at.\r\n\r\nEtiam mattis augue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique purus vel mollis maximus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam tellus tellus, lacinia ac ligula ac, pulvinar malesuada felis. Nam tristique sollicitudin vestibulum. Sed tempor diam eget enim dignissim, non auctor justo consectetur. Etiam vitae risus porta, bibendum nisl vel, rhoncus massa. Cras malesuada, lectus eget ullamcorper posuere, dolor risus tincidunt mauris, eget porttitor ligula mauris at lacus.\r\n\r\nPraesent ultrices orci mi, nec lobortis nisi dignissim vitae. Nunc quis faucibus mauris. Aenean congue arcu vel maximus vehicula. Suspendisse quis placerat quam, et accumsan turpis. Etiam faucibus est ullamcorper neque hendrerit, a vulputate odio gravida. Nulla gravida efficitur magna, sit amet accumsan turpis pellentesque vitae. Cras purus turpis, dignissim nec arcu eget, tempor sodales dui. Morbi fringilla pellentesque imperdiet. Sed sed orci sit amet tortor congue lacinia. Nullam lobortis odio at odio placerat semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel dignissim lectus.', 'lille-france-fans-of-psg-react-during-the-french-cup-final-match-between-paris-saint-germain.png', 'Parisien', 0),
(16, '21.06.2026.', 'Baisse de la Qualité du Vin : Un Défi Majeur', 'De récentes études et observations de sommeliers tirent la sonnette d\'alarme : la qualité globale de certains vins tend à diminuer. En cause principalement, le dérèglement climatique qui perturbe les cycles de la vigne avec des chaleurs extrêmes, entrainant des taux d\'alcool trop élevés et un manque d\'acidité. Face à ces modifications des saveurs et de l\'équilibre traditionnel, les vignerons doivent d\'urgence adapter leurs méthodes de production pour préserver l\'excellence de leurs cuvées.', 'Ut gravida sollicitudin finibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla commodo luctus imperdiet. Nam ipsum velit, faucibus at lacus at, pellentesque porta dui. Suspendisse a hendrerit nisl, sed cursus metus. Pellentesque eget lorem augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras elementum vestibulum placerat. Nunc bibendum convallis dolor id fringilla. Pellentesque sit amet est eget dui luctus varius. Phasellus malesuada, ipsum sit amet fermentum iaculis, lorem nibh viverra nulla, ut vehicula arcu enim vel nunc. Sed varius posuere placerat. Sed justo ligula, hendrerit nec sagittis at, faucibus id dui.\r\n\r\nVestibulum vitae nunc dolor. Nullam mi sem, rhoncus ut purus ut, volutpat gravida orci. Integer elementum pharetra nulla ut viverra. Morbi in magna felis. Donec non justo bibendum, auctor magna eget, molestie justo. Aenean pharetra faucibus posuere. Sed nec placerat orci. Donec nec nisl dictum, rhoncus ligula dictum, efficitur tellus. Quisque ut libero nec libero scelerisque finibus in ut dolor. Donec dictum ex vitae tellus rhoncus, nec lacinia justo rhoncus. Proin pharetra tortor quis sollicitudin viverra.\r\n\r\n', 'france-life-selection-french-wine-bottles-merchant-red-405750243.png', 'Vivre Mieux', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
