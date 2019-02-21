CREATE TABLE `usuario` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`login` varchar(70) NOT NULL,
`nome` varchar(50) NOT NULL,
`senha` varchar(70) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;