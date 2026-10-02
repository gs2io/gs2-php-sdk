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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateDataOwnerByUserId: Update Data Owner
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#updatedataownerbyuserid
 */
class UpdateDataOwnerByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Data Owner ID */
    private $dataOwnerName;
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
     * @return UpdateDataOwnerByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateDataOwnerByUserIdRequest {
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
     * @return UpdateDataOwnerByUserIdRequest
     */
	public function withUserId(?string $userId): UpdateDataOwnerByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Data Owner ID */
	public function getDataOwnerName(): ?string {
		return $this->dataOwnerName;
	}
    /** @param string|null $dataOwnerName Data Owner ID */
	public function setDataOwnerName(?string $dataOwnerName) {
		$this->dataOwnerName = $dataOwnerName;
	}
    /**
     * @param string|null $dataOwnerName Data Owner ID
     * @return UpdateDataOwnerByUserIdRequest
     */
	public function withDataOwnerName(?string $dataOwnerName): UpdateDataOwnerByUserIdRequest {
		$this->dataOwnerName = $dataOwnerName;
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
     * @return UpdateDataOwnerByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UpdateDataOwnerByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateDataOwnerByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateDataOwnerByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateDataOwnerByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDataOwnerName(array_key_exists('dataOwnerName', $data) && $data['dataOwnerName'] !== null ? $data['dataOwnerName'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "dataOwnerName" => $this->getDataOwnerName(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}