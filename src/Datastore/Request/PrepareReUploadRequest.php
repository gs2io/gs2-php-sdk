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
 * Request for prepareReUpload: Prepare to re-upload data object
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#preparereupload
 */
class PrepareReUploadRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Data Object Name */
    private $dataObjectName;
    /** @var string User ID */
    private $accessToken;
    /** @var string MIME-Type of the data object to be uploaded */
    private $contentType;
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
     * @return PrepareReUploadRequest
     */
	public function withNamespaceName(?string $namespaceName): PrepareReUploadRequest {
		$this->namespaceName = $namespaceName;
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
     * @return PrepareReUploadRequest
     */
	public function withDataObjectName(?string $dataObjectName): PrepareReUploadRequest {
		$this->dataObjectName = $dataObjectName;
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
     * @return PrepareReUploadRequest
     */
	public function withAccessToken(?string $accessToken): PrepareReUploadRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null MIME-Type of the data object to be uploaded */
	public function getContentType(): ?string {
		return $this->contentType;
	}
    /** @param string|null $contentType MIME-Type of the data object to be uploaded */
	public function setContentType(?string $contentType) {
		$this->contentType = $contentType;
	}
    /**
     * @param string|null $contentType MIME-Type of the data object to be uploaded
     * @return PrepareReUploadRequest
     */
	public function withContentType(?string $contentType): PrepareReUploadRequest {
		$this->contentType = $contentType;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PrepareReUploadRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareReUploadRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareReUploadRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDataObjectName(array_key_exists('dataObjectName', $data) && $data['dataObjectName'] !== null ? $data['dataObjectName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withContentType(array_key_exists('contentType', $data) && $data['contentType'] !== null ? $data['contentType'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "dataObjectName" => $this->getDataObjectName(),
            "accessToken" => $this->getAccessToken(),
            "contentType" => $this->getContentType(),
        );
    }
}