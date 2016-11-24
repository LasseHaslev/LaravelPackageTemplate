#!/bin/sh

rm -rf .git/

confirm () {
    # call with a prompt string or use a default
    read -r -p "${1:-Are you sure? [y/N]} " response
    case $response in
        [yY][eE][sS]|[yY]) 
            true
            ;;
        *)
            false
            ;;
    esac
}

# Get the information for this package
echo "What is the namespace of this package (LasseHaslev\\\\ExampleName)"
read -r namespace;

# Change the namespace
sed -i '' -e "s/\%namespace\%/$namespace/g" './src/Providers/ServiceProvider.php'
sed -i '' -e "s/\%namespace\%/$namespace/g" './README.md'
sed -i '' -e "s/\%namespace\%/$namespace/g" './tests/TestCase.php'
sed -i '' -e "s/\%namespace\%/$namespace/g" './composer.json'

echo "I am sorry, but you have to add another backward slash in ./composer.json on line 17."

echo "What is the name of the config file ( packagename )"
read -r packagename;

# rename the config file
mv ./config/my_package.php ./config/$packagename.php # works
sed -i '' -e "s/\%packagename\%/$packagename/g" './src/Providers/ServiceProvider.php'

echo "What will be the composer package name? (lassehaslev/example-name)"
read -r composername

sed -i '' -e "s/\%composername\%/$composername/g" './composer.json'

echo "What your name?"
read -r name
echo "Whats your email?"
read -r email

sed -i '' -e "s/\%name\%/$name/g" './composer.json'
sed -i '' -e "s/\%name\%/$name/g" './src/Providers/ServiceProvider.php'
sed -i '' -e "s/\%name\%/$name/g" './tests/TestCase.php'
sed -i '' -e "s/\%email\%/$email/g" './composer.json'

echo "Done setting up files"

confirm "You want me to install composer and npm modules [y/N]" && composer install && yarn && echo 'Dependencies installed'

rm -rf install.sh

echo 'All done! Happy coding!'
