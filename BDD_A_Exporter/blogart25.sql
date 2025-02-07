-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 07 fév. 2025 à 17:19
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogart25`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `numArt` int(8) NOT NULL,
  `dtCreaArt` datetime DEFAULT CURRENT_TIMESTAMP,
  `dtMajArt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `libTitrArt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `libChapoArt` text COLLATE utf8_unicode_ci,
  `libAccrochArt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parag1Art` text COLLATE utf8_unicode_ci,
  `libSsTitr1Art` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parag2Art` text COLLATE utf8_unicode_ci,
  `libSsTitr2Art` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parag3Art` text COLLATE utf8_unicode_ci,
  `libConclArt` text COLLATE utf8_unicode_ci,
  `urlPhotArt` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numThem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`numArt`, `dtCreaArt`, `dtMajArt`, `libTitrArt`, `libChapoArt`, `libAccrochArt`, `parag1Art`, `libSsTitr1Art`, `parag2Art`, `libSsTitr2Art`, `parag3Art`, `libConclArt`, `urlPhotArt`, `numThem`) VALUES
(1, '2019-02-24 16:08:30', '2025-02-06 22:22:29', 'L’UBB et ses supporters : un rêve de titre porté par la passion', 'Depuis plus de 10 ans, Oscar, un supporter dévoué, suit l’UBB avec une passion sans faille. Malgré les échecs répétés, il reste convaincu que le club finira par décrocher son premier titre, porté par des supporters aussi fidèles et enthousiastes que lui.', 'L’UBB : une passion qui traverse les frontières', 'Oscar Motta, 44 ans, a un parcours aussi atypique que son amour pour le rugby. Né à Bogota, en Colombie, il se passionne d’abord pour le foot, un sport omniprésent en Amérique latine. Pourtant, ce n’est pas le ballon rond qui va faire battre son cœur. C’est le rugby, et surtout l’UBB, un club qu’il suit avec une ferveur digne d’un vrai bordelais : “C’est la convivialité qui me séduit à Bordeaux. Quand j’ai découvers l’UBB, c’était un club de cœur, un club authentique et simple”. Et même si ce n’est pas sa ville d’origine, Bordeaux l’adopte vite et il s’y intègre parfaitement.\r\n\r\nAbonné depuis plus de 10 ans, Oscar voit le club évoluer, grandir mais aussi traverser des périodes de doute. Ce qu’il aime dans le rugby ? L’action constante, l’engagement total, là où le foot ne lui apporte pas la même intensité. C’est sa belle-famille, passionnée de rugby, qui le pousse à s’intéresser à ce sport. “À l’ancien stade, on n’était pas nombreux, mais c’était chaleureux, presque comme une grande famille”, se souvient-il. Cette proximité avec le club et ses supporters le séduit rapidement, bien plus que l’atmosphère froide et impersonnelle des stades de football, où les fans semblent souvent déconnectés de l’équipe et du jeu.', 'Un club porté par ses supporters', 'Pour Oscar, l’un des plus grands atouts de l’UBB est son public. Les supporters sont passionnés, fidèles et créent une atmosphère indescriptible lors des matchs. Cette ferveur populaire donne une vraie identité au club et pousse les joueurs à se surpasser sur le terrain : “Sans ses supporters, l’UBB ne serait pas le même club”, affirme Oscar.\r\n\r\nMais malgré cet engouement, le club peine encore à franchir un cap. Selon lui, plusieurs raisons expliquent cette difficulté. Le président manque de poigne, ce qui nuit à l’équipe “Il est trop droit, il faudrait un président plus vicelard”. Oscar pointe également du doigt le manque d’investissement dans le recrutement : “Si on veut rivaliser avec les meilleurs, il faut mettre plus d’argent sur la table pour garder les talents et attirer des joueurs d’envergure.”', 'Entre frustration et espoir', 'Parmi les nombreux moments marquants qu’il vit en tant que supporter, la défaite du 28 juin 2024 face à Toulouse en demi-finale reste une plaie ouverte. Ce match était l’opportunité rêvée pour enfin accéder à une finale tant attendue et offrir un titre à l’UBB. Pourtant, malgré un bon début de match et une belle dynamique, l’équipe finit par s’incliner, laissant un goût amer à Oscar, mais aussi à l’ensemble des supporters. “C’est dommage. On avait l’équipe pour aller au bout, mais une fois de plus, on s’est écroulés dans un moment décisif”.\r\n\r\nPour lui, cette défaite illustre bien les limites du club. Il compare l’UBB à la ville de Bordeaux : “Beaucoup de prétention, mais au final, on n’y arrive pas”. Une phrase lourde de sens qui traduit une frustration profonde face aux ambitions du club, qui n’arrivent toujours pas à se concrétiser sur le terrain malgré un potentiel énorme. C’est ce décalage entre les attentes et la réalité qui pousse Oscar à douter parfois, mais malgré cela, il ne perd pas espoir. Il reste convaincu que l’UBB a toutes les armes nécessaires pour enfin franchir le dernier obstacle et décrocher un titre. Comme il le dit avec conviction : “On a les moyens de gagner un titre, il ne manque plus qu’un petit quelque chose.”', 'Alors, vous aussi ? Vous êtes toujours là, fidèles au poste ? Que vous soyez à la recherche du premier titre ou simplement prêts à encourager l’UBB à chaque match, on veut savoir ce que vous en pensez ! Partagez vos impressions et vos encouragements pour notre équipe !', '1738860721_IMG_5852.jpg', 3),
(2, '2019-03-13 20:14:10', '2025-02-06 20:25:46', 'UBB – Toulouse : Revanche et plaquages bien sentis !', 'Il est temps de faire l’union au stade Chaban-Delmas face au Stade Toulousain. Après le 28 juin 2024, neuf mois plus tard, les Bordelais ont accouché d’une seule obsession : se venger. Ce 22 mars 2025, c’est au tour des Toulousains de venir en terrain hostile, et cette fois, l’UBB ne compte pas leur dérouler le tapis rouge… sauf pour les faire trébucher dessus. Et comment ? Grâce à leurs fidèles supporters, bien évidemment prêts à les soutenir.', 'PLUS JAMAIS 59.3 , désormais on impose le 49.3', 'Le 28 juin 2024, le rugby bordelais a vécu un tsunami. Un 59-3 qui a fait vibrer les murs de Chaban-Delmas, mais pas dans le sens qu&#039;on aurait espéré. Toulouse a infligé une claque historique à l’Union Bordeaux-Bègles, laissant les supporters et les joueurs sur le carreau. Mais, comme tout Bordelais  qui se respecte, on ne se laisse pas abattre par une défaite. Ici, c’est un coup de semonce, un électrochoc. Après tout, une gifle, ça réveille ! Au lieu de se morfondre dans la défaite, l’UBB a transformé ce douloureux revers en une énergie nouvelle. Aujourd’hui, ce n’est plus la honte qui fait écho, mais la soif de revanche. Tout Chaban-Delmas attend le retour du grand rival, et cette fois, pas question de leur offrir une victoire sur un plateau. Non, les Toulousains vont devoir affronter une équipe prête à les dévorer tout cru, avec un appétit insatiable. Car à Bordeaux, on se relève toujours plus fort, et cette fois, c&#039;est la foudre bordelaise qui va tomber sur Toulouse.', 'Les fantômes du Vélodrome : un exorcisme nécessaire', 'Les fantômes du Vélodrome : le besoin urgent d’un exorciste\r\nRetour en arrière. L’été 2024, c’est la tragédie. Le Vélodrome a vu l’UBB se faire massacrer sans pitié, avec ce score dévastateur : 59-3. Une défaite qui semblait aussi inévitable qu’un plaquage raté. Les Bordelais, dans l’incapacité de réagir, ont regardé leurs rêves de Top 14 se briser sous les applaudissements des Toulousains. C’est la scène qu’on espère oublier. Mais comment oublier ce genre de gifle ? Impossible. Les mots de Nicolas Depoortere, &quot;On n’a rien su faire. Il n’y avait que les Toulousains sur le terrain&quot;, résonnent encore dans les oreilles des supporters. Matthieu Jalibert, lui, n’a qu’une seule phrase : &quot;Finir comme ça devant nos supporters, c’est triste...&quot; Et bien non, ce n’est pas la fin, c’est juste un mauvais chapitre. Parce que l’UBB, comme tout bon acteur de la scène rugby, sait que la rédemption passe par la revanche. Et que l’histoire ne se termine pas sur une défaite. Neuf mois après ce traumatisme, c’est la fièvre de la revanche qui monte à Bordeaux. Les fantômes du Vélodrome ne vont pas nous empêcher de faire la fête ce 22 mars. C’est un exorcisme qui doit avoir lieu, et les Toulousains vont en faire les frais.', 'Un duel à haute tension : Bordeaux prêt à faire sauter la banque', 'Un duel à haute tension : et si l’UBB inversait la tendance ?\r\nLes Toulousains, champions en titre, débarquent à Bordeaux avec la confiance du conquérant. Mais attention, un excès de confiance peut parfois être un péché. Et c’est là que l’UBB compte bien frapper. Avec un effectif renforcé, des supporters déchaînés et une équipe qui a mûri dans la douleur, les Bordelais ne comptent pas se laisser marcher sur les pieds une nouvelle fois. &quot;Cet adversaire fera partie des adversaires inquiétants dans les prochaines années&quot;, concède même le manager toulousain. Mais en réalité, l’UBB ne veut pas être &quot;inquiétant&quot; – elle veut être &quot;implacable&quot;. Bordeaux ne veut pas seulement rivaliser, il veut dominer. Ce 22 mars, c’est l’occasion rêvée de renverser la vapeur et de mettre Toulouse face à une équipe sans pitié, prête à tout pour faire tomber le champion du Top 14. La révolte a commencé, et ce n’est pas un match comme les autres. Les Toulousains auront beau se dire que tout est sous contrôle, ils sont sur le point de découvrir que la ferveur bordelaise est un adversaire que même un champion du Top 14 ne peut sous-estimer.', 'L&#039;heure de la revanche a sonné !\r\nCe 22 mars, l&#039;UBB a un objectif clair : frapper fort, frapper juste. Ce n’est pas seulement une question de points, c’est une question de dignité. Bordeaux veut sa revanche, et pour cela, il faut faire trembler Toulouse jusqu’aux racines du stade Chaban-Delmas. Les supporters sont prêts, les joueurs sont affamés, et l’heure de la rédemption a sonné. Ne manquez pas ce match – il pourrait tout changer. Si l’UBB s’impose, ce ne sera pas qu’une victoire sur le terrain, mais un message envoyé à toute la ligue : Bordeaux n’est plus la victime, Bordeaux est prêt à régner. Alors, supporters de l&#039;UBB, êtes-vous prêts pour cette révolte rugbystique ?', '1738860742_ubbst_connor.jpg', 1),
(3, '2019-11-09 10:34:20', '2025-02-06 17:00:07', 'Lorem Ipsum', 'Ad conditum opulentis brevi terra convenit aliaque ubi quae mittunt flumine consueta convenit priscorum multitudo magna Anthemusia brevi Euphrate magna.', 'Quidem enim ob me sic huius ais ob cum cum enim loquar enim sic ais De sic vestrum iam ais.', 'En France, depuis 1951 et l’arrêté des « 1% artistique », toute construction d’un bâtiment public ayant pour but d’accueillir du monde doit prévoir 1% de son budget total pour financer des œuvres d’art aux abords du bâtiment. En construisant les lignes de tramway, la ville de Bordeaux et sa métropole ont donc mis en place le programme « L’art dans la ville ». Supervisé par le directeur du Centre Georges-Pompidou, cette initiative a pu débloquer plusieurs millions d’euros depuis 2000 pour la réalisation d’une quinzaine d’œuvres. Parmi ces œuvres, nous pouvons noter « La maison aux personnages » place Amélie Raba Léon, les affiches « Aux bord’eaux » présentes dans toutes les stations ou bien le fameux Lion bleu bordelais. Mise en place et vissée sur les pavés de la rive droite le 30 juin 2005, cette sculpture en plastique mesure 6 mètres de haut. Elle va de pair avec la mise en service de la première ligne de tramway dans Bordeaux, la ligne A, qui traverse le pont de Pierre et la place Stalingrad. En décalage total par rapport au style architectural très XVIIIème de la ville, cette œuvre a d’abord été massivement rejetée par les habitants du quartier, mais ils l’ont désormais adoptée.', 'Statuas post conperto vocis custodiam scholarum nec lenitatem scholarum prodesse.', 'On n’imagine pas la place Stalingrad sans cet imposant félin coloré. Ce lion bleu est devenu l&#039;emblème de cette place et, pour les habitants de la rive gauche, c’est le symbole de « l’autre rive », c’est la première chose que l’on voit en traversant la Garonne depuis le quartier de Saint-Michel. Ce lion bleu, on s’y abrite, on s’y donne rendez-vous, on s’en sert de repère et les écoliers y prennent souvent leur premier cours d’art contemporain. Ce lion bleu n’est pour certain qu’un gros point azur pixelisé à l’horizon, mais pour d’autres c’est un symbole, un mirage, comme un gros jouet qu&#039;on ne perd jamais. Et ce gros jouet, des centaines d’internautes se le sont attribué et en parlent sur Instagram via le #lionbleu. Ils postent régulièrement des photos de lui, toujours dans la même posture, veillant sur la ville de Bordeaux. D’objet d’art à star du net, il n’y a qu’un pas. Et ce pas, le Lion de Veilhan l’a franchi comme il franchirait la Garonne pour rejoindre le centre-ville bordelais. En plus de son esthétique remarquable, son créateur n’a pas omis de lui donner un sens propre en prenant en compte l’environnement qui entoure cette statue bestiale.', 'Clementer quam et adsurgit et et Euphratensis civitatibus est est clementer quam post Nino amplis.', 'L&#039;artiste plasticien à l’origine du Lion bleu, diplômé de l&#039;EnsAD-Paris (École Nationale Supérieure des Arts Décoratifs) et officier de l’Ordre des Arts et des Lettres, n’a pas choisi une figure animalière pour rien. La place Stalingrad est un hommage à la victoire de l’armée soviétique durant la Seconde Guerre Mondiale. Xavier Veilhan souhaitait donc offrir à ce lieu une œuvre monumentale qui renforce son identité. À l’instar du Lion de Belfort de Bartholdi, il a donc choisi cet animal pour ses valeurs de force tranquille, se battant pour la justice avec puissance mais intelligence. Il déclarait, avant sa construction, vouloir quelque chose de totémique, à la fois dominant et protecteur. Il ne reste plus qu’à espérer qu’il seconde Bordeaux et ses habitants dans leur quotidien futur. Le sculpteur du Lion a vu sa côte mondiale grimper suite à la réalisation de cette œuvre. Il a, depuis, pu exposer un Carrosse violet à Versailles en 2009, un Skateur bleu en Corée du Sud en 2014, ou encore Romy, une femme jaune, devant la gare de Lille en 2019.', 'Metuentes igitur idem latrones Lycaoniam magna parte campestrem cum se inpares nostris fore congressione stataria documentis frequentibus scirent, tramitibus deviis petivere Pamphyliam diu quidem intactam sed timore populationum et caedium, milite per omnia diffuso propinqua, magnis undique praesidiis conmunitam.', '1738861207_ballon.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `numCom` int(10) NOT NULL,
  `dtCreaCom` datetime DEFAULT CURRENT_TIMESTAMP,
  `libCom` text COLLATE utf8_unicode_ci NOT NULL,
  `dtModCom` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `attModOK` tinyint(1) DEFAULT '0',
  `notifComKOAff` text COLLATE utf8_unicode_ci,
  `dtDelLogCom` datetime DEFAULT NULL,
  `delLogiq` tinyint(1) DEFAULT '0',
  `numArt` int(8) NOT NULL,
  `numMemb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`numCom`, `dtCreaCom`, `libCom`, `dtModCom`, `attModOK`, `notifComKOAff`, `dtDelLogCom`, `delLogiq`, `numArt`, `numMemb`) VALUES
