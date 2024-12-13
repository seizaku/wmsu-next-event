-- Users table
CREATE TABLE
  Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM ('ADMIN', 'ATTENDEE') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

-- Users profile table
CREATE TABLE
  Profile (
    profile_id INT AUTO_INCREMENT PRIMARY KEY,
    profile_picture VARCHAR(255), -- Path to profile picture
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255),
    user_id INT UNIQUE,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users (user_id)
  );

-- Events table
CREATE TABLE
  Events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    event_banner VARCHAR(255) NOT NULL, -- Path to event banner
    event_name VARCHAR(255) NOT NULL,
    event_start DATETIME NOT NULL,
    event_end DATETIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    latitude VARCHAR(100), -- Can store latitude, longitude or a formatted string
    longitude VARCHAR(100), -- Can store latitude, longitude or a formatted string
    capacity INT (5),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );

-- Event_Attendees table
CREATE TABLE
  Event_Attendees (
    attendee_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    attended BOOLEAN DEFAULT FALSE, -- Flag to indicate if the attendee has checked in
    time_in TIMESTAMP NULL,
    time_out TIMESTAMP NULL,
    FOREIGN KEY (event_id) REFERENCES Events (event_id),
    FOREIGN KEY (user_id) REFERENCES Users (user_id),
    UNIQUE (event_id, user_id)
  );

-- Certificates table
CREATE TABLE
  Certificates (
    certificate_id INT AUTO_INCREMENT PRIMARY KEY,
    attendee_id INT NOT NULL,
    event_id INT NOT NULL,
    issued_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (attendee_id) REFERENCES Event_Attendees (attendee_id),
    FOREIGN KEY (event_id) REFERENCES Events (event_id)
  );