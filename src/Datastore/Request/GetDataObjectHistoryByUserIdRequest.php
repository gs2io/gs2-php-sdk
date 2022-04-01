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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetDataObjectHistoryByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $dataObjectName;
    /** @var string */
    private $generation;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetDataObjectHistoryByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): GetDataObjectHistoryByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getDataObjectName(): ?string {
		return $this->dataObjectName;
	}

	public function setDataObjectName(?string $dataObjectName) {
		$this->dataObjectName = $dataObjectName;
	}

	public function withDataObjectName(?string $dataObjectName): GetDataObjectHistoryByUserIdRequest {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}

	public function getGeneration(): ?string {
		return $this->generation;
	}

	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	public function withGeneration(?string $generation): GetDataObjectHistoryByUserIdRequest {
		$this->generation = $generation;
		return $this;
	}

    public static function fromJson(?array $data): ?GetDataObjectHistoryByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetDataObjectHistoryByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDataObjectName(array_key_exists('dataObjectName', $data) && $data['dataObjectName'] !== null ? $data['dataObjectName'] : null)
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "dataObjectName" => $this->getDataObjectName(),
            "generation" => $this->getGeneration(),
        );
    }
}