<?php

declare(strict_types=1);

namespace AiSdk\Fireworks;

use AiSdk\Contracts\BaseProvider;
use AiSdk\Contracts\EmbeddingModelInterface;
use AiSdk\Contracts\EmbeddingProviderInterface;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\Contracts\TextProviderInterface;
use AiSdk\Fireworks\Models\FireworksEmbeddingModel;
use AiSdk\Fireworks\Models\FireworksTextModel;

final class FireworksProvider extends BaseProvider implements EmbeddingProviderInterface, TextProviderInterface
{
    public function __construct(public readonly FireworksOptions $options) {}
    public function name(): string
    {
        return FireworksOptions::PROVIDER_NAME;
    }
    protected function textModel(string $modelId): TextModelInterface
    {
        return new FireworksTextModel($modelId, $this->options);
    }
    protected function embeddingModel(string $modelId): EmbeddingModelInterface
    {
        return new FireworksEmbeddingModel($modelId, $this->options);
    }
}
