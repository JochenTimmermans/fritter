/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Nov 11, 2017
 */

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email TEXT NOT NULL,
  password TEXT NOT NULL,
  username VARCHAR(20),
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);