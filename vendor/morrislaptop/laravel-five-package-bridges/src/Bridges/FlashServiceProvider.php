<?php namespace Morrislaptop\LaravelFivePackageBridges\Bridges;

use Laracasts\Flash\FlashServiceProvider as BaseFlashServiceProvider;
use Morrislaptop\LaravelFivePackageBridges\LaravelFivePackageBridgeTrait;

class FlashServiceProvider extends BaseFlashServiceProvider {
	use LaravelFivePackageBridgeTrait;
}
