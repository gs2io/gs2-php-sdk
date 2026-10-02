<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Ranking2\Model;

use Gs2\Core\Model\IModel;


/**
 * Subscribe Ranking Model
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#subscriberankingmodel
 */
class SubscribeRankingModel implements IModel {
	/**
     * @var string Subscribe Ranking GRN
	 */
	private $subscribeRankingModelId;
	/**
     * @var string Subscribe Ranking Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Minimum Score
	 */
	private $minimumValue;
	/**
     * @var int Maximum Score
	 */
	private $maximumValue;
	/**
     * @var bool Sum Scores
	 */
	private $sum;
	/**
     * @var string Order Direction
	 */
	private $orderDirection;
	/**
     * @var string Entry Period Event GRN
	 */
	private $entryPeriodEventId;
	/**
     * @var string Access Period Event GRN
	 */
	private $accessPeriodEventId;
    /** @return string|null Subscribe Ranking GRN */
	public function getSubscribeRankingModelId(): ?string {
		return $this->subscribeRankingModelId;
	}
    /** @param string|null $subscribeRankingModelId Subscribe Ranking GRN */
	public function setSubscribeRankingModelId(?string $subscribeRankingModelId) {
		$this->subscribeRankingModelId = $subscribeRankingModelId;
	}
    /**
     * @param string|null $subscribeRankingModelId Subscribe Ranking GRN
     * @return SubscribeRankingModel
     */
	public function withSubscribeRankingModelId(?string $subscribeRankingModelId): SubscribeRankingModel {
		$this->subscribeRankingModelId = $subscribeRankingModelId;
		return $this;
	}
    /** @return string|null Subscribe Ranking Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Subscribe Ranking Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Subscribe Ranking Model name
     * @return SubscribeRankingModel
     */
	public function withName(?string $name): SubscribeRankingModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return SubscribeRankingModel
     */
	public function withMetadata(?string $metadata): SubscribeRankingModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Minimum Score */
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}
    /** @param int|null $minimumValue Minimum Score */
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}
    /**
     * @param int|null $minimumValue Minimum Score
     * @return SubscribeRankingModel
     */
	public function withMinimumValue(?int $minimumValue): SubscribeRankingModel {
		$this->minimumValue = $minimumValue;
		return $this;
	}
    /** @return int|null Maximum Score */
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}
    /** @param int|null $maximumValue Maximum Score */
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}
    /**
     * @param int|null $maximumValue Maximum Score
     * @return SubscribeRankingModel
     */
	public function withMaximumValue(?int $maximumValue): SubscribeRankingModel {
		$this->maximumValue = $maximumValue;
		return $this;
	}
    /** @return bool|null Sum Scores */
	public function getSum(): ?bool {
		return $this->sum;
	}
    /** @param bool|null $sum Sum Scores */
	public function setSum(?bool $sum) {
		$this->sum = $sum;
	}
    /**
     * @param bool|null $sum Sum Scores
     * @return SubscribeRankingModel
     */
	public function withSum(?bool $sum): SubscribeRankingModel {
		$this->sum = $sum;
		return $this;
	}
    /** @return string|null Order Direction */
	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}
    /** @param string|null $orderDirection Order Direction */
	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}
    /**
     * @param string|null $orderDirection Order Direction
     * @return SubscribeRankingModel
     */
	public function withOrderDirection(?string $orderDirection): SubscribeRankingModel {
		$this->orderDirection = $orderDirection;
		return $this;
	}
    /** @return string|null Entry Period Event GRN */
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}
    /** @param string|null $entryPeriodEventId Entry Period Event GRN */
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}
    /**
     * @param string|null $entryPeriodEventId Entry Period Event GRN
     * @return SubscribeRankingModel
     */
	public function withEntryPeriodEventId(?string $entryPeriodEventId): SubscribeRankingModel {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
    /** @return string|null Access Period Event GRN */
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}
    /** @param string|null $accessPeriodEventId Access Period Event GRN */
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}
    /**
     * @param string|null $accessPeriodEventId Access Period Event GRN
     * @return SubscribeRankingModel
     */
	public function withAccessPeriodEventId(?string $accessPeriodEventId): SubscribeRankingModel {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscribeRankingModel {
        if ($data === null) {
            return null;
        }
        return (new SubscribeRankingModel())
            ->withSubscribeRankingModelId(array_key_exists('subscribeRankingModelId', $data) && $data['subscribeRankingModelId'] !== null ? $data['subscribeRankingModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMinimumValue(array_key_exists('minimumValue', $data) && $data['minimumValue'] !== null ? $data['minimumValue'] : null)
            ->withMaximumValue(array_key_exists('maximumValue', $data) && $data['maximumValue'] !== null ? $data['maximumValue'] : null)
            ->withSum(array_key_exists('sum', $data) ? $data['sum'] : null)
            ->withOrderDirection(array_key_exists('orderDirection', $data) && $data['orderDirection'] !== null ? $data['orderDirection'] : null)
            ->withEntryPeriodEventId(array_key_exists('entryPeriodEventId', $data) && $data['entryPeriodEventId'] !== null ? $data['entryPeriodEventId'] : null)
            ->withAccessPeriodEventId(array_key_exists('accessPeriodEventId', $data) && $data['accessPeriodEventId'] !== null ? $data['accessPeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeRankingModelId" => $this->getSubscribeRankingModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "minimumValue" => $this->getMinimumValue(),
            "maximumValue" => $this->getMaximumValue(),
            "sum" => $this->getSum(),
            "orderDirection" => $this->getOrderDirection(),
            "entryPeriodEventId" => $this->getEntryPeriodEventId(),
            "accessPeriodEventId" => $this->getAccessPeriodEventId(),
        );
    }
}