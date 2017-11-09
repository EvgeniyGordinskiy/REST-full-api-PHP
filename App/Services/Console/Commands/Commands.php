<?php

namespace App\Console\Commands

class Commands
{
	public function migrate () 
	{
		$path = config('app','migrations_path');
		$migrations = scandir($path);
		foreach ($migrations as $migration) {
			if (is_file("$path/$migration")) {
				if ( $this->checkMigration($migration) ) {
					$sql = require "$path/$migration";
					fwrite(STDOUT, "\033[0m begin migrating $migration" . PHP_EOL);
					try {
						$exec = DB::exec($sql);
					} catch (\Throwable $e) {
						fwrite(STDOUT, "\033[0m $e" . PHP_EOL);
					}

					if ($exec) {
						fwrite(STDOUT, "\033[32m migrated $migration" . PHP_EOL);
					} else {
						fwrite(STDOUT, "\033[31m unexpected error" . PHP_EOL);
					}
				}
			}
		}
	}


	public function checkMigration($migration) 
	{
		$stmt = DB::exec('show tables like "migrations"');
		if (count($stmt->fetchAll()) > 0) {
			$result = DB::exec('select * from migrations where name = "' .$migration .'"');
			if (count($result->fetchAll()) === 0) {
				$newMigration = DB::exec('insert into migrations (name) values (?)', true);
				$newMigration->bindValue(1,$migration, PDO::PARAM_STR);
				$newMigration->execute();
				if ( $newMigration ) {
					return true;
				}
			} else {
				fwrite(STDOUT, "\033[33m migration $migration all ready exist" . PHP_EOL);
			}
		}
		return false;
	}
}