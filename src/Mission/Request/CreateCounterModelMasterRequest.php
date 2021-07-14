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
use Gs2\Mission\Model\CounterScopeModel;

class CreateCounterModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $metadata;
    /** @var string */
    private $description;
    /** @var array */
    private $scopes;
    /** @var string */
    private $challengePeriodEventId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateCounterModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateCounterModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateCounterModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateCounterModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getScopes(): ?array {
		return $this->scopes;
	}

	public function setScopes(?array $scopes) {
		$this->scopes = $scopes;
	}

	public function withScopes(?array $scopes): CreateCounterModelMasterRequest {
		$this->scopes = $scopes;
		return $this;
	}

	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

	public function withChallengePeriodEventId(?string $challengePeriodEventId): CreateCounterModelMasterRequest {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateCounterModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateCounterModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withScopes(array_map(
                function ($item) {
                    return CounterScopeModel::fromJson($item);
                },
                array_key_exists('scopes', $data) && $data['scopes'] !== null ? $data['scopes'] : []
            ))
            ->withChallengePeriodEventId(empty($data['challengePeriodEventId']) ? null : $data['challengePeriodEventId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "scopes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getScopes() !== null && $this->getScopes() !== null ? $this->getScopes() : []
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
        );
    }
}