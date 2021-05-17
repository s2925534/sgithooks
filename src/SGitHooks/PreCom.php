<?php

namespace SGitHooks;

use Exception;
use SGitHooks\Actions\ConfigSetup;

/**
 * Class PreCom
 * @package SGitHooks
 * @author Πέτρος <it.specialist@hotmail.com>
 */
class PreCom extends Helper
{
    /**
     * PreCom constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        // Check branch name against local standards
        echo "\nChecking branching name...\n";

        try {

            $config = ConfigSetup::getConfig();

            if (!$config['commitMessage']['enabled']) {
                throw new Exception('Commit message check not enabled.');
            }

            $validationRegex = "^(feature|bugfix|improvement|library|prerelease|release|hotfix)\/[a-z0-9._-]+$";

            // Format: "feature/1234567-some-description"
            $stringToValidate = shell_exec('git branch --show-current');

            if (!(preg_match("/$validationRegex/", $stringToValidate))) {
                $message = "There is something wrong with your branch name. Branch names in this project must adhere to this contract:
     $validationRegex. Your commit will be rejected. You should rename your branch to a valid name and try again.";
                echo "\n$message\n";
                exit(1);

            } else {
                echo "\nCorrect branching name validated. $stringToValidate\n";
            }

        } catch (Exception $exception) {
            echo "\n{$exception->getMessage()}\n";
        }
    }
}
