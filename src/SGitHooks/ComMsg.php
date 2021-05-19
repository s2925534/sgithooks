<?php

namespace SGitHooks;

use Exception;
use SGitHooks\Actions\ConfigSetup;

/**
 * Class ComMsg
 * @package SGitHooks
 * @author Πέτρος <it.specialist@hotmail.com>
 */
class ComMsg extends Helper
{
    /**
     * ComMsg constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Main function to execute the check of commit message against the local standard
     */
    public function run()
    {
        $config = ConfigSetup::getConfig();

        // Check commit message against local standards
        echo "\nChecking commit message...\n";

        try {

            if (!$config['commitMessage']['enabled']) {
                echo "\nCommit message check not enabled.\n";
            } else {

                $validationRegex = $config['commitMessage']['validationRegex'];
                array_map(function ($stringToValidate) use (&$validationRegex) {

                    if (!(preg_match("/$validationRegex/", $stringToValidate, $matches))) {
                        $message = "There is something wrong with your commit message. Commit messages in this project must adhere to this contract:
     $validationRegex. Your commit will be rejected. You should change the commit message to a valid one and try again.";
                        echo "\n$message\n";
                        echo "\nMessage used        $stringToValidate\n";
                        echo "\nRequired pattern    $validationRegex\n";
                        echo "\nValid message       1234567: seven digits, followed by colon and space then a minimum 6 characters message\n";
                        exit(1);

                    } else {
                        echo "\nCorrect commit message validated.\n$stringToValidate\n";
                    }

                }, file(".git/COMMIT_EDITMSG"));

            }

        } catch (Exception $exception) {
            echo "\n{$exception->getMessage()}\n";
        }
    }
}
