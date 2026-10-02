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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Matchmaking\Model\AttributeRange;

/**
 * Request for updateGatheringByUserId: Update Gathering with User ID
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#updategatheringbyuserid
 */
class UpdateGatheringByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Gathering name */
    private $gatheringName;
    /** @var string User ID */
    private $userId;
    /** @var array Recruitment Requirements */
    private $attributeRanges;
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
     * @return UpdateGatheringByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateGatheringByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Gathering name */
	public function getGatheringName(): ?string {
		return $this->gatheringName;
	}
    /** @param string|null $gatheringName Gathering name */
	public function setGatheringName(?string $gatheringName) {
		$this->gatheringName = $gatheringName;
	}
    /**
     * @param string|null $gatheringName Gathering name
     * @return UpdateGatheringByUserIdRequest
     */
	public function withGatheringName(?string $gatheringName): UpdateGatheringByUserIdRequest {
		$this->gatheringName = $gatheringName;
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
     * @return UpdateGatheringByUserIdRequest
     */
	public function withUserId(?string $userId): UpdateGatheringByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Recruitment Requirements */
	public function getAttributeRanges(): ?array {
		return $this->attributeRanges;
	}
    /** @param array|null $attributeRanges Recruitment Requirements */
	public function setAttributeRanges(?array $attributeRanges) {
		$this->attributeRanges = $attributeRanges;
	}
    /**
     * @param array|null $attributeRanges Recruitment Requirements
     * @return UpdateGatheringByUserIdRequest
     */
	public function withAttributeRanges(?array $attributeRanges): UpdateGatheringByUserIdRequest {
		$this->attributeRanges = $attributeRanges;
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
     * @return UpdateGatheringByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UpdateGatheringByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateGatheringByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateGatheringByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateGatheringByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGatheringName(array_key_exists('gatheringName', $data) && $data['gatheringName'] !== null ? $data['gatheringName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAttributeRanges(!array_key_exists('attributeRanges', $data) || $data['attributeRanges'] === null ? null : array_map(
                function ($item) {
                    return AttributeRange::fromJson($item);
                },
                $data['attributeRanges']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "gatheringName" => $this->getGatheringName(),
            "userId" => $this->getUserId(),
            "attributeRanges" => $this->getAttributeRanges() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAttributeRanges()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}