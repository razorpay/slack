<?php namespace Maknz\Slack;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Encryption\Encrypter as Encrypter;

class SlackServiceProviderLaravel5 extends ServiceProvider {

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    $this->publishes([__DIR__ . '/config/config.php' => config_path('slack.php')]);
  }

  protected function getEncrypter()
  {
    return $this->app['encrypter'];
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'slack');

    $this->app['slack'] = $this->app->share(function($app)
    {
      return new Client(
        $app['config']->get('slack.endpoint'),
        [
          'channel' => $app['config']->get('slack.channel'),
          'username' => $app['config']->get('slack.username'),
          'icon' => $app['config']->get('slack.icon'),
          'link_names' => $app['config']->get('slack.link_names'),
          'unfurl_links' => $app['config']->get('slack.unfurl_links'),
          'unfurl_media' => $app['config']->get('slack.unfurl_media'),
          'allow_markdown' => $app['config']->get('slack.allow_markdown'),
          'markdown_in_attachments' => $app['config']->get('slack.markdown_in_attachments'),
          'is_slack_enabled' => $app['config']->get('slack.is_slack_enabled'),
        ],
        null,
        new Guzzle
      );
    });

    $this->app->bind('Maknz\Slack\Client', 'slack');
  }

}
