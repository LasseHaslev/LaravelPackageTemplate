#!/bin/sh

FILES=('./database/migrations/my_package.php' './src/Providers/ServiceProvider.php' './src/Http/Router.php' './README.md' './tests/TestCase.php' './composer.json')

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

function replaceVariableInFile {
    # $1 is valiablename in file
    # $2 is what to replace in
    # $3 is What file to replace
    sed -i '' -e "s/$1/$2/g" $3
}
function replaceVarableInFiles {
    # $1 is valiablename in file
    # $2 is what to replace in
    nameLength=${#FILES[@]}
    for (( i = 0; i < $nameLength; i++ )); do
        replaceVariableInFile $1 $2 ${FILES[$i]}
    done
}

function addDoubleBackslashesInComposer {
    # Add double backslashes to composer file
    sed -i '' -e 's,\(\\\),\1\1,' './composer.json'
}

# --- Function steps ---
function setupNamespace {
    # Get the information for this package
    echo "What is the namespace of this package (LasseHaslev\\\\ExampleName)"
    read -r namespace;

    # Change the namespace
    replaceVarableInFiles '\%namespace\%' $namespace
}

function setupConfigFile {
    echo "What is the name of the config file ( packagename )"
    read -r packagename;

    # rename the config file
    mv ./config/my_package.php ./config/$packagename.php # works

    DATESTRING=`date +%Y_%m_%d`;

    replaceVarableInFiles '\%packagename\%' $packagename

    # rename the migration file
    mv ./database/migrations/my_package.php ./config/$DATESTRING_$packagename_table.php # works

}

function setupComposerInfo {
    echo "What will be the composer package name? (lassehaslev/example-name)"
    read -r composername
    replaceVarableInFiles '\%composername\%' $composername

    addDoubleBackslashesInComposer
}

function setupAuthorInfo {
    echo "What your name?"
    read -r name
    echo "Whats your email?"
    read -r email

    replaceVarableInFiles '\%name\%' $name
    replaceVarableInFiles '\%email\%' $email
}

function finishUp {
    rm -rf .git/
    rm -rf install.sh

    echo "Done setting up files"

    confirm "You want me to install composer and npm modules [y/N]" && composer install && yarn && echo 'Dependencies installed'

    echo 'All done! Happy coding!'
}

# Steps
setupAuthorInfo
setupNamespace
setupConfigFile
setupComposerInfo
finishUp
