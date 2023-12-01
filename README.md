## Installation
1. `git clone https://github.com/imsuneel/background-job-processor.git background-job-processor`
2. `cd background-job-processor`
2. `cp .env.example .env`

3. `composer install`

4. `php artisan key:generate`

5. Set database credentials in '.env' file

6. Set smtp credentials in '.env' file

7. `php artisan queue:table`

8. `php artisan migrate`

9. `composer dumpautoload -o`

10. `php artisan queue:work`

11. `php artisan order:place "test@example.com" "12.50"`



## Permissions

### Local only

```
sudo chown -R :www-data bootstrap/cache
sudo chmod -R ug+rwx bootstrap/cache
sudo chown -R :www-data storage/
sudo chmod -R ug+rwx storage/
```
