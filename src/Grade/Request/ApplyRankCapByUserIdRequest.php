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

namespace Gs2\Grade\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for applyRankCapByUserId: Apply rank cap to GS2-Experience Status by User ID
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#applyrankcapbyuserid
 */
class ApplyRankCapByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Grade Model Name */
    private $gradeName;
    /** @var string Property ID */
    private $propertyId;
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
     * @return ApplyRankCapByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ApplyRankCapByUserIdRequest {
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
     * @return ApplyRankCapByUserIdRequest
     */
	public function withUserId(?string $userId): ApplyRankCapByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Grade Model Name */
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
    /** @param string|null $gradeName Grade Model Name */
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
    /**
     * @param string|null $gradeName Grade Model Name
     * @return ApplyRankCapByUserIdRequest
     */
	public function withGradeName(?string $gradeName): ApplyRankCapByUserIdRequest {
		$this->gradeName = $gradeName;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return ApplyRankCapByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): ApplyRankCapByUserIdRequest {
		$this->propertyId = $propertyId;
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
     * @return ApplyRankCapByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ApplyRankCapByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ApplyRankCapByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ApplyRankCapByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ApplyRankCapByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "gradeName" => $this->getGradeName(),
            "propertyId" => $this->getPropertyId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}