/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Sep 08, 2017
 */

DROP DATABASE IF EXISTS fritter;
CREATE DATABASE fritter;

USE fritter;

DROP USER IF EXISTS 'fritteruser'@'localhost';

CREATE USER 'fritteruser'@'localhost' IDENTIFIED BY 'fritteruser12345';

GRANT ALL ON fritter.* TO 'fritteruser'@'localhost';
