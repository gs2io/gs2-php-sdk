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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getLikeByUserId: Get Like by User ID
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#getlikebyuserid
 */
class GetLikeByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Entry Model name */
    private $entryModelName;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetLikeByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetLikeByUserIdRequest {
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
     * @return GetLikeByUserIdRequest
     */
	public function withUserId(?string $userId): GetLikeByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Entry Model name */
	public function getEntryModelName(): ?string {
		return $this->entryModelName;
	}
    /** @param string|null $entryModelName Entry Model name */
	public function setEntryModelName(?string $entryModelName) {
		$this->entryModelName = $entryModelName;
	}
    /**
     * @param string|null $entryModelName Entry Model name
     * @return GetLikeByUserIdRequest
     */
	public function withEntryModelName(?string $entryModelName): GetLikeByUserIdRequest {
		$this->entryModelName = $entryModelName;
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
     * @return GetLikeByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetLikeByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetLikeByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetLikeByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withEntryModelName(array_key_exists('entryModelName', $data) && $data['entryModelName'] !== null ? $data['entryModelName'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "entryModelName" => $this->getEntryModelName(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}