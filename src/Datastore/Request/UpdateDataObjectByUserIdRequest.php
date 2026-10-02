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
 * Request for updateDataObjectByUserId: Update Data Object by User ID
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#updatedataobjectbyuserid
 */
class UpdateDataObjectByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Data Object Name */
    private $dataObjectName;
    /** @var string User ID */
    private $userId;
    /** @var string File access permission */
    private $scope;
    /** @var array List of user IDs to be published */
    private $allowUserIds;
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
     * @return UpdateDataObjectByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateDataObjectByUserIdRequest {
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
     * @return UpdateDataObjectByUserIdRequest
     */
	public function withDataObjectName(?string $dataObjectName): UpdateDataObjectByUserIdRequest {
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
     * @return UpdateDataObjectByUserIdRequest
     */
	public function withUserId(?string $userId): UpdateDataObjectByUserIdRequest {
		$this->userId = $userId;
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
     * @return UpdateDataObjectByUserIdRequest
     */
	public function withScope(?string $scope): UpdateDataObjectByUserIdRequest {
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
     * @return UpdateDataObjectByUserIdRequest
     */
	public function withAllowUserIds(?array $allowUserIds): UpdateDataObjectByUserIdRequest {
		$this->allowUserIds = $allowUserIds;
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
     * @return UpdateDataObjectByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UpdateDataObjectByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateDataObjectByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateDataObjectByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateDataObjectByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDataObjectName(array_key_exists('dataObjectName', $data) && $data['dataObjectName'] !== null ? $data['dataObjectName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withAllowUserIds(!array_key_exists('allowUserIds', $data) || $data['allowUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['allowUserIds']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "dataObjectName" => $this->getDataObjectName(),
            "userId" => $this->getUserId(),
            "scope" => $this->getScope(),
            "allowUserIds" => $this->getAllowUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}