-- Drop the table if it already exists
DROP TABLE IF EXISTS `Students_info`;

-- Create the table structure for students
CREATE TABLE `Students_info` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `First_Name` VARCHAR(100) NOT NULL,
  `Last_Name` VARCHAR(100) NOT NULL,
  `DoB` DATE NOT NULL,
  `Photograph` VARCHAR(255) DEFAULT NULL, -- Storing image URL
  `contactno` VARCHAR(15) NOT NULL,
  `Branch` VARCHAR(100) NOT NULL -- Changed from 'Institute' to 'Branch'
);

-- Insert sample data for students
INSERT INTO `Students_info` (`First_Name`, `Last_Name`, `DoB`, `Photograph`, `contactno`, `Branch`) 
VALUES 
('Alice', 'Brown', '2002-01-08', 'https://yourserver.com/images/alice.jpg', '+1234567890', 'Computer Science'),
('Bob', 'Williams', '2001-01-09', 'https://yourserver.com/images/bob.jpg', '+19876543210', 'Mechanical Engineering');
