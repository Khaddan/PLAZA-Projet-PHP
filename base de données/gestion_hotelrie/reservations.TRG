TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `after_insert_reservation` AFTER INSERT ON `reservations` FOR EACH ROW UPDATE rooms SET ETAT = \'pending\'where NUMERO = new.NUM_ROOM' 'CREATE DEFINER=`root`@`localhost` TRIGGER `after_delete_reservation` AFTER DELETE ON `reservations` FOR EACH ROW UPDATE rooms SET ETAT = \'available\'where NUMERO = old.NUM_ROOM'
sql_modes=1098907648 1098907648
definers='root@localhost' 'root@localhost'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci'
created=162380770686 162380735779
