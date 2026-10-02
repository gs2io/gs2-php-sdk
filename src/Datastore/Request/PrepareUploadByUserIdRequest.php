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
 * Request for prepareUploadByUserId: Prepare to upload Data Object by User ID
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#prepareuploadbyuserid
 */
class PrepareUploadByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Data Object name */
    private $name;
    /** @var string MIME-Type of the data to be uploaded */
    private $contentType;
    /** @var string File access permission */
    private $scope;
    /** @var array List of user IDs to be published */
    private $allowUserIds;
    /** @var bool Whether to raise an error if data already exists or to update the data */
    private $updateIfExists;
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
     * @return PrepareUploadByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): PrepareUploadByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return PrepareUploadByUserIdRequest
     */
	public function withUserId(?string $userId): PrepareUploadByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Data Object name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Data Object name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Data Object name
     * @return PrepareUploadByUserIdRequest
     */
	public function withName(?string $name): PrepareUploadByUserIdRequest {
		$this->name = $name;
		return $this;
	}
    /** @return string|null MIME-Type of the data to be uploaded */
	public function getContentType(): ?string {
		return $this->contentType;
	}
    /** @param string|null $contentType MIME-Type of the data to be uploaded */
	public function setContentType(?string $contentType) {
		$this->contentType = $contentType;
	}
    /**
     * @param string|null $contentType MIME-Type of the data to be uploaded
     * @return PrepareUploadByUserIdRequest
     */
	public function withContentType(?string $contentType): PrepareUploadByUserIdRequest {
		$this->contentType = $contentType;
		return $this;
	}
    /** @return string|null File access permission */
	public function getScope(): ?string {
		return $this->scope;
	}
    /** @param string|null $scope File access permission */
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
    /**
     * @param string|null $scope File access permission
     * @return PrepareUploadByUserIdRequest
     */
	public function withScope(?string $scope): PrepareUploadByUserIdRequest {
		$this->scope = $scope;
		return $this;
	}
    /** @return array|null List of user IDs to be published */
	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}
    /** @param array|null $allowUserIds List of user IDs to be published */
	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}
    /**
     * @param array|null $allowUserIds List of user IDs to be published
     * @return PrepareUploadByUserIdRequest
     */
	public function withAllowUserIds(?array $allowUserIds): PrepareUploadByUserIdRequest {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}
    /** @return bool|null Whether to raise an error if data already exists or to update the data */
	public function getUpdateIfExists(): ?bool {
		return $this->updateIfExists;
	}
    /** @param bool|null $updateIfExists Whether to raise an error if data already exists or to update the data */
	public function setUpdateIfExists(?bool $updateIfExists) {
		$this->updateIfExists = $updateIfExists;
	}
    /**
     * @param bool|null $updateIfExists Whether to raise an error if data already exists or to update the data
     * @return PrepareUploadByUserIdRequest
     */
	public function withUpdateIfExists(?bool $updateIfExists): PrepareUploadByUserIdRequest {
		$this->updateIfExists = $updateIfExists;
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
     * @return PrepareUploadByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): PrepareUploadByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PrepareUploadByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareUploadByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareUploadByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withContentType(array_key_exists('contentType', $data) && $data['contentType'] !== null ? $data['contentType'] : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withAllowUserIds(!array_key_exists('allowUserIds', $data) || $data['allowUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['allowUserIds']
            ))
            ->withUpdateIfExists(array_key_exists('updateIfExists', $data) ? $data['updateIfExists'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "contentType" => $this->getContentType(),
            "scope" => $this->getScope(),
            "allowUserIds" => $this->getAllowUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds()
            ),
            "updateIfExists" => $this->getUpdateIfExists(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}