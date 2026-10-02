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
 * Request for prepareDownloadByUserId: Prepare data object for download by User ID
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#preparedownloadbyuserid
 */
class PrepareDownloadByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Data object GRN */
    private $dataObjectId;
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
     * @return PrepareDownloadByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): PrepareDownloadByUserIdRequest {
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
     * @return PrepareDownloadByUserIdRequest
     */
	public function withUserId(?string $userId): PrepareDownloadByUserIdRequest {
		$this->userId = $userId;
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
     * @return PrepareDownloadByUserIdRequest
     */
	public function withDataObjectId(?string $dataObjectId): PrepareDownloadByUserIdRequest {
		$this->dataObjectId = $dataObjectId;
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
     * @return PrepareDownloadByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): PrepareDownloadByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PrepareDownloadByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareDownloadByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareDownloadByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDataObjectId(array_key_exists('dataObjectId', $data) && $data['dataObjectId'] !== null ? $data['dataObjectId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "dataObjectId" => $this->getDataObjectId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}