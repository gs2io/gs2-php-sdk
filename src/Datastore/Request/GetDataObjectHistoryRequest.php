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
 * Request for getDataObjectHistory: Get Data Object History
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#getdataobjecthistory
 */
class GetDataObjectHistoryRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Data Object Name */
    private $dataObjectName;
    /** @var string Generation ID */
    private $generation;
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
     * @return GetDataObjectHistoryRequest
     */
	public function withNamespaceName(?string $namespaceName): GetDataObjectHistoryRequest {
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
     * @return GetDataObjectHistoryRequest
     */
	public function withAccessToken(?string $accessToken): GetDataObjectHistoryRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Data Object Name */
	public function getDataObjectName(): ?string {
		return $this->dataObjectName;
	}
    /** @param string|null $dataObjectName Data Object Name */
	public function setDataObjectName(?string $dataObjectName) {
		$this->dataObjectName = $dataObjectName;
	}
    /**
     * @param string|null $dataObjectName Data Object Name
     * @return GetDataObjectHistoryRequest
     */
	public function withDataObjectName(?string $dataObjectName): GetDataObjectHistoryRequest {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}
    /** @return string|null Generation ID */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /** @param string|null $generation Generation ID */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
     * @param string|null $generation Generation ID
     * @return GetDataObjectHistoryRequest
     */
	public function withGeneration(?string $generation): GetDataObjectHistoryRequest {
		$this->generation = $generation;
		return $this;
	}

    public static function fromJson(?array $data): ?GetDataObjectHistoryRequest {
        if ($data === null) {
            return null;
        }
        return (new GetDataObjectHistoryRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withDataObjectName(array_key_exists('dataObjectName', $data) && $data['dataObjectName'] !== null ? $data['dataObjectName'] : null)
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "dataObjectName" => $this->getDataObjectName(),
            "generation" => $this->getGeneration(),
        );
    }
}