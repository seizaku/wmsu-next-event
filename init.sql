-- Users table: Store information about admins and attendees
CREATE TABLE
  Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM ('ADMIN', 'ATTENDEE') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

-- Users profile: Store information attendee profile
CREATE TABLE
  Profile (
    profile_id INT AUTO_INCREMENT PRIMARY KEY,
    profile_picture VARCHAR(255),
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255),
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    user_id INT UNIQUE
  );

-- Events table: Store event details like name, date, location
CREATE TABLE
  Events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_start DATETIME NOT NULL,
    event_end DATETIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    latitude VARCHAR(100), -- Can store latitude, longitude or a formatted string
    longitude VARCHAR(100), -- Can store latitude, longitude or a formatted string
    capacity VARCHAR(100), -- Can store latitude, longitude or a formatted string
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );

-- Event_Attendees table: Tracks which user is attending which event
CREATE TABLE
  Event_Attendees (
    attendee_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    attended BOOLEAN DEFAULT FALSE, -- Flag to indicate if the attendee has checked in
    attendance_time TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES Events (event_id),
    FOREIGN KEY (user_id) REFERENCES Users (user_id),
    UNIQUE (event_id, user_id) -- Ensure a user can only attend an event once
  );

-- Certificates table: Store certificate data for attendees (for automation)
CREATE TABLE
  Certificates (
    certificate_id INT AUTO_INCREMENT PRIMARY KEY,
    attendee_id INT NOT NULL,
    event_id INT NOT NULL,
    certificate_url VARCHAR(255), -- URL or file path for the generated certificate
    certificate_data JSON, -- Store certificate customizations (signature, positioning, etc.)
    issued_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (attendee_id) REFERENCES Event_Attendees (attendee_id),
    FOREIGN KEY (event_id) REFERENCES Events (event_id)
  );

-- Signatures table: Store signature images or paths if needed
CREATE TABLE
  Signatures (
    signature_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    signature_image VARCHAR(255), -- Path to the signature image file
    FOREIGN KEY (user_id) REFERENCES Users (user_id)
  );

-- Optional: Log events for administrative purposes (e.g., login attempts, certificate generation)
CREATE TABLE
  Logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255),
    action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users (user_id)
  );