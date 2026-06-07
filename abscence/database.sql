CREATE DATABASE IF NOT EXISTS gst_abscence CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gst_abscence;

CREATE TABLE IF NOT EXISTS utilisateurs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  login VARCHAR(80) NOT NULL UNIQUE,
  mot_de_passe VARCHAR(255) NOT NULL,
  role ENUM('admin','enseignant','scolarite') NOT NULL DEFAULT 'enseignant',
  enabled TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE IF NOT EXISTS etudiants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(80) NOT NULL,
  prenom VARCHAR(80) NOT NULL,
  massar_id VARCHAR(30) NOT NULL UNIQUE,
  cin VARCHAR(30) NULL,
  email VARCHAR(120) NULL,
  niveau VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS absences (
  id INT AUTO_INCREMENT PRIMARY KEY,
  etudiant_id INT NOT NULL,
  enseignant_id INT NULL,
  date_absence DATE NOT NULL,
  heure_absence TIME NOT NULL,
  type_seance VARCHAR(50) NOT NULL,
  etat ENUM('non_justifiee','justifiee','annulee') NOT NULL DEFAULT 'non_justifiee',
  motif TEXT NULL,
  FOREIGN KEY (etudiant_id) REFERENCES etudiants(id) ON DELETE CASCADE,
  FOREIGN KEY (enseignant_id) REFERENCES utilisateurs(id) ON DELETE SET NULL
);

INSERT INTO utilisateurs (login, mot_de_passe, role, enabled)
VALUES ('admin', '$2y$12$vjXSk0XmGOmH.60vHl8yvOA6U0cq1VBj/14Vt/zcViFr6U7Gmifum', 'admin', 1)
ON DUPLICATE KEY UPDATE login = login;
