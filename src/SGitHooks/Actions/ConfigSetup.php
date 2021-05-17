<?php

namespace SGitHooks\Actions;

/**
 * Class ConfigSetup
 * @package SGitHooks\Actions
 * @author Πέτρος <it.specialist@hotmail.com>
 */
class ConfigSetup
{
    public static function build()
    {
        if (!is_readable("./git-hooks-config.json")) {
            exec("cp vendor/s2925534/sgithooks/src/Samples/git-hooks-config.json git-hooks-config.json");
        }

        $config = self::getConfig();

        if ($config['commitMessage']['enabled']) {
            exec("cp vendor/s2925534/sgithooks/src/Samples/commit-msg.php .git/hooks/commit-msg");
        }

        if ($config['preCommit']['enabled']) {
            exec("cp vendor/s2925534/sgithooks/src/Samples/pre-commit.php .git/hooks/pre-commit");
        }
    }

    public static function getConfig()
    {
        $fileContent = file_get_contents("git-hooks-config.json");

        return json_decode($fileContent, true);
    }
}
