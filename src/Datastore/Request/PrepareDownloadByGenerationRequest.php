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

class PrepareDownloadByGenerationRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
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

	public function withNamespaceName(?string $namespaceName): PrepareDownloadByGenerationRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): PrepareDownloadByGenerationRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}

	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}

	public function withDataObjectId(?string $dataObjectId): PrepareDownloadByGenerationRequest {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}

	public function getGeneration(): ?string {
		return $this->generation;
	}

	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	public function withGeneration(?string $generation): PrepareDownloadByGenerationRequest {
		$this->generation = $generation;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareDownloadByGenerationRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareDownloadByGenerationRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withDataObjectId(array_key_exists('dataObjectId', $data) && $data['dataObjectId'] !== null ? $data['dataObjectId'] : null)
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "dataObjectId" => $this->getDataObjectId(),
            "generation" => $this->getGeneration(),
        );
    }
}