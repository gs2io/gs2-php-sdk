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

class PrepareDownloadByGenerationAndUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $dataObjectId;
    /** @var string */
    private $generation;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): PrepareDownloadByGenerationAndUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): PrepareDownloadByGenerationAndUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}
	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}
	public function withDataObjectId(?string $dataObjectId): PrepareDownloadByGenerationAndUserIdRequest {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}
	public function getGeneration(): ?string {
		return $this->generation;
	}
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
	public function withGeneration(?string $generation): PrepareDownloadByGenerationAndUserIdRequest {
		$this->generation = $generation;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PrepareDownloadByGenerationAndUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareDownloadByGenerationAndUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareDownloadByGenerationAndUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDataObjectId(array_key_exists('dataObjectId', $data) && $data['dataObjectId'] !== null ? $data['dataObjectId'] : null)
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "dataObjectId" => $this->getDataObjectId(),
            "generation" => $this->getGeneration(),
        );
    }
}