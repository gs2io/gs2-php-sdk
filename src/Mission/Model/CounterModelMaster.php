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
 * Counter Model Master
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#countermodelmaster
 */
class CounterModelMaster implements IModel {
	/**
     * @var string Counter Model Master GRN
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
     * @var string Description
	 */
	private $description;
	/**
     * @var array List of Counter reset timing
	 */
	private $scopes;
	/**
     * @var string GS2-Schedule event GRN that sets the period during which the counter can be operated
	 */
	private $challengePeriodEventId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Counter Model Master GRN */
	public function getCounterId(): ?string {
		return $this->counterId;
	}
    /** @param string|null $counterId Counter Model Master GRN */
	public function setCounterId(?string $counterId) {
		$this->counterId = $counterId;
	}
    /**
     * @param string|null $counterId Counter Model Master GRN
     * @return CounterModelMaster
     */
	public function withCounterId(?string $counterId): CounterModelMaster {
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
     * @return CounterModelMaster
     */
	public function withName(?string $name): CounterModelMaster {
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
     * @return CounterModelMaster
     */
	public function withMetadata(?string $metadata): CounterModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CounterModelMaster
     */
	public function withDescription(?string $description): CounterModelMaster {
		$this->description = $description;
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
     * @return CounterModelMaster
     */
	public function withScopes(?array $scopes): CounterModelMaster {
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
     * @return CounterModelMaster
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): CounterModelMaster {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return CounterModelMaster
     */
	public function withCreatedAt(?int $createdAt): CounterModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return CounterModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): CounterModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return CounterModelMaster
     */
	public function withRevision(?int $revision): CounterModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?CounterModelMaster {
        if ($data === null) {
            return null;
        }
        return (new CounterModelMaster())
            ->withCounterId(array_key_exists('counterId', $data) && $data['counterId'] !== null ? $data['counterId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withScopes(!array_key_exists('scopes', $data) || $data['scopes'] === null ? null : array_map(
                function ($item) {
                    return CounterScopeModel::fromJson($item);
                },
                $data['scopes']
            ))
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "counterId" => $this->getCounterId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "scopes" => $this->getScopes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getScopes()
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}