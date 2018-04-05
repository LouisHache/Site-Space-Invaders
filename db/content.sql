INSERT INTO `usr` (`pseudo`, `mdp`) VALUES ('test', '123');
INSERT INTO `usr` (`pseudo`, `mdp`) VALUES ('test2', '123');

INSERT INTO `langue` (`id`, `nom`, `date_crea`, `createur_l`,`admin_l`) VALUES ('0', 'chabada', CURRENT_DATE(), 'test', 'test2');
INSERT INTO `langue` (`id`, `nom`, `date_crea`, `createur_l`, `admin_l`) VALUES ('1', 'a', CURRENT_DATE(), 'test', 'test'), ('2', 'h', CURRENT_DATE(), 'test', 'test');

INSERT INTO `mot` (`id`, `mot`, `definition_mot`, `date_crea`, `createur_m`, `langue_m`) VALUES ('1', 'glace', 'vitre', CURRENT_DATE(), 'test', '0'), ('2', 'glace', 'à manger', CURRENT_DATE(), 'test', '0');
INSERT INTO `mot` (`id`, `mot`, `definition_mot`, `date_crea`, `createur_m`, `langue_m`) VALUES ('3', 'vitre', NULL, CURRENT_DATE(), 'test2', '0');

INSERT INTO `collab` (`UserId`, `LangueId`) VALUES ('test', '1');

INSERT INTO `synonyme` (`Mot1Id`, `Mot2Id`) VALUES ('1', '3');
INSERT INTO `synonyme` (`Mot1Id`, `Mot2Id`) VALUES ('3', '1');
