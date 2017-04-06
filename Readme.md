# Singapore Power iGrad Job Interview Assignment

## Setup Instruction
1. Download and Install PHP for your OS
2. [Download and Install Composer](https://getcomposer.org/doc/00-intro.md)
3. Download and unzip this project
4. At root of project run command `composer install`
5. To run the tests, run the command `./vendor/bin/phpunit` from root of project

## Using the Console App

A console app component is added later. Here are the instructions to use it

1. Setup the App as per instructions given earlier
2. At project root run the command `chmod +x ./keyPadApp` to give my console app executable permission
3. Run the command `./keyPadApp` to view the list of commands available
4. To get help for a particular command try running something like `./keyPadApp help num-to-dict-words`

### Some example usage of the commands

```
./keyPadApp num-to-dict-words 2355
./keyPadApp num-to-letters-combi 23
./keyPadApp word-to-num-presses hello
./keyPadApp word-to-num-rep hello
```