<?php
namespace Drupal\custom_blocks\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
/**
 * Provides an 'Example' Block.
 *
 * @Block(
 *   id = "example_block",
 *   admin_label = @Translation("Example Block"),
 * )
 */
class ExampleBlock extends BlockBase implements ContainerFactoryPluginInterface {
  protected $configFactory;
  /**
   * Constructs a new ExampleBlock.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configFactory = $config_factory;
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $site_name = $this->configFactory->get('system.site')->get('name');
    return [
      '#theme' => 'example_block',
      '#site_name' => $site_name,
      '#message' => $this->t('Hello, this is a custom block!'),
      '#cache' => [
        'max-age' => 3600,
      ],
    ];
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')
    );
  }
}