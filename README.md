# aisdk/fireworks

<a href="https://github.com/phpaisdk/fireworks/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/phpaisdk/fireworks/tests.yml?branch=main&label=Tests"></a>
<a href="https://packagist.org/packages/aisdk/fireworks"><img alt="Latest Version" src="https://img.shields.io/packagist/v/aisdk/fireworks"></a>
<a href="https://packagist.org/packages/aisdk/fireworks"><img alt="License" src="https://img.shields.io/packagist/l/aisdk/fireworks"></a>

------

Official Fireworks AI provider for the PHP AI SDK. Uses Fireworks' OpenAI-compatible Inference API.

## Installation

```bash
composer require aisdk/fireworks
```

## Basic Usage

```php
use AiSdk\Fireworks;
use AiSdk\Generate;

Fireworks::create(['apiKey' => $_ENV['FIREWORKS_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Fireworks::model('gpt-oss-120b'))
    ->run();
```

## Configuration

| Variable | Description | Default |
| --- | --- | --- |
| `FIREWORKS_API_KEY` | API key for authentication | Required |
| `FIREWORKS_BASE_URL` | Base URL for API requests | `https://api.fireworks.ai/inference/v1` |

## Supported Capabilities

| Capability | Support |
| --- | --- |
| Text generation and streaming | Native OpenAI-compatible chat |
| Embeddings | Native |
| Tool calling, structured output, reasoning, image input | Passed through for supported models |

Use `providerOptions('fireworks', ['raw' => [...]])` for documented Fireworks fields outside the portable SDK surface. Model IDs are opaque strings and are validated by Fireworks.

## Documentation

- [Fireworks OpenAI compatibility documentation](https://docs.fireworks.ai/tools-sdks/openai-compatibility)
- [PHP AI SDK documentation](https://phpaisdk.com/docs/fireworks)
