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
 * Request for prepareReUploadByUserId: Prepare to re-upload data object by User ID
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#preparereuploadbyuserid
 */
class PrepareReUploadByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Data Object Name */
    private $dataObjectName;
    /** @var string User ID */
    private $userId;
    /** @var string MIME-Type of the data object to be uploaded */
    private $contentType;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return PrepareReUploadByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): PrepareReUploadByUserIdRequest {
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
     * @return PrepareReUploadByUserIdRequest
     */
	public function withDataObjectName(?string $dataObjectName): PrepareReUploadByUserIdRequest {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return PrepareReUploadByUserIdRequest
     */
	public function withUserId(?string $userId): PrepareReUploadByUserIdRequest {
		$this->userId = $userId;
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
     * @return PrepareReUploadByUserIdRequest
     */
	public function withContentType(?string $contentType): PrepareReUploadByUserIdRequest {
		$this->contentType = $contentType;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return PrepareReUploadByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): PrepareReUploadByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PrepareReUploadByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareReUploadByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareReUploadByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDataObjectName(array_key_exists('dataObjectName', $data) && $data['dataObjectName'] !== null ? $data['dataObjectName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withContentType(array_key_exists('contentType', $data) && $data['contentType'] !== null ? $data['contentType'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "dataObjectName" => $this->getDataObjectName(),
            "userId" => $this->getUserId(),
            "contentType" => $this->getContentType(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}