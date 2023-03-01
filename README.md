Car insurance claims app - school project

This is a Symfony web application (MVP) that allows car insurance clients to make insurance claims, upload photos of accidents, and track their claims. It uses Symfony version 6.0 and requires PHP version 8.0.2 or higher.

Before you can run this app, you will need to have the following software installed on your system:
PHP version 8.0.2 or higher
Composer
Git

To install and set up the app, follow these steps:

1. Clone the repository:
   git clone https://github.com/AnissaBoukerche/project-assure-plus
2. Install dependencies:
   composer install
   This will download and install all the required dependencies for the project, including Symfony and the other packages listed in the composer.json file.
3.Configure the database:
   Edit the .env file in the root directory of the project and set the database connection parameters to match your environment.
4. Run the app :
   symfony server:start
   This will start the Symfony web server and you can access the app in your web browser at http://127.0.0.1:8000/

Once the app is installed and running, you can create an account, log in, and start making insurance claims. You can upload photos of accidents, track the progress of your claim, and find towing and garage repair shops near you. The app is intended for use by car insurance clients who need to make insurance claims.
