IIS PHP QUICK START GUIDE
=========================

## Set Up Steps

- Clone your repo into this ditectory - `C:\inetpub\projects\`
- For full communication and configuration with IIS running on Windows, make sure to have `web.config` in the [web root (www) directory](https://github.com/BouncingPixel/PHP-Base-Template/blob/master/www/web.config):

  **Default Web.config Example:**

  ```xml
  <?xml version="1.0" encoding="UTF-8"?>
  <configuration>
      <system.webServer>
          <defaultDocument>
              <files>
                  <add value="index.php" />
              </files>
          </defaultDocument>
          <rewrite>
              <rules>
                  <clear />
                  <rule name="PHP Redirect Rule" stopProcessing="true">
                      <match url="^([A-Za-z0-9_\-]+).php((\?.*)|())$" />
                      <conditions logicalGrouping="MatchAll" trackAllCaptures="false" />
                      <action type="Redirect" url="{R:1}{R:2}" />
                  </rule>
                  <rule name="PHP Re-write">
                      <match url="^([A-Za-z0-9_\-]+)((\?.*)|())$" />
                      <action type="Rewrite" url="{R:1}.php{R:2}" />
                  </rule>
              </rules>
          </rewrite>
      </system.webServer>
  </configuration>
  ```

- In the root repo directory (where the `composer.json / composer.json` are located), in Visual Studio Code, open Terminal, and run this code:

  ```bash
  composer install --ignore-platform-reqs
  ```

- Start IIS
  - Click on the `Sites` folder on the far left, under `Connections`
  - Click `Add Website` on the far upper right, under `Actions`.
  - Enter Site Name, Physical Path (Example: `C:\inetpub\projects\<YOUR REPO>\www`) and Port number, then click OK
  - Click on `Browse *:(port number)` under `Browse Website` and the site will be displayed in the web browser.


## Troubleshooting 

Some items to try / look out for, if the web site isn't resolving in the browser, or you experience erors:

  - In IIS, on the left-hand side of the window, select the `Sites` folder. On the right-hand side of the window, find the `Refresh \ Stop \ Start` buttons. Click the `Refresh` botton and ALL sites / configurations will be reset / refreshed.
  - In IIS, make sure the web site, indicated by the blue globe icon, has the security privileges for this user:

  ```bash
  IIS_IUSRS
  ```