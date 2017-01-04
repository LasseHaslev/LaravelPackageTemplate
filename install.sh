#!/bin/sh

FILES=( './src/Model.php' './src/Http/Controllers/Controller.php' './config/my_package.php' './database/migrations/my_package.php' './src/Providers/ServiceProvider.php' './src/Http/Router.php' './README.md' './tests/TestCase.php' './composer.json' './resources/lang/en/models.php' './resources/views/elements/form.blade.php' './resources/views/create.blade.php' './resources/views/edit.blade.php' './resources/views/index.blade.php' './resources/views/show.blade.php')

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

    replaceVarableInFiles '\%packagename\%' $packagename

    # rename the config file
    mv ./config/my_package.php ./config/$packagename.php # works

}

function setupModel {
    echo "What is the name of the first model ( Account )"
    read -r model;

    replaceVarableInFiles '\%model\%' $model

    echo "What is the \"plural\" name of the config file ( Accounts )"
    read -r model_plural;

    replaceVarableInFiles '\%model_plural\%' $model_plural

}

function setupModelInstance {
    echo "What is the name of the first model instance ( account )"
    read -r instance;

    replaceVarableInFiles '\%instance\%' $instance

    echo "What is the \"plural\" name of the first model instance ( accounts )"
    read -r instance_plural;

    replaceVarableInFiles '\%instance_plural\%' $instance_plural

}

function setupMigration {

    migrationname=`date +%Y_%m_%d_123456_create_$instance_plural\_table`;

    # rename the migration file
    mv ./database/migrations/my_package.php ./database/migrations/$migrationname.php # works

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

function changeFilenames {
    mv ./src/Model.php ./src/$model.php # works
    mv ./src/Http/Controllers/Controller.php ./src/./src/Http/Controllers/$model_pluralController.php # works
}

# Steps
setupAuthorInfo
setupNamespace
setupModel
setupModelInstance
setupMigration
setupComposerInfo
setupConfigFile
changeFilenames
finishUp
