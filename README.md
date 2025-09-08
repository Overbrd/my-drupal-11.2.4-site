# How to Install Drupal 11 on a Windows Machine

1. Download Docker Desktop for Windows

2. Open Powershell as Admin (go to this directory to use Powershell properly: C:\WINDOWS\system32>)

3. Run updates

Check for updates:

```docker desktop update```

Check for updates without applying them:

```docker desktop update -k --check-only```

Quietly check and apply updates:

```docker desktop update -q --quiet```

4. Install WSL2 and Ubuntu

This command will automatically enable all the necessary Windows features required for WSL, install the Linux kernel update for WSL2, download the Ubuntu distribution (by default), and install it in WSL.

```wsl --install```

5. Reboot your system if required (usually necessary after installation).

## Once WSL2 and Ubuntu are Installed

1. Verify that you have an Ubuntu distro set as the default by running (in Ubuntu Terminal):

```wsl.exe -l -v```

2. Configure Windows Update Settings

I. Go to Windows Update Settings → Advanced Options.

II. Enable Receive updates for other Microsoft products.

III. Occasionally run the following command to ensure WSL2 is up to date (in Ubuntu Terminal):

```wsl.exe --update```

3. Start Docker Desktop from Windows Start Menu and verify that it’s working by running (in PowerShell):

```docker ps```

In Docker Desktop, navigate to Settings → Resources → WSL2 Integration, and verify that Docker Desktop is integrated with your Ubuntu distro.

## Install DDEV

1. Using the Ubuntu Terminal (you can use the Ubuntu Terminal app or Windows Terminal).

2. Install DDEV by running one of the following commands:

```sudo apt-get install ddev```

```curl -fsSL https://raw.githubusercontent.com/ddev/ddev/master/scripts/install_ddev.sh | bash```

## Set Up Drupal 11 with DDEV using Ubuntu Terminal

1. Create a new directory for your Drupal site and navigate into it:

```mkdir my-drupal-site```

```cd my-drupal-site```

2. Configure the DDEV project:

```ddev config --project-type=drupal --php-version=8.3 --docroot=web```

3. Start DDEV:

```ddev start```

4. Create a new Drupal project using Composer (https://getcomposer.org/download/):

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

## Once everything is up and running:

Your Windows Explorer file path is below:

\\wsl.localhost\Ubuntu\home\(user name)\my-drupal-site

Note: you must copy and paste the address into the Windows Explorer address bar and click enter to see the actual files in Windows Explorer; you cannot find it starting from the C: drive (wsl.localhost is not visible when looking at the contents of the C: drive).


