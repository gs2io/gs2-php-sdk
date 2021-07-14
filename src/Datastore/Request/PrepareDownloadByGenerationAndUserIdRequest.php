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

    public static function fromJson(?array $data): ?PrepareDownloadByGenerationAndUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareDownloadByGenerationAndUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withDataObjectId(empty($data['dataObjectId']) ? null : $data['dataObjectId'])
            ->withGeneration(empty($data['generation']) ? null : $data['generation']);
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