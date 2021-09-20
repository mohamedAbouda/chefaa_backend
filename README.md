# chefaa back-end
Chefaa is online ordering app
## Project Requirements

- > PHP >= 7.4
- > git
- > mysql 5.7.33

## How to run the project
    git clone https://github.com/mohamedAbouda/chefaa_backend.git

	cd chefaa_backend/

    composer install

    php artisan migrate

	php artisan db:seed

	php artisan serve

#### Command to get the cheapest Pharmacies of the givent product
This command will show the N numbers of cheapes pharmacies of any given product
##### parmaters

 1. product-id (required) the product id you want to search for
 2. pharmacies-limit (optional , default 5 pharmacies) the count of pharmacies you want to display

##### examples :

    php artisan product:cheapes-pharmacies --product-id=1

    php artisan product:cheapes-pharmacies --product-id=1 --pharmacies-limit=4


#### Testing
This application has 2 unit tests files (PharmacyTest, ProductTest) each file has 4 main crud tests.

>  Tests\Unit\PharmacyTest


 - ✓ it can create a pharmacy
 - ✓ it can update a pharmacy
 - ✓ it canshow a pharmacy
 - ✓ it can destroy a pharmacy


>    Tests\Unit\ProductTest


 - ✓ it can create a product
 - ✓ it can update a product
 - ✓ it can show a product
 - ✓ it can destroy a product

To run the unit tests please run

    php artisan test
note: don't forget to update .env database configuration with your system congfiguration.
