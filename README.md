# How to Install Drupal 11 on a Windows Machine

1. Download Docker Desktop for Windows

2. Open Powershell as admin

3. Run updates

4. Install WSL2 and Ubuntu

```wsl --install```

5. Reboot your system if required (usually necessary after installation).

## Once WSL2 and Ubuntu are Installed

1. Verify that you have an Ubuntu distro set as the default by running:

```wsl.exe -l -v```

2. Configure Windows Update Settings

I. Go to Windows Update Settings → Advanced Options.

II. Enable Receive updates for other Microsoft products.

III. Occasionally run the following command to ensure WSL2 is up to date:

```wsl.exe --update```

3. Start Docker Desktop and verify that it’s working by running: in PowerShell or Git Bash.

```docker ps```

In Docker Desktop, navigate to Settings → Resources → WSL2 Integration, and verify that Docker Desktop is integrated with your Ubuntu distro.

## Install DDEV

1. Open the Ubuntu terminal (you can use the Ubuntu terminal app or Windows Terminal).

2. Install DDEV by running one of the following commands:

```sudo apt-get install ddev```

```curl -fsSL https://raw.githubusercontent.com/ddev/ddev/master/scripts/install_ddev.sh | bash```

## Set Up Drupal 11 with DDEV

1. Create a new directory for your Drupal site and navigate into it:

```mkdir my-drupal-site && cd my-drupal-site```

2. Configure the DDEV project:

```ddev config --project-type=drupal --php-version=8.3 --docroot=web```

3. Start DDEV:

```ddev start```

4. Create a new Drupal project using Composer:

```ddev composer create drupal/recommended-project:^11```

5. Require Drush, the Drupal command-line tool:

```ddev composer require drush/drush```

6. Update the DDEV configuration:

```ddev config --update```

7. Restart DDEV to apply the changes:

```ddev restart```

8. Install Drupal using Drush:

```ddev drush site:install --account-name=admin --account-pass=admin -y```

9. Launch your Drupal site in the browser:

```ddev launch```

Alternatively, you can automatically login with:

```ddev launch $(ddev drush uli)```



