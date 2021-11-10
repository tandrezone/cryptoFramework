
   Illuminate\Contracts\Filesystem\FileNotFoundException 

  File not found at path: tickersBTC__1000.json

  at vendor/laravel/framework/src/Illuminate/Filesystem/FilesystemAdapter.php:159
    155▕     {
    156▕         try {
    157▕             return $this->driver->read($path);
    158▕         } catch (FileNotFoundException $e) {
  ➜ 159▕             throw new ContractFileNotFoundException($e->getMessage(), $e->getCode(), $e);
    160▕         }
    161▕     }
    162▕ 
    163▕     /**

      [2m+3 vendor frames [22m
  4   app/Brokers/Simulator.php:22
      Illuminate\Filesystem\FilesystemAdapter::get()

  5   app/Console/Commands/testBroker.php:52
      App\Brokers\Simulator::getTickers()
