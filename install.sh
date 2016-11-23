#!/bin/sh

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
