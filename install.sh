#!/bin/sh


# Get the information for this package
# echo "What is the namespace of this package (LasseHaslev\\ExampleName)"
# read namespace;

echo "What is the small name of this package ( packagename )"
read packagename;

# rename the config file
mv ./config/my_package.php ./config/$packagename.php # works
sed -i '' -e "s/\%packagename\%/$packagename/g" './src/Providers/ServiceProvider.php'
