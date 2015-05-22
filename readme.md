## Deployment

git clone --recursive https://github.com/Naktibalda/codeception-zf1-tests.git

cd codeception-zf1-tests

composer install

./vendor/bin/codecept run


## Switching to another branch

git checkout develop

composer update

./vendor/bin/codecept run
