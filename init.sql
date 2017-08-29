CREATE TABLE `customer` (
  id INT AUTO_INCREMENT NOT NULL,
  name VARCHAR(250),
  company ENUM('company_1','company_2','company_3'),
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE `contract` (
  id INT AUTO_INCREMENT NOT NULL,
  customer_id int NOT NULL,
  number VARCHAR (100),
  date_sign DATE,
  staff_number VARCHAR (100),
  PRIMARY KEY (id),
  CONSTRAINT `customer_fk` FOREIGN KEY (`customer_id`) REFERENCES customer (id)
) ENGINE=InnoDB;

CREATE TABLE `service` (
  id INT AUTO_INCREMENT NOT NULL,
  contract_id INT NOT NULL,
  title VARCHAR(250),
  status ENUM ('work', 'connecting','disconnecting'),
  PRIMARY KEY (id),
  CONSTRAINT `contract_fk` FOREIGN KEY (`contract_id`) REFERENCES contract (id)
) ENGINE=InnoDB;
