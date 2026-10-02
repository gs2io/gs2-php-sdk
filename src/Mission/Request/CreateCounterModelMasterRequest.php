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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Mission\Model\VerifyAction;
use Gs2\Mission\Model\CounterScopeModel;

/**
 * Request for createCounterModelMaster: Create Counter Model Master
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#createcountermodelmaster
 */
class CreateCounterModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Counter Model name */
    private $name;
    /** @var string Metadata */
    private $metadata;
    /** @var string Description */
    private $description;
    /** @var array List of Counter reset timing */
    private $scopes;
    /** @var string GS2-Schedule event GRN that sets the period during which the counter can be operated */
    private $challengePeriodEventId;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateCounterModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateCounterModelMasterRequest {
		$this->namespaceName = $namespaceName;
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
     * @return CreateCounterModelMasterRequest
     */
	public function withName(?string $name): CreateCounterModelMasterRequest {
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
     * @return CreateCounterModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateCounterModelMasterRequest {
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
     * @return CreateCounterModelMasterRequest
     */
	public function withDescription(?string $description): CreateCounterModelMasterRequest {
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
     * @return CreateCounterModelMasterRequest
     */
	public function withScopes(?array $scopes): CreateCounterModelMasterRequest {
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
     * @return CreateCounterModelMasterRequest
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): CreateCounterModelMasterRequest {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateCounterModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateCounterModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
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
            "namespaceName" => $this->getNamespaceName(),
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
        );
    }
}