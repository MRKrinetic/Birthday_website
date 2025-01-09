-- Drop the table if it already exists
DROP TABLE IF EXISTS `Working_info`;

-- Create the table structure for working professionals
CREATE TABLE `Working_info` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `First_Name` VARCHAR(100) NOT NULL,
  `Last_Name` VARCHAR(100) NOT NULL,
  `Organization` VARCHAR(255) NOT NULL,
  `Designation` VARCHAR(255) NOT NULL,
  `DoB` DATE NOT NULL,
  `Photograph` VARCHAR(255) DEFAULT NULL, -- Storing image URL
  `contactno` VARCHAR(15) NOT NULL
);

-- Insert sample data for working professionals
INSERT INTO `Working_info` (`First_Name`, `Last_Name`, `Organization`, `Designation`, `DoB`, `Photograph`, `contactno`) 
VALUES 
('Charlie', 'Davis', 'Tech Corp', 'Developer', '1995-01-08', 'https://yourserver.com/images/charlie.jpg', '+11223344556'),
('Diana', 'Miller', 'Business Inc.', 'Manager', '1993-01-09', 'https://yourserver.com/images/diana.jpg', '+9988776655');
