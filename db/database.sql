create database if not exists chabada character set utf8 collate utf8_unicode_ci;
use chabada;

grant all privileges on chabada.* to 'chabada_user'@'localhost' identified by 'secret';
