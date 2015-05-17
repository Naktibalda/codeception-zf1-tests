## Deployment

git clone https://github.com/Naktibalda/codeception-zf1-tests.git

cd codeception-zf1-tests

composer install

cd tests/functional/REST

git submodule update

cd ../../..

./vendor/bin/codecept run


## Switching to another branch

git checkout develop

composer update

./vendor/bin/codecept run
