/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Nov 11, 2017
 */

DROP TABLE IF EXISTS freets;
CREATE TABLE freets (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  uid INT NOT NULL,
  freet TEXT NOT NULL,
  created DATETIME,
  FOREIGN KEY (uid) REFERENCES users(id)
);