(1, '2020-11-09 10:13:43', 'Trop cool comme article', '2025-02-06 22:58:17', 1, 'k,kl;llllklk', NULL, 0, 1, 1),
(7, '2020-11-08 08:41:12', 'J&#039;ai eu une expérience similaire à ce que tu décris, et je peux dire que ça m&#039;a bien aidé. Merci pour ce partage !', '2025-02-06 23:23:12', 1, '', NULL, 0, 1, 3),
(9, '2025-02-06 21:56:47', 'Super article ! Ça motive à en savoir plus. Vivement la prochaine publication !', '2025-02-06 23:03:05', 1, '', NULL, 0, 2, 2),
(13, '2025-02-06 22:20:44', 'Très intéressant ! J&#039;ai appris beaucoup de choses. Merci pour cet article détaillé', '2025-02-06 22:59:31', 1, '', NULL, 0, 3, 2),
(22, '2025-02-06 23:04:18', 'Un des meilleurs articles que j&#039;ai lus cette semaine. La manière dont tu as structuré l&#039;information est vraiment top.', '2025-02-06 23:04:49', 1, '', NULL, 0, 1, 2),
(23, '2025-02-06 23:06:32', 'Merci pour cet article, c&#039;était exactement ce que je cherchais !', NULL, 0, NULL, NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `likeart`
--

CREATE TABLE `likeart` (
  `numMemb` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `likeA` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `likeart`
--

INSERT INTO `likeart` (`numMemb`, `numArt`, `likeA`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(2, 1, 1),
(2, 3, 1),
(3, 1, 1),
(3, 2, 1),
(4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `numMemb` int(10) NOT NULL,
  `prenomMemb` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `nomMemb` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `pseudoMemb` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `passMemb` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `eMailMemb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dtCreaMemb` datetime DEFAULT CURRENT_TIMESTAMP,
  `dtMajMemb` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `accordMemb` tinyint(1) DEFAULT '1',
  `cookieMemb` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numStat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`numMemb`, `prenomMemb`, `nomMemb`, `pseudoMemb`, `passMemb`, `eMailMemb`, `dtCreaMemb`, `dtMajMemb`, `accordMemb`, `cookieMemb`, `numStat`) VALUES
(1, 'Freddie', 'Mercuryeeee', 'Admin99', '$2y$10$ocyawhJ07v/2TOE9tJYjW.uJJZD/rV/sI1MZBXIwjiDWrACuILdnm', 'freddie.mercury@gmail.com', '2019-05-29 10:13:43', '2025-02-05 15:30:41', 1, NULL, 1),
(2, 'Phil', 'Collins', 'Phil09', '$2y$10$IED1o8dBBbZcSSh.DEEXQ.3SpDCJbN4yUeLGtRHk8FnTUSGvL725e', 'phil.collins@gmail.com', '2020-01-09 10:13:43', '2025-02-06 11:48:28', 1, NULL, 2),
(3, 'Julie', 'La Rousse', 'juju1989', '12345678', 'julie.larousse@gmail.com', '2020-03-15 14:33:23', '2024-01-12 14:36:48', 1, NULL, 3),
(4, 'David', 'Bowie', 'dav33B', '12345678', 'david.bowie@gmail.com', '2020-07-19 13:13:13', NULL, 1, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

CREATE TABLE `motcle` (
  `numMotCle` int(8) NOT NULL,
  `libMotCle` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `motcle`
--

INSERT INTO `motcle` (`numMotCle`, `libMotCle`) VALUES
(1, 'Bordeaux'),
(6, 'bleu'),
(8, 'Union Bordeaux-Bègles'),
(9, 'UBB'),
(10, 'revanche'),
(11, 'rugby'),
(12, 'Stade Toulousain'),
(13, 'espoir'),
(14, 'supporters'),
(15, 'passion');

-- --------------------------------------------------------

--
-- Structure de la table `motclearticle`
--

CREATE TABLE `motclearticle` (
  `numArt` int(8) NOT NULL,
  `numMotCle` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `numStat` int(5) NOT NULL,
  `libStat` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dtCreaStat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`numStat`, `libStat`, `dtCreaStat`) VALUES
(1, 'Administrateurs', '2023-02-19 15:15:59'),
(2, 'Mod&eacute;rateur', '2023-02-19 15:19:12'),
(3, 'Membre', '2023-02-20 08:43:24');

-- --------------------------------------------------------

--
-- Structure de la table `thematique`
--

CREATE TABLE `thematique` (
  `numThem` int(10) NOT NULL,
  `libThem` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `thematique`
--

INSERT INTO `thematique` (`numThem`, `libThem`) VALUES
(1, 'L&#039;événement'),
(2, 'L&#039;acteur-clé'),
(3, 'Le mouvement émergeant'),
(4, 'L&#039;insolite / le clin d&#039;œil');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`numArt`),
  ADD KEY `ARTICLE_FK` (`numArt`),
  ADD KEY `FK_ASSOCIATION_1` (`numThem`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`numCom`),
  ADD KEY `COMMENT_FK` (`numCom`),
  ADD KEY `FK_ASSOCIATION_2` (`numArt`),
  ADD KEY `FK_ASSOCIATION_3` (`numMemb`);

--
-- Index pour la table `likeart`
--
ALTER TABLE `likeart`
  ADD PRIMARY KEY (`numMemb`,`numArt`),
  ADD KEY `LIKEART_FK` (`numMemb`,`numArt`),
  ADD KEY `FK_LIKEART1` (`numArt`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`numMemb`),
  ADD KEY `MEMBRE_FK` (`numMemb`),
  ADD KEY `FK_ASSOCIATION_4` (`numStat`);

--
-- Index pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD PRIMARY KEY (`numMotCle`),
  ADD KEY `MOTCLE_FK` (`numMotCle`);

--
-- Index pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD PRIMARY KEY (`numArt`,`numMotCle`),
  ADD KEY `MOTCLEARTICLE_FK` (`numArt`),
  ADD KEY `MOTCLEARTICLE2_FK` (`numMotCle`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`numStat`),
  ADD KEY `STATUT_FK` (`numStat`);

--
-- Index pour la table `thematique`
--
ALTER TABLE `thematique`
  ADD PRIMARY KEY (`numThem`),
  ADD KEY `THEMATIQUE_FK` (`numThem`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `numArt` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `numCom` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `numMemb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `motcle`
--
ALTER TABLE `motcle`
  MODIFY `numMotCle` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `numStat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `thematique`
--
ALTER TABLE `thematique`
  MODIFY `numThem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`numThem`) REFERENCES `thematique` (`numThem`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`),
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `likeart`
--
ALTER TABLE `likeart`
  ADD CONSTRAINT `FK_LIKEART1` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`),
  ADD CONSTRAINT `FK_LIKEART2` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`numStat`) REFERENCES `statut` (`numStat`);

--
-- Contraintes pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`numMotCle`) REFERENCES `motcle` (`numMotCle`),
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
