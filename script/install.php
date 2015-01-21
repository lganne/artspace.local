<?php

$link=mysqli_connect('localhost', 'root', '') or die("pb connexion");

// réinitialisation
$link->query("
        DROP DATABASE IF EXISTS artspace;
        ") or die("drop database impossible");

$link->query("
        DELETE FROM mysql.user WHERE user='lganne' and host='localhost';
        ") or die("drop user impossible");

$link->query(
        "CREATE DATABASE IF NOT EXISTS `artSpace` DEFAULT CHARACTER SET utf8 "
        . "COLLATE utf8_general_ci;"
        ) or die("pb create database blog");

echo "ok database \n";

$link->query(
        "GRANT ALL PRIVILEGES ON artspace.* to 'lganne'@'localhost' IDENTIFIED BY
'lganne' WITH GRANT OPTION;"
        ) or die("impossible de créer l'utilisateur tony");

echo "Ok new user \n";

mysqli_close($link);

$link=mysqli_connect('localhost', 'lganne', 'lganne', 'artspace') or die("pb connexion");

// table users
$link->query("
        CREATE TABLE `users` (
        `id` INT(10) UNSIGNED AUTO_INCREMENT,
        `username` VARCHAR(30) NOT NULL,
        `password` VARCHAR(100) NOT NULL,
        `salt` VARCHAR(30) NOT NULL,
        `token` VARCHAR(50) NOT NULL,
        `role` ENUM('administrator', 'editor', 'visitor') NOT NULL DEFAULT 'visitor',
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 ;
 " )or die("pb create table users");

// tables rubriques
$link->query(
       "CREATE TABLE IF NOT EXISTS `rubriques` (
       `id` INT UNSIGNED AUTO_INCREMENT,
        `title` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`id`))ENGINE=InnoDB AUTO_INCREMENT=1 ;")or die("pb create table rubriques");

// table produit
$link->query(
        "CREATE TABLE IF NOT EXISTS `produits` (
        `id` INT UNSIGNED AUTO_INCREMENT,
        `rubriques_id` INT UNSIGNED,
        `reference` VARCHAR(30) NOT NULL,
        `prix`  DECIMAL (10,2),
        `contenu` TEXT NOT NULL,
        `date_created` DATETIME,
         `date_modif` DATETIME,
        `status` ENUM('publish', 'unpublish', 'draft', 'trash') NOT NULL DEFAULT 'publish',
        PRIMARY KEY (`id`),
        CONSTRAINT `fk_produits_rubriques_id` FOREIGN KEY (`rubriques_id`) REFERENCES `rubriques` (`id`) ON DELETE SET NULL
      ) ENGINE=InnoDB  AUTO_INCREMENT=1 ;"
        ) or die("pb create table produits");

// table commande
$link->query(
        "CREATE TABLE IF NOT EXISTS `commandes` (
        `id` INT UNSIGNED AUTO_INCREMENT,
        `users_id` INT UNSIGNED,
        `total`  DECIMAL (10,2),
        `date_created` DATETIME,
         `date_modif` DATETIME,
        `status` ENUM('valider', 'supprimer', 'en attente') NOT NULL DEFAULT 'valider',
        PRIMARY KEY (`id`),
        CONSTRAINT `fk_commandes_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) 
      ) ENGINE=InnoDB  AUTO_INCREMENT=1 ;"
        ) or die("pb create table commande");

// table detailcommande
$link->query(
        "CREATE TABLE IF NOT EXISTS `detailCommandes` (
        `id` INT UNSIGNED AUTO_INCREMENT,
        `commandes_id` INT UNSIGNED,
         `reference` VARCHAR(30) NOT NULL,
        `prix`  DECIMAL (10,2),
        `contenu` TEXT NOT NULL,
        `date_created` DATETIME,
        PRIMARY KEY (`id`),
        CONSTRAINT `fk_detailCommandes_commandes_id` FOREIGN KEY (`commandes_id`) REFERENCES `commandes` (`id`) 
      ) ENGINE=InnoDB  AUTO_INCREMENT=1 ;"
        ) or die("pb create table detailcommande");
// seed tables
$link->query("
        INSERT INTO users (`username`, `password`, `role`) VALUES 
        ('Admin', 'Admin', 'administrator');
        ")or die("pb insert data users");



mysqli_close($link);

echo "ok tout est bon";