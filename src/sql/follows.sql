/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Nov 11, 2017
 */

DROP TABLE IF EXISTS follows;

CREATE TABLE follows (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  uid INT NOT NULL,
  follows_uid INT NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (uid) REFERENCES users(id),
  FOREIGN KEY (follows_uid) REFERENCES users(id)
);
