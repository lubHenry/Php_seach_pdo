CREATE TABLE IF NOT EXISTS `posts` (
`id` int(8) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_at` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `description`, `post_at`) VALUES
(1, 'Plugin integration', 'Documentation to help to integrate plugins.', '2019-03-02'),
(2, 'Learning languages', 'Guide to get started learning new languages.', '2019-03-25'),
(3, 'Editor tools', 'Number of tools and utilities available in the editor.', '2019-03-25');

--
-- Indexes for dumped tables

ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `posts`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
