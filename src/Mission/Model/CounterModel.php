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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


/**
 * Counter Model
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#countermodel
 */
class CounterModel implements IModel {
	/**
     * @var string Counter Model GRN
	 */
	private $counterId;
	/**
     * @var string Counter Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Counter reset timing
	 */
	private $scopes;
	/**
     * @var string GS2-Schedule event GRN that sets the period during which the counter can be operated
	 */
	private $challengePeriodEventId;
    /** @return string|null Counter Model GRN */
	public function getCounterId(): ?string {
		return $this->counterId;
	}
    /** @param string|null $counterId Counter Model GRN */
	public function setCounterId(?string $counterId) {
		$this->counterId = $counterId;
	}
    /**
     * @param string|null $counterId Counter Model GRN
     * @return CounterModel
     */
	public function withCounterId(?string $counterId): CounterModel {
		$this->counterId = $counterId;
		return $this;
	}
    /** @return string|null Counter Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Counter Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Counter Model name
     * @return CounterModel
     */
	public function withName(?string $name): CounterModel {
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
     * @return CounterModel
     */
	public function withMetadata(?string $metadata): CounterModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Counter reset timing */
	public function getScopes(): ?array {
		return $this->scopes;
	}
    /** @param array|null $scopes List of Counter reset timing */
	public function setScopes(?array $scopes) {
		$this->scopes = $scopes;
	}
    /**
     * @param array|null $scopes List of Counter reset timing
     * @return CounterModel
     */
	public function withScopes(?array $scopes): CounterModel {
		$this->scopes = $scopes;
		return $this;
	}
    /** @return string|null GS2-Schedule event GRN that sets the period during which the counter can be operated */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
    /** @param string|null $challengePeriodEventId GS2-Schedule event GRN that sets the period during which the counter can be operated */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
    /**
     * @param string|null $challengePeriodEventId GS2-Schedule event GRN that sets the period during which the counter can be operated
     * @return CounterModel
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): CounterModel {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?CounterModel {
        if ($data === null) {
            return null;
        }
        return (new CounterModel())
            ->withCounterId(array_key_exists('counterId', $data) && $data['counterId'] !== null ? $data['counterId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withScopes(!array_key_exists('scopes', $data) || $data['scopes'] === null ? null : array_map(
                function ($item) {
                    return CounterScopeModel::fromJson($item);
                },
                $data['scopes']
            ))
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "counterId" => $this->getCounterId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "scopes" => $this->getScopes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getScopes()
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
        );
    }
}