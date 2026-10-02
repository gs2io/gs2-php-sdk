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

/**
 * Request for prepareDownloadByGeneration: Prepare data object for download by specifying the generation
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#preparedownloadbygeneration
 */
class PrepareDownloadByGenerationRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Data object GRN */
    private $dataObjectId;
    /** @var string Data Generation */
    private $generation;
    /** @var string */
    private $duplicationAvoider;
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
     * @return PrepareDownloadByGenerationRequest
     */
	public function withNamespaceName(?string $namespaceName): PrepareDownloadByGenerationRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return PrepareDownloadByGenerationRequest
     */
	public function withAccessToken(?string $accessToken): PrepareDownloadByGenerationRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Data object GRN */
	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}
    /** @param string|null $dataObjectId Data object GRN */
	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}
    /**
     * @param string|null $dataObjectId Data object GRN
     * @return PrepareDownloadByGenerationRequest
     */
	public function withDataObjectId(?string $dataObjectId): PrepareDownloadByGenerationRequest {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}
    /** @return string|null Data Generation */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /** @param string|null $generation Data Generation */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
     * @param string|null $generation Data Generation
     * @return PrepareDownloadByGenerationRequest
     */
	public function withGeneration(?string $generation): PrepareDownloadByGenerationRequest {
		$this->generation = $generation;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PrepareDownloadByGenerationRequest {
		$this->duplicationAvoider = $duplicationAvoider;
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