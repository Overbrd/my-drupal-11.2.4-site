1. download docker desktop for windows

2. open powershell as admin

3. run updates

4. install WSL2 and Ubuntu

`wsl --install

---

1. open docker desktop

2. open ubuntu

3. run commands in ubuntu

---How to Install Drupal 11 using DDEV on Windows with WSL2:

1. Set Up WSL2 with an Ubuntu Distrubution

I. Open PowerShell as Administrator and run the following command to install WSL2:

wsl - install

II. Reboot your system if required (usually necessary after installation).

III. Verify that you have an Ubuntu distro set as the default by running:

wsl.exe -l -v

2. Configure Windows Update Settings

I. Go to Windows Update Settings → Advanced Options.

II. Enable Receive updates for other Microsoft products.

III. Occasionally run the following command to ensure WSL2 is up to date:

wsl.exe --update

3. Install Docker Desktop

I. Download and install Docker Desktop on your Windows system.

II. Start Docker Desktop and verify that it’s working by running: in PowerShell or Git Bash.

docker ps

III. In Docker Desktop, navigate to Settings → Resources → WSL2 Integration, and verify that Docker Desktop is integrated with your Ubuntu distro.

4. Install DDEV

I. Open the Ubuntu terminal (you can use the Ubuntu terminal app or Windows Terminal).

II. Install DDEV by running one of the following commands:

sudo apt-get install ddev

curl -fsSL https://raw.githubusercontent.com/ddev/ddev/master/scripts/install_ddev.sh | bash

5. Set Up Drupal 11 with DDEV

I. Create a new directory for your Drupal site and navigate into it:

mkdir my-drupal-site && cd my-drupal-site

II. Configure the DDEV project:

ddev config --project-type=drupal --php-version=8.3 --docroot=web

III. Start DDEV:

ddev start

VI. Create a new Drupal project using Composer:

ddev composer create drupal/recommended-project:^11

V. Require Drush, the Drupal command-line tool:

ddev composer require drush/drush

VI. Update the DDEV configuration:

ddev config --update

VII. Restart DDEV to apply the changes:

ddev restart

VIII. Install Drupal using Drush:

ddev drush site:install --account-name=admin --account-pass=admin -y

IX. Launch your Drupal site in the browser:

ddev launch

Alternatively, you can automatically login with:

ddev launch $(ddev drush uli)



