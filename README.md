# Hustle-Hub

## Getting Started

To run this project on your local machine, follow the instructions below based on your operating system.

Assuming you have already installed xampp, download this repo as a _zip file_ then extract it in _htdocs_ folder found in your _xampp_ directory for Windows users or in your _opt/lampp_ directory for Linux users

you should then have a folder called _*Hustle-Hub*_ in your _htdocs_ folder

### For Linux Users

- Open a terminal window and navigate to the XAMPP directory using the cd command: _cd /opt/lampp_
- Start XAMPP by running:_sudo ./xampp start_
- enter your password and apache server and mysql will start running if they weren't any issues
- Then open your browser and type in _localhost_ , click **Enter**
- then replace the _/dashboard_ with the project folder name _/Hustle-Hub_

  ### For Windows Users

- Open XAMPP Control Panel- Start the Apache and mysql servers
- Then open your browser and type in _localhost_ , click **Enter**
- then replace the _/dashboard_ with the project folder name _/Hustle-Hub_

  ### Import Database

  - Go to your phpmyadmin , and import the database i used for easy convenience, the _hustlehub.sql_ file in this repo

  ### The login details are as follows

  | One of the | Username    | Password    |
  | ---------- | ----------- | ----------- |
  | Admin      | Row 1 Col 2 | Row 1 Col 3 |
  | Client     | Row 2 Col 2 | Row 2 Col 3 |
  | Technician | Row 3 Col 2 | Row 3 Col 3 |

## Problem definition

- Residents in Juja find it difficult to locate and find skilled laborers (electricians, plumbers, carpenters, cleaners, laptop technicians) from a single point thus Hustle Hub will give our users an easy way to access any of the above technician from just an app.
- Skilled laborers have a hard time to market themselves, thus the Hustle Hub Gives them a place to advertise themselves.

## Features/ functionalities of software

### User Registration and Profiles:

Users can create accounts with basic information such as name, contact details, and location.
Skilled laborers can create detailed profiles showcasing their expertise, experience, rates, and portfolio (if applicable).

### Search and Filter Functionality:

Users can search for skilled laborers based on their location, availability, and type of service required.
Filters can include specific skills (electrician, plumber, etc.), ratings, and price range

### Service Listings:

Skilled laborers can create listings for their services, including descriptions, rates, availability, and contact information.

### Reviews and Ratings:

Users can leave reviews and ratings for the services they've received.
Skilled laborers can build their reputation through positive feedback.

### Booking and Scheduling:

Users can schedule appointments or request services directly through the platform.
Skilled laborers can manage their schedules and confirm bookings.

### Admin Panel:

Dashboard for administrators to manage users (can delete a user , approve registration of a worker), listings, reviews, and overall platform activity.

## Languages /frameworks and tools used

- HTML5: create the web pages
- CSS with Bootstrap framework: styling and creating responsive pages
- Javascript
- SQL: database creations and management
- PHP
- Figma: UI/UX Design
- Git and Github: version control
- Draw.io: system design/ UML diagrams
- Slack: workspace for collaboration and communication

## Design / UML diagrams

### Class diagram

![Class Diagram](/Diagrams/class_diagram.png)

### Figma design of the client's landing page

![Figma design](/Diagrams/clients__landing_page.png)